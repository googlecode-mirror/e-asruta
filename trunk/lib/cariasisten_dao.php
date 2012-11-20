<?php
incluce '../config/koneksi.php';
incluce 'cari.asisten.php';

class CariAsisten_Dao{
	
	//fungsi untuk menambahkan pencarian asisten rumah tangga
	function tambahPencarian(CariAsisten $cari){
	
		$koneksi = new Koneksi();
		
		$koneksi->pilihkonekdb();
		
		$sql = "
			INSERT 
			INTO
			cari_asisten
			(
				keterampilan;
				gaji;
				hari_kerja;
				jam_kerja;
				luas_rumah;
				anggota_kel;
			)
			VALUES
			(
				'".$cari->keterampilan."',
				'".$cari->gaji."',
				'".$cari->hari_kerja."',
				'".$cari->jam_kerja."',
				'".$cari->luas_rumah."',
				'".$cari->anggota_kel."'
			)
		";
		mysql_query($sql,$db);
		
		$cari->id = mysql_insert_id($db);
		
		$koneksi->tutupdb();
	
	}
	
	//fungsi untuk menampilkan pencarian asisten rumah tangga berdasarkan id pencarian asisten rumah tangga
	function cariPencarian($id){
	
		$koneksi = new Koneksi();
		$koneksi->pilihkonekdb();
		
		$sql = "
		SELECT
		*
		FROM
		cari_asisten
		WHERE
		id = '".$id."'
		";
		
		$cari = false;
		
		$res = mysql_query($sql,$this->db);
		
		if($res){
		
			$row = mysql_fetch_assoc($res);
		
			$cari = new CariAsisten();
			$cari->keterampilan=$row['keterampilan'];
			$cari->gaji=$row['gaji'];
			$cari->jam_kerja=$row['jam_kerja'];
			$cari->hari_kerja=$row['hari_kerja'];
			$cari->luas_rumah=$row['luas_rumah'];
			$cari->anggota_kel=$row['anggota_kel'];		
		
		}
		
		$koneksi->tutupdb();
		
		return $cari;
	}
	
	//fungsi untuk menampilkan semua pencarian asisten rumah tangga yang telah disubmit majikan
	function tampilSemuaCari(){
		$koneksi = new Koneksi();
		$koneksi->pilihkonekdb();
		
		$sql = "
		SELECT
		*
		FROM
		cari_asisten
		";
		
		$list_cari = array();
		
		$res = mysql_query($sql,$this->db);
		if($res){
			while($row = mysql_fetch_assoc($res)){
			
				$cari = new CariAsisten();
				$cari->id=$row['id'];
				$cari->keterampilan=$row['keterampilan'];
				$cari->jam_kerja=$row['jam_kerja'];
				$cari->hari_kerja=$row['hari_kerja'];
				$cari->luas_rumah=$row['luas_rumah'];
				$cari->anggota_kel=$row['anggota_kel'];	
				$cari->gaji=$row['gaji'];				
				
				$list_cari[] = $cari;
			
			}
		}
		
		$koneksi->tutupdb();
		
		return $list_cari;
	
	}
	
	//fungsi untuk menghapus pencarian asisten rumah tangga yang telah disubmit majikan
	function hapusPencarian($id){
		$koneksi = new Koneksi();
		$koneksi->pilihkonekdb();
		
		$sql = "
		DELETE
		FROM
		cari_asisten
		WHERE
		id = '".$id."'
		";
		
		mysql_query($sql,$this->db);
		
		$koneksi->tutupdb();
	
	}
	