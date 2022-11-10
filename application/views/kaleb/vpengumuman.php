<!DOCTYPE html>
<html>


  <?php $this->load->view('partial_kaleb/head.php'); ?>
  <head>
	 
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
</head>


<body>
	<!-- Carousel -->





<!-- pengumuman -->
<div class="container">
  <div class="col-md-11" style="object-position: right;">

 <section class="page-section cta">
 
     
        <div class="col-xl-12 mx-auto">
          <div class="cta-inner text-center rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-upper">Pengumuman</span>
             <!-- <span class="section-heading-lower">To You</span> -->
           <div class="card-body"><br>
    <table>
  <tr>
    <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollDelay="10" scrollamount="7" direction="left" >
  <?php foreach ($pengumuman as $pengumuman): ?>
  
     <font size="4"> <?php echo $pengumuman->time; ?> </font>
  <br>
  <font size="4"> <?php echo $pengumuman->isi; ?></font>
  <br>
    
  <?php endforeach; ?></marquee> </tr>
  <br></table>
  </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  
</style>
</body>
<?php $this->load->view("partial_kaleb/foot.php") ?>
</html>
