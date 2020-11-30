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
		$ch   = curl_init(api_url('frontend/user/get'));
		$data = http_build_query([
			'userId' => $userId
		]);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$user = json_decode(curl_exec($ch), true);

		if (empty($user['avatarUrl'])) {
			$user['avatarUrl'] = base_url('assets/img/ui/avatar-dummy.jpg');
		}

		// Load page view file
		$this->load->view('main/account', ['user' => $user]);
	}
}
