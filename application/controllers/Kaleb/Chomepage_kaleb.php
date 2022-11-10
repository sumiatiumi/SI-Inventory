<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chomepage_kaleb extends CI_Controller {

	public function index()
	{
        $this->load->model('m_peminjaman');
		$this->data['total_pinjam'] =  $this->m_peminjaman->total_rows();

		$this->load->model('m_alatkeluar');
		$this->data['total_alatkeluar'] =  $this->m_alatkeluar->total_rows();

		$this->load->model('m_alatmasuk');
		$this->data['total_alatmasuk'] =  $this->m_alatmasuk->total_rows();

		$this->load->model('m_bahankeluar');
		$this->data['total_bahankeluar'] =  $this->m_bahankeluar->total_rows();

		$this->load->model('m_bahanmasuk');
		$this->data['total_bahanmasuk'] =  $this->m_bahanmasuk->total_rows();

		$this->load->model('m_home');
		$this->data['total_info'] =  $this->m_home->total_rows();


		$this->load->view('kaleb/homepage_kalab',$this->data);
	}
}
