<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('partial_user/head.php'); ?>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <meta http-equiv="refresh" content="30" />

</head>
<body>
  
<div class="container-fluid">
<div class="col-md-4 ">
<div class="panel-group " id="help" role="tablist" aria-multiselectable="true" >
<div class="panel panel-default" id="help_block">
<div class="panel-heading  bg-info" role="tab" >
<h3 align="center"><a role="button" data-toggle="collapse" data-parent="#help" href="#helpCollapse" aria-expanded="true" aria-controls="helpCollapse" style="color: black"> Link Umum
</a></h3>
</div>
<div aria-expanded="true" id="helpCollapse" class="panel-collapse collapse in  bg-dark" role="tabpanel ">
<div class="panel-body " >
<ul class="nav nav-pills nav-stacked"> 
<li class="hide_menu " ><a href="https://sim-online.polije.ac.id" target="_blank" >SIM-Online Politeknik Negeri Jember</a></li>
<li class="hide_menu"><a href="http://www.polije.ac.id" target="_blank">Website Politeknik Negeri Jember</a></li>
<li class="hide_menu"><a href="https://jti.polije.ac.id" target="_blank">Website JTI Politeknik Negeri Jember </a></li>
<li class="hide_menu"><a href="http://jti.polije.ac.id/elearning/" target="_blank">E-Learning JTI Politeknik Negeri Jember </a></li>
</ul>
<div class="panel-group" id="help" role="tablist" aria-multiselectable="true" >
<div class="panel panel-default" id="help_block">
<div class="panel-heading" role="tab" >
<h4 align="center"><a role="button" data-toggle="collapse" data-parent="#help" href="#helpCollapse" aria-expanded="true" aria-controls="helpCollapse" style="color: black;  font-style: italic;"><marquee> silahkan pilih web untuk membuka</marquee>
</a></h4>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="container-fluid">
<div class="col-md-8">
<div class="row">
<div id="myCarousel" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
<ol class="carousel-indicators">
   <?php $car = $this->m_carousel->getGambar();
   foreach ($car as $key => $value) {
   $active = ($key == 0) ? 'active' : '';
   echo '<li data-target="#demo" data-slide-to="' . $key . '" class="' . $active . '"></li>';
   }
   ?>
</ol> 
  <!-- The slideshow -->
  <div class="carousel-inner">
  <?php
  foreach ($car as $key => $value) {
  $active = ($key == 0) ? 'active' : '';
  echo '<div class="item ' . $active . '">
  <img src="' . base_url() .'/assets/foto/'. $value['gambar'] . '" alt="..." style="width: 1600px; height: 350px;"></div>';             
  }
  ?>
  </div> 

    <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
      </a>
      </div>
      </div>
  </div>
  </div>
 </div>
      <br>
      <br>
<!-- End Carousel -->

<div class="container-fluid" style="">
<div class="col-md-12">
<div class="row">
<div class="card mb-12">
  <div class="card-header bg-info" style="box-shadow: 5px 5px 5px 5px #333333;" >
  <h3 align="center" style="color: white;"> Pengumuman</h3>
  </div>
  <div class="card-body"><br>
  <table>
  <tr>
  <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollDelay="10" scrollamount="3" direction="left" >
  <?php foreach ($pengumuman as $pengumuman): ?>
  
  <font size="4"> <?php echo $pengumuman->time; ?> </font>
  <br>
  <font size="4"> <?php echo $pengumuman->isi; ?></font>
  <br>
  <?php endforeach; ?></marquee> </tr>
  <br>
  </table>
  </div>
  </div>
      </div>
    </div>
  </div>
</div>
  </div>
</div>
  </div>


</div>
</body>
<br>
<?php $this->load->view("partial_user/foot.php") ?>
</html>