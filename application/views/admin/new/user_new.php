<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php $this->load->view("partial_admin/head.php") ?>

 <div id="content-wrapper">

     <div class="container-fluid">

      <ol class="breadcrumb">

<li class="breadcrumb-item active">
<h5> <strong>Silahkan Isi Data User Dibawah Ini</strong></h5>
</li>
</ol>

<form method="POST" action="<?php echo site_url('admin/User/add') ?>" enctype="multipart/form-data" class="col-md-12">
<div class="row">
<div class="col-md-6">

                 <div class="form-group">
                    <label for="nama">Nama</label>
                    <input value="" required="required" type="text" class="form-control" name="nama">
                  </div>

                  <div class="form-group">
                    <label for="username">Username</label>
                    <input value="" required="required" type="text" class="form-control" name="username">
                  </div>

                  <div class="form-group">
                    <label for="passwod">Password</label>
                    <input value="" required="required" type="Password" class="form-control" name="password">                   
                  </div>

                 

                   <label for="akses">Akses</label>
           <select value=""  required="required" type="text" class="form-control" name="akses">
           <option value="user">user</option>
           <option value="admin">admin</option>
           <option value="kalab">kalab</option>
           </select>
                 
                        
                  <br>
                  <br>
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













