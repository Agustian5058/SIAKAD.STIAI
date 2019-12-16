<?php
ini_set('display_errors', 1); ini_set('error_reporting', E_ERROR);
$aksi="modul/mod_krs/aksi_krs.php";
switch($_GET[act]) {
	// Cari KRS
	default:
	$thn_skrg=date("Y");
echo "<h2>Cari Kartu Rencana Studi Mahasiswa</h2>
<form method=POST action='modul/mod_cetakkrs/cetakkrs.php' target='blank'>
<table>
	<tr>
		<td>NIM*</td>
		<td> : <input type=text name=nim size=18 maxlength=18 ></td>
</tr>
<tr>
	<td>Tahun Ajaran</td>
	<td> : <select name=tahun>";
	for ($ta=2014; $ta<=$thn_skrg;$ta++) {
		echo "<option value=$ta selected>$ta</option>";
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
<td colspan=2><input class='btn btn-primary' type=submit value='Cari'></td>
</tr>
</table>
</form>";
break;
}
?>