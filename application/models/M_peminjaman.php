<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_peminjaman extends CI_Model {
    private $_table = "peminjaman";

    public $id_peminjaman;
    public $id_user;
    public $id_barang;
    public $jumlah;
    public $tanggal_pinjam;
    public $tanggal_kembali;
    public $status_pinjam;
    public $komfirmasi;

    public function rules(){
        return [

            ['field' => 'id_barangmasuk',
            'label' => 'Nama barang',
            'rules' => 'numeric'],

             ['field' => 'nama_peminjam',
            'label' => 'Nama peminjam',
            'rules' => 'required'],

            ['field' => 'kode_barang',
            'label' => 'kode barang',
            'rules' => 'required'],

            ['field' => 'nama_barang',
            'label' => 'Nama barang',
            'rules' => 'required'],

            ['field' => 'jumlah',
            'label' => 'Jumlah',
            'rules' => 'required'],

             ['field' => 'tanggal_pinjam',
            'label' => 'Tanggal pinjam',
            'rules' => 'required'],

             ['field' => 'tanggal_kembali',
            'label' => 'Tanggal Kembali',
            'rules' => 'required'],

             ['field' => 'status_pinjam',
            'label' => 'Status pinjam',
            'rules' => 'required'],

            ['field' => 'komfirmasi',
            'label' => 'Komfirmasi',
            'rules' => 'required']
        ];
    }


    public function index(){
        $this->db->select('peminjaman.id_peminjaman, peminjaman.jumlah, peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali,
            peminjaman.status_pinjam, peminjaman.komfirmasi, tb_alatmasuk.kode_barang, tb_alatmasuk.nama_barang,
            user.username, user.nama, tb_spesifikasi.spesifikasi');
        $this->db->from('peminjaman');
        $this->db->join('user', 'user.id_user = peminjaman.id_user');
        $this->db->join('tb_alatmasuk', 'tb_alatmasuk.id_alatmasuk = peminjaman.id_barang');
        $this->db->join('tb_spesifikasi', 'tb_spesifikasi.id_spesifikasi = tb_alatmasuk.id_spesifikasi');
        $this->db->order_by('peminjaman.tanggal_pinjam', 'desc');

        $query= $this->db->get();
        return $query->result();
    }

    public function get_user(){
        $this->db->select('peminjaman.id_peminjaman, peminjaman.jumlah, peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali,
            peminjaman.status_pinjam, peminjaman.komfirmasi, tb_alatmasuk.kode_barang, tb_alatmasuk.nama_barang,
            user.username, user.nama, tb_spesifikasi.spesifikasi');
        $this->db->from('peminjaman');
        $this->db->join('user', 'user.id_user = peminjaman.id_user');
        $this->db->join('tb_alatmasuk', 'tb_alatmasuk.id_alatmasuk = peminjaman.id_barang');
        $this->db->join('tb_spesifikasi', 'tb_spesifikasi.id_spesifikasi = tb_alatmasuk.id_spesifikasi');
        $this->db->where('peminjaman.id_user', $this->session->userdata('id'));
        $this->db->order_by('peminjaman.tanggal_pinjam', 'desc');

        $query= $this->db->get();
        return $query->result();
    }


    public function getData(){
        $this->db->select("*");
        $this->db->from("peminjaman");
        $query = $this->db->get();
        return $query->result();
    }

    public function delete($id){
        return $this->db->delete('peminjaman', array("id_peminjaman" => $id));
    }


     public function save() {
        $post = $this->input->post();
        $barang = base64_decode($post['barang']);
        $b = explode('<|>', $barang);
        $this->nim  = $post["nim"];
        $this->nama_peminjam  = $post["nama_peminjam"];
        $this->kode_barang    = $b[0];
        $this->nama_barang    = $b[1];
        $this->jumlah         = $post["jumlah"];
        date_default_timezone_set('Asia/Jakarta');
        $this->tanggal_pinjam = date("Y-m-d ");
        $this->tanggal_kembali= $post["tanggal_kembali"];
        $this->id_spesifikasi = $post["id_spesifikasi"];
        $this->status_pinjam  = $post["status_pinjam"];
        $this->komfirmasi     = $post["komfirmasi"];
         $this->id_user = $this->session->userdata('id');
        $this->db->insert($this->_table, $this);
    }

    public function save_konfirmasi($id){
        $post = $this->input->post();
        $status = ($post['konfirmasi'] == 'Disetujui')? 'Sedang dipinjam' : 'Selesai';
        $update = [
            'status_pinjam'=>$status,
            'komfirmasi'=>$post['konfirmasi']
        ];

        $this->db->where('id_peminjaman', $id);
        $this->db->update($this->_table, $update);
    }

    public function save_pengembalian($id){
        $post = $this->input->post();
        $update = [
            'status_pinjam'=>'Dikembalikan',
            'tanggal_kembali'=>$post['tanggal_kembali']
        ];

        $this->db->where('id_peminjaman', $id);
        $this->db->update($this->_table, $update);
    }

     public function save_user() {
         date_default_timezone_set('Asia/Jakarta');
        $post = $this->input->post();
        $barang = base64_decode($post['barang']);
        $b = explode('<|>', $barang);
        $this->id_user = $this->session->userdata('id');
        $this->id_barang    = $b[0];
        $this->jumlah         = $post["jumlah"];
        $this->tanggal_pinjam = date("Y-m-d ");
        $this->status_pinjam  = 'Sedang diproses';
        $this->komfirmasi     = 'Menunggu Konfirmasi';
        $this->db->insert($this->_table, $this);
    }


    public function edit_data($id){
        $this->db->select('peminjaman.id_peminjaman, peminjaman.jumlah, peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali,
            peminjaman.status_pinjam, peminjaman.komfirmasi, tb_alatmasuk.kode_barang, tb_alatmasuk.nama_barang,
            user.username, user.nama, tb_spesifikasi.spesifikasi');
        $this->db->from('peminjaman');
        $this->db->join('user', 'user.id_user = peminjaman.id_user');
        $this->db->join('tb_alatmasuk', 'tb_alatmasuk.id_alatmasuk = peminjaman.id_barang');
        $this->db->join('tb_spesifikasi', 'tb_spesifikasi.id_spesifikasi = tb_alatmasuk.id_spesifikasi');
        $this->db->where ('peminjaman.id_peminjaman', $id);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function get_keyword($keyword){
        $this->db->select('p.*, q.*');
        $this->db->from  ('peminjaman p');
        $this->db->join  ('tb_spesifikasi q','p.id_spesifikasi=q.id_spesifikasi');
        $this->db->like('q.spesifikasi',$keyword);
        $this->db->or_like('p.nama_peminjam',$keyword);
        $this->db->or_like('p.kode_barang',$keyword);
        $this->db->or_like('p.nama_barang',$keyword);
        $this->db->or_like('p.jumlah',$keyword);
        $this->db->or_like('p.tanggal_pinjam',$keyword);
        $this->db->or_like('p.tanggal_kembali',$keyword);
        $this->db->or_like('p.status_pinjam',$keyword);
         $this->db->or_like('p.komfirmasi',$keyword);
       return $this->db->get()->result();

    }

    public function option_barang(){
        $option = [];
        $query = "SELECT a.id_alatmasuk, a.kode_barang, a.nama_barang, b.spesifikasi
            FROM tb_alatmasuk a
            LEFT JOIN tb_spesifikasi b ON b.id_spesifikasi=a.id_spesifikasi";
        $result = $this->db->query($query)->result_array();

        foreach($result as $r){
            array_push($option, [
                'value'=>base64_encode($r['id_alatmasuk'].'<|>'.$r['spesifikasi']),
                'label'=>$r['kode_barang'].' - '.$r['nama_barang']
            ]);
        }

        return $option;
    }

    public function pencarian_d($status_pinjam){
    $this->db->where("status_pinjam",$status_pinjam);
    return $this->db->get("peminjaman");
    }

     function total_rows() {
    return $this->db->get('peminjaman')->num_rows();
  }
}
