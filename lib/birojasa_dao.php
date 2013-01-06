<?php

/**
 * @author Gerhantara
 * @copyright 2012
 */


    class birojasa_dao{
        
        function tambah_asisten(Birojasa $xx){
        
        $koneksi = new Koneksi();
		
		$koneksi->pilihkonekdb();
		
		$sql = "
			INSERT 
			INTO
			asisten
			(	
				kd_member,
				nm_asisten,
				hapeasisten,
				alamat_asisten,
				tgl_lahirasisten,
				tmpt_lahirasisten,
				kota_asisten,
				no_idasisten,
                copy_asisten
			)
			VALUES
			(
				'".$xx->kd_member."',
				'".$xx->nm_asisten."',
				'".$xx->hapeasisten."',
				'".$xx->alamat_asisten."',
				'".$xx->tgl_lahirasisten."',
				'".$xx->tmpt_lahirasisten."',
				'".$xx->kota_asisten."',
				'".$xx->no_idasisten."',
                '".$xx->copy_asisten."'
			)
		" ;
        
		$berhasil=mysql_query($sql);
		if(!$berhasil){
			echo "gagal";
		}
		
		$xx->kd_member = mysql_insert_id();
		
		$koneksi->tutupdb();
	
	}
    
        
        function hapus_asisten($kd_asisten){
            $koneksi = new Koneksi();
            $koneksi->pilihkonekdb();
		
    		$sql = "
    		DELETE
    		FROM
    		asisten
    		WHERE
    		kd_asisten = '".$kd_asisten."'
    		";
		
		mysql_query($sql);
		
		$koneksi->tutupdb();
        }
    
        function edit_asisten($id_asisten){
            $koneksi = new Koneksi();
            $koneksi->pilihkonekdb();
			
			$birojasa = new birojasa();
            
            $sql = "
            Update
            asisten set
            nm_asisten = '".$birojasa->nm_asisten."',
            hapeasisten = '".$birojasa->hapeasisten."',
            alamat_asisten = '".$birojasa->alamat_asisten."',
            tgl_lahirasisten = '".$birojasa->tgl_lahirasisten."',
            tmpt_lahirasisten = '".$birojasa->tmpt_lahirasisten."',
            kota_asisten = '".$birojasa->kota_asisten."',
            no_idasisten = '".$birojasa->no_idasisten."',
            copy_asisten = '".$birojasa->copy_asisten."'
			where kd_asisten = ".$id_asisten."'";
			
			mysql_query($sql);
		
			$koneksi->tutupdb();
        }
		
		function daftar_asisten($kd_member){
			$koneksi = new Koneksi();
			
			$koneksi->pilihkonekdb();
            
            $sql = "
			Select
			kd_asisten,
			nm_asisten,
			hapeasisten,
			alamat_asisten,	
			kota_asisten,		
			tmpt_lahirasisten,
			tgl_lahirasisten
			From
			asisten
			Where
			kd_member = '".$kd_member."'
			";
			
			$list_cari = false;
		
			$res = mysql_query($sql);
			if($res){
				while($row = mysql_fetch_assoc($res)){
					$cari = new birojasa();
					$cari->kd_asisten=$row['kd_asisten'];
					$cari->nm_asisten=$row['nm_asisten'];
					$cari->hapeasisten=$row['hapeasisten'];
					$cari->alamat_asisten=$row['alamat_asisten'];
					$cari->kota_asisten=$row['kota_asisten'];
					$cari->tmpt_lahirasisten=$row['tmpt_lahirasisten'];
					$cari->tgl_lahirasisten=$row['tgl_lahirasisten'];
					
					$list_cari[] = $cari;
				}
			}
		
		$koneksi->tutupdb();
		return $list_cari;
	}
}


?>