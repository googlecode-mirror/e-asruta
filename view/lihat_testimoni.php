<?php
include_once 'header.php';
include_once 'sidebar.php';
include '../lib/testimoni_dao.php';
include '../lib/testimoni.php';

$testi=new Testimoni_Dao();
$data=$testi->lihatTesti();
?>
		<div id="contenttext">
			<div class="bodytext" style="padding:12px;" align="justify">
				<table border="2" align="left" class="table table-striped">
					<tr>
						<td>Member</td>
						<td>Testimoni</td>
					</tr>
	
				<?php
					if($data!=NULL){
						foreach ($data as $testimoni){
				?>				
				   <tr>	<td><?php echo $testimoni->kd_member; ?></td>
						<td><?php echo $testimoni->isi_testi; ?></td>
						</tr>
						
				<?php 	}
					} ?>
				</table>
					<td><?php echo '<a href="rekam_testimoni.php?id='.$testimoni->kd_testi.'" class="btn btn-primary">Isi Testimoni</a>' ; ?></td>
			</div>
		</div>
<?php include 'footer.php'; ?>