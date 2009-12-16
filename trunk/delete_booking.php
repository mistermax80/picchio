<?php
include 'include/pagina_apertura.php';
include_once 'function/function_booking.php';
include_once 'include/costant_generic.php';

?><div id="titoloContenuti">ELIMINA PRENOTAZIONE</div><?php 

	if($_REQUEST['id_booking']){
			$id = $_REQUEST['id_booking'];
			$booking = getBookingById($id);
			echo "<b>Informazioni prenotazione</b>";
			echo "<br>Stanza: ".$booking['room'];
			echo "<br>Data ingresso: ".substr($booking['date_in'],0,10);
			echo "<br>Data uscita: ".substr($booking['date_out'],0,10);
			echo "<br>Numero clienti: ".$booking['number_client'];
			echo "<br>Note: ".$booking['note'];		
			
			
//if(isset($_POST['id_booking'])){
	?>
		 <br><br><br><br>
		<script LANGUAGE="JavaScript">
		function confirmSubmit()
		{
			var agree=confirm("Eliminare prenotazione?");
			if (agree)
				return true ;
			else
				return false ;
		}
	</script>
    <form id="delete" name="delete" action="" method="post">
    <input id="delete" name="delete" type="submit" onClick="return confirmSubmit();" value="Elimina Prenotazione"/>
    </form>
    <?php 
    
	}
    if(isset($_POST['delete'])){
			deleteBooking($id);
			echo "Prenotazione eliminata con successo.";
			echo "<a href=\"index.php\">Ritorna</a>";
		
}
include 'include/pagina_chiusura.php';
?>