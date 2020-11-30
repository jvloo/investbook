<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header("Access-Control-Allow-Origin: *");

class Reaction extends CI_Controller
{
	/**
	 * Get reaction of specific video
	 */
	public function get()
	{
		$videoId = $this->input->post('videoId');

		$likeCount = 0;
		$dislikeCount = 0;

		$userReaction = false;

		// Get user id
		$userId = $this->input->post('userId');

		// Get all reactions
		$reactions = $this->db
			->where('video_id', $videoId)
			->get('reaction')
			->result_array();

		foreach ($reactions as $reaction) {
			// Check if user has added reaction
			if ($reaction['user_id'] == $userId) {
				$userReaction = $reaction['type'];
			}

			// Count reactions
			if ($reaction['type'] == 0) {
				++$dislikeCount;
			} else if ($reaction['type'] == 1) {
				++$likeCount;
			}
		}

		// Generate results
		$results = [
			'videoId'      => $videoId,
			'likeCount'    => $likeCount,
			'dislikeCount' => $dislikeCount,
			'userReaction' => $userReaction
		];

		echo json_encode($results);
	}

	public function get_raw()
	{
		$videoId = $this->input->post('videoId');

		// Get all reactions
		$results = $this->db
			->where('video_id', $videoId)
			->get('reaction')
			->result_array();

		echo json_encode($results);
	}

	/**
	 * Get last comment of a specific video
	 */
	public function get_last()
	{
		$videoId = $this->input->post('videoId');

		// Get last comment
		$results = $this->db
			->where('video_id', $videoId)
			->order_by('created_date', 'DESC')
			->limit(1)
			->get('reaction')
			->row_array();

		// Return results
		echo json_encode($results);
	}

	/**
	 * Add new reaction on specific video
	 */
	public function post()
	{
		$likeReaction = $this->input->post('likeReaction');
		$dislikeReaction = $this->input->post('dislikeReaction');

		$videoId = $this->input->post('videoId');

		// Get user id
		$userId = $this->input->post('userId');
		if (empty($userId)) {
			echo json_encode([ 'error' => 'Please login your account.' ]);
			return;
		}

		// Delete existing reaction
		$this->db
			->where('video_id', $videoId)
			->where('user_id', $userId)
			->delete('reaction');

		// echo $likeReaction .' ' .$dislikeReaction;

		// update reaction
		if ($likeReaction == 'true' OR $dislikeReaction == 'true') {
			$userReaction = $likeReaction == 'true' ? 1 : 0;

			$this->db->insert('reaction', [
				'video_id' => $videoId,
				'user_id'  => $userId,
				'type'     => $userReaction
			]);
		}
	}
}
