<?php
include_once 'header.php';
include_once 'sidebar.php';
include '../lib/carimajikan_dao.php';
include '../lib/cari.majikan.php';


$lowongan = new CariMajikan_Dao();
$id= $_GET['id'];
$kd_lowongan=mysql_real_escape_string($id);

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
			<fieldset>
			<form class="form-horizontal" id="edithere" method='post' action='action_lamar.php'>
			<div class="control-group">  
            <label class="control-label" for="select01">Asisten Yang Akan Di Lamarkan</label>  
            <div class="controls">  
              <select id="select01">  
                <?php 
				$lowongan->cari_lamar();				
				?>
              </select>  
            </div>  
          </div>
		   <div class="form-actions">  
            <button type="submit" name="submit" class="btn btn-primary">Lamar</button>  
            <a class="btn" href="../view/lihat_lowongan.php">Cancel</a>  
          </div>
		</form>
		</fieldset>


<?php include 'footer.php'; ?>