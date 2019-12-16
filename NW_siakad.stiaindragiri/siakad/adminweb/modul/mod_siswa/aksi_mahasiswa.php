<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/library.php";


$module=$_GET[module];
$act=$_GET[act];

// Hapus Mahasiswa
if ($module=='mahasiswa' AND $act=='hapus') {
mysql_query("DELETE FROM mahasiswa WHERE nim='$_GET[id]'");
header('location:../../../adminweb/index.php?module='.$module);

}
// Input Mahasiswa
if ($module=='mahasiswa' AND $act=='input') {
$pass=md5($_POST[password]);
$tglhr = sprintf("%02d%02d%02d",$_POST[tahun],$_POST[bulan],$_POST[tanggal]);
$lokasi_file = $_FILES['ffoto']['tmp_name'];
$nama_file = $_FILES['ffoto']['name'];

if (!empty($lokasi_file)) {
move_uploaded_file($lokasi_file,"../../foto_mahasiswa/$nama_file");
mysql_query("INSERT INTO mahasiswa(nim,password,nama,kdjur,angkatan,foto,tplhr,tglhr,jekel,agama,asalsekolah,thlulus)
			VALUES('$_POST[nim]',
					'$pass',
					'$_POST[nama]',
					'$_POST[kdjur]',
					'$_POST[angkatan]',
					'$nama_file',
					'$_POST[tplhr]',
					'$tglhr',
					'$_POST[jekel]',
					'$_POST[agama]',
					'$_POST[asalsekolah]',
					'$_POST[thlulus]')");
}
else {
	mysql_query("INSERT INTO mahasiswa(nim,password,nama,kdjur,angkatan,tplhr,tglhr,jekel,agama,asalsekolah,thlulus)
			VALUES('$_POST[nim]',
					'$pass',
					'$_POST[nama]',
					'$_POST[kdjur]',
					'$_POST[angkatan]',
					'$_POST[tplhr]',
					'$tglhr',
					'$_POST[jekel]',
					'$_POST[agama]',
					'$_POST[asalsekolah]',
					'$_POST[thlulus]')");
}

header('location:../../../adminweb/index.php?module='.$module);

}

// Update Mahasiswa
if ($module=='mahasiswa' AND $act=='update') {$tglhr = sprintf("%02d%02d%02d",$_POST[tahun],$_POST[bulan],$_POST[tanggal]);
$lokasi_file = $_FILES['ffoto']['tmp_name'];
$nama_file = $_FILES['ffoto']['name'];

if (empty($_POST[password])) {
	mysql_query("UPDATE mahasiswa SET nim='$_POST[nim]',
								nama='$_POST[nama]',
								kdjur='$_POST[kdjur]',
								angkatan='$_POST[angkatan]',
								tplhr='$_POST[tplhr]',
								tglhr='$tglhr',
								jekel='$_POST[jekel]',
								agama='$_POST[agama]',
								asalsekolah='$_POST[asalsekolah]',
								thlulus='$_POST[thlulus]'
					WHERE nim='$_POST[id]'");
}
else {
	$pass=md5($_POST[password]);
	mysql_query("UPDATE mahasiswa SET nim='$_POST[nim]',
								password='$pass',
								nama='$_POST[nama]',
								kdjur='$_POST[kdjur]',
								angkatan='$_POST[angkatan]',
								alamat='$_POST[alamat]',
								tplhr='$_POST[tplhr]',
								tglhr='$tglhr',
								jekel='$_POST[jekel]',
								agama='$_POST[agama]',
								notelp='$_POST[notelp]',
								asalsekolah='$_POST[asalsekolah]',
								thlulus='$_POST[thlulus]'
					WHERE nim='$_POST[id]'");
}

if (!empty($lokasi_file)) {
	move_uploaded_file($lokasi_file,"../../foto_mahasiswa/$nama_file");
	mysql_query("UPDATE mahasiswa SET foto='$nama_file' WHERE nim='$_POST[id]'");
}

header('location:../../../adminweb/index.php?module='.$module);

}

?>