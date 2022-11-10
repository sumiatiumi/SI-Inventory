<!DOCTYPE html>
<html lang="en">
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<?php $this->load->view("partial_admin/head.php") ?>
	
</head>
<div id="content-wrapper">
	<div class="container-fluid">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fas fa-table"></i>
				Ubah Password
			</div>
		</div>

		<form method="post" action=''>
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="form-group">
						<label>Old Password</label>
						<input type="password" name="old_pass" id="name" class="form-control" placeholder="Old Pass"/>
					</div>
					<div class="form-group">
						<label>New Password</label>
						<input type="password" name="new_pass" id="password" class="form-control" placeholder="New Password"/>
					</div>
					<div class="form-group">
						<label>Confirm Password</label>
						<input type="password" name="confirm_pass" id="password" class="form-control" placeholder="Confirm Password"/>
					</div>
				</div>
			</div>

			<div class="form-group">
				<input type="submit" value="Ubah Password" name="change_pass" class="btn btn-primary" />
			</div>
		</form>
	<?php $this->load->view("partial_admin/foot.php") ?>
</html>
