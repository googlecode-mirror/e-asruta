<?php
include_once 'header.php';
include_once 'sidebar_birojasa.php';
include '../lib/carimajikan_dao.php';
include '../lib/Lowongan.php';

$lihat = new CariMajikan_Dao();
$currentPage = 1;
if (isset($_GET['page'])) {
$currentPage = $_GET['page'];
}
$pageSize = 2;
$total = $lihat->hitungHalaman();
$totalHalaman = ceil($total / $pageSize);
$mulai=($currentPage - 1) * $pageSize;
?>
		<div id="contenttext">
			<div class="bodytext" style="padding:12px;" align="justify">
				 <form method="get">
					Halaman :
					<select name="page" with="5" onchange="this.form.submit();">
					<?php for ($i = 1; $i <= $totalHalaman; $i++) {?>
						<option value="<?php echo $i; ?>"
						<?php if ($i == $currentPage) {echo 'selected="selected"';}?>
						>
						<?php echo $i; ?>
						</option>
							<?php	} ?>

					</select> <?php echo "dari $totalHalaman Halaman"; ?>
					
				<table border="2" align="left" class="table table-striped">
					<tr>
						<td>Pembuat Lowongan</td>
						<td>Jenis Lowongan</td>
						<td>Keahlian</td>
						<td>Hari Kerja</td>
						<td>Jam Kerja</td>
						<td>Menginap Tidak?</td> 
						<td>Lokasi</td>
						<td>Gaji</td>
						<td>Aksi</td>
					</tr>
	
				<?php
					$data = $lihat->daftar_lo($mulai,$pageSize); 
					if($data!=NULL){
						foreach ($data as $cari){
				?>				
				   <tr>	<td><?php echo $cari->nm_member; ?></td>
						<td><?php echo $cari->jenis_lowongan;?></td>
						<td><?php echo $cari->jns_keahlian; ?></td>
						<td><?php echo $cari->hari_kerja; ?></td>
						<td><?php echo $cari->jam_kerja; ?></td>
						<td><?php echo $cari->menginap; ?></td>
						<td><?php echo $cari->lokasi; ?></td>
						<td><?php echo $cari->gaji; ?></td>
						<td><?php echo '<a href="lamar_lowongan.php?id='.$cari->kd_lowongan.'" class="icon-pencil"></a>' ; ?> </td>
						</tr>
						
				<?php 	}
					} ?>
				</table>
			</div>
				<a href="lamar_masuk.php" title="Lowongan">Lihat Status Lamaran</a>
		</div>
		
<?php include 'footer.php'; ?>