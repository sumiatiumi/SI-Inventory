 <!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php $this->load->view("partial_admin/head.php") ?>

<div id="content-wrapper">
<div class="container-fluid">

           <!-- Breadcrumbs-->
<ol class="breadcrumb">

<li class="breadcrumb-item active">
<h5> <strong>Silahkan Isi Data Bahan Masuk Dibawah Ini</strong></h5>
</li>
</ol>


<form method="POST" action="<?php echo site_url('admin/cbahan_masuk/add') ?>" enctype="multipart/form-data" class="col-md-12">
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
<label for="jumlah">Jumlah</label>
<input value="" required="required" type="text" class="form-control" name="jumlah">                   
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="satuan">Satuan</label>
<input value="" required="required" type="text" class="form-control" name="satuan">                   
</div>

<div class="form-group">
<label for="asal_barang">Asal Barang</label>
<input value="" required="required" type="text" class="form-control" name="asal_barang">                   
</div>

<div class="form-group">
<label for="tanggal masuk">Tanggal Masuk</label>
<input required="required" type="date" class="form-control" name="tanggal_masuk">              
</div>
</div>
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













