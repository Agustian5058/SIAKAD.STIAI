<?php
$aksi="modul/mod_siswa/aksi_mahasiswa.php";
switch($_GET[act]) {
	// Tampil Mahasiswa
	default:
	echo "<h2>Mahasiswa</h2>
<table id='sample-table-2' class='table table-striped table-bordered table-hover'><thead>
<tr>
	<th>No.</th>
	<th>NIM Mahasiswa</th>
	<th>Nama</th>
	<th>Jenis Kelamin</th>
	<th>Tempat/Tgl Lahir</th>
	<th>Jurusan</th>
	<th>Angkatan</th>
	<th>Aksi</th>
</tr></thead>";

$p= new Paging;
$batas=10;
$posisi=$p->cariposisi($batas);

$tampil=mysql_query("SELECT * FROM mahasiswa,jurusan WHERE mahasiswa.kdjur=jurusan.kdjur AND mahasiswa.nim='$_SESSION[namauser]' ORDER BY nim");
$no=$posisi+1;
while($r=mysql_fetch_array($tampil)){
		$tglhr = tgl_indo($r[tglhr]);
		echo "<tr><td>$no</td>
				<td>$r[nim]</td>
				<td>$r[nama]</td>
				<td>$r[jekel]</td>
				<td>$r[tplhr], $tglhr</td>
				<td>$r[nmjur]</td>
				<td>$r[angkatan]</td>
				<td><a href=?module=mahasiswa&act=editmahasiswa&id=$r[nim]>Edit</a>
			</tr>";
	$no++;
}
echo "</table>";
$tampil2=mysql_query("SELECT * FROM mahasiswa,jurusan WHERE mahasiswa.kdjur=jurusan.kdjur AND mahasiswa.nim='$_SESSION[namauser]' ORDER BY nim");
	$jmldata=mysql_num_rows($tampil2);

	$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
	$linkHalaman= $p->navHalaman($_GET[halaman],$jmlhalaman);

break;

case "tambahmahasiswa":
$thn_skrg=date("Y");
echo "<h2>Tambah Mahasiswa</h2>
<form method=POST action='$aksi?module=mahasiswa&act=input' enctype='multipart/form-data'>
<table>
<tr>
	<td>NIM Mahasiswa</td>
	<td> : <input type=text name=nim size=15 maxlength=15></td>
</tr>
<tr>
	<td>Password</td>
	<td> : <input type=text name=password size=30 maxlength=30></td>
</tr>
<tr>
	<td>Nama Mahasiswa</td>
	<td> : <input type=text name=nama size=40 maxlength=100></td>
</tr>
<tr>
		<td>Jurusan</td>
		<td> : <select name=kdjur>
		<option value=0 selected>- Pilih Jurusan -</option>"; 
		$sql=mysql_query("SELECT * FROM jurusan ORDER BY nmjur");
		while ($data=mysql_fetch_array($sql))
		{
			echo "<option value=$data[kdjur]>$data[nmjur]</option>";
		}
	echo "</select></td>
</tr>
<tr>
	<td>Angkatan</td>
	<td> : <select name=angkatan>
	<option value=0 selected>Angkatan</option>";
	for ($ang=1980; $ang<=$thn_skrg;$ang++) {
		echo "<option value=$ang>$ang</option>";
	}
	echo "</select>
	</td>
</tr>
<tr>
	<td>Foto</td>
	<td> : <input type=file name=ffoto size=40></td>
</tr>
<tr>
	<td>Tempat / Tanggal Lahir</td>
	<td> : <input type=text name='tplhr' size=35 max=50> / ";
	combotgl(1,31,'tanggal',$tgl_skrg);
	combobln(1,12,'bulan',$bln_skrg);
	combotgl(1970,$thn_skrg,'tahun',$thn_skrg);
echo "</td>
</tr>
<tr>
	<td>Jenis Kelamin</td>
	<td> : <select name='jekel'>
			<option value=Pria selected>Pria</option>
			<option value=Wanita>Wanita</option>
			</select>
	</td>
</tr>
<tr>
<td>Agama</td>
	<td> : <select name='agama'>
			<option value='Islam' selected>Islam</option>
			<option value='Kristen Protestan'>Kristen Protestan</option>
			<option value='Kristen Katholik'>Kristen Katholik</option>
			<option value='Hindu'>Hindu</option>
			<option value='Budha'>Budha</option>
			</select>
	</td>
</tr>
<tr>
	<td>Asal Sekolah</td>
	<td> : <input type=text name='asalsekolah' size=35 maxlength=50></td>
</tr>
<tr>
	<td>Tahun Lulus</td>
	<td> : <select name='thlulus'>
	<option value=0 selected>Tahun Lulus</option>";
	for ($tl=1980; $tl<=$thn_skrg;$tl++) {
		echo "<option value=$tl>$tl</option>";
	}
	echo "</select>
	</td>
</tr>
<tr>
	<td colspan=2><input type=submit value=Simpan>
	<input type=button value=Batal onclick=self.history.back()>
	</td>
</tr>
</table>
</form>";
break;

case "editmahasiswa":
$edit=mysql_query("SELECT * FROM mahasiswa WHERE nim='$_GET[id]'");
$r=mysql_fetch_array($edit);

$thn_skrg=date("Y");
echo "<h2>Edit Mahasiswa</h2>
<form method=POST action='$aksi?module=mahasiswa&act=update' enctype='multipart/form-data'>
<input type=hidden name=id value='$r[nim]'>
<table>
<tr>
	<td>NIM Mahasiswa</td>
	<td> : <input type=text name=nim size=15 maxlength=15 value='$r[nim]' disabled></td>
</tr>
<tr>
	<td>Password</td>
	<td> : <input type=text name=password size=30 maxlength=30> *) </td>
