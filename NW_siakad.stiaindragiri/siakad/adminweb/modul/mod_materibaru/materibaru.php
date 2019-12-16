<?php
$aksi="modul/mod_materibaru/aksi_materibaru.php";
switch($_GET[act]) {
	// Tampil Materi Ajaran Baru
	default:
	echo "<h2>Tampil Kurikulum</h2>
<input type=button class='btn btn-primary' value='Tambah Kurikulum' onclick=\"window.location.href='?module=materibaru&act=tambahmateribaru';\">
<table id='sample-table-2' class='table table-striped table-bordered table-hover'><thead>
<tr>
	<th>No.</th>
	<th>Nama Mata Kuliah</th>
	<th>Jurusan</th>
	<th>Tahun Ajaran</th>
	<th>Kelas</th>
	<th>Semester</th>
	<th>Keterangan</th>
	<th>Kode Dosen</th>
	<th>Aksi</th>
</tr></thead>";
	$p=new Paging;
	$batas=10;
	$posisi=$p->cariposisi($batas);

$tampil=mysql_query("select a.*,b.nmmatkul,c.nmjur from materibaru a,matakuliah b,jurusan c where a.kdmatkul=b.kdmatkul AND a.kdjur=c.kdjur order by a.tahun,a.semester ");
$no=$posisi+1;

while ($r=mysql_fetch_array($tampil)) {
$ts=$r[tahun]+1;
echo "<tr><td>$no</td>
		<td>$r[nmmatkul]</td>
		<td>$r[nmjur]</td>
		<td>$r[tahun]/$ts</td>
		<td>$r[kdkelas]</td>
		<td>$r[semester]</td>
		<td>$r[ket]</td>
		<td>$r[kode_dosen]</td>
		<td><a href=?module=materibaru&act=editmateribaru&id=$r[id_materi]>Edit</a> |
			<a href=$aksi?module=materibaru&act=hapus&id=$r[id_materi]>Hapus</a></td>
		</tr>";
$no++;
}
echo "</table>";
$tampil2 = mysql_query("select a.*,b.nmmatkul,c.nmjur from materibaru a,matakuliah b,jurusan c where a.kdmatkul=b.kdmatkul AND a.kdjur=c.kdjur");
$jmldata = mysql_num_rows($tampil2);

$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman= $p->navHalaman($_GET[halaman],$jmlhalaman);

break;

case "tambahmateribaru":
$thn_skrg=date("Y");

echo "<h2>Tambah Kurikulum</h2>
<form method=POST action='$aksi?module=materibaru&act=input'>
<table>
<tr>
		<td>Jurusan</td>
		<td><select name=kdjur>
		<option value=0 selected>- Pilih Jurusan -</option>"; 
		$sql=mysql_query("SELECT * FROM jurusan ORDER BY nmjur");
		while ($data=mysql_fetch_array($sql))
		{
			if ($data[kdjur]==$_GET[kdjur]) {
				echo "<option value=$data[kdjur] selected>$data[nmjur]</option>";
			}
			else {
				echo "<option value=$data[kdjur]>$data[nmjur]</option>";
			}
		}
	echo "</select></td>
</tr>

<tr>
		<td>Mata Kuliah</td>
		<td><select name=kdmatkul>
		<option value=0 selected>- Pilih Mata Kuliah -</option>"; 
		$sql=mysql_query("SELECT * FROM matakuliah ORDER BY nmmatkul");
		while ($data=mysql_fetch_array($sql))
		{
			if ($data[kdmatkul]==$_GET[kdmatkul]) {
				echo "<option value=$data[kdmatkul] selected>$data[nmmatkul]</option>";
			}
			else {
				echo "<option value=$data[kdmatkul]>$data[nmmatkul]</option>";
			}
		}
	echo "</select></td>
</tr>

<tr>
	<td>Tahun Ajaran</td>
	<td><select name=tahun>";
	//<option value=0 selected>Tahun Ajaran</option>";
	for ($ta=1980; $ta<=$thn_skrg;$ta++) {
		$ts=$ta+1;
		echo "<option value=$ta selected>$ta/$ts</option>";
	}
	echo "</select>
	</td>
</tr>
<tr>
		<td>Kelas</td>
		<td><select name=kdkelas>
		<option value=0 selected>- Pilih Kelas -</option>"; 
		$sql=mysql_query("SELECT * FROM kelas ORDER BY nmkelas");
		while ($data=mysql_fetch_array($sql))
		{
			if ($data[kdkelas]==$_GET[kdkelas]) {
				echo "<option value=$data[kdkelas] selected>$data[nmkelas]</option>";
			}
			else {
				echo "<option value=$data[kdkelas]>$data[nmkelas]</option>";
			}
		}
	echo "</select></td>
</tr>

<tr>
	<td>Semester</td>
	<td><input type=text name=semester size=3 maxlength=2></td>
</tr>
<tr>
	<td colspan=2><input type=submit class='btn btn-primary' value=Simpan>
	<input type=button class='btn btn-primary' value=Batal onclick=self.history.back()></td>
</tr>
</table>
</form>";
break;

case "editmateribaru":
$thn_skrg=date("Y");
$edit=mysql_query("SELECT * FROM materibaru WHERE id_materi='$_GET[id]'");
$r=mysql_fetch_array($edit);

echo "<h2>Edit Kurikulum</h2>
<form method=POST action=$aksi?module=materibaru&act=update>
<input type=hidden name=id value='$r[id_materi]'>
<table>
<tr>
		<td>Jurusan</td>
		<td><select name=kdjur>";
		$tampil=mysql_query("SELECT * FROM jurusan ORDER BY nmjur");
		while ($w=mysql_fetch_array($tampil))
		{
			if ($r[kdjur]==$w[kdjur]) {
				echo "<option value='$w[kdjur]' selected>$w[nmjur]</option>";
			}
			else {
				echo "<option value='$w[kdjur]'>$w[nmjur]</option>";
			}
		}
		echo "</select></td>
</tr>

<tr>
		<td>Mata Kuliah</td>
		<td><select name=kdmatkul>";
		$tampil=mysql_query("SELECT * FROM matakuliah ORDER BY nmmatkul");
		while ($w=mysql_fetch_array($tampil))
		{
			if ($r[kdmatkul]==$w[kdmatkul]) {
				echo "<option value=$w[kdmatkul] selected>$w[nmmatkul]</option>";
			}
			else {
				echo "<option value=$w[kdmatkul]>$w[nmmatkul]</option>";
			}
		}
		echo "</select></td>
</tr>

<tr>
	<td>Tahun Ajaran</td>
	<td>";
	$get_thn=substr("$r[tahun]",0,4);
	$thn_skrg=date("Y");
	combotgl2(1970,$thn_skrg,'tahun',$get_thn);
echo "</td>
</tr>
<tr>
		<td>Kelas</td>
		<td><select name=kdkelas>";
		$tampil=mysql_query("SELECT * FROM kelas ORDER BY nmkelas");
		while ($w=mysql_fetch_array($tampil))
		{
			if ($r[kdkelas]==$w[kdkelas]) {
				echo "<option value='$w[kdkelas]' selected>$w[nmkelas]</option>";
			}
			else {
				echo "<option value='$w[kdkelas]'>$w[nmkelas]</option>";
			}
		}
		echo "</select></td>
</tr>

<tr>
	<td>Semester</td>
	<td><input type=text name=semester size=3 maxlength=2 value='$r[semester]'></td>
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