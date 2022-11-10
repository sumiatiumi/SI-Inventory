<?php
/**
 * 
 */
class Upload_file extends CI_Controller
{
	
	function __construct(){
        parent::__construct();  
        $this->load->helper(array('form', 'url'));    
        $this->load->model("m_modul");
    
    }
		

    public function index(){
    	$this->load->view('admin/modul', array('error'=> ''));
    }

    public function tambah_aksi(){
    	$config['upload_path']   = './assets/document' ;
    	$config['allowed_types'] = 'doc|docx|pdf|xls|xlsx|ppt|ppt|zip|rar' ;
        $config['max_size']      = '0'; //ukuran maksimal file
        $config['max_width']     = '0';
        $config['max_height']    = '0';

    	$this->load->library('upload', $config);

    	if (!$this->upload->do_upload('document')) {
    		# code...
    		$error = array('error' =>$this->upload->display_errors());
    		$this->load->view('admin/modul', $error);
    	}else{
    		$file= $this->upload->data();
    		$data= ['document'   => $file ['file_name'],
    				'nama_modul' => set_value('nama_modul'),
                    'prodi'      => set_value('prodi'),
                    'tahun'      => set_value('tahun'),
                    'semester'   => set_value('semester')

    	];

    		$this->m_modul->input($data);
            $this->session->set_flashdata('sukses','Berkas berhasil disimpan');
    		redirect('admin/cmodul');

    }

    }
}
