<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php $this->load->view("partial_admin/head.php") ?>

<?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>

<div id="content-wrapper">
<div class="container-fluid">

           <!-- Breadcrumbs-->
<ol class="breadcrumb">

<li class="breadcrumb-item active">
<h5> <strong>Silahkan Isi Data Alat Keluar Dibawah Ini</strong></h5>
</li>
</ol>

<form method="POST" action="<?php echo site_url('admin/c_alatkeluar/add') ?>" enctype="multipart/form-data" class="col-md-12">
<div class="row">
<div class="col-md-6">

<div class="form-group">
<label for="kode barang">Kode Barang</label>
<input value="" required="required" type="text" class="form-control" name="kode_barang">
</div>

<div class="form-group">
<label for="nama barang">Nama Barang</label>
<input value="" required="required" type="text" class="form-control" name="nama_barang">                   
</div>

<div class="form-group">
<label for="nomor pengadaan">Nomor Pengadaan</label>
<input value="" required="required" type="text" class="form-control" name="nomor_pengadaan">                   
</div>

 <label for="document">Berkas </label><br>
           <input value=""  type="file" class="" name="document">
           <br>                


<div class="form-group">
<label>Spesifikasi</label>
<select class="form-control" name="id_spesifikasi" onchange="showUser(this.value)">
<option>Pilih spesifikasi</option>
<?php foreach ($tb_spesifikasi as $tb_spesifikasi): ?> 
<option required="required" value="<?php echo $tb_spesifikasi->id_spesifikasi; ?>"><?php echo $tb_spesifikasi->spesifikasi; ?> </option>
<?php endforeach; ?>
</select> 
</div>   
</div>

<div class="col-md-6">
<div class="form-group">
<label for="jumlah">Jumlah</label>
<input value="" required="required" type="text" class="form-control" name="jumlah">                   
</div>

<div class="form-group">
<label for="lokasi">Lokasi Tujuan</label>
<input value="" required="required" type="text" class="form-control" name="lokasi">                   
</div>

<div class="form-group">
<label for="Tanggal keluar">Tanggal keluar</label>
<input value="" required="required"  type="date" class="form-control" name="tanggal_keluar">
</div>
                 
<div class="form-group">
<label>Kondisi</label>
<select class="form-control" name="id_kondisi" onchange="showUser(this.value)">
<option>Pilih kondisi</option>
<?php foreach ($kondisi_barang as $kondisi_barang): ?> 
<option required="required" value="<?php echo $kondisi_barang->id_kondisi; ?>"><?php echo $kondisi_barang->kondisi; ?> </option>
<?php endforeach; ?>
</select> 
</div>  
</div>
</div>                
                 
                        
<div class="card-footer small text-muted text-center">               
<button name='tambah' type='submit' class='btn btn-primary col-md-2 col-xs-12'>Tambah</button>
</div>
<div class="card-footer small text-muted text-center"> 
<button type='reset' value='Reset Form' class='btn btn-danger col-md-2 col-xs-12'>Reset</button>
</div>
</form>
<p class="small text-center text-muted my-5"> 
<em></em>
</p>
</div>
</div>



<?php $this->load->view("partial_admin/foot.php") ?>

</html>













