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
	Data Alat Keluar
    
	</div>
    </div>
    
    <!--SEARCH DATA-->
	<?php echo form_open('kaleb/c_alatkeluar/search') ?>
    <div class="row float-right"  style="padding-left: 35px;"> 
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
								<th style="text-align: center">Spesifikasi</th>
								<th style="text-align: center">Jumlah</th> 
								<th style="text-align: center">Lokasi Tujuan</th> 
								<th style="text-align: center">Tanggal Keluar</th> 
								<th style="text-align: center">Ket.Kondisi</th>  
							
							                      
								                
							</tr>
						</thead>
			    	<?php $no = 1; foreach ( $tb_alatkeluar as $keluar ) :?>
							<tbody>

								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $keluar->kode_barang ?></td>
									<td><?php echo $keluar->nama_barang ?></td>
									<td><?php echo $keluar->nomor_pengadaan ?></td>
									<td><?php echo $keluar->document ?></td>
									<td><?php echo $keluar->spesifikasi ?></td>
									<td><?php echo $keluar->jumlah ?></td>
									<td><?php echo $keluar->lokasi ?></td>
									<td><?php echo $keluar->tanggal_keluar ?></td>
									<td><?php echo $keluar->kondisi ?></td>
									
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