<?php
include 'include/pagina_apertura.php';
include_once 'function/function_client.php';

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
	header ("Location: booking.php?id_client=".$id_client."&date_in=".$_POST['date_in']."&id_room=".$_POST['id_room']);
	exit; 
}else{

	?>

<div align="center">
<fieldset>
<form id="add_client" name="add_client" method="post"><input
	type="hidden" name="operation" value="save" />
	<input type="hidden" name="date_in" value="<?php echo $_POST['date_in']?>"/>
	<input type="hidden" name="id_room" value="<?php echo $_POST['id_room']?>"/>
<table bordercolor="FFFFFF" border="1px">
	<tr>
		<td>Nome</td>
		<td><input type="text" name="name" /></td>
	</tr>
	<tr>
		<td>Cognome</td>
		<td><input type="text" name="surname" /></td>
	</tr>
	<tr>
		<td>Tipo Documento</td>
		<td><input type="text" name="type_document" /></td>
	</tr>
	<tr>
		<td>Num. Documento</td>
		<td><input type="text" name="number_document" /></td>
	</tr>
	<tr>
		<td>Data Nascita</td>
		<td><input type="text" name="date_birth" /></td>
	</tr>
	<tr>
		<td>Luogo Nascita</td>
		<td><input type="text" name="city_birth" /></td>
	</tr>
	<tr>
		<td>Indirizzo</td>
		<td><input type="text" name="address" /></td>
	</tr>
	<tr>
		<td>Citt&agrave;</td>
		<td><input type="text" name="city" /></td>
	</tr>
	<tr>
		<td>Telefono</td>
		<td><input type="text" name="telephone" /></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><input type="text" name="email" /></td>
	</tr>
</table>
<button value="submit">Salva</button>
</form>
</fieldset>
</div>
<?php }
include 'include/pagina_chiusura.php';
?>