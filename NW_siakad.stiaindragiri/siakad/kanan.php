<?php
ini_set('display_errors', 1); ini_set('error_reporting', E_ERROR);
include "config/koneksi.php";
include "config/fungsi_indotgl.php";
include "config/library.php";
include "config/class_paging.php";

// Bagian Home
if ($_GET[module]=='home'){
 
  // Tampilkan 5 berita terbaru
 	$terkini= mysql_query("SELECT * FROM berita,users 
                          WHERE users.id_user=berita.id_user 
                          ORDER BY id_berita DESC LIMIT 5");		 
	while($t=mysql_fetch_array($terkini)){
		$tgl = tgl_indo($t[tanggal]);
		echo "<span class=date>$t[hari], $tgl - $t[jam] WIB</span>";
		echo "<span class=judul><h3><a href=?module=detailberita&id=$t[id_berita]>$t[judul]</a></h3></span>";
		echo "<span class=isi_kecil>Ditulis Oleh : $t[nama_lengkap]</span><br />";
    
		if ($t[gambar]!=''){
			echo "<span class=image><img src='adminweb/foto_berita/$t[gambar]' width=80 border=0></span>";
		}
    $kalimat=strtok(nl2br($t[isi_berita])," ");
    for ($i=1;$i<=50;$i++){
      echo ($kalimat);
      echo (" "); // Spasi antar kalimat
      $kalimat=strtok(" "); // Potong per kalimat
    } 
    echo " ... <a href=?module=detailberita&id=$t[id_berita]>Selengkapnya</a>
          <br><hr color=black></td></tr>";
			}
  
  // Tampilkan 5 berita sebelumnya
  echo "<ul>";
  $sebelum=mysql_query("SELECT * FROM berita 
                        ORDER BY id_berita DESC LIMIT 5,7");		 
	while($s=mysql_fetch_array($sebelum)){
	   echo "<li><a href=?module=detailberita&id=$s[id_berita]>$s[judul]</a></li>";
	}
	echo "</ul>";
  
  
  // Tampilkan 3 agenda dan 3 pengumuman terbaru
//  echo "<img src=images/agenda.jpg><br />";
        
// 	$agenda=mysql_query("SELECT * FROM agenda 
//                      ORDER BY id_agenda DESC LIMIT 3");		 
//	while($a=mysql_fetch_array($agenda)){
//   $mulai  =tgl_indo($a[tgl_mulai]);
//    $selesai=tgl_indo($a[tgl_selesai]);
//	 	echo "<span class=isi_kecil>$mulai - $selesai </span>
//          <br /><a href=?module=detailagenda&id=$a[id_agenda]>$a[tema]</a>
//          <hr color=white>";
//	}
  	
}


// Detail Berita
elseif ($_GET[module]=='detailberita'){
	$detail=mysql_query("SELECT * FROM berita,users 
                      WHERE users.id_user=berita.id_user 
                      AND id_berita='$_GET[id]'");
	$d   = mysql_fetch_array($detail);
	$tgl = tgl_indo($d[tanggal]);
	echo "<span class=date>$d[hari], $tgl - $d[jam] WIB</span><br />";
	echo "<span class=judul>$d[judul]</span><br />";
	echo "<span class=isi_kecil>Ditulis Oleh : $d[nama_lengkap]</span><br />";
  if ($d[gambar]!=''){
		echo "<span class=image><img src='adminweb/foto_berita/$d[gambar]' border=0></span>";
	}
 	$isi_berita=nl2br($d[isi_berita]);
	echo "$isi_berita</td></tr>";	 		  
	echo "<tr><td class=kembali><br>
        [ <a href=javascript:history.go(-1)>Kembali</a> ]<br />";	 		  

  // Apabila berita dibuka, maka tambahkan counternya
  mysql_query("UPDATE berita SET counter=$d[counter]+1 
              WHERE id_berita='$_GET[id]'");
}

// Bagian Berita
elseif ($_GET[module]=='berita'){
   echo "&#187; Berita";
      
  $p      = new Paging;
  $batas  = 8;
  $posisi = $p->cariPosisi($batas);

 	$sql   = "SELECT * FROM berita,users 
           WHERE users.id_user=berita.id_user 
           ORDER BY id_berita DESC LIMIT $posisi,$batas";		 
	$hasil = mysql_query($sql);
	
  while($r=mysql_fetch_array($hasil)){
	 $tgl = tgl_indo($r[tanggal]);
	 echo "<br /><span class=date>$r[hari], $tgl - $r[jam]</span><br />";
	 echo "<span class=judul><a href=$_SERVER[PHP_SELF]?module=detailberita&id=$r[id_berita]>$r[judul]</a></span><br />";
	 $kalimat=strtok(nl2br($r[isi_berita])," ");
   for ($i=1;$i<=50;$i++){
    echo ($kalimat);
    echo (" "); // Spasi antar kalimat
    $kalimat=strtok(" "); // Potong per kalimat
   } 
   echo " ... <a href=$_SERVER[PHP_SELF]?module=detailberita&id=$r[id_berita]>Selengkapnya</a><br /><br />
          <hr color=white>";
      
	}

  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM berita"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

  echo "<br />$linkHalaman<br />";
}


// Bagian Agenda
elseif ($_GET[module]=='agenda'){
   echo "<h3>Agenda</h3>";
      
  $p      = new Paging;
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);

 	$sql   = "SELECT * FROM agenda,users  
           WHERE users.id_user=agenda.id_user 
           ORDER BY id_agenda DESC LIMIT $posisi,$batas";		 
	$hasil = mysql_query($sql);
	
  while($r=mysql_fetch_array($hasil)){
	 $tgl_mulai   = tgl_indo($r[tgl_mulai]);
	 $tgl_selesai = tgl_indo($r[tgl_selesai]);
   $isi_agenda=nl2br($r[isi_agenda]);
	
	 echo "<span class=isi_kecil>$tgl_mulai s/d $tgl_selesai</span><br />";
	 echo "<span class=judul><h4>$r[tema]</h4></span>";
	 echo "<b>Topik</b>    : $isi_agenda<br />";
 	 echo "<b>Tempat</b>   : $r[tempat]<br />";
 	 echo "<b>Pengirim</b> : $r[nama_lengkap]<hr color=black>";
	}

  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM agenda"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

  echo "$linkHalaman<br />";
}


// Bagian Hasil Pencarian
elseif ($_GET[module]=='hasilcari'){
   echo "&#187; Hasil Pencarian<br />";

  // Hanya mencari berita, apabila diperlukan bisa ditambahkan utk mencari agenda, pengumuman, dll
	$cari   = mysql_query("SELECT * FROM berita WHERE isi_berita LIKE '%$_POST[kata]%'");
	$jumlah = mysql_num_rows($cari);

  if ($jumlah > 0){
    echo "<br />Ditemukan <b>$jumlah</b> berita dengan kata <b>$_POST[kata]</b> : <ul>"; 
    
    while($r=mysql_fetch_array($cari)){
      echo "<li><a href=?module=detailberita&id=$r[id_berita]>$r[judul]</a></li>";
    }      
    echo "</ul><br />";
  }
  else{
    echo "<span class=judul>
          Tidak ditemukan berita dengan kata <b>$_POST[kata]</b></span><br />";
  }

	echo " [ <a href=javascript:history.go(-1)>Kembali</a> ]";	 		  
}

?>

