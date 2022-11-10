<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!--pemanggilan template -->
<?php $this->load->view("partial_admin/head.php") ?>

 <div id="content-wrapper">
 <div class="container-fluid">

 <!-- Breadcrumbs-->
  <ol class="breadcrumb">

<li class="breadcrumb-item active">
<h5> <strong>Silahkan Ubah Data Alat Masuk  dibawah Ini</strong></h5>
</li>
</ol>
 <?php foreach ($tb_alatmasuk as $masuk) {

 ?>

<form method="post" action="<?php echo base_url().'admin/c_alatmasuk/update'; ?>" enctype="multipart/form-data" class="col-md-12">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<input value="<?php echo $masuk->id_alatmasuk; ?>" type="hidden" class="form-control" name="id_barangmasuk">
<label for="kode barang">Kode Barang</label>
<input value="<?php echo $masuk->kode_barang ?>" type="text" class="form-control" name="kode_barang">
</div>

<div class="form-group">
<label for="nama barang">Nama Barang</label>
<input value="<?php echo $masuk->nama_barang; ?>" type="text" class="form-control" name="nama_barang">
</div>

<div class="form-group">
<label for="nomor pengadaan">Nomor Pengadaan</label>
<input value="<?php echo $masuk->nomor_pengadaan; ?>" type="text" class="form-control" name="nomor_pengadaan">
</div>


<div class="form-group">
      <label for="name"> Berkas</label>
      <input class="form-control-file <?php echo form_error('document')?'is-invalid':''?>" type="file" name="document">
      <div class="invalid-feedback">
            <?php echo form_error('document')?>

      </div>

</div>

 <div class="form-group">
                  <label>Spesifikasi</label>
                  <select class="form-control" name="id_spesifikasi" onchange="showUser(this.value)">

                  <option value="<?php echo $masuk->id_spesifikasi; ?>"><?php echo $masuk->spesifikasi ?></option>

                  <?php foreach ($tb_spesifikasi as $spek) { ?>
                  <option value="<?php echo $spek->id_spesifikasi; ?>"><?php echo $spek->spesifikasi; ?> </option>
                  <?php } ?>
                  </select>
                  </div>

                  <input type="hidden" name="id_alatmasuk" value="<?php echo $masuk->id_alatmasuk; ?>">

                  </div>

<div class="col-md-6">
<div class="form-group">
<label for="jumlah">Jumlah</label>
<input value="<?php echo $masuk->jumlah; ?>" type="text" class="form-control" name="jumlah">
</div>

<div class="form-group">
<label for="sumber_barang">Asal Barang</label>
<input value="<?php echo $masuk->sumber_barang; ?>" type="text" class="form-control" name="sumber_barang">
</div>

 <div class="form-group">
 <label for="Tanggal masuk">Tanggal Masuk</label>
 <input value="<?php $tgl = $masuk->tanggal_masuk;
 $date = date("Y-m-d", strtotime($tgl));
 echo $date ?>"  type="date" class="form-control" name="tanggal_masuk">
 </div>

<div class="form-group">
                  <label>Kondisi Barang</label>
                  <select class="form-control" name="id_kondisi" onchange="showUser(this.value)">

                  <option value="<?php echo $masuk->id_kondisi; ?>"><?php echo $masuk->kondisi ?></option>

                  <?php foreach ($kondisi_barang as $kondi) { ?>
                  <option value="<?php echo $kondi->id_kondisi; ?>"><?php echo $kondi->kondisi; ?> </option>
                  <?php } ?>
                  </select>
                  </div>

                  <input type="hidden" name="id_alatmasuk" value="<?php echo $masuk->id_alatmasuk; ?>">
</div>
</div>
</div>
<br>

<div class="card-footer small text-muted text-center">
<button name='btn' type='submit' class='btn btn-primary col-md-2 col-xs-12'>Simpan Perubahan</button>
</div>

 <div  class="card-footer small text-muted text-center"><a href="<?php echo base_url('admin/c_alatmasuk') ?>">
        <button name="batal" type="button" class="btn btn-primary col-md-2 col-xs-12 ">Kembali 
        </button></a></div>
</form>

<?php } ?>
<p class="small text-center text-muted my-5">
<em></em>
</p>
</div>

<?php $this->load->view("partial_admin/foot.php") ?>
</html>
