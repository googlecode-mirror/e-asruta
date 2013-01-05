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
			`pembuat_lamar`, 
			`kd_jenislo`, 
			`kd_keahlian`, 
			`gaji`, 
			`lokasi`, 
			`jam_kerja`, 
			`menginap`, 
			`hari_kerja`
			)
			VALUES
			(
				'".$cariasisten->pembuat_lamar."',
				'".$cariasisten->kd_jenislo."',
				'".$cariasisten->kd_keahlian."',
				'".$cariasisten->gaji."',
				'".$cariasisten->lokasi."',
				'".$cariasisten->jam_kerja."',
				'".$cariasisten->menginap."',
				'".$cariasisten->hari_kerja."'
			)
		" ;
		$berhasil=mysql_query($sql);
		if(!$berhasil){
			echo "gagal";
		}
		
		$cariasisten->kd_lowongan = mysql_insert_id();
		
		$koneksi->tutupdb();
	
	}
	
	//fungsi untuk mengubah pencarian asisten rumah tangga
	function ubahPencarian($id, Lowongan $cariasisten){
	
		$koneksi = new Koneksi();
		
		$koneksi->pilihkonekdb();
		
		$sql = "
			UPDATE
			lowongan
			SET
			kd_jenislo='".$cariasisten->kd_jenislo."', 
			kd_keahlian=("SELECT FROM keahlian where jns_keahlian=='".$cariasisten->jns_keahlian."'"),
			gaji='".$cariasisten->gaji."',
			lokasi='".$cariasisten->lokasi."',
			jam_kerja='".$cariasisten->jam_kerja."',
			menginap='".$cariasisten->menginap."',
			hari_kerja='".$cariasisten->hari_kerja."'
			WHERE
			kd_lowongan='".$i."'
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
		b.jns_keahlian,
		a.gaji,
		a.lokasi,
		a.jam_kerja,
		a.menginap,
		a.hari_kerja
		FROM
		lowongan as a
		JOIN
		keahlian as b
		WHERE
		a.pembuat_lamar = '".$id."'
		AND
		a.kd_keahlian=b.kd_keahlian
		";
		
		$cari = false;
		
		$res = mysql_query($sql);
		
		if($res){
		
			$row = mysql_fetch_assoc($res);
		
			$cari = new Lowongan();
			$cari->kd_keahlian=$row['JNS_KEAHLIAN'];
			$cari->gaji=$row['GAJI'];
			$cari->lokasi=$row['LOKASI'];
			$cari->jam_kerja=$row['JAM_KERJA'];
			$cari->menginap=$row['MENGINAP'];
			$cari->hari_kerja=$row['HARI_KERJA'];	
		
		}
		
		$koneksi->tutupdb();
		
		return $cari;
	}
	
	//fungsi untuk menampilkan semua pencarian asisten rumah tangga yang telah disubmit majikan
	function tampilSemuaCari($kd_users,$halaman,$limit){
		$koneksi = new Koneksi();
		$koneksi->pilihkonekdb();
		
		$sql = "
		SELECT 
		a.kd_lowongan, 
		a.pembuat_lamar, 
		a.kd_asisten, 
		a.kd_jenislo, 
		b.jns_keahlian, 
		a.gaji, 
		a.lokasi, 
		a.jam_kerja, 
		a.menginap, 
		a.hari_kerja 
		FROM 
		lowongan as a
		INNER JOIN
		keahlian as b
		ON 
		a.kd_keahlian=b.kd_keahlian
		WHERE a.pembuat_lamar='".$kd_users."'
		ORDER BY a.kd_lowongan DESC
		";
		//echo $sql;
		$list_cari = array();
		$res = mysql_query($sql);
		if($res){
			while($row = mysql_fetch_assoc($res)){
				$cari = new Lowongan();
				$cari->kd_lowongan=$row['kd_lowongan'];
				$cari->pembuat_lamar=$row['pembuat_lamar'];
				$cari->kd_asisten=$row['kd_asisten'];
				$cari->kd_jenislo=$row['kd_jenislo'];
				$cari->kd_keahlian=$row['jns_keahlian'];
				$cari->gaji=$row['gaji'];
				$cari->lokasi=$row['lokasi'];
				$cari->jam_kerja=$row['jam_kerja'];
				$cari->menginap=$row['menginap'];
				$cari->hari_kerja=$row['hari_kerja'];		
				
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
		kd_lowongan = '".$id."'
		";
		
		mysql_query($sql);
		
		$koneksi->tutupdb();
	
	}
	function cari_keahlian(){
		$koneksi = new Koneksi();
		$koneksi->pilihkonekdb();
		
		$sql = "
		SELECT 
		*
		FROM
		keahlian
		";
		
		$daftar_keahlian = array();
		$res = mysql_query($sql);
		if($res){
			while($row = mysql_fetch_assoc($res)){
				$cari = new Lowongan();
				$cari->kd_keahlian=$row['KD_KEAHLIAN'];
				$cari->jns_keahlian=$row['JNS_KEAHLIAN'];
				$daftar_keahlian[] = $cari;
			}
		}
		$koneksi->tutupdb();
		return $daftar_keahlian;
	}
	
	function hitungHalaman() {
		$koneksi = new Koneksi();
		$koneksi->pilihkonekdb();
		$sql="
			SELECT 
			count(*) as total 
			FROM 
			lowongan 
			WHERE pembuat_lamar='".$_SESSION['kduser']."'
		";
		
		$itung = mysql_query($sql);
		$jumlah = mysql_fetch_array($itung);
		return $jumlah['total'];
	}
}