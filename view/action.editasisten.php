<?php
session_start();
/**
 * @author Gerhantara
 * @copyright 2012
 */
 
require_once '../config/koneksi.php';
require_once '../lib/birojasaan.php';
require_once '../lib/birojasa_dao.php';

$members = "select kd_member from members where kd_user = $_SESSION['kduser']";

$birojasa_dao=new birojasa_dao();
$birojasa = new birojasa();

$birojasa->kd_asisten=$kd_asisten;
$birojasa->kd_member=$kd_member;
$birojasa->nm_asisten=$_POST['nm_asisten'];
$birojasa->hapeasisten=$_POST['hapeasisten'];
$birojasa->alamat_asisten=$_POST['alamat_asisten'];
$birojasa->tgl_lahirasisten=$_POST['tgl_lahirasisten'];
$birojasa->tmpt_lahirasisten=$_POST['tmpt_lahirasisten'];
$birojasa->kota_asisten=$_POST['kota_asisten'];
$birojasa->no_idasisten=$_POST['no_idasisten'];
$birojasa->copy_asisten=$_POST['copy_asisten'];


$birojasa_dao->edit_asisten($birojasa);
header('location:.php');