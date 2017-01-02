<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth
{
	
	function __construct()
	{
		$this->ci =& get_instance();
	}

	function login_admin($username, $password)
	{
		$this->ci->db->select('*');
		$this->ci->db->where('username', $username);
		$this->ci->db->where('password', md5($password));
		$query = $this->ci->db->get('admin');

		if($query->num_rows() == 0)
		{
			return false;
		}
		else
		{
			$user_data = $query->row();
			$_SESSION['admin']['id_admin'] = $user_data->id_admin;
			redirect(base_url('home'));
			return true;
		}
	}

	function is_admin_logged_in()
	{
		if(isset($_SESSION['admin']))
		{
			return true;
		}
		else
		{

			return false;
		}

	}

	function restrict_admin()
	{
		if( $this->is_admin_logged_in() == false )
		{
			redirect('login');
		}
		else
		{
			return true;
		}
	}

}