<?php
$aksi="modul/mod_kelas/aksi_kelas.php";
switch ($_GET[act]) {
	// Tampil Kelas
	default:
	echo "<h2>Kelas</h2>
<input type=button class='btn btn-primary' value='Tambah Kelas' onclick=\"window.location.href='?module=kelas&act=tambahkelas';\">
 
<table id='sample-table-2' class='table table-striped table-bordered table-hover'><thead>
<tr>
	<th>No.</th>
	<th>Kode Kelas</th>
	<th>Nama Kelas</th>
	<th>Ruang</th>
	<th>Aksi</th>
</tr></thead>";

$tampil=mysql_query("SELECT * FROM kelas ORDER BY kdkelas");
$no=1;
while($r=mysql_fetch_array($tampil)) {
	echo "<tr><td>$no</td>
			<td>$r[kdkelas]</td>
			<td>$r[nmkelas]</td>
			<td>$r[ruang]</td>
			<td><a href=?module=kelas&act=editkelas&id=$r[kdkelas]>Edit</a> | 
			<a href=$aksi?module=kelas&act=hapus&id=$r[kdkelas]>Hapus</a></td>
			</tr>";
$no++;
}
echo "</table>";
break;
case "tambahkelas":
echo "<h2>Tambah Kelas</h2>
<form method=POST action='$aksi?module=kelas&act=input'>
<table>
	<tr>
		<td>Kode Kelas</td>
		<td> : <input type=text name='kdkelas' size=15 maxlength=15></td>
	</tr>
	<tr>
		<td>Nama Kelas</td>
		<td> : <input type=text name='nmkelas' size=35 maxlength=35></td>
	</tr>
	<tr>
		<td>Ruang</td>
		<td> : <input type=text name='ruang' size=5 maxlength=5></td>
	</tr>
	<tr>
		<td colspan=2><input type=submit class='btn btn-primary' value=Simpan>
		<input class='btn btn-primary' type=button value=Batal onclick=self.history.back()></td>
	</tr>
</table>
</form>";
break;

case "editkelas":
$edit=mysql_query("SELECT * FROM kelas WHERE kdkelas='$_GET[id]'");
$r=mysql_fetch_array($edit);

echo "<h2>Edit Kelas</h2>
<form method=POST action='$aksi?module=kelas&act=update'>
<input type=hidden name=id value='$r[kdkelas]'>
<table>
<tr>
	<td>Kode Kelas</td>
	<td> : <input type=text name=kdkelas value='$r[kdkelas]' size=5 maxlength=15></td>
</tr>
<tr>	
	<td>Nama Kelas</td>
	<td> : <input type=text name=nmkelas value='$r[nmkelas]' size=35 maxlength=35></td>
</tr>
<tr>
	<td>Ruang</td>
	<td> : <input type=text name=ruang value='$r[ruang]' size=5 maxlength=5></td>
</tr>
<tr>
	<td colspan=2><input type=submit class='btn btn-primary' value=Simpan>
	<input type=button class='btn btn-primary' value=Batal onclick=self.history.back()>
</tr>
</table>
</form>";
break;
}
?>