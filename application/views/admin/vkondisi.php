<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php $this->load->view("partial_admin/head.php") ?>

 <div id="content-wrapper">
 <div class="container-fluid">

	<!-- DataTables Example -->
	<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i>
	Data Kondisi
    <a href="<?php echo base_url('admin/ckondisi/tambah') ?>">
	<button name="tambah" type="button" class="btn btn-primary col-xs-3 float-right">Tambah Kondisi</button></a>
	</div>

		<div class="card-body">
				<div class="table-responsive mt-2">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead >
							<tr>
								<th style="text-align: center">No</th>
								<th style="text-align: center">Kondisi</th>
								<th style="text-align: center">Edit/Hapus</th> 
							                      
								                
							</tr>
						</thead>
						<?php $no = 1; foreach ($kondisi_barang as $kondi) :?>
							<tbody>

								<tr>
									<td width="50"><?php echo $no++; ?></td>
									<td width="200" ><?php echo $kondi->kondisi ?></td>
									<td width="200">
									 <a href="<?php echo site_url('admin/ckondisi/edit/'.$kondi->id_kondisi) ?>" class="btn btn-small" ><i class="fas fa-edit" style="color: green;"></i></a>
									 <a onclick="return confirm ('Data Akan dihapus?')" href="<?php echo site_url('admin/ckondisi/delete/'.$kondi->id_kondisi) ?>" class="btn btn-small" ><i class="fas fa-trash" style="color: red;"></i></a>
									</td>
								</tr>

							</tbody>
						<?php endforeach;?>
					</table>

				</div>
			</div>
			<!--wrapper-->
		</div>
	</div>

	<?php $this->load->view("partial_admin/foot.php") ?>
	</html>