<?php
include_once 'header.php';
include_once 'sidebar_birojasa.php';
include '../lib/carimajikan_dao.php';
include '../lib/Lowongan.php';

$kd_member = $_SESSION['kduser'];
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
						<td>Nama Asisten</td>
						<td>Status Lowongan</td>
					</tr>
	
				<?php
					$data = $lihat->cari_khusus($kd_member); 
					if($data!=NULL){
						foreach ($data as $cari){
				?>				
				   <tr>	<td><?php echo $cari->nm_member; ?></td>
						<td><?php echo $cari->nm_asisten;?></td>
						<td><?php echo $cari->ket_status; ?></td>
						<td><?php echo '<a href="action.hapuslamar.php?id='.$cari->kd_lowongan.'&'.$cari->kd_asisten.'" class="icon-trash"></a>';?> </td>
						</tr>
						
				<?php 	}
					} ?>
				</table>
				
			</div>
		</div>
<?php include 'footer.php'; ?>