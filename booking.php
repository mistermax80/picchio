<?php

include_once 'function/function_client.php';
include_once 'function/function_booking.php';

$date_in = $_REQUEST['date_in'];
$id_room = $_REQUEST['id_room'];

if(isset($_POST['id_client']) || isset($_REQUEST['id_client'])){
	if(isset($_POST['id_client'])){
		$id_client = $_POST['id_client'];
	}else if(isset($_REQUEST['id_client'])){
		$id_client = $_REQUEST['id_client'];
	}
	//Visualizza Info Cliente
	echo "<fieldset>";
	$client = getClient($id_client);
	echo "<b>Informazioni Cliente</b>";
	echo "<br>Nome: ".$client['name'];
	echo "<br>Cognome: ".$client['surname'];
	echo "<br>Indirizzo: ".$client['address'];
	echo "<br>Citt&agrave;: ".$client['city'];
	echo "<br>Telefono: ".$client['telephone'];
	echo "</fieldset>";
	//Mostra form di prenotazione
	if(isset($_POST['id_room'])){
		$id_room = $_POST['id_room'];
		$date_in = $_POST['date_in'];
		$date_out = $_POST['date_out'];
		$note = $_POST['note'];
		//Salvo i dati della prenotazione
		insertBooking($id_client,$id_room,$date_in,$date_out,$note); 
		//pikkio qua dovrebbe saltare alla index ma non riesco a farlo funzionare!!!
	}else{
		//Mostro form di compilazione prenotazione
		?>
<form id="add_booking" name="add_booking" method="post">
<input type="hidden" name="id_room" value="<?php echo $id_room;?>" />
<input type="hidden" name="id_client" value="<?php echo $id_client;?>" />
<fieldset>
<table bordercolor="FFFFFF" border="1px">
	<tr>
		<td>Camera</td>
		<td><input type="text" name="id_room" value="<?php echo $id_room;?>"/></td>
	</tr>
	<tr>
		<td>Data Arrivo</td>
		<td><input type="text" name="date_in" value="<?php echo $date_in;?>"/></td>
	</tr>
	<tr>
		<td>Data Uscita</td>
		<td><input type="text" name="date_out" /></td>
	</tr>
	<tr>
		<td>Note</td>
		<td><input type="text" name="note" /></td>
	</tr>
</table>
<button value="submit">Salva</button>
</fieldset>
</form>
		<?php
	}
}else{ ?>
<div align="center">
<fieldset>
<form id="select_client" name="select_client" method="post">
<table bordercolor="FFFFFF" border="1px">
	<tr>
		<th></th>
		<th>Nome</th>
		<th>Cognome</th>
	</tr>
	<?php
	$clients = getClients();

	foreach ($clients as $c) {
		$id = $c['id'];
		$name = $c['name'];
		$surname = $c['surname'];
		echo "<tr>";
		echo "<td><input type=\"radio\" name=\"id_client\" value=\"".$id."\"/></td>";
		echo "<td>".$name."</td>";
		echo "<td>".$surname."</td>";
		echo "</tr>";
	}
	?>
</table>
<button id="picchio" value="submit">Invia</button>
</form>

<form id="add_client" name="add_client" action="add_client.php" method="post">
<input type="hidden" name="date_in" value="<?php echo $date_in;?>"/>
<input type="hidden" name="id_room" value="<?php echo $id_room;?>"/>
<button value="submit">Aggiungi Cliente</button>
</form>

	
<form id="home_page" name="home_page" action="index.php" method="post">
<button value="submit">Home Page</button>
</form>
</fieldset>


<?php }?>