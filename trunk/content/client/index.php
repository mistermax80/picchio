<?php
/**
 * Questa pagina è incaricata di mostrare i bottoni delle funzioni relative
 * alla gestione dell'area in interesse (client, optional, ecc.), una volta 
 * avviata la ricerca, verrà mostrata anche la tabella con le relative informazioni.
 * 
 * Per eliminare, o inserire o modificare un particolare oggetto la pagina redigire
 * su pagine che hanno il compito di effettare quelle determinate operazioni.  
 */
include_once $_SERVER['DOCUMENT_ROOT'].'/_base.inc.php';
include_once FUNCTION_PATH.'function_page.php';
include_once FUNCTION_PATH.'function_client.php';
include_once FUNCTION_PATH.'function_booking.php';
include_once FUNCTION_PATH.'function_date.php';

drawOpenPage("Gestione Clienti");
// Bottoni delle funzioni, Form di ricerca
?>
<script language="JavaScript" type="text/javascript">
<!--
function enableButtonOnSelect(form) {
	<?php if($_SESSION['new_booking']==true) echo "form.select.disabled=false;"?>
	form.update.disabled=false;
	form.enabledDelete.disabled=false;
}
//-->
</script>

<script language="JavaScript" type="text/javascript">
<!--
function enableButtonDelete(form) {
	if(form.delete.disabled==true){
		form.delete.disabled=false;
	}else{
		form.delete.disabled=true;
	}
}
//-->
</script>

<div id="tabella">
<form method="post">
<table bgcolor="#E5E5E5">
	<tr>
		<td><input type="submit" name="insert" value="Aggiungi Nuovo Cliente"></td>
		<td><input id="text_search" name="text_search" type="text" name="search" value="">
			<input type="submit" id="search" name="search" value="Cerca Cliente"></td>
			
		<td>
			<input type="submit" name="select" value="Prenota" disabled="disabled">
			<input type="submit" name="update" value="Modifica" disabled="disabled">
			<font style="font-size: 7pt;">Sblocca Elimina</font><input type="checkbox" name="enabledDelete" value="enabledDelete" disabled="disabled" onclick="enableButtonDelete(this.form)" value="Elimina">
			<input type="submit" name="delete" value="Elimina" disabled="disabled">
		</td>
	</tr>
</table>

<?php

if(isset($_POST['select']) && $_POST['select']!="" ){
	// Torna al booking per la registrazione della prenotazione
	//echo BOOKING_LOCATION.'form.php';
	$_SESSION['id_client'] = $_POST['id_client'];
	include '../../'.BOOKING_LOCATION.'form.php';
}

if(isset($_POST['insert_booking']) && $_POST['insert_booking']!="" ){

	$id_room = $_SESSION['id_room'];
	$date_in = dateIT2EN($_POST['date_in']);
	$date_out = dateIT2EN($_POST['date_out']);

	$number_client = $_POST['number_client'];
	$note = $_POST['note'];
	//Controllo che disponibilità della stanza nell'intervallo dei giorni
	if(checkFreeBooking($date_in,$date_out,$id_room)){
		if(date2dateStamp($date_in) > date2dateStamp($date_out)){
			?>
			<script type="text/javascript">
				alert("Attenzione: la data di uscita non può essere precedente alla data di ingresso!");
				window.location.href="index.php";
			</script>
			<?php
		}else if(date2dateStamp($date_in) == date2dateStamp($date_out)){
			?>
			<script type="text/javascript">
				alert("Attenzione: la data di uscita non può coincidere con la data di ingresso!");
				window.location.href="index.php";
			</script>
			<?php 
		}else if(date2dateStamp($date_in) < date2dateStamp(time()) || date2dateStamp($date_out) < date2dateStamp(time())){
			?>
			<script type="text/javascript">
				alert("Attenzione: Non può essere effettuata una prenotazione per i giorni passati!");
				window.location.href="index.php";
			</script>
			<?php 
		}else{//Salvo i dati della prenotazione
			if($number_client==0 || (isset($number_client))){
					$number_client = 1;	
			}
			insertBooking($_SESSION['id_client'],$id_room,$date_in,$date_out,$number_client,$note);
			unset($_SESSION['id_client']);
			unset($_SESSION['id_room']);
			unset($_SESSION['new_booking']);
			unset($_SESSION['date_stamp_in']);
		}
	}else{
		?>
		<script type="text/javascript">
			alert("Attenzione: si è verificato un errore!");
			window.location.href="index.php";
		</script>
		<?php 
	}
}

if(isset($_POST['search']) && $_POST['search']!="" ){
	// Mostra la tabella dei risultati 
	include 'search.php';
}
if(isset($_POST['delete']) && $_POST['delete']!="" ){
	// Rimozione dell'oggetto relativo
	include 'delete.php';
}
if(isset($_POST['update']) && $_POST['update']!="" ){
	//Controllo se è stato impostato un id_client
	if(isset($_POST['id_client']) && $_POST['id_client']!="" ){
		$client = getClient($_POST['id_client']);
	}
	// Mostra Form Aggiornamento dell'oggetto relativo
	include 'form.php';
}
if(isset($_POST['insert']) && $_POST['insert']!="" ){
	// Mostra Form Inserimento dell'oggetto relativo
	include 'form.php';
}

// Azioni relative al DB
if(isset($_POST['insert_data']) && $_POST['insert_data']!=""){
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
	$id_client = addClient($name,$surname,$type_document,$number_document,$release_document_date,$release_document_to,$nationality,$date_birth,$city_birth,$address,$city,$telephone,$email);
	?>
	<script type="text/javascript">
		alert("Cliente aggiunto con successo!");
		window.location.href="index.php";
	</script>
	<?php 
}

if(isset($_POST['update_data']) && $_POST['update_data']!=""){
	//Aggiorna nel db
	$id =  $_POST['id_client'];
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
	$id_client = updateClient($id,$name,$surname,$type_document,$number_document,$release_document_date,$release_document_to,$nationality,$date_birth,$city_birth,$address,$city,$telephone,$email);
	?>
	<script type="text/javascript">
		alert("Cliente aggiornato con successo!");
		window.location.href="index.php";
	</script>
	<?php 
}
?>
</form>
</div>
<?php drawClosePage();?>