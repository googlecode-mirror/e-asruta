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
$total = $pencarian->hitungPencariKerja();
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
						<td>Asisten dan Biro</td>
						<td>Kontak</td>
						<td>Lokasi</td>
						<td>Jam dan Hari Kerja</td>
						<td>Gaji</td>
						<td>Menginap</td> 
					</tr>
	
				<?php
					$data = $pencarian->lihatPencariKerja($mulai,$pageSize);
//					echo $_SESSION['kduser'];
//					echo $pageSize; 
					if($data!=NULL){
						foreach ($data as $cari){
				?>				
				   <tr>	<td><?php echo $cari->nm_asisten."<br>".$cari->nama_biro;?></td>
						<td><?php echo $cari->hape;?></td>
						<td><?php echo $cari->lokasi; ?></td>
						<td><?php echo $cari->jam_kerja."<br>".$cari->jam_kerja; ?></td>
						<td><?php echo $cari->gaji; ?></td>
						<td><?php echo $cari->menginap; ?></td>
						</tr>
						
				<?php 	}
					} ?>
				</table>
			</div>
		</div>
<?php include 'footer.php'; ?>