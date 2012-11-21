<?php
	include_once 'lib/koneksi.php';
  include_once 'config/config.php';
	
	class session{
		
	
		public function cek_login($usename, $password){
      $koneksi = new koneksi;
      $koneksi->pilihkonekdb();
			$sql = mysql_query("select kd_user where username='$username' and password='$password'");
			$user_data = mysql_fetch_array($sql);
      $no_rows = mysql_num_rows($result);
		if ($no_rows == 1) 
        {
           $_SESSION['login'] = true;
           $_SESSION['username'] = $user_data['username'];
           return TRUE;
        }
        else
        {
           return FALSE;
        }
		}
      
    // Ambil nama
    public function get_fullname($kd_user){
        $result = mysql_query("SELECT username FROM auths WHERE kd_user = $kd_user");
        $user_data = mysql_fetch_array($result);
        echo $user_data['name'];
    }
    
    // session 
    public function get_session(){
        return $_SESSION['login'];
    }
    
    // Logout 
	public function user_logout() 
		{
		$_SESSION['login'] = FALSE;
		session_destroy();
		}
	}
?>