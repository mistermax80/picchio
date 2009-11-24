<form id="home_page" name="home_page" action="index.php" method="post">
<button value="submit">Home Page</button>
</form>

<?php

include_once 'function/function_client.php';
include_once 'function/function_booking.php';
include_once 'include/costant_generic.php';

$date_stamp_in = $_REQUEST['date_stamp_in'];
$id_room = $_REQUEST['id_room'];
$id_client = $_REQUEST['id_client'];

$booking = getBooking($date_stamp_in,$id_room);

//Se il cliente è settato allora mostra info cliente e procedi con la form della stanza
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
		//Ritorno al calendario
		echo "Inserimento avvenuto con successo";
		echo "<br><a href=\"".page_calendar."\">Ritorna al calendario</a>";
	}else if(count($booking)>0){  //Esiste la prenotazione
		echo "<fieldset>";
		echo "<b>Informazioni prenotazione</b>";
		echo "<br>Stanza: ".$booking['room'];
		echo "<br>Data ingresso: ".substr($booking['date_in'],0,10);
		echo "<br>Data uscita: ".substr($booking['date_out'],0,10);
		echo "<br>Note: ".$booking['note'];
		echo "</fieldset>";
		?>
		<form id="modific_room" name="modific_room" action="modific_room.php" method="post">
    <input type="hidden" name="room" value="<?php echo $booking['room'];?>"/>
    <button value="submit">Modifica Stanza</button>
    </form>
    
    <form id="optional" name="optional" action="optional.php" method="post">
    <input type="hidden" name="booking" value="<?php echo $booking['id'];?>"/>
    <button value="submit">Servizi Stanza</button>
    </form>
    <?php 
	}else{
		//Mostro form di compilazione prenotazione della stanza
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
				<td><input type="text" name="date_in" value="<?php echo date(format_date,$_REQUEST['date_stamp_in']);?>"/></td>
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