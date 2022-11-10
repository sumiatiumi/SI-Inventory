 
<?php $this->load->view("partial_kaleb/head.php") ?>

<div id="content-wrapper">

     <div class="container-fluid">

            <!-- Breadcrumbs-->
             <ol class="breadcrumb">

<li class="breadcrumb-item active">
<h5> <strong>Laporan Data Bahan Keluar</strong></h5>
</li>
</ol>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Lokasi Tujuan</th>
        <th>Tanggal Keluar</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $no=1;
        if(isset($dateHsl)){
        foreach($dateHsl as $data){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data->kode_barang; ?></td>
                <td><?php echo $data->nama_barang; ?></td>
                <td><?php echo $data->jumlah; ?></td>
                <td><?php echo $data->lokasi_tujuan; ?></td>
                <td><?php echo $data->tanggal_keluar; ?></td>
            </tr>  
        <?php } ?>
        <?php } ?>
    </tbody>
</table>

<hr/>
<br>
<div  class="card-footer small text-muted text-center"><a href="<?php echo base_url('kaleb/laporan/cetakBahanKeluar') ?>">
        <button name="submit" type="submit" class="btn btn-primary col-md-2 col-xs-12 ">
            <i class="fa fa-print"></i> Cetak
        </button></a></div>

<div  class="card-footer small text-muted text-center"><a href="<?php echo base_url('kaleb/laporan/Bahankeluar') ?>">
        <button name="batal" type="button" class="btn btn-primary col-md-2 col-xs-12 ">Kembali 
        </button></a></div>

</div>
</div>
<?php $this->load->view("partial_kaleb/foot.php") ?>