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
	 Data Bahan Keluar
	</div>
    </div>

	 <?php echo form_open('kaleb/cbarang_masuk/search') ?>
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
								<th style="text-align: center">Jumlah (satuan)</th> 
								<th style="text-align: center">Lokasi Tujuan</th> 
								<th style="text-align: center">Tanggal Keluar</th>            
							</tr>
						</thead>
			    	<?php $no=1; foreach ( $tb_bahankeluar as $keluar ) :?>
							<tbody>

								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $keluar->kode_barang ?></td>
									<td><?php echo $keluar->nama_barang ?></td>
									<td><?php echo $keluar->jumlah ?></td>
									<td><?php echo $keluar->lokasi_tujuan ?></td>
									<td><?php echo $keluar->tanggal_keluar ?></td>
									
								</tr>

							</tbody>
						<?php endforeach;?>  
					</table>

				</div>
			</div>
			
		</div>
	</div>

	<?php $this->load->view("partial_kaleb/foot.php") ?>
	</html>