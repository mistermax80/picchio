<?php
include_once 'function/function_page.php';
include_once 'function/function_client.php';
include_once 'function/function_visitor.php';
include_once 'function/function_date.php';
include_once 'function/function_booking.php';

drawOpenPage();
$date_in = $_POST['date_in'];
$id_room = $_POST['id_room'];

if(isset($_REQUEST['id_booking'])){
	$id_booking = $_REQUEST['id_booking'];
	$booking = getBookingById($id_booking);
	$date_stamp_in = date2dateStamp($booking['date_in']);
}

if(isset($_POST['operation']) && $_POST['operation']=='save'){
	//Aggiungi nel db
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$type_document = $_POST['type_document'];
	$number_document = $_POST['number_document'];
	$release_document_date = $_POST['release_document_date'];
	$release_document_to = $_POST['release_document_to'];
	$nationality = $_POST['nationality'];
	$date_birth = $_POST['date_birth'];
	$city_birth = $_POST['city_birth'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$telephone = $_POST['telephone'];
	$email = $_POST['email'];
	$id_client = addClient($name,$surname,$type_document,$number_document,$release_document_date,$release_document_to,$nationality,$date_birth,$city_birth,$address,$city,$telephone,$email);
	
	
	if(isset($_POST['id_booking'])){
		addVisitor($id_booking,$id_client);
		?>
		<script type="text/javascript">
			alert("Visitatore aggiunto con successo!");
			window.location.href="booking.php?id_room=<?php echo $booking['room']?>&date_stamp_in=<?php echo $date_stamp_in ?>&id_client=<?php echo $booking['client']?>";
	</script>
	<?php 
	}else{
		?>
		<script type="text/javascript">
			alert("Cliente aggiunto con successo!");
			window.location.href="modific_client.php";
		</script>
		<?php 
	}
}else if (isset($_POST['id_booking'])){
	//aggiungi cliente da prenotazione
	?>
	
<div id="titoloContenuti">AGGIUNGI  NUOVO CLIENTE</div>

	<form id="add_client" name="add_client" method="post">
		<input type="hidden" name="operation" value="save" />
		<input type="hidden" name="id_booking" value="<?php echo $id_booking?>"/>
		<table align="center">
			<tr>
				<td>Cognome</td>
				<td><input type="text" name="surname" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Nome</td>
				<td><input type="text" name="name" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Tipo Documento</td>
				<td><input type="text" name="type_document" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Num. Documento</td>
				<td><input type="text" name="number_document" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Documento rilasciato il</td>
				<td><input type="text" name="release_document_date" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Documento rilasciato da</td>
				<td><input type="text" name="release_document_to" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Cittadinanza</td>
				<td><input type="text" name="nationality" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Data Nascita</td>
				<td><input type="text" name="date_birth" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Luogo Nascita</td>
				<td><input type="text" name="city_birth" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Indirizzo</td>
				<td><input type="text" name="address" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Citt&agrave;</td>
				<td><input type="text" name="city" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Telefono</td>
				<td><input type="text" name="telephone" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" autocomplete="off"/></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td><button value="submit">Salva</button></td>
			</tr>
		</table>
	</form>
	
<?php drawClosePage("id_booking",$id_booking);
}else{
	?>
	<div id="titoloContenuti">AGGIUNGI  NUOVO CLIENTE</div>

	<form id="add_client" name="add_client" method="post">
	<input type="hidden" name="date_in" value="<?php echo $date_in;?>"/>
		<input type="hidden" name="id_room" value="<?php echo $id_room;?>"/>
		<input type="hidden" name="operation" value="save" />
		<table align="center">
			<tr>
				<td>Cognome</td>
				<td><input type="text" name="surname" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Nome</td>
				<td><input type="text" name="name" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Tipo Documento</td>
				<td><input type="text" name="type_document" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Num. Documento</td>
				<td><input type="text" name="number_document" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Documento rilasciato il</td>
				<td><input type="text" name="release_document_date" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Documento rilasciato da</td>
				<td><input type="text" name="release_document_to" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Cittadinanza</td>
				<td><input type="text" name="nationality" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Data Nascita</td>
				<td><input type="text" name="date_birth" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Luogo Nascita</td>
				<td><input type="text" name="city_birth" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Indirizzo</td>
				<td><input type="text" name="address" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Citt&agrave;</td>
				<td><input type="text" name="city" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Telefono</td>
				<td><input type="text" name="telephone" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" autocomplete="off"/></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td><button value="submit">Salva</button></td>
			</tr>
		</table>
	</form>
	
<?php drawClosePage(); 
	}
?>