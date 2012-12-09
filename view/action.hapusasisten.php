<?php
include '../lib/cariasisten_dao.php';
include '../lib/cari.asisten.php';
include '../config/koneksi.php';

$id= $_GET['id'];
//echo $id;
$id_asisten=mysql_real_escape_string($id);
$hapus=new CariAsisten_Dao();
$hasil=$hapus->hapusPencarian($id_asisten);
header('location:lihat_asisten.php');
