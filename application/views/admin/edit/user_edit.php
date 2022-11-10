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

           <ol class="breadcrumb">

<li class="breadcrumb-item active">
<h5> <strong>Silahkan Ubah Data User Dibawah Ini</strong></h5>
</li>
</ol>
          
            <?php foreach ($user as $user) {
              # code...
            
            ?>

            <form method="post" action="<?php echo base_url().'admin/user/update'; ?>" enctype="multipart/form-data" class="col-md-12">
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <input value="<?php echo $user->id_user; ?>" type="hidden" class="form-control" name="id_user">
                    <label for="nama">Nama</label>
                    <input value="<?php echo $user->nama; ?>" type="text" class="form-control" name="nama">
                  </div>

                    <div class="form-group">
                    <label for="username">Username</label>
                    <input value="<?php echo $user->username; ?>" type="text" class="form-control" name="username">
                  </div>

                 <div class="form-group">
                    <label for="password">Password</label>
                    <input value="<?php echo $user->password; ?>" type="text" class="form-control" name="password">
                  </div>

                    <div class="form-group">
                    <label for="akses">Akses</label>
                     <select value="<?php echo $user->akses; ?>"  required="required" type="text" class="form-control" name="akses">
                       <option value="user">user</option>
                    <option value="admin">admin</option>
                    <option value="kalab">kalab</option>
                    </select>
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













