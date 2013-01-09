<?php
session_start();
/**
 * @author Gerhantara
 * @copyright 2012
 */
 
require_once '../config/koneksi.php';
require_once '../lib/birojasa.php';
require_once '../lib/birojasa_dao.php';

$birojasa_dao=new birojasa_dao();

$kode = $_GET['id'];
$kode = $_GET['id2'];
//$kode1 = $_GET[$kd_asisten];
echo $kode;
//echo $kode1;


//$kode = mysql_real_escape_string($kd_lowongan);
//$kode1 = mysql_real_escape_string($kd_asisten);


//$birojasa_dao->hapus_asisten($kode,$kode1);
//header('location:daftar_asisten.php');