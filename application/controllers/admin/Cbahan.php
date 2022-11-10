<?php

class Cbahan extends CI_Controller {

    public function __construct(){
    parent::__construct();

    $this->load->model("m_bahan");
    $this->load->library('form_validation');
    $this->load->library('session');
    }


    public function index(){
      $data["tb_bahan"] = $this->m_bahan->index();
      $this->load->view("admin/vbahan", $data);
    }


    public function tambah(){
        $this->load->view('admin/new/bahannew');
    }


     public function add() {
        $bahan = $this->m_bahan;
        $bahan->save();
        echo "<script>alert('Data berhasil disimpan.')</script>";
        redirect(base_url('admin/cbahan'));
    }

    public function edit($id){
      $where = array('id_bahan' => $id);
      $data['tb_bahan']   = $this->m_bahan->edit_data($id);
      $this->load->view('admin/edit/bahan_edit',$data);
    }


    public function update(){

        $id_bahan        = $this->input->post('id_bahan');
        $kode_barang     = $this->input->post('kode_barang');
        $nama_barang     = $this->input->post('nama_barang');
        $jumlah          = $this->input->post('jumlah');
        $jumlah          = $this->input->post('jumlah');
       
        

      $data = array(
            'kode_barang'    => $kode_barang,
            'nama_barang'    => $nama_barang,
            'jumlah'         => $jumlah,
            'satuan'         => $satuan);
        
     $where = array('id_bahan' => $id_bahan  );
     $this->m_bahan->update_data($where, $data, 'tb_bahan');
     $this->session->set_flashdata('update','Data berhasil diupdate');
     redirect('admin/cbahan/index');

     }


    public function delete($id=null) {
      if (!isset($id)) show_404();
      if ($this->m_bahan->delete($id)) {
         redirect(site_url('admin/cbahan'));
    }
    }

    public function search(){
			$keyword = $this->input->post('keyword');
			$data['tb_bahan']=$this->m_bahan->get_keyword($keyword);
		    $this->load->view('admin/vbahan',$data);

		    }

    }
