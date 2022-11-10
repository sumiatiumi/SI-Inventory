<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_kondisi extends CI_Model {

	private $_table = "kondisi_barang";

    public $kondisi;
    
    public function rules(){
        return [
            
            ['field' => 'kondisi',
            'label' => 'kondisi',
            'rules' => 'required']
        ];
    }

	public function index(){
		$this->db->select('*');
		$this->db->from('kondisi_barang');
		$query = $this->db->get();
		return $query->result();
	}


	public function save(){
		$post = $this->input->post();
		$this->kondisi = $post["kondisi"];
		$this->db->insert($this->_table, $this);
	}


	public function delete($id){
		return $this->db->delete('kondisi_barang', array("id_kondisi" => $id));
	}


	public function edit_data($where,$table){
        return $this->db->get_where($table,$where);
    }

    public function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

 function total_rows() {
    return $this->db->get('kondisi_barang')->num_rows();
  }
}