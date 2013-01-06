<?php
include_once 'header.php';
include_once 'sidebar_birojasa.php';
include '../config/waktu.php';
include '../lib/birojasa_dao.php';
require_once '../lib/birojasa.php';
?>
<div id="contenttext">
<?php
//$kd_member = $_SESSION['kduser'];
//echo $kd_users;

$edit = new birojasa_Dao();
$yy = new birojasa();
//echo $_GET['id'];
$id = $_GET['id'];
$kd_asisten=mysql_real_escape_string($id);

$data=$edit->data_asisten($kd_asisten);
//echo $birojasa->kd_lowongan;
if($_POST){
$yy->kd_asisten=$kd_asisten;
$yy->nm_asisten=$_POST['nm_asisten'];
$yy->hapeasisten=$_POST['hapeasisten'];
$yy->alamat_asisten=$_POST['alamat_asisten'];
$yy->tgl_lahirasisten=$_POST['tgl_lahirasisten'];
$yy->tmpt_lahirasisten=$_POST['tmpt_lahirasisten'];
$yy->kota_asisten=$_POST['kota_asisten'];
$yy->no_idasisten=$_POST['no_idasisten'];
$yy->copy_asisten=$_POST['copy_asisten'];
	if(empty($yy->nm_asisten) || empty($yy->hapeasisten) || empty($yy->alamat_asisten) || 
		empty($yy->tgl_lahirasisten) || empty($yy->tmpt_lahirasisten) 
		|| empty($yy->kota_asisten) || empty($yy->no_idasisten)){
		echo "Semua data harus diisi";
	}else{
		$edit->edit_asisten($yy, $kd_asisten);
		header('location:daftar_asisten.php');
	}
}
?>
		<?php
					if($data!=NULL){
						foreach ($data as $list){
				?>
		
			<div class="bodytext" style="padding:12px;" align="justify">
				<form method="post" action="">
				<table>
					<tr>
						<td>Nama Asisten</td><td><input name="nm_asisten" type="text" value="<?php echo $list->nm_asisten ?>" /></td>
					</tr>
					<tr>
						<td>Nomor Handphone Asisten</td><td><input name="hapeasisten" type="text" value="<?php echo $list->hapeasisten ?>" /></td> 
					</tr>
					<tr>
						<td>Alamat Asisten</td><td><input name="alamat_asisten" type="text" value="<?php echo $list->alamat_asisten ?>" /></td> 
					</tr>
					<tr>
						<td>Kota</td><td><input name="kota_asisten" type="text" value="<?php echo $list->kota_asisten ?>" /></td> 
					</tr>
					<tr>
						<td>Tempat Lahir Asisten</td><td><input name="tmpt_lahirasisten" type="text" value="<?php echo $list->tmpt_lahirasisten ?>" /></td> 
					</tr>
					<tr>
						<td>Tanggal Lahir Asisten</td><td><input name="tgl_lahirasisten" type="text" value="<?php echo $list->tgl_lahirasisten ?>" /></td> 
					</tr>
					</tr>
					<tr>
						<td>Nomor ID Card (KTP / SIM)</td><td><input name="no_idasisten" type="text" value="<?php echo $list->no_idasisten ?>" /></td> 
					</tr>
					<tr>
						<td>Gambar kopi ID Card</td><td><input name="copy_asisten" type="image" value="<?php echo $list->copy_asisten ?>" /></td> 
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
			<?php 	}
					} ?>
		</div>	
<?php include 'footer.php'; ?>