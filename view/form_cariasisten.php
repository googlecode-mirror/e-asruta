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
						<td width="121">Keterampilan</td>
						<td width="293"><input name="kd_keahlian" type="text" /></td> 
					</tr>
					<tr>
						<td>Gaji yang diinginkan</td><td><input name="gaji" type="text" value="" /></td> 
					</tr>
					<tr>
						<td>Lokasi</td><td><input name="lokasi" type="text" /></td> 
					</tr>
					<tr>
						<td>Hari Kerja</td><td><input name="hari_kerja" type="text" /></td> 
					</tr>
					</tr>
					<tr>
						<td>Menginap tidak?</td>
						<td>
							<select name="lokasi"><option value="Ya">Ya</option> <option value="Tidak">Tidak</option></select>						</td>
					</tr>
					<tr>
						<td>Jam Kerja</td><td><input name="jam_kerja" type="text" /></td> 
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