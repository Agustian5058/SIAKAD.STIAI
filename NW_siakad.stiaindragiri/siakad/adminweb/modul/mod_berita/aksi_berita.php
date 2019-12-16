<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/library.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus Berita
if ($module=='berita' AND $act=='hapus') {
	mysql_query ("DELETE FROM berita WHERE id_berita='$_GET[id]'");
	header('location:../../../adminweb/index.php?module='.$module);
}

// Input Berita
elseif ($module=='berita' AND $act=='input') {

$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file = $_FILES['fupload']['name'];

if (!empty($lokasi_file)) {
	//echo "test";
	move_uploaded_file($lokasi_file,"../../foto_berita/$nama_file");
	mysql_query("INSERT INTO berita(judul,
					id_kategori,
					isi_berita,
					id_user,
					jam,
					tanggal,
					hari,
					gambar)
				VALUES('$_POST[judul]',
					'$_POST[kategori]',
					'$_POST[isi_berita]',
					'$_SESSION[namauser]',
					'$jam_sekarang',
					'$tgl_sekarang',
					'$hari_ini',
					'$nama_file')");
}
else
{
	mysql_query("INSERT INTO berita(judul,
					id_kategori,
					isi_berita,
					id_user,
					jam,
					tanggal,
					hari)
				VALUES('$_POST[judul]',
					'$_POST[kategori]',
					'$_POST[isi_berita]',
					'$_SESSION[namauser]',
					'$jam_sekarang',
					'$tgl_sekarang',
					'$hari_ini')");
}

header ('location:../../../adminweb/index.php?module='.$module);
}
// Update Berita
elseif ($module=='berita' AND $act=='update') {
	$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file = $_FILES['fupload']['name'];

//Apabila Gambar Tidak diganti
if (empty($lokasi_file)) 
{
	mysql_query("UPDATE berita SET judul='$_POST[judul]',
					id_kategori='$_POST[kategori]',
					isi_berita='$_POST[isi_berita]'
					WHERE id_berita='$_POST[id]'");
}
else
{
	move_uploaded_file($lokasi_file,"../../foto_berita/$nama_file");
	mysql_query("UPDATE berita SET judul='$_POST[judul]',
				id_kategori='$_POST[kategori]',
				isi_berita='$_POST[isi_berita]',
				gambar='$nama_file'
				WHERE id_berita='$_POST[id]'");
}
header ('location:../../../adminweb/index.php?module='.$module);
}
?>
