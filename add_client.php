<?php
include_once 'function/function_page.php';
include_once 'function/function_client.php';

drawOpenPage();

if(isset($_POST['operation']) && $_POST['operation']=='save'){
	//Aggiungi nel db
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$type_document = $_POST['type_document'];
	$number_document = $_POST['number_document'];
	$date_birth = $_POST['date_birth'];
	$city_birth = $_POST['city_birth'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$telephone = $_POST['telephone'];
	$email = $_POST['email'];
	$id_client = addClient($name,$surname,$type_document,$number_document,$date_birth,$city_birth,$address,$city,$telephone,$email);
	
	echo "Cliente aggiunto con successo.";
	if(isset($_POST['return_page']) && $_POST['return_page']=="booking"){
		echo "<a href=\"booking.php?id_client=".$id_client."&date_stamp_in=".$_POST['date_in']."&id_room=".$_POST['id_room']."\">Torna a prenotazione</a>";
	}else if(isset($_POST['return_page']) && $_POST['return_page']=="client"){
		echo "<a href=\"modific_client.php\">Ritorna</a>";
	}else{
		//echo "<a href=\"index.php\">Ritorna</a>";
	}
}else{

	?>
<div id="titoloContenuti">AGGIUNGI  NUOVO CLIENTE</div>

	<form id="add_client" name="add_client" method="post">
		<input type="hidden" name="operation" value="save" />
		<input type="hidden" name="id_booking" value="<?php echo $_POST['id_booking']?>"/>
		<input type="hidden" name="date_in" value="<?php echo $_POST['date_in']?>"/>
		<input type="hidden" name="id_room" value="<?php echo $_POST['id_room']?>"/>
		<input type="hidden" name="return_page" value="<?php echo $_POST['return_page']?>"/>
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


<?php }
drawClosePage();
?>