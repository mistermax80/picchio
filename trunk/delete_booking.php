<?php
include 'include/pagina_apertura.php';
include_once 'function/function_booking.php';
include_once 'include/costant_generic.php';

?><div id="titoloContenuti">ELIMINA PRENOTAZIONE</div><?php 
			
if(isset($_POST['delete']) && $_POST['delete']!=""){
			$id = $_POST['id_booking'];
			deleteBooking($id);
			echo "Prenotazione eliminata con successo.";
			echo "<a href=\"index.php\">Ritorna</a>";
		
include 'include/pagina_chiusura.php';
}
?>