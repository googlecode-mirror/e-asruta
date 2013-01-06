<?php
include 'config/waktu.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="author" content="Wink Hosting (www.winkhosting.com)" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="view/bootstrap/css/bootstrap.css" type="text/css" />
	<title>Form Pencarian Asisten Rumah Tangga</title>
</head>
<body>
	<div id="page" align="center">
		<div id="toppage" align="center">
			<div id="date">
				<div class="smalltext" style="padding:13px;"><strong><?php echo $waktunya; ?></strong></div>
			</div>
			<div id="topbar">
				<div align="right" style="padding:12px;" class="smallwhitetext"></div>
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
			</div>
		<div id="contenttext2">
		  <div class="bodytext" style="padding:12px;" align="justify">
				<form method="post" action="view/action.login.php">
				<table>
					<tr>
						<td width="49">Username</td>
						<td width="213"><input name="username" type="text" /></td> 
					</tr>
					<tr>
						<td>Password</td>
						<td>
						  
						  <div align="left">
						    <input name="password" type="password" />
					      </div></td></tr>
					<tr>
						<td></td>
						<td><div align="right"><span class="bodytext" style="padding:12px;">
						  <input name="submit" type="submit" value="Login"/>
						  
						  <div align="right">
						    <a href="config/pendaftaran.php"><h5>ingin mendaftar?</a>
					      </div>
						  <div align="right">
						    <a href="config/lupa_password.php"><h5>lupa password?</a>
					      </div>
						  </td></tr>
					    </span></div></td>
					</tr>
				</table>
				</form>
			</div>	
			</div>
			
		</div>
		
		</div>
		
			
</body>
</html>