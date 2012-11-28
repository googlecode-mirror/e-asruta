<?php
require_once '../config/koneksi.php';
require_once '../lib/cari.asisten.php';
require_once '../lib/cariasisten_dao.php';

$cariasisten_dao=new CariAsisten_Dao();
$cariasisten=new CariAsisten();
$cariasisten->keterampilan=$_POST['keterampilan'];
$cariasisten->gaji=$_POST['gaji'];
$cariasisten->hari_kerja=$_POST['hari_kerja'];
$cariasisten->jam_kerja=$_POST['jam_kerja'];
$cariasisten->luas_rumah=$_POST['luas_rumah'];
$cariasisten->anggota_kel=$_POST['anggota_kel'];
$cariasisten->lokasi=$_POST['lokasi'];
$cariasisten_dao->tambahPencarian($cariasisten);
