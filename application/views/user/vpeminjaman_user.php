<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('partial_user/head.php'); ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <meta http-equiv="refresh" content="15" />
</head>

<ol class="breadcrumb" style="background-color:goldenrod">
    <li class="breadcrumb-item active" style="color: navy;"><b>DATA PEMINJAMAN</b></li>
</ol>

<div class="card bg-primary">
    <div class="card-body">
        <a href="<?php echo base_url('cpeminjaman_user/tambah') ?>" class="btn btn-primary">+ REQUEST / PENGAJUAN BARU</a>
        <hr />
        <div class="table-responsive">
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
                <tbody>
                    <?php $no = 1; foreach  ( $peminjaman as $pinjam) :?>
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
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->load->view("partial_user/foot.php") ?>
<script>
$(document).ready(function(){
    $("#dataTable").dataTable({
        width: "100%"
    })
})
</script>
</html>
