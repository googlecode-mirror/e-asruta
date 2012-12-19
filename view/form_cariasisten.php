<?php
include_once 'header.php';
include_once 'sidebar.php';
include '../config/waktu.php';
include '../lib/cariasisten_dao.php';
include '../lib/cari.asisten.php';
$cari=new CariAsisten_Dao();
$data=$cari->cari_keahlian();
?>

		<div id="contenttext">
			<div class="bodytext" style="padding:12px;" align="justify">
				<form method="post" action="action.cariasisten.php">
				<table>
					<tr>
						<td>Keterampilan</td>
						<td>
							<select name="keterampilan">
								<?php
								if($data!=NULL){
								foreach ($data as $cari){?>	
							<option value="<?php echo $cari->kd_keahlian;?>"><?php echo $cari->jns_keahlian; ?></option>
							<?php } 
							}?>
							</select> 
						</td>
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
							<select name="lokasi"><option value="Ya">Ya</option> <option value="Tidak">Tidak</option></select></td>
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