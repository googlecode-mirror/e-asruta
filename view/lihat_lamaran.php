<?php
include_once 'header.php';
include_once 'sidebar.php';
include '../lib/cariasisten_dao.php';
$pencarian=new CariAsisten_Dao();
?>
		<div id="contenttext">
			<div class="bodytext" style="padding:12px;" align="justify">	
				<h4>Daftar Pelamar Kerja</h4>
				<table border="2" align="left" class="table table-striped">
					<tr>
						<td>Asisten dan Biro</td>
						<td>Kontak</td>
						<td>Aksi</td>
				<?php
					$kd_lowongan=$_GET['id'];
					$data = $pencarian->tampilkanLamaran($kd_lowongan);
//					echo $_SESSION['kduser'];
//					echo $pageSize; 
					if($data!=NULL){
						foreach ($data as $cari){
				?>				
				   <tr>	<td><?php echo $cari->nm_asisten."<br>".$cari->nama_biro;?></td>
						<td><?php echo $cari->hape;?></td>
						<td><form method="POST" action="aksi_lamaran.php" multipart="enctype/form-data">
						<input type="hidden" name="kd_asisten" value="<?php echo $cari->kd_asisten;?>">
						<input type="hidden" name="kd_lowongan" value="<?php echo $kd_lowongan;?>">
						<input type="submit" value="Terima Lamaran"></form></td>
						
						</tr>
						
				<?php 	}
					} ?>
				</table>
			</div>
		</div>
<?php include 'footer.php'; ?>