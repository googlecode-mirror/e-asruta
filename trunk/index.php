<?php
include 'config/waktu.php';
?>

<!DOCTYPE html PUB
LIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="author" content="Wink Hosting (www.winkhosting.com)" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="view/css/style.css" type="text/css" />
	<title>Form Pencarian Asisten Rumah Tangga</title>
</head>
<body>
	<div id="page" align="center">
		<div id="toppage" align="center">
			<div id="date">
				<div class="smalltext" style="padding:13px;"><strong><?php echo $waktunya; ?></strong></div>
			</div>
			<div id="topbar">
				<div align="right" style="padding:12px;" class="smallwhitetext"><a href="#">Home</a> | <a href="#">Sitemap</a> | <a href="#">Contact Us</a></div>
			</div>
		</div>
		<div id="header" align="center">
			<div class="titletext" id="logo">
				<div class="logotext" style="margin:30px">e_As<span class="orangelogotext">ru</span>ta</div> 
			</div>
			<div id="pagetitle">
				<div id="title" class="titletext" align="right">Website e-Asruta</div>
			</div>
		</div>
		<div id="content" align="left">
			<div id="menu" align="right">
				<div align="left" style="width:189px; height:8px;"><img src="images/mnu_topshadow.gif" width="189" height="8" alt="mnutopshadow" /></div>
				
				<div align="right" style="width:189px; height:8px;"><img src="images/mnu_bottomshadow.gif" width="189" height="8" alt="mnubottomshadow" /></div>
			</div>
		<div id="contenttext">
			<div class="bodytext" style="padding:12px;" align="justify">
				<form method="post" action="view/action.login.php">
				<table>
					<tr>
						<td>Username</td><td><input name="username" type="text" /></td> 
					</tr>
					<tr>
						<td>Password</td><td><input name="password" type="password" /></td> 
					</tr>
					<tr>
						<td></td><td><input name="submit" type="submit" value="Login"/></td> 
					</tr>
				</table>
			</form>
			</div>
			
		</div>
		<div id="footer" class="smallgraytext" align="center">
			<a href="#">Beranda</a> | <a href="#">Daftar Lowongan Pekerjaan</a> | <a href="#">Pencarian Asisten Pribadi</a> | <a href="#">Testimoni</a> 
			<br>e_Asruta &copy; 2012<br />
		</div>
	</div>
</body>
</html>