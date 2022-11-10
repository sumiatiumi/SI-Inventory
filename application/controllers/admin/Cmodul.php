<?php

class Cmodul extends CI_Controller {

	public function __construct(){
		parent::__construct();
    	$this->load->model("m_modul");
    	$this->load->library('form_validation');
        $this->load->library('session');
	}


	public function index(){
		$data['modul'] = $this->m_modul->index();
		$data['mod'] = $this->m_modul->getDocument();
		$this->load->view('admin/vmodul', $data);
	}


	public function document(){
		$this->load->view('admin/vmodul', $data);
    }


	public function edit($id) {
		$where = array('id_modul' =>$id);
		$data['modul'] = $this->m_modul->edit_data($where, 'tb_modul_praktikum')->result();
		$this->load->view('admin/edit/modul_edit', $data);
	}


	public function update_data() {
		$id_modul = $this->input->post('id_modul');

		if(empty($_FILES['document']['name'])){
			$data= [
				'nama_modul' => set_value('nama_modul'),
				'prodi'      => set_value('prodi'),
				'tahun'      => set_value('tahun'),
				'semester'   => set_value('semester')
			];

			$where = array('id_modul' => $id_modul);

			$this->m_modul->update_data($where, $data,'tb_modul_praktikum');
			$this->session->set_flashdata('sukses','Berkas berhasil diubah');

			redirect('admin/cmodul');
		}else{
			$config['upload_path']   = './assets/document' ;
			$config['allowed_types'] = 'doc|docx|pdf|xls|xlsx|ppt|ppt|zip|rar' ;
			$config['max_size']      = '0'; //ukuran maksimal file
			$config['max_width']     = '0';
			$config['max_height']    = '0';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('document')) {
				$error = array('error' =>$this->upload->display_errors());
				$this->load->view('admin/modul', $error);

			}else{
				$file= $this->upload->data();
				$data= [
					'document' => $file ['file_name'],
					'nama_modul' => set_value('nama_modul'),
					'prodi'      => set_value('prodi'),
					'tahun'      => set_value('tahun'),
					'semester'   => set_value('semester')
				];

				$where = array('id_modul' => $id_modul);

				$this->m_modul->update_data($where, $data,'tb_modul_praktikum');
				$this->session->set_flashdata('sukses','Berkas berhasil diubah');

				redirect('admin/cmodul');
			}
		}
	}


	public function delete($id=null){
		if (!isset($id)) show_404();

		if ($this->m_modul->delete($id)) {
        $this->session->set_flashdata('hapus','Berkas berhasil dihapus');

		redirect(site_url('admin/cmodul'));
		}
	}


	  public function search(){
			$keyword = $this->input->post('keyword');
			$data['modul']=$this->m_modul->get_keyword($keyword);
		    $this->load->view('admin/vmodul',$data);

		    }


      public function pencarian(){
           $prodi=$this->input->get('prodi');
           $semester=$this->input->get('semester');
           $data['modul'] = $this->m_modul->pencarian_d($prodi,$semester)->result();
           $this->load->view("admin/filter/filter_modul",$data); // ini view menampilkan hasil pencarian
    }

 }
 ?>
