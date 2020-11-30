<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('api_url'))
{
	/**
	 * API URL
	 *
	 * @param	string	$uri
	 * @param	string	$protocol
	 * @return	string
	 */
	function api_url($uri = '')
	{
		return get_instance()->config->item('api_url') . $uri;
	}
}

if ( ! function_exists('app_url'))
{
	/**
	 * API URL
	 *
	 * @param	string	$uri
	 * @param	string	$protocol
	 * @return	string
	 */
	function app_url($uri = '')
	{
		return get_instance()->config->item('app_url') . $uri;
	}
}
