<?php

include 'include/pagina_apertura.php';
include_once 'function/function_client.php';
include_once 'function/function_room.php';
include_once 'function/function_booking.php';
include_once 'include/costant_generic.php';

$date_stamp_in = $_REQUEST['date_stamp_in'];
$id_room = $_REQUEST['id_room'];
$id_client = $_REQUEST['id_client'];
$rooms = getRooms();

?><div id="titoloContenuti">PRENOTAZIONE</div>

<?php 
$booking = getBooking($date_stamp_in,$id_room);

//Se il cliente è settato allora mostra info cliente e procedi con la form della stanza
if(isset($_POST['id_client']) || isset($_REQUEST['id_client'])){
	if(isset($_POST['id_client'])){
		$id_client = $_POST['id_client'];
	}else if(isset($_REQUEST['id_client'])){
		$id_client = $_REQUEST['id_client'];
	}
	//Visualizza Info Cliente
	$client = getClient($id_client);
	echo "<b>Informazioni Cliente</b>";
	echo "<br>Nome: ".$client['name'];
	echo "<br>Cognome: ".$client['surname'];
	echo "<br>Indirizzo: ".$client['address'];
	echo "<br>Citt&agrave;: ".$client['city'];
	echo "<br>Telefono: ".$client['telephone'];
	//Mostra form di prenotazione
	if(isset($_POST['id_room'])){
		$id_room = $_POST['id_room'];
		$date_in = $_POST['date_in'];
		$date_out = $_POST['date_out'];
		$note = $_POST['note'];
		//Controllo che dicponibilità della stanza nell'intervallo dei giorni
		if(checkFreeBooking($date_in,$date_out,$id_room)){
			//Salvo i dati della prenotazione
			insertBooking($id_client,$id_room,$date_in,$date_out,$note);
			//Ritorno al calendario
			echo "Inserimento avvenuto con successo";
			echo "<br><a href=\"".page_calendar."\">Ritorna al calendario</a>";
			include 'include/pagina_chiusura.php';
		}else{
			echo "Stanza Occupata nei giorni richiesti!";
			echo "<br><a href=\"".page_calendar."\">Ritorna al calendario</a>";
			include 'include/pagina_chiusura.php';
		}
		
	}else if(count($booking)>0){  //Esiste la prenotazione
		echo "<br><br><br>";
		echo "<b>Informazioni prenotazione</b>";
		echo "<br>Stanza: ".$booking['room'];
		echo "<br>Data ingresso: ".substr($booking['date_in'],0,10);
		echo "<br>Data uscita: ".substr($booking['date_out'],0,10);
		echo "<br>Note: ".$booking['note'];
		?>	
	<br><br><br>	
    <button onclick="window.location.href='modific_booking.php?id_booking=<?php echo $booking['id'];?>'">Modifica Stanza</button>
    <br><br><br>
    <button onclick="window.location.href='option_booking.php?id_booking=<?php echo $booking['id'];?>'">Servizi Stanza</button>
    <?php include 'include/pagina_chiusura.php';?>
    <?php 
	}else{
		//Mostro form di compilazione prenotazione della stanza
		?>
		<br><br><br>
		<form id="add_booking" name="add_booking" method="post">
		<input type="hidden" name="id_room" value="<?php echo $id_room;?>" />
		<input type="hidden" name="id_client" value="<?php echo $id_client;?>" />
		<table align="center" aalbordercolor="FFFFFF">
			<tr>
				<td>Camera</td>
				<td>
					<input type="text" name="id_room" value="<?php echo "".$id_room;?>"/>
					<select id="room" name="room">
					<?php 
						foreach ($rooms as $r) {
							if($r['id']==$id_room){
								echo "<option value='".$r['id']."' selected='selected'>Stanza: ".$r['id']." - ".$r['type']."</option>";
							}else{
								echo "<option value='".$r['id']."' > Stanza: ".$r['id']." - ".$r['type']."</option>";	
							}
						}
					?>
					</select>
				</td>
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
			<tr>
				<td></td>
				<td><button value="submit">Salva</button></td>
			</tr>
		</table>
		</form>
				<?php
				include 'include/pagina_chiusura.php';
			}
		}else{ ?>
		<form id="select_client" name="select_client" method="post">
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
				echo "<td><input type=\"radio\" name=\"id_client\" value=\"".$id."\"/></td>";
				echo "<td>".$name."</td>";
				echo "<td>".$surname."</td>";
				echo "</tr>";
			}
			?>
			<tr>
				<td></td>
				<td><br><button id="picchio" value="submit">Invia</button></td>
			</tr>
			
			<tr>
				<td></td>
			</tr>
			
			<tr>
				<td></td>
			</tr>
			</table>
			</form>
			<form id="add_client" name="add_client" action="add_client.php" method="post">
				<input type="hidden" name="date_in" value="<?php echo $date_in;?>"/>
				<input type="hidden" name="id_room" value="<?php echo $id_room;?>"/>
				<button id="add_client" value="submit">Aggiungi Cliente</button>
				</form>
		
		
<?php 
		include 'include/pagina_chiusura.php';
		}?>