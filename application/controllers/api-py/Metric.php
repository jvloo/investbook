<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metric extends CI_Controller
{
	public function get()
	{
    if (! empty($videoId = $this->input->get('video_id'))) {
      $this->db->where('video_id', $videoId);
    }

		echo json_encode($this->db->get('metric')->result_array());
	}

	public function post()
	{
		$videoId = $this->input->get('video_id');

		$this->db->insert('metric', [
			'video_id' => $videoId,
			'reaction_pos_count'	 => 0,
			'reaction_neg_count'	 => 0,
			'reaction_pos_percent' => 50,
			'reaction_neg_percent' => 50,
			'reaction_last_id'		 => 0,
			'comment_pos_count' 	 => 0,
			'comment_neg_count' 	 => 0,
			'comment_pos_percent'	 => 50,
			'comment_neg_percent'	 => 50,
			'comment_last_id'			 => 0,
			'positiveness'				 => 50,
			'negativeness'				 => 50
		]);

		echo json_encode([ 'id' => $this->db->insert_id() ];
	}

  public function update()
  {
    $metricId  = $this->input->get('metric_id');
    $commentId = $this->input->get('comment_last_id');

    $this->db->where('id', $keywordId);
    $this->db->update('keyword', [ 'count' => $count ]);
  }
}
