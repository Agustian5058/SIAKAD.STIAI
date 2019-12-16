<?php
$aksi="modul/mod_modul/aksi_modul.php";
switch($_GET[act]) {
// Tampil Modul
default:
echo "<h2>Modul</h2>
<input type=button class='btn btn-primary' value='Tambah Modul' onclick=\"window.location.href='?module=modul&act=tambahmodul';\">
<table id='sample-table-2' class='table table-striped table-bordered table-hover'><thead>
<tr><th>No.</th><th>Nama Modul</th><th>Link</th><th>Publish</th><th>Aktif</th><th>Status</th><th>Aksi</th></tr></thead>";
$tampil=mysql_query("SELECT * FROM modul ORDER BY urutan");
while($r=mysql_fetch_array($tampil)) {	
	echo "<tr><td>$r[urutan]</td>
			<td>$r[nama_modul]</td>
			<td><a href=$r[link]>$r[link]</a></td>
			<td align=center>$r[publish]</td>
			<td align=center>$r[aktif]</td>
			<td>$r[status]</td>
			<td><a href=?module=modul&act=editmodul&id=$r[id_modul]>Edit</a> | 
			<a href=$aksi?module=modul&act=hapus&id=$r[id_modul]>Hapus</a></td>
			</tr></thead>";
}

echo "</table>";
break;
case "tambahmodul":
echo "<h2>Tambah Modul</h2>
<form method=POST action='$aksi?module=modul&act=input'>
<table id='sample-table-2' class='table table-striped table-bordered table-hover'>
	<tr><td>Nama Modul</td><td> : <input type=text name='nama_modul'></td></tr>
	<tr><td>Link</td><td> : <input type=text name='link' size=30></td></tr>
	<tr><td>Publish</td><td> : <input type=radio name='publish' value='Y' checked><span class='lbl'>Y
	<input type=radio name='publish' value='N'><span class='lbl'>N</td></tr>
	<tr><td>Aktif</td><td> : <input type=radio name='aktif' value='Y' checked><span class='lbl'>Y
	<input type=radio name='aktif' value='N'><span class='lbl'>N </td></tr>
	<tr><td>Status</td><td> : <input type=radio name='status' value='user' checked><span class='lbl'>user
	<input type=radio name='status' value='admin'><span class='lbl'>admin</td></tr>
	<tr><td colspan=2><input type=submit class='btn btn-primary' value=Simpan> <input type=button class='btn btn-primary' value=Batal onclick=self.history.back()></td></tr>
	</table></form>";
break;

case "editmodul":
$edit=mysql_query("SELECT * FROM modul WHERE id_modul='$_GET[id]'");
$r=mysql_fetch_array($edit);

echo "<h2>Edit Modul</h2>
	<form method=POST action='$aksi?module=modul&act=update'>
	<input type=hidden name=id value='$r[id_modul]'>
	<table>
		<tr>
			<td>Nama Modul</td>
			<td> : <input type=text name='nama_modul' value='$r[nama_modul]'></td>
		</tr>
		<tr>
			<td>Link</td>
			<td> : <input type=text name='link' size=30 value='$r[link]'></td>
		</tr>";
		
		if ($r[publish]=='Y') {
			echo "<tr><td>Publish</td><td> :
				<input type=radio name='publish' value='Y' checked><span class='lbl'>Y
				<input type=radio name='publish' value='N'><span class='lbl'>N
				</td></tr>";
		}
		else {
			echo "<tr><td>Publish</td><td> :
				<input type=radio name='publish' value='Y'><span class='lbl'>Y
				<input type=radio name='publish' value='N' checked><span class='lbl'>N
				</td></tr>";
		}
		
		if ($r[aktif]=='Y') {
			echo "<tr><td>Aktif</td><td> :
				<input type=radio name='aktif' value='Y' checked><span class='lbl'>Y
				<input type=radio name='aktif' value='N'><span class='lbl'>N
				</td></tr>";
		}
		else {
			echo "<tr><td>Aktif</td><td> :
				<input type=radio name='aktif' value='Y'><span class='lbl'>Y
				<input type=radio name='aktif' value='N' checked><span class='lbl'>N
				</td></tr>";
		}
		
		if ($r[status]=='user') {
			echo "<tr><td>Status</td><td> :
				<input type=radio name='status' value='user' checked><span class='lbl'>user
				<input type=radio name='status' value='admin'><span class='lbl'>admin
				</td></tr>";
		}
		else {
			echo "<tr><td>Satus</td><td> :
				<input type=radio name='status' value='user'><span class='lbl'>user
				<input type=radio name='status' value='admin' checked><span class='lbl'>admin
				</td></tr>";
		}
		
		echo "<tr><td>Urutan</td><td> : 
			<input type=text name='urutan' size=1 value='$r[urutan]'></td></tr>
			<tr>
				<td colspan=2><input type=submit class='btn btn-primary' value=Update> <input class='btn btn-primary' type=button value=Batal onclick=self.history.back()></td>
			</tr>
		</table>
	</form>";
break;
}
?>