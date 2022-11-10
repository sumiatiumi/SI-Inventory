<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_alat extends CI_Model {
    private $_table = "tb_alat";

    public $id_alatmasuk;
    public $kode_barang;
    public $nama_barang;
    public $jumlah;

    public function rules(){
        return [

            ['field' => 'id_alat',
            'label' => 'id_alat',
            'rules' => 'numeric'],

            ['field' => 'kode_barang',
            'label' => 'kode barang',
            'rules' => 'required'],

            ['field' => 'nama_barang',
            'label' => 'Nama barang',
            'rules' => 'required'],


            ['field' => 'jumlah',
            'label' => 'Jumlah',
            'rules' => 'required']
        ];
    }


    public function index(){
      $this->db->select('*');
      $this->db->from  ('tb_alat');
      $this->db->join  ('tb_spesifikasi', 'tb_spesifikasi.id_spesifikasi = tb_alat.id_spesifikasi');
      $this->db->join  ('kondisi_barang', 'kondisi_barang.id_kondisi = tb_alat.id_kondisi');
      $this->db->order_by('id_alat', 'desc');

        $query= $this->db->get();
        return $query->result();
    }


    public function getData(){
        $this->db->select("*");
        $this->db->from("tb_alat");
        $query = $this->db->get();
        return $query->result();
    }

    public function get_code($code){
        $this->db->select("jumlah");
        $this->db->from("tb_alat");
        $this->db->where('kode_barang', $code);
        $query = $this->db->get();
        return $query->row_array();
    }


   public function get_keyword($keyword){
        $this->db->select('p.*, q.*, r.*');
        $this->db->from  ('tb_alat p');
        $this->db->join  ('tb_spesifikasi q','p.id_spesifikasi=q.id_spesifikasi');
        $this->db->join  ('kondisi_barang r', 'p.id_kondisi=r.id_kondisi');
        $this->db->like('q.spesifikasi',$keyword);
        $this->db->or_like('p.kode_barang',$keyword);
        $this->db->or_like('p.nama_barang',$keyword);
        $this->db->or_like('p.jumlah',$keyword);
        $this->db->or_like('r.kondisi',$keyword);
       return $this->db->get()->result();

    }

    public function save() {
        $post = $this->input->post();
        $insert = [
            'kode_barang'=>$post['kode_barang'],
            'nama_barang'=>$post['nama_barang'],
            'id_spesifikasi'=>$post['id_spesifikasi'],
            'id_kondisi'=>$post['id_kondisi'],
            'jumlah'=>$post['jumlah']
        ];
        $this->db->insert('tb_alat', $insert);
    }

     function total_rows() {
    return $this->db->get('tb_alat')->num_rows();
  }


}
