<?php
include_once 'header.php';
include_once 'sidebar.php';
include '../lib/cariasisten_dao.php';

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
				<h4>Daftar Pencarian Asisten Pribadi</h4>
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
						<td>Kode Lown dan Ket</td>
						<td>Gaji</td>
						<td>Lokasi</td>
						<td>Jam & Hari Krj</td>
						<td>Menginap</td> 
						<td>Asisten</td>
						<td>Status</td>
						<td>Aksi</td>
					</tr>
	
				<?php
					$data = $pencarian->tampilSemuaCari($_SESSION['kduser'],$mulai,$pageSize);
//					echo $_SESSION['kduser'];
//					echo $pageSize; 
					if($data!=NULL){
						foreach ($data as $cari){
				?>				
				   <tr>	<td><?php echo '<a href="lihat_lamaran.php?id='.$cari->kd_lowongan.'">'.$cari->kd_lowongan.'<br>'.$cari->jns_keahlian.'</a>';?></td>
						<td><?php echo $cari->gaji;?></td>
						<td><?php echo $cari->lokasi; ?></td>
						<td><?php echo $cari->jam_kerja."<br>".$cari->hari_kerja; ?></td>
						<td><?php echo $cari->menginap; ?></td>
						<td><?php echo $cari->nm_asisten; ?></td>
						<td><?php if($cari->kd_asisten==''){
							echo "Tersedia";
						}else{
							echo "Sudah Terisi";
						}
						?></td>
						<td><?php echo '<a href="form_ubahasisten.php?id='.$cari->kd_lowongan.'" class="icon-pencil"></a>' ; ?> <?php echo '<a href="tanya_hapus.php?id='.$cari->kd_lowongan.'" class="icon-trash"></a>';?></td>
						</tr>
						
				<?php 	}
					} ?>
				</table>
			</div>
			<td><?php echo '<a href="form_cariasisten.php?id='.$cari->kd_lowongan.'" class="btn btn-primary">Rekam Baru</a>' ; ?></td>
						</div>
		</div>
<?php include 'footer.php'; ?>