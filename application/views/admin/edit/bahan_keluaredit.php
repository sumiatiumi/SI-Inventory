 <!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php $this->load->view("partial_admin/head.php") ?>


     <div id="content-wrapper">
     <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
            <li class="breadcrumb-item active">
            <h5> <strong>Silahkan Ubah Data Bahan Keluar  Dibawah Ini</strong></h5>
            </li>
            </ol>

            <?php foreach ($tb_bahankeluar as $keluar) {
            ?>

      <form method="post" action="<?php echo base_url().'admin/cbahan_keluar/update'; ?>" enctype="multipart/form-data" class="col-md-12">

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                  <input value="<?php echo $keluar->id_bahankeluar; ?>" type="hidden" class="form-control" name="id_bahankeluar">
                  <label for="kode barang">Kode Barang</label>
                  <input value="<?php echo $keluar->kode_barang; ?>" type="text" class="form-control" name="kode_barang">
                  </div>

                  <div class="form-group">
                  <label for="nama barang">Nama Barang</label>
                  <input value="<?php echo $keluar->nama_barang; ?>" type="text" class="form-control" name="nama_barang">    
                  </div>
                
                  <div class="form-group">
                  <label for="jumlah">Jumlah</label>
                  <input value="<?php echo $keluar->jumlah; ?>" type="text" class="form-control" name="jumlah">        
                  </div>
                  </div>


                  <div class="col-md-6">
                  <div class="form-group">
                  <label for="satuan">Satuan</label>
                  <input value="<?php echo $keluar->satuan; ?>" type="text" class="form-control" name="satuan">        
                  </div>

                  <div class="form-group">
                  <label for="lokasi tujuan">Lokasi Tujuan</label>
                  <input value="<?php echo $keluar->lokasi_tujuan; ?>" type="text" class="form-control" name="lokasi_tujuan">  
                  </div>

                  <div class="form-group">
                  <label for="Tanggal keluar">Tanggal Keluar</label>
                  <input value="<?php $tgl = $keluar->tanggal_keluar;
                        $date = date("Y-m-d", strtotime($tgl));
                        echo $date ?>"  type="date" class="form-control" name="tanggal_keluar">
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













