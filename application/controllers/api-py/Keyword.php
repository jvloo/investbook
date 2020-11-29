<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keyword extends CI_Controller
{
	public function get()
	{
    if (! empty($videoId = $this->input->get('video_id'))) {
      $this->db->where('video_id', $videoId);
    }

		if (! empty($content = $this->input->get('content'))) {
			$this->db->like('content', $content);
		}

		echo json_encode($this->db->get('keyword')->result_array());
	}

	public function post()
	{
		$videoId = $this->input->get('video_id');
		$content = $this->input->get('content');
		$count   = $this->input->get('count');

		$this->db->insert('keyword', [
			'video_id' => $videoId,
			'content'  => $content,
			'count'    => $count
		]);

		echo json_encode([ 'id' => $this->db->insert_id() ];
	}

  public function update()
  {
    $keywordId = $this->input->get('keyword_id');
    $count     = $this->input->get('count');

    $this->db->where('id', $keywordId);
    $this->db->update('keyword', [ 'count' => $count ]);
  }
}
