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
		$testi->id_testi= mysql_insert_id();
		
		$koneksi->tutupdb();
	}
	
	
	function lihatTesti(){
		$koneksi = new Koneksi();
		
		$koneksi->pilihkonekdb();
		
		$sql="
		select * 
		from
		testimoni
		";
		
		$testi = mysql_query($sql);
		
		if($testi){
		
			$hasil = mysql_fetch_assoc($testi);
		
			$testimoni = new Testimoni();
			$testimoni->kd_testi=$row['kd_testi'];
			$testimoni->kd_member=$row['kd_member'];
			$testimoni->isi_testi=$row['isi_testi'];		
		}
		
		$koneksi->tutupdb();
		
		return $testimoni;
	}

 }