<?php

fopen("prova.pdf","w+");

define('FPDF_FONTPATH','include/pdf/font/');
require('include/pdf/fpdf.php');

$pdf=new FPDF();
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont('Helvetica','B',16);
$pdf->Cell(40,10,'La Villa Hotel');
$pdf->Cell(40,50,'Modulo Prenotazione Albergo');
$pdf->Cell(40,60,'------------------------------------');
$pdf->Output("prova.pdf");
?>