<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php $this->load->view("partial_admin/head.php") ?>


     <div id="content-wrapper">

     <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">

            <li class="breadcrumb-item active">
            <h5> <strong>Silahkan Ubah Data Alat Keluar  Dibawah Ini</strong></h5>
            </li>
            </ol>

            <?php foreach ($tb_alatkeluar as $keluar) {
            ?>

            <form method="post" action="<?php echo base_url().'admin/c_alatkeluar/update'; ?>" enctype="multipart/form-data" class="col-md-12">
              <div class="row">

                <div class="col-md-6">
                  <div class="form-group">
                  <input value="<?php echo $keluar->id_alatkeluar; ?>" type="hidden" class="form-control" name="id_alatkeluar">
                  <label for="kode barang">Kode Barang</label>
                  <input value="<?php echo $keluar->kode_barang; ?>" type="text" class="form-control" name="kode_barang">
                  </div>

                  <div class="form-group">
                  <label for="nama barang">Nama Barang</label>
                  <input value="<?php echo $keluar->nama_barang; ?>" type="text" class="form-control" name="nama_barang">        
                  </div>

                  <div class="form-group">
                  <label for="nomor pengadaan">Nomor Pengadaan</label>
                  <input value="<?php echo $keluar->nomor_pengadaan; ?>" type="text" class="form-control" name="nomor_pengadaan">
                  </div>

                  <div class="form-group">
      <label for="name"> Berkas</label>
      <input class="form-control-file <?php echo form_error('document')?'is-invalid':''?>" type="file" name="document">
      <div class="invalid-feedback">
            <?php echo form_error('document')?>

      </div>

</div>


                  <div class="form-group">
                  <label>Spesifikasi</label>
                  <select class="form-control" name="id_spesifikasi" onchange="showUser(this.value)">
            
                  <option value="<?php echo $keluar->id_spesifikasi; ?>"><?php echo $keluar->spesifikasi ?></option>

                  <?php foreach ($tb_spesifikasi as $spek) { ?> 
                  <option value="<?php echo $spek->id_spesifikasi; ?>"><?php echo $spek->spesifikasi; ?> </option>
                  <?php } ?>
                  </select> 
                  </div>

                  <input type="hidden" name="id_alatkeluar" value="<?php echo $keluar->id_alatkeluar; ?>">
                  </div>
                  
                  <div class="col-md-6">
                  <div class="form-group">
                  <label for="jumlah">Jumlah</label>
                  <input value="<?php echo $keluar->jumlah; ?>" type="text" class="form-control" name="jumlah">        
                  </div>

                  <div class="form-group">
                  <label for="lokasi">Lokasi Tujuan</label>
                  <input value="<?php echo $keluar->lokasi; ?>" type="text" class="form-control" name="lokasi">        
                  </div>

                  <div class="form-group">
                  <label for="Tanggal keluar">Tanggal Keluar</label>
                  <input value="<?php $tgl = $keluar->tanggal_keluar;
                        $date = date("Y-m-d", strtotime($tgl));
                        echo $date ?>"  type="date" class="form-control" name="tanggal_keluar">
                  </div>

                  
                  <div class="form-group">
                  <label>Kondisi Barang</label>
                  <select class="form-control" name="id_kondisi" onchange="showUser(this.value)">
            
                  <option value="<?php echo $keluar->id_kondisi; ?>"><?php echo $keluar->kondisi ?></option>

                  <?php foreach ($kondisi_barang as $kondi) { ?> 
                  <option value="<?php echo $kondi->id_kondisi; ?>"><?php echo $kondi->kondisi; ?> </option>
                  <?php } ?>
                  </select> 
                  </div>

                  <input type="hidden" name="id_alatkeluar" value="<?php echo $keluar->id_alatkeluar; ?>">
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













