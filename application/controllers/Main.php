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
		$user = $this->db
			->where('id', $userId)
			->get('user')
			->row_array();

		$user['username'] = '@'.$user['username'];

		if (empty($user['avatar_url'])) {
			$user['avatar_url'] = base_url('assets/img/ui/avatar-dummy.jpg');
		}

		// Load page view file
		$this->load->view('main/account', ['user' => $user]);
	}
}
