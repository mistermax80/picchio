
<?php 	
	
include_once 'function/function_client.php';
include_once 'function/function_booking.php';


$booking = 7;//$_REQUEST['idb'];
$client = 3;//$_REQUEST['idc'];

    //Visualizza Info Prenotazione
	$booking = getBookingById($booking);
	echo "<fieldset>";
	echo "<b>Informazioni prenotazione</b>";
	echo "<br>Stanza: ".$booking['room'];
	echo "<br>Data ingresso: ".substr($booking['date_in'],0,10);
	echo "<br>Data uscita: ".substr($booking['date_out'],0,10);
	echo "<br>Note: ".$booking['note'];
	echo "</fieldset>";
	
	$client = getClient($client);
	//Visualizza Info Cliente
	echo "<fieldset>";
	echo "<b>Informazioni Cliente</b>";
	echo "<br>Nome: ".$client['name'];
	echo "<br>Cognome: ".$client['surname'];
	echo "<br>Indirizzo: ".$client['address'];
	echo "<br>Citt&agrave;: ".$client['city'];
	echo "<br>Telefono: ".$client['telephone'];
	echo "</fieldset>";

	?>

	<form id="modific_room" name="modific_room" action="modific_room.php" method="post">
    <input type="hidden" name="room" value="<?php echo $booking['room'];?>"/>
    <button value="submit">Modifica Stanza</button>
    </form>
    
    <form id="optional" name="optional" action="optional.php" method="post">
    <input type="hidden" name="booking" value="<?php echo $booking['id'];?>"/>
    <button value="submit">Servizi Stanza</button>
    </form>
    
    <form id="home_page" name="home_page" action="index.php" method="post">
    <button value="submit">Home Page</button>
    </form>



