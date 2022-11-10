<!DOCTYPE html>
<html>
<?php $this->load->view('partial_user/head.php'); ?>
<head>
  
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <meta http-equiv="refresh" content="10" />

</head>
<body>
    
     <ol class="breadcrumb" style="background-color:goldenrod">
    <li class="breadcrumb-item active" style="color: navy;"><b>JADWAL PRAKTIKUM</b></li>
</ol>

    <br>
   

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead >
                            <tr>
                                <th style="color:sandybrown;text-align: center;">No</th>
                                <th style="color: sandybrown;text-align: center;">Praktikum</th>
                                <th style="color: sandybrown;text-align: center;">Hari/Waktu</th> 
                                <th style="color: sandybrown;text-align: center;" >Tanggal</th> 
                                                
                            </tr>
                        </thead>
                        <?php $no = 1;
                        foreach ($tb_jadwal as $modu) :?>
                            <tbody>

                                <tr>
                                    <td width="50" style="color:lightgrey; text-align: center;"><?php echo $no++; ?></td>
                                    <td width="300" style="color:lightgrey; text-align: center;"><?php echo $modu->praktikum?></td>
                                    <td width="300" style="color:lightgrey; text-align: center;" ><?php echo $modu->hari_waktu ?></td>
                                    <td width="200" style="color:lightgrey; text-align: center;"><?php echo $modu->tanggal ?></td>
                                       
                                    
                                </tr>

                            </tbody>
                        <?php endforeach;?>
                    </table>

            
            
        
</body>



    </html>