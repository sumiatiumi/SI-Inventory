<?php

class Upload_carousel extends CI_Controller
{
	
	function __construct() {
		# code...
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->model('m_carousel');
	}


    public function index(){
    	$this->load->view('admin/carousel', array('error'=> ''));
    }


    public function tambah_aksi(){
    	$config['upload_path']   = './assets/foto' ;
    	$config['allowed_types'] = 'jpg|png' ;

    	$this->load->library('upload', $config);

    	if (!$this->upload->do_upload('gambar')) {
    		# code...
    		$error = array('error' =>$this->upload->display_errors());
    		$this->load->view('admin/carousel', $error);
    	}else{
    		$file= $this->upload->data();
    		$data= ['gambar'        => $file ['file_name'],
    				'nama_carousel' => set_value('nama_carousel')
    	];

    		$this->m_carousel->input($data);
            $this->session->set_flashdata('sukses','Gambar berhasil disimpan');
    		redirect('admin/list_carousel');

    	}


    }
}
