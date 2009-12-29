<?php
include 'include/pagina_apertura.php';
include_once 'function/function_client.php';
include_once 'function/function_visitor.php';
?>
<div id="titoloContenuti">GESTIONE CLIENTI</div> 
<?php
$date_stamp_in = $_REQUEST['date_stamp_in'];
$id_room = $_REQUEST['id_room'];
$id_client = $_REQUEST['id_client'];
$client_booking = $_REQUEST['client_booking'];

if(isset($_POST['save']) && $_POST['save']!=""){
	
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
	echo "Cliente aggiornato con successo.";
	echo "<a href=\"modific_client.php\">Ritorna</a>";
	
	echo "<a href=\"booking.php?id_client=".$client_booking."&date_stamp_in=".$date_stamp_in."&id_room=".$id_room."\">Ritorna a booking</a>";
	
	
}else if(isset($_POST['delete']) && $_POST['delete']!=""){
	//echo "elimino cliente prenotazione o cliente normale";
	//elimina dal db il cliente
	$id = $_POST['id'];
	deleteClient($id);
	//echo "Cliente eliminato con successo.";
	//ritona a modif client con lista client se parto da index-->clienti
	echo "<a href=\"modific_client.php\">Ritorna modific_client</a>";
	
	echo "<a href=\"booking.php?id_client=".$client_booking."&date_stamp_in=".$_REQUEST['date_stamp_in']."&id_room=".$_REQUEST['id_room']."\">Ritorna a booking</a>";
	
}else if(isset($_POST['delete_visitor']) && $_POST['delete_visitor']!=""){
	//echo "elimino visitatore";
	//elimina dal db il visitatore
	$id = $_POST['id_visitor'];
	deleteVisitor($id_visitor);
	echo "Visitatore eliminato con successo.";
	echo "<a href=\"booking.php?id_client=".$client_booking."&date_stamp_in=".$_REQUEST['date_stamp_in']."&id_room=".$_REQUEST['id_room']."\">Ritorna a booking</a>";
	?>
	<!--  <form id="delete_visitor" name="delete_visitor" action="booking.php" method="request">
			<input type="hidden" id="id_room" name="id_room" value="<?php echo $id_room;?>"/>
			<input type="hidden" id="date_stamp_in" name="date_stamp_in" value="<?php echo $date_stamp_in ;?>"/>
			<input type="hidden" id="id_client" name="id_client" value="<?php echo $client_booking;?>"/>
			<button id="booking" value="submit">Torna a prenotazione</button>-->
	<?php 
	//echo "<a href=\"modific_client.php\">Ritorna</a>";
	//dovremmo tornare a booking.php ma servono id_room , date_stamp_in e id_client*/
	
}else{
	if (!($_REQUEST['client_booking']) && (!($_REQUEST['id_client']))){?>
	
	<link rel="STYLESHEET" type="text/css" href="include_js/dhtmlxGrid/codebase/dhtmlxgrid.css">
	<link rel="stylesheet" type="text/css" href="include_js/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_black.css">
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>        
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>
	
		<table width="805px">
		    <tr>
		        <td>
		            <div id="gridbox" style="width:100%;height:250px;background-color:white;overflow:hidden"></div>
		        </td>
		    </tr>
		</table>
	   
	<script>
		mygrid = new dhtmlXGridObject('gridbox');
		mygrid.setImagePath("include_js/dhtmlxGrid/codebase/imgs/");
		mygrid.setHeader("Cognome,Nome,Tipo Doc.,Num Doc.,Data Nascita,Luogo Nascita,Indirizzo,Citt&agrave;,Telefono,Email,Modifica");
		mygrid.setInitWidths("70,70,70,70,70,70,70,70,80,80,80");
		mygrid.setColAlign("right,right,right,right,right,right,right,right,right,right,right");
		mygrid.setColTypes("ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro");
		mygrid.setColSorting("str,str,str,str,str,str,str,str,str,str,str");
		mygrid.init();
		mygrid.setSkin("dhx_black");
	
	<?php
		$clients = getClients();
		foreach ($clients as $c) {
			$button_modify = '<button onclick=\"window.location.href=\'modific_client.php?client_booking='.$c['id'].'\'\">Modifica</button>';
			$str = "mygrid.addRow(".$c['id'].", [\"".$c['surname']."\", \"".$c['name']."\", \"".
									$c['type_document']."\", \"".$c['number_document']."\", \"".
									$c['date_birth']."\", \"".$c['city_birth']."\", \"".
									$c['address']."\", \"".$c['city']."\", \"".
									$c['telephone']."\", \"".$c['email']."\", \"".
									$button_modify."\"]);";
			echo $str;
		}	
	?>
	</script>
	<form id="add_client" name="add_client" action="add_client.php" method="post">
					<input type="hidden" name="return_page" value="client"/>
					<button id="add_client" value="submit">Aggiungi Cliente</button>
	</form>
	
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
	
	
	<form id="mofidic_client" name="mofidic_client" action="" method="post">
			<input type="hidden" id="client" name="client" value="client"/>
			<input type="hidden" id="id_visitor" name="id_visitor" value="<?php echo $_REQUEST['id_visitor'];;?>"/>
			<input type="hidden" id="id" name="id" value="<?php echo $client['id'];?>"/>
			<table align="center">
				<tr>
					<td>Nome</td>
					<td><input type="text" name="name" autocomplete="off" value="<?php echo $client['name'];?>"/></td>
				</tr>
				<tr>
					<td>Cognome</td>
					<td><input type="text" name="surname" autocomplete="off" value="<?php echo $client['surname'];?>"/></td>
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
	<?php  
	}else if($_REQUEST['client_booking']){
		
		//echo "modifico cliente prenotazione";

		$id_client = $_REQUEST['client_booking']; 
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
	
	
	<form id="mofidic_client" name="mofidic_client" action="" method="post">
			<input type="hidden" id="client" name="client" value="client"/>
			<input type="hidden" id="id" name="id" value="<?php echo $client['id'];?>"/>
			<table align="center">
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
					<td><input id="delete" name="delete" type="submit" onClick="return confirmSubmit();" value="Elimina"/></td>
					<td><input id="save" name="save" type="submit" value="Salva"/></td>
				</tr>
			</table>
		</form>		
	<?php
	}
	}

include 'include/pagina_chiusura.php';
?>