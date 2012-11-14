<?php

class CariAsisten_Dao{

	var $host;
	var $user;
	var $pass;
	var $dbnm;
	var $db;
	
	function __construct($host,$user,$pass,$dbnm){
		$this->host = $host;
		$this->user = $user;
		$this->pass = $pass;
		$this->dbnm = $dbnm;
	}
	
	function _connect(){
		$this->db = mysql_connect($this->host,$this->user,$this->pass);
		mysql_select_db($this->dbnm,$this->db);
	}
	
	function _close(){
		mysql_close($this->db);
	}

	function add(CariAsisten $cari){
		
		$this->_connect();
		
		$sql = "
			INSERT 
			INTO
			cari_asisten
			(
				keterampilan;
				gaji;
				hari_kerja;
				jam_kerja;
				luas_rumah;
				anggota_kel;
			)
			VALUES
			(
				'".$cari->keterampilan."',
				'".$cari->gaji."',
				'".$cari->hari_kerja."',
				'".$cari->jam_kerja."',
				'".$cari->luas_rumah."',
				'".$cari->anggota_kel."'
			)
		";
		mysql_query($sql,$db);
		
		$cari->id = mysql_insert_id($db);
		
		$this->_close();
	
	}
	
	function get($id){
	
		$this->_connect();
		
		$sql = "
		SELECT
		*
		FROM
		cari_asisten
		WHERE
		id = '".$id."'
		";
		
		$cari = false;
		
		$res = mysql_query($sql,$this->db);
		
		if($res){
		
			$row = mysql_fetch_assoc($res);
		
			$cari = new CariAsisten();
			$cari->keterampilan=$row['keterampilan'];
			$cari->gaji=$row['gaji'];
			$cari->jam_kerja=$row['jam_kerja'];
			$cari->hari_kerja=$row['hari_kerja'];
			$cari->luas_rumah=$row['luas_rumah'];
			$cari->anggota_kel=$row['anggota_kel'];		
		
		}
		
		$this->_close();
		
		return $cari;
	}
	
	function get_all(){
	
		$this->_connect();
		
		$sql = "
		SELECT
		*
		FROM
		cari_asisten
		";
		
		$list_cari = array();
		
		$res = mysql_query($sql,$this->db);
		if($res){
			while($row = mysql_fetch_assoc($res)){
			
				$cari = new CariAsisten();
				$cari->id=$row['id'];
				$cari->keterampilan=$row['keterampilan'];
				$cari->jam_kerja=$row['jam_kerja'];
				$cari->hari_kerja=$row['hari_kerja'];
				$cari->luas_rumah=$row['luas_rumah'];
				$cari->anggota_kel=$row['anggota_kel'];	
				$cari->gaji=$row['gaji'];				
				
				$list_cari[] = $cari;
			
			}
		}
		
		$this->_close();
		
		return $list_cari;
	
	}
	
	function hapusPencarian($id){
	
		$this->_connect();
		
		$sql = "
		DELETE
		FROM
		cari_asisten
		WHERE
		id = '".$id."'
		";
		
		mysql_query($sql,$this->db);
		
		$this->_close();
	
	}
	
class CariAsisten{
	var $id_cari;
	var $keterampilan;
	var $gaji;
	var $hari_kerja;
	var $jam_kerja;
	var $luas_rumah;
	var $anggota_kel;
}