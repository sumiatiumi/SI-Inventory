<?php
class Forms extends CI_Controller
{
	public function __construct()
	{
		/*call CodeIgniter's default Constructor*/
		parent::__construct();
		/*load database libray manually*/
		$this->load->database();
		$this->load->library('session');
		/*load Model*/
		$this->load->helper('url');
		$this->load->model('Form_model');
	}

	public function change_pass()
	{
		if($this->input->post('change_pass'))
		{
			$old_pass=$this->input->post('old_pass');
			$new_pass=$this->input->post('new_pass');
			$confirm_pass=$this->input->post('confirm_pass');
			$session_id=$this->session->userdata('id');
			$que = $this->db->query("select * from user where id_user='$session_id'");
			$row = $que->row();

			if(md5($old_pass) == $row->password){
				if($new_pass == $confirm_pass){
					$this->Form_model->change_pass($session_id,$new_pass);
					$message = 'Password berhasil diperbaharui';
				}else
					$message = 'Password Baru dengan Konfirmasi Password tidak sama';
			}else
				$message = 'Password Lama salah';

			echo "<script>alert('".$message."');window.location = '".base_url('admin/forms/change_pass')."'</script>";
		}

		$this->load->view('change_pass');
	}
}
?>
