<?php

include_once 'function/function_page.php';
include_once 'function/function_booking.php';
include_once 'function/function_product.php';
include_once 'function/function_optional.php';

drawOpenPage();

?><div id="titoloContenuti">OPTIONAL STANZA</div><?php 
//var_dump($_POST);
$id_booking = $_REQUEST['id_booking'];
//$id_booking = $_POST['id_booking']; //se lo mandano a vicenda con bar.php per non perdere il menù a six
$booking = getBookingById($id_booking);

if(isset($_REQUEST['perfunctory'])){
	//generare file servizi stanza..prendo tutti gli optional con le quanità e i prezzi
	$optionals = getOptional($id_booking);
	
	$datefile = date("Ymdhms");

	//Se windows mettere a true la seguente variabile
	$ifWindows = false;
	if ($ifWindows) {
		$absolute_filename = "service\\proforma-".$datefile.".pdf";
	}else{
		$absolute_filename = "service/proforma-".$datefile.".pdf";
	}
	$result = generatePerfunctory($absolute_filename,$optionals);
		
	}
if(isset($_REQUEST['delete_optional'])){
	//elimino dal db l'optional relativo alla prenotazione
	$id_optional = $_REQUEST['delete_optional'];
	$optional = getOptionalById($id_optional);
	$quantity = $optional['quantity'];
	if($quantity==1){//quantità >1 elimina quantità
		deleteOptional($id_optional);
	}
	else{ //elimina prodotto
		$quantity = $optional['quantity'] - 1;
		updateQuantity($id_optional,$quantity);
	}
}
if(isset($_REQUEST['add_product'])){
	//inserisco nel db l'optional relativo alla prenotazione
	$id_booking = $_REQUEST['id_booking'];
	$id_product = $_REQUEST['add_product'];
	addOptional($id_booking,$id_product);
		
	}
if(isset($_REQUEST['add_quantity'])){
	//aggiorno nel db l'optional relativo alla prenotazione
	$id_optional = $_REQUEST['add_quantity'];
	$optional = getOptionalById($id_optional);
	$quantity = $optional['quantity'] + 1;
	updateQuantity($id_optional,$quantity);
	}	
//Visualizza Info Prenotazione
?>
	<link rel="STYLESHEET" type="text/css" href="include_js/dhtmlxGrid/codebase/dhtmlxgrid.css">
	<link rel="stylesheet" type="text/css" href="include_js/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_black.css">
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>        
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>

	<table width="805px">
		    <tr>
		        <td>
		            <div id="gridbox" style="width:100%;height:47px;background-color:white;overflow:hidden"></div>
		        </td>
		    </tr>
		</table>
	   
	<script>
		mygrid = new dhtmlXGridObject('gridbox');
		mygrid.setImagePath("include_js/dhtmlxGrid/codebase/imgs/");
		mygrid.setHeader("Stanza,Check  In,Check  Out,Numero Clienti,Note");
		mygrid.setInitWidths("90,150,150,100,310");
		mygrid.setColAlign("left,left,left,left,left");
		mygrid.setColTypes("ro,ro,ro,ro,ro");
		mygrid.setColSorting("str,str,str,str,str");
		mygrid.init();
		mygrid.setSkin("dhx_black");
		
		<?php 
			$str = "mygrid.addRow(".$booking['id'].", [\"".$booking['room']."\",\"".substr($booking['date_in'],0,10)."\", \"".
									substr($booking['date_out'],0,10)."\", \"".$booking['number_client']."\", \"".
									$booking['note']."\", \"".$booking['city_birth']."\"]);";
			echo $str;
			
	?></script>
	<br><br><br>
	<table>	
		<tr>
			<td width="200">
				<form id="bar" name="bar" action="product.php" method="request">
				<input type="hidden" name="id_booking" value="<?php echo $id_booking ?>"/>
				<button id="bar" value="submit">Aggiungi Servizio</button>
				</form>
			</td>
		</tr>
		</table>
		<br>
		
	<?php 
	//visualizza servizi in stanza
	
		$optional_booking = getOptional($id_booking);
		if(!$optional_booking==""){
			$totale = 0;
			$quantity = 0;
			?>
		 
		<table width="805px">
		    <tr>
		        <td>
		            <div id="gridbox1" style="width:70%;height:250px;background-color:white;overflow:hidden"></div>
		        </td>
		    </tr>
		</table>
	   
	<script>
		mygrid = new dhtmlXGridObject('gridbox1');
		mygrid.setImagePath("include_js/dhtmlxGrid/codebase/imgs/");
		mygrid.setHeader("Servizio,Prezzo (Euro),Quantità,Aumenta quantità,Elimina");
		mygrid.setInitWidths("90,149,120,120,81");
		mygrid.setColAlign("left,left,left,left,left");
		mygrid.setColTypes("ro,ro,ro,ro,ro");
		mygrid.setColSorting("str,str,str,str,str");
		mygrid.init();
		mygrid.setSkin("dhx_black");
		
		<?php 
			$vuoto = "";
			$stotale = "Totale servizi";
		 	foreach ($optional_booking as $product){ 	
		 	$p = getProduct($product['id_product']);
		 	$totale = $totale + ($p['price']*$product['quantity']);
		 	$quantity = $quantity + $product['quantity'];
			$button_delete = '<button onclick=\"window.location.href=\'option_booking.php?delete_optional='.$product['id'].'\
									&id_booking='.$id_booking.'\'\">Elimina</button>';		
		
			$button_add = '<button onclick=\"window.location.href=\'option_booking.php?add_quantity='.$product['id'].'\
									&id_booking='.$id_booking.'\'\">Aumenta</button>';
			
			$str = "mygrid.addRow(".$p['id'].", [\"".$p['name']."\",\"".$p['price']."\", \"".
									$product['quantity']."\", \"".
									$button_add."\",\"".$button_delete."\"]);";
									
			echo $str;
		 	}
		 	$str = "mygrid.addRow(".$p['id'].", [\"".$vuoto."\",\"".$vuoto."\", \"".
									$vuoto."\", \"".
									$vuoto."\",\"".$vuoto."\"]);";
			echo $str;
			
			$button_view = '<button onclick=\"window.location.href=\'option_booking.php?perfunctory=treu'.'\
									&id_booking='.$id_booking.'\'\">Visualizza</button>';
			
			$str = "mygrid.addRow(".$p['id'].", [\"".$stotale."\",\"".$totale."\", \"".
									$quantity."\", \"".
									$button_view."\",\"".$vuoto."\"]);";
			echo $str;
		 	
		 	
	?></script><?php 
		}
	drawClosePage("id_booking",$id_booking);


