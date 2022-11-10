
<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php $this->load->view("partial_admin/head.php") ?>

<div id="content-wrapper">
<div class="container-fluid">

<!-- Breadcrumbs-->
<ol class="breadcrumb">
<li class="breadcrumb-item active">
<h5> <strong>Selamat Datang dihalaman admin</strong></h5>
</li>
</ol>
          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fas fa-bullhorn"></i>
                  </div>
                  <div class="mr-5"><h2> <?php echo $total_info?></h2>Pengumuman</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/Home')?>">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5"><h2> <?php echo $total_kondisi?></h2>Data Kondisi</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/ckondisi')?>">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5"><h2> <?php echo $total_spesifikasi?></h2>Data Spesifikasi</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/cspesifikasi')?>">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                  </div>
                  <div class="mr-5"><h2> <?php echo $total_user?></h2>Data User</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/user')?>">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>

           <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-5"><h2> <?php echo $total_alatmasuk?></h2>Data Alat Masuk</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/c_alatmasuk')?>">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5"><h2> <?php echo $total_alatkeluar?></h2>Data Alat Keluar</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/c_alatkeluar')?>">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw far fa-image"></i>
                  </div>
                  <div class="mr-5"> <h2> <?php echo $total_pinjam ?> </h2>Data Peminjaman </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/cpeminjaman')?>">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fas fa-tasks"></i>
                  </div>
                  <div class="mr-5"><h2> <?php echo $total_modul?></h2>Data Modul Praktikum</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/cmodul')?>">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>

           <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5"><h2> <?php echo $total_bahan?></h2>Data Bahan</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/cbahan')?>">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
             <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5"><h2> <?php echo $total_bahankeluar?></h2>Data Bahan Keluar</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/cbahan_keluar')?>">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5"><h2> <?php echo $total_bahanmasuk?></h2>Data Bahan Masuk</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/cbahan_masuk')?>">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5"><h2> <?php echo $total_jadwal?></h2>Data Jadwal Praktikum</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/cjadwal')?>">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>



             <div class="row">
               <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-info o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fas fa-image"></i>
                  </div>
                  <div class="mr-5"><h2> <?php echo $total_carousel?></h2>Gambar Carousel</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/list_carousel')?>">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-secondary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5"><h2> <?php echo $total_alat?></h2>Data Alat</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/c_alat')?>">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            </div>
          </div>
        </div>
      
<?php $this->load->view("partial_admin/foot.php") ?>
  </html>