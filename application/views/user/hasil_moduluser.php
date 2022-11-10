<!DOCTYPE html>
<html>
<?php $this->load->view('partial_user/head.php'); ?>
<head>
  
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
    <form class="form-inline" method="get" action="<?php echo base_url("cmodul_user/pencarian_user/")?>">
                          <div class="" align="center" style="padding: 10px;">
                              <select class="form-control" name="prodi">
                            <option>Program Studi</option>
                            <option value="Manajemen Informatika">Manajemen Informatika</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Komputer">Teknik Komputer</option>
                          </select>
                      </div> 
                      <br>
                         
                          <div class=" " align="center" style="padding: 10px;">
                              <select class="form-control" name="semester">
                          <option>Semester</option>
                          <option value="Ganjil">Ganjil</option>
                          <option value="Genap">Genap</option>
                          </select></div>

                          <div class=" " align="center" style="padding: 10px;">
                              <select class="form-control" name="tahun">
                          <option>Tahun</option>
                         
                          <option value="2016">2016</option>
           <option value="2017">2017</option>
           <option value="2018">2018</option>
           <option value="2019">2019</option>
           <option value="2020">2020</option>
           <option value="2021">2021</option>
           <option value="2022">2022</option>
           <option value="2023">2023</option>
           <option value="2024">2024</option>
           <option value="2025">2025</option>
                          </select></div>

                        <br><input type="submit" class="btn btn-primary" value="Cari">              
                    </div>
                        </form>
                        <br>
    
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead >
                            <tr>
                                <th style="color:sandybrown;text-align: center;">No</th>
                                <th style="color: sandybrown;text-align: center;">Nama Modul</th>
                                <th style="color: sandybrown;text-align: center;">File Modul</th> 
                                <th style="color: sandybrown;text-align: center;" >Prodi</th>
                                <th style="color: sandybrown;text-align: center;">Tahun</th>
                                <th style="color: sandybrown;text-align: center;">Semester</th> 
                                <th style="color: sandybrown;text-align: center;">Download</th> 


                                                  
                                                
                            </tr>
                        </thead>
                        <?php $no = 1;
                        foreach ($modul as $modu) :?>
                            <tbody>

                                <tr>
                                    <td style="color:lightgrey; text-align: center;"><?php echo $no++; ?></td>
                                    <td width="200" style="color:lightgrey; text-align: center;"><?php echo $modu->nama_modul ?></td>
                                    <td width="200" style="color:lightgrey; text-align: center;" ><?php echo $modu->document ?></td>
                                    <td width="200" style="color:lightgrey; text-align: center;"><?php echo $modu->prodi ?></td>
                                    <td width="200" style="color:lightgrey; text-align: center;"><?php echo $modu->tahun ?></td>
                                    <td width="200" style="color:lightgrey; text-align: center;"><?php echo $modu->semester ?></td>
                                    <td style="text-align: center;"><a href="<?php echo base_url().'cmodul_user/download/'.$modu->id_modul; ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-download-alt"> Download</a></td>
                                    
                                     
                                    
                                </tr>

                            </tbody>
                        <?php endforeach;?>
                    </table>

            
            
        
</body>

    
    </html>