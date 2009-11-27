<?php

include 'include/pagina_apertura.php';
include_once 'function/function_booking.php';


?><div id="titoloContenuti">OPTIONAL STANZA</div><?php 

$id_booking = $_POST['id'];



    //Visualizza Info Prenotazione
	$booking = getBookingById($booking);
	echo "<b>Informazioni prenotazione</b>";
	echo "<br>Stanza: ".$booking['room'];
	echo "<br>Data ingresso: ".$booking['date_in'];
	echo "<br>Data uscita: ".$booking['date_out'];
	echo "<br><br><br>";
	echo "<br>Servizio bar";
	?>
	No<input type="radio" name="bar" value="No"/>
    Si <input type="radio" name="bar" value="Si"/>
	<?php 
	
	echo "<br>Servizio Ristorante";
	?>
	No<input type="radio" name="bar" value="No"/>
    Si <input type="radio" name="bar" value="Si"/>
	<?php
	echo "<br>Altro";

	include 'include/pagina_chiusura.php';



?>