<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    // session_start();
class Laporan extends CI_Controller{
    public function __construct(){
        parent::__construct();     
        $this->load->library('Pdf');  
        $this->load->model("m_laporan");
    }

    // Laporan Alat Keluar
    public function Alatkeluar(){
        
        $ttl=array(
            'title'=>'Laporan Alat Keluar',
            'tb_alatkeluar'=>$this->m_laporan->getAllAlatKeluar(),
        );
        $this->session->unset_userdata('tglAwal');
        $this->session->unset_userdata('tglAkhir');

        $this->load->view('partial_kaleb/head', $ttl);
        $this->load->view('kaleb/laporan/lap_Alatkeluar');   
        $this->load->view('partial_kaleb/foot');
    }    

    public function cari_AlatKeluar(){
        $tglAwal= date("Y-m-d",strtotime($this->input->post('tglAwal')));
        $tglAkhir= date("Y-m-d",strtotime($this->input->post('tglAkhir')));
        $sess_data=array(
            'tglAwal'=>$tglAwal,
            'tglAkhir'=>$tglAkhir
        );
        $this->session->set_userdata($sess_data);
        $data=array(
            'dateHsl'=> $this->m_laporan->getLapAlatkeluar($tglAwal,$tglAkhir),
            'tglAwal'=>date("d M Y",strtotime($this->session->userdata('tglAwal'))),
            'tglAkhir'=>date("d M Y",strtotime($this->session->userdata('tglAkhir'))),
        );
        $this->load->view('kaleb/laporan/hsl_AlatKeluar',$data);

    }

     public function cetakAlatKeluar(){
        $tglAwal = $this->session->userdata('tglAwal');
        $tglAkhir = $this->session->userdata('tglAkhir');
        $data['dataKeluar']=$this->m_laporan->getLapAlatkeluar($tglAwal,$tglAkhir);
        $this->load->view('kaleb/laporan/laporanAlatkeluar', $data);
    } 



     // Laporan Alat Masuk
    public function Alatmasuk(){
        
        $ttl=array(
            'title'=>'Laporan Alat Masuk',
            'tb_alatmasuk'=>$this->m_laporan->getAllAlatMasuk(),
        );
        $this->session->unset_userdata('tglAwal');
        $this->session->unset_userdata('tglAkhir');

         $this->load->view('partial_kaleb/head', $ttl);
        $this->load->view('kaleb/laporan/lap_AlatMasuk');   
        $this->load->view('partial_kaleb/foot');
    }
    

    public function cari_AlatMasuk(){
        $tglAwal= date("Y-m-d",strtotime($this->input->post('tglAwal')));
        $tglAkhir= date("Y-m-d",strtotime($this->input->post('tglAkhir')));
        $sess_data=array(
            'tglAwal'=>$tglAwal,
            'tglAkhir'=>$tglAkhir
        );
        $this->session->set_userdata($sess_data);
        $data=array(
            'dateHsl'=> $this->m_laporan->getLapAlatmasuk($tglAwal,$tglAkhir),
            'tglAwal'=>date("d M Y",strtotime($this->session->userdata('tglAwal'))),
            'tglAkhir'=>date("d M Y",strtotime($this->session->userdata('tglAkhir'))),
        );
        $this->load->view('kaleb/laporan/hsl_AlatMasuk',$data);

    }

    public function cetakAlatMasuk(){
        $tglAwal = $this->session->userdata('tglAwal');
        $tglAkhir = $this->session->userdata('tglAkhir');
        $data['dataMasuk']=$this->m_laporan->getLapAlatmasuk($tglAwal,$tglAkhir);
        $this->load->view('kaleb/laporan/laporanAlatmasuk', $data);
    } 



     public function Bahankeluar(){
        
        $ttl=array(
            'title'=>'Laporan Bahan Keluar',
            'tb_bahankeluar'=>$this->m_laporan->getAllBahanKeluar(),
        );
        $this->session->unset_userdata('tglAwal');
        $this->session->unset_userdata('tglAkhir');

        $this->load->view('partial_kaleb/head', $ttl);
        $this->load->view('kaleb/laporan/lap_Bahankeluar');   
        $this->load->view('partial_kaleb/foot');
    }    

