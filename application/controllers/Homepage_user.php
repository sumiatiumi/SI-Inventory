   <?php
/**
 * 
 */
class Homepage_user extends CI_Controller
{
	function __construct(){
		parent::__construct();
		/*if($this->session->userdata('akses') <> 'user')
		{
			redirect('login');
		}*/
	

		$this->load->model("m_carousel");
		$this->load->model("m_home");
		
		/*if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		} */
	}



    public function index(){
	    $data["car"] = $this->m_carousel->getGambar();
	    $data["pengumuman"] = $this->m_home->getAll();
        $this->load->view("user/vhomepage_user", $data);
	}

}
