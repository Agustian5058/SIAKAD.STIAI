<?php
$aksi="modul/mod_fakultas/aksi_fakultas.php";
switch($_GET[act]) {
	// Tampil Fakultas
	default:
	echo "<h2>Fakultas</h2>
<input type=button class='btn btn-primary' value='Tambah Fakultas' onclick=\"window.location.href='?module=fakultas&act=tambahfakultas';\">
<table id='sample-table-2' class='table table-striped table-bordered table-hover'><thead>
	<tr>
		<th>No.</th>
		<th>Kd. Fakultas</th>
		<th>Nama Fakultas</th>
		<th>NIP Dekan/Pimpinan</th>
		<th>Alamat Fakultas</th>
		<th>Aksi</th>
	</tr></thead>";
	$p=new Paging;
	$batas=10;
	$posisi=$p->cariposisi($batas);

	$tampil=mysql_query("SELECT * FROM fakultas ORDER BY kdfak");
	$no=$posisi+1;
	while ($r=mysql_fetch_array($tampil)){
		echo "<tr>
			<td>$no</td>
			<td>$r[kdfak]</td>
			<td>$r[nmfak]</td>
			<td>$r[nippimpinan]</td>
			<td>$r[almtfak]</td>
			<td><a href=?module=fakultas&act=editfakultas&id=$r[kdfak]>Edit</a> |
				<a href=$aksi?module=fakultas&act=hapus&id=$r[kdfak]>Hapus</a>
			</td>
			</tr>";
		$no++;
	}
echo "</table>";
$tampil2 = mysql_query("select * from fakultas");
$jmldata = mysql_num_rows($tampil2);

$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman= $p->navHalaman($_GET[halaman],$jmlhalaman);
break;

case "tambahfakultas":
echo "<h2>Tambah Fakultas</h2>
<form name=form1 method=POST action='$aksi?module=fakultas&act=input'>
<table>
	<tr>
		<td>Kode Fakultas</td>
		<td> : <input type=text name='kdfak' id=kdfak size=15 maxlength=20></td>
	</tr>
	<tr>
		<td>Nama Fakultas</td>
		<td> : <input type=text name='nmfak' id=nmfak size=35 maxlength=50></td>
	</tr>
	<tr>
		<td>NIP Dekan/Pimpinan</td>
		<td> : <input type=text name='nippimpinan' id=nippimpinan maxlength=50></td>
	</tr>
	<tr>
		<td>Alamat Fakultas</td>
		<td> : <textarea name='almtfak' cols=40 rows=3></textarea></td>
	</tr>
	<tr>
		<td colspan=2><input type=submit class='btn btn-primary' value=Simpan>
		<input type=button class='btn btn-primary' value=Batal onclick=self.history.back()>
		</td>
	</tr>
</table>
</form>";
break;

case "editfakultas":
$edit = mysql_query("SELECT * FROM fakultas WHERE kdfak='$_GET[id]'");

$r=mysql_fetch_array($edit);

echo "<h2>Edit Fakultas</h2>
<form name=form1 method=POST action=$aksi?module=fakultas&act=update>
	<input type=hidden name=id value='$r[kdfak]'>
<table>
	<tr>
		<td>Kode Fakultas</td>
		<td> : <input type=text name=kdfak value='$r[kdfak]' size=15 maxlength=15></td>
	</tr>
	<tr>
		<td>Nama Fakultas</td>
		<td> : <input type=text name=nmfak value='$r[nmfak]' size=35 maxlength=50></td>
	</tr>
	<tr>
		<td>NIP Dekan/Pimpinan</td>
		<td> : <input type=text name=nippimpinan value='$r[nippimpinan]' maxlength=50></td>
	</tr>
	<tr>
		<td>Alamat Fakultas</td>
		<td> : <textarea name=almtfak cols=35 rows=3>$r[almtfak]</textarea></td>
	</tr>
	<tr>
		<td colspan><input type=submit class='btn btn-primary' value=Update>
			<input class='btn btn-primary' type=button value=Batal onclick=self.history.back()></td>
	</tr>
</table>
</form>";
break;
}

?>