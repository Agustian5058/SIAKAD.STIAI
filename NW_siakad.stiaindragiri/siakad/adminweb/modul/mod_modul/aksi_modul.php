<?php
session_start();
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus Modul
if ($module=='modul' AND $act=='hapus') {
	mysql_query("DELETE FROM modul WHERE id_modul='$_GET[id]'");
	header('location:../../../adminweb/index.php?module='.$module);
}

// Input Modul
elseif ($module=='modul' AND $act=='input') {
	$u=mysql_query("SELECT urutan FROM modul ORDER by urutan DESC");
$d=mysql_fetch_array($u);
$urutan=$d[urutan]+1;

mysql_query("INSERT INTO modul (nama_modul,link,publish,aktif,status,urutan)
	VALUES ('$_POST[nama_modul]',
			'$_POST[link]',
			'$_POST[publish]',
			'$_POST[aktif]',
			'$_POST[status]',
			'$urutan')");
	header('location:../../../adminweb/index.php?module='.$module);
}

// Update Modul
elseif ($module=='modul' AND $act=='update') {
mysql_query("UPDATE modul SET nama_modul = '$_POST[nama_modul]',
								link     = '$_POST[link]',
								publish  = '$_POST[publish]',
								aktif    = '$_POST[aktif]',
								status   = '$_POST[status]',
								urutan   = '$_POST[urutan]'
			WHERE id_modul  = '$_POST[id]'");
header('location:../../../adminweb/index.php?module='.$module);
}
?>

