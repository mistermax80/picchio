<?php

include 'include/pagina_apertura.php';
include_once 'function/function_client.php';

?><div id="titoloContenuti">GESTIONE CLIENTI</div> 



<?php 
if($_POST['salva']){
	
	//Aggiorna nel db
	$id = $_POST['id'];
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
	$id_client = updateClient($id,$name,$surname,$type_document,$number_document,$date_birth,$city_birth,$address,$city,$telephone,$email);
	echo "Informazioni Cliente Correttamente Modificati!";
	include 'include/pagina_chiusura.php';
}else{
$id_client = $_POST['id'];



	$client = getClient($id_client);
	//Aggiungi nel db
	$id = $client['id'];
	$name = $client['name'];
	$surname = $cleint['surname'];
	$type_document = $cleint['type_document'];
	$number_document = $cleint['number_document'];
	$date_birth = $cleint['date_birth'];
	$city_birth = $cleint['city_birth'];
	$address = $cleint['address'];
	$city = $cleint['city'];
	$telephone = $cleint['telephone'];
	$email = $cleint['email'];
	
	
	
	
	//copia
	?>
<form id="add_client" name="add_client" action="" method="post">
		<input type="hidden" id="salva" name="salva" value="true"/>
		<input type="hidden" name="operation" value="save" />
		<table align="center">
			<tr>
				<td></td>
				<td><?php $client['id'];?></td>
			</tr>
			<tr>
				<td>Nome</td>
				<td><input type="text" name="name" value="<?php echo $client['name'];?>"/></td>
			</tr>
			<tr>
				<td>Cognome</td>
				<td><input type="text" name="surname" value="<?php echo $client['surname'];?>"/></td>
			</tr>
			<tr>
				<td>Tipo Documento</td>
				<td><input type="text" name="type_document" value="<?php echo $client['type_document'];?>"/></td>
			</tr>
			<tr>
				<td>Num. Documento</td>
				<td><input type="text" name="number_document" value="<?php echo $client['number_document'];?>"/></td>
			</tr>
			<tr>
				<td>Data Nascita</td>
				<td><input type="text" name="date_birth" value="<?php echo $client['date_birth'];?>"/></td>
			</tr>
			<tr>
				<td>Luogo Nascita</td>
				<td><input type="text" name="city_birth" value="<?php echo $client['city_birth'];?>"/></td>
			</tr>
			<tr>
				<td>Indirizzo</td>
				<td><input type="text" name="address" value="<?php echo $client['address'];?>"/></td>
			</tr>
			<tr>
				<td>Citt&agrave;</td>
				<td><input type="text" name="city" value="<?php echo $client['city'];?>"/></td>
			</tr>
			<tr>
				<td>Telefono</td>
				<td><input type="text" name="telephone" value="<?php echo $client['telephone'];?>"/></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $client['email'];?>"/></td>
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
	
	
<?php 
}
include 'include/pagina_chiusura.php';
?>