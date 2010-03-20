<?php
if(isset($_POST['search']) && $_POST['search']!="" ){
	$text_search = $_POST['text_search'];
	$clients = searchClients($text_search);
	?>
<table>
	<tr>
		<th></th>
		<th>Cognome</th>
		<th>Nome</th>
		<th>Tipo Documento</th>
		<th>Num. Documento</th>
		<th>Data di Nascita</th>
		<th>Luogo di Nascita</th>
		<th>Indirizzo</th>
		<th>Citt&agrave;</th>
		<th>Telefono</th>
		<th>Email</th>
	</tr>
	<?php
	$i=0;
	foreach ($clients as $client) {
		if($client['type_document']=="cartaIdentita"){
			$typeDocument="Carta di Identit&agrave;";
		}else if($client['type_document']=="patente"){
			$typeDocument="Patente di Guida";
		}else if($client['type_document']=="passaporto"){
			$typeDocument="Passaporto";
		}else if($client['type_document']=="altro"){
			$typeDocument="Altro";
		}
		
	?>
		<tr class="celle_tabella_<?php echo ($i%2)?>">
		<td><input type="radio" name="id_client" value="<?=$client['id']?>" onclick="enableButtonOnSelect(this.form);"></td>
		<td><?=$client['name']?></td>
		<td><?=$client['surname']?></td>
		<td><?=$typeDocument?></td>
		<td><?=$client['number_document']?></td>
		<td><?=$client['date_birth']?></td>
		<td><?=$client['city_birth']?></td>
		<td><?=$client['address']?></td>
		<td><?=$client['city']?></td>
		<td><?=$client['telephone']?></td>
		<td><?=$client['email']?></td>
		</tr>
	<?php
		$i++;
	}
}
?>
</table>