<?php
include_once 'function/function_page.php';
include_once 'function/function_client.php';
include_once 'function/function_visitor.php';
include_once 'function/function_date.php';
include_once 'function/function_booking.php';

drawOpenPage();

if(isset($_REQUEST['id_booking'])){
	$id_booking = $_REQUEST['id_booking'];
	$booking = getBookingById($id_booking);
	$date_stamp_in = date2dateStamp($booking['date_in']);
}

if(isset($_POST['save']) && $_POST['save']!=""){
	
	//Aggiorna nel db
	$id = $_POST['id'];
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
	updateClient($id,$name,$surname,$type_document,$number_document,$release_document_date,$release_document_to,$nationality,$date_birth,$city_birth,$address,$city,$telephone,$email);
	//echo "Cliente aggiornato con successo.";
	if(isset($_REQUEST['modific_client'])){
		?>
	<script type="text/javascript">
		alert("Cliente aggiornato con successo!");
		window.location.href="index.php";
	</script>
	<?php 
	}
	else {
		?>
		<script type="text/javascript">
			alert("Cliente aggiornato con successo!");
			window.location.href="booking.php?id_room=<?php echo $booking['room']?>&date_stamp_in=<?php echo $date_stamp_in ?>&id_client=<?php echo $booking['client']?>";
		</script>
		<?php 
	}
	
}else if(isset($_POST['delete']) && $_POST['delete']!="" && $_POST['return_addclient']){
	//elimina dal db il cliente torno a add_client
	$id = $_POST['id'];
	deleteClient($id);
	?>
	<script type="text/javascript">
		alert("Cliente eliminato con successo!");
		window.location.href="index.php";
	</script>
	<?php 	
	
}else if(isset($_POST['delete']) && $_POST['delete']!=""){
	//elimina dal db il cliente e torno a prenotazione 
	$id = $_POST['id'];
	deleteClient($id);
	?>
	<script type="text/javascript">
		alert("Cliente eliminato con successo!");
		window.location.href="booking.php?id_room=<?php echo $booking['room']?>&date_stamp_in=<?php echo $date_stamp_in ?>&id_client=<?php echo $booking['client']?>";
	</script>
	<?php 
	
}else if((isset($_POST['delete_visitor']) && $_POST['delete_visitor']!="")||(isset($_REQUEST['delete_visitor']))){
	//elimina dal db il visitatore(provengo o da booking(request)o da modifica cliente(post))
	$id = $_POST['id_visitor'];
	$id = $_REQUEST['delete_visitor'];
	deleteVisitor($id);
	?>
	<script type="text/javascript">
		alert("Visitatore eliminato con successo!");
		window.location.href="booking.php?id_room=<?php echo $booking['room']?>&date_stamp_in=<?php echo $date_stamp_in ?>&id_client=<?php echo $booking['client']?>";
	</script>
	<?php 
	
}else if($_REQUEST['id_client']){
		
		//echo "modifico visitatore";
		
		$id_client = $_REQUEST['id_client']; 
		$client = getClient($id_client);
		//Aggiungi nel db
		$id = $client['id'];
		$name = $client['name'];
		$surname = $client['surname'];
		$type_document = $client['type_document'];
		$number_document = $client['number_document'];
		$release_document_date = $client['release_document_date'];
		$release_document_to = $client['release_document_to'];
		$nationality = $_POST['nationality'];
		$date_birth = $client['date_birth'];
		$city_birth = $client['city_birth'];
		$address = $client['address'];
		$city = $client['city'];
		$telephone = $client['telephone'];
		$email = $client['email'];
		
		?>
	<script LANGUAGE="JavaScript">
		function confirmSubmit()
		{
			var agree=confirm("Eliminare visitatore?");
			if (agree)
				return true ;
			else
				return false ;
		}
	</script>
	
	<div id="titoloContenuti">MODIFICA CLIENTE1</div> 
	<form id="mofidic_client" name="mofidic_client" action="" method="post">
			<input type="hidden" id="client" name="client" value="client"/>
			<!-- <input type="hidden" id="id_visitor" name="id_visitor" value="<?php echo $_REQUEST['id_visitor'];?>"/> -->
			<input type="hidden" id="id" name="id" value="<?php echo $client['id'];?>"/>
			<table align="center">
				<tr>
					<td>Cognome</td>
					<td><input type="text" name="surname" autocomplete="off" value="<?php echo $client['surname'];?>"/></td>
				</tr>
				<tr>
					<td>Nome</td>
					<td><input type="text" name="name" autocomplete="off" value="<?php echo $client['name'];?>"/></td>
				</tr>
				<tr>
					<td>Tipo Documento</td>
					<td><input type="text" name="type_document" autocomplete="off" value="<?php echo $client['type_document'];?>"/></td>
				</tr>
				<tr>
					<td>Num. Documento</td>
					<td><input type="text" name="number_document" autocomplete="off" value="<?php echo $client['number_document'];?>"/></td>
				</tr>
				<tr>
					<td>Documento rilasciato il</td>
					<td><input type="text" name="release_document_date" autocomplete="off" value="<?php echo $client['release_document_date'];?>"/></td>
				</tr>
				<tr>
					<td>Documento rilasciato da</td>
					<td><input type="text" name="release_document_to" autocomplete="off" value="<?php echo $client['release_document_to'];?>"/></td>
				</tr>
				<tr>
					<td>Cittadinanza</td>
					<td><input type="text" name="nationality" autocomplete="off" value="<?php echo $client['nationaliyy'];?>"/></td>
				</tr>
				<tr>
					<td>Data Nascita</td>
					<td><input type="text" name="date_birth" autocomplete="off" value="<?php echo $client['date_birth'];?>"/></td>
				</tr>
				<tr>
					<td>Luogo Nascita</td>
					<td><input type="text" name="city_birth" autocomplete="off" value="<?php echo $client['city_birth'];?>"/></td>
				</tr>
				<tr>
					<td>Indirizzo</td>
					<td><input type="text" name="address" autocomplete="off" value="<?php echo $client['address'];?>"/></td>
				</tr>
				<tr>
					<td>Citt&agrave;</td>
					<td><input type="text" name="city" autocomplete="off" value="<?php echo $client['city'];?>"/></td>
				</tr>
				<tr>
					<td>Telefono</td>
					<td><input type="text" name="telephone" autocomplete="off" value="<?php echo $client['telephone'];?>"/></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" autocomplete="off" value="<?php echo $client['email'];?>"/></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td><input id="delete_visitor" name="delete_visitor" type="submit" onClick="return confirmSubmit();" value="Elimina"/></td>
					<td><input id="save" name="save" type="submit" value="Salva"/></td>
				</tr>
			</table>
		</form>		
	<?php drawClosePage("id_booking",$id_booking); 
}else if($_REQUEST['client_booking']){
		
		//echo "modifico cliente";

		$id_client = $_REQUEST['client_booking']; 
		$client = getClient($id_client);
		//Aggiungi nel db
		$id = $client['id'];
		$name = $client['name'];
		$surname = $client['surname'];
		$type_document = $client['type_document'];
		$number_document = $client['number_document'];
		$release_document_date = $_POST['release_document_date'];
		$release_document_to = $_POST['release_document_to'];
		$nationality = $_POST['nationality'];
		$date_birth = $client['date_birth'];
		$city_birth = $client['city_birth'];
		$address = $client['address'];
		$city = $client['city'];
		$telephone = $client['telephone'];
		$email = $client['email'];
		
		?>
	<script LANGUAGE="JavaScript">
		function confirmSubmit()
		{
			var agree=confirm("Eliminare cliente?");
			if (agree)
				return true ;
			else
				return false ;
		}
	</script>
	
	<div id="titoloContenuti">MODIFICA CLIENTE2</div> 
	<form id="mofidic_client" name="mofidic_client" action="" method="post">
			<input type="hidden" id="client" name="client" value="client"/>
			<input type="hidden" id="return_add_client" name="return_addclient" value="return_addclient"/>
			<input type="hidden" id="id" name="id" value="<?php echo $client['id'];?>"/>
			<table align="center">
				<tr>
					<td>Cognome</td>
					<td><input type="text" name="surname" autocomplete="off" value="<?php echo $client['surname'];?>"/></td>
				</tr>
				<tr>
					<td>Nome</td>
					<td><input type="text" name="name" autocomplete="off" value="<?php echo $client['name'];?>"/></td>
				</tr>
				<tr>
					<td>Tipo Documento</td>
					<td><input type="text" name="type_document" autocomplete="off" value="<?php echo $client['type_document'];?>"/></td>
				</tr>
				<tr>
					<td>Num. Documento</td>
					<td><input type="text" name="number_document" autocomplete="off" value="<?php echo $client['number_document'];?>"/></td>
				</tr>
				<tr>
					<td>Documento rilasciato il</td>
					<td><input type="text" name="release_document_date" autocomplete="off" value="<?php echo $client['release_document_date'];?>"/></td>
				</tr>
				<tr>
					<td>Documento rilasciato da</td>
					<td><input type="text" name="release_document_to" autocomplete="off" value="<?php echo $client['release_document_to'];?>"/></td>
				</tr>
				<tr>
					<td>Cittadinanza</td>
					<td><input type="text" name="nationality" autocomplete="off" value="<?php echo $client['nationaliyy'];?>"/></td>
				</tr>
				<tr>
					<td>Data Nascita</td>
					<td><input type="text" name="date_birth" autocomplete="off" value="<?php echo $client['date_birth'];?>"/></td>
				</tr>
				<tr>
					<td>Luogo Nascita</td>
					<td><input type="text" name="city_birth" autocomplete="off" value="<?php echo $client['city_birth'];?>"/></td>
				</tr>
				<tr>
					<td>Indirizzo</td>
					<td><input type="text" name="address" autocomplete="off" value="<?php echo $client['address'];?>"/></td>
				</tr>
				<tr>
					<td>Citt&agrave;</td>
					<td><input type="text" name="city" autocomplete="off" value="<?php echo $client['city'];?>"/></td>
				</tr>
				<tr>
					<td>Telefono</td>
					<td><input type="text" name="telephone" autocomplete="off" value="<?php echo $client['telephone'];?>"/></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" autocomplete="off" value="<?php echo $client['email'];?>"/></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td><input id="delete" name="delete" type="submit" onClick="return confirmSubmit();" value="Elimina"/></td>
					<td><input id="save" name="save" type="submit" value="Salva"/></td>
				</tr>
			</table>
		</form>		
	<?php 


drawClosePage();


}else if(($_REQUEST['client_booking'])&&(isset($_REQUEST['id_booking']))){
		
		//echo "modifico cliente dalla prenotazione";

		$id_client = $_REQUEST['client_booking']; 
		$client = getClient($id_client);
		//Aggiungi nel db
		$id = $client['id'];
		$name = $client['name'];
		$surname = $client['surname'];
		$type_document = $client['type_document'];
		$number_document = $client['number_document'];
		$release_document_date = $_POST['release_document_date'];
		$release_document_to = $_POST['release_document_to'];
		$nationality = $_POST['nationality'];
		$date_birth = $client['date_birth'];
		$city_birth = $client['city_birth'];
		$address = $client['address'];
		$city = $client['city'];
		$telephone = $client['telephone'];
		$email = $client['email'];
		
		?>
	<script LANGUAGE="JavaScript">
		function confirmSubmit()
		{
			var agree=confirm("Eliminare cliente?");
			if (agree)
				return true ;
			else
				return false ;
		}
	</script>
	
	<div id="titoloContenuti">MODIFICA CLIENTE3</div> 
	<form id="mofidic_client" name="mofidic_client" action="" method="post">
			<input type="hidden" id="client" name="client" value="client"/>
			<input type="hidden" id="id" name="id" value="<?php echo $client['id'];?>"/>
			<table align="center">
				<tr>
					<td>Cognome</td>
					<td><input type="text" name="surname" autocomplete="off" value="<?php echo $client['surname'];?>"/></td>
				</tr>
				<tr>
					<td>Nome</td>
					<td><input type="text" name="name" autocomplete="off" value="<?php echo $client['name'];?>"/></td>
				</tr>
				<tr>
					<td>Tipo Documento</td>
					<td><input type="text" name="type_document" autocomplete="off" value="<?php echo $client['type_document'];?>"/></td>
				</tr>
				<tr>
					<td>Num. Documento</td>
					<td><input type="text" name="number_document" autocomplete="off" value="<?php echo $client['number_document'];?>"/></td>
				</tr>
				<tr>
					<td>Documento rilasciato il</td>
					<td><input type="text" name="release_document_date" autocomplete="off" value="<?php echo $client['release_document_date'];?>"/></td>
				</tr>
				<tr>
					<td>Documento rilasciato da</td>
					<td><input type="text" name="release_document_to" autocomplete="off" value="<?php echo $client['release_document_to'];?>"/></td>
				</tr>
				<tr>
					<td>Cittadinanza</td>
					<td><input type="text" name="nationality" autocomplete="off" value="<?php echo $client['nationaliyy'];?>"/></td>
				</tr>
				<tr>
					<td>Data Nascita</td>
					<td><input type="text" name="date_birth" autocomplete="off" value="<?php echo $client['date_birth'];?>"/></td>
				</tr>
				<tr>
					<td>Luogo Nascita</td>
					<td><input type="text" name="city_birth" autocomplete="off"value="<?php echo $client['city_birth'];?>"/></td>
				</tr>
				<tr>
					<td>Indirizzo</td>
					<td><input type="text" name="address" autocomplete="off" value="<?php echo $client['address'];?>"/></td>
				</tr>
				<tr>
					<td>Citt&agrave;</td>
					<td><input type="text" name="city" autocomplete="off" value="<?php echo $client['city'];?>"/></td>
				</tr>
				<tr>
					<td>Telefono</td>
					<td><input type="text" name="telephone" autocomplete="off" value="<?php echo $client['telephone'];?>"/></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" autocomplete="off" value="<?php echo $client['email'];?>"/></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td><input id="delete" name="delete" type="submit" onClick="return confirmSubmit();" value="Elimina"/></td>
					<td><input id="save" name="save" type="submit" value="Salva"/></td>
				</tr>
			</table>
		</form>		
	<?php 
drawClosePage("id_booking",$id_booking);

}else if(($_REQUEST['modific_client'])&&(isset($_REQUEST['modific_client']))){
		
		//echo "modifico cliente";

		$id_client = $_REQUEST['modific_client']; 
		$client = getClient($id_client);
		//Aggiungi nel db
		$id = $client['id'];
		$name = $client['name'];
		$surname = $client['surname'];
		$type_document = $client['type_document'];
		$number_document = $client['number_document'];
		$release_document_date = $_POST['release_document_date'];
		$release_document_to = $_POST['release_document_to'];
		$nationality = $_POST['nationality'];
		$date_birth = $client['date_birth'];
		$city_birth = $client['city_birth'];
		$address = $client['address'];
		$city = $client['city'];
		$telephone = $client['telephone'];
		$email = $client['email'];
		
		?>
	<script LANGUAGE="JavaScript">
		function confirmSubmit()
		{
			var agree=confirm("Eliminare cliente?");
			if (agree)
				return true ;
			else
				return false ;
		}
	</script>
	
	<div id="titoloContenuti">MODIFICA CLIENTE4</div> 
	<form id="mofidic_client" name="mofidic_client" action="" method="post">
			<input type="hidden" id="client" name="client" value="client"/>
			<input type="hidden" id="id" name="id" value="<?php echo $client['id'];?>"/>
			<table align="center">
				<tr>
					<td>Cognome</td>
					<td><input type="text" name="surname" autocomplete="off" value="<?php echo $client['surname'];?>"/></td>
				</tr>
				<tr>
					<td>Nome</td>
					<td><input type="text" name="name" autocomplete="off" value="<?php echo $client['name'];?>"/></td>
				</tr>
				<tr>
					<td>Tipo Documento</td>
					<td><input type="text" name="type_document" autocomplete="off" value="<?php echo $client['type_document'];?>"/></td>
				</tr>
				<tr>
					<td>Num. Documento</td>
					<td><input type="text" name="number_document" autocomplete="off" value="<?php echo $client['number_document'];?>"/></td>
				</tr>
				<tr>
					<td>Documento rilasciato il</td>
					<td><input type="text" name="release_document_date" autocomplete="off" value="<?php echo $client['release_document_date'];?>"/></td>
				</tr>
				<tr>
					<td>Documento rilasciato da</td>
					<td><input type="text" name="release_document_to" autocomplete="off" value="<?php echo $client['release_document_to'];?>"/></td>
				</tr>
				<tr>
					<td>Cittadinanza</td>
					<td><input type="text" name="nationality" autocomplete="off" value="<?php echo $client['nationaliyy'];?>"/></td>
				</tr>
				<tr>
					<td>Data Nascita</td>
					<td><input type="text" name="date_birth" autocomplete="off" value="<?php echo $client['date_birth'];?>"/></td>
				</tr>
				<tr>
					<td>Luogo Nascita</td>
					<td><input type="text" name="city_birth" autocomplete="off" value="<?php echo $client['city_birth'];?>"/></td>
				</tr>
				<tr>
					<td>Indirizzo</td>
					<td><input type="text" name="address" autocomplete="off" value="<?php echo $client['address'];?>"/></td>
				</tr>
				<tr>
					<td>Citt&agrave;</td>
					<td><input type="text" name="city" autocomplete="off" value="<?php echo $client['city'];?>"/></td>
				</tr>
				<tr>
					<td>Telefono</td>
					<td><input type="text" name="telephone" autocomplete="off" value="<?php echo $client['telephone'];?>"/></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" autocomplete="off" value="<?php echo $client['email'];?>"/></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td><input id="delete" name="delete" type="submit" onClick="return confirmSubmit();" value="Elimina"/></td>
					<td><input id="save" name="save" type="submit" value="Salva"/></td>
				</tr>
			</table>
		</form>		
	<?php 
drawClosePage();

}else{
	?>
	<div id="titoloContenuti">GESTIONE CLIENTI</div> 
	<form id="search_client" name="search_client" method="post">
	<input id="text_search" name="text_search" type="text" value=""/>
	<input id="search" name="search" type="submit" value="Cerca"/>
	</form>
	<form id="add_client" name="add_client" action="add_client.php" method="post">
					<input type="hidden" name="return_page" value="client"/>
					<button id="add_client" value="submit">Aggiungi Cliente</button>
	</form>

<?php 
if(isset($_POST['search']) && $_POST['search']!="" ){  ?>
	
	
	<link rel="STYLESHEET" type="text/css" href="include_js/dhtmlxGrid/codebase/dhtmlxgrid.css">
	<link rel="stylesheet" type="text/css" href="include_js/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_black.css">
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>        
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>
	
    <div id="table_client"></div>
	   
	<script>
		mygrid = new dhtmlXGridObject('table_client');
		mygrid.setImagePath("include_js/dhtmlxGrid/codebase/imgs/");
		mygrid.setHeader("Cognome,Nome,Tipo Doc.,Num Doc.,Data Nascita,Luogo Nascita,Indirizzo,Citt&agrave;,Telefono,Email,Modifica");
		mygrid.setInitWidths("70,70,70,70,70,70,70,70,80,80,80");
		mygrid.setColAlign("right,right,right,right,right,right,right,right,right,right,right");
		mygrid.setColTypes("ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro");
		mygrid.setColSorting("str,str,str,str,str,str,str,str,str,str,str");
		mygrid.init();
		mygrid.setSkin("dhx_black");
	
	<?php
		$text_search = $_POST['text_search'];
		$clients = searchClients($text_search);
		foreach ($clients as $c) {
			$button_modify = '<button onclick=\"window.location.href=\'modific_client.php?modific_client='.$c['id'].'\'\">Modifica</button>';
			$str = "mygrid.addRow(".$c['id'].", [\"".$c['surname']."\", \"".$c['name']."\", \"".
									$c['type_document']."\", \"".$c['number_document']."\", \"".
									$c['date_birth']."\", \"".$c['city_birth']."\", \"".
									$c['address']."\", \"".$c['city']."\", \"".
									$c['telephone']."\", \"".$c['email']."\", \"".
									$button_modify."\"]);";
			echo $str;
		}	
	}
	?>
	</script>
	<?php  drawClosePage(); }?>