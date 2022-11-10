   <?php
/**
 *
 */
class Cpeminjaman_user extends CI_Controller
{

	function __construct(){
		parent::__construct();
		/*if($this->session->userdata('akses') <> 'user')
		{
			redirect('login');
		}*/


		$this->load->model("m_peminjaman");
		$this->load->model("m_carousel");
		$this->load->model("m_home");
		$this->load->model("m_spesifikasi");

		/*if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		} */
	}

    public function index(){
        $data['peminjaman'] = $this->m_peminjaman->get_user();
        $this->load->view("user/vpeminjaman_user", $data);
    }

    public function tambah(){
        $data['option_barang'] = $this->m_peminjaman->option_barang();
        $data["tb_spesifikasi"]= $this->m_spesifikasi->index();
		$data["car"] = $this->m_carousel->getGambar();
	    $this->load->view("user/form_peminjaman", $data);
	}

    public function add(){
		$pinjam = $this->m_peminjaman;
		$pinjam->save_user();
		echo "<script>alert('Pengajuan berhasil dikirim');window.location = '".base_url('cpeminjaman_user')."'</script>";
	}
}
