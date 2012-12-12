<?php
/**
 * @author Arif Setiyanto
 * @copyright 2012
 */
 
class CariAsisten_Dao{
	
	//fungsi untuk menambahkan pencarian asisten rumah tangga
	function tambahPencarian(Lowongan $cariasisten){
	
		$koneksi = new Koneksi();
		
		$koneksi->pilihkonekdb();
		
		$sql = "
			INSERT
			INTO
			`lowongan`
			(
			`PEMBUAT_LAMAR`, 
			`KD_ASISTEN`, 
			`KD_JENISLO`, 
			`KD_KEAHLIAN`, 
			`GAJI`, 
			`LOKASI`, 
			`JAM_KERJA`, 
			`MENGINAP`, 
			`HARI_KERJA`
			)
			VALUES
			(
				'".$cariasisten->pembuat_lamar."',
				'".$cariasisten->kd_asisten."',
				'".$cariasisten->kd_jenislo."',
				'".$cariasisten->kd_keahlian."',
				'".$cariasisten->gaji."',
				'".$cariasisten->lokasi."',
				'".$cariasisten->hari_kerja."',
				'".$cariasisten->menginap."',
				'".$cariasisten->jam_kerja."'
			)
		" ;
		$berhasil=mysql_query($sql);
		if(!$berhasil){
			echo "gagal";
		}
		
		$cariasisten->kd_lowongan = mysql_insert_id();
		
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
		lowongan
		WHERE
		id_cariasisten = '".$id."'
		";
		
		$cari = false;
		
		$res = mysql_query($sql);
		
		if($res){
		
			$row = mysql_fetch_assoc($res);
		
			$cari = new CariAsisten();
			$cari->keterampilan=$row['keterampilan'];
			$cari->gaji=$row['gaji'];
			$cari->jam_kerja=$row['jam_kerja'];
			$cari->hari_kerja=$row['hari_kerja'];
			$cari->luas_rumah=$row['luas_rumah'];
			$cari->anggota_kel=$row['anggota_kel'];	
			$cari->lokasi=$row['lokasi'];
		
		}
		
		$koneksi->tutupdb();
		
		return $cari;
	}
	
	//fungsi untuk menampilkan semua pencarian asisten rumah tangga yang telah disubmit majikan
	function tampilSemuaCari($kd_users){
		$koneksi = new Koneksi();
		$koneksi->pilihkonekdb();
		
		$sql = "
		SELECT 
		`KD_LOWONGAN`, 
		`PEMBUAT_LAMAR`, 
		`KD_ASISTEN`, 
		`KD_JENISLO`, 
		`KD_KEAHLIAN`, 
		`GAJI`, 
		`LOKASI`, 
		`JAM_KERJA`, 
		`MENGINAP`, 
		`HARI_KERJA` 
		FROM `lowongan` WHERE PEMBUAT_LAMAR='".$kd_users."'
		";
		
		$list_cari = array();
		$res = mysql_query($sql);
		if($res){
			while($row = mysql_fetch_assoc($res)){
				$cari = new CariAsisten();
				$cari->kd_lowongan=$row['KD_LOWONGAN'];
				$cari->pembuat_lamar=$row['PEMBUAT_LAMAR'];
				$cari->kd_asisten=$row['KD_ASISTEN'];
				$cari->kd_jenislo=$row['KD_JENISLO'];
				$cari->kd_keahlian=$row['KD_KEAHLIAN'];
				$cari->gaji=$row['GAJI'];
				$cari->lokasi=$row['LOKASI'];
				$cari->jam_kerja=$row['JAM_KERJA'];
				$cari->menginap=$row['MENGINAP'];
				$cari->hari_kerja=$row['HARI_KERJA'];		
				
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
		lowongan
		WHERE
		id_cariasisten = '".$id."'
		";
		
		mysql_query($sql);
		
		$koneksi->tutupdb();
	
	}
}