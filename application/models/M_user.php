<?php defined('BASEPATH') OR exit('No direct script access allowed');

class m_user extends CI_Model
{

	private $_table = "user";

	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('user');
		$query = $this->db->get();
		return $query->result();
	}


	public function save()
	{
		$post = $this->input->post();
		$this->nama = $post["nama"];
		$this->username = $post["username"];
		$this->password = md5($post["password"]);
		$this->akses    = $post["akses"];
		$this->db->insert($this->_table, $this);
	}


	public function delete($id){
		return $this->db->delete('user', array("id_user" => $id));
	}


	public function edit_data($where,$table){
        return $this->db->get_where($table,$where);
    }


    public function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }


  public function get_keyword($keyword){
        $this->db->select('*');
        $this->db->from  ('user');
        $this->db->or_like('nama',$keyword);
        $this->db->or_like('username',$keyword);
        $this->db->or_like('akses',$keyword);
       return $this->db->get()->result();

    }

     function total_rows() {
    return $this->db->get('user')->num_rows();
  }
}
