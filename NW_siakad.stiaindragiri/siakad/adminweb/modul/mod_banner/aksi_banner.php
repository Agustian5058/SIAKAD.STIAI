<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/library.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus Banner
if ($module=='banner' AND $act=='hapus') {
	mysql_query ("DELETE FROM banner WHERE id_banner='$_GET[id]'");
	header('location:../../../adminweb/index.php?module='.$module);
}

// Input Banner
elseif ($module=='banner' AND $act=='input') {
	$lokasi_file=$_FILES['fupload']['tmp_name'];
	$nama_file = $_FILES['fupload']['name'];

if (!empty($lokasi_file)) {
	move_uploaded_file($lokasi_file,"../../foto_berita/$nama_file");
	mysql_query("INSERT INTO banner(judul,
					url,
					tgl_posting,
					gambar)
				VALUES('$_POST[judul]',
					'$_POST[link]',
					'$tgl_sekarang',
					'$nama_file')");
}
else
{
	mysql_query("INSERT INTO banner(judul,
					tgl_posting,
					url)
				VALUES('$_POST[judul]',
					'$tgl_sekarang',
					'$_POST[url]')");
}
	header('location:../../../adminweb/index.php?module='.$module);
}

// Update Banner
elseif ($module=='banner' AND $act=='update') {
	$lokasi_file = $_FILES['fupload']['tmp_name'];
	$nama_file = $_FILES['fupload']['name'];

//Apabila Gambar tidak diganti
if (empty($lokasi_file))
{
	mysql_query("UPDATE banner SET judul='$_POST[judul]',
			url = '$_POST[link]'
			WHERE id_banner='$_POST[id]'");
}
else
{
	move_uploaded_file($lokasi_file,"../../foto_berita/$nama_file");
	mysql_query("UPDATE banner SET judul = '$_POST[judul]',
					url = '$_POST[link]',
					gambar = '$nama_file'
					WHERE id_banner = '$_POST[id]'");
}

	header('location:../../../adminweb/index.php?module='.$module);
}

?>