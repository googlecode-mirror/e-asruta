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
			kd_users,
			isi_testimoni;
		)
		values
		(
			'".$testi->kdusers."',
			'".$testi->isi_testimoni."'
			
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