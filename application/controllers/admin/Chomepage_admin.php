<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chomepage_admin extends CI_Controller {

	public function index()
	{
	    $this->load->model('m_peminjaman');
		$this->data['total_pinjam'] =  $this->m_peminjaman->total_rows();

		$this->load->model('m_modul');
		$this->data['total_modul'] =  $this->m_modul->total_rows();

		$this->load->model('m_alatkeluar');
		$this->data['total_alatkeluar'] =  $this->m_alatkeluar->total_rows();

		$this->load->model('m_alatmasuk');
		$this->data['total_alatmasuk'] =  $this->m_alatmasuk->total_rows();

		$this->load->model('m_bahankeluar');
		$this->data['total_bahankeluar'] =  $this->m_bahankeluar->total_rows();

		$this->load->model('m_bahanmasuk');
		$this->data['total_bahanmasuk'] =  $this->m_bahanmasuk->total_rows();

		$this->load->model('m_carousel');
		$this->data['total_carousel'] =  $this->m_carousel->total_rows();

		$this->load->model('m_home');
		$this->data['total_info'] =  $this->m_home->total_rows();

		$this->load->model('m_jadwal');
		$this->data['total_jadwal'] =  $this->m_home->total_rows();

		$this->load->model('m_kondisi');
		$this->data['total_kondisi'] =  $this->m_kondisi->total_rows();

		$this->load->model('m_spesifikasi');
		$this->data['total_spesifikasi'] =  $this->m_spesifikasi->total_rows();

		$this->load->model('m_user');
		$this->data['total_user'] =  $this->m_user->total_rows();

		$this->load->model('m_bahan');
		$this->data['total_bahan'] =  $this->m_bahan->total_rows();

		$this->load->model('m_alat');
		$this->data['total_alat'] =  $this->m_alat->total_rows();

		$this->load->view('admin/vhomepage_admin',$this->data);
	}
}
?>