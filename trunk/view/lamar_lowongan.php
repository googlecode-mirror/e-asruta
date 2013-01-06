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
					foreach ($data as $cari){
				?>				
				<tr><td><?php echo $cari->nm_member; ?></td>
					<td><?php echo $cari->jenis_lowongan;?></td>
					<td><?php echo $cari->jns_keahlian; ?></td>
					<td><?php echo $cari->hari_kerja; ?></td>
					<td><?php echo $cari->jam_kerja; ?></td>
					<td><?php echo $cari->menginap; ?></td>
					<td><?php echo $cari->lokasi; ?></td>
					<td><?php echo $cari->gaji; ?></td>
				</tr>
						
				<?php 	}
					} ?>
			</table>
			<fieldset>
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
            <button type="submit" class="btn btn-primary">Lamar</button>  
            <button class="btn">Cancel</button>  
          </div>  
		</fieldset>
		</div>
		</div>

<?php include 'footer.php'; ?>