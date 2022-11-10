<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_Alatkeluar extends CI_Model {

    private $_table = "tb_alatkeluar";

    public $id_alatkeluar;
    public $kode_barang;
    public $nama_barang;
    public $nomor_pengadaan;
    public $document;
    public $jumlah; 
    public $lokasi;
    public $tanggal_keluar;

    public function rules(){
        return [

            ['field' => 'id_alatkeluar',
            'label' => 'id_alatkeluar',
            'rules' => 'numeric'],

            ['field' => 'kode_barang',
            'label' => 'kode barang',
            'rules' => 'required'],

            ['field' => 'nama_barang',
            'label' => 'Nama barang',
            'rules' => 'required'],

            ['field' => 'nomor_pengadaan',
            'label' => 'Nomor Pengadaan',
            'rules' => 'required'],

            ['field' => 'jumlah',
            'label' => 'Jumlah',
            'rules' => 'required'],

             ['field' => 'lokasi',
            'label' => 'Lokasi',
            'rules' => 'required'],

             ['field' => 'tanggal_keluar',
            'label' => 'Tanggal keluar',
            'rules' => 'required']

        ];
    }


   public function index(){
      $this->db->select('*');
      $this->db->from  ('tb_alatkeluar');
      $this->db->join  ('tb_spesifikasi', 'tb_spesifikasi.id_spesifikasi = tb_alatkeluar.id_spesifikasi');
      $this->db->join  ('kondisi_barang', 'kondisi_barang.id_kondisi =tb_alatkeluar.id_kondisi');
      $this->db->order_by('tanggal_keluar', 'desc');

        $query= $this->db->get();
        return $query->result();
    }


    public function getData(){
        $this->db->select("*");
        $this->db->from("tb_alatkeluar");
        $query = $this->db->get();
        return $query->result();
    }

    //fungsi menghapus data
    public function delete($id){
        return $this->db->delete('tb_alatkeluar', array("id_alatkeluar" => $id));
    }

    //fungsi menyimpan data
    public function save(){
        $post = $this->input->post();
        $this->kode_barang = $post["kode_barang"];
        $this->nama_barang = $post["nama_barang"];
        $this->id_spesifikasi = $post["id_spesifikasi"];
        $this->id_kondisi = $post["id_kondisi"];
        $this->jumlah = $post["jumlah"];
        $this->lokasi = $post["lokasi"];
        $this->tanggal_keluar = date("Y-m-d H:i");
        $this->nomor_pengadaan = $post["nomor_pengadaan"];
        $this->document = $this->_uploadDocument();
        $this->db->insert($this->_table, $this);
    }

    //fungsi edit data
  public function edit_data($id){
        $this->db->select('a.*, b.*, c.*');
        $this->db->from  ('tb_alatkeluar a');
        $this->db->join  ('tb_spesifikasi b','a.id_spesifikasi=b.id_spesifikasi');
        $this->db->join  ('kondisi_barang c', 'a.id_kondisi=c.id_kondisi');
        $this->db->where ('a.id_alatkeluar', $id);
        $query = $this->db->get();
        return $query->result();
    }

    //fungsi update data
    public function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }




public function get_keyword($keyword){
        $this->db->select('p.*, q.*, r.*');
        $this->db->from  ('tb_alatkeluar p');
        $this->db->join  ('tb_spesifikasi q','p.id_spesifikasi=q.id_spesifikasi');
        $this->db->join  ('kondisi_barang r', 'p.id_kondisi=r.id_kondisi');
        $this->db->like('q.spesifikasi',$keyword);
        $this->db->or_like('p.kode_barang',$keyword);
        $this->db->or_like('p.nama_barang',$keyword);
        $this->db->or_like('p.nomor_pengadaan',$keyword);
        $this->db->or_like('p.jumlah',$keyword);
        $this->db->or_like('p.tanggal_keluar',$keyword);
        $this->db->or_like('p.lokasi',$keyword);
        $this->db->or_like('r.kondisi',$keyword);
       return $this->db->get()->result();

    }


 public function _uploadDocument() {
    $config['upload_path']   = './assets/document' ;
    $config['allowed_types'] = 'doc|docx|pdf|xls|xlsx|ppt|ppt|zip|rar' ;
    $config['overwrite']            = true;
    $config['max_size']      = '0'; //ukuran maksimal file
    $config['max_width']     = '0';
    $config['max_height']    = '0';
 

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('document')) {
        return $this->upload->data("file_name");
    }
    

}


//public function get_by_spesifikasi($id) {

   // $this->db->select('*');
    //  $this->db->from  ('tb_alatkeluar');
    //  $this->db->join  ('tb_spesifikasi', 'tb_spesifikasi.id_spesifikasi = tb_alatkeluar.id_spesifikasi');
     // $this->db->join  ('kondisi_barang', 'kondisi_barang.id_kondisi =tb_alatkeluar.id_kondisi');
   // $query = $this->db->where('tb_spesifikasi.id_spesifikasi ='.$id)->get();
   // return $query->result();

  //}

public function pencarian_d($id_spesifikasi){
    $this->db->where("id_spesifikasi",$id_spesifikasi);
    return $this->db->get("tb_alatkeluar");
    }

     function total_rows() {
    return $this->db->get('tb_alatkeluar')->num_rows();
  }

}