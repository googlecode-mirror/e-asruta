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
						<td>Lokasi</td><td><input name="hari_kerja" type="text" value="<?php echo $hasil->lokasi; ?>"/><//></td> 
					</tr>
					<tr>
						<td>Jam kerja dalam sehari</td><td><input name="jam_kerja" type="text" value="<?php echo $hasil->jam_kerja; ?>"/><//></td> 
					</tr>
					<tr>
						<td>Menginap?</td><td><input name="luas_rumah" type="text" value="<?php echo $hasil->menginap; ?>"/><//></td> 
					</tr>
					<tr>
						<td>Hari Kerja</td><td><input name="anggota_kel" type="text" value="<?php echo $hasil->hari_kerja; ?>"/><//></td> 
					</tr>
					<tr>
						<td></td><td><input name="Submit" type="submit" value="Simpan" class="btn btn-primary" align="right"/></td> 
					</tr>
				</table>
			</form>
			</div>
		</div>
			
<?php include 'footer.php'; ?>