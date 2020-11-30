<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller
{
	/**
	 * Register function
	 */
	public function register()
	{
		// If user logged in, redirect to home page
		if ($this->session->userdata('userId')) {
			redirect();
		}
		// Load page view file
		$this->load->view('account/register');
	}

	/**
	 * Login function
	 */
	public function login()
	{
		// If user logged in, redirect to home page
		if ($this->session->userdata('userId')) {
			redirect();
		}

		// Load page view file
		$this->load->view('account/login');
	}

	/**
	 * Logout function
	 */
	public function logout()
	{
		// Destroy user session
		$this->session->sess_destroy();
		// Redirect to login page
		redirect('account/login');
	}


	public function setsession()
	{
		$userId = $this->input->post('userId');
		$this->session->set_userdata('userId', $userId);

		echo json_encode([ 'userId' => $this->session->userdata('userId') ]);
	}
}
