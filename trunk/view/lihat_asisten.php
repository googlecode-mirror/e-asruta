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
				<table border="2" align="left" class="table table-striped">
					<tr>
						<td>Keterampilan</td>
						<td>Gaji</td>
						<td>Hari Kerja</td>
						<td>Jam Kerja</td>
						<td>HAri Kerja</td>
						<td>Menginap Tidak?</td> 
						<td>Aksi</td>
					</tr>
	
				<?php
					if($data!=NULL){
						foreach ($data as $cari){
				?>				
				   <tr>	<td><?php echo $cari->kd_keahlian; ?></td>
						<td><?php echo $cari->gaji;?></td>
						<td><?php echo $cari->lokasi; ?></td>
						<td><?php echo $cari->jam_kerja; ?></td>
						<td><?php echo $cari->hari_kerja; ?></td>
						<td><?php echo $cari->menginap; ?></td>
						<td><?php echo '<a href="ubah_asisten.php?id='.$cari->kd_lowongan.'" class="icon-pencil"></a>' ; ?> | <?php echo '<a href="tanya_hapus.php?id='.$cari->kd_lowongan.'" class="icon-trash"></a>';?></td>
						</tr>
						
				<?php 	}
					} ?>
				</table>
				<td><?php echo '<a href="form_cariasisten.php?id='.$cari->kd_lowongan.'" class="btn btn-primary">Rekam Baru</a>' ; ?></td>
			</div>
		</div>
<?php include 'footer.php'; ?>