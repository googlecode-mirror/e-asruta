<?php

/**
 * @author cccccc
 * @copyright 2012
 */
 
 include_once 'config/koneksi.php';

class pekerjaan{
    var $id_asisten;
    var $id_kerja;
    var $keterampilan;
    var $gaji;
    var $lokasi;
    var $majikan;
    protected $konek;
    
    function konek(){
        $koneksi = new koneksi;
        $koneksi->pilihkonekdb();
    }
    
    // daftar lowongan
    public function daftar_kerja() {
        $sql = "SELECT jns_pekerjaan, lokasi, gaji, majikan FROM lowongan WHERE status_lamar = '1'";
        
        $hasil=mysql_query($sql) or (mysql_error());
		return mysql_fetch_row($hasil);
    }
    
    // data detail lowongan
    public function daftar_kerjadetail($id_kerja){
        $this->id_kerja = $id_kerja;
        $sql = "SELECT * FROM lowongan WHERE id_kerja = '".id_kerja."'";
        
        $hasil=mysql_query($sql) or (mysql_error());
		return mysql_fetch_row($hasil);
    }
    
    // pencarian pekerjaan dengan kategori khusus UC-10
    public function cari_kerja(){
        $this->id_kerja = $id_kerja;
        $this->gaji = $gaji;
        $this->keterampilan = $keterampilan;
        
        $sql = "Select * from lowongan where gaji = '".gaji."', keterampilan = '".keterampilan."'";
        $hasil=mysql_query($sql) or (mysql_error());
		return mysql_fetch_row($hasil);
    }
}

?>