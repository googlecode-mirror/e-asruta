<?php
include_once 'header.php';
include_once 'sidebar.php';
include '../config/waktu.php';
?>

		<div id="contenttext">
			<div class="bodytext" style="padding:12px;" align="justify">
				<form method="post" action="action.cariasisten.php">
				<table>
					<tr>
						<td>Isi Testimoni</td><td><input name="testimoni" type="textarea" /></td> 
					</tr>
					<tr>
						<td></td>
						<td><div align="right">
						  <input name="Submit" type="submit" value="Simpan" class="btn btn-primary" align="right"/>
					    </div></td>
					</tr>
				</table>
			</form>
			</div>
		</div>	
<?php include 'footer.php'; ?>