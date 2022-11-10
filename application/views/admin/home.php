<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php $this->load->view("partial_admin/head.php") ?>

 <div id="content-wrapper">
 <div class="container-fluid">

	<!-- ADD DATA -->
	<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i>
	 Data Pengumuman
    <a href="<?php echo base_url('admin/home/tambah') ?>">
	<button name="tambah" type="button" class="btn btn-primary col-xs-3 float-right">Tambah Pengumuman</button></a>
	</div>
    </div>
     <!--SEARCH DATA-->
	 <?php echo form_open('admin/home/search') ?>
     <div class="row float-right"  style="padding-left: 35px; padding-top: 10px;"> 
     <input type="text" name="keyword" class="col-md-7 mr-2 form-control" placeholder="Masukkan kata kunci">
     <button type="submit" name="search_submit" class="btn btn-primary"><i class="fas fa-search" ></i> Cari</button>
     <?php echo form_close() ?>
	 </div>

		<div class="card-body">
				<div class="table-responsive mt-2">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead >
							<tr>
								<th style="text-align: center">No</th>
								<th style="text-align: center" >Judul</th>
								<th style="text-align: center">Isi</th>
								<th style="text-align: center">Waktu</th> 
								<th style="text-align: center">Edit/Hapus</th> 
							                      
								                
							</tr>
						</thead>
						<?php $no = 1; foreach ($pengumuman as $info) :?>
							<tbody>

								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $info->judul ?></td>
									<td width="500" ><?php echo $info->isi ?></td>
									<td width="200" ><?php echo $info->time ?></td>
									<!-- EDIT $ DELETE DATA-->
									<td width="120">
									 <a href="<?php echo site_url('admin/home/edit/'.$info->id_pengumuman) ?>" class="btn btn-small" ><i class="fas fa-edit" style="color: green;"></i></a>
									 <a onclick="return confirm ('Data Akan dihapus?')" href="<?php echo site_url('admin/home/delete/'.$info->id_pengumuman) ?>" class="btn btn-small" ><i class="fas fa-trash" style="color: red;"></i></a>
									</td>
									 
									
								</tr>

							</tbody>
						<?php endforeach;?>
					</table>

				</div>
			</div>
			
		</div>
	</div>

	<?php $this->load->view("partial_admin/foot.php") ?>
	</html>