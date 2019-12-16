<?php
include "config/koneksi.php";

// Form Pencarian
echo "
			<form method=POST action='?module=hasilcari'>
				<input name=kata type=text size=23>
				<input type=submit class='btn btn-info btn-big' value=Cari>
			</form>
";
// Form Login
include "form_login.php";
echo "<hr color=#265180>";

//Berita Terpopuler
echo "<h3>Berita Populer</h3><ul>";
$populer=mysql_query("SELECT * FROM berita ORDER BY counter DESC LIMIT 10");
while($p=mysql_fetch_array($populer)){
	echo "<li><i class='icon-star blue'></i> <a href=?module=detailberita&id=$p[id_berita]>$p[judul]</a> ($p[counter])</li>";
}
echo "</ul>
<hr color=#265180><br />";

//Tampilkan Banner dalam bentuk Gambar

$banner=mysql_query("SELECT * FROM banner ORDER BY id_banner DESC");
while($b=mysql_fetch_array($banner)){
echo "<a href=$b[url]><img src='adminweb/foto_berita/$b[gambar]' border=0></a><br /><br />";
}
?>
