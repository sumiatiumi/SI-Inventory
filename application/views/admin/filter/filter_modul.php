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
	 Data Modul Praktikum
    <a href="<?php echo base_url('admin/upload_file') ?>">
	<button name="tambah" type="button" class="btn btn-primary col-xs-3 float-right">Tambah Modul</button></a>
	</div>
    </div>

	<form class="form-inline" method="get" action="<?php echo base_url("admin/cmodul/pencarian/")?>">
    <div class="" align="center"  style="padding: 5px;">
    <select class="form-control" name="prodi">
    <option>Program Studi</option>
    <option value="Manajemen Informatika">Manajemen Informatika</option>
    <option value="Teknik Informatika">Teknik Informatika</option>
    <option value="Teknik Komputer">Teknik Komputer</option>
    </select>
    </div> 
                     
    <div class="" align="center" style="padding: 5px;">
    <select class="form-control" name="semester">
    <option>Semester</option>
    <option value="Ganjil">Ganjil</option>
    <option value="Genap">Genap</option>
    </select>
    </div>
    <br>
    <input type="submit" class="btn btn-primary" value="Cari">              
    </div>

     <?php echo form_open('admin/user/search') ?>
     <div class="row float-right"> 
     <input type="text" name="keyword" class="col-md-7 mr-2 form-control" placeholder="Masukkan kata kunci">
     <button type="submit" name="search_submit" class="btn btn-primary"><i class="fas fa-search" ></i> Search</button>
     <?php echo form_close() ?>
     </div>
     </form>

		<div class="card-body">
				<div class="table-responsive mt-2">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead >
							<tr>
								<th style="text-align: center">No</th>
								<th style="text-align: center">Nama Modul</th>
								<th style="text-align: center">File Modul</th> 
								<th style="text-align: center" >Prodi</th>
								<th style="text-align: center">Tahun</th>
								<th style="text-align: center">Semester</th> 
								<th style="text-align: center">Edit/Hapus</th> 
							                      
								                
							</tr>
						</thead>
						<?php $no = 1;
						foreach ($modul as $modu) :?>
							<tbody>

								<tr>
									<td><?php echo $no++; ?></td>
									<td width="200" ><?php echo $modu->nama_modul ?></td>
									<td width="200" ><?php echo $modu->document ?></td>
									<td width="200"><?php echo $modu->prodi ?></td>
									<td width="200"><?php echo $modu->tahun ?></td>
									<td width="200"><?php echo $modu->semester ?></td>
									<td width="120">
									 <a href="<?php echo site_url('admin/cmodul/edit/'.$modu->id_modul) ?>" class="btn btn-small" ><i class="fas fa-edit" style="color: green;"></i></a>
									 <a onclick="return confirm ('Data Akan dihapus?')" href="<?php echo site_url('admin/cmodul/delete/'.$modu->id_modul) ?>" class="btn btn-small" ><i class="fas fa-trash" style="color: red;"></i></a>
									</td>
								</tr>
							</tbody>
						<?php endforeach;?>
					</table>
				</div>
			</div>
	<!-- wraper-->	
		</div>
    <!-- container-->
	</div>

	<?php $this->load->view("partial_admin/foot.php") ?>
	</html>