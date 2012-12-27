<?php
include_once 'header.php';
include_once 'sidebar.php';
include '../config/waktu.php';
include '../lib/birojasa_dao.php';
require_once '../lib/birojasa.php';
?>
<div id="contenttext">
<?php
$kd_member="select kd_member from members where kd_user = $_SESSION['kduser']";
//echo $kd_users;

$tambah = new birojasa_Dao();
$birojasa = new birojasa();

$data=$tambah->tambah_asisten();
//echo $birojasa->kd_lowongan;
if($_POST){
$birojasa->kd_member=$kd_member;
$birojasa->nm_asisten=$_POST['nm_asisten'];
$birojasa->hapeasisten=$_POST['hapeasisten'];
$birojasa->alamat_asisten=$_POST['alamat_asisten'];
$birojasa->tgl_lahirasisten=$_POST['tgl_lahirasisten'];
$birojasa->tmpt_lahirasisten=$_POST['tmpt_lahirasisten'];
$birojasa->kota_asisten=$_POST['kota_asisten'];
$birojasa->no_idasisten=$_POST['no_idasisten'];
$birojasa->copy_asisten=$_POST['copy_asisten'];
	if(empty($birojasa->nm_asisten) || empty($birojasa->hapeasisten) || empty($birojasa->alamat_asisten) || 
		empty($birojasa->tgl_lahirasisten) || empty($birojasa->tmpt_lahirasisten) 
		|| empty($birojasa->kota_asisten) || empty($birojasa->no_idasisten) || empty($birojasa->copy_asisten)){
		echo "Semua data harus diisi";
	}else{
		$tambah->tambah_asisten($birojasa);
		header('location:daftar_asisten.php');
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
						<td>Tanggal Lahir Asisten</td><td><input name="tgl_lahirasisten" type="text" /></td> 
					</tr>
					</tr>
					<tr>
						<td>Tempat Lahir Asisten</td><td><input name="tmpt_lahirasisten" type="text" /></td> 
					</tr>
					<tr>
						<td>Kota</td><td><input name="kota_asisten" type="text" /></td> 
					</tr>
					<tr>
						<td>Nomor ID Card (KTP / SIM)</td><td><input name="no_idasisten" type="text" /></td> 
					</tr>
					<tr>
						<td>Gambar kopi ID Card</td><td><input name="copy_asisten" type="image" /></td> 
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