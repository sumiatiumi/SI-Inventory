<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('partial_user/head.php'); ?>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<ol class="breadcrumb" style="background-color:grey; ">
<li class="breadcrumb-item active" style="color: navy; " ><b>Tambah Data Peminjaman</b></li>
</ol>
<form method="POST" action="<?php echo site_url('cpeminjaman_user/add') ?>" enctype="multipart/form-data" class="col-md-12">
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <label for="nama_peminjam" style="color:orange;" >NIM</label>
        <input type="text" class="form-control" value="<?php echo $this->session->userdata('username') ?>" style="background: #bbbaba;" readonly>
    </div>
    <div class="form-group">
        <label for="nama_peminjam" style="color:orange;" >Nama Peminjam</label>
        <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama') ?>" style="background: #bbbaba;" readonly>
    </div>

<div class="form-group">
<label for="nama_peminjam" style="color:orange;" >Barang</label>
    <select name="barang" id="barang" class="form-control">
        <option value="" style="color: white">Pilih</option>
        <?php
        foreach($option_barang as $o){
            echo '<option value="'.$o['value'].'">'.$o['label'].'</option>';
        }
        ?>
    </select>
</div>
</div>


<div class="col-md-6">
<div class="form-group">
<label for="tanggal_pinjam" style="color:orange; ">Tanggal Pinjam</label>
 <input required="required" value="<?php
                          date_default_timezone_set('Asia/Jakarta');
                          $now = date('Y-m-d');
                          echo $now; ?>"  type="date" class="form-control" name="tanggal_pinjam">
</div>



<div class="form-group">
<label for="jumlah"style="color:orange; style="color:orange;>Jumlah</label>
<input value="" type="text" class="form-control" name="jumlah">
</div>

<div class="form-group">
    <label style="color:orange;"><b>Spesifikasi</b></label>
    <input type="text" id="spesifikasi" class="form-control" style="background: #bbbaba;" readonly>
</div>
</div>
</div>

<div class="card-footer small text-muted text-center">
<button name='tambah' type='submit' class='btn btn-primary col-md-2 col-xs-12'>REQUEST</button>
</div>
</form>
<p class="small text-center text-muted my-5">
<em></em>
</p>
</div>
<br>
<script>
$(document).ready(function(){
    $("#barang").change(function(){
        var v = atob($(this).val())
        var s = v.split("<|>")

        $("#spesifikasi").val(s[1])
    })
})
</script>

</style>
<?php $this->load->view("partial_user/foot.php") ?>

</html>
