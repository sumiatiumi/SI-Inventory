<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php $this->load->view("partial_admin/head.php") ?>
<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">

            <li class="breadcrumb-item active">
                <h5> <strong>Silahkan Ubah Data Peminjaman Barang  Dibawah Ini</strong></h5>
            </li>
        </ol>
        <?php foreach ($peminjaman as $pinjam) {
            ?>

            <form method="post" action="<?php echo base_url().'admin/cpeminjaman/update'; ?>" enctype="multipart/form-data" class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input value="<?php echo $pinjam->nim ?>" required="required" type="text" class="form-control" name="nim">
                        </div>
                        <div class="form-group">
                            <input value="<?php echo $pinjam->id_peminjaman; ?>" type="hidden" class="form-control" name="id_peminjaman">
                            <label for="nama peminjam">Nama Peminjam</label>
                            <input value="<?php echo $pinjam->nama_peminjam; ?>" type="text" class="form-control" name="nama_peminjam">
                        </div>

                        <div class="form-group">
                            <label for="barang">Barang</label>
                            <select name="barang" class="form-control">
                                <option value="" style="color: white">Pilih</option>
                                <?php
                                $base64 = base64_encode($pinjam->kode_barang.'<|>'.$pinjam->nama_barang);
                                foreach($option_barang as $o){
                                    $selected = ($base64 == $o['value'])? ' selected' : '';
                                    echo '<option value="'.$o['value'].'"'.$selected.'>'.$o['label'].'</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input value="<?php echo $pinjam->jumlah; ?>" type="text" class="form-control" name="jumlah">
                        </div>

                        <div class="form-group">
                            <label>Spesifikasi</label>
                            <select class="form-control" name="id_spesifikasi" onchange="showUser(this.value)">

                                <option value="<?php echo $pinjam->id_spesifikasi; ?>"><?php echo $pinjam->spesifikasi ?></option>

                                <?php foreach ($tb_spesifikasi as $spek) { ?>
                                    <option value="<?php echo $spek->id_spesifikasi; ?>"><?php echo $spek->spesifikasi; ?> </option>
                                <?php } ?>
                            </select>
                        </div>

                        <input type="hidden" name="id_peminjaman" value="<?php echo $pinjam->id_peminjaman; ?>">
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Tanggal pinjam">Tanggal Pinjam</label>
                            <input value="<?php $tgl = $pinjam->tanggal_pinjam;
                            $date = date("Y-m-d", strtotime($tgl));
                            echo $date ?>"  type="date" class="form-control" name="tanggal_pinjam">
                        </div>

                        <div class="form-group">
                            <label for="Tanggal kembali">Tanggal Kembali</label>
                            <input value="<?php echo $pinjam->tanggal_kembali ?>"  type="text" class="form-control" name="tanggal_kembali">
                        </div>


                        <div class="form-group">
                            <label for="status pinjam">Status Peminjaman</label>
                            <select value="<?php echo $pinjam->status_pinjam ?>" required="required" type="text" class="form-control" name="status_pinjam">
                                <option value="Sedang diproses">Sedang diproses</option>
                                 <option value="Sedang dipinjam">Sedang dipinjam</option>
                                <option value="Dikembalikan">Dikembalikan</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="komfirmasi">Komfirmasi Peminjaman</label>
                            <select value="<?php echo $pinjam->komfirmasi ?>"  required="required" type="text" class="form-control" name="komfirmasi">
                                <option value="Disetujui"  class="btn btn-info">Disetuji</option>
                                <option value="Ditolak"  class="btn btn-danger">Ditolak</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="card-footer small text-muted text-center">
                <button name='btn' type='submit' class='btn btn-primary col-md-2 col-xs-12'>Simpan Perubahan</button>
            </div>
        </form>

    <?php } ?>

    <p class="small text-center text-muted my-5">
        <em></em>
    </p>

</div>

<?php $this->load->view("partial_admin/foot.php") ?>
</html>
