<?php
$aksi="modul/mod_jadwal/aksi_jadwal.php";
switch($_GET[act]) {
	// Tampil Jadwal
	default:
	echo "<h2>Jadwal Mata Kuliah</h2>
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
	<th>Jam Selesai</th>
	<th>Tim Pengajar</th>
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
			<td>$r[jam_selesai]</td>
			<td>$r[timpengajar]</td>
			</tr>";
		$no++;
}
echo "</table>";
break;
}
?>