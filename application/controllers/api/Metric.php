<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header("Access-Control-Allow-Origin: *");

class Metric extends CI_Controller
{
	/**
	 * Get metric of a specific video
	 */
	public function get()
	{
		$videoId = $this->input->post('videoId');

		// Get video metric
		$results = $this->db
			->where('video_id', $videoId)
			->get('metric')
			->row_array();

		// Return results
		echo json_encode($results);
	}

	/**
	 * Create new metric on specific video
	 */
	public function post()
	{
		$data = $this->input->post();
		$this->db->insert('metric', $data);

		$metricId = $this->db->insert_id();

		echo json_encode([ 'id' => $metricId ]);
	}


	public function update()
	{
		$metricId = $this->input->post('metricId');
		$metric   = $this->input->post('metric');

		$this->db->where('id', $metricId);
		$this->db->update('metric', $metric);
	}
}
