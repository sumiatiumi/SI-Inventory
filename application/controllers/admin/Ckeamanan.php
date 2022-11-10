<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ckeamanan extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->view('admin/vkeamanan');
	}
public function tool() {
		if(! $this->session->userdata('validated')){
            redirect('admin/ckeamanan');
        }
		$this->load->helper('download');
		$this->load->dbutil();	
			
		$a['page']		= "vkeamanan";
		
		$mau_ke			= $this->uri->segment(3);
		
		if ($mau_ke == "backup") {
			$nama_file	= 'bck_inventory_'.date('Y-m-d-h-i-s');
			$prefs = array(
					'format'      => 'zip',             // gzip, zip, txt
					'filename'    => $nama_file.'.sql',    // File name - NEEDED ONLY WITH ZIP FILES
					'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
					'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
					'newline'     => "\n"               // Newline character used in backup file
				);

			$this->dbutil->backup($prefs);
			$backup =& $this->dbutil->backup(); 
			force_download($nama_file.'.zip', $backup);
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Backup database berhasil</div>");
			redirect('admin/ckeamanan/tool');
		} else if ($mau_ke == "optimize") {
			$result = $this->dbutil->optimize_database();
			if ($result !== FALSE) {
				$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Optimize database selesai</div>");
				redirect('admin/ckeamanan/tooll');
			} else {
				$this->session->set_flashdata("k", "<div class=\"alert alert-error\">Optimize database gagal</div>");
				redirect('admin/ckeamanan/tool');
			}
 		} else if ($mau_ke == "restore") {
		
		}
		
		$this->load->view('admin/aaa', $a);
	}
}