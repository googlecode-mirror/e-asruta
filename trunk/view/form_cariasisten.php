<?php
include_once 'header.php';
include_once 'sidebar.php';
include '../config/waktu.php';
?>

		<div id="contenttext">
			<div class="bodytext" style="padding:12px;" align="justify">
				<form method="post" action="action.cariasisten.php">
				<table>
					<tr>
						<td>Keterampilan</td><td><input name="keterampilan" type="text" /></td> 
					</tr>
					<tr>
						<td>Gaji yang diinginkan</td><td><input name="gaji" type="text" /></td> 
					</tr>
					<tr>
						<td>Hari kerja dalam seminggu</td><td><input name="hari_kerja" type="text" /></td> 
					</tr>
					<tr>
						<td>Jam kerja dalam sehari</td><td><input name="jam_kerja" type="text" /></td> 
					</tr>
					<tr>
						<td>Luas rumah</td><td><input name="luas_rumah" type="text" /></td> 
					</tr>
					<tr>
						<td>Jumlah anggota keluarga</td><td><input name="anggota_kel" type="text" /></td> 
					</tr>
					<tr>
						<td>Lokasi</td><td><input name="lokasi" type="text" /></td> 
					</tr>
					<tr>
						<td><input name="Submit" type="submit" value="Submit"/></td> 
					</tr>
				</table>
			</form>
			</div>
		</div>
			
<?php include 'footer.php'; ?>