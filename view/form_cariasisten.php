<?php
include_once 'header.php';
include_once 'sidebar.php';
include '../config/waktu.php';
include '../lib/cariasisten_dao.php';
require_once '../lib/lowongan.php';
?>
<div id="contenttext">
<h4>Form Pencarian Asisten Rumah Tangga</h4>
<?php
$kd_users=$_SESSION['kduser'];
//echo $kd_users;

$cari=new CariAsisten_Dao();
$cariasisten=new Lowongan();

$data=$cari->cari_keahlian();
//echo $cariasisten->kd_lowongan;
if($_POST){
$cariasisten->pembuat_lamar=$kd_users;
$cariasisten->kd_jenislo=1;
$cariasisten->kd_keahlian=$_POST['kd_keahlian'];
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

		
			<div class="bodytext" style="padding:12px;" align="justify">
				<form method="post" action="">
				<table>
					<tr>
						<td>Keterampilan</td>
						<td>
							<select name="kd_keahlian">
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
							<select name="menginap"><option value="Ya">Ya</option> <option value="Tidak">Tidak</option></select></td>
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