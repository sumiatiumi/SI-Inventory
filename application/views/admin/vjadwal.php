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
	 Data Jadwal
    <a href="<?php echo base_url('admin/cjadwal/tambah') ?>">
	<button name="tambah" type="button" class="btn btn-primary col-xs-3 float-right">Tambah Jadwal</button></a>
	</div>
    </div>
     <!--SEARCH DATA-->
	 <?php echo form_open('admin/cjadwal/search') ?>
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
								<th style="text-align: center" >Praktikum</th>
								<th style="text-align: center">Hari/waktu</th>
								<th style="text-align: center">Tanggal</th> 
								<th style="text-align: center">Edit/Hapus</th> 
							                      
								                
							</tr>
						</thead>
						<?php $no = 1; foreach ($tb_jadwal as $info) :?>
							<tbody>

								<tr>
									<td><?php echo $no++; ?></td>
									<td width="300"><?php echo $info->praktikum ?></td>
									<td width="300" ><?php echo $info->hari_waktu ?></td>
									<td width="300" ><?php echo $info->tanggal ?></td>
									<!-- EDIT $ DELETE DATA-->
									<td width="120">
									 <a href="<?php echo site_url('admin/cjadwal/edit/'.$info->id_jadwal) ?>" class="btn btn-small" ><i class="fas fa-edit" style="color: green;"></i></a>
									 <a onclick="return confirm ('Data Akan dihapus?')" href="<?php echo site_url('admin/cjadwal/delete/'.$info->id_jadwal) ?>" class="btn btn-small" ><i class="fas fa-trash" style="color: red;"></i></a>
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