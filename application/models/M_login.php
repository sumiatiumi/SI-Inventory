<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model{

	function cek_user($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		return $this->db->get('user');
	}
}
