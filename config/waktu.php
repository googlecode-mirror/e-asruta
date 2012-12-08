<?php
$times=getdate();
$hari = $times['weekday'];
	
	//Mengganti nama hari dalam bahasa Indonesia
	switch($hari){
		case "Monday":
			$hari = "Senin";
			break;
		case "Tuesday":
			$hari = "Selasa";
			break;
		case "Wednesday":
			$hari = "Rabu";
			break;
		case "Thursday":
			$hari = "Kamis";
			break;
		case "Friday":
			$hari = "Jum'at";
			break;
		case "Saturday":
			$hari = "Sabtu";
			break;
		default:
			$hari = "Minggu";
			break;
		}

	//Mengganti nama bulan dalam bahasa Indonesia
	$bulan = $times['mon'];
	switch($bulan){
		case 1:
			$bulan = "Januari";
			break;
		case 2:
			$bulan = "Februari";
			break;
		case 3:
			$bulan = "Maret";
			break;
		case 4:
			$bulan = "April";
			break;
		case 5:
			$bulan = "Mei";
			break;
		case 6:
			$bulan = "Juni";
			break;
		case 7:
			$bulan = "Juli";
			break;
		case 8:
			$bulan = "Agustus";
			break;
		case 9:
			$bulan = "September";
			break;
		case 10:
			$bulan = "Oktober";
			break;
		case 11:
			$bulan = "November";
			break;
		case 12:
			$bulan = "Desember";
			break;
		default:
			break;
	}
	
	$waktunya=$hari.", ".$times['mday']." ".$bulan." ".$times['year'];