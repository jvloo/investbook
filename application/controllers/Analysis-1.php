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

    /**
     * Run sentimental analysis on the comment
     *
     * The Python script will calculate the metric score of the new comment,
     * then refresh the Top 5 keywords among all the comments of the video.
     */
		$data = [
			'videoId'   => $videoId,
			'commentId' => $commentId
		];

		// if (ENVIRONMENT == 'development') {
			$commentMetricScore = shell_exec("python $root/src/sentiAnalysis-MySQL.py " . base64_encode(json_encode($data)));
		// } else {
			// $commentMetricScore = shell_exec("python https://investbook.herokuapp.com/src/sentiAnalysis-API.py " . base64_encode(json_encode($data)));
		// }

		// Update the metric score of the video
		$this->updateMetricScore($videoId);
	}

	public function reaction()
	{
		$videoId = $this->input->post('videoId');
		$this->updateMetricScore($videoId);
	}

	private function updateMetricScore($videoId)
	{
		// Get video metric
		// $metric = $this->db
		// 	->where('video_id', $videoId)
		// 	->get('metric')
		// 	->row_array();

		// Create a new cURL resource
		$ch   = curl_init(api_url('metric/get'));

		// Setup request to send JSON via POST
		$data = http_build_query([ 'videoId' => $videoId ]);

		$payload = json_encode([ 'data' => $data ]);

		// Attach encoded JSON string to the POST fields
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

		// Set the content type to application/json
		// curl_setopt($ch, CURLOPT_HTTPHEADER, [ 'Content-Type:application/json' ]);

		// Return response instead of output string
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		// Execute the POST request
		$response = curl_exec($ch);
		$metric   = json_decode($response, true);

		// Close cURL resource
		curl_close($ch);

		if (empty($metric)) {
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

			// $this->db->insert('metric', $metric);
			// $metricId = $this->db->insert_id();

			// Create a new cURL resource
			$ch   = curl_init(api_url('metric/post'));

			// Setup request to send JSON via POST
			$data = http_build_query($metric);
			$payload = json_encode([ 'data' => $data ]);

			// Attach encoded JSON string to the POST fields
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

			// Set the content type to application/json
			// curl_setopt($ch, CURLOPT_HTTPHEADER, [ 'Content-Type:application/json' ]);

			// Return response instead of output string
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			// Execute the POST request
			$response = curl_exec($ch);
			$metric   = json_decode($response, true);

			$metricId = $metric['id'];
		}

		else {
			$metricId = $metric['id'];
			unset($metric['id']);
		}

		// Check if last comment counted in metric
		$updateCommentMetric = false;

		// $lastComment = $this->db
		// 	->where('video_id', $videoId)
		// 	->order_by('created_date', 'DESC')
		// 	->limit(1)
		// 	->get('comment')
		// 	->row_array();
		// Create a new cURL resource
		$ch   = curl_init(api_url('comment/get_last'));

		// Setup request to send JSON via POST
		$data = http_build_query([ 'videoId' => $videoId ]);
		$payload = json_encode([ 'data' => $data ]);

		// Attach encoded JSON string to the POST fields
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

		// Set the content type to application/json
		// curl_setopt($ch, CURLOPT_HTTPHEADER, [ 'Content-Type:application/json' ]);

		// Return response instead of output string
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		// Execute the POST request
		$response    = curl_exec($ch);
		$lastComment = json_decode($response, true);

		// If last comment not counted, update the comment metric
		if (! empty($lastComment)) { // && $lastComment['id'] != $metric['comment_last_id']) {
			$updateCommentMetric = true;

			// Get all comments of the video
			// $comments = $this->db
			// 	->where('video_id', $videoId)
			// 	->get('comment')
			// 	->result_array();
			// Create a new cURL resource
			$ch   = curl_init(api_url('comment/get'));

			// Setup request to send JSON via POST
			$data = http_build_query([ 'videoId' => $videoId ]);
			$payload = json_encode([ 'data' => $data ]);

			// Attach encoded JSON string to the POST fields
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

			// Set the content type to application/json
			// curl_setopt($ch, CURLOPT_HTTPHEADER, [ 'Content-Type:application/json' ]);

			// Return response instead of output string
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			// Execute the POST request
			$response = curl_exec($ch);
			$comments = json_decode($response, true);

			// Calculate positive and negative comment counts
			$commentPosCount = 0;
			$commentNegCount = 0;

			foreach ($comments['comments'] as $comment) {
				// echo $comment['score'];

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
		// 	->where('video_id', $videoId)
		// 	->order_by('created_date', 'DESC')
		// 	->limit(1)
		// 	->get('reaction')
		// 	->row_array();
		// Create a new cURL resource
		$ch   = curl_init(api_url('reaction/get_last'));

		// Setup request to send JSON via POST
		$data = http_build_query([ 'videoId' => $videoId ]);
		$payload = json_encode([ 'data' => $data ]);

		// Attach encoded JSON string to the POST fields
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

		// Set the content type to application/json
		// curl_setopt($ch, CURLOPT_HTTPHEADER, [ 'Content-Type:application/json' ]);

		// Return response instead of output string
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		// Execute the POST request
		$response     = curl_exec($ch);
		$lastReaction = json_decode($response, true);

		// If last reaction not counted, update the comment metric
		if (! empty($lastReaction)) { // && $lastReaction['id'] != $metric['reaction_last_id']) {
			$updateReactionMetric = true;

			// Get all reactions of the video
			// $reactions = $this->db
			// 	->where('video_id', $videoId)
			// 	->get('reaction')
			// 	->result_array();
			// Create a new cURL resource
			$ch   = curl_init(api_url('reaction/get_raw'));

			// Setup request to send JSON via POST
			$data = http_build_query([ 'videoId' => $videoId ]);
			$payload = json_encode([ 'data' => $data ]);

			// Attach encoded JSON string to the POST fields
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

			// Set the content type to application/json
			// curl_setopt($ch, CURLOPT_HTTPHEADER, [ 'Content-Type:application/json' ]);

			// Return response instead of output string
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			// Execute the POST request
			$response  = curl_exec($ch);
			$reactions = json_decode($response, true);

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

			if ($updateCommentMetric) {
				// Calculate the comment positiveness percent
				$metric['comment_pos_percent'] = ($commentPosCount / count($comments)) * 100;
				$metric['comment_neg_percent'] = ($commentNegCount / count($comments)) * 100;
			}

			if ($updateReactionMetric) {
				// Calculate the reaction positiveness percent
				$metric['reaction_pos_percent'] = ($reactionPosCount / count($reactions)) * 100;
				$metric['reaction_neg_percent'] = ($reactionNegCount / count($reactions)) * 100;
			}

			// Calculate the positiveness by ratio (comment = 8; reaction = 2)
			$metric['positiveness'] = ($metric['comment_pos_percent'] * 8/10) + ($metric['reaction_pos_percent'] * 2/10);

			// Calculate the negativeness by ratio  (comment = 7; reaction = 3)
			$metric['negativeness']  = ($metric['comment_neg_percent'] * 8/10) + ($metric['reaction_neg_percent'] * 2/10);

			// Make a final update on metric score
			// $this->db->where('id', $metricId);
			// $this->db->update('metric', $metric);

			// Create a new cURL resource
			$ch   = curl_init(api_url('reaction/get'));

			// Setup request to send JSON via POST
			$data = http_build_query([ 'metricId' => $metricId, 'metric' => $metric ]);
			$payload = json_encode([ 'data' => $data ]);

			// Attach encoded JSON string to the POST fields
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

			// Set the content type to application/json
			// curl_setopt($ch, CURLOPT_HTTPHEADER, [ 'Content-Type:application/json' ]);

			// Return response instead of output string
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			// Execute the POST request
			curl_exec($ch);
			// $reactions = json_decode($response, true);

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
