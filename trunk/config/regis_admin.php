<!--/**
 * @author rizky
 * @copyright 2012
 */-->
 <?php
include 'waktu.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="author" content="Wink Hosting (www.winkhosting.com)" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="../view/bootstrap/css/bootstrap.css" type="text/css" />
	<title>regis_admin</title>
<form action="submit_admin.php" method="post">
<table border="0">
<tbody>
<tr>
<td>Masukkan Username</td>
<td>
<input name="username" type="text" /></td>
</tr>
<tr>
<tr>
<td>Masukkan Password</td>
<td>
<input name="password" type="password" /></td>
</tr>
<tr>
<td>Ulangi Password</td>
<td>
<input name="pass2" type="password" /></td>
</tr>
<tr>
<td></td>
<td>
<input name="Submit" type="submit" value="Submit" /></td>
</tr>
</tbody></table>
</form>