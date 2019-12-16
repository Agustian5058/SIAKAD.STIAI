<?php
$aksi="modul/mod_nilai/aksi_nilai.php";
switch($_GET[act]) {
	// Tampil Nilai
	default:
echo "<h2>Daftar Nilai Mahasiswa</h2>
Nama Mahasiswa : <b>$_SESSION[namalengkap]</b>
<table id='sample-table-2' class='table table-striped table-bordered table-hover'><thead>
<tr>
	<th>No.</th>
	<th>NIM</th>
	<th>Nama MHS</th>
	<th>Jurusan</th>
	<th>Tahun Ajaran</th>
	<th>Kd.Matkul</th>
	<th>Mata Kuliah</th>
	<th>Kd. Kelas</th>
	<th>Semester</th>
	<th>Nama Dosen</th>
	<th>Huruf Mutu</th>
	<th>Angka Mutu</th>
</tr></thead>";

$p=new Paging;
	$batas=10;
	$posisi=$p->cariposisi($batas);
//$tampil=mysql_query("SELECT a.*,b.nmmatkul from nilai a inner join matakuliah b on a.kdmatkul=b.kdmatkul ORDER BY a.nim LIMIT $posisi,$batas");

$tampil=mysql_query("SELECT b.kdmatkul,b.nmmatkul,c.kdjur,c.nmjur,d.nim,d.nama,e.kode_dosen,e.nama_dosen,a.* from matakuliah b,jurusan c,mahasiswa d,dosen e,nilai a WHERE b.kdmatkul=a.kdmatkul AND c.kdjur=a.kdjur AND d.nim=a.nim AND e.kode_dosen=a.kode_dosen AND a.nim='$_SESSION[namauser]' ORDER BY a.kdmatkul,a.tahun");
$no=$posisi+1;
while ($r=mysql_fetch_array($tampil)) {
	echo "<tr><td>$no</td>
		<td>$r[nim]</td>
		<td>$r[nama]</td>
		<td>$r[nmjur]</td>
		<td>$r[tahun]</td>
		<td>$r[kdmatkul]</td>
		<td>$r[nmmatkul]</td>
		<td>$r[kdkelas]</td>
		<td>$r[semester]</td>
		<td>$r[nama_dosen]</td>
		<td>$r[nilai]</td>
		<td>$r[angka_mutu]</td>
		</tr>";
		$no++;
}
echo "</table>";	
$tampil2=mysql_query("SELECT b.kdmatkul,b.nmmatkul,c.kdjur,c.nmjur,d.nim,d.nama,e.kode_dosen,e.nama_dosen,a.* from matakuliah b,jurusan c,mahasiswa d,dosen e,nilai a WHERE b.kdmatkul=a.kdmatkul AND c.kdjur=a.kdjur AND d.nim=a.nim AND e.kode_dosen=a.kode_dosen AND a.nim='$_SESSION[namauser]'");
$jmldata = mysql_num_rows($tampil2);

$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman= $p->navHalaman($_GET[halaman],$jmlhalaman);

break;

}
?>