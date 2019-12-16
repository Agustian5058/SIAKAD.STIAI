<?php
$aksi="modul/mod_jurusan/aksi_jurusan.php";
switch ($_GET[act]) {
	// Tampil Jurusan
	default:
	echo "<h2>Prodi</h2>
<input type=button class='btn btn-primary' value='Tambah Prodi' onclick=\"window.location.href='?module=jurusan&act=tambahjurusan';\">
<table id='sample-table-2' class='table table-striped table-bordered table-hover'><thead>
<tr>
	<th>No.</th>
	<th>Kode Prodi</th>
	<th>Nama Prodi</th>
	<th>Nama Ketua</th>
	<th>Aksi</th>
</tr></thead>";

$p=new Paging;
$batas=10;
$posisi=$p->cariposisi($batas);

$tampil = mysql_query("SELECT * FROM jurusan ORDER BY kdjur");
$no=$posisi+1;
while ($r=mysql_fetch_array($tampil)){
	echo "<tr>
			<td>$no</td>
			<td>$r[kdjur]</td>
			<td>$r[nmjur]</td>
			<td>$r[nmketua]</td>
			<td><a href=?module=jurusan&act=editjurusan&id=$r[kdjur]>Edit</a> |
			<a href=$aksi?module=jurusan&act=hapus&id=$r[kdjur]>Hapus</a>
			</td>
		</tr>";
		$no++;
	}
	echo "</table>";
	$tampil2=mysql_query("select * from jurusan");
	$jmldata=mysql_num_rows($tampil2);

	$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
	$linkHalaman= $p->navHalaman($_GET[halaman],$jmlhalaman);
break;
case "tambahjurusan":
echo "<h2>Form Prodi</h2>
<form name=form1 method=POST action='$aksi?module=jurusan&act=input'>
<table>
	<tr>
		<td>Kode Prodi</td>
		<td> : <input type=text name=kdjur size=15 maxlength=15></td>
	</tr>
	<tr>
		<td>Nama Prodi</td>
		<td> : <input type=text name=nmjur size=35 maxlength=50></td>
	</tr>
	<tr>
		<td>NIP Ketua</td>
		<td> : <input type=text name=nipketua size=15 maxlength=15></td>
	</tr>
	<tr>
		<td>Nama Ketua</td>
		<td> : <input type=text name=nmketua size=35 maxlength=100></td>
	</tr>
	<tr>
		<td colspan=2><input type=submit class='btn btn-primary' value=Simpan>
		<input type=button class='btn btn-primary' value=Batal onclick=self.history.back()></td>
	</tr>
</table>
</form>";
break;
case "editjurusan":
$edit = mysql_query("SELECT * FROM jurusan WHERE kdjur='$_GET[id]'");

$r=mysql_fetch_array($edit);

echo "<h2>Edit Prodi</h2>
<form method=POST action=$aksi?module=jurusan&act=update>
	<input type=hidden name=id value=$r[kdjur]>
	<table>
		<tr>
			<td>Kode Prodi</td>
			<td> : <input type=text name=kdjur value='$r[kdjur]' size=15 maxlength=15></td>
		</tr>
		<tr>
			<td>Nama Prodi</td>
			<td> : <input type=text name=nmjur value='$r[nmjur]' size=35 maxlength=50></td>
		</tr>
		<tr>
			<td>NIP Ketua</td>
			<td> : <input type=text name=nipketua value='$r[nipketua]' size=15 maxlength=15></td>
		</tr>
		<tr>
			<td>Nama Ketua</td>
			<td> : <input type=text name=nmketua value='$r[nmketua]' size=35 maxlength=100></td>
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