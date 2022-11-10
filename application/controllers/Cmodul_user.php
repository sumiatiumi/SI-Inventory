<?php

class Cmodul_user extends CI_Controller {

	public function __construct(){
		parent::__construct();
    	$this->load->model("m_modul");
    	$this->load->library('form_validation');
    	 $this->load->helper('url');
        $this->load->library('session');

$this->load->helper('download');

	}


	public function index(){
		$data['modul'] = $this->m_modul->index();
		$data['mod'] = $this->m_modul->getDocument();
		$this->load->view('user/vmodul_user', $data);
	}




     function pencarian_user(){
           $prodi=$this->input->get('prodi');
           $semester=$this->input->get('semester');
           $tahun=$this->input->get('tahun');
           $data['modul'] = $this->m_modul->pencarian_u($prodi,$semester, $tahun)->result();
           $this->load->view("user/hasil_moduluser",$data); // ini view menampilkan hasil pencarian
    }



	public function download($id){
		$this->load->helper('download');
		$fileinfo = $this->m_modul->download($id);
		$file = './assets/document/'.$fileinfo['document'];

		if (file_exists($file)){
			$downloaded = $fileinfo['downloaded'] + 1;
			$this->m_modul->update_data(array('id_modul'=>$id), array('downloaded'=>$downloaded), 'tb_modul_praktikum');

			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($file));
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: private');
			header('Pragma: private');
			header('Content-Length: ' . filesize($file));
			ob_clean();
			flush();
			readfile($file);
			exit;
		}else{
			echo "<script>alert('File tidak ditemukan');window.history.back()</script>";
		}
	}
 }
 ?>
