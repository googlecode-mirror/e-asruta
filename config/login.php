<?php
include '../koneksi.php';
include 'auth.php';
if (isset($_POST['submit1'])){
	$auth=new Auth();
	$is_login=$auth->login($_POST['username'],$_POST['password']);
	if ($is_login){
		header('location:../main.php');
		exit();
	} else{
	header('location:gagal.php');
	exit();
	}
}

?>
  <link href="view/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="view/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="view/bootstrap/js/bootstrap.min.js" />
	<link href="view/bootstrap/css/datepicker.css" rel="stylesheet">
	<form class="form-horizontal" name="input_form" method='post' action='tambah.php' enctype="multipart/form-data">
			<fieldset>

			<legend>Menu Login</legend>
			
			<div class="control-group">
				<label class="control-label">Username</label>
					<div class="controls">
				<input type="text" class="input-xlarge" id="username" name="username" rel="popover" data-content="Masukan Username.">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">Password</label>
					<div class="controls">
				<input type="text" class="input-xlarge" id="password" name="password" rel="popover" data-content="Masukan Password.">
				</div>
			</div>

			
			<div class="control-group">
				<label class="control-label"></label>
					<div class="controls">
					<button type="submit" value="Login" class="btn btn-success" >Login</button>
				</div>
			</div>
</form>
