<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php $this->load->view("partial_admin/head.php") ?>


    <div class="container-fluid">

	<!-- DataTables Example -->
	<div class="card mb-3">
			
	<?php echo form_open('admin/cbarang_masuk/search') ?>
     <div class="row"  style="padding-left: 35px; padding-top: 10px;"> 
    <input type="text" name="keyword" class="col-md-2 mr-2 form-control" placeholder="Masukkan kata kunci">
    <button type="submit" name="search_submit" class="btn btn-primary"><i class="fas fa-search" ></i> Cari</button>
 
  <?php echo form_close() ?>
   
	</div>
	
		<div class="card-body">
				<div class="table-responsive mt-2">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead >
							<tr>
								<th style="text-align: center" >No</th>
								<th style="text-align: center" >Kode Barang</th>
								<th style="text-align: center" >Nama Barang</th>
								<th style="text-align: center"> Nomor Pengadaan</th> 
								<th style="text-align: center">Spesifikasi</th>
								<th style="text-align: center">Jumlah</th> 
								<th style="text-align: center">Asal Barang</th> 
								<th style="text-align: center">Tanggal Masuk</th> 
								<th style="text-align: center">Kondisi</th>
								<th style="text-align: center">Edit/Hapus</th> 
							                      
								                
							</tr>
						</thead>
						<?php $no = 1; foreach ( $barang_masuk as $masuk ) :?>
							<tbody>

								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $masuk->kode_barang?></td>
									<td><?php echo $masuk->nama_barang?></td>
									<td><?php echo $masuk->nomor_pengadaan?></td>
									<td><?php echo $masuk->spesifikasi?></td>
									<td><?php echo $masuk->jumlah?></td>
									<td><?php echo $masuk->sumber_barang?></td>
									<td><?php echo $masuk->tanggal_masuk?></td>
									<td><?php echo $masuk->kondisi?></td>
									<td >
									 <a href="<?php echo site_url('admin/cbarang_masuk/edit/'.$masuk->id_barangmasuk) ?>" class="btn btn-small" ><i class="fas fa-edit" style="color: green;"></i></a>
									 <a onclick="return confirm ('Data Akan dihapus?')" href="<?php echo site_url('admin/cbarang_masuk/delete/'.$masuk->id_barangmasuk) ?>" class="btn btn-small" ><i class="fas fa-trash" style="color: red;"></i></a>
									</td>
									 
									
								</tr>

							</tbody>
						<?php endforeach;?>
					</table>


					<div  class="card-footer small text-muted text-center"><a href="<?php echo base_url('laporan/cetak_filterMasuk') ?>">
        <button name="submit" type="submit" class="btn btn-primary col-md-2 col-xs-12 ">
            <i class="fa fa-print"></i> Cetak
        </button></a></div>

<div  class="card-footer small text-muted text-center"><a href="<?php echo base_url('admin/cbarang_masuk') ?>">
        <button name="batal" type="button" class="btn btn-primary col-md-2 col-xs-12 ">Kembali 
        </button></a></div>


				</div>
			</div>
			
		</div>
	</div>

	<?php $this->load->view("partial_admin/foot.php") ?>
	</html>