<?php

class User extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model("m_user");

	}


	public function index(){
		$data["user"] = $this->m_user->getAll();
		$this->load->view('admin/data-user', $data);
	}


	public function tambah(){
		$this->load->view("admin/new/user_new");
	}

	public function add(){
		$info = $this->m_user;
		$info->save();
		echo "<script>alert('Data berhasil disimpan.')</script>";
		redirect(base_url('admin/User'));
	}


	public function edit($id){
		$where = array('id_user' => $id);
		$data['user'] = $this->m_user->edit_data($where,'user')->result();
		$this->load->view('admin/edit/user_edit',$data);
	}



	public function update(){
		$id_user  = $this->input->post('id_user');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$akses    = $this->input->post('akses');

		$data = array(
			'nama' => $nama,
			'username' => $username,
			'password' => md5($password),
			'akses'    => $akses );

		$where = array('id_user' => $id_user  );

		$this->m_user->update_data($where, $data, 'user');
		redirect('admin/user/index');
	}


	public function delete($id=null)
	{
		if (!isset($id)) show_404();

		if ($this->m_user->delete($id)) {
			redirect(site_url('admin/User'));
		}
}

 public function search(){
			$keyword = $this->input->post('keyword');
			$data['user']=$this->m_user->get_keyword($keyword);
		    $this->load->view('admin/data-user',$data);

		    }
}
