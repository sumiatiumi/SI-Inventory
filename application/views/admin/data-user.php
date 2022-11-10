<!DOCTYPE html>
<html>
<?php $this->load->view("partial_admin/head.php") ?>

<div id="content-wrapper">
<div class="container-fluid">

<!-- DataTables Example -->
<div class="card mb-3">
<div class="card-header">
<i class="fas fa-table" ></i>
 Data User                          
<a href="<?php echo base_url('admin/user/tambah') ?>">
<button name="tambah" type="button" class="btn btn-primary col-xs-3 float-right">Tambah Data User</button></a>
</div>
</div>

<?php echo form_open('admin/user/search') ?>
<div class="row float-right"> 
<input type="text" name="keyword" class="col-md-7 mr-2 form-control" placeholder="Masukkan kata kunci">
<button type="submit" name="search_submit" class="btn btn-primary"><i class="fas fa-search" ></i> Search</button>
<?php echo form_close() ?>
</div>
                     
<div class="card-body">
<div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
			   <tr>
				   <th>No</th>
				   <th>Nama</th>
				   <th>Username</th>
				   <th>Password</th>  
				   <th>Akses</th>  
				   <th>Aksi</th>                   
				   </tr>
				   </thead>
			<?php $no = 1; foreach($user as $us) : ?>
				<tbody>
					  <tr>
					  <td><?php echo $no++; ?></td>
					  <td><?php echo $us->nama ?></td>
					  <td><?php echo $us->username ?></td>
					  <td><?php echo $us->password ?></td>
					  <td><?php echo $us->akses ?></td>
					  <td>
                       <a href="<?php echo site_url('admin/user/edit/'.$us->id_user) ?>" class="btn btn-small" ><i class="fas fa-edit" style="color: green;"></i></a>
			          <a onclick="return confirm ('Data Akan dihapus?')" href="<?php echo site_url('admin/user/delete/'.$us->id_user) ?>" class="btn btn-small" ><i class="fas fa-trash" style="color: red;"></i></a>
                      </td>
					  </tr>
				</tbody>
			<?php endforeach ;?>
	      </table>
</div>
</div>


<div class="card-footer small text-muted"></div>
</div>
<p class="small text-center text-muted my-5">
<em></em>
</p>
</div>
<?php $this->load->view("partial_admin/foot.php") ?>
</html>