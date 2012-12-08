<?php
//session_start();
	class Auth {
		public function login ($username,$password){
			$koneksi = new koneksi;
			$koneksi->pilihkonekdb();
			$koderole='';
			
			$sql="select kd_role from users where username='".$username."' and password='".$password."'";
			$search=mysql_query($sql);
			$role =mysql_fetch_array($search);
		//	print_r($role);
			while($role){
				if ($role['kd_role']==1){
					$_SESSION['users']=$username;
					
					return $this->koderole="admin";
					
				}
				if ($role['kd_role']==2){
					$_SESSION['users']=$username;
					return $this->koderole="birojasa";
					
				}
				if ($role['kd_role']==3){
					$_SESSION['users']=$username;
					return $this->koderole="majikan";
					
				}
			}
		}
			
		public function logout(){
			session_destroy();
		}
		
//		public function __construct(){
//			session_start();
//		}
	}

