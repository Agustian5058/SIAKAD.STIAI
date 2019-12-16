<?php
$aksi="modul/mod_matakul/aksi_matakul.php";
switch($_GET[act]) {
	// Tampil Mata Kuliah
	default:
	echo "<h2>Mata Kuliah</h2>
<input type=button class='btn btn-primary' value='Tambah Mata Kuliah' onclick=\"window.location.href='?module=matakul&act=tambahmatakul';\">
<table id='sample-table-2' class='table table-striped table-bordered table-hover'><thead>
	<tr>
		<th>No.</th>
		<th>Kode Mata Kuliah</th>
		<th>Nama Mata Kuliah</th>
		<th>Jumlah SKS</th>
		<th>Jenis</th>
		<th>Aksi</th>
	</tr></thead>";
$p=new Paging;
$batas=10;
$posisi=$p->cariposisi($batas);

$tampil=mysql_query("SELECT * FROM matakuliah");

$no=$posisi+1;
while ($r=mysql_fetch_array($tampil)) {
	echo "<tr><td>$no</td>
			<td>$r[kdmatkul]</td>
			<td>$r[nmmatkul]</td>
			<td>$r[sks]</td>
			<td>$r[jenis]</td>
			<td><a href=?module=matakul&act=editmatakul&id=$r[kdmatkul]>Edit</a> |
				<a href=$aksi?module=matakul&act=hapus&id=$r[kdmatkul]>Hapus</a>
			</td></tr>";
		$no++;
}
echo "</table>";
	$tampil2=mysql_query("SELECT * FROM matakuliah");
	$jmldata=mysql_num_rows($tampil2);

	$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
	$linkHalaman= $p->navHalaman($_GET[halaman],$jmlhalaman);

break;

case "tambahmatakul":
echo "<h2>Tambah Mata Kuliah</h2>
<form method=POST action='$aksi?module=matakul&act=input'>
<table>
	<tr>
		<td>Kode Mata Kuliah</td>
		<td> : <input type=text name='kdmatkul' size=15 maxlength=15></td>
	</tr>
	<tr>
		<td>Nama Mata Kuliah</td>
		<td> : <input type=text name='nmmatkul' size=35 maxlength=100></td>
	</tr>
	<tr>
		<td>Jumlah SKS</td>
		<td> : <input type=text name='sks' size=2 maxlength=2></td>
	</tr>
	<tr>
		<td>Jenis</td>
		<td> : <select name=jenis>
			<option value=Praktek selected>Praktek</option>
			<option value=Teori>Teori</option>
		</td>
	</tr>
	<tr>
		<td colspan=2><input type=submit class='btn btn-primary' value=Simpan>
		<input class='btn btn-primary' type=button value=Batal onclick=self.history.back()></td>
	</tr>
</table>
</form>";
break;

case "editmatakul":
$edit=mysql_query("SELECT * FROM matakuliah WHERE kdmatkul='$_GET[id]'");
$r=mysql_fetch_array($edit);

echo "<h2>Edit Mata Kuliah</h2>
<form method=POST action=$aksi?module=matakul&act=update>
<input type=hidden name=id value='$r[kdmatkul]'>
<table>
	<tr>
		<td>Kode Mata Kuliah</td>
		<td> : <input type=text name=kdmatkul value='$r[kdmatkul]' size=15 maxlength=15></td>
	</tr>
	<tr>
		<td>Nama Mata Kuliah</td>
		<td> : <input type=text name=nmmatkul value='$r[nmmatkul]' size=35 maxlength=100></td>
	</tr>
	<tr>
		<td>Jumlah SKS</td>
		<td> : <input type=text name=sks value='$r[sks]' size=2 maxlength=2></td>
	</tr>
	<td>Jenis</td>
	<td> : <select name='jenis'>";
	if ($r[jenis]=='Praktek') {
		echo "<option value=Praktek selected>Praktek</option>
			<option value=Teori>Teori</option>";
	}
	else {
		echo "<option value=Praktek>Praktek</option>
			<option value=Teori selected>Teori</option>";
	}
	echo "</select>
	</td>
</tr>
	<tr>
		<td colspan=2><input type=submit class='btn btn-primary' value=Update>
			<input type=button class='btn btn-primary' value=Batal onclick=self.history.back()>
		</td>
	</tr>
</table>
</form>";
break;
}
?>