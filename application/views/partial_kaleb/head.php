<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SI LABORATORIUM RPL</title>

  <!-- Bootstrap core CSS-->
  <link rel="icon" type="image/jpg" href="images/icons/ayeaye.jpg"/>
  <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.css')?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('css/sb-admin.css')?>" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-success static-top" style="box-shadow: 3px 3px 3px 3px;">

 <a class="navbar-brand mr-1" href="<?php echo base_url('Home') ?>"><img src="<?php echo base_url()?>/assets/img/Polije.png" style="width:40px;height:40px;"> <b>SI Lab.RPL ( Kalab )</b></a>


  <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
  <i class="fas fa-bars"></i>
  </button>

  <!-- Navbar Search -->
  <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

  </form>

  
                        
    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black">
          <i class="fas fa-user-circle fa-fw"></i>Lainnya
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="">Backup & Restore Data</a>
          <a class="dropdown-item" href="">Arsip Data Raport</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href='<?php echo site_url("login/keluar");?>'  data-toggle="" data-target="#">Logout</a>
        </div>
      </li>
    </ul>
  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
   <ul class="sidebar navbar-nav">
    <li class="nav-item active">
    <a class="nav-link" href="<?php echo base_url('kaleb/chomepage_kaleb')?>">
    <i class="fas fa-fw fa-home"></i>
    <span>Home</span>
    </a>
    </li>


    <!---->
        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('kaleb/cpengumuman')?>">
        <i class="fas fa-fw fa-book-open"></i>
        <span>Pengumuman</span></a>
        </li>


   <!--LAPORAN VIEW-->
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-list"></i>
        <span>Laporan</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">         
          <a class="dropdown-item" href="<?php echo base_url('kaleb/laporan/alatmasuk')?>">Data Alat Masuk</a>  
          <a class="dropdown-item" href="<?php echo base_url('kaleb/laporan/alatkeluar')?>">Data Alat Keluar</a> 
          <a class="dropdown-item" href="<?php echo base_url('kaleb/laporan/bahanmasuk')?>">Data Bahan Masuk</a>  
          <a class="dropdown-item" href="<?php echo base_url('kaleb/laporan/bahankeluar')?>">Data Bahan Keluar</a> 
          <a class="dropdown-item" href="<?php echo base_url('kaleb/laporan/peminjaman')?>">Data Peminjaman</a>     
        </div>
        </a>
        </li>

<li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('kaleb/forms/change_pass')?>">
        <i class="fas fa-fw fa-book-open"></i>
        <span>Ubah Password</span></a>
        </li>


   </ul>
   <div id="content-wrapper">
        


   
    
    