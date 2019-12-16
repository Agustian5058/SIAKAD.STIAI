<?php
ini_set('display_errors', 1); ini_set('error_reporting', E_ERROR);
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/class_paging.php";

// Bagian Home
if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='user') {
if ($_GET[module]=='home') {
	echo "<h2>Selamat Datang</h2>
			<p>Hai <b>$_SESSION[namalengkap]</b>, selamat datang di halaman Pengelolaan SIAKAD.<br>
			 Silahkan klik menu pilihan yang berada di sebelah kiri untuk data yang diinginkan.</p>


 		<table>
		<th colspan=5><center>Control Panel</center></th>
		<tr>
		  <td width=120 align=center><a href=index.php?module=user><img src=images/user.png border=none></a></td>
		  <td width=120 align=center><a href=index.php?module=modul><img src=images/modul.png border=none></a></td>
		  <td width=120 align=center><a href=index.php?module=berita><img src=images/berita.png border=none></a></td>
		  <td width=120 align=center><a href=index.php?module=fakultas><img src=images/fakultas.png border=none></a></td>
		  <td width=120 align=center><a href=index.php?module=jurusan><img src=images/jurusan.png border=none></a></td>
    </tr>
		<tr>
		  <th width=120><b>Manajemen User</b></th>
		  <th width=120><b>Manajemen Modul</b></center></th>
		  <th width=120><b>Berita</b></th>
		  <th width=120><b>Fakultas</b></th>
		  <th width=120><b>Jurusan</b></th>
		</tr>
		<tr>
		  <td width=120 align=center><a href=index.php?module=agenda><img src=images/agenda.png border=none></a></td>
		  <td width=120 align=center><a href=index.php?module=banner><img src=images/banner.png border=none></a></td>
		  <td width=120 align=center><a href=index.php?module=mahasiswa><img src=images/mahasiswa.png border=none></a></td>
		  <td width=120 align=center><a href=index.php?module=dosen><img src=images/dosen2.png border=none></a></td>
		  <td width=120 align=center><a href=index.php?module=matakul><img src=images/matkul.png border=none></a></td>
    </tr>
		<tr>
		  <th width=120><center><b>Agenda</b></th>
		  <th width=120><center><b>Banner</b></th>
		  <th width=120><center><b>Mahasiswa</b></th>
		  <th width=120><b>Dosen</b></th>
		  <th width=120><b>Mata Kuliah</b></th>
		</tr>
			<tr>
		  <td width=120 align=center><a href=index.php?module=kelas><img src=images/kelas.png border=none></a></td>
		  <td width=120 align=center><a href=index.php?module=materibaru><img src=images/kurikulum.png border=none></a></td>
		  <td width=120 align=center><a href=index.php?module=krs><img src=images/krs.png border=none></a></td>
		  <td width=120 align=center><a href=index.php?module=nilai><img src=images/nilai.png border=none></a></td>
		  <td width=120 align=center><a href=index.php?module=jadwal><img src=images/hubungi.png border=none></a></td>
    </tr>
		<tr>
		  <th width=120><center><b>Kelas</b></th>
		  <th width=120><center><b>Kurikulum</b></th>
		  <th width=120><center><b>Kartu Rencana Studi</b></th>
		  <th width=120><b>Nilai</b></th>
		  <th width=120><b>Jadwal Perkuliahan</b></th>
		</tr>

    </table>


          <p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
   date_default_timezone_set("Asia/Jakarta");
  echo date("H:i:s");
  echo " WIB</p>";
}

// Bagian User
 /*elseif ($_GET[module]=='user') {
	include "modul/mod_user/user.php";
}

// Bagian Modul
elseif ($_GET[module]=='modul') {
	include "modul/mod_modul/modul.php";
}*/

// Bagian Fakultas
elseif ($_GET[module]=='fakultas') {
	include "modul/mod_fakultas/fakultas.php";
}

// Bagian Jurusan
elseif ($_GET[module]=='jurusan') {
	include "modul/mod_jurusan/jurusan.php";
}

// Bagian Mahasiswa
elseif ($_GET[module]=='mahasiswa') {
	include "modul/mod_siswa/mahasiswa.php";
}

// Bagian Dosen
elseif ($_GET[module]=='dosen') {
	include "modul/mod_dosen/dosen.php";
}

// Bagian Kategori
elseif ($_GET[module]=='kategori') {
	include "modul/mod_kategori/kategori.php";
}
// Bagian Berita
elseif ($_GET[module]=='berita') {
	include "modul/mod_berita/berita.php";
}
// Bagian Banner
elseif ($_GET[module]=='banner') {
	include "modul/mod_banner/banner.php";
}

// Bagian Agenda
elseif ($_GET[module]=='agenda') {
	include "modul/mod_agenda/agenda.php";
}

// Bagian Mata Kuliah
elseif ($_GET[module]=='matakul') {
	include "modul/mod_matakul/matakul.php";
}

// Bagian Kelas
elseif ($_GET[module]=='kelas') {
	include "modul/mod_kelas/kelas.php";
}

// Bagian Materi Ajar Baru
elseif ($_GET[module]=='materibaru') {
	include "modul/mod_materibaru/materibaru.php";
}

// Bagian Materi Ajar Baru
elseif ($_GET[module]=='krs') {
	include "modul/mod_krs/krs.php";
}

// Bagian Dosen Mengajar
elseif ($_GET[module]=='dosenmengajar') {
	include "modul/mod_dosenmengajar/dosenmengajar.php";
}

// Bagian Jadwal Kuliah
elseif ($_GET[module]=='jadwal') {
	include "modul/mod_jadwal/jadwal.php";
}

// Bagian Nilai
elseif ($_GET[module]=='nilai') {
	include "modul/mod_nilai/nilai.php";
}

// Bagian Cetak KRS
elseif ($_GET[module]=='cetak_krs') {
	include "modul/mod_cetakkrs/cetak_krs.php";
}

// Bagian Cetak Nilai
elseif ($_GET[module]=='cetaknilai') {
	include "modul/mod_cetaknilai/cetak_nilai.php";
}
// Bagian Kartu Hasil Studi (Nilai Per Semester)
elseif ($_GET[module]=='cetakkhs') {
	include "modul/mod_khs/cetak_khs.php";
}
}

if ($_SESSION[leveluser]=='admin'){
	// Bagian User
	if ($_GET[module]=='user') {
		include "modul/mod_user/user.php";
	}
	// Bagian Modul
	elseif ($_GET[module]=='modul') {
		include "modul/mod_modul/modul.php";
	}
}

?>