<?php
$aksi="modul/mod_dosenmengajar/aksi_dosenmengajar.php";
switch($_GET[act]) {
	// Tampil Dosen Mengajar
	default:
	echo "<h2>Data Dosen Mengajar</h2>
<input type=button class='btn btn-primary' value='Tambah Dosen Mengajar' onclick=location.href='?module=dosenmengajar&act=caridosenajar'>
<table id='sample-table-2' class='table table-striped table-bordered table-hover'><thead>
<tr>
	<th>No</th>
	<th>Kode Dosen</th>
	<th>Nama Dosen</th>
	<th>Nama M-K</th>
	<th>SKS</th>
	<th>Jurusan</th>
	<th>Tahun Ajaran</th>
	<th>Sem M-K</th>
	<th>Tatap Muka</th>
	<th>Dosen Lain</th>
	<th>Aksi</th>
</tr></thead>";
$p=new Paging;
	$batas=10;
	$posisi=$p->cariposisi($batas);
	
$tampil=mysql_query("SELECT matakuliah.nmmatkul,matakuliah.sks,dosen.nama_dosen,jurusan.nmjur,dosemengajar.* from matakuliah,dosen,jurusan,dosemengajar WHERE matakuliah.kdmatkul=dosemengajar.kdmatkul AND dosen.kode_dosen=dosemengajar.kode_dosen AND jurusan.kdjur=dosemengajar.kdjur ORDER BY dosemengajar.kode_dosen ");
$no=1;
while($r=mysql_fetch_array($tampil)) {
	echo "<tr><td>$no</td>
			<td>$r[kode_dosen]</td>
			<td>$r[nama_dosen]</td>
			<td>$r[nmmatkul]</td>
			<td>$r[sks]</td>
			<td>$r[nmjur]</td>
			<td>$r[tahun]</td>
			<td>$r[semester]</td>
			<td>$r[jumlahtatapmuka]</td>
			<td>$r[dosenlain]</td>
			<td><a href=?module=dosenmengajar&act=editdosenmengajar&id=$r[id_mengajar]>Edit</a> | 
			<a href=$aksi?module=dosenmengajar&act=hapus&id=$r[id_mengajar]>Hapus</a></td>
			
			</tr>";
		$no++;
}
echo "</table>";
$tampil2 = mysql_query("SELECT matakuliah.nmmatkul,matakuliah.sks,dosen.nama_dosen,jurusan.nmjur,dosemengajar.* from matakuliah,dosen,jurusan,dosemengajar WHERE matakuliah.kdmatkul=dosemengajar.kdmatkul AND dosen.kode_dosen=dosemengajar.kode_dosen AND jurusan.kdjur=dosemengajar.kdjur ORDER BY dosemengajar.kode_dosen");
$jmldata = mysql_num_rows($tampil2);

$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman= $p->navHalaman($_GET[halaman],$jmlhalaman);

break;
case "caridosenajar":
$thn_skrg=date("Y");
echo "<h2>Tambah Data Dosen Mengajar</h2>
<form method=POST action='?module=dosenmengajar&act=prosesdosenajar'>
<table >
	<tr>
		<td>Kode Dosen*</td>
		<td> : <input type=text name=kddosen size=15 maxlength=15></td>
</tr>
<tr>
		<td>Jurusan</td>
		<td> : <select name=kdjur>
		"; 
		$sql=mysql_query("SELECT * FROM jurusan order by nmjur");
		while ($data=mysql_fetch_array($sql))
		{
			echo "<option value='$data[kdjur]'>$data[nmjur]</option>";
			
		}
	echo "</select></td>
</tr>
<tr>
	<td>Tahun Ajaran</td>
	<td> : <select name=tahun>";
	//<option value=0 selected>Tahun Ajaran</option>";
	for ($ta=1980; $ta<=$thn_skrg;$ta++) {
		$ts=$ta+1;
		echo "<option value=$ta selected>$ta/$ts</option>";
	}
	echo "</select>
	</td>
</tr>
<tr>
	<td>Semester</td>
	<td> : <select name=semester>";
	for ($sm=1; $sm<=20;$sm++) {
			echo "<option value=$sm>$sm</option>";
	}
	echo "</select>
	</td>
</tr>
<tr>
<td colspan=2><input type=submit class='btn btn-primary' value='Edit'></td>
</tr>
</table>
</form>";

break;

case "prosesdosenajar":
$tampildosen=mysql_query("SELECT * FROM dosen WHERE kode_dosen ='$_POST[kddosen]'");
$w=mysql_fetch_array($tampildosen);
$ketemu=mysql_num_rows($tampildosen);
$b=$_POST[tahun]+1;
if ($ketemu > 0) {
echo"<h2>Form Data Dosen Mengajar</h2>
<form method=POST action='$aksi?module=dosenmengajar&act=inputdosenajar'>
	<table class='table table-striped table-bordered table-hover'>
		<tr>
			<td>Kode Dosen</td>
			<td> : $w[kode_dosen]</td>
			<input type=hidden name=kode_dosen value='$w[kode_dosen]'>
		</tr>
		<tr>
			<td>Nama Dosen</td>
			<td> : $w[nama_dosen]</td>
			<input type=hidden name=nama value='$w[nama_dosen]'>
		</tr>
		
		<tr>
			<td>Tahun Ajaran</td>
			<td> : $_POST[tahun]/$b</td>
			<input type=hidden name=tahun value='$_POST[tahun]'>
		</tr>
		<tr>
			<td>Semester</td>
			<td> : $_POST[semester]</td>
			<input type=hidden name=semester value='$_POST[semester]'>
		</tr>
	</table>";
	echo "<table>
		<tr>
		<td>Jurusan</td>";
		$tampiljur=mysql_query("SELECT nmjur FROM jurusan WHERE kdjur ='$_POST[kdjur]'");
		$j=mysql_fetch_array($tampiljur);
		echo "<td> : $j[nmjur]</td>
		<input type=hidden value='$_POST[kdjur]' name='kodejur'>
	</tr>

		<tr>
		<td>Nama Mata Kuliah</td>
		<td> : <select name=kdmatkul>
		<option value=0 selected>- Pilih Mata Kuliah -</option>"; 
		$hts=substr($_POST[tahun],0,4);
		//$ktr=$_POST[semester];
		$sql=mysql_query("SELECT matakuliah.nmmatkul,materibaru.kdmatkul FROM matakuliah,materibaru WHERE matakuliah.kdmatkul=materibaru.kdmatkul AND materibaru.tahun='$hts' AND materibaru.semester='$_POST[semester]' AND materibaru.kdjur='$_POST[kdjur]'");
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
	<tr><td>Dosen Lain</td>
		<td> : <textarea name=dosenlain style='width: 1050px; height: 350px;' cols=40 rows=3></textarea></td>
	</tr>
	<tr>
		<td>Jumlah Tatap Muka</td>
		<td> : <input type=text name=jumlahtatapmuka size=4 maxlength=4>
	</tr>
	<tr>
	<td colspan=2><input type=submit class='btn btn-primary' value=Tambah><input class='btn btn-primary' type=button value=Batal onclick=self.history.back()></td>
	</table>
	</form>";
	
}
else {
	echo "<br><br><p><b>Kode Dosen tidak ditemukan..</b></p>";
}
break;

case "editdosenmengajar":

$edit=mysql_query("SELECT * FROM dosemengajar WHERE id_mengajar='$_GET[id]'");
$r=mysql_fetch_array($edit);

echo "<h2>Edit Dosen Mengajar</h2>
<form method=POST action='$aksi?module=dosenmengajar&act=update'>
<input type=hidden name=id value='$r[id_mengajar]'>
<table>
<tr>
	<td>Kode Dosen</td>
	<td> : <input type=text name=kode_dosen value='$r[kode_dosen]' size=15 maxlength=15 disabled></td>
</tr>

<tr>
		<td>Mata Kuliah</td>
		<td> : <select name=kdmatkul disabled>";
		$tampil=mysql_query("SELECT * FROM matakuliah ORDER BY nmmatkul");
		while ($w=mysql_fetch_array($tampil))
		{
			if ($r[kdmatkul]==$w[kdmatkul]) {
				echo "<option value='$w[kdmatkul]' selected>$w[nmmatkul]</option>";
			}
			else {
				echo "<option value='$w[kdmatkul]'>$w[nmmatkul]</option>";
			}
		}
		echo "</select></td>
</tr>

<tr><td>Dosen Lain</td>
		<td> : <textarea name=dosenlain cols=35 rows=4>$r[dosenlain]</textarea></td>
	</tr>
<tr>
	<td>Jumlah Tatap Muka</td>
	<td> : <input type=text name=jumlahtatapmuka size=4 maxlength=4 value='$r[jumlahtatapmuka]'>
</tr>
<tr>
	<td>Tahun Ajaran</td>
	<td> : <input type=text name=tahun value='$r[tahun]' size=4 disabled></td>
</tr>


<tr>
		<td>Jurusan</td>
		<td> : <select name=kdjur disabled>";
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
	<td>Semester</td>
	<td> : <input type=text name=semester size=3 maxlength=2 value='$r[semester]' disabled></td>
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