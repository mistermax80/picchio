<?php
//fopen("prova.pdf","w+");

//Dati Finti da inserire:
$date_in = "12-01-2010";
$surname = "Rossi";
$name = "Mario";
$city_birth = "Roma (Rm)";
$date_birth = "23-04-1987";
$address = "via, città, provincia";
$type_doc = "patente";
$num_doc = "RMdsgf4445wgjh32874";
$release_date = "23-12-2001";
$release_to = "Roma";

//Another family component
$surname2 = "Rossi";
$name2 = "Mario";
$city_birt2 = "Roma (Rm)";
$date_birth2 = "23-04-1987";

//Generic info
$date_delivery = "12-01-2010";
$stamp_hotel = "";
$logo_hotel = "";
$logo_software = "";
//Fine Dati da Inserire

define('FPDF_FONTPATH','include/pdf/font/');
require('include/pdf/fpdf.php');

$pdf=new FPDF();
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont('Helvetica','B',16);
$pdf->Cell(40,10,'La Villa Hotel');
$pdf->Cell(40,50,'Modulo Prenotazione Albergo');
$pdf->Cell(40,60,'------------------------------------');
$pdf->Output();
?>
