<?php
require_once 'config/koneksi.php';
require_once 'lib/cari.asisten.php';
require_once 'lib/cariasisten_dao.php';

/*
$cariasisten=new CariAsisten();
$cariasisten->keterampilan='Memasak, Mencuci, Merawat Anak';
$cariasisten->gaji='1000000';
$cariasisten->hari_kerja='6';
$cariasisten->jam_kerja='07:00-17:00';
$cariasisten->luas_rumah='100';
$cariasisten->anggota_kel='4';
$cariasisten->lokasi='Surabaya Timur';
$cariasisten_dao=new CariAsisten_Dao();
$cariasisten_dao->tambahPencarian($cariasisten);
*/

$cariasisten_dao=new CariAsisten_Dao();
$cariasisten_dao->cariPencarian(1);