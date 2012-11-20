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
<!DOCTYPE HTML>
<head>
	
</head>
<body>
	<form action="login.php" name="login" method="post">
		<input type="text" name="username">
		<input type="text" name="password">
		<input type="submit" name="submit1" value="submit">
	</form>
	
</body>
