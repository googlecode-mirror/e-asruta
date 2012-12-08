<?php

	class Auth {
		public function login ($username,$password){
			$koneksi = new koneksi;
			$koneksi->pilihkonekdb();
			$koderole='';
			
			$sql="select kd_users,kd_role from users where username='".$username."' and password='".$password."'";
			$search=mysql_query($sql);
			$role =mysql_fetch_array($search);
		//	print_r($role);
			while($role){
				$kd_user=$role['kd_users'];
				$_SESSION['kduser']=$kd_user;
				$_SESSION['users']=$username;
				$_SESSION['pass']=$password;
				
				if ($role['kd_role']==1){
					return $this->koderole="admin";
				}
				
				if ($role['kd_role']==2){
					return $this->koderole="birojasa";	
				}
				
				if ($role['kd_role']==3){
					return $this->koderole="majikan";
				}
			}
		}
			
		public function logout(){
			session_destroy();
		}
		
		public function __construct(){
			session_start();
		}
	}

