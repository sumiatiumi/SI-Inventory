  <?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_bahanmasuk extends CI_Model {

    private $_table = "tb_bahanmasuk";

    public $id_bahanmasuk;
    public $kode_barang;
    public $nama_barang;
    public $jumlah; 
    public $satuan; 
    public $asal_barang;
    public $tanggal_masuk;

    public function rules(){
        return [

            ['field' => 'id_bahanmasuk',
            'label' => 'id_bahanmasuk',
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
            'label' => 'Satuan',
            'rules' => 'required'],

             ['field' => 'asal_barang',
            'label' => 'asal_barang',
            'rules' => 'required'],

             ['field' => 'tanggal_masuk',
            'label' => 'Tanggal masuk',
            'rules' => 'required']

        ];
    }


   public function index(){
      $this->db->select('*');
      $this->db->from  ('tb_bahanmasuk');
      $this->db->order_by('tanggal_masuk', 'desc');

        $query= $this->db->get();
        return $query->result();
    }


    public function getData(){
        $this->db->select("*");
        $this->db->from("tb_bahanmasuk");
        $query = $this->db->get();
        return $query->result();
    }

    //fungsi menghapus data
    public function delete($id){
        return $this->db->delete('tb_bahanmasuk', array("id_bahanmasuk" => $id));
    }

    //fungsi menyimpan data
    public function save(){
        $post = $this->input->post();
        $this->kode_barang = $post["kode_barang"];
        $this->nama_barang = $post["nama_barang"];
        $this->jumlah = $post["jumlah"];
        $this->satuan = $post["satuan"];
        $this->asal_barang = $post["asal_barang"];
        $this->tanggal_masuk = date("Y-m-d H:i");
        $this->db->insert($this->_table, $this);
    }

    //fungsi edit data
  public function edit_data($id){
        $this->db->select('*');
        $this->db->from  ('tb_bahanmasuk');
        $this->db->where ('id_bahanmasuk', $id);
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
        $this->db->from  ('tb_bahankeluar');
        $this->db->or_like('kode_barang',$keyword);
        $this->db->or_like('nama_barang',$keyword);
        $this->db->or_like('jumlah',$keyword);
        $this->db->or_like('satuan',$keyword);
        $this->db->or_like('lokasi_tujuan',$keyword);
        $this->db->or_like('tanggal_keluar',$keyword);
       return $this->db->get()->result();

    }

     function total_rows() {
    return $this->db->get('tb_bahanmasuk')->num_rows();
  }
}