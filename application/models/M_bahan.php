  <?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_bahan extends CI_Model {

    private $_table = "tb_bahan";

    public $id_bahan;
    public $kode_barang;
    public $nama_barang;
    public $jumlah; 
    public $satuan; 


    public function rules(){
        return [

            ['field' => 'id_bahan',
            'label' => 'id_bahan',
            'rules' => 'numeric'],

            ['field' => 'kode_barang',
            'label' => 'kode barang',
            'rules' => 'required'],

            ['field' => 'nama_barang',
            'label' => 'Nama barang',
            'rules' => 'required'],

            ['field' => 'jumlah',
            'label' => 'Jumlah',
            'rules' => 'required'],

             ['field' => 'satuan',
            'label' => 'satuan',
            'rules' => 'required']

        ];
    }


   public function index(){
      $this->db->select('*');
      $this->db->from  ('tb_bahan');
      $this->db->order_by('id_bahan', 'desc');

        $query= $this->db->get();
        return $query->result();
    }


    public function getData(){
        $this->db->select("*");
        $this->db->from("tb_bahan");
        $query = $this->db->get();
        return $query->result();
    }

    //fungsi menghapus data
    public function delete($id){
        return $this->db->delete('tb_bahan', array("id_bahan" => $id));
    }

    //fungsi menyimpan data
    public function save(){
        $post = $this->input->post();
        $this->kode_barang = $post["kode_barang"];
        $this->nama_barang = $post["nama_barang"];
        $this->jumlah = $post["jumlah"];
        $this->satuan = $post["satuan"];
        $this->db->insert($this->_table, $this);
    }

    //fungsi edit data
  public function edit_data($id){
        $this->db->select('*');
        $this->db->from  ('tb_bahan');
        $this->db->where ('id_bahan', $id);
        $query = $this->db->get();
        return $query->result();
    }

    //fungsi update data
    public function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

     public function get_keyword($keyword){
        $this->db->select('*');
        $this->db->from  ('tb_bahan');
        $this->db->or_like('kode_barang',$keyword);
        $this->db->or_like('nama_barang',$keyword);
        $this->db->or_like('jumlah',$keyword);
        $this->db->or_like('satuan',$keyword);
       return $this->db->get()->result();

    }

     function total_rows() {
    return $this->db->get('tb_bahan')->num_rows();
  }
}