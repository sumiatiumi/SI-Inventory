<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php $this->load->view("partial_kaleb/head.php") ?>

   <div id="content-wrapper">
   <div class="container-fluid">

	<!-- DataTables Example -->
	<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i>
	 Data Alat Masuk
    </div>
    </div>

	<?php echo form_open('kaleb/c_alatmasuk/search') ?>
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
								<th style="text-align: center" >No</th>
								<th style="text-align: center" >Kode Barang</th>
								<th style="text-align: center" >Nama Barang</th>
								<th style="text-align: center" >Nomor Pengadaan</th> 
								<th style="text-align: center" >Berkas</th>
								<th style="text-align: center" >Spesifikasi</th>
								<th style="text-align: center" >Jumlah (Unit)</th> 
								<th style="text-align: center" >Asal Barang</th> 
								<th style="text-align: center" >Tanggal Masuk</th> 
								<th style="text-align: center" >Kondisi</th>               
							</tr>
						</thead>
						<?php $no = 1; foreach ( $alat_masuk as $masuk ) :?>
							<tbody>

								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $masuk->kode_barang?></td>
									<td><?php echo $masuk->nama_barang?></td>
									<td><?php echo $masuk->nomor_pengadaan?></td>
									<td><?php echo $masuk->document?></td>
									<td><?php echo $masuk->spesifikasi?></td>
									<td><?php echo $masuk->jumlah?></td>
									<td><?php echo $masuk->sumber_barang?></td>
									<td><?php echo $masuk->tanggal_masuk?></td>
									<td><?php echo $masuk->kondisi?></td>
									
								</tr>
							</tbody>
						<?php endforeach;?>
					</table>
				</div>
			</div>
			<!--wrapper-->
		</div>
	</div>

	<?php $this->load->view("partial_kaleb/foot.php") ?>
	</html>