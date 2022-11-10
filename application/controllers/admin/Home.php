<?php

class Home extends CI_Controller{
 
	public function __construct(){
		parent::__construct();
		
		$this->load->model("m_home");		
        $this->load->library('form_validation');
        $this->load->library('session');
     }
	
 
	public function index(){
		$data["pengumuman"] = $this->m_home->getAll();
		$this->load->view("admin/home", $data);
	}


	public function tambah(){
		$this->load->view("admin/new/info");
	}

 public function add() {
		$info = $this->m_home;
		$info->save();
		echo "<script>alert('Data berhasil disimpan.')</script>";	
		redirect(base_url('admin/Home'));
	}

	public function edit($id){
		$where = array('id_pengumuman' => $id);
		$data['pengumuman'] = $this->m_home->edit_data($where,'pengumuman')->result();
		$this->load->view('admin/edit/info_edit',$data);
	}


	public function update(){
		$id_pengumuman = $this->input->post('id_pengumuman');
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$time = $this->input->post('time');

		$data = array(
			'judul' => $judul,
			'isi' => $isi,
			'time' => $time );

		$where = array('id_pengumuman' => $id_pengumuman  );

		$this->m_home->update_data($where, $data, 'pengumuman');
		redirect('admin/home/index');
	}


	public function delete($id=null){
		if (!isset($id)) show_404();

		if ($this->m_home->delete($id)) {
			redirect(site_url('admin/home'));
		}
   
   }
   
    public function search(){
			$keyword = $this->input->post('keyword');
			$data['pengumuman']=$this->m_home->get_keyword($keyword);
		    $this->load->view('admin/home',$data);

		    }
}