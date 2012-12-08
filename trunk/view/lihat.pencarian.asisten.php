<?php
session_start();
echo $_SESSION['kduser'];
/*
$pencarian=new CariAsisten_Dao();
$pencarian->tampilSemuaCari($_SESSION['kduser']);
$data=$pencarian->list_cari;
if($data!=null) {
	foreach($data as $list_cari) {
		echo $cari->id." ".$cari->keterampilan." ".$cari->gaji." ".$cari->jam_kerja;
	}
}
*/