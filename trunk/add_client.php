<?php
include_once 'function/function_page.php';
include_once 'function/function_client.php';
include_once 'function/function_visitor.php';

drawOpenPage();

$id_booking = $_REQUEST['id_booking'];

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
	
	
	if(isset($_POST['id_booking'])){
		addVisitor($id_booking,$id_client);
		echo "Visitatore aggiunto con successo.";
		drawClosePage("id_booking",$id_booking);
	}else{
		echo "Cliente aggiunto con successo.";
		drawClosePage();
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