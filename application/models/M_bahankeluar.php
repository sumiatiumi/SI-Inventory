  <?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_bahankeluar extends CI_Model {

    private $_table = "tb_bahankeluar";

    public $id_bahankeluar;
    public $kode_barang;
    public $nama_barang;
    public $jumlah; 
    public $satuan;
    public $lokasi_tujuan;
    public $tanggal_keluar;

    public function rules(){
        return [

            ['field' => 'id_bahankeluar',
            'label' => 'id_bahankeluar',
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

             ['field' => 'lokasi_tujuan',
            'label' => 'lokasi_tujuan',
            'rules' => 'required'],

             ['field' => 'tanggal_keluar',
            'label' => 'Tanggal keluar',
            'rules' => 'required']

        ];
    }


   public function index(){
      $this->db->select('*');
      $this->db->from  ('tb_bahankeluar');
      $this->db->order_by('tanggal_keluar', 'desc');

        $query= $this->db->get();
        return $query->result();
    }


    public function getData(){
        $this->db->select("*");
        $this->db->from("tb_bahankeluar");
        $query = $this->db->get();
        return $query->result();
    }

    //fungsi menghapus data
    public function delete($id){
        return $this->db->delete('tb_bahankeluar', array("id_bahankeluar" => $id));
    }

    //fungsi menyimpan data
    public function save(){
        $post = $this->input->post();
        $this->kode_barang = $post["kode_barang"];
        $this->nama_barang = $post["nama_barang"];
        $this->jumlah = $post["jumlah"];
        $this->satuan = $post["satuan"];
        $this->lokasi_tujuan = $post["lokasi_tujuan"];
        $this->tanggal_keluar = date("Y-m-d H:i");
        $this->db->insert($this->_table, $this);
    }

    //fungsi edit data
  public function edit_data($id){
        $this->db->select('*');
        $this->db->from  ('tb_bahankeluar');
        $this->db->where ('id_bahankeluar', $id);
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
    return $this->db->get('tb_bahankeluar')->num_rows();
  }
}