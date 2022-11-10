<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SI INventori LAB.RPL Jurusan Teknololgi Informasi POLIJE</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/template/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('assets/template/css/business-casual.css') ?>" rel="stylesheet">
 

</head>
<br>
 <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
             <a class="nav-link mr-2 "  href='<?php echo site_url("login/keluar");?>'  role="button" onclick="return confirm('Apakah anda yakin ingin keluar ?')" style="color: white;" >
          <i class="fas fa-fw fa-door"></i>
          <span style=" font-weight: bold; float: right;">LOGOUT</span>

</a>
  <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper mb-3"><img src="<?php echo base_url()?>/assets/img/Polije.png" style="width:100px;height:100px;"> Sistem Informasi Inventori Laboratorium Rekayasa Perangkat Lunak </span>
    <span class="site-heading-lower ">Di Jurusan Teknologi Informasi POLIJE</span>
  </h1>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">SI Inventori LAB.RPL</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="<?php echo base_url('homepage_user') ?>">HOMEPAGE
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item active  px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="<?php echo base_url('cmodul_user') ?>">MODUL PRAKTIKUM</a>
             <span class="sr-only">(current)</span>
          </li>
          <li class="nav-item active  px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="<?php echo base_url('cpeminjaman_user') ?>">PEMINJAMAN</a>
             <span class="sr-only">(current)</span>
          </li>

          <li class="nav-item active  px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="<?php echo base_url('cjadwal_user') ?>">JADWAL PRAKTIKUM</a>
             <span class="sr-only">(current)</span>
          </li>
        </ul>
      </div>
    </div>
  </nav>



 <!-- <section class="page-section clearfix">
    <div class="container">
      <div class="intro">
        <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="img/intro.jpg" alt="">
        <div class="intro-text left-0 text-center bg-faded p-5 rounded">
          <h2 class="section-heading mb-4">

          <div class="intro-button mx-auto">
            <a class="btn btn-primary btn-xl" href="#">Visit Us Today!</a>
          </div>
        </div>
      </div>
    </div>
  </section> -->



  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url('assets/template/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/template/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

</body>

</html>
