<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller
{
	public function post()
	{
		$action = $this->input->post('action');

		if ($action == 'video') {
			$this->uploadVideo();
		} else if ($action == 'avatar') {
			$this->uploadAvatar();
		}
	}

	/**
	 * Upload video onto the server.
	 */
	private function uploadVideo()
	{
    $this->load->helper('date');

		// Get user id
		$userId = $this->session->userdata('userId');
		if (empty($userId)) {
			echo json_encode([ 'error' => 'Please login your account.' ]);
			return;
		}

    // Call the upload library
    $config['upload_path']      = FCPATH . 'assets/uploads/video/';
    $config['allowed_types']    = 'mpeg|mpg|mpe|qt|mov|avi|movie|3g2|3gp|mp4|m4a|f4v|flv|webm|vlc|wmv|ogg|wma';
    // $config['max_size']      = 100;
    $config['file_name']        = 'investvid_' . now();
    $config['file_ext_tolower'] = true;

    $this->load->library('upload', $config);

    // Process upload data
    if ($this->upload->do_upload('uploadVideo')) {
			// Get upload data
			$uploadData = $this->upload->data();
			$filename   = $uploadData['file_name'];

			// Set resource URL
			$sourceUrl  = base_url('assets/uploads/video/' . $filename);

			// Save data
			$this->db->insert('video', [
				'user_id' 	 => $userId,
				'source_url' => $sourceUrl
			]);

			// Return results
			$videoId = $this->db->insert_id();
			echo json_encode([
				'videoId'   => $videoId,
				'sourceUrl' => $sourceUrl
			]);
    }
		// Handle errors
		else {
			echo json_encode([
				'error' => $this->upload->display_errors()
			]);
    }
	}

	/**
	 * Upload profile avatar onto the server.
	 */
	private function uploadAvatar()
	{
		$this->load->helper('date');

		// Get user id
		$userId = $this->session->userdata('userId');
		if (empty($userId)) {
			echo json_encode([ 'error' => 'Please login your account.' ]);
			return;
		}

		// Call the upload library
		$config['upload_path']      = FCPATH . 'assets/uploads/avatar/';
		$config['allowed_types']    = 'jpeg|jpg|jpg2|png';
		// $config['max_size']      = 100;
		$config['file_name']        = 'useravatar_' . now();
		$config['file_ext_tolower'] = true;

		$this->load->library('upload', $config);

		// Process upload data
		if ($this->upload->do_upload('uploadImage')) {
			// Get upload data
			$uploadData = $this->upload->data();
			$filename   = $uploadData['file_name'];

			// Set resource URL
			$sourceUrl  = base_url('assets/uploads/avatar/' . $filename);

			// Update user avatar
			$this->db->where('id', $userId);
			$this->db->update('user', [
				'avatar_url' => $sourceUrl
			]);

			// Return results
			echo json_encode([
				'sourceUrl' => $sourceUrl
			]);
		}
		// Handle errors
		else {
			echo json_encode([
				'error' => $this->upload->display_errors()
			]);
		}
	}
}
