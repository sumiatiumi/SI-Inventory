<?php

class Ckondisi extends CI_Controller{
 
	public function __construct(){
		parent::__construct();		
		$this->load->model("m_kondisi");
	}
 

	public function index(){
		$data["kondisi_barang"] = $this->m_kondisi->index();
		$this->load->view('admin/vkondisi', $data);
	}


	public function tambah(){
		$this->load->view("admin/new/kondisi_new");
	}


	public function add() {
		$kondi= $this->m_kondisi;
		$kondi->save();
		echo "<script>alert('Data berhasil disimpan.')</script>";	
		redirect(base_url('admin/ckondisi'));
	}


	public function edit($id){
		$where = array('id_kondisi' => $id);
		$data['kondisi_barang'] = $this->m_kondisi->edit_data($where,'kondisi_barang')->result();
		$this->load->view('admin/edit/kondisi_edit',$data);
	}


	public function update(){
		$id_kondisi = $this->input->post('id_kondisi');
		$kondisi    = $this->input->post('kondisi');
		$data       = array(
		  'kondisi' => $kondisi );

		$where = array('id_kondisi' => $id_kondisi  );
		$this->m_kondisi->update_data($where, $data, 'kondisi_barang');
		redirect('admin/ckondisi/index');
	}


	public function delete($id=null) {
		if (!isset($id)) show_404();

		if ($this->m_kondisi->delete($id)) {
			redirect(site_url('admin/ckondisi'));
		}
    }
}