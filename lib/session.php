<?php
	include_once 'lib/koneksi.php';
  include_once 'config/config.php';
	
	class session{
		
	
		public function cek_login($usename, $password){
      $koneksi = new koneksi;
      $koneksi->connect();
			$sql = mysql_query("select kd_user where username='$username' and password='$password'");
			$user_data = mysql_fetch_array($sql);
      echo $user_data['name'];
		}
	}
?>