    public function cari_BahanKeluar(){
        $tglAwal= date("Y-m-d",strtotime($this->input->post('tglAwal')));
        $tglAkhir= date("Y-m-d",strtotime($this->input->post('tglAkhir')));
        $sess_data=array(
            'tglAwal'=>$tglAwal,
            'tglAkhir'=>$tglAkhir
        );
        $this->session->set_userdata($sess_data);
        $data=array(
            'dateHsl'=> $this->m_laporan->getLapBahankeluar($tglAwal,$tglAkhir),
            'tglAwal'=>date("d M Y",strtotime($this->session->userdata('tglAwal'))),
            'tglAkhir'=>date("d M Y",strtotime($this->session->userdata('tglAkhir'))),
        );
        $this->load->view('kaleb/laporan/hsl_BahanKeluar',$data);

    }

     public function cetakBahanKeluar(){
        $tglAwal = $this->session->userdata('tglAwal');
        $tglAkhir = $this->session->userdata('tglAkhir');
        $data['dataBahanKeluar']=$this->m_laporan->getLapBahankeluar($tglAwal,$tglAkhir);
        $this->load->view('kaleb/laporan/laporanBahankeluar', $data);
    } 



     // Laporan Alat Masuk
    public function Bahanmasuk(){
        
        $ttl=array(
            'title'=>'Laporan Data Bahan Masuk',
            'tb_bahanmasuk'=>$this->m_laporan->getAllBahanMasuk(),
        );
        $this->session->unset_userdata('tglAwal');
        $this->session->unset_userdata('tglAkhir');

         $this->load->view('partial_kaleb/head', $ttl);
        $this->load->view('kaleb/laporan/lap_BahanMasuk');   
        $this->load->view('partial_kaleb/foot');
    }
    

    public function cari_BahanMasuk(){
        $tglAwal= date("Y-m-d",strtotime($this->input->post('tglAwal')));
        $tglAkhir= date("Y-m-d",strtotime($this->input->post('tglAkhir')));
        $sess_data=array(
            'tglAwal'=>$tglAwal,
            'tglAkhir'=>$tglAkhir
        );
        $this->session->set_userdata($sess_data);
        $data=array(
            'dateHsl'=> $this->m_laporan->getLapBahanmasuk($tglAwal,$tglAkhir),
            'tglAwal'=>date("d M Y",strtotime($this->session->userdata('tglAwal'))),
            'tglAkhir'=>date("d M Y",strtotime($this->session->userdata('tglAkhir'))),
        );
        $this->load->view('kaleb/laporan/hsl_BahanMasuk',$data);

    }

    public function cetakBahanMasuk(){
        $tglAwal = $this->session->userdata('tglAwal');
        $tglAkhir = $this->session->userdata('tglAkhir');
        $data['dataBahanMasuk']=$this->m_laporan->getLapBahanmasuk($tglAwal,$tglAkhir);
        $this->load->view('kaleb/laporan/laporanBahanmasuk', $data);
    } 




     // Laporan Peminjaman
     public function Peminjaman(){
        
        $ttl=array(
            'title'=>'Laporan Data Peminjaman',
            'peminjaman'=>$this->m_laporan->getAllPeminjaman(),
        );
        $this->session->unset_userdata('tglAwal');
        $this->session->unset_userdata('tglAkhir');

         $this->load->view('partial_kaleb/head', $ttl);
        $this->load->view('kaleb/laporan/lap_Pinjam');   
        $this->load->view('partial_kaleb/foot');
    }
    

    public function cari_lapPinjam(){
        $tglAwal= date("Y-m-d",strtotime($this->input->post('tglAwal')));
        $tglAkhir= date("Y-m-d",strtotime($this->input->post('tglAkhir')));
        $sess_data=array(
            'tglAwal'=>$tglAwal,
            'tglAkhir'=>$tglAkhir
        );
        $this->session->set_userdata($sess_data);
        $data=array(
            'dateHsl'=> $this->m_laporan->getLapPeminjaman($tglAwal,$tglAkhir),
            'tglAwal'=>date("d M Y",strtotime($this->session->userdata('tglAwal'))),
            'tglAkhir'=>date("d M Y",strtotime($this->session->userdata('tglAkhir'))),
        );
        $this->load->view('kaleb/laporan/hsl_lapPinjam',$data);

    }

    public function cetaklapPinjam(){
        $tglAwal = $this->session->userdata('tglAwal');
        $tglAkhir = $this->session->userdata('tglAkhir');
        $data['dataPinjam']=$this->m_laporan->getLapPeminjaman($tglAwal,$tglAkhir);
        $this->load->view('kaleb/laporan/laporanPinjam', $data);
    } 
        
}
?>
