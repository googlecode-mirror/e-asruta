<?php
include '../config/koneksi.php';
include '../config/auth.php';

if (isset($_POST['submit'])){
	$auth=new Auth();
	$carirole=$auth->login($_POST['username'],$_POST['password']);
	//echo $carirole;
	
	if ($carirole=="admin"){
		header('location:../view/halaman_admin.php');
		exit();
	} 
	
	if ($carirole=="birojasa"){
		header('location:../view/halaman_birojasa.php');
		exit();
	} 
	
	if ($carirole=="majikan"){
		header('location:../view/halaman_majikan.php');
		exit();
	//	print_r($_SESSION['kduser']);
	} 
	
	else{
	header('location:gagal.php');
	exit();
	}
	
}
