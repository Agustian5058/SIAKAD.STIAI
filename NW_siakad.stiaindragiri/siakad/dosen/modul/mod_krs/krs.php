<?php
$aksi="modul/mod_krs/aksi_krs.php";
switch($_GET[act]) {
	// Tampil KRS
	default:
	echo "<h2>Kartu Rencana Studi</h2>
<table id='sample-table-2' class='table table-striped table-bordered table-hover'><thead>
<tr>
	<th>No.</th>
	<th>NIM</th>
	<th>Nama Mhs</th>
	<th>Jurusan</th>
	<th>Tahun Ajaran</th>
	<th>Nama M-K</th>
	<th>Kd. Kelas</th>
	<th>Semester</th>
</tr></thead>";
$p=new Paging;
	$batas=10;
	$posisi=$p->cariposisi($batas);
	
//$tampil=mysql_query("SELECT a.*,b.nmmatkul FROM krs a inner join matakuliah b on a.kdmatkul=b.kdmatkul ORDER BY a.nim LIMIT $posisi,$batas");
$tampil=mysql_query("SELECT b.kdmatkul,b.nmmatkul,c.kdjur,c.nmjur,d.nim,d.nama,a.* from matakuliah b,jurusan c,mahasiswa d,krs a WHERE b.kdmatkul=a.kdmatkul AND c.kdjur=a.kdjur AND d.nim=a.nim ORDER BY a.nim");

	$no=$posisi+1;
while ($r=mysql_fetch_array($tampil)) {
	echo "<tr><td>$no</td>
		<td>$r[nim]</td>
		<td>$r[nama]</td>
		<td>$r[nmjur]</td>
		<td>$r[tahun]</td>
		<td>$r[nmmatkul]</td>
		<td>$r[kdkelas]</td>
		<td>$r[semester]</td>
</tr>";
		$no++;
}
echo "</table>";
$tampil2 = mysql_query("SELECT b.kdmatkul,b.nmmatkul,c.kdjur,c.nmjur,d.nim,d.nama,a.* from matakuliah b,jurusan c,mahasiswa d,krs a WHERE b.kdmatkul=a.kdmatkul AND c.kdjur=a.kdjur AND d.nim=a.nim");
$jmldata = mysql_num_rows($tampil2);

$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);

break;

}

?>