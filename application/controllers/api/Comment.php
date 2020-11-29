<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller
{
	/**
	 * Get all comments of a specific video
	 */
	public function get()
	{
		$this->load->helper('date');

		$videoId = $this->input->post('videoId');

		// Get all comments
		$comments = $this->db
			->where('video_id', $videoId)
			->get('comment')
			->result_array();

		$results = [];

		foreach ($comments as $comment) {
			// Parse comment datetime
			$dateUnix = mysql_to_unix($comment['created_date']);

			$dateAfter1Week = strtotime('+1 week', $dateUnix);
			$dateAfter1Year = strtotime('+1 year', $dateUnix);

			if (now() >= $dateAfter1Week && now() < $dateAfter1Year) {
				$datetime = mdate('%m-%d', $dateUnix);
			} elseif (now() >= $dateAfter1Year) {
				$datetime = mdate('%Y-%m-%d', $dateUnix);
			} else {
				$datetime = timespan($dateUnix, now(), 1) . ' ago';
			}

			// Get author info
			$authorId = $comment['user_id'];

			$author = $this->db
				->where('id', $authorId)
				->get('user')
				->row_array();

			if (empty($author['avatar_url'])) {
				$author['avatar_url'] = base_url('assets/img/ui/avatar-dummy.jpg');
			}

			// Check if current user is the author
			$isOwner    = false;
			$currUserId = $this->session->userdata('userId');

			if ($authorId == $currUserId) {
				$isOwner = true;
			}

			// Construct results
			$results['comments'][] = [
				'videoId' => $comment['video_id'],
				'author'  => [
					'authorId'  => $author['id'],
					'username'  => $author['username'],
					'avatarUrl' => $author['avatar_url'],
					'isOwner'   => $isOwner ? '' : ' d-none'
				],
				'content'  => $comment['content'],
				'score'    => $comment['score'],
				'datetime' => $datetime
			];
		}

		// Get total comment count
		$results['commentCount'] = count($comments);

		// Return results
		echo json_encode($results);
	}

	/**
	 * Create new comment on specific video
	 */
	public function post()
	{
		$this->load->helper('date');

		$videoId = $this->input->post('videoId');
		$comment = $this->input->post('comment');

		// Get user id
		$userId = $this->session->userdata('userId');
		if (empty($userId)) {
			echo json_encode([ 'error' => 'Please login your account.' ]);
			return;
		}

		// Create new comment
		$this->db->insert('comment', [
			'video_id' => $videoId,
			'user_id'  => $userId,
			'content'  => $comment
		]);

		// Get comment id
		$commentId = $this->db->insert_id();

		// Get the comment created
		$comment = $this->db
			->where('id', $commentId)
			->get('comment')
			->row_array();

		// Get author info
		$authorId = $comment['user_id'];

		$author = $this->db
			->where('id', $authorId)
			->get('user')
			->row_array();

		if (empty($author['avatar_url'])) {
			$author['avatar_url'] = base_url('assets/img/ui/avatar-dummy.jpg');
		}

		// Check if current user is the author
		$isOwner    = false;
		$currUserId = $this->session->userdata('userId');

		if ($authorId == $currUserId) {
			$isOwner = true;
		}

		// Generate results
		$results = [
			'commentId' => $commentId,
			'videoId'   => $videoId,
			'author'    => [
				'authorId'  => $author['id'],
				'username'  => $author['username'],
				'avatarUrl' => $author['avatar_url'],
				'isOwner'   => $isOwner ? '' : ' d-none'
			],
			'content'   => $comment['content'],
			'datetime'  => timespan(mysql_to_unix($comment['created_date']), now(), 1)
		];

		echo json_encode($results);
	}
}
