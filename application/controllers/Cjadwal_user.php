<?php

class Cjadwal_user extends CI_Controller {

	public function __construct(){
		parent::__construct();
    	$this->load->model("m_jadwal");
    	$this->load->library('form_validation');
    	 $this->load->helper('url');
        $this->load->library('session');

	}


	public function index(){
		$data['tb_jadwal'] = $this->m_jadwal->index();
		$this->load->view('user/jadwal_user', $data);
	}

}