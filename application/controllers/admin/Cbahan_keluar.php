<?php

class Cbahan_keluar extends CI_Controller {
 
    public function __construct(){
    parent::__construct();
        
    $this->load->model("m_bahankeluar");    
    $this->load->library('form_validation');
    $this->load->library('session');
    }
    
 
    public function index(){
      $data["tb_bahankeluar"] = $this->m_bahankeluar->index();
      $this->load->view("admin/vbahan_keluar", $data);
    }


    public function tambah(){
        $this->load->view('admin/new/bahankeluarnew');
    }


     public function add() {
        $bahan_keluar = $this->m_bahankeluar;
        $bahan_keluar->save();
        echo "<script>alert('Data berhasil disimpan.')</script>";   
        redirect(base_url('admin/cbahan_keluar'));
    }

    public function edit($id){
      $where = array('id_bahankeluar' => $id);
      $data['tb_bahankeluar']   = $this->m_bahankeluar->edit_data($id);
      $this->load->view('admin/edit/bahan_keluaredit',$data);
    }


    public function update(){
        
        $id_bahankeluar  = $this->input->post('id_bahankeluar');
        $kode_barang     = $this->input->post('kode_barang');
        $nama_barang     = $this->input->post('nama_barang');
        $jumlah          = $this->input->post('jumlah');
        $satuan          = $this->input->post('satuan');
        $lokasi_tujuan   = $this->input->post('lokasi_tujuan');
        $tanggal_keluar  = $this->input->post('tanggal_keluar');
       

      $data = array(
            'kode_barang'    => $kode_barang,
            'nama_barang'    => $nama_barang,
            'jumlah'         => $jumlah,
            'satuan'         => $satuan,
            'lokasi_tujuan'  => $lokasi_tujuan,
            'tanggal_keluar' => $tanggal_keluar);
            
     $where = array('id_bahankeluar' => $id_bahankeluar  );
     $this->m_bahankeluar->update_data($where, $data, 'tb_bahankeluar');
     $this->session->set_flashdata('update','Data berhasil diupdate');
     redirect('admin/cbahan_keluar/index');

     }


    public function delete($id=null) {
      if (!isset($id)) show_404();
      if ($this->m_bahankeluar->delete($id)) {
         redirect(site_url('admin/cbahan_keluar'));
    }
    }
    
    public function search(){
            $keyword = $this->input->post('keyword');
            $data['tb_bahankeluar']=$this->m_bahankeluar->get_keyword($keyword);
            $this->load->view('admin/vbahan_keluar',$data);

            }

    }
