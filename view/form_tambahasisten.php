<?php
include_once 'header.php';
include_once 'sidebar_birojasa.php';
include '../config/waktu.php';
include '../lib/birojasa_dao.php';
require_once '../lib/birojasa.php';
?>
<div id="contenttext">
<?php

$kd_member = $_SESSION['kduser'];
//echo $kd_users;

$cari=new birojasa_Dao();
$xx = new birojasa();

//echo $birojasa->kd_lowongan;
if($_POST){
$xx->kd_member=$kd_member;
$xx->nm_asisten=$_POST['nm_asisten'];
$xx->hapeasisten=$_POST['hapeasisten'];
$xx->alamat_asisten=$_POST['alamat_asisten'];
$xx->tgl_lahirasisten=$_POST['tgl_lahirasisten'];
$xx->tmpt_lahirasisten=$_POST['tmpt_lahirasisten'];
$xx->kota_asisten=$_POST['kota_asisten'];
$xx->no_idasisten=$_POST['no_idasisten'];
$xx->copy_asisten=$_POST['copy_asisten'];
	if(empty($xx->nm_asisten) || empty($xx->hapeasisten) || empty($xx->alamat_asisten) || 
		empty($xx->tgl_lahirasisten) || empty($xx->tmpt_lahirasisten) 
		|| empty($xx->kota_asisten) || empty($xx->no_idasisten)){
		echo "Semua data harus diisi";
	}else{
		$cari->tambah_asisten($xx);
		//header('location:daftar_asisten.php');
	}
}
?>

		
			<div class="bodytext" style="padding:12px;" align="justify">
				<form method="post" action="">
				<table>
					<tr>
						<td>Nama Asisten</td><td><input name="nm_asisten" type="text" value="" /></td>
					</tr>
					<tr>
						<td>Nomor Handphone Asisten</td><td><input name="hapeasisten" type="text" value="" /></td> 
					</tr>
					<tr>
						<td>Alamat Asisten</td><td><input name="alamat_asisten" type="text" /></td> 
					</tr>
					<tr>
						<td>Kota</td><td><input name="kota_asisten" type="text" /></td> 
					</tr>
					<tr>
						<td>Tempat Lahir Asisten</td><td><input name="tmpt_lahirasisten" type="text" /></td> 
					</tr>
					<tr>
						<td>Tanggal Lahir Asisten</td><td><input name="tgl_lahirasisten" type="date" /></td> 
					</tr>
					</tr>									
					<tr>
						<td>Nomor ID Card (KTP / SIM)</td><td><input name="no_idasisten" type="text" /></td> 
					</tr>
					<tr>
						<td>Gambar kopi ID Card</td><td><input name="copy_asisten" type="text" /></td> 
					</tr>
					<tr>
						<td></td>
						<td><div align="right">
						  <input name="Submit" type="submit" value="Simpan" class="btn btn-primary" align="right"/>
					    </div></td>
					</tr>
				</table>
			</form>
			</div>
		</div>	
<?php include 'footer.php'; ?>