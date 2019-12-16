<?php
$aksi="modul/mod_jadwal/aksi_jadwal.php";
switch($_GET[act]) {
	// Tampil Jadwal
	default:
	echo "<h2>Jadwal Mata Kuliah</h2>
<input type=button class='btn btn-primary' value='Tambah Jadwal' onclick=location.href='?module=jadwal&act=tambahjadwal'>
<table id='sample-table-2' class='table table-striped table-bordered table-hover'><thead>
<tr>
	<th>No</th>
	<th>Th Ajaran</th>
	<th>Kode M-K</th>
	<th>Nama M-K</th>
	<th>Kelas</th>
	<th>Ruangan</th>
	<th>Hari</th>
	<th>Jam Mulai</th>
	<th>Tim Pengajar</th>
	<th>Aksi</th>
</tr></thead>";

$tampil=mysql_query("SELECT a.*,b.nmmatkul from jadwal a inner join matakuliah b on a.kdmatkul=b.kdmatkul ");
$no=1;
while($r=mysql_fetch_array($tampil)) {
	echo "<tr><td>$no</td>
			<td>$r[tahun]</td>
			<td>$r[kdmatkul]</td>
			<td>$r[nmmatkul]</td>
			<td>$r[kdkelas]</td>
			<td>$r[ruangan]</td>
			<td>$r[hari]</td>
			<td>$r[jam_mulai]</td>
			<td>$r[timpengajar]</td>
			<td><a href=?module=jadwal&act=editjadwal&id=$r[id_jadwal]>Edit</a> | 
				<a href=$aksi?module=jadwal&act=hapus&id=$r[id_jadwal]>Hapus</a></td>
			</tr>";
		$no++;
}
echo "</table>";
break;

case "tambahjadwal":
$thn_skrg=date("Y");
echo "<h2>Tambah Jadwal Kuliah</h2>
<form method=POST action='$aksi?module=jadwal&act=input'>
<table class='table table-striped table-bordered table-hover'>
<tr>
	<td>Tahun Ajaran</td>
	<td> : <select name=tahun>
	<option value=0 selected>Tahun Ajaran</option>";
	for ($ta=2014; $ta<=$thn_skrg;$ta++) {
		echo "<option value=$ta>$ta</option>";
	}
	echo "</select>
	</td>
</tr>
<tr>
	<td>Semester</td>
	<td> : <select name=semester>
		<option value='Ganjil' selected>Ganjil</option>
		<option value='Genap'>Genap</option>
		</select>
	</td>
</tr>
<tr>
		<td>Nama Mata Kuliah</td>
		<td> : <select name=kdmatkul>
		<option value=0 selected>- Pilih Mata Kuliah -</option>"; 
		$sql=mysql_query("SELECT * FROM matakuliah order by nmmatkul");
		while ($data=mysql_fetch_array($sql))
		{
			echo "<option value=$data[kdmatkul]>$data[nmmatkul]</option>";
		}
	echo "</select></td>
	</tr>
			<tr>
		<td>Nama Kelas</td>
		<td> : <select name=kdkelas>
		<option value=0 selected>- Pilih Kelas -</option>"; 
		$sql=mysql_query("SELECT * FROM  kelas ORDER BY kdkelas");
		while ($data=mysql_fetch_array($sql))
		{
			echo "<option value=$data[kdkelas]>$data[nmkelas]</option>";
		}
	echo "</select></td>
	</tr>
<tr>
	<td>Ruangan</td>
	<td> : <input type=text name=ruangan size=6 maxlength=6></td>
</tr>
<tr>
	<td>Hari</td>
	<td> : <input type=text name=hari size=20 maxlength=35></td>
</tr>
<tr>
	<td>Jam Mulai</td>
	<td> : <input type=text name=jam_mulai size=8 maxlength=8> (jj:mm:dd) </td>
</tr>
<tr>
	<td>Rencana Tatap Muka</td>
	<td> : <input type=text name=rtmuka size=4 maxlength=2></td>
</tr>
	<tr><td>Tim Pengajar</td>
		<td> : <textarea name=timpengajar cols=35 rows=4></textarea></td>
	</tr>
	
<tr>
<td colspan=2><input type=submit class='btn btn-primary' value=Tambah> <input type=button class='btn btn-primary' value=Batal onclick=self.history.back()></td>
</tr>
</table>
</form>";
break;

case "editjadwal":
$thn_skrg=date("Y");
$edit=mysql_query("SELECT * FROM jadwal WHERE id_jadwal='$_GET[id]'");
$r=mysql_fetch_array($edit);

echo "<h2>Edit Jadwal Kuliah</h2>
<form method=POST action=$aksi?module=jadwal&act=update>
<input type=hidden name=id value='$r[id_jadwal]'>
<table class='table table-striped table-bordered table-hover'>
<tr>
	<td>Tahun Ajaran</td>
	<td> : ";
	$get_thn=substr("$r[tahun]",0,4);
	$thn_skrg=date("Y");
	combotgl2(2014,$thn_skrg,'tahun',$get_thn);

echo "</td>
</tr>
<tr>
		<td>semester</td>
		<td> : <select name='semester'>";
	if ($r[semester]=='Ganjil') {
		echo "<option value=Ganjil selected>Ganjil</option>
			<option value=Genap>Genap</option>";
	}
	else {
		echo "<option value=Pria>Pria</option>
			<option value=Wanita selected>Wanita</option>";
	}
echo "</select>
	</td>
</tr>
<tr>
		<td>Mata Kuliah</td>
		<td> : <select name=kdmatkul>";
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
			<tr>
<tr>
		<td>Kelas</td>
		<td> : <select name=kdkelas>";
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
	<td>Ruangan</td>
	<td> : <input type=text name=ruangan size=6 maxlength=6 value='$r[ruangan]'></td>
</tr>
<tr>
	<td>Hari</td>
	<td> : <input type=text name=hari size=20 maxlength=35 value='$r[hari]'></td>
</tr>
<tr>
	<td>Jam Mulai</td>
	<td> : <input type=text name=jam_mulai size=8 maxlength=8 value='$r[jam_mulai]'> (jj:mm:dd) </td>
</tr>
<tr>
	<td>Rencana Tatap Muka</td>
	<td> : <input type=text name=rtmuka size=4 maxlength=2 value='$r[rtmuka]'></td>
</tr>
	<tr><td>Tim Pengajar</td>
		<td> : <textarea name=timpengajar cols=35 rows=4>$r[timpengajar]</textarea></td>
	</tr>
	
<tr>
<td colspan=2><input type=submit class='btn btn-primary' value=Update> <input type=button class='btn btn-primary' value=Batal onclick=self.history.back()></td>
</tr>
</table>
</form>";
break;
}
?>