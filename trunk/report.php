<?php
include 'include/pagina_apertura.php';
include_once 'function/function_booking.php';
include_once 'function/function_client.php';
include_once 'function/function_report.php';


?><div id="titoloContenuti">CREA NOTIFICAZIONE</div> 

		
<?php
	
	if(!(isset($_POST['report']) && $_POST['report']!="")){
		$id_booking = $_REQUEST['id_booking'];
		$booking = getBookingById($id_booking);
		$id_client = $booking['client'];
		$client = getClient($id_client);
		echo "Creare il notificato per la prenotazione:";
		echo "<br><br><br>";
		echo "<b>Informazioni Cliente</b>";
		echo "<br>Nome: ".$client['name'];
		echo "<br>Cognome: ".$client['surname'];
		echo "<br>Indirizzo: ".$client['address'];
		echo "<br>Citt&agrave;: ".$client['city'];
		echo "<br>Telefono: ".$client['telephone'];
		echo "<br><br><br>";
		echo "<b>Informazioni prenotazione</b>";
		echo "<br>Stanza: ".$booking['room'];
		echo "<br>Data ingresso: ".substr($booking['date_in'],0,10);
		echo "<br>Data uscita: ".substr($booking['date_out'],0,10);
		echo "<br>Note: ".$booking['note'];
		echo "<br><br><br>";
?>		
		<form id="report" name="report" action="" method="post">
		<input type="hidden" name="report" value="true"/>
		<input type="hidden" name="id_booking" value="<?php echo $booking['id'];?>"/>
		<button id="report" value="submit">Genera notificazione</button>
		</form>
<?php 
	}else{
		echo "<b>Devo generare il report</b>";
		var_dump($_POST);
		$booking = $_POST['id_booking'];
		$path = "ciao mamma";
		insertReport($booking,$path);
	}
include 'include/pagina_chiusura.php';
?>