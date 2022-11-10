 <?php

class Cjadwal extends CI_Controller{
 
	public function __construct(){
		parent::__construct();
		
		$this->load->model("m_jadwal");		
        $this->load->library('form_validation');
        $this->load->library('session');
     }
	
 
	public function index(){
		$data["tb_jadwal"] = $this->m_jadwal->getAll();
		$this->load->view("admin/vjadwal", $data);
	}


	public function tambah(){
		$this->load->view("admin/new/jadwalnew");
	}

 public function add() {
		$jadwal = $this->m_jadwal;
		$jadwal->save();
		echo "<script>alert('Data berhasil disimpan.')</script>";	
		redirect(base_url('admin/cjadwal'));
	}

	public function edit($id){
		$where = array('id_jadwal' => $id);
		$data['tb_jadwal'] = $this->m_jadwal->edit_data($where,'tb_jadwal')->result();
		$this->load->view('admin/edit/jadwal_edit',$data);
	}


	public function update(){
		$id_jadwal = $this->input->post('id_jadwal');
		$praktikum = $this->input->post('praktikum');
		$hari_waktu = $this->input->post('hari_waktu');
		$tanggal = $this->input->post('tanggal');

		$data = array(
			'praktikum' => $praktikum,
			'hari_waktu' => $hari_waktu,
			'tanggal' => $tanggal );

		$where = array('id_jadwal' => $id_jadwal  );

		$this->m_jadwal->update_data($where, $data, 'tb_jadwal');
		redirect('admin/cjadwal/index');
	}


	public function delete($id=null){
		if (!isset($id)) show_404();

		if ($this->m_jadwal->delete($id)) {
			redirect(site_url('admin/cjadwal'));
		}
   
   }
   
    public function search(){
			$keyword = $this->input->post('keyword');
			$data['tb_jadwal']=$this->m_jadwal->get_keyword($keyword);
		    $this->load->view('admin/vjadwal',$data);

		    }
}