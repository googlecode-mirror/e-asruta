<?php
  include_once 'lib/koneksi.php';
  include_once 'config/config.php';

	class Auth {
		public function login ($username,$password){
    $koneksi = new koneksi;
    $koneksi->pilihkonekdb();
		$sql="select count(*) as jumlah from auths where username='$username' and password='$password'";
		$search=mysql_query($sql);
		$row =mysql_fetch_assoc($search);
		if ($row['jumlah']==1){
		
		$_SESSION['todo_login']=$username;
		return true;
		}
		return false;
		}
		public function logout(){
		
		session_destroy();
		}
		public function __construct(){
		session_start();
		}
	}

