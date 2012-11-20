<?php
	class Auth {
		public function login ($username,$password){
		$sql="select count(*) as jumlah from auth where username='$username' and password='$password'";
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

