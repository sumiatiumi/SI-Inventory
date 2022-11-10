<?php

class C_alat extends CI_Controller {

    public function __construct(){
    parent::__construct();

    $this->load->model("m_alat");
    $this->load->library('form_validation');
    $this->load->library('session');
    }


    public function index(){
      $data["tb_alat"] = $this->m_alat->index();
      $this->load->view("admin/v_alat", $data);
    }


    public function search(){
			$keyword = $this->input->post('keyword');
			$data['tb_bahan']=$this->m_bahan->get_keyword($keyword);
		    $this->load->view('admin/vbahan',$data);

		    }

    }
