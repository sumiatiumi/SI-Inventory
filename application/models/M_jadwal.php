<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwal extends CI_Model{
    private $_table = "tb_jadwal";

    public $id_jadwal;
    public $praktikum;
    public $hari_waktu;
    public $tanggal;   

    public function rules(){
        return [
            ['field' => 'praktikum',
            'label' => 'praktikum',
            'rules' => 'required'],

            ['field' => 'hari_waktu',
            'label' => 'hari_waktu',
            'rules' => 'required'],

            ['field' => 'tanggal',
            'label' => 'tanggal',
            'rules' => 'required']
        ];
    }


    public function index(){
        $this->db->select("*");
        $this->db->from("tb_jadwal");
        $this->db->order_by('id_jadwal', 'asc');
        $query= $this->db->get();
        return $query->result();
    }


    public function getAll(){
        return $this->db->get($this->_table)->result();
    }
    

    public function getById($id){
        return $this->db->get_where($this->_table, ["id_jadwal" => $id])->row();
    }


    public function delete($id){
        return $this->db->delete('tb_jadwal', array("id_jadwal" => $id));
    }

 public function edit_data($where,$table){
    return $this->db->get_where($table,$where);
  }

    public function save() {
        $post = $this->input->post();
        $this->praktikum = $post["praktikum"];
        $this->hari_waktu = $post["hari_waktu"];
        date_default_timezone_set('Asia/Jakarta'); 
        $this->tanggal = date("Y-m-d");
        $this->db->insert($this->_table, $this);
    }



    public function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    

     public function get_keyword($keyword){
        $this->db->select('*');
        $this->db->from  ('tb_jadwal');
        $this->db->or_like('praktikum',$keyword);
        $this->db->or_like('hari_waktu',$keyword);
        $this->db->or_like('tanggal',$keyword);
       return $this->db->get()->result();

    }

     function total_rows() {
    return $this->db->get('tb_jadwal')->num_rows();
  }
}