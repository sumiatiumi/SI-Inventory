<?php $this->load->view("partial_admin/head.php") ?>

<div id="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <h5><strong>Konfirmasi Peminjaman</strong></h5>
            </li>
        </ol>

        <form method="post" action="<?php echo base_url('admin/cpeminjaman/konfirmasi_peminjaman/'.$peminjaman['id_peminjaman']) ?>">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>NIM</label>
                        <input type="text" class="form-control" value="<?php echo $peminjaman['username']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Peminjam</label>
                        <input type="text" class="form-control" value="<?php echo $peminjaman['nama']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="text" class="form-control" value="<?php echo $peminjaman['jumlah']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="konfirmasi" class="form-control">
                            <option value="Disetujui">Disetujui</option>
                            <option value="Ditolak">Ditolak</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Barang</label>
                        <input type="text" class="form-control" value="<?php echo $peminjaman['kode_barang'].' - '.$peminjaman['nama_barang']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Spesifikasi</label>
                        <input type="text" class="form-control" value="<?php echo $peminjaman['spesifikasi']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <input type="text" class="form-control" value="<?php echo date('d-m-Y', strtotime($peminjaman['tanggal_pinjam'])); ?>" readonly>
                    </div>
                </div>
            </div>

            <hr />
            <button type="submit" name="submit" value="true" class="btn btn-primary">Konfirmasi</button>
        </form>
    </div>
</div>

<?php $this->load->view("partial_admin/foot.php") ?>
</html>
