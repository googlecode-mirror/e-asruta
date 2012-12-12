<?php
session_start();
/**
 * @author Arif Setiyanto
 * @copyright 2012
 */
 
require_once '../config/koneksi.php';
require_once '../lib/lowongan.php';
require_once '../lib/cariasisten_dao.php';

$kd_users=$_SESSION['kduser'];
echo $kd_users;

$cariasisten_dao=new CariAsisten_Dao();
$cariasisten=new Lowongan();
//echo $cariasisten->kd_lowongan;

$cariasisten->pembuat_lamar=$kd_users;
$cariasisten->kd_jenislo=1;
$cariasisten->kd_keahlian=$_POST['kd_keahlian'];
$cariasisten->gaji=$_POST['gaji'];
$cariasisten->lokasi=$_POST['lokasi'];
$cariasisten->hari_kerja=$_POST['hari_kerja'];
$cariasisten->menginap=$_POST['menginap'];
$cariasisten->jam_kerja=$_POST['jam_kerja'];


$cariasisten_dao->tambahPencarian($cariasisten);
header('location:lihat_asisten.php');