<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php $this->load->view("partial_admin/head.php") ?>
<meta http-equiv="refresh" content="10" />
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

   <!-- <form class="form-inline" method="get" action="<?php echo base_url("admin/cpeminjaman/pencarian/")?>">
    <div class="" align="center"  style="padding: 5px;">
    <select class="form-control" name="prodi">
    <option>Status Peminjaman</option>
    <option value="sedang diproses">Sedang diproses</option>
    <option value="sedang dipinjam">Sedang dipinjam</option>
    <option value="sikembalikan">Dikembalikan</option>
    </select>
    </div>
    <br>
    <input type="submit" class="btn btn-primary" value="Cari">
    </div>
    </form>
   <a class="btn btn-info pull-right" type="submit" href="<?php echo site_url('admin/cpeminjaman/cetakPeminjaman');?>">
    <i class="fa fa-print"></i> Cetak</a> -->


     <?php echo form_open('admin/cpeminjaman/search') ?>
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
								<th style="text-align: center">Aksi</th>


							</tr>
						</thead>
			         	<?php $no = 1; foreach  ( $peminjaman as $pinjam) :?>
							<tbody>

								<tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $pinjam->username?></td>
									<td><?php echo $pinjam->nama?></td>
									<td><?php echo $pinjam->kode_barang?></td>
									<td><?php echo $pinjam->nama_barang ?></td>
									<td><?php echo $pinjam->jumlah ?></td>
									<td><?php echo $pinjam->spesifikasi ?></td>
									<td><?php echo $pinjam->tanggal_pinjam ?></td>
									<td><?php echo $pinjam->tanggal_kembali ?></td>
									<td><?php echo $pinjam->status_pinjam ?></td>
									<td><?php echo $pinjam->komfirmasi ?></td>
									<td>
                                         <div class="dropdown">
                                             <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                 <i class="fas fa-cog"></i>
                                             </button>
                                             <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                 <?php
                                                 if($pinjam->status_pinjam == 'Sedang diproses'){
                                                     ?>
                                                     <a class="dropdown-item" href="<?php echo site_url('admin/cpeminjaman/konfirmasi_peminjaman/'.$pinjam->id_peminjaman) ?>">
                                                         <i class="fas fa-check-circle"></i> &nbsp;Konfirmasi Peminjaman
                                                     </a>
                                                     <?php
                                                 }
                                                 
                                                 if($pinjam->status_pinjam == 'Sedang dipinjam'){
                                                     ?>
                                                     <a class="dropdown-item" href="<?php echo site_url('admin/cpeminjaman/konfirmasi_pengembalian/'.$pinjam->id_peminjaman) ?>">
                                                         <i class="fas fa-check-circle"></i> &nbsp;Konfirmasi Pengembalian
                                                     </a>
                                                     <?php
                                                 }
                                                 ?>
                                                 <a class="dropdown-item" href="<?php echo site_url('admin/cpeminjaman/delete/'.$pinjam->id_peminjaman) ?>" onclick="return confirm ('Data Akan dihapus?')">
                                                     <i class="fas fa-trash-alt text-danger"></i> &nbsp;Hapus
                                                 </a>
                                             </div>
                                         </div>
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
