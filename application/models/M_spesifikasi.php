<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_spesifikasi extends CI_Model {

	private $_table = "tb_spesifikasi";

    public $spesifikasi;
    
    public function rules(){
        return [
            
            ['field' => 'spesifikasi',
            'label' => 'spesifikasi',
            'rules' => 'required']
        ];
    }


	public function index() {
		$this->db->select('*');
		$this->db->from('tb_spesifikasi');
		$query = $this->db->get();
		return $query->result();
	}


	public function save(){
		$post = $this->input->post();
		$this->spesifikasi = $post["spesifikasi"];
		$this->db->insert($this->_table, $this);
	}


	public function delete($id){
		return $this->db->delete('tb_spesifikasi', array("id_spesifikasi" => $id));
	}


	public function edit_data($where,$table) {
        return $this->db->get_where($table,$where);
    }


    public function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

 function total_rows() {
    return $this->db->get('tb_spesifikasi')->num_rows();
  }
}