<?php
include_once 'header.php';
include_once 'sidebar.php';
include '../lib/carimajikan_dao.php';
include '../lib/cari.majikan.php';


$lowongan = new CariMajikan_Dao();
$id= $_GET['id'];
$kd_lowongan=mysql_real_escape_string($id);

?>

<!DOCTYPE html> 
<html lang="en"> 
<head> 
	<meta charset="utf-8"> 
	<title>Twitter Bootstrap Version2.0 search form layout example</title> 
		<meta name="description" content="Twitter Bootstrap Version2.0 search form layout example from w3resource.com."> 
		<link href="twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
			</head>
				<body>
				<table border="2" align="center" class="table table-striped">
					<tr>
						<td>Pembuat Lowongan</td>
						<td>Jenis Lowongan</td>
						<td>Keahlian</td>
						<td>Hari Kerja</td>
						<td>Jam Kerja</td>
						<td>Menginap Tidak?</td> 
						<td>Lokasi</td>
						<td>Gaji</td>
					</tr>
					
					<?php
					$data = $lowongan->daftar_low($kd_lowongan);
//					echo $mulai;
//					echo $pageSize; 
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
						</tr>
						
				<?php 	}
					} ?>
			</table>
			
			<div class="control-group">  
            <label class="control-label" for="select01">Select list</label>  
            <div class="controls">  
              <select id="select01">  
                <?php 
				$data = $lowongan->cari_lamar();
				echo $data->$options;				
				?>
              </select>  
            </div>  
          </div>  
		</body>
</html>
            

<?php include 'footer.php'; ?>