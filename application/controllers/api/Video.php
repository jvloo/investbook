<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller
{
	/**
	 * Get all video
	 * @return [type] [description]
	 */
	public function get()
	{
		$this->load->helper('date');

		// Get video info
		$videoList = $this->db
			->get('video')
			->result_array();

		// Generate results
		$results = [];

		foreach ($videoList as $video) {
			// Parse video datetime
			$dateUnix = mysql_to_unix($video['created_date']);

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
			$authorId = $video['user_id'];

			$author = $this->db
				->where('id', $authorId)
				->get('user')
				->row_array();

			if (empty($author['avatar_url'])) {
				$author['avatar_url'] = base_url('assets/img/ui/avatar-dummy.jpg');
			}

			// Get video metric
			$metric = $this->db
				->where('video_id', $video['id'])
				->get('metric')
				->row_array();

			// Generate results
			$results[] = [
				'videoId'    => $video['id'],
				'sourceUrl'  => $video['source_url'],
				'caption'    => $video['caption'],
				'author'     => [
						'authorId'  => $author['id'],
						'username'  => $author['username'],
						'avatarUrl' => $author['avatar_url']
				],
				'datetime'   => $datetime,
				'metric'     => $metric,
				'metricData' => htmlspecialchars(json_encode($metric))
			];
		}

		// Return results
		echo json_encode($results);
	}

	/**
	 * Create new video
	 * @return [type] [description]
	 */
	public function post()
	{
		$this->load->helper('date');

		$videoId = $this->input->post('videoId');
		$caption = $this->input->post('caption');

		// Update video
		$this->db->where('id', $videoId);
		$this->db->update('video', [
			'caption' => $caption,
			'published' => 1
		]);

		// Get video info
		$video = $this->db
			->where('id', $videoId)
			->get('video')
			->row_array();

		// Parse video datetime
		$datetime = timespan(mysql_to_unix($video['created_date']), now(), 1) . ' ago';

		// Get author info
		$authorId = $video['user_id'];

		$author = $this->db
			->where('id', $authorId)
			->get('user')
			->row_array();

		if (empty($author['avatar_url'])) {
			$author['avatar_url'] = base_url('assets/img/ui/avatar-dummy.jpg');
		}

		// Generate metric
		$metric = [
			'video_id'					   => $videoId,

			'reaction_pos_count'   => 0,
			'reaction_neg_count'   => 0,
			'reaction_pos_percent' => 50,
			'reaction_neg_percent' => 50,
			'reaction_last_id'     => 0,

			'comment_pos_count'    => 0,
			'comment_neg_count'    => 0,
			'comment_pos_percent'  => 50,
			'comment_neg_percent'  => 50,
			'comment_last_id'      => 0,

			'positiveness'			   => 50,
			'negativeness'			   => 50
		];

		$this->db->insert('metric', $metric);

		// Generate results
		echo json_encode([
			'videoId'   => $videoId,
			'sourceUrl' => $video['source_url'],
			'caption'   => $video['caption'],
			'author'    => [
				'authorId'  => $author['id'],
				'username'  => $author['username'],
				'avatarUrl' => $author['avatar_url']
			],
			'datetime'  => $datetime,
			'metric'     => $metric,
			'metricData' => htmlspecialchars(json_encode($metric))
		]);
	}
}
