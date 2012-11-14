<?php
	include_once 'lib/koneksi.php';
	
	class session{
		$koneksi = new koneksi;
	
		public function cek_login($usename, $password){
			$sql = mysql_query("select kd_user where username='$username' and password='$password');
			$user
		}
	}
?>