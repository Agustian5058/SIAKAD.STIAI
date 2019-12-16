<?php
$aksi="modul/mod_kategori/aksi_kategori.php";
switch($_GET[act]) {
// Tampil Kategori
default:
echo "<h2>Kategori</h2>
<input type=button class='btn btn-primary' value='Tambah Kategori' onclick=\"window.location.href='?module=kategori&act=tambahkategori';\">
<table id='sample-table-2' class='table table-striped table-bordered table-hover'><thead>
<tr><th>No.</th><th>Nama Kategori</th><th>Aksi</th></tr></thead>";
$tampil=mysql_query("SELECT * FROM kategori ORDER BY id_kategori");

$no=1;
while($r=mysql_fetch_array($tampil)) {
	echo "<tr><td>$no</td>
		<td>$r[nama_kategori]</td>
		<td><a href=?module=kategori&act=editkategori&id=$r[id_kategori]>Edit</a> |
		<a href=$aksi?module=kategori&act=hapus&id=$r[id_kategori]>Hapus</a></td>
		</tr>";
		$no++;
}
echo "</table>";
break;

// Form Tambah Kategori
case "tambahkategori":
echo "<h2>Tambah Kategori</h2>
<form method=POST action='$aksi?module=kategori&act=input'>
<table>
<tr><td>Nama Kategori</td>
<td> : <input type=text name='nama_kategori'></td></tr>
<tr><td colspan=2><input type=submit class='btn btn-primary' value=Simpan>
<input type=button class='btn btn-primary' value=Batal onclick=self.history.back()></td></tr>
</table>
</form>";
break;

// Form Edit Kategori
case "editkategori":
$edit=mysql_query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
$r=mysql_fetch_array($edit);

echo "<h2>Edit Kategori</h2>
<form method=POST action=$aksi?module=kategori&act=update>
<input type=hidden name=id value='$r[id_kategori]'>
<table>
<tr><td>Nama Kategori</td><td> :
<input type=text name=nama_kategori value='$r[nama_kategori]'></td></tr>
<tr><td colspan=2><input type=submit class='btn btn-primary' value=Update> <input type=button class='btn btn-primary' value=Batal onclick=self.history.back()></td></tr>
</table>
</form>";
break;
}
?>