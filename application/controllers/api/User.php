<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header("Access-Control-Allow-Origin: *");

class User extends CI_Controller
{
	/**
	 * Get specific user
	 * @return [type] [description]
	 */
	public function get()
	{
		$username = $this->input->post('username');
		$userId   = $this->input->post('userId');

		if (! empty($username)) {
			$this->db->where('username', $username);
		}

		if (! empty($userId)) {
			$this->db->where('id', $userId);
		}

		// Fetch user by username
		$user = $this->db->get('user')->row();

		if (empty($user)) {
			$results['exist'] = false;
		}

		// If user exists, return user information
		else {
			$results = [
				'userId' => $user->id,
				'username' => $user->username,
				'password' => $user->password,
				'fullName' => $user->full_name,
				'avatarUrl' => $user->avatar_url
			];

			// If user is owner of the username
			if (
				! empty($userId = $this->session->userdata('userId'))
				&& $userId == $user->id
			) {
				$results['exist'] = false;
			}
			// Else
			else {
				$results['exist'] = true;
			}
		}

		// Return results
		echo json_encode($results);
	}

	/**
	 * Create new user OR Login existing user
	 * @return [type] [description]
	 */
	public function post()
	{
		$action = strtolower($this->input->post('action'));

		$fullName  = $this->input->post('fullName');
		$username  = $this->input->post('username');
		$password  = $this->input->post('password');

		// Create new user
		if ($action == 'register') {
			$this->registerUser($fullName, $username, $password);
		}
		// Login existing user
		else if ($action == 'login') {
			$this->loginUser($username, $password);
		}
	}

	/**
	 * Register user function
	 */
	private function registerUser($fullName, $username, $password)
	{
		$data['full_name'] = $fullName;
		$data['username']  = $username;
		$data['password']  = password_hash($password, PASSWORD_BCRYPT); // Hash password

		// Create new user
		$this->db->insert('user', $data);
		// Get user id
		$userId = $this->db->insert_id();
		// Set user session
		$this->session->set_userdata('userId', $userId);

		// Return results
		echo json_encode([
			// 'redirectUrl' => site_url('main/account')
			'redirectUrl' => 'http://investbook.herokuapp.com/main/account',
			'userId'		  => $userId
		]);
	}

	/**
	 * Login user function
	 */
	private function loginUser($username, $password)
	{
		// Check if user exist
		$user = $this->db
			->where('username', $username)
			->get('user')
			->row();

		if (empty($user)) {
			echo json_encode([
				'errorMessage' => 'User does not exist in the system. Please register a new account.'
			]);
			return;
		}

		// Check user password
		if (password_verify($password, $user->password) == false) {
			echo json_encode([
				'errorMessage' => 'Wrong user password entered. Please check again.'
			]);
			return;
		}

		// Set user session
		$this->session->set_userdata('userId', $user->id);

		// Return results
		echo json_encode([
			// 'redirectUrl' => site_url('main')
			'redirectUrl' => 'http://investbook.herokuapp.com/main',
			'userId'		  => $userId
		]);
	}

	/**
	 * Update user function
	 */
	public function update()
	{
		$data['full_name'] = $this->input->post('fullName');
		$data['username']  = $this->input->post('username');

		if (! empty($pwd = $this->input->post('password'))) {
			$data['password']  = password_hash($pwd, PASSWORD_BCRYPT); // Hash password
		}

		// Update user
		$userId = $this->session->userdata('userId');

		$this->db->where('id', $userId);
		$this->db->update('user', $data);

		// Get updated info
		$user = $this->db
			->where('id', $userId)
			->get('user')
			->row();

		// Return results
		echo json_encode([
			'fullName' => $user->full_name,
			'username' => $user->username
		]);
	}
}
