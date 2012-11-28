<?php
/**
 * @author Arif Setiyanto
 * @copyright 2012
 */
 
 class Users_Dao{
	
	function cekEksistensiUser($username){
		$koneksi = new Koneksi();
		
		$koneksi->pilihkonekdb();
		
		$useravailable=false;
		
		$sql="
		select count(username)
		from users where username='".$username."';
		";
		$hasil=mysql_query($sql);
		
		if($hasil<=1){
			$useravailable=true;
		}
		
		$koneksi->tutupdb();
		
		return $useravailable;
	}
	
	function registrasi(Users $user){
		$koneksi = new Koneksi();
		
		$koneksi->pilihkonekdb();
		
		$sql="
		insert
		into
		users
		(
			username,
			password,
			kd_role
		)
		values
		(
			'".$user->username."',
			'".$user->password."',
			'".$user->kd_role."'
			
		)
		";
		$berhasil=mysql_query($sql);
		if(!$berhasil){
			echo "gagal";
		}
		$testi->id_testi= mysql_insert_id();
		
		$koneksi->tutupdb();
	}
 }