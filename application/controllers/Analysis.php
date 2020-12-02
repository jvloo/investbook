<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analysis extends CI_Controller
{
	public function comment()
	{
		$root = FCPATH;

		$videoId   = $this->input->post('videoId');
		$commentId = $this->input->post('commentId');

		// $videoId   = 2;
		// $commentId = 1;

		// Get content of the comment
		$ch   = curl_init(api_url('analysis/comment/get'));
		$data = http_build_query([
			'comment_id' => $commentId
		]);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$comment = json_decode(curl_exec($ch), true);
		$content = $comment[0]['content'] ?? '';

		// Get all comments of the video
		$ch   = curl_init(api_url('analysis/comment/get'));
		$data = http_build_query([
			'video_id' => $videoId
		]);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$response = json_decode(curl_exec($ch), true);

		$comments = [];
		foreach ($response as $comment) {
			$comments[] = $comment['content'];
		}

		// Run analysis
		$data = [
			'content'  => $content,
			'comments' => $comments
		];

		$response = shell_exec("python $root/src/sentiAnalysis.py " . base64_encode(json_encode($data)));
		$response = json_decode($response, true);

		$score    = $response['score'];
		$keywords = $response['keywords'];

		print_r($response);
		return;

		// Update the score of the comment
		$ch   = curl_init(api_url('analysis/comment/update'));
		$data = http_build_query([
			'comment_id' => $commentId,
			'score'      => $score
		]);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		curl_exec($ch);

		// Set the comment as last comment of the video
		$this->setVideoLastComment($commentId, $videoId);

		// Refresh keywords of the video
		foreach ($keywords as $keyword) {
			$content = $keyword[0];
			$count   = $keyword[1];

			// Check if keyword already exists
			$ch   = curl_init(api_url('analysis/keyword/get'));
			$data = http_build_query([
				'video_id' => $videoId,
				'content'  => $content
			]);

			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			$keyword = json_decode(curl_exec($ch), true);

			if (! empty($keyword)) {
				// Update keyword count
				$ch   = curl_init(api_url('analysis/keyword/get'));
				$data = http_build_query([
					'keyword_id' => $keyword[0]['id'],
					'count'      => $count
				]);

				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

				curl_exec($ch);
			}
			// Create new keyword
			else {
				$ch   = curl_init(api_url('analysis/keyword/post'));
				$data = http_build_query([
					'video_id' => $videoId,
					'content'  => $content,
					'count'    => $count
				]);

				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

				curl_exec($ch);
			}
		}

		// Update the metric score of the video
		$this->updateMetricScore($videoId);
	}

	public function reaction()
	{
		$videoId = $this->input->post('videoId');
		$this->updateMetricScore($videoId);
	}

	// -----------------------------------------------------------------------

	/**
	 * Set the comment as last comment of the video
	 *
	 * @param int $commentId Comment to be set as last comment
	 * @param int $videoId   Target video
	 */
	private function setVideoLastComment($commentId, $videoId)
	{
		// Get metric of the video
		$ch   = curl_init(api_url('analysis/metric/get'));
		$data = http_build_query([
			'video_id' => $videoId
		]);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$metric = json_decode(curl_exec($ch), true);

		// Check if metric already exists
		if (! empty($metric)) {
			$metricId = $metric[0]['id'];
		}
		// Create new metric
		else {
			$ch   = curl_init(api_url('analysis/metric/post'));
			$data = http_build_query([
				'video_id' => $videoId
			]);

			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			$metric   = json_decode(curl_exec($ch), true);
			$metricId = $metric[0]['id'];
		}

		// Set last comment id
		$ch   = curl_init(api_url('analysis/metric/update'));
		$data = http_build_query([
			'metric_id'       => $metricId,
			'metric'				  => ['comment_last_id' => $commentId]
		]);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		curl_exec($ch);
	}

	/**
	 * Update metric score of the video
	 *
	 * @param  int $videoId Target video
	 * @return [type]          [description]
	 */
	private function updateMetricScore($videoId)
	{
		// Get video metric
		$ch   = curl_init(api_url('analysis/metric/get'));
		$data = http_build_query([
			'videoId' => $videoId
		]);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$metric   = json_decode(curl_exec($ch), true);

		if (empty($metric)) {
			$ch   = curl_init(api_url('analysis/metric/post'));
			$data = http_build_query([
				'video_id' => $videoId
			]);

			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			$metric   = json_decode(curl_exec($ch), true);
			$metricId = $metric[0]['id'];
		}

		else {
			$metricId = $metric[0]['id'];
			unset($metric[0]['id']);

			$metric = $metric[0];
		}

		// Check if last comment counted in metric
		$updateCommentMetric = false;

		$ch   = curl_init(api_url('analysis/comment/get_last'));
		$data = http_build_query([
			'videoId' => $videoId
		]);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$lastComment = json_decode(curl_exec($ch), true);

		// If last comment not counted, update the comment metric
		if (! empty($lastComment)) { // && $lastComment['id'] != $metric['comment_last_id']) {
			$updateCommentMetric = true;

			// Get all comments of the video
			$ch   = curl_init(api_url('analysis/comment/get'));
			$data = http_build_query([
				'videoId' => $videoId
			]);

			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			$comments = json_decode(curl_exec($ch), true);

			// Calculate positive and negative comment counts
			$commentPosCount = 0;
			$commentNegCount = 0;

			foreach ($comments as $comment) {
				// Record positive comment with score >= 0 (positive)
				if ($comment['score'] > 0) {
					$commentPosCount++;
				}
				// Record positive comment with score < 0 (negative)
				if ($comment['score'] < 0) {
					$commentNegCount++;
				}

				// NOTE: Skip the neutral score, 0
			}

			// Update the video metric
			$metric['comment_pos_count'] = $commentPosCount;
			$metric['comment_neg_count'] = $commentNegCount;
			$metric['comment_last_id']   = $lastComment['id'];
		}

		// Check if last reaction counted in metric
		$updateReactionMetric = false;

		// $lastReaction = $this->db
		$ch   = curl_init(api_url('analysis/reaction/get_last'));
		$data = http_build_query([
			'videoId' => $videoId
		]);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$lastReaction = json_decode(curl_exec($ch), true);

		// If last reaction not counted, update the comment metric
		if (! empty($lastReaction)) { // && $lastReaction['id'] != $metric['reaction_last_id']) {
			$updateReactionMetric = true;

			// Get all reactions of the video
			$ch   = curl_init(api_url('analysis/reaction/get'));
			$data = http_build_query([
				'videoId' => $videoId
			]);

			// Attach encoded JSON string to the POST fields
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			$reactions = json_decode(curl_exec($ch), true);

			// Calculate positive and negative reaction counts
			$reactionPosCount = 0;
			$reactionNegCount = 0;

			foreach ($reactions as $reaction) {
				// Record positive reaction, 1
				if ($reaction['type'] == 1) {
					$reactionPosCount++;
				}
				// Record positive reaction, 0
				if ($reaction['type'] == 0) {
					$reactionNegCount++;
				}
			}

			// Update the video metric
			$metric['reaction_pos_count'] = $reactionPosCount;
			$metric['reaction_neg_count'] = $reactionNegCount;
			$metric['reaction_last_id']   = $lastReaction['id'];
		}

		// Update the total metric score (positiveness)
		if ($updateCommentMetric OR $updateReactionMetric) {

			// Calculate the comment positiveness percent
			if ($updateCommentMetric) {
				$metric['comment_pos_percent'] = ($commentPosCount / count($comments)) * 100;
				$metric['comment_neg_percent'] = ($commentNegCount / count($comments)) * 100;
			}
			// Calculate the reaction positiveness percent
			if ($updateReactionMetric) {
				$metric['reaction_pos_percent'] = ($reactionPosCount / count($reactions)) * 100;
				$metric['reaction_neg_percent'] = ($reactionNegCount / count($reactions)) * 100;
			}

			// Calculate the positiveness by ratio (comment = 8; reaction = 2)
			$metric['positiveness'] = ($metric['comment_pos_percent'] * 8/10) + ($metric['reaction_pos_percent'] * 2/10);

			// Calculate the negativeness by ratio  (comment = 7; reaction = 3)
			$metric['negativeness']  = ($metric['comment_neg_percent'] * 8/10) + ($metric['reaction_neg_percent'] * 2/10);

			// Make a final update on metric score
			$ch   = curl_init(api_url('analysis/metric/update'));
			$data = http_build_query([
				'metric_id' => $metricId,
				'metric'    => $metric
			]);

			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			curl_exec($ch);

			// Generate results
			$responseText  = 'Comment +ve %: ' . $metric['comment_pos_percent'] . "\n";
			$responseText .= 'Comment -ve %: ' . $metric['comment_neg_percent'] . "\n\n";

			$responseText .= 'Reaction +ve %: ' . $metric['reaction_pos_percent'] . "\n";
			$responseText .= 'Reaction -ve %: ' . $metric['reaction_neg_percent'] . "\n\n";

			$responseText .= 'Overall Positiveness (%): ' . $metric['positiveness'] . "\n";
			$responseText .= 'Overall Negativeness (%): ' . $metric['negativeness'] ;

			echo json_encode([
				'plainText'  => $responseText,
				'metric'     => $metric,
				'metricData' => json_encode($metric)
			]);
		}
	}
}
