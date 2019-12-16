<?php
include ('class.ezpdf.php');
ini_set('display_errors', 1); ini_set('error_reporting', E_ERROR);  
$pdf = new Cezpdf();
 
// Set margin dan font
$pdf->ezSetCmMargins(3, 3, 3, 3);
$pdf->selectFont('fonts/Courier.afm');

$all = $pdf->openObject();

// Tampilkan logo
//$pdf->setStrokeColor(0, 0, 0, 1);
//$pdf->addJpegFromFile('logo.jpg',20,800,69);

// Teks di tengah atas untuk judul header
$pdf->addText(200, 820, 16,'<b>Kartu Rencana Studi</b>');
$pdf->addText(200, 800, 14,'<b>UNIVERSITAS METRO LAMPUNG</b>');
// Garis atas untuk header
$pdf->line(10, 795, 578, 795);

// Garis bawah untuk footer
$pdf->line(10, 50, 578, 50);
// Teks kiri bawah
$pdf->addText(30,34,8,'Dicetak tgl:' . date( 'd-m-Y, H:i:s'));

$pdf->closeObject();

// Tampilkan object di semua halaman
$pdf->addObject($all, 'all');

// Koneksi ke database dan tampilkan datanya
include "../../../config/koneksi.php";

// Query untuk merelasikan kedua tabel
	$nima=$_POST[nim];
	$hts=substr($_POST[tahun],0,4);
	$ktr=$_POST[semester];
//	$tampilmatakul=mysql_query("SELECT a.*,b.nmmatkul,b.sks from materibaru a inner join matakuliah b on a.kdmatkul=b.kdmatkul where a.tahun='$hts' AND a.ket='$ktr' AND a.kdjur='$w[kdjur]' order by a.semester");
$sql =mysql_query("SELECT b.nmmatkul,b.sks,c.nmjur,c.nmketua,d.nama,a.* from matakuliah b,jurusan c,mahasiswa d,krs a WHERE b.kdmatkul=a.kdmatkul AND c.kdjur=a.kdjur AND d.nim=a.nim AND a.nim='$nima' AND a.tahun='$hts' AND a.ket='$ktr' ORDER BY a.kdmatkul");
//$sql =mysql_query("SELECT * FROM krs WHERE nim='$_POST[nim]' AND tahun='$_POST[tahun]' AND ket='$_POST[semester]' ORDER BY kdmatkul");
$jml = mysql_num_rows($sql);
//$w=mysql_fetch_array($sql);

$i = 1;
while ($r = mysql_fetch_array($sql)) {
    
	$data[$i]=array('<b>No</b>'=>$i, 
                  '<b>Kode Mata Kuliah</b>'=>$r[kdmatkul],
                  '<b>Nama Mata Kuliah</b>'=>$r[nmmatkul],
				  '<b>Jumlah SKS</b>'=>$r[sks],
				  '<b>Semester M-K</b>'=>$r[semester]);
$nm=$r[nim];
$nam=$r[nama];
$tah=$r[tahun];
$tah2=$r[tahun]+1;
$jur=$r[nmjur];
$ktrng=$r[ket];
$ketua=$r[nmketua];
  $i++;
}
$pdf->ezText("\nNomor Pokok Mahasiswa : {$nm}");
$pdf->ezText("\nNama Mahasiswa        : {$nam}");
$pdf->ezText("\nJurusan               : {$jur}");
$pdf->ezText("\nTahun Ajaran          : {$tah}/{$tah2}");
$pdf->ezText("\nSemester              : {$ktrng}");
$pdf->ezText("\n");

$pdf->ezTable($data, '', '', '');

$pdf->ezText("\n                                            B.Lampung," . date( 'd-m-Y'));
$pdf->ezText("                                            Ketua Jurusan");
$pdf->ezText("\n");
$pdf->ezText("\n");
$pdf->ezText("\n");
$pdf->ezText("                                            {$ketua}");
// Penomoran halaman
$pdf->ezStartPageNumbers(320, 15, 8);
$pdf->ezStream();
?>
