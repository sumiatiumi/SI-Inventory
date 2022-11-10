<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php $this->load->view('partial_admin/head.php') ?>

<body id="page-top">
<div id="content-wrapper">
<div class="container-fluid"> 
<br>

<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
<ol class="breadcrumb"  style="width: 420px;">
<li class="breadcrumb-item " >
<h5> <strong>Silahkan Isi Data Dibawah Ini</strong></h5>
</li>
</ol>
</div>
</div>



<?php echo $error;?>
<?php echo form_open_multipart('admin/upload_carousel/tambah_aksi'); ?>
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
<div class="form-group">
<br>

<!-- ini untuk table isian coursel -->
<label for="nama_carousel"><b>Judul</b></label>
<input value=" "  required="required" type="text" class="form-control" name="nama_carousel">
<br>
<label for="gambar"><b>Gambar Carousel</b> </label><br>
<input value=" "  type="file" class="" name="gambar">
</div>
</div>
</div>
<br>
<br>
<br>

<div class="card-footer small text-muted text-center">
<button name='tambah' type='submit' class='btn btn-primary col-md-2 col-xs-12'>Simpan </button> 
</div>

<div  class="card-footer small text-muted text-center"><a href="<?php echo base_url('admin/list_carousel') ?>">
<button name="batal" type="button" class="btn btn-primary col-md-2 col-xs-12 ">Kembali 
</button></a>
</div>
<?php form_close(); ?>
     

</div>
</body>

<!--container-fluid -->
</div>

<!--content-wrapper -->

</div>
<!--wrapper -->

<?php $this->load->view("partial_admin/foot") ?>

</body>

</html>
