<?php
session_start();
/**
 * @author Arif Setiyanto
 * @copyright 2012
 */
 
require_once '../config/koneksi.php';
require_once '../lib/cari.asisten.php';
require_once '../lib/cariasisten_dao.php';

$kd_users=$_SESSION['kduser'];
//echo $kd_users;

$cariasisten_dao=new CariAsisten_Dao();
$cariasisten=new CariAsisten();
$cariasisten->kd_users=$kd_users;
$cariasisten->keterampilan=$_POST['keterampilan'];
$cariasisten->gaji=$_POST['gaji'];
$cariasisten->hari_kerja=$_POST['hari_kerja'];
$cariasisten->jam_kerja=$_POST['jam_kerja'];
$cariasisten->luas_rumah=$_POST['luas_rumah'];
$cariasisten->anggota_kel=$_POST['anggota_kel'];
$cariasisten->lokasi=$_POST['lokasi'];
$cariasisten_dao->tambahPencarian($cariasisten);
header('location:lihat_asisten.php');