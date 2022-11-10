
 <!DOCTYPE html>
<html lang="en">

<?php $this->load->view('partial_admin/head.php') ?>
<body id="page-top">

 


    <div id="content-wrapper">

      <div class="container-fluid">
      <?php if ($this->session->flashdata('sukses')){ ?>
        <div class="alert alert-warning" role="alert">
          <?php echo $this->session->flashdata('sukses'); ?>
        </div>
        <?php } ?>

        <?php if ($this->session->flashdata('hapus')){ ?>
        <div class="alert alert-warning" role="alert">
          <?php echo $this->session->flashdata('hapus'); ?>
        </div>
        <?php } ?>
          <div class="row">
  <div class="col-md-4"></div>
    <div class="col-md-4">
      <ol class="breadcrumb"  style="width: 420px;">
       <li class="breadcrumb-item " >
        <h5> <strong>Silahkan Ubah Data Modul Praktikum Dibawah Ini</strong></h5>
       </li>
      </ol>
    </div>
  </div>

  <!-- form tambah ruang -->
	<?php echo form_open_multipart('admin/cmodul/update_data'); ?>
		<div class="row">
			<div class="col-md-4"></div>
        <div class="col-md-4">
				<div class="form-group">

			<?php foreach ($modul as $mode){ ?>
        
            <br>
            <!-- ini untuk table isian coursel -->
            <input type="hidden" name="id_modul" value="<?php echo $mode->id_modul; ?>">
            <label for="nama_modul"><b>Nama Modul</b></label>
            <input value="<?php echo $mode->nama_modul ?>"  type="text" class="form-control" name="nama_modul">
            <br>
					  <label for="document"><b>Modul Praktikum</b> </label>
            <br>
            <input value="<?php echo $mode->document ?>" type="document" class="" name="document">
            <br>
            
            <label><b>Ubah Modul</b></label><br>
            <span><?php echo $mode->document?></span>
           <input value="<?php echo $mode->document ?>" type="file" class="" name="document">
           <br>
           <input type="hidden" name="prodi" value="<?php echo $mode->prodi; ?>">
           <label for="prodi"><b>Prodi</b></label>
           <select value="<?php echo $mode->prodi ?>"  required="required" type="text" class="form-control" name="prodi">
           <option value="Manajemen Informatika">Manajemen Informatika</option>
           <option value="Teknik Informatika">Teknik Informatika</option>
           <option value="Teknik Komputer">Teknik Komputer</option>
           </select>
           
           
           <label for="tahun"><b>Tahun</b></label>
           <select value="<?php echo $mode->tahun ?>"  required="required" type="text" class="form-control" name="tahun">
           <option value="2016">2016</option>
           <option value="2017">2017</option>
           <option value="2018">2018</option>
           <option value="2019">2019</option>
           <option value="2020">2020</option>
           <option value="2021">2021</option>
           <option value="2022">2022</option>
           <option value="2023">2023</option>
           <option value="2024">2024</option>
           <option value="2025">2025</option>
           </select>
           
           
           <label for="semester"><b>Semester</b></label>
           <select value="<?php echo $mode->semester ?>"  required="required" type="text" class="form-control" name="semester">
           <option value="Genap">Genap</option>
           <option value="Ganjil">Ganjil</option>
           </select>
			    </div>
			</div>
		</div>
		<div class="card-footer small text-muted text-center">
        <button name='tambah' type='submit' class='btn btn-primary col-md-2 col-xs-12'>Simpan </button> 
		</div>
    <div  class="card-footer small text-muted text-center"><a href="<?php echo base_url('admin/cmodul') ?>">
        <button name="batal" type="button" class="btn btn-primary col-md-2 col-xs-12 ">Kembali 
        </button></a></div>

      <?php } ?>
	<?php form_close(); ?>
     




</div>


<!-- /.container-fluid -->

      </div>

    </div>
    <!-- /.content-wrapper -->


 
   
</body>



</html>
