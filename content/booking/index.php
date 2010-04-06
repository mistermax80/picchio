<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/_base.inc.php';
include_once FUNCTION_PATH.'function_page.php';
include_once FUNCTION_PATH.'function_booking.php';
include_once FUNCTION_PATH.'function_date.php';

if(isset($_POST['update_booking']) && $_POST['update_booking']!=""){

	$id_booking = $_SESSION['id_booking'];
	$id_client = $_SESSION['id_client'];
	$id_room = $_POST['id_room'];
	$date_in = $_POST['date_in'];
	$date_out = $_POST['date_out'];
	$number_client = $_POST['number_client'];
	$note = $_POST['note'];
	
	updateBooking($id_booking,$id_client,$id_room,$date_in,$date_out,$number_client,$note);
		
	unset($_SESSION['id_booking']);
	unset($_SESSION['id_client']);
	unset($_SESSION['date_in']);
	unset($_SESSION['date_out']);
	unset($_SESSION['number_client']);
	unset($_SESSION['note']);
}

if(isset($_REQUEST['mode']) && $_REQUEST['mode']=="update"){
	
	$booking = getBooking($_REQUEST['date_stamp_in'],$_REQUEST['id_room']);
	
	if(isset($booking['id']) && $booking['id']!=""){
		
		$_SESSION['id_booking'] = $booking['id'];
		$_SESSION['id_client'] = $booking['client'];
		$_SESSION['id_room'] = $booking['room'];
		
		$_SESSION['date_in'] = dateEN2IT($booking['date_in']);
		$_SESSION['date_out'] = dateEN2IT($booking['date_out']);
		
		$_SESSION['number_client'] = $booking['number_client'];
		$_SESSION['note'] = $booking['note'];
		drawOpenPage("Gestione Prenotazione");
		?>
		<div id="tabella">
			<form method="post">
			<?php include 'form.php';?>
			</form>
		</div>
		<?php drawClosePage();
	}
}

if(isset($_REQUEST['mode']) && $_REQUEST['mode']=="insert"){
	$_SESSION['new_booking']= true;
	$_SESSION['id_room'] = $_REQUEST['id_room'];
	$_SESSION['date_in'] = date('j-m-Y',$_REQUEST['date_stamp_in']);
	
	unset($_SESSION['date_out']);
	unset($_SESSION['number_client']);
	unset($_SESSION['note']);
	
	header("location: ".CLIENT_LOCATION);
}