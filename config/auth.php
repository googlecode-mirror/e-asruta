<?php
	class Auth {
		public function login ($username,$password){
			$koneksi = new koneksi;
			$koneksi->pilihkonekdb();
			$koderole='';
			
			$sql="select kd_role from users where username='".$username."' and password='".$password."'";
			$search=mysql_query($sql);
			$role =mysql_fetch_array($search);
		//	print_r($role);
			if($role){
			while($role){
				if ($role['kd_role']==1){
				return $this->koderole="admin";
				$_SESSION['todo_login']=$username;
				}
				if ($role['kd_role']==2){
				return $this->koderole="birojasa";
				$_SESSION['todo_login']=$username;
				}
				if ($role['kd_role']==3){
				return $this->koderole="majikan";
				$_SESSION['todo_login']=$username;
			}
				
			}
			}
			else{
				return $this->koderole="intruder";
			}
			}
			
		public function logout(){
			session_destroy();
		}
		
		public function __construct(){
			session_start();
		}
	}

