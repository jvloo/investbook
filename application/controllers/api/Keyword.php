<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header("Access-Control-Allow-Origin: *");

class Keyword extends CI_Controller
{
	/**
	 * Get keyword of specific video
	 */
	public function get()
	{
		$videoId = $this->input->post('videoId');

		// Get all keywords
		$keywords = $this->db
			->where('video_id', $videoId)
			// ->order_by('id', 'DESC')
			->order_by('count', 'DESC')
			->limit(5)
			->get('keyword')
			->result_array();

		echo json_encode($keywords);
	}
}
