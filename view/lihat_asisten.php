<?php
include_once 'header.php';
include_once 'sidebar.php';
include '../lib/cariasisten_dao.php';
include '../lib/lowongan.php';

$pencarian=new CariAsisten_Dao();
$currentPage = 1;
if (isset($_GET['page'])) {
$currentPage = $_GET['page'];
}
$pageSize = 2;
$total = $pencarian->hitungHalaman();
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
						<td>Keterampilan</td>
						<td>Gaji</td>
						<td>Lokasi</td>
						<td>Jam Kerja</td>
						<td>Hari Kerja</td>
						<td>Menginap Tidak?</td> 
						<td>Aksi</td>
					</tr>
	
				<?php
					$data = $pencarian->tampilSemuaCari($_SESSION['kduser'],$mulai,$pageSize);
//					echo $_SESSION['kduser'];
//					echo $pageSize; 
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
			</div>
						<td><?php echo '<a href="form_cariasisten.php?id='.$cari->kd_lowongan.'" class="btn btn-primary">Rekam Baru</a>' ; ?></td>
		</div>
<?php include 'footer.php'; ?>