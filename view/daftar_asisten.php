<?php
include_once 'header.php';
include_once 'sidebar_birojasa.php';
include '../lib/birojasa_dao.php';
include '../lib/birojasa.php';

$kd_member = $_SESSION['kduser'];

$daftar = new birojasa_dao();
$data = $daftar->daftar_asisten($kd_member);
?>
		<div id="contenttext">
			<div class="bodytext" style="padding:12px;" align="justify">
				<table border="2" align="left" class="table table-striped">
					<tr>
						<td>Nama Asisten</td>
						<td>Handphone</td>
						<td>Alamat</td>
						<td>Kota</td> 
						<td>Tempat Lahir</td>
						<td>Tanggal Lahir</td>
						<td>Aksi</td>
					</tr>
	
				<?php
					if($data!=NULL){
						foreach ($data as $list){
				?>				
				   <tr>	<td><?php echo $list->nm_asisten; ?></td>
						<td><?php echo $list->hapeasisten;?></td>
						<td><?php echo $list->alamat_asisten; ?></td>
						<td><?php echo $list->kota_asisten; ?></td>
						<td><?php echo $list->tmpt_lahirasisten; ?></td>
						<td><?php echo $list->tgl_lahirasisten; ?></td>
						<td><?php echo '<a href="form_editasisten.php?id='.$list->kd_asisten.'" class="icon-pencil"></a>' ; ?> | <?php echo '<a href="action.hapusdata.php?id='.$list->kd_asisten.'" class="icon-trash"></a>';?></td>
						</tr>
						
				<?php 	}
					} ?>
				</table>
				<td><?php echo '<a href="form_tambahasisten.php?id='.$kd_member.'" class="btn btn-primary">Rekam Baru</a>' ; ?></td>
			</div>
		</div>
<?php include 'footer.php'; ?>