<?php

class C_alatmasuk extends CI_Controller{

	   function __construct(){
	   parent::__construct();

	   $this->load->model("m_alatmasuk");
	   $this->load->model("m_kondisi");
	   $this->load->model("m_spesifikasi");
       $this->load->library('form_validation');
	   $this->load->library('session');
	}


	public function index(){
	  $data["alat_masuk"] = $this->m_alatmasuk->index();
	  $this->load->view("kaleb/v_alatmasuk", $data);
	}


	//menampilkan view tambah jadwal
	public function tambah(){
		$data["kondisi_barang"] = $this->m_kondisi->index();
		$data["tb_spesifikasi"]= $this->m_spesifikasi->index();
		$this->load->view('kaleb/new/barangmasuknew', $data);
	}

	 public function add() {
		$masuk = $this->m_alatmasuk;
		$masuk->save();
		echo "<script>alert('Data berhasil disimpan.')</script>";
		redirect(base_url('kaleb/c_alatmasuk'));
	}

	public function edit($id){
	  $where = array('id_barangmasuk' => $id);
	  $data["tb_spesifikasi"] = $this->m_spesifikasi->index();
	  $data["kondisi_barang"] = $this->m_kondisi->index();
	  $data['tb_alatmasuk']   = $this->m_alatmasuk->edit_data($id);
	  $this->load->view('kaleb/edit/barang_masukedit',$data);
	}


	public function update(){
		$id_barangmasuk = $this->input->post('id_barangmasuk');
		$kode_barang    = $this->input->post('kode_barang');
		$nama_barang    = $this->input->post('nama_barang');
		$id_spesifikasi = $this->input->post('id_spesifikasi', TRUE);
		$id_kondisi     = $this->input->post('id_kondisi', TRUE);
		$jumlah         = $this->input->post('jumlah');
		$sumber_barang  = $this->input->post('sumber_barang');
		$tanggal_masuk  = $this->input->post('tanggal_masuk');
		$nomor_pengadaan     = $this->input->post('nomor_pengadaan');
        if (empty($_FILES["document"]["name"])) {
            $data = array(
                'nama_barang'   => $nama_barang,
                'kode_barang'   => $kode_barang,
                'id_spesifikasi'=> $id_spesifikasi,
                'id_kondisi'    => $id_kondisi,
                'jumlah'        => $jumlah,
                'sumber_barang' => $sumber_barang,
                'tanggal_masuk' => $tanggal_masuk,
                'nomor_pengadaan'    => $nomor_pengadaan);
        } else {
            $document = $this->m_alatmasuk->_uploadDocument();

            $data = array(
                'nama_barang'   => $nama_barang,
                'kode_barang'   => $kode_barang,
                'id_spesifikasi'=> $id_spesifikasi,
                'id_kondisi'    => $id_kondisi,
                'jumlah'        => $jumlah,
                'sumber_barang' => $sumber_barang,
                'tanggal_masuk' => $tanggal_masuk,
                'nomor_pengadaan'    => $nomor_pengadaan,
                'document '    => $document );
        }

		$where = array('id_alatmasuk' => $id_barangmasuk  );
		$this->m_alatmasuk->update_data($where, $data, 'tb_alatmasuk');
		redirect('kaleb/c_alatmasuk/index');
	}


	public function delete($id=null) {
		if (!isset($id)) show_404();
		if ($this->m_alatmasuk->delete($id)) {
			redirect(site_url('kaleb/c_alatmasuk'));
    }
  }

   public function search(){
			$keyword = $this->input->post('keyword');
			$data['alat_masuk']=$this->m_alatmasuk->get_keyword($keyword);
		    $this->load->view('kaleb/v_alatmasuk',$data);

		    }
}
