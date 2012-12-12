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
        $sql = "SELECT a.jns_lowongan, b.lokasi, b.gaji, b.luas_rumah, b.jam_kerja, b.menginap 
        FROM lowongan b, jenis_lowongan a WHERE a.kd_jenislo = b.kd_jenislo and b.kd_status = '1'";
        
        $hasil=mysql_query($sql) or (mysql_error());
		return mysql_fetch_row($hasil);
    }
    
    // data detail lowongan
    public function daftar_kerjadetail($kd_lowongan){
        $this->kd_lowongan = $kd_lowongan;
        $sql = "SELECT * FROM lowongan WHERE id_kerja = '".kd_lowongan."'";
        
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
        
        
        $sql = "Select * from lowongan where gaji like '".gaji."' or keterampilan like '".keterampilan."' or lokasi like '".lokasi."' or
                luasrumah = '".luasrumah."'";
        $hasil=mysql_query($sql) or (mysql_error());
		
        if ($hasil){
            mysql_fetch_array($result);
        } ELSE {
            echo "hasil tidak ditemukan";
        }
    }
    
    //**UC-12
    public function melamar($id_cariasisten, $id_asisten){
        $this->id_cariasisten->$id_cariasisten;
        $this->id_asisten->id_asisten;
        $this->lamar->$lamar;
        $this->id_majikan->id_majikan;
        
        $sql = "update lowongan set id_asisten = '".$this->id_asisten."' where id_kerja = '".$this->id_cariasisten."'";
        
        $hasil=mysql_query($sql) or (mysql_error());
    }
    
    //hapus lamaran
    public function hps_lamar($id_kerja){
        $sql = "delete from lowongan where id_kerja=$id_kerja";
        
        $hasil=mysql_query($sql) or (mysql_error());
    }
}

?>