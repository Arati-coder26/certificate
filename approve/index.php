<?php
require('fpdf.php');

$pdf = new FPDF();
$pdf->AddFont('SCRIPTIN','','SCRIPTIN.php');
$pdf->AddPage();
$pdf->SetFont('SCRIPTIN','',35);
$pdf->Write(10,'Enjoy new fonts with FPDF!');
$pdf->Output();
?>