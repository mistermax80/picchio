<?php
require_once '../../function/function_client.php';
require_once '../../include/site_config.php';
include_once '../../function/function_page.php';

var_dump($_POST['submit']);

if(isset($_POST['submit']) && $_POST['submit']!=""){
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
	$relative = $booking["client"];
	$relationship = $_POST['relationship'];
	$id_client = addClient($name,$surname,$type_document,$number_document,$release_document_date,$release_document_to,$nationality,$date_birth,$city_birth,$address,$city,$telephone,$email,$relative,$relationship);
	?>
	<script type="text/javascript">
		alert("Cliente aggiunto con successo!");
		window.location.href="index.php";
	</script>
	<?php 
}
drawOpenPage();
?>

<div id="titoloContenuti">AGGIUNGI NUOVO CLIENTE</div>

<form id="insert" name="insert" method="post">
	<table align="center" id="tabella">
		<tr>
			<th>Cognome</th>
			<td><input type="text" name="surname" autocomplete="off"/></td>
		</tr>
		<tr>
			<th>Nome</th>
			<td><input type="text" name="name" autocomplete="off"/></td>
		</tr>
		<tr>
			<th>Tipo Documento</th>
			<td><select name="type_document" class="">
					<option value="cartaIdentita" selected="selected">Carta di Identit&agrave;</option>
					<option value="patente">Patente di Guida</option>
					<option value="passaporto">Passaporto</option>
					<option value="altro">Altro</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Num. Documento</th>
			<td><input type="text" name="number_document" autocomplete="off"/></td>
		</tr>
		<tr>
			<th>Documento rilasciato il</th>
			<td><input type="text" name="release_document_date" autocomplete="off"/></td>
		</tr>
		<tr>
			<th>Documento rilasciato da</th>
			<td><input type="text" name="release_document_to" autocomplete="off"/></td>
		</tr>
		<tr>
			<th>Cittadinanza</th>
			<td><input type="text" name="nationality" autocomplete="off"/></td>
		</tr>
		<tr>
			<th>Data Nascita</th>
			<td><input type="text" name="date_birth" autocomplete="off"/></td>
		</tr>
		<tr>
			<th>Luogo Nascita</th>
			<td><input type="text" name="city_birth" autocomplete="off"/></td>
		</tr>
		<tr>
			<th>Indirizzo</th>
			<td><input type="text" name="address" autocomplete="off"/></td>
		</tr>
		<tr>
			<th>Citt&agrave;</th>
			<td><input type="text" name="city" autocomplete="off"/></td>
		</tr>
		<tr>
			<th>Telefono</th>
			<td><input type="text" name="telephone" autocomplete="off"/></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><input type="text" name="email" autocomplete="off"/></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Salva" /></td>
		</tr>
	</table>
</form>
<?php 
drawClosePage();
?>