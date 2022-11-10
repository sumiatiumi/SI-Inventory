<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php $this->load->view("partial_admin/head.php") ?>

 <div class="container-fluid">

<legend>Backup Database</legend>	
<?php echo $this->session->flashdata("k");?>
Klik pada tombol "Backup" disamping untuk memulai proses backup &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=base_URL()?>admin/ckeamanan/tool/backup" class="btn btn-success">Backup</a>

<br><br>
<legend>Optimize Database</legend>		
Klik pada tombol "Optimize" disamping untuk memulai proses optimize database &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=base_URL()?>admin/ckeamanan/tool/optimize" class="btn btn-inverse">Optimize</a>


<br><br>
<legend>Restore Database</legend>		
<form action="<?=base_URL()?>admin/ckeamanan/tool/restore" method="post" accept-charset="utf-8" enctype="multipart/form-data">	
	
	<label style="width: 150px; float: left">File Backup</label><input class="span4" type="file" name="file_backup" required><br>
	<button type="submit" class="btn btn-primary">Restore</button>
</form>
</div>
<?php $this->load->view("partial_admin/foot.php") ?>
	</html>