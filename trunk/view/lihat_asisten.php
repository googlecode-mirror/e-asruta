<?php
include_once 'header.php';
include_once 'sidebar.php';
include '../lib/cariasisten_dao.php';
include '../lib/cari.asisten.php';

$pencarian=new CariAsisten_Dao();
$data=$pencarian->tampilSemuaCari($_SESSION['kduser']);
?>
		<div id="contenttext">
			<div class="bodytext" style="padding:12px;" align="justify">
				<table border="2" align="center">
					<tr>
						<td>Keterampilan</td>
						<td>Hari Kerja</td>
						<td>Jam Kerja</td>
						<td>Luas Rumah</td>
						<td>Jml Kel</td>
						<td>Gaji</td> 
						<td>Aksi</td>
					</tr>
	
				<?php
					foreach ($data as $cari){
				?>
				   <tr>	<td><?php echo $cari->keterampilan; ?></td>
						<td><?php echo $cari->hari_kerja;?></td>
						<td><?php echo $cari->jam_kerja; ?></td>
						<td><?php echo $cari->luas_rumah; ?></td>
						<td><?php echo $cari->anggota_kel; ?></td>
						<td><?php echo $cari->gaji; ?></td>
						</tr>
				<?php } ?>
				</table>
			</div>
		</div>
<?php include 'footer.php'; ?>