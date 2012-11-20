<?php
class Koneksi{
var $db_host='localhost';
var $db_name='e_asruta';
var $db_username='root';
var $db_pass='';

	//Melakukan login kedalam database
	function konekdb(){
		$koneksi=mysql_connect($this->db_host,$this->db_username,$this->db_pass);
		if(!$koneksi){
			die ("Tidak bisa login ke database".mysql_error());
		}		
	}
	
	//Memilih nama database
	function pilihdb(){
		$db_select=mysql_select_db($this->db_name);
		if(!$db_select){
			die ("Tidak bisa memilih database".mysql_error());
		}
	}
	
	//Memutus koneksi dengan database
	function tutupdb(){
		$tutup = mysql_close() or die ("Tidak bisa memutus koneksi ke database");
		return $tutup;
	}
	
	//Login ke database dan memilih database
	function pilihkonekdb(){
		$this->konekdb();
		$this->pilihdb();
	}
}