<?php

/**
 * @author gerhantara
 * @copyright 2012
 */
 
    class CariMajikan_Dao{
        
        
        function daftar_lo($halaman,$limit){
    	
    		$koneksi = new Koneksi();
    		$koneksi->pilihkonekdb();
    		
    		$sql = "
    		SELECT 
			a.kd_lowongan,
			d.nm_member,
    		b.jenis_lowongan as lowongan,
    		c.jns_keahlian as keahlian,
			a.hari_kerja,
    		a.jam_kerja,
    		a.menginap,
            a.lokasi,
            a.gaji
    		FROM
    		lowongan as a
    		JOIN
    		keahlian as c
            JOIN
            jenis_lowongan as b
			JOIN
			members as d
    		WHERE
            a. kd_jenislo = b.kd_jenislo
            AND
            a.kd_keahlian = c.kd_keahlian
			ORDER BY kd_lowongan ASC
			LIMIT $halaman,$limit
    		";
    		
    		$list_cari = array();
			$res = mysql_query($sql);
			if($res){
				while($row = mysql_fetch_assoc($res)){
					$cari = new CariMajikan();
					$cari->kd_lowongan=$row['kd_lowongan'];
					$cari->nm_member=$row['nm_member'];
					$cari->jenis_lowongan=$row['lowongan'];
					$cari->jns_keahlian=$row['keahlian'];
					$cari->hari_kerja=$row['hari_kerja'];
					$cari->jam_kerja=$row['jam_kerja'];
					$cari->menginap=$row['menginap'];
					$cari->lokasi=$row['lokasi'];
					$cari->gaji=$row['gaji'];		
					
					$list_cari[] = $cari;
				}
			}
		
		$koneksi->tutupdb();
		return $list_cari;
    	}
		
		function daftar_low($kd_lowongan){
    	
    		$koneksi = new Koneksi();
    		$koneksi->pilihkonekdb();
    		
    		$sql = "
    		SELECT 
			d.nm_member,
    		b.jenis_lowongan as lowongan,
    		c.jns_keahlian as keahlian,
			a.hari_kerja,
    		a.jam_kerja,
    		a.menginap,
            a.lokasi,
            a.gaji
    		FROM
    		lowongan as a
    		JOIN
    		keahlian as c
            JOIN
            jenis_lowongan as b
			JOIN
			members as d
    		WHERE
            a. kd_jenislo = b.kd_jenislo
            AND
            a.kd_keahlian = c.kd_keahlian
			ORDER BY kd_lowongan ASC
    		";
    		
    		$list_cari = array();
			$res = mysql_query($sql);
			if($res){
				while($row = mysql_fetch_assoc($res)){
					$cari = new CariMajikan();
					$cari->nm_member=$row['nm_member'];
					$cari->jenis_lowongan=$row['lowongan'];
					$cari->jns_keahlian=$row['keahlian'];
					$cari->hari_kerja=$row['hari_kerja'];
					$cari->jam_kerja=$row['jam_kerja'];
					$cari->menginap=$row['menginap'];
					$cari->lokasi=$row['lokasi'];
					$cari->gaji=$row['gaji'];		
					
					$list_cari[] = $cari;
				}
			}
		
		$koneksi->tutupdb();
		return $list_cari;
    	}
        
        public function cari_khusus(){
            	$koneksi = new Koneksi();
    		$koneksi->pilihkonekdb();
    		
    		$sql = "
    		SELECT 
            b.jenis_lowongan,
    		a.pembuat_lamar,
    		c.jns_keahlian,
    		a.jam_kerja,
    		a.menginap,
    		a.hari_kerja,
            a.lokasi,
            a.gaji
    		FROM
    		lowongan as a
    		JOIN
    		keahlian as c
            JOIN
            jenis_lowongan as b
            
            WHERE
            a.kd_jenislo = b.kd_jenislo
            AND
            a.kd_keahlian = c.kd_keahlian
            and 
            a.kd_jenislo like ";
        }
        
        public function cari_lamar(){
            $koneksi = new Koneksi();
    		$koneksi->pilihkonekdb();
    		
    		$sql = "
    		SELECT 
			nm_asisten
            from
            asisten 
            where
            kd_member = 2";
            
			$result=mysql_query($sql); 

			$options=""; 

				while ($row=mysql_fetch_array($result)) { 

					$id=$row["kd_asisten"]; 
					$nama=$row["nm_asisten"]; 
					//$options.="<OPTION VALUE=\"$id\">".$nama; 
				} 
				
    		$koneksi->tutupdb();
    		
    		return $cari;
        }
		
		function hitungHalaman() {
		$koneksi = new Koneksi();
		$koneksi->pilihkonekdb();
		$sql="
			SELECT 
			count(*) as total 
			FROM 
			lowongan 
		";
		
		$itung = mysql_query($sql);
		$jumlah = mysql_fetch_array($itung);
		return $jumlah['total'];
	}
	
    }

?>