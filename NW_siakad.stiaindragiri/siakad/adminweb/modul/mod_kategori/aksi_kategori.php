<?php
session_start();
include "../../../config/koneksi.php";
$module=$_GET[module];
$act=$_GET[act];

// Hapus Kategori
if ($module=='kategori' AND $act=='hapus') {
	mysql_query("DELETE FROM kategori WHERE id_kategori='$_GET[id]'");
	header('location:../../../adminweb/index.php?module='.$module);
}

// Input Kategori
elseif ($module=='kategori' AND $act=='input') {
	mysql_query("INSERT INTO kategori(nama_kategori) VALUES ('$_POST[nama_kategori]')");
	header('location:../../../adminweb/index.php?module='.$module);
}

// Update Kategori
elseif ($module=='kategori' AND $act=='update') {
	mysql_query("UPDATE kategori SET nama_kategori = '$_POST[nama_kategori]' WHERE id_kategori='$_POST[id]'");
	header('location:../../../adminweb/index.php?module='.$module);
}
?>