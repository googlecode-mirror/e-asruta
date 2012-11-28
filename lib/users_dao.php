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
	
	function registrasi(Users $users){
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
			'".$users->username."',
			'".$users->password."',
			'".$users->kd_role."'
			
		)
		";
		$berhasil=mysql_query($sql);
		if(!$berhasil){
			echo "gagal";
		}
		$users->id_user= mysql_insert_id();
		
		$koneksi->tutupdb();
	}
	
	function gantiPassword($id_users,$password,$password1, $password2){
		$koneksi = new Koneksi();
		
		$koneksi->pilihkonekdb();
		
		$sql="
			select
			password
			from 
			users
			where
			kd_users='".$id_user."';
		";
		$hasil=mysql_query($sql);
		
		if($password!=$hasil){
			echo "Password lama salah";
		}
		if($password1!=$password2){
			echo "Password baru tidak cocok";
		}
		if($hasil==$password AND $password1==$password2){
			$sql="
			update
			users
			set
			password='".$passwod1."'
			where
			kd_users='".$id_users."' 
			";
			mysql_query($sql);
		}
		$koneksi->tutupdb();
	}
 }