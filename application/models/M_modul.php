
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_modul extends CI_Model{
    private $_table = "tb_modul_praktikum";

    public $id_modul;
    public $nama_modul;
    public $document;
    public $prodi;
    public $tahun;
    public $semester;

    public function rules(){
        return [
            ['field' => 'nama_modul',
            'label' => 'Nama Modul',
            'rules' => 'required'],

            ['field' => 'document',
            'label' => 'document',
            'rules' => 'required'],

             ['field' => 'prodi',
            'label' => 'Prodi',
            'rules' => 'required'],

             ['field' => 'tahun',
            'label' => 'Tahun',
            'rules' => 'required'],

            ['field' => 'semester',
            'label' => 'Semester',
            'rules' => 'required']
        ];
    }


  public function index(){
    $this->db->select("*");
    $this->db->from("tb_modul_praktikum");
     $this->db->order_by('downloaded', 'desc');
    $query =$this->db->get();
    return $query->result();
   }


  public function input($data){
        try{
        $this->db->insert('tb_modul_praktikum',$data);
        return true;
    }catch(Exception $e){}

    }


  public function getDocument(){
    $query = "SELECT * FROM tb_modul_praktikum";
    return $this->db->query($query)->result_array();
  }


  public function edit_data($where,$table){
    return $this->db->get_where($table,$where);
  }


  public function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }


  public function delete($id){
    return $this->db->delete('tb_modul_praktikum', array("id_modul" => $id));
    }

 public function pencarian_d($prodi,$semester){
    $this->db->where("prodi",$prodi);
    $this->db->where("semester",$semester);
    return $this->db->get("tb_modul_praktikum");
    }

     public function pencarian_u($prodi,$semester,$tahun){
    $this->db->where("prodi",$prodi);
    $this->db->where("semester",$semester);
     $this->db->where("tahun",$tahun);
    return $this->db->get("tb_modul_praktikum");
    }


     public function get_keyword($keyword){
        $this->db->select('*');
        $this->db->from  ('tb_modul_praktikum');
        $this->db->or_like('nama_modul',$keyword);
        $this->db->or_like('document',$keyword);
        $this->db->or_like('prodi',$keyword);
        $this->db->or_like('tahun',$keyword);
        $this->db->or_like('semester',$keyword);
       return $this->db->get()->result();

    }


    public function download($id){
  $query = $this->db->get_where('tb_modul_praktikum',array('id_modul'=>$id));
  return $query->row_array();
 }

  function total_rows() {
    return $this->db->get('tb_modul_praktikum')->num_rows();
  }
}
