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

$kd_asisten = $_GET['kd_asisten'];

$kode = mysql_real_escape_string($kd_asisten);


$birojasa_dao->hapush_asisten($kode);
header('location:.php');