<?php
include_once 'header.php';
include_once 'sidebar.php';
include '../lib/cariasisten_dao.php';
include '../lib/cari.asisten.php';

$id_asisten= $_GET['id'];
$id=mysql_real_escape_string($id_asisten);
$pencarian=new CariAsisten_Dao();
$data=$pencarian->tampilSemuaCari($_SESSION['kduser']);
?>
		<div id="contenttext">
			<div class="bodytext" style="padding:12px;" align="justify">
				Apakah anda yakin akan menghapus pencarian asisten ini? <br>
				<?php echo '<a href="action.hapusasisten.php?id='.$id.'" class="btn btn-primary">Ya</a>' ; ?>
				<?php echo '<a href="lihat_asisten.php" class="btn btn-primary">Tidak</a>' ; ?>
			</div>
		</div>
<?php include 'footer.php'; ?>