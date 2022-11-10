<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<?php $this->load->view("partial_admin/head.php") ?>

<div id="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <h5> <strong>Silahkan Isi Data Peminjaman Barang  Dibawah Ini</strong></h5>
            </li>
        </ol>

        <form method="POST" action="<?php echo site_url('admin/cpeminjaman/add') ?>" enctype="multipart/form-data" class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_peminjam">NIM</label>
                        <input value="" required="required" type="text" class="form-control" name="nim">
                    </div>
                    <div class="form-group">
                        <label for="nama_peminjam">Nama Peminjam</label>
                        <input value="" required="required" type="text" class="form-control" name="nama_peminjam">
                    </div>

                    <div class="form-group">
                        <label for="barang">Barang</label>
                        <select name="barang" class="form-control">
                            <option value="" style="color: white">Pilih</option>
                            <?php
                            foreach($option_barang as $o){
                                echo '<option value="'.$o['value'].'">'.$o['label'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input value="" required="required" type="text" class="form-control" name="jumlah">
                    </div>
                    <div class="form-group">
                        <label>Spesifikasi</label>
                        <select class="form-control" name="id_spesifikasi" onchange="showUser(this.value)">
                            <option>Pilih spesifikasi</option>
                            <?php foreach ($tb_spesifikasi as $spek): ?>
                                <option required="required" value="<?php echo $spek->id_spesifikasi; ?>"><?php echo $spek->spesifikasi; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tanggal_pinjam">Tanggal Pinjam</label>
                        <input value="" required="required" type="date" class="form-control" name="tanggal_pinjam">
                    </div>

                    <div class="form-group">
                        <label for="tanggal_kembali">Tanggal Kembali</label>
                        <input value="" required="" type="text" class="form-control" name="tanggal_kembali">
                    </div>

                    <div class="form-group">
                        <label for="status_pinjam">Status Peminjaman</label>
                        <select value=""  required="required" type="text" class="form-control" name="status_pinjam">
                            <option value="Sedang diproses">Sedang diproses</option>
                            <option value="Sedang dipinjam">Sedang dipinjam</option>
                            <option value="Dikembalikan">Dikembalikan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="komfirmasi">Komfirmasi Peminjaman</label>
                        <select value=""  required="required" type="text" class="form-control" name="komfirmasi">
                            <option value="Menunggu Komfirmasi">Menunggu Komfirmasi</option>
                            <option value="disetujui">Disetujui</option>
                            <option value="ditolak">Ditolak</option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="card-footer small text-muted text-center">
                <button name='tambah' type='submit' class='btn btn-primary col-md-2 col-xs-12'>Tambah</button>
            </div>
            <div class="card-footer small text-muted text-center">
                <button type='reset' value='Reset Form' class='btn btn-danger col-md-2 col-xs-12'>Reset</button>
            </div>

        </form>
        <p class="small text-center text-muted my-5">
            <em></em>
        </p>
    </div>

<?php $this->load->view("partial_admin/foot.php") ?>
</html>
