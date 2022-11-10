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
	 Data Bahan Keluar
    <a href="<?php echo base_url('admin/cbahan_keluar/tambah') ?>">
	<button name="tambah" type="button" class="btn btn-primary col-xs-3 float-right">Tambah Data Bahan Keluar</button></a>
	</div>
    </div>

	 <?php echo form_open('admin/cbarang_masuk/search') ?>
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
								<th style="text-align: center" >Kode Barang</th>
								<th style="text-align: center" >Nama Barang</th>
								<th style="text-align: center">Jumlah</th> 
								<th style="text-align: center">Satuan</th>
								<th style="text-align: center">Lokasi Tujuan</th> 
								<th style="text-align: center">Tanggal Keluar</th> 
								<th style="text-align: center">Edit/Hapus</th> 
							                      
								                
							</tr>
						</thead>
			    	<?php $no=1; foreach ( $tb_bahankeluar as $keluar ) :?>
							<tbody>

								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $keluar->kode_barang ?></td>
									<td><?php echo $keluar->nama_barang ?></td>
									<td><?php echo $keluar->jumlah ?></td>
									<td><?php echo $keluar->satuan ?></td>
									<td><?php echo $keluar->lokasi_tujuan ?></td>
									<td><?php echo $keluar->tanggal_keluar ?></td>
					
									<td>
									<a href="<?php echo site_url('admin/cbahan_keluar/edit/'.$keluar->id_bahankeluar) ?>" class="btn btn-small" ><i class="fas fa-edit" style="color: green;"></i></a>
									<a onclick="return confirm ('Data Akan dihapus?')" href="<?php echo site_url('admin/cbahan_keluar/delete/'.$keluar->id_bahankeluar) ?>" class="btn btn-small" ><i class="fas fa-trash" style="color: red;"></i></a>
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