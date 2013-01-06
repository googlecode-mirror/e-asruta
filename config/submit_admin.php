<!--/**
 * @author rizky
 * @copyright 2012
 */-->
<head>
<meta http-equiv="refresh" content="5; URL=http://localhost/asru/">
</head>

<?php
$username  = $_POST['username'];
$password1 = $_POST['password'];
$password2 = $_POST['pass2'];



// cek kesamaan password


elseif ($password1 == $password2)
{
	mysql_connect("localhost", "root", "");
	mysql_select_db("e_asruta");

	
	// menyimpan username dan password terenkripsi ke database
	$query = "INSERT INTO users VALUES(' ','1','$username', '$password1')";
	$hasil = mysql_query($query);

	// menampilkan status pendaftaran
	if ($hasil) echo "User sudah berhasil terdaftar"
	;
	else echo "Username sudah ada yang memiliki";

}
else echo "Password yang dimasukkan tidak sama";

?>
