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
<h5> <strong>Silahkan Ubah Data Pengumuman Dibawah Ini</strong></h5>
</li>
</ol>
            <?php foreach ($pengumuman as $info) {
              # code...
            
            ?>

            <form method="post" action="<?php echo base_url().'admin/home/update'; ?>" enctype="multipart/form-data" class="col-md-12">
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <input value="<?php echo $info->id_pengumuman; ?>" type="hidden" class="form-control" name="id_pengumuman">
                    <input value="<?php echo $info->time; ?>" type="hidden" class="form-control" name="time">
                    <label for="judul berita">Judul Pengumuman</label>
                    <input value="<?php echo $info->judul; ?>" type="text" class="form-control" name="judul">
                  </div>
                  <div class="form-group">
                    <la
                    bel for="isi">Isi</label>
                    <textarea  name="isi" rows="4" cols="50" class="form-control " name="isi"><?php echo $info->isi; ?></textarea>                    
                  </div>
                </div>
    
                </div>
              </div>

              <div class="card-footer small text-mutedtext-center">
    <button name='btn' type='submit' class='btn btn-primary col-md-2 col-xs-12'>Simpan Perubahan</button> 
  </div>
             </div>

           </form>

           <?php } ?>
           
           <p class="small text-center text-muted my-5">
            <em></em>
          </p>

        </div>

  <?php $this->load->view("partial_admin/foot.php") ?>
  </html>













