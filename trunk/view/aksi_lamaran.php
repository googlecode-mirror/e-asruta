<?php
include '../lib/cariasisten_dao.php';
include_once '../config/koneksi.php';

$kd_lowongan = $_POST['kd_lowongan'];
$kd_asisten = $_POST['kd_asisten'];
$status = $_POST['status'];
$aksi=new CariAsisten_Dao();
$hasil=$aksi->tentukanPembantu($kd_lowongan,$kd_asisten,$status);
if($hasil){
	header('location:../view/lihat_asisten.php');
	}else{
		echo "gagal";
	}
?>