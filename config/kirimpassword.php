 <head>
<meta http-equiv="refresh" content="5; URL=http://localhost/asru/">
</head>
 <?php
/**
 * @author rizky
 * @copyright 2012
 */
mysql_connect("localhost", "root", "");
	mysql_select_db("e_asruta");

$username = $_POST['username'];

function randomPassword()
{
// function untuk membuat password random 6 digit karakter

$digit = 6;
$karakter = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789";

srand((double)microtime()*1000000);
$i = 0;
$pass = "";
while ($i <= $digit-1)
{
$num = rand() % 32;
$tmp = substr($karakter,$num,1);
$pass = $pass.$tmp;
$i++;
}
return $pass;
}

// membuat password baru secara random -> memanggil function randomPassword
$newPassword = randomPassword();


// mencari alamat email si user
 
$query = "SELECT email FROM members 
LEFT JOIN users USING (KD_USER) WHERE username = '$username'";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$alamatEmail = $data['email'];

// title atau subject email
$title  = "New Password";

// isi pesan email disertai password
$pesan  = "Username Anda : ".$username.". \nPassword Anda yang baru adalah ".$newPassword;

// header email berisi alamat pengirim
$header = "From: asruta";

// mengirim email
$kirimEmail = mail($alamatEmail, $title, $pesan, $header);

// cek status pengiriman email
if ($kirimEmail) {

    // update password baru ke database (jika pengiriman email sukses)
    $query = "UPDATE users SET password = '$newPassword' WHERE username = '$username'";
    $hasil = mysql_query($query);

    if ($hasil) echo "Password baru telah direset dan sudah dikirim ke email Anda";
    }
else echo "Pengiriman password baru ke email gagal";

?>
