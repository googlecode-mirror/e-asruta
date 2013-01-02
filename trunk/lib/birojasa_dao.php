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
    
        function edit_asisten(birojasa $birojasa){
            $koneksi = new Koneksi();
            $koneksi->pilihkonekdb();
            
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
			where kd_asisten = ".$birojasa->kd_asisten."'";
			
			mysql_query($sql);
		
			$koneksi->tutupdb();
        }
		
		function daftar_asisten(birojasa $kd_member){
			$koneksi = new Koneksi();
			
			$koneksi->pilihkonekdb();
            
            $sql = "
			Select
			nm_asisten,
			hapeasisten,
			alamat_asisten,
			tgl_lahirasisten,
			tmpt_lahirasisten,
			kota_asisten,
			no_idasisten
			
			From
			
			asisten";
			
			mysql_query($sql);
		
			$koneksi->tutupdb();
	}


?>