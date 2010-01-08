<?php
include_once 'function/function_page.php';
include_once 'function/function_client.php';
include_once 'function/function_visitor.php';

drawOpenPage();

?>
<div id="titoloContenuti">GESTIONE CLIENTI</div> 
<?php

$id_booking = $_REQUEST['id_booking'];

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
	drawClosePage("id_booking",$id_booking['id']);
	
}else if(isset($_POST['delete']) && $_POST['delete']!="" && $_POST['return_addclient']){
	//elimina dal db il cliente torno a add_client
	$id = $_POST['id'];
	deleteClient($id);
	echo "Cliente eliminato con successo.";
	drawClosePage();	
	
}else if(isset($_POST['delete']) && $_POST['delete']!=""){
	//elimina dal db il cliente e torno a prenotazione 
	$id = $_POST['id'];
	deleteClient($id);
	echo "Cliente eliminato con successo.";
	drawClosePage("id_booking",$id_booking['id']);
	
}else if((isset($_POST['delete_visitor']) && $_POST['delete_visitor']!="")||(isset($_REQUEST['delete_visitor']))){
	//elimina dal db il visitatore(provengo o da booking(request)o da modifica cliente(post))
	$id = $_POST['id_visitor'];
	$id = $_REQUEST['delete_visitor'];
	deleteVisitor($id);
	echo "Visitatore eliminato con successo.";
	drawClosePage("id_booking",$id_booking);
	
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
			<!-- <input type="hidden" id="id_visitor" name="id_visitor" value="<?php echo $_REQUEST['id_visitor'];;?>"/> -->
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
			<input type="hidden" id="return_add_client" name="return_addclient" value="return_addclient"/>
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


drawClosePage("id_booking",$id_booking);




}else{
	?>
	<form id="search_client" name="search_client" method="post">
	<input id="text_search" name="text_search" type="text" value=""/>
	<input id="search" name="search" type="submit" value="Cerca"/>
	</form>

<?php 
if(isset($_POST['search']) && $_POST['search']!="" ){  ?>
	
	
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
		$text_search = $_POST['text_search'];
		$clients = searchClients($text_search);
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
	}
	?>
	</script>
	<form id="add_client" name="add_client" action="add_client.php" method="post">
					<input type="hidden" name="return_page" value="client"/>
					<button id="add_client" value="submit">Aggiungi Cliente</button>
	</form>
	<?php  drawClosePage(); }?>