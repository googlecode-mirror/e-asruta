<?php
include_once 'header.php';
include_once 'sidebar.php';
include '../config/waktu.php';
include '../lib/testimoni.php';
include '../lib/testimoni_dao.php';
$testimoni=new Testimoni();
$testi=new Testimoni_Dao();
?>

		<div id="contenttext">
		<?php
				$kd_users=$_SESSION['kduser'];
				//echo $kd_users;
				if($_POST){
				$testimoni->kd_member=$kd_users;
				$testimoni->isi_testi=$_POST['testimoni'];
				if(empty($testimoni->isi_testi)){
						echo "Anda belum mengisi testimoni";
					}else{
						$testi->isiTestimoni($testimoni);
						header('location:lihat_testimoni.php');
					}
				}
		?>
			<div class="bodytext" style="padding:12px;" align="justify">
				<form method="post" action="">
				<table>
					<tr>
						<td>Isi Testimoni</td><td><input name="testimoni" type="text" /></td> 
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