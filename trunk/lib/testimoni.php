<?php
/**
 * @author Arif Setiyanto
 * @copyright 2012
 */
 
class Testimoni{
	var $kd_testi;
	var $kd_member;
	var $isi_testi;
	
	function isiTestimoni(Testimoni $testimoni){
		
		$koneksi = new Koneksi();
		
		$koneksi->pilihkonekdb();
		
		$sql="
			INSERT
			INTO 
			`e_asruta`.`testimoni` 
			(
				`kd_member` ,
				`isi_testi`
			)
			VALUES 
			(
				'".$testimoni->kd_member."',
				'".$testimoni->isi_testi."'
			)";
		
		$berhasil=mysql_query($sql);
		if(!$berhasil){
		//	echo "gagal";
		}
		$testimoni->kd_testi= mysql_insert_id();
		
		$koneksi->tutupdb();
	}
	
	
	function lihatTesti($halaman,$limit){
		$koneksi = new Koneksi();
		
		$koneksi->pilihkonekdb();
		$daftar_testimoni = array();
		
		$sql="
		select 
			a.kd_testi,
			a.isi_testi,
			b.nm_member
			
		from
		members as b
		JOIN 
		testimoni as a
		WHERE
		a.kd_member=b.kd_member
		LIMIT $halaman,$limit
		";
		
		$testi = mysql_query($sql);
		
		if($testi){
			while($hasil=mysql_fetch_assoc($testi)){
				$testimoni = new Testimoni();
				$testimoni->kd_testi=$hasil['kd_testi'];
				$testimoni->kd_member=$hasil['nm_member'];
				$testimoni->isi_testi=$hasil['isi_testi'];	
				$daftar_testimoni[]=$testimoni;	
			}
		}
		
		$koneksi->tutupdb();
		
		return $daftar_testimoni;
	}
	
	function hitungTestimoni() {
		$koneksi = new Koneksi();
		$koneksi->pilihkonekdb();
		$sql="
			SELECT 
			count(*) as total 
			FROM 
			testimoni
		";
		
		$itung = mysql_query($sql);
		$jumlah = mysql_fetch_array($itung);
		return $jumlah['total'];
	}
}