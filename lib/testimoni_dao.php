<?php
/**
 * @author Arif Setiyanto
 * @copyright 2012
 */
 
 class Testimoni_Dao{
 
	function isiTestimoni(Testimoni $testi){
		
		$koneksi = new Koneksi();
		
		$koneksi->pilihkonekdb();
		
		$sql="
		insert
		into
		testimoni
		(
			kd_member,
			isi_testi;
		)
		values
		(
			'".$testi->kdmember."',
			'".$testi->isi_testi."'
			
		)
		";
		
		$berhasil=mysql_query($sql);
		if(!$berhasil){
		//	echo "gagal";
		}
		$testi->kd_testi= mysql_insert_id();
		
		$koneksi->tutupdb();
	}
	
	
	function lihatTesti(){
		$koneksi = new Koneksi();
		
		$koneksi->pilihkonekdb();
		$daftar_testi = array();
		
		$sql="
		select * 
		from
		testimoni
		";
		
		$testi = mysql_query($sql);
		
		if($testi){
		
			$hasil = mysql_fetch_assoc($testi);
		
			$testimoni = new Testimoni();
			$testimoni->kd_testi=$hasil['kd_testi'];
			$testimoni->kd_member=$hasil['kd_member'];
			$testimoni->isi_testi=$hasil['isi_testi'];	
			$daftar_testi[]=$testimoni;			
		}
		
		$koneksi->tutupdb();
		
		return $daftar_testi;
	}

 }