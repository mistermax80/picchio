<?php


function generateNotification($filename,$id_client) {
	
	if(!is_dir("report")){
		mkdir("report", 0777);
	}
	if(!fopen($filename,"w+")){
		return false;
	}
	
	$client = getClient($id_client); 
	
	//Dati Finti da inserire:
	$day = date("d",time()); 
	$month = date("m",time()); 
	$year = date("Y",time()); 
	$date_in = ("$day/$month/$year");
	$surname = $client['surname'];
	$name = $client['name'];
	$city_birth = $client['city_birth'];
	$nationality = $client['nationality'];;
	$date_birth = $client['date_birth'];
	$gg_birth = date("d",(int)$date_birth); 
	$mm_birth = date("m",(int)$date_birth); 
	$aa_birth = date("Y",(int)$date_birth);
	$address = $client['address'];
	$type_doc = $client['type_document'];
	$num_doc = $client['number_document'];
	$release_date = $client['release_document_date'];
	$release_to = $client['release_document_to'];

	//Generic info
	$num_prog1 = 20009;
	$num_prog2 = 12;
	$date_delivery = $date_in;
	$notification_sheet = "images/notification_sheet.jpg";
	$hotel_stamp = "images/stamp_hotel.jpg";
	$logo_hotel = "images/logo_hotel.png";
	$logo_software = "images/logo_software.png";
	//Fine Dati da Inserire

	//*******************************************
	//Parameter PFD
	$background_template = 1;
	$margin_sx = 5;
	$margin_top = 20;
	$border = 0;
	//*******************************************
	
	define('FPDF_FONTPATH','include/pdf/font/');
	require('include/pdf/fpdf.php');

	$pdf=new FPDF();
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetLeftMargin($margin_sx);
	$pdf->SetFont('Helvetica','',10);

	$pdf->Image($logo_hotel,$margin_sx+15,$margin_top-20,40);

	if($background_template){
		$pdf->Image($notification_sheet,$margin_sx,$margin_top,200);
	}

	$pdf->Image($hotel_stamp,$margin_sx+15,$margin_top+5,50);

	//Line break per impaginazione
	$pdf->Ln($margin_top-10);

	//Cella numero progressivo
	$pdf->Cell($margin_sx+170,5,"",$border);
	$pdf->Cell(20,5,$num_prog1,$border,0,'C');
	$pdf->Cell(5,5,$num_prog2,$border,1,'C');

	//Info Documento
	$pdf->Ln(4);
	$pdf->Cell($margin_sx+118,5,"",$border);
	$pdf->Cell(37,5,$type_doc,$border,0,'C');
	$pdf->Cell(40,5,$num_doc,$border,1,'C');
	$pdf->Ln(2);
	$pdf->Cell($margin_sx+118,5,"",$border);
	$pdf->Cell(37,5,$release_date,$border,0,'C');
	$pdf->Cell(40,5,$release_to,$border,1,'C');
	//Data Arrivo
	$pdf->Ln(12);
	$pdf->Cell($margin_sx-2,4,"",$border,0,'C');
	$pdf->Cell(9,4,$gg,$border,0,'C');
	$pdf->Cell(9,4,$mm,$border,0,'C');
	$pdf->Cell(9,4,$aa,$border,1,'C');

	//Altri familiari
	$pdf->Cell($margin_sx+105,5,"",$border,0,'C');
	$pdf->Cell(90,5,$surname2." ".$name2."   ".$date_birth2."  ".$city_birt2,$border,1,'C');

	$pdf->Ln(1);
	$pdf->Cell($margin_sx+95,5,$surname."  ".$name,$border,0,'C');
	$pdf->Cell(10,5,"",$border,0,'C');
	$pdf->Cell(90,5,$surname3." ".$name3."   ".$date_birth3."  ".$city_birt3,$border,1,'C');

	$pdf->Ln(1);
	$pdf->Cell($margin_sx+95,5,"",$border,0,'C');
	$pdf->Cell(10,5,"",$border,0,'C');
	$pdf->Cell(90,5,$surname4." ".$name4."   ".$date_birth4."  ".$city_birt4,$border,1,'C');

	$pdf->Ln(1);
	$pdf->Cell($margin_sx+95,5,$city_birth,$border,0,'C');
	$pdf->Cell(10,5,"",$border,0,'C');
	$pdf->Cell(90,5,$surname5." ".$name5."   ".$date_birth5."  ".$city_birt5,$border,1,'C');

	//Info nascita
	$pdf->Ln(6);
	$pdf->Cell($margin_sx-2,4,"",$border,0,'C');
	$pdf->Cell(9,4,$gg_birth,$border,0,'C');
	$pdf->Cell(9,4,$mm_birth,$border,0,'C');
	$pdf->Cell(9,4,$aa_birth,$border,0,'C');
	$pdf->Cell(70,4,$nationality,$border,1,'C');

	//Info nascita
	$pdf->Ln(1);
	$pdf->Cell($margin_sx+142,4,"",$border,0,'C');
	$pdf->Cell(53,4,$date_delivery,$border,1,'C');

	//Info Residenza
	$pdf->Ln(3);
	$pdf->Cell($margin_sx+95,5,$address,$border,0,'C');

	$pdf->Image($logo_software,$margin_sx+150,$margin_top+100,20);
	$pdf->Output($filename);
	return true;
}

function generatePerfunctory($filename,$optionals) {
	
	/*
	if(!is_dir("service")){
		mkdir("service", 0777);
	}
	fopen($filename,"w+");
	
	foreach($optionals as $o){
		$product = getProduct($o['id']);
		//stampiamo prodotto con quantit� e il prezzo
	}*/
	
}
	?>

