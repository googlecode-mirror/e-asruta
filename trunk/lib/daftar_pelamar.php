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
    
    // pencarian pekerjaan dengan kategori khusus UC-09
    public function cari_kerja($gaji, $keterampilan, $luasrumah, $lokasi){
        $this->id_kerja = $id_kerja;
        $this->gaji = $gaji;
        $this->keterampilan = $keterampilan;
        $this->lokasi = lokasi;
        $this->luasrumah = $luasrumah;
        
        
        $sql = "Select * from lowongan where gaji like '".gaji."', keterampilan like '".keterampilan."', lokasi like '".lokasi."',
                luasrumah = '".luasrumah."'";
        $hasil=mysql_query($sql) or (mysql_error());
		
        if ($hasil){
            mysql_fetch_array($result);
        } ELSE {
            echo "hasil tidak ditemukan";
        }
    }
    
    //**UC-12
    public function melamar($id_kerja, $id_asisten){
        $this->id_kerja->$id_kerja;
        $this->id_asisten->id_asisten;
        $this->lamar->$lamar;
        $this->id_majikan->id_majikan;
        
        $sql = "update kerja set id_asisten = '".$this->id_asisten."' where id_kerja = '".$this->id_kerja."'";
        
        $hasil=mysql_query($sql) or (mysql_error());
    }
    
    //hapus lamaran
    public function hps_lamar($id_kerja){
        $sql = "delete from kerja where id_kerja=$id_kerja";
        
        $hasil=mysql_query($sql) or (mysql_error());
    }
}

?>