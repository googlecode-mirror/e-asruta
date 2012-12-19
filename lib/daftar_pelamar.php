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
    public function createAst($kd_lowongan, $kd_member, $kd_asisten, $kd_status){
        $this->kd_lowongan->$kd_lowongan;
        $this->kd_member->$kd_member;
        $this->kd_asisten->$kd_asisten;
        $this->kd_status->$kd_status;
        
        $sql = "
			INSERT 
			INTO
			detail_lowongan
			(	
				kd_lowongan,
				kd_member,
				kd_asisten,
				kd_status
			)
			VALUES
			(
				'".$kd_lowongan."',
				'".$kd_member."',
				'".$kd_asisten."',
				'".$kd_status."'
			)
		" ;
        
        $hasil=mysql_query($sql) or (mysql_error());
    }
    
    //hapus lamaran
    public function hps_lamar($kd_member, $kd_asisten){
        $sql = 
        "delete 
        from detail_lowongan
        where
        kd_member = $kd_member
        and
        kd_asisten = $kd_asisten";
        
        $hasil=mysql_query($sql) or (mysql_error());
    }
}

?>