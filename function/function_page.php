<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/_base.inc.php';
 
function drawOpenPage() {
	include INCLUDE_PATH.'header.php';
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
	 * Il div è comune a contenuti o a calendario
	 * 
	 */
	?>
	</div><!-- Chiusura div contenuti o calendario se c'è il calendario visualizzato -->
	<div id="menu"><!-- Apertura div menu -->
	<div id="item_menu" onclick="window.location.href='<?php echo ROOT_LOCATION?>index.php'" title="Mese Corrente">
		<img alt="Mese Corrente" title="Mese Corrente" src="<?php echo ICONS_LOCATION?>calendar.png"/>
		<span>Mese Corrente</span>
	</div>
	
	<?php
	if($type=="id_booking"){
		include_once 'function/function_booking.php';
		include_once 'function/function_date.php';
		$booking = getBookingById($id);
		$date_stamp_in = date2dateStamp($booking['date_in']);
		$id_room = $booking['room'];
		$id_client = $booking['client'];
		?>
		<div id="item_menu" onclick="window.location.href='add_visitor.php?id_booking=<?php echo $id;?>'" title="Aggiungi Visitatore">
			<img alt="Aggiungi Visitatore" title="Aggiungi Visitatore" src="<?php echo ICONS_LOCATION?>visitors.png"/>
			<span>Visitatore</span>
		</div>
		<div id="item_menu" onclick="window.location.href='booking.php?id_room=<?php echo $id_room;?>&date_stamp_in=<?php echo $date_stamp_in;?>&id_client=<?php echo $id_client;?>'" title="Ritorna alla Prenotazione">
			<img alt="Ritorna alla Prenotazione" title="Ritorna alla Prenotazione" src="<?php echo ICONS_LOCATION?>return_booking.png"/>
			<span>Info Prenotazione</span>
		</div>
		<div id="item_menu" onclick="window.location.href='modific_booking.php?id_booking=<?php echo $id;?>'" title="Modifica Prenotazione">
			<img alt="Modifica Prenotazione" title="Modifica Prenotazione" src="<?php echo ICONS_LOCATION?>edit_booking.png"/>
			<span>Modifica</span>
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
			<img alt="Elimina Prenotazione" title="Elimina Prenotazione" src="<?php echo ICONS_LOCATION?>delete_booking.png"/>
			<span>Elimina</span>
		</div>
		<div id="item_menu" onclick="window.location.href='option_booking.php?id_booking=<?php echo $id;?>'" title="Servizi Stanza">
			<img alt="Servizi Stanza" title="Servizi Stanza" src="<?php echo ICONS_LOCATION?>services.png"/>
			<span>Servizi Stanza</span>
		</div>
		<div id="item_menu" onclick="window.location.href='report.php?id_booking=<?php echo $id;?>'" title="Crea notificato">
			<img alt="Crea notificato" title="Crea notificato" src="<?php echo ICONS_LOCATION?>notify1.png"/>
			<span>Crea notificato</span>
		</div>
	<?php
	}else{
		?>
		<div id="item_menu" onclick="window.location.href='<?php echo CLIENT_LOCATION?>'" title="Gestione clienti">
			<img alt="Gestione clienti" title="Gestione clienti" src="<?php echo ICONS_LOCATION?>client.png"/>
			<span>Clienti</span>
		</div>
		<div id="item_menu" onclick="window.location.href='room.php'" title="Gestione Stanze">
			<img alt="Gestione Stanze" title="Gestione Stanze" src="<?php echo ICONS_LOCATION?>room.png"/>
			<span>Stanze</span>
		</div>
		<div id="item_menu" onclick="window.location.href='product.php?add_product=true'" title="Gestione Servizi">
			<img alt="Gestione Servizi" title="Gestione Servizi" src="<?php echo ICONS_LOCATION?>services.png"/>
			<span>Servizi</span>
		</div>
		<div id="item_menu" onclick="window.location.href='option.php'" title="Gestione Notificati">
			<img alt="Gestione Notificati" title="Gestione Notificati" src="<?php echo ICONS_LOCATION?>notify.png"/>
			<span>Notificati</span>
		</div>
		<?php
	}
	?>
	</div><!-- Chiusura div menu -->
	</div><!-- Chiusura div pagina -->
	<?php
	include INCLUDE_PATH.'footer.php';
}
?>