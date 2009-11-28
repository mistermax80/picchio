<?php

include 'include/pagina_apertura.php';
include_once 'function/function_client.php';

?>

<div id="titoloContenuti">GESTIONE CLIENTI</div> 
<?php if (!($_POST['client'])){?>


QUA SI PUò METTERE ANCHE UNA RICERCA AVANZATA..CMQ POI LA VEDIAMO!!!
<br><br><br>


<form id="mofidic_client" name="mofidic_client" action="modific_client.php" method="post">
		<input type="hidden" id="client" name="client" value="true"/>
<table align="center" bordercolor="FFFFFF">
			<tr>
				<th></th>
				<td><b>Nome</b></td>
				<td><b>Cognome</b></td>
			</tr>
			<?php
			$clients = getClients();
		
			foreach ($clients as $c) {
				$id = $c['id'];
				$name = $c['name'];
				$surname = $c['surname'];
				echo "<tr>";
				echo "<td><input type=\"radio\" name=\"id\" value=\"".$id."\"/></td>";
				echo "<td>".$name."</td>";
				echo "<td>".$surname."</td>";
				echo "</tr>";
			}
			?>
			<tr>
			
				<td></td>
				<td></td>
				<td><br>
				<button value="submit">Modifica informazioni cliente</button></td>
			</table>
			</form>
		



<?php 
}if($_POST['salva']){
	
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
	updateClient($id,$name,$surname,$type_document,$number_document,$date_birth,$city_birth,$address,$city,$telephone,$email);
	//header ('Location: http://localhost/progetti-php/hotel/index.php');


}else if($_POST['client']){
	
	$id_client = $_POST['id']; 


	$client = getClient($id_client);
	//Aggiungi nel db
	$id = $client['id'];
	$name = $client['name'];
	$surname = $client['surname'];
	$type_document = $client['type_document'];
	$number_document = $client['number_document'];
	$date_birth = $client['date_birth'];
	$city_birth = $client['city_birth'];
	$address = $client['address'];
	$city = $client['city'];
	$telephone = $client['telephone'];
	$email = $client['email'];
	
	
	
	
	//copia
	?>
<form id="mofidic_client" name="mofidic_client" action="" method="post">
		<input type="hidden" id="id" name="id" value="<?php echo $client['id'];?>"/>
		<input type="hidden" id="salva" name="salva" value="true"/>
		<input type="hidden" id="client" name="client" value="false"/>
		<table align="center">
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