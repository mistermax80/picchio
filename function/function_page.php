<?php 
function drawOpenPage() {
	include 'include/header.php';
	?>
		<div align="center" style="height: 30px;">HOTEL 2010</div>
			<div class="pagina"><!-- Apertura div pagina -->
				<div id="contenuti"><!-- Apertura div contenuti -->
	<?php
}

    
function drawClosePage($type=NULL,$id=NULL) {
	/*
	 * Il problema di explorer dovrebbe essere il div contenuti seguente
	 * che non va chiuso in index 
	 * 
	 */
	?>
	</div><!-- Chiusura div contenuti -->
	<div id="menu"><!-- Apertura div menu -->
	
	<?php
	if($type=="id_booking"){
		include_once 'function/function_booking.php';
		include_once 'function/function_date.php';
		$booking = getBookingById($id);
		$date_stamp_in = date2dateStamp($booking['date_in']);
		$id_room = $booking['room'];
		$id_client = $booking['client'];
		?>
		<div id="item_menu" onclick="window.location.href='index.php'" title="Mese Corrente">
			<img alt="Mese Corrente" title="Mese Corrente" src="images/icons/calendar.png"/>
			Mese Corrente
		</div>
		<div id="item_menu" onclick="window.location.href='add_visitor.php?id_booking=<?php echo $id;?>'" title="Aggiungi Visitatore">
			<img alt="Aggiungi Visitatore" title="Aggiungi Visitatore" src="images/icons/visitors.png"/>
			Visitatore
		</div>
		<div id="item_menu" onclick="window.location.href='booking.php?id_room=<?php echo $id_room;?>
								&date_stamp_in=<?php echo $date_stamp_in;?>&id_client=<?php echo $id_client;?>'" title="Ritorna alla Prenotazione">
			<img alt="Ritorna alla Prenotazione" title="Ritorna alla Prenotazione" src="images/icons/return_booking.png"/>
			Info Prenotazione
		</div>
		<div id="item_menu" onclick="window.location.href='modific_booking.php?id_booking=<?php echo $id;?>'" title="Modifica Prenotazione">
			<img alt="Modifica Prenotazione" title="Modifica Prenotazione" src="images/icons/edit_booking.png"/>
			Modifica
		</div>
		
		<script LANGUAGE="JavaScript">
			function confirmDeleteBooking(id_booking)
			{
				var agree=confirm("Eliminare prenotazione?");
				if (agree){
					window.location.href="delete_booking.php?id_booking="+id_booking;
					return true ;
				}
				else
					return false ;
			}
		</script>
		<div id="item_menu" onClick="confirmDeleteBooking(<?php echo $id;?>);" title="Elimina Prenotazione">
			<img alt="Elimina Prenotazione" title="Elimina Prenotazione" src="images/icons/delete_booking.png"/>
			Elimina
		</div>
		<div id="item_menu" onclick="window.location.href='option_booking.php?id_booking=<?php echo $id;?>'" title="Servizi Stanza">
			<img alt="Servizi Stanza" title="Servizi Stanza" src="images/icons/services.png"/>
			Servizi Stanza
		</div>
		<div id="item_menu" onclick="window.location.href='report.php?id_booking=<?php echo $id;?>'" title="Crea notificato">
			<img alt="Crea notificato" title="Crea notificato" src="images/icons/notify1.png"/>
			Crea notificato
		</div>
	<?php
	}else{
		?>
		<div id="item_menu" onclick="window.location.href='index.php'" title="Mese Corrente">
			<img alt="Mese Corrente" title="Mese Corrente" src="images/icons/calendar.png"/>
			Mese Corrente
		</div>
		<div id="item_menu" onclick="window.location.href='modific_client.php'" title="Gestione clienti">
			<img alt="Gestione clienti" title="Gestione clienti" src="images/icons/client.png"/>
			Clienti
		</div>
		<div id="item_menu" onclick="window.location.href='room.php'" title="Gestione Stanze">
			<img alt="Gestione Stanze" title="Gestione Stanze" src="images/icons/room.png"/>
			Stanze
		</div>
		<div id="item_menu" onclick="window.location.href='product.php?add_product=true'" title="Gestione Servizi">
			<img alt="Gestione Servizi" title="Gestione Servizi" src="images/icons/services.png"/>
			Servizi
		</div>
		<div id="item_menu" onclick="window.location.href='option.php'" title="Gestione Notificati">
			<img alt="Gestione Notificati" title="Gestione Notificati" src="images/icons/notify.png"/>
			Notificati
		</div>
		<?php
	}
	?>
	</div><!-- Chiusura div menu -->
	</div><!-- Chiusura div pagina -->
	<?php
	include 'include/footer.php';
}
?>