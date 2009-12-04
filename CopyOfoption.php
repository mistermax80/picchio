<?php

include 'include/pagina_apertura.php';
include_once 'function/function_booking.php';
include_once 'function/function_client.php';
include_once 'function/function_report.php';




if(!($_POST)){
?>
<div id="titoloContenuti">SELEZIONARE LA PRENOTAZIONE DA INVIARE</div>
<form id="select_booking" name="select_booking" method="post">
<input type="hidden" id="stamp" name="stamp" value="true"/>
<table align="center" bordercolor="FFFFFF">
			<tr>
				<td><b>Cognome</b></td>
				<td></td>
				<td><b>Data ingresso</b></td>
				<td></td>
				<td><b>Data uscita</b></td>
			</tr>
<?php
$bookings=getBookings();
foreach ($bookings as $c) {
				
				$id_client = $c['client'];

				$client = getClient($id_client);
				$surname_client=$client['surname'];
				echo "<tr>";
				echo "<td><br>".$surname_client."</td>";
				echo "<td></td>";
				echo "<td><br>".substr($c['date_in'],0,10)."</td>";
				echo "<td></td>";
				echo "<td><br>".substr($c['date_out'],0,10)."</td>";
				echo "<td><input type=\"radio\" name=\"id\" value=\"".$id."\"/></td>";
				echo "</tr>";
			}
?>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><br><button id="picchio" value="submit">Stampa</button></td>
			</table>
			</form>
<?php 
}
else{
	?><div id="titoloContenuti">INVIO IN CORSO</div><?php 
	echo "sarebbe meglio inviare il fax alla questura invece di stampare i cedolini";
}
include 'include/pagina_chiusura.php';
?>