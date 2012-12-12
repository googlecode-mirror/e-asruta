<?php

	class Auth {
		public function login ($username,$password){
			$koneksi = new koneksi;
			$koneksi->pilihkonekdb();
			$koderole='';
			
			$sql="select KD_USER, KD_ROLES from users where USERNAME='".$username."' and PASSWORD='".$password."'";
			$search=mysql_query($sql);
			$role =mysql_fetch_array($search);
		//	print_r($role);
			while($role){
				$kd_user=$role['KD_USER'];
				$_SESSION['kduser']=$kd_user;
				$_SESSION['users']=$username;
				$_SESSION['pass']=$password;
				
				if ($role['KD_ROLES']==1){
					return $this->koderole="admin";
				}
				
				if ($role['KD_ROLES']==2){
					return $this->koderole="birojasa";	
				}
				
				if ($role['KD_ROLES']==3){
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

