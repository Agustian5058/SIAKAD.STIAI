<?php
ini_set('display_errors', 1); ini_set('error_reporting', E_ERROR);
$thn_skrg=date("Y");
echo "<h2>Cari Kartu Rencana Studi Mahasiswa</h2>
<form method=POST action='cetakkrs.php'>
<table>
	<tr>
		<td>NIM*</td>
		<td> : <input type=text name=nim size=15 maxlength=15 value='$_SESSION[namauser]'></td>
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
	<td> : <select name=semester>
		<option value='Ganjil' selected>Ganjil</option>
		<option value='Genap'>Genap</option>
		</select>
	</td>
</tr>
<tr>
<td colspan=2><input type=submit value='Cari'></td>
</tr>
</table>
</form>";
?>