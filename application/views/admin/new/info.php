<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php $this->load->view("partial_admin/head.php") ?>

 <div id="content-wrapper">

     <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">

<li class="breadcrumb-item active">
<h5> <strong>Silahkan Isi Pengumuman Dibawah Ini</strong></h5>
</li>
</ol>


            <form method="POST" action="<?php echo site_url('admin/home/add') ?>" enctype="multipart/form-data" class="col-md-12">
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="judul berita">Judul Pengumuman</label>
                    <input value="" required="required" type="text" class="form-control" name="judul">
                  </div>
                  <div class="form-group">
                    <label for="isi">Isi</label>
                    <textarea name="isi" required="required" rows="4" cols="50" class="form-control" name="isi"></textarea>                    
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

  <?php $this->load->view("partial_admin/foot.php") ?>
  </html>













