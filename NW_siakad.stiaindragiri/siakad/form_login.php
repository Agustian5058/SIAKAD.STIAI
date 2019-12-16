<?php
echo "<form method=POST action=cek_login.php>
<table width=100% border=0 cellpadding=2>
<tr><td><div id=menu>User</div></td><td> 
<select class='input-medium' name='jenis_user'>
	<option value=pegawai selected>Pegawai</option>
	<option value=dosen>Dosen</option>
	<option value=mahasiswa>Mahasiswa</option>
</select>
</td></tr>
<tr><td><div id=menu>Username</div></td><td> 
<input type=text class='input-medium' name='id_user' size='15'></td></tr>
<tr><td><div id=menu>Password<div></td><td>
<input type=password class='input-medium' name='password' size='15'></td></tr>
<tr><td colspan=2><input type=submit class='btn btn-info btn-big' value=Login></td></tr>
</table>
</form>";
?>