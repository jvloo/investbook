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

		echo $this->session->userdata('userId');

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
}
