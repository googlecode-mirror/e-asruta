<?php
include '../config/auth.php';
$keluar = new Auth();
$keluar->logout();
header('location:../index.php');