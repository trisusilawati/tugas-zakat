<?php
// memanggil library FPDF
require('assets/fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A4');
// membuat halaman baru
$pdf->AddPage();
$pdf->setAutoPageBreak(false);
// setting jenis font yang akan digunakan
$pdf->SetFont('Helvetica','B',16);
// mencetak string 
$pdf->Cell(285,7,'Data Pembayaran Zakat',0,1,'C');
$pdf->SetFont('Helvetica','B',12);

// mengambil zona waktu WIB
date_default_timezone_set("Asia/Jakarta");
$waktu = date("d F Y H:i:s ");

$pdf->Cell(285,7,"Per $waktu",0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Helvetica','B',10);
$pdf->Cell(15,15,'No.',1,0);
$pdf->Cell(40,15,'Jenis Zakat',1,0);
$pdf->Cell(40,15,'Nominal',1,0);
$pdf->Cell(40,15,'Nama Lengkap',1,0);
$pdf->Cell(30,15,'Nomor HP',1,0);
$pdf->Cell(40,15,'Email',1,0);
$pdf->Cell(35,15,'Nama Bank',1,0);
$pdf->Cell(35,15,'Nomor Rekening',1,1, 'C');

$pdf->SetFont('Helvetica','B',8);

include 'koneksi.php';
$i = 1;
$datas = mysqli_query($koneksi, "SELECT * FROM `tb_pembayaran_zakat` INNER JOIN tb_zakat WHERE tb_pembayaran_zakat.id_zakat = tb_zakat.id_zakat");
while ($row = mysqli_fetch_array($datas)){
	$pdf->Cell(15,15,$i,1,0);
	$pdf->Cell(40,15,$row['jenis_zakat'],1,0);
	$pdf->Cell(40,15,'Rp '.number_format($row['nominal'],2),1,0);
	$pdf->Cell(40,15,$row['nama_lengkap'],1,0);
	$pdf->Cell(30,15,$row['no_hp'],1,0);
	$pdf->Cell(40,15,$row['alamat_email'],1,0);
	$pdf->Cell(35,15,$row['nama_bank'],1,0);
	$pdf->Cell(35,15,$row['no_rekening'],1,1);
	$i++;
}

$pdf->Output();
?>