
<?php 	
	
include_once 'function/function_client.php';
include_once 'function/function_booking.php';


$booking = $_REQUEST['id'];
$client = $_REQUEST['id'];

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

;
	//Visualizza Info Prenotazione
	$booking = getBooking($booking);
	echo "<fieldset>";
	echo "<b>Informazioni prenotazione</b>";
	echo "<br>Stanza: ".$booking['room'];
	echo "<br>Data ingresso: ".$booking['date_in'];
	echo "<br>Data uscita: ".$booking['date_out'];
	echo "<br>Note: ".$booking['note'];
	echo "</fieldset>";
	
	?>

	<form id="modific_room" name="modific_room" action="modific_room.php" method="post">
    <input type="hidden" name="room" value="<?php echo $room;?>"/>
    <button value="submit">Modifica Stanza</button>
    </form>
    
    <form id="home_page" name="home_page" action="index.php" method="post">
    <button value="submit">Home Page</button>
    </form>



