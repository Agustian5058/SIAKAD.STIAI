<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/library.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus Dosen
if ($module=='dosen' AND $act=='hapus') {
	mysql_query("DELETE FROM dosen WHERE kode_dosen='$_GET[id]'");
	header('location:../../../administrator/index.php?module='.$module);
}

// Input Dosen
elseif ($module=='dosen' AND $act=='input') {
$pass=md5($_POST[password]);
$tglhr = sprintf("%02d%02d%02d",$_POST[tahun],$_POST[bulan],$_POST[tanggal]);
mysql_query("INSERT INTO dosen(kode_dosen,nama_dosen,password,
								alamat,jenis_kelamin,tempat_lahir,tanggal_lahir,pendidikan,
								jabatan,golongan,status_dosen,spesial_mengajar)
			VALUES('$_POST[kode_dosen]',
					'$_POST[nama]',
					'$pass',
					'$_POST[alamat]',
					'$_POST[jenis_kelamin]',
					'$_POST[tempat_lahir]',
					'$tglhr',
					'$_POST[pendidikan]',
					'$_POST[jabatan]',
					'$_POST[golongan]',
					'$_POST[status_dosen]',
					'$_POST[spesial_mengajar]')");
	header('location:../../../administrator/index.php?module='.$module);
}

// Update Dosen
elseif ($module=='dosen' AND $act=='update') {
$tglhr = sprintf("%02d%02d%02d",$_POST[tahun],$_POST[bulan],$_POST[tanggal]);
if (empty($_POST[password])) {
	mysql_query("UPDATE dosen SET nama_dosen='$_POST[nama]',
								alamat='$_POST[alamat]',
								jenis_kelamin='$_POST[jenis_kelamin]',
								tempat_lahir='$_POST[tempat_lahir]',
								tanggal_lahir='$tglhr',
								pendidikan='$_POST[pendidikan]',
								jabatan='$_POST[jabatan]',
								golongan='$_POST[golongan]',
								status_dosen='$_POST[status_dosen]',
								spesial_mengajar='$_POST[spesial_mengajar]'
					WHERE kode_dosen='$_POST[id]'");
}
else {
	$pass=md5($_POST[password]);
	mysql_query("UPDATE dosen SET kode_dosen='$_POST[kode_dosen]',
								nama_dosen='$_POST[nama]',
								password='$pass',
								alamat='$_POST[alamat]',
								jenis_kelamin='$_POST[jenis_kelamin]',
								tempat_lahir='$_POST[tempat_lahir]',
								tanggal_lahir='$tglhr',
								pendidikan='$_POST[pendidikan]',
								jabatan='$_POST[jabatan]',
								golongan='$_POST[golongan]',
								status_dosen='$_POST[status_dosen]',
								spesial_mengajar='$_POST[spesial_mengajar]'
					WHERE kode_dosen='$_POST[id]'");	
}
	header('location:../../../dosen/index.php?module='.$module);
}
?>