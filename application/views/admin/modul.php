<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php $this->load->view("partial_admin/head.php") ?>

<body id="page-top">
<div id="content-wrapper">
<div class="container-fluid">
        
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
         <!-- form tambah file -->
      	<?php echo form_open_multipart('admin/upload_file/tambah_aksi'); ?>
		    <div class="row">
			  <div class="col-md-4"></div>
        <div class="col-md-4">
				<div class="form-group">
          
           <!-- ini untuk table isian modul -->
           <label for="nama_modul"><b>Nama Modul</b></label>
           <input value=""  required="required" type="text" class="form-control" name="nama_modul">
          
					 <label for="document"><b>File Modul</b> </label><br>
           <input value=""  type="file" class="" name="document">
           <br>

           <label for="prodi"><b>Prodi</b></label>
           <select value=""  required="required" type="text" class="form-control" name="prodi">
           <option value="Manajemen Informatika">Manajemen Informatika</option>
           <option value="Teknik Informatika">Teknik Informatika</option>
           <option value="Teknik Komputer">Teknik Komputer</option>
           </select>
        
           <label for="tahun"><b>Tahun</b></label>
           <select value=""  required="required" type="text" class="form-control" name="tahun">
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
           <select value=""  required="required" type="text" class="form-control" name="semester">
           <option value="Genap">Genap</option>
           <option value="Ganjil">Ganjil</option>
           </select>

			    </div>
			</div>
		</div>
    <br>
   
		<div class="card-footer small text-muted text-center">
    <button name='tambah' type='submit' class='btn btn-primary col-md-2 col-xs-12'>Simpan </button> 
		</div>

    <div  class="card-footer small text-muted text-center"><a href="<?php echo base_url('admin/cmodul') ?>">
    <button name="batal" type="button" class="btn btn-primary col-md-2 col-xs-12 ">Kembali 
    </button></a></div>
	  <?php form_close(); ?>

      
           
     

     </div>

     </body>

     <!-- /.container-fluid -->

     </div>
     <!-- /.content-wrapper -->

     </div>
     <!-- /#wrapper -->

  


  

</body>
<?php $this->load->view("partial_admin/foot.php") ?>
</html>
