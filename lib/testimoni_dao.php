<?php
/**
 * @author Arif Setiyanto
 * @copyright 2012
 */
 
 class Testimoni_Dao{
 
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
	
	
	function lihatTesti(){
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

 }