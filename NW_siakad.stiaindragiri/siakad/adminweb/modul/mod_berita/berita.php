<?php
$aksi="modul/mod_berita/aksi_berita.php";
switch ($_GET[act]) {
// Tampil Berita
default:
echo "<h2>Berita</h2>
<input type=button value='Tambah Berita' class='btn btn-primary' onclick=\"window.location.href='?module=berita&act=tambahberita';\">
<table id='sample-table-2' class='table table-striped table-bordered table-hover'><thead>
<tr>
	<th>No.</th><th>Judul</th><th>Tgl. Posting</th><th>Aksi</th></tr></thead>";

$p= new Paging;
$batas=10;
$posisi=$p->cariposisi($batas);

if ($_SESSION[leveluser]=='admin') {
	$tampil=mysql_query("SELECT * FROM berita ORDER BY id_berita DESC limit $posisi,$batas");
}
else {
	$tampil=mysql_query("SELECT * FROM berita WHERE id_user='$_SESSION[namauser]' ORDER BY id_berita DESC limit $posisi,$batas");
}
$no=$posisi+1;

while ($r=mysql_fetch_array($tampil)) {
	$tgl_posting=tgl_indo($r[tanggal]);
	echo "<tr><td>$no</td>
		<td>$r[judul]</td>
		<td>$tgl_posting</td>
		<td><a href=?module=berita&act=editberita&id=$r[id_berita]>Edit</a> |
		<a href=$aksi?module=berita&act=hapus&id=$r[id_berita]>Hapus</a></td></tr>";
	$no++;
}

echo "</table>";
//$tampil2=mysql_query("SELECT * FROM berita WHERE id_user='admin' ORDER BY id_berita DESC");
if ($_SESSION[leveluser]=='admin') {
	$jmldata=mysql_num_rows(mysql_query("SELECT * FROM berita"));
}
else {
	$jmldata=mysql_num_rows(mysql_query("SELECT * FROM berita WHERE id_user='$_SESSION[namauser]'"));
}

	$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
	$linkHalaman= $p->navHalaman($_GET[halaman],$jmlhalaman);
	echo "<p><div id=paging>Hal : $linkHalaman</div><p>";
break;

case "tambahberita":
echo "<h2>Tambah Berita</h2>
<form method=POST action='$aksi?module=berita&act=input' enctype='multipart/form-data'>
<table>
	<tr>
		<td>Judul</td>
		<td> : <input type=text name=judul size=60></td>
	</tr>
	<tr>
		<td>Kategori</td>
		<td> : <select name=kategori>
			<option value=0 selected>-- Pilih Kategori --</option>";
			$tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
			while ($r=mysql_fetch_array($tampil)) {
				echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
			}
		      echo "</select></td></tr>
	<tr>
		<td>Isi Berita</td>
		<td> : <textarea name=isi_berita style='width: 1050px; height: 350px;' cols=80 rows=18></textarea></td>
	</tr>
	<tr>
		<td>Gambar</td>
		<td> : <input type=file  name='fupload' size=40></td>
	</tr>
	<tr>
		<td colspan=2><input type=submit class='btn btn-primary' value=Simpan>
				<input type=button class='btn btn-primary' value=Batal onclick=self.history.back()>
		</td>
	</tr>
</table>
</form>";
break;

case "editberita":
$edit=mysql_query("SELECT * FROM berita WHERE id_berita='$_GET[id]'");

$r=mysql_fetch_array($edit);

echo "<h2>Edit Berita</h2>
<form method=POST action=$aksi?module=berita&act=update enctype='multipart/form-data'>
	<input type=hidden name=id value=$r[id_berita]>
<table>
	<tr>
		<td>Judul</td>
		<td> : <input type=text name=judul size=60 value='$r[judul]'></td>
	</tr>
	<tr>
		<td>Kategori</td>
		<td> : <select name=kategori>";
		$tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
		while ($w=mysql_fetch_array($tampil)) 
		{
		if ($r[id_kategori]==$w[id_kategori]) {
			echo "<option value=$w[id_kategori] selected>
				$w[nama_kategori]</option>";
		}
		else
		{
			echo "<option value=$w[id_kategori]>$w[nama_kategori]</option>";
		}
		}
	echo "</select></td></tr>
	<tr>
		<td>isi Berita</td>
		<td> : <textarea name=isi_berita cols=80 rows=18>
		$r[isi_berita]</textarea></td>
	</tr>
	<tr>
		<td>Gambar</td>
		<td> : <img src='../adminweb/foto_berita/$r[gambar]'></td>
	</tr>
	<tr>
		<td>Ganti Gambar</td>
		<td> : <input type=file name=fupload size=40> *)</td>
	</tr>
	<tr>
		<td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td>
	</tr>
	<tr>
		<td colspan=2><input type=submit class='btn btn-primary' value=Update>
		<input type=button class='btn btn-primary' value=Batal onclick=self.history.back()></td>
	</tr>
</table>
</form>";
break;
}
?>

