<?php

include_once 'function/function_page.php';
include_once 'function/function_booking.php';

drawOpenPage();

?><div id="titoloContenuti">OPTIONAL STANZA</div><?php 
//var_dump($_POST);
$id_booking = $_REQUEST['id_booking'];
//$id_booking = $_POST['id_booking']; //se lo mandano a vicenda con bar.php per non perdere il menù a six
$booking = getBookingById($id_booking);
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
		            <div id="gridbox" style="width:100%;height:50px;background-color:white;overflow:hidden"></div>
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
				<form id="bar" name="bar" action="bar.php" method="request">
				<input type="hidden" name="id_booking" value="<?php echo $id_booking ?>"/>
				<button id="bar" value="submit">Aggiungi Servizio Bar</button>
				</form>
			</td>
			<td>
				<form id="restorant" name="restorant" action="option_booking.php" method="request">
				<button id="restorant" value="submit">Aggiungi Servizio Ristorante</button>
				</form>
			</td>
		</tr>
		</table>
		<br><br><br>
	
	<?php 
	if((isset($_POST['bar']))||(isset($_POST['restorant']))){?>
		
		
		<table width="805px">
		    <tr>
		        <td>
		            <div id="gridbox1" style="width:40%;height:100px;background-color:white;overflow:hidden"></div>
		        </td>
		    </tr>
		</table>
	   
	<script>
		mygrid = new dhtmlXGridObject('gridbox1');
		mygrid.setImagePath("include_js/dhtmlxGrid/codebase/imgs/");
		mygrid.setHeader("Servizio,Prezzo (Euro),Elimina");
		mygrid.setInitWidths("90,149,80");
		mygrid.setColAlign("left,left,left");
		mygrid.setColTypes("ro,ro,ro");
		mygrid.setColSorting("str,str,str");
		mygrid.init();
		mygrid.setSkin("dhx_black");
		
		<?php 
			$button_delete = '<button onclick=\"window.location.href=\'option_booking.php?bar='.$c['id'].'\'\">Elimina</button>';		
		
			$str = "mygrid.addRow(".$booking['id'].", [\"".$_POST['type']."\",\"".
									$_POST['price']."\", \"".
									$button_delete."\",\"".
									"\"]);";
			echo $str;
		
	}
	?></script><?php 

	
	 
	drawClosePage("id_booking",$id_booking);



