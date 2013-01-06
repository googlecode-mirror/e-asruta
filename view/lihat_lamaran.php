<?php
include_once 'header.php';
include_once 'sidebar.php';
include '../lib/cariasisten_dao.php';
$pencarian=new CariAsisten_Dao();
?>
		<div id="contenttext">
			<div class="bodytext" style="padding:12px;" align="justify">	
				<h4>Daftar Pelamar Kerja</h4>
				<table border="2" align="left" class="table table-striped">
					<tr>
						<td>Asisten dan Biro</td>
						<td>Kontak</td>
						<td>Aksi</td>
				<?php
					$data = $pencarian->tampilkanLamaran($_GET['id']);
//					echo $_SESSION['kduser'];
//					echo $pageSize; 
					if($data!=NULL){
						foreach ($data as $cari){
				?>				
				   <tr>	<td><?php echo $cari->nm_asisten."<br>".$cari->nama_biro;?></td>
						<td><?php echo $cari->hape;?></td>
						</tr>
						
				<?php 	}
					} ?>
				</table>
			</div>
		</div>
<?php include 'footer.php'; ?>