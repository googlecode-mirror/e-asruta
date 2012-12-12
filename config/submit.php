<?php
$username  = $_POST['username'];
$password1 = $_POST['pass1'];
$password2 = $_POST['pass2'];
$email = $_POST['email'];

// cek kesamaan password
if ($password1 == $password2)
{
	mysql_connect("namahost", "dbuser", "dbpass");
	mysql_select_db("dbname");

	// perlu dibuat sebarang pengacak
	$pengacak  = "NDJS3289JSKS190JISJI";

	// mengenkripsi password dengan md5() dan pengacak
	$password1 = md5($pengacak . md5($password1) . $pengacak);

	// menyimpan username dan password terenkripsi ke database
	$query = "INSERT INTO user VALUES('$username', '$password1', '$email')";
	$hasil = mysql_query($query);

	// menampilkan status pendaftaran
	if ($hasil) echo "User sudah berhasil terdaftar";
	else echo "Username sudah ada yang memiliki";

}
else echo "Password yang dimasukkan tidak sama";

?>