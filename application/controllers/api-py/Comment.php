<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller
{
	public function get()
	{
    if (! empty($commentId = $this->input->get('comment_id'))) {
      $this->db->where('id', $commentId);
    }

    if (! empty($videoId = $this->input->get('video_id'))) {
      $this->db->where('video_id', $videoId);
    }

		echo json_encode($this->db->get('comment')->result_array());
	}

  public function update()
  {
    $commentId = $this->input->get('comment_id');
    $score     = $this->input->get('score');

    $this->db->where('id', $commentId);
    $this->db->update('comment', [ 'score' => $score ]);
  }
}
