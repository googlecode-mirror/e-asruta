<?php
include_once 'header.php';
include_once 'sidebar_birojasa.php';
include '../lib/carimajikan_dao.php';
include '../lib/Lowongan.php';


$lowongan = new CariMajikan_Dao();
$id= $_GET['id'];
$kd_lowongan=mysql_real_escape_string($id);
 //$_POST['asisten'];
//$kd_asisten=mysql_real_escape_string($id2);
//$lowongan->lamar($kd_lowongan, $kd_asisten);
?>
	
	<div id="contenttext">
		<div class="bodytext" style="padding:12px;" align="justify">
			<table border="2" align="center" class="table table-striped">
				<tr>
					<td>Pembuat Lowongan</td>
					<td>Jenis Lowongan</td>
					<td>Keahlian</td>
					<td>Hari Kerja</td>
					<td>Jam Kerja</td>
					<td>Menginap Tidak?</td> 
					<td>Lokasi</td>
					<td>Gaji</td>
				</tr>
					
				<?php
				$data = $lowongan->daftar_low($kd_lowongan);
				if($data!=NULL){
					foreach ($data as $liat){
				?>				
				<tr><td><?php echo $liat->nm_member; ?></td>
					<td><?php echo $liat->jenis_lowongan;?></td>
					<td><?php echo $liat->jns_keahlian; ?></td>
					<td><?php echo $liat->hari_kerja; ?></td>
					<td><?php echo $liat->jam_kerja; ?></td>
					<td><?php echo $liat->menginap; ?></td>
					<td><?php echo $liat->lokasi; ?></td>
					<td><?php echo $liat->gaji; ?></td>
				</tr>
						
				<?php 	}
					} ?>
			</table>
			
			<form method="post" action="">	
				<label for="select"><select name="asisten" value="asisten" size="1"> 
					<option>
						<?php  
						$lowongan->cari_lamar();
						?> 
						</option>
					</select>
				   <input type="submit" name="Submit" value="Submit">
				</form>	
				
			<?php
				if(isset($_POST['Submit'])) 
				{ 
					//echo $_POST['asisten'];
					//echo $kd_lowongan;
					$kd_asisten = $_POST['asisten'];
					//$kd_asisten=mysql_real_escape_string($id2);
					//$xx = 3;
					//$yy = 14;
					$lowongan->lamar($kd_lowongan, $kd_asisten); 
				}
			?>
	</div>
	</div>
	

<?php include 'footer.php'; ?>