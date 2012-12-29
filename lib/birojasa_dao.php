<?php

/**
 * @author Gerhantara
 * @copyright 2012
 */


    class birojasa_dao{
        
        function tambah_asisten(birojasa $birojasa, $kd_member){
        
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
				'".$birojasa->kd_member."',
				'".$birojasa->nm_asisten."',
				'".$birojasa->hapeasisten."',
				'".$birojasa->alamat_asisten."',
				'".$birojasa->tgl_lahirasisten."',
				'".$birojasa->tmpt_lahirasisten."',
				'".$birojasa->kota_asisten."',
				'".$birojasa->no_idasisten."',
                '".$birojasa->copy_asisten."'
			)
		" ;
		$berhasil=mysql_query($sql);
		if(!$berhasil){
			echo "gagal";
		}
		
		$birojasa->kd_member = mysql_insert_id();
		
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
			
			asisten
			where
			kd_member = 
			(select kd_members from members 
			where kd_user = $_SESSION['kduser']";
			
			mysql_query($sql);
		
			$koneksi->tutupdb();
	}


?>