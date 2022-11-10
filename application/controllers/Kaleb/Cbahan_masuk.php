<?php

class Cbahan_masuk extends CI_Controller {

    public function __construct(){
    parent::__construct();

    $this->load->model("m_bahanmasuk");
    $this->load->library('form_validation');
    $this->load->library('session');
    }


    public function index(){
      $data["tb_bahanmasuk"] = $this->m_bahanmasuk->index();
      $this->load->view("kaleb/vbahan_masuk", $data);
    }


    public function tambah(){
        $this->load->view('kaleb/new/bahanmasuknew');
    }


     public function add() {
        $bahan_masuk = $this->m_bahanmasuk;
        $bahan_masuk->save();
        echo "<script>alert('Data berhasil disimpan.')</script>";
        redirect(base_url('kaleb/cbahan_masuk'));
    }

    public function edit($id){
      $where = array('id_bahanmasuk' => $id);
      $data['tb_bahanmasuk']   = $this->m_bahanmasuk->edit_data($id);
      $this->load->view('kaleb/edit/bahan_masukedit',$data);
    }


    public function update(){

        $id_bahanmasuk   = $this->input->post('id_bahanmasuk');
        $kode_barang     = $this->input->post('kode_barang');
        $nama_barang     = $this->input->post('nama_barang');
        $jumlah          = $this->input->post('jumlah');
        $asal_barang     = $this->input->post('asal_barang');
        $tanggal_masuk   = $this->input->post('tanggal_masuk');
        

      $data = array(
            'kode_barang'    => $kode_barang,
            'nama_barang'    => $nama_barang,
            'jumlah'         => $jumlah,
            'asal_barang'    => $asal_barang,
            'tanggal_masuk'  => $tanggal_masuk);
     $where = array('id_bahanmasuk' => $id_bahanmasuk  );
     $this->m_bahanmasuk->update_data($where, $data, 'tb_bahanmasuk');
     $this->session->set_flashdata('update','Data berhasil diupdate');
     redirect('kaleb/cbahan_masuk/index');

     }


    public function delete($id=null) {
      if (!isset($id)) show_404();
      if ($this->m_bahanmasuk->delete($id)) {
         redirect(site_url('kaleb/cbahan_masuk'));
    }
    }

    public function search(){
			$keyword = $this->input->post('keyword');
			$data['tb_bahanmasuk']=$this->m_bahanmasuk->get_keyword($keyword);
		    $this->load->view('kaleb/vbahan_masuk',$data);

		    }

    }
