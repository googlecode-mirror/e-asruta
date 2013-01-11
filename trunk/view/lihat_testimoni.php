<?php
include_once 'header.php';
include_once 'sidebar.php';

include '../lib/testimoni.php';

$testi=new Testimoni();
$currentPage = 1;
if (isset($_GET['page'])) {
$currentPage = $_GET['page'];
}
$pageSize = 2;
$total = $testi->hitungTestimoni();
$totalHalaman = ceil($total / $pageSize);
$mulai=($currentPage - 1) * $pageSize;
?>

		<div id="contenttext">
			<div class="bodytext" style="padding:12px;" align="justify">
			<h4>Testimoni</h4>
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

					</select><?php echo "dari $totalHalaman Halaman"; ?>
					
				<table border="2" align="left" class="table table-striped">
					<tr>
						<td>Member</td>
						<td>Testimoni</td>
					</tr>
	
				<?php
					$data=$testi->lihatTesti($mulai,$pageSize);
					if($data!=NULL){
						foreach ($data as $testimoni){
				?>				
				   <tr>	<td><?php echo $testimoni->kd_member; ?></td>
						<td><?php echo $testimoni->isi_testi; ?></td>
						</tr>
						
				<?php 	}
					} ?>
				</table>
					
			</div>
			<td><?php echo '<a href="form_rekamtestimoni.php?id='.$testimoni->kd_testi.'" class="btn btn-primary">Isi Testimoni</a>' ; ?></td>
		</div>
<?php include 'footer.php'; ?>