<?php
include_once 'header.php';
include_once 'sidebar.php';
include '../config/waktu.php';
include '../lib/cariasisten_dao.php';
include '../lib/cari.asisten.php';

$id= $_GET['id'];
$id_asisten=mysql_real_escape_string($id);
$asisten= new CariAsisten_Dao();
$hasil=$asisten->cariPencarian($id_asisten);
if($_POST){
$cariasisten->kd_jenislo=1;
$cariasisten->kd_keahlian=$_POST['keterampilan'];
$cariasisten->gaji=$_POST['gaji'];
$cariasisten->lokasi=$_POST['lokasi'];
$cariasisten->hari_kerja=$_POST['hari_kerja'];
$cariasisten->menginap=$_POST['menginap'];
$cariasisten->jam_kerja=$_POST['jam_kerja'];
	if(empty($cariasisten->pembuat_lamar) || empty($cariasisten->kd_keahlian) || empty($cariasisten->gaji) || 
		empty($cariasisten->lokasi) || empty($cariasisten->hari_kerja) || empty($cariasisten->menginap) || empty($cariasisten->jam_kerja)){
		echo "Semua data harus diisi";
	}else{
		$cari->tambahPencarian($cariasisten);
		header('location:lihat_asisten.php');
	}
}
?>


		<div id="contenttext">
			<div class="bodytext" style="padding:12px;" align="justify">
				<form method="post" action="action.cariasisten.php">
				<table>
					<tr>
						<td>Keterampilan</td><td><input name="keterampilan" type="text" value="<?php echo $hasil->kd_keahlian; ?>"/></td> 
					</tr>
					<tr>
						<td>Gaji yang diinginkan</td><td><input name="gaji" type="text" value="<?php echo $hasil->gaji; ?>"/><//></td> 
					</tr>
					<tr>
						<td>Lokasi</td><td><input name="lokasi" type="text" value="<?php echo $hasil->lokasi; ?>"/><//></td> 
					</tr>
					<tr>
						<td>Jam kerja dalam sehari</td><td><input name="jam_kerja" type="text" value="<?php echo $hasil->jam_kerja; ?>"/><//></td> 
					</tr>
					<tr>
						<td>Menginap?</td><td><input name="menginap" type="text" value="<?php echo $hasil->menginap; ?>"/><//></td> 
					</tr>
					<tr>
						<td>Hari Kerja</td><td><input name="hari_kerja" type="text" value="<?php echo $hasil->hari_kerja; ?>"/><//></td> 
					</tr>
					<tr>
						<td></td><td><input name="Submit" type="submit" value="Simpan" class="btn btn-primary" align="right"/></td> 
					</tr>
				</table>
			</form>
			</div>
		</div>
			
<?php include 'footer.php'; ?>