<?php
include "../config/koneksi.php";
ini_set('display_errors', 1); ini_set('error_reporting', E_ERROR);
if ($_SESSION[leveluser]=='admin') {
	$sql = mysql_query("SELECT * FROM modul WHERE aktif='Y' order BY urutan");
}
else {
	$sql = mysql_query("SELECT * FROM modul WHERE status='user' and aktif='Y' order by urutan");
}

while ($m=mysql_fetch_array($sql)) {
	echo "<li><a href='$m[link]'><i class='icon-edit'></i> $m[nama_modul]</a></li>";
}
?>
	