</tr>
<tr>
	<td>Nama Mahasiswa</td>
	<td> : <input type=text name=nama size=40 maxlength=100 value='$r[nama]'></td>
</tr>
<tr>
		<td>Jurusan</td>
		<td> : <select name=kdjur>";
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
	<td>Angkatan</td>
	<td> : ";
	$get_thn=substr("$r[angkatan]",0,4);
	$thn_skrg=date("Y");
	combotgl2(1970,$thn_skrg,'angkatan',$get_thn);
echo "</td>
</tr>
<tr>
	<td>Foto</td>
	 <td> : <img src='../adminweb/foto_mahasiswa/$r[foto]'></td>
	</tr>
</tr>
<tr>
	<td>Ganti Foto</td>
	<td> : <input type=file name=ffoto size=40> *)</td>
</tr>
<tr>
	<td>Tempat / Tanggal Lahir</td>
	<td> : <input type=text name=tplhr size=35 max=50 value='$r[tplhr]'> / ";
	$get_tgl = substr("$r[tglhr]",8,2);
	combotgl2(1,31,'tanggal',$get_tgl);
	$get_bln=substr("$r[tglhr]",5,2);
	combobln(1,12,'bulan',$get_bln);
	$get_thn=substr("$r[tglhr]",0,4);
	$thn_skrg=date("Y");
	combotgl2(1970,$thn_skrg,'tahun',$get_thn);

echo "</td>
</tr>
<tr>
		<td>Jenis Kelamin</td>
		<td> : <select name='jekel'>";
	if ($r[jekel]=='Pria') {
		echo "<option value=Pria selected>Pria</option>
			<option value=Wanita>Wanita</option>";
	}
	else {
		echo "<option value=Pria>Pria</option>
			<option value=Wanita selected>Wanita</option>";
	}
echo "</select>
	</td>
</tr>

<tr>
<td>Agama</td>
	<td> : <select name='agama'>";
	if ($r[agama]=='Islam') {
		echo"<option value='Islam' selected>Islam</option>
			<option value='Kristen Protestan'>Kristen Protestan</option>
			<option value='Kristen Katholik'>Kristen Katholik</option>
			<option value='Hindu'>Hindu</option>
			<option value='Budha'>Budha</option>";
	}
	elseif ($r[agama]=='Kristen Protestan') {
	echo"<option value='Islam'>Islam</option>
			<option value='Kristen Protestan' selected>Kristen Protestan</option>
			<option value='Kristen Katholik'>Kristen Katholik</option>
			<option value='Hindu'>Hindu</option>
			<option value='Budha'>Budha</option>";
	}
	elseif ($r[agama]=='Kristen Katholik') {
	echo"<option value='Islam'>Islam</option>
			<option value='Kristen Protestan'>Kristen Protestan</option>
			<option value='Kristen Katholik' selected>Kristen Katholik</option>
			<option value='Hindu'>Hindu</option>
			<option value='Budha'>Budha</option>";
	}
	elseif ($r[agama]=='Hindu') {
	echo"<option value='Islam'>Islam</option>
			<option value='Kristen Protestan'>Kristen Protestan</option>
			<option value='Kristen Katholik'>Kristen Katholik</option>
			<option value='Hindu' selected>Hindu</option>
			<option value='Budha'>Budha</option>";
	}
	elseif ($r[agama]=='Budha') {
	echo"<option value='Islam'>Islam</option>
			<option value='Kristen Protestan'>Kristen Protestan</option>
			<option value='Kristen Katholik'>Kristen Katholik</option>
			<option value='Hindu'>Hindu</option>
			<option value='Budha' selected>Budha</option>";
	}
	echo "</select>
	</td>
</tr>
<tr>
	<td>Asal Sekolah</td>
	<td> : <input type=text name='asalsekolah' size=35 maxlength=50 value='$r[asalsekolah]'></td>
</tr>
<tr>
	<td>Tahun Lulus</td>
	<td> : "; 
	$get_thn=substr("$r[thlulus]",0,4);
	$thn_skrg=date("Y");
	combotgl2(1970,$thn_skrg,'thlulus',$get_thn);

echo "</td>
</tr>
<tr>
	<td colspan=2>*) Apabila gambar atau Password tidak diubah, dikosongkan saja.</td>
</tr>
<tr>
	<td colspan=2><input type=submit value=Update>
	<input type=button value=Batal onclick=self.history.back()>
	</td>
</tr>
</table>
</form>";
break;
}
?>