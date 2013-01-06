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
			a.pembuat_lamar = d.kd_member
			AND
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
					$cari = new Lowongan();
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
			a.pembuat_lamar = d.kd_member
			AND
            a. kd_jenislo = b.kd_jenislo
            AND
            a.kd_keahlian = c.kd_keahlian
			AND 
			a.kd_lowongan = '".$kd_lowongan."'
    		";
    		
    		$list_cari = false;
		
			$res = mysql_query($sql);
			if($res){
				while($row = mysql_fetch_assoc($res)){
					$cari = new Lowongan();
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
        
        public function cari_khusus($kd_member){
            $koneksi = new Koneksi();
    		$koneksi->pilihkonekdb();
    		
    		$sql = "
    		SELECT 
    		a.nm_member,
    		b.nm_asisten,
            c.ket_status
    		FROM
    		members as a
    		JOIN
    		asisten as b
            JOIN
            status_lowongan as c
			JOIN
			detail_lowongan as d
            JOIN
            lowongan as e
            
            WHERE
            a.kd_member = e.pembuat_lamar
            AND
            e.kd_lowongan = d.kd_lowongan
            and 
            d.kd_asisten = b.kd_asisten
			AND
			e.kd_status = c.kd_status
			AND
			b.kd_member = '".$kd_member."'
			";
			
			$list_cari = false;
		
			$res = mysql_query($sql);
			if($res){
				while($row = mysql_fetch_assoc($res)){
					$cari = new Lowongan();
					$cari->nm_member=$row['nm_member'];
					$cari->nm_asisten=$row['nm_asisten'];
					$cari->ket_status=$row['ket_status'];
					
					$list_cari[] = $cari;
				}
			}
		
		$koneksi->tutupdb();
		return $list_cari;
        }
        
        public function cari_lamar(){
            $koneksi = new Koneksi();
    		$koneksi->pilihkonekdb();
    		
    		$sql = "
    		SELECT 
			kd_asisten,
			nm_asisten
            from
            asisten
			where
			kd_member = $_SESSION[kduser]";
            
			$result=mysql_query($sql); 

			 while(list($kode, $nama)=mysql_fetch_row($result)) {
				echo "<option value=\"".$kode."\">".$nama."</option>";
				//echo "<option selected value=\"".$kode."\">".$nama."</option>";
				//	}else {
				//	echo "<option value='$cars[$i]'>$cars[$i]</option>";
       
			}
			
			//$result = mysql_query($sql) or die (mysql_error());  
			//	while ($row = mysql_fetch_array($result)) 
			//	{ 
			//			$id=$row["kd_asisten"]; 
			//			$nama=$row["nm_asisten"];  
			//			$options.="<OPTION VALUE=\"$id\">".$nama; 
			//	}
				
    		$koneksi->tutupdb();
    		
    		return $list;
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
	
		function lamar($kd_lowongan, $kd_asisten){
		$koneksi = new Koneksi();
    	$koneksi->pilihkonekdb();
		
		echo $kd_asisten;
		echo $kd_lowongan;
		
		$sql =	"
		INSERT INTO 
		`detail_lowongan`
		(`KD_LOWONGAN`, `KD_MEMBER`, `KD_ASISTEN`) 
		SELECT 
		b.kd_lowongan, a.kd_member, a.kd_asisten 
		FROM asisten a 
		JOIN lowongan b 
		WHERE b.kd_lowongan = '".$kd_lowongan."'
		AND
		a.kd_asisten = '".$kd_asisten."'
		";
		
		$berhasil=mysql_query($sql) or die(mysql_error());
		if($berhasil){
			echo "berhasil";
		} else {
			echo "ngga berhasil :(";
		}
		
		$koneksi->tutupdb();
	}
	
    }

?>