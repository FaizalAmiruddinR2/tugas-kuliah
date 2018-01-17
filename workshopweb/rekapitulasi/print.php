<?php
require_once('database.php');

#setting judul laporan dan header tabel
$judul = "REKAPITULASI DATA MAHASISWA";
$header = array(
	array("label"=>"NO", "length"=>10, "align"=>"C"),
	array("label"=>"JURUSAN", "length"=>80, "align"=>"L"),
	array("label"=>"JUMLAH MAHASISWA", "length"=>60, "align"=>"C")
);

#sertakan library FPDF dan bentuk objek
require_once('../libs/fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();

#tampilkan judul laporan
$pdf->SetFont('Arial','B','16');
$pdf->Cell(0,20, $judul, '0', 1, 'C');

#buat header tabel
$pdf->SetFont('Arial','','10');
$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128,0,0);
foreach ($header as $kolom) {
	$pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();

#tampilkan data tabelnya
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$fill=false;
foreach ($data as $baris) {
	$i = 0;
	foreach ($baris as $cell) {
		$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $header[$i]['align'], $fill);
		$i++;
	}
	$fill = !$fill;
	$pdf->Ln();
}

#output file PDF
$pdf->Output();
?>