<?php

class Koneksi{

	var $host;
	var $user;
	var $pass;
	var $dbnm;
	var $db;
	
	function _connect(){
		$this->db = mysql_connect($this->host,$this->user,$this->pass);
		mysql_select_db($this->dbnm,$this->db);
	}
	
	function _close(){
		mysql_close($this->db);
	}
}