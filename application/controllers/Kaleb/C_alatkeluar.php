<?php

class C_alatkeluar extends CI_Controller {
 
	public function __construct(){
	parent::__construct();
		
    $this->load->model("m_alatkeluar");
    $this->load->model("m_kondisi");
	   $this->load->model("m_spesifikasi");		
    $this->load->library('form_validation');
    $this->load->library('session');
    }
	
 
	public function index(){
	  $data["tb_alatkeluar"] = $this->m_alatkeluar->index();
	  $this->load->view("kaleb/v_alatkeluar", $data);
	}


	public function tambah(){
		$data["kondisi_barang"] = $this->m_kondisi->index();
		$data["tb_spesifikasi"]= $this->m_spesifikasi->index();
		$this->load->view('kaleb/new/barangkeluarnew', $data);
	}


     public function add() {
		$keluar = $this->m_alatkeluar;
		$keluar->save();
		echo "<script>alert('Data berhasil disimpan.')</script>";	
		redirect(base_url('kaleb/c_alatkeluar'));
	}

	public function edit($id){
	  $where = array('id_alatkeluar' => $id);
	  $data["tb_spesifikasi"] = $this->m_spesifikasi->index();
	  $data["kondisi_barang"] = $this->m_kondisi->index();
	  $data['tb_alatkeluar']   = $this->m_alatkeluar->edit_data($id);
	  $this->load->view('kaleb/edit/barang_keluaredit',$data);
	}


public function update(){
		$id_alatkeluar     = $this->input->post('id_alatkeluar');
		$kode_barang       = $this->input->post('kode_barang');
		$nama_barang       = $this->input->post('nama_barang');
		$id_spesifikasi    = $this->input->post('id_spesifikasi', TRUE);
		$id_kondisi        = $this->input->post('id_kondisi', TRUE);
		$jumlah            = $this->input->post('jumlah');
		$lokasi            = $this->input->post('lokasi');
		$tanggal_keluar    = $this->input->post('tanggal_keluar');
		$nomor_pengadaan   = $this->input->post('nomor_pengadaan');
        if (empty($_FILES["document"]["name"])) {
            $data = array(
                'nama_barang'   => $nama_barang,
                'kode_barang'   => $kode_barang,
                'id_spesifikasi'=> $id_spesifikasi,
                'id_kondisi'    => $id_kondisi,
                'jumlah'        => $jumlah,
                'lokasi'        => $lokasi,
                'tanggal_keluar' => $tanggal_keluar,
                'nomor_pengadaan'    => $nomor_pengadaan);
        } else {
            $document = $this->m_alatkeluar->_uploadDocument();

            $data = array(
                'nama_barang'     => $nama_barang,
                'kode_barang'     => $kode_barang,
                'id_spesifikasi'  => $id_spesifikasi,
                'id_kondisi'      => $id_kondisi,
                'jumlah'          => $jumlah,
                'lokasi'          => $lokasi,
                'tanggal_keluar'  => $tanggal_keluar,
                'nomor_pengadaan' => $nomor_pengadaan,
                'document '       => $document );
        }

		$where = array('id_alatkeluar' => $id_alatkeluar  );
		$this->m_alatkeluar->update_data($where, $data, 'tb_alatkeluar');
		redirect('keleb/c_alatkeluar/index');
	}


	public function delete($id=null) {
	  if (!isset($id)) show_404();
	  if ($this->m_alatkeluar->delete($id)) {
		 redirect(site_url('kaleb/c_alatkeluar'));
	}
    }


    public function search(){
			$keyword = $this->input->post('keyword');
			$data['tb_alatkeluar']=$this->m_alatkeluar->get_keyword($keyword);
		    $this->load->view('kaleb/v_alatkeluar',$data);

		    }



//function getDataSpesifikasi(){
//		$id = $this->input->get('tb_spesifikasi');
//		$data["tb_alatkeluar"] = $this->m_alatkeluar->get_by_spesifikasi($id);
//		$this->load->view('admin/filter/filter_alatkeluar', $data);
//	}


	 public function pencarian(){
           $id_spesifikasi=$this->input->get('id_spesifikasi');
           $data['tb_alatkeluar'] = $this->m_alatkeluar->pencarian_d($id_spesifikasi)->result();
           $this->load->view("kaleb/filter/filter_alatkeluar",$data); // ini view menampilkan hasil pencarian
    }
    }
 ?>