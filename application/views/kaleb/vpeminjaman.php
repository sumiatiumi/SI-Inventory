<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php $this->load->view("partial_kaleb/head.php") ?>
<meta http-equiv="refresh" content="360" />
</head>
 <div id="content-wrapper">
 <div class="container-fluid">

	<!-- DataTables Example -->
	<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i>
	 Data Peminjaman
	</div>
    </div>


     <?php echo form_open('kaleb/cpeminjaman/search') ?>
     <div class="row float-right"  style="padding-left: 35px; padding-top: 10px;"> 
     <input type="text" name="keyword" class="col-md-7 mr-2 form-control" placeholder="Masukkan kata kunci">
     <button type="submit" name="search_submit" class="btn btn-primary"><i class="fas fa-search" ></i> Cari</button>
     </div>

		<div class="card-body">
				<div class="table-responsive mt-2">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead >
							<tr>
								<th style="text-align: center">No</th>
								<th style="text-align: center" >NIM</th>
								<th style="text-align: center" >Nama Peminjam</th>
								<th style="text-align: center" >Kode Barang</th>
								<th style="text-align: center" >Nama Barang</th>
								<th style="text-align: center">Jumlah</th>  
								<th style="text-align: center">Spesifikasi</th>
								<th style="text-align: center">Tangggal Pinjam</th>
								<th style="text-align: center">Tangggal Kembali</th>
								<th style="text-align: center">Status Peminjaman</th>
                                <th style="text-align: center">Komfirmasi Peminjaman</th>
								                
							</tr>
						</thead>
			         	<?php $no = 1; foreach  ( $peminjaman as $pinjam) :?>
							<tbody>

								<tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $pinjam->nim?></td>
									<td><?php echo $pinjam->nama_peminjam?></td>
									<td><?php echo $pinjam->kode_barang?></td>
									<td><?php echo $pinjam->nama_barang ?></td>
									<td><?php echo $pinjam->jumlah ?></td>
									<td><?php echo $pinjam->spesifikasi ?></td>
									<td><?php echo $pinjam->tanggal_pinjam ?></td>
									<td><?php echo $pinjam->tanggal_kembali ?></td>
									<td><?php echo $pinjam->status_pinjam ?></td>
									<td><?php echo $pinjam->komfirmasi ?></td>
							
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