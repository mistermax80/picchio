<?php

include 'include/pagina_apertura.php';
include_once 'function/function_booking.php';


?><div id="titoloContenuti">OPTIONAL STANZA</div><?php 

$id_booking = $_REQUEST['id_booking'];

    //Visualizza Info Prenotazione
	$booking = getBookingById($id_booking);
	echo "<b>Informazioni prenotazione</b>";
	echo "<br>Stanza: ".$booking['room'];
	echo "<br>Data ingresso: ".substr($booking['date_in'],0,10);;
	echo "<br>Data uscita: ".substr($booking['date_out'],0,10);;
	echo "<br><br><br>";
	?>
	
	<table align="left">
	<tr>
		<td>Servizio bar</td>
		<td></td><td></td><td></td>
		<td></td><td></td><td></td>
		<td>No<input type="radio" name="bar" value="No"/></td>
		<td>Si <input type="radio" name="bar" value="Si"/></td>
	</tr>
	<tr>
		<td>Servizio ristorante</td>
		<td></td><td></td><td></td>
		<td></td><td></td><td></td>
		<td>No<input type="radio" name="restorant" value="No"/></td>
		<td>Si <input type="radio" name="restorant" value="Si"/></td>
	</tr>
	<tr>
		<td>Altro</td>
	</tr>

</table>
	
	<?php 
	include 'include/pagina_chiusura.php';



?>