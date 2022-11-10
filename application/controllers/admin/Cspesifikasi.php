<?php

class Cspesifikasi extends CI_Controller{
 
	public function __construct(){
		parent::__construct();		
		$this->load->model("m_spesifikasi");
    }
 

	public function index(){
		$data["tb_spesifikasi"] = $this->m_spesifikasi->index();
		$this->load->view('admin/vspesifikasi', $data);
	}


	public function tambah(){
		$this->load->view("admin/new/spesifikasi_new");
	}


	public function add(){
		$info = $this->m_spesifikasi;
		$info->save();
		echo "<script>alert('Data berhasil disimpan.')</script>";	
		redirect(base_url('admin/cspesifikasi'));
	}


	public function edit($id){
		$where = array('id_spesifikasi' => $id);
		$data['tb_spesifikasi'] = $this->m_spesifikasi->edit_data($where,'tb_spesifikasi')->result();
		$this->load->view('admin/edit/spesifikasi_edit',$data);
	}


	public function update(){
		$id_spesifikasi = $this->input->post('id_spesifikasi');
		$spesifikasi = $this->input->post('spesifikasi');

		$data = array(
			'spesifikasi' => $spesifikasi );

		$where = array('id_spesifikasi' => $id_spesifikasi  );

		$this->m_spesifikasi->update_data($where, $data, 'tb_spesifikasi');
		redirect('admin/cspesifikasi/index');
	}


	public function delete($id=null)
	{
		if (!isset($id)) show_404();

		if ($this->m_spesifikasi->delete($id)) {
			redirect(site_url('admin/cspesifikasi'));
		}
		
    }
}