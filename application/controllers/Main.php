<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{
	/**
	 * Home page
	 */
	public function index()
	{
		// If user NOT logged in, redirect to login page
		if (empty($this->session->userdata('userId'))) {
			redirect('account/login');
		}

		// Load page view file
		$this->load->view('main/home');
	}

	/**
	 * Account page
	 */
	public function account()
	{
		// If user NOT logged in, redirect to login page
		if (empty($userId = $this->session->userdata('userId'))) {
			redirect('account/login');
		}

		// Get user
		// $user = $this->db
		// 	->where('id', $userId)
		// 	->get('user')
		// 	->row_array();
		//
		// $user['username'] = '@'.$user['username'];

		// Create a new cURL resource
		$ch   = curl_init(api_url('user/get'));

		// Setup request to send JSON via POST
		$data = http_build_query([ 'userId' => $userId ]);

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
		$user     = json_decode($response, true);

		// Close cURL resource
		curl_close($ch);

		if (empty($user['avatarUrl'])) {
			$user['avatarUrl'] = base_url('assets/img/ui/avatar-dummy.jpg');
		}

		// Load page view file
		$this->load->view('main/account', ['user' => $user]);
	}
}
