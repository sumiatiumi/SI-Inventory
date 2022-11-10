<?php

class Cpeminjaman extends CI_Controller{

	public function __construct(){
		parent::__construct();

		$this->load->model("m_peminjaman");
		$this->load->model("m_spesifikasi");
        $this->load->library('form_validation');
         $this->load->library('Pdf'); 
        $this->load->library('session');
    }


	public function index(){
		$data["peminjaman"] = $this->m_peminjaman->index();
		$this->load->view("kaleb/vpeminjaman", $data);
	}


	public function tambah(){
        $data['option_barang'] = $this->m_peminjaman->option_barang();
		$data["tb_spesifikasi"]= $this->m_spesifikasi->index();
		$this->load->view('kaleb/new/peminjamannew', $data);
	}


	public function add(){
		$pinjam = $this->m_peminjaman;
		$pinjam->save();
		echo "<script>alert('Data berhasil disimpan.')</script>";
		redirect(base_url('kaleb/cpeminjaman'));
	}


	public function edit($id){
	  $where = array('id_peminjaman' => $id);
      $data['option_barang'] = $this->m_peminjaman->option_barang();
      $data["tb_spesifikasi"] = $this->m_spesifikasi->index();
	  $data['peminjaman']   = $this->m_peminjaman->edit_data($id);
	  $this->load->view('kaleb/edit/peminjamanedit',$data);
	}

	public function update(){
		$id_peminjaman    = $this->input->post('id_peminjaman');
		$nama_peminjam    = $this->input->post('nama_peminjam');
		$nim      = $this->input->post('nim');
		$jumlah           = $this->input->post('jumlah');
		$id_spesifikasi   = $this->input->post('id_spesifikasi',TRUE);
		$tanggal_pinjam   = $this->input->post('tanggal_pinjam');
		$tanggal_kembali  = $this->input->post('tanggal_kembali');
		$status_pinjam    = $this->input->post('status_pinjam');
		$komfirmasi       = $this->input->post('komfirmasi');
        $barang = base64_decode($this->input->post('barang'));
        $b = explode('<|>', $barang);

		$data = array(
			'nim'   => $nim,
			'nama_peminjam'   => $nama_peminjam,
			'kode_barang'     => $b[0],
			'nama_barang'     => $b[1],
			'jumlah'          => $jumlah,
			'id_spesifikasi'  => $id_spesifikasi,
			'tanggal_pinjam'  => $tanggal_pinjam,
			'tanggal_kembali' => $tanggal_kembali,
		    'status_pinjam'   => $status_pinjam,
		    'komfirmasi'      => $komfirmasi );

		$where = array('id_peminjaman' => $id_peminjaman  );

		$this->m_peminjaman->update_data($where, $data, 'peminjaman');
		redirect('kaleb/cpeminjaman/index');
	}


	public function delete($id=null){
		if (!isset($id)) show_404();
		if ($this->m_peminjaman->delete($id)) {
			redirect(site_url('kaleb/cpeminjaman'));
		}
    }


     public function search(){
			$keyword = $this->input->post('keyword');
			$data['peminjaman']=$this->m_peminjaman->get_keyword($keyword);
		    $this->load->view('kaleb/vpeminjaman',$data);

		    }


		   public function pencarian(){
           $status_pinjam=$this->input->get('status_pinjam');
           $data['peminjaman'] = $this->m_peminjaman->pencarian_d($status_pinjam)->result();
           $this->load->view("kaleb/filter/filter_peminjaman",$data); // ini view menampilkan hasil pencarian
    }

    public function cetakPeminjaman($keyword){
        $keyword = $this->session->userdata('keyword');
        $data['dataPinjam']=$this->m_peminjaman->get_keyword($keyword);
        $this->load->view('kaleb/filter/laporanPeminjaman', $data);
    } 
}
