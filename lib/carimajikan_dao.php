<?php

/**
 * @author gerhantara
 * @copyright 2012
 */
 
    class CariMajikan_Dao{
        
        
        function daftar_lo(){
    	
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
            
            a. kd_jenislo = b.kd_jenislo
            
            AND
            
            a.kd_keahlian = c.kd_keahlian
 
    		";
    		
    		$cari = false;
    		
    		$res = mysql_query($sql);
    		
    		if($res){
    		
    			$row = mysql_fetch_assoc($res);
    		
    			$cari = new CariMajikan();
    			$cari->jenis_lowongan=$row['jenis_lowongan'];
    			$cari->pembuat_lamar=$row['pembuat_lamar'];
    			$cari->jns_keahlian=$row['jns_keahlian'];
    			$cari->jam_kerja=$row['jam_kerja'];
    			$cari->menginap=$row['menginap'];
    			$cari->hari_kerja=$row['hari_kerja'];
                $cari->lokasi=$row['lokasi'];
    			$cari->gaji=$row['gaji'];		
    		
    		}
    		
    		$koneksi->tutupdb();
    		
    		return $cari;
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
        
        public function cari_lamar($kd_member){
            $koneksi = new Koneksi();
    		$koneksi->pilihkonekdb();
    		
    		$sql = "
    		SELECT 
            a.nm_asisten,
            b.nm_member,
            c.jenis_lowongan
            
            from
            asisten a
            join
            members b,
            join
            lowongan c,
            join
            detail_lowongan d
            
            where
            a.kd_asisten = d.kd_asisten
            and
            b.kd_member = a.kd_member";
            
			
			$cari = false;
    		
    		$res = mysql_query($sql);
    		
    		if($res){
    		
    			$row = mysql_fetch_assoc($res);
    		
    			$cari = new CariMajikan();
    			$cari->nm_asisten=$row['nm_asisten'];
    			$cari->nm_member=$row['nm_member'];
    			$cari->majikan=$row['majikan'];
    			$cari->jenis_lowongan=$row['jenis_lowongan'];		
    		
    		}
    		
    		$koneksi->tutupdb();
    		
    		return $cari;
        }
	
    }

?>