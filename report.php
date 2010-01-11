<?php
include_once 'function/function_page.php';
include_once 'function/function_booking.php';
include_once 'function/function_client.php';
include_once 'function/function_report.php';

drawOpenPage();
		
	if(!(isset($_POST['report']) && $_POST['report']!="")){
		$id_booking = $_REQUEST['id_booking'];
		$booking = getBookingById($id_booking);
		$id_client = $booking['client'];
		$client = getClient($id_client);
		//echo "Creare il notificato per la prenotazione:";
		?>
		<div id="titoloContenuti">CREA NOTIFICAZIONE</div> 
		<link rel="STYLESHEET" type="text/css" href="include_js/dhtmlxGrid/codebase/dhtmlxgrid.css">
		<link rel="stylesheet" type="text/css" href="include_js/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_black.css">
		<script  src="include_js/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
		<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>        
		<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>
		
		<table width="805px">
		    <tr>
		        <td>
		            <div id="gridbox" style="width:110%;height:200px;background-color:white;overflow:hidden"></div>
		        </td>
		    </tr>
		</table>
	   
	<script>
		mygrid = new dhtmlXGridObject('gridbox');
		mygrid.setImagePath("include_js/dhtmlxGrid/codebase/imgs/");
		mygrid.setHeader("Utente,Cognome,Nome,Tipo Doc.,Num Doc.,Data Nascita,Luogo Nascita,Indirizzo,Citt&agrave;,Telefono,Email,Modifica");
		mygrid.setInitWidths("70,70,70,60,80,80,80,80,80,60,60,90");
		mygrid.setColAlign("left,left,left,left,left,left,left,left,left,left,left,left");
		mygrid.setColTypes("ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro");
		mygrid.setColSorting("str,str,str,str,str,str,str,str,str,str,str,str");
		mygrid.init();
		mygrid.setSkin("dhx_black");
	
	<?php 
		$button_modify = '<button onclick=\"window.location.href=\'modific_client.php?client_booking='.$client['id'].'\
									&id_booking='.$booking['id'].'\'\">Modifica</button>';
		$str = "mygrid.addRow(".$client['id'].", [\"".Cliente."\",\"".$client['name']."\",\"".$client['surname']."\", \"".
									$client['type_document']."\", \"".$client['number_document']."\", \"".
									$client['date_birth']."\", \"".$client['city_birth']."\", \"".
									$client['address']."\", \"".$client['city']."\", \"".
									$client['telephone']."\", \"".$client['email']."\", \"".
									$button_modify."\"]);";
															
		echo $str;						
		
	?>
	</script>
		<br><br>
		<table width="805px">
		    <tr>
		        <td>
		            <div id="gridbox1" style="width:110%;height:60px;background-color:white;overflow:hidden"></div>
		        </td>
		    </tr>
		</table>
	   
	<script>
		mygrid = new dhtmlXGridObject('gridbox1');
		mygrid.setImagePath("include_js/dhtmlxGrid/codebase/imgs/");
		mygrid.setHeader("Stanza,Check  In,Check  Out,Numero Clienti,Note");
		mygrid.setInitWidths("120,200,200,100,260");
		mygrid.setColAlign("left,left,left,left,left");
		mygrid.setColTypes("ro,ro,ro,ro,ro");
		mygrid.setColSorting("str,str,str,str,str");
		mygrid.init();
		mygrid.setSkin("dhx_black");
		
		<?php 
			$str = "mygrid.addRow(".$booking['id'].", [\"".$booking['room']."\",\"".substr($booking['date_in'],0,10)."\", \"".
									substr($booking['date_out'],0,10)."\", \"".$booking['number_client']."\", \"".
									$booking['note']."\", \"".$booking['city_birth']."\", \"".
									$booking['address']."\", \"".
									$button_modify."\"]);";
			echo $str;
	?>
	</script>
	<br><br>
	<?php 
	//controllo se è stato già generato il report
	$report = getReportIdBooking($id_booking);
	if(!$report==""){
			echo "<b>Notificazione già generata</b>";
		}			
	?>
		<br><br>
		<form id="report" name="report" action="" method="post">
		<input type="hidden" name="report" value="true"/>
		<input type="hidden" name="id_booking" value="<?php echo $booking['id'];?>"/>
		<button id="report" value="submit">Genera notificazione</button>
		</form>
<?php 
	}else{
		?><div id="titoloContenuti">NOTIFICAZIONE INVIATA</div><?php 
		$id_booking = $_POST['id_booking'];
		$id_client=getBookingById($id_booking);
		$idd_client = $id_client['client'];
		$client=getClient($idd_client);
		$surname=$client['surname'];
		$booking = $surname;
		$path = "....da inserire pikkio...";
		$generate = 1;
		insertReport($booking,$path,$id_booking);
		echo "<b>Report generato con successo</b>";
		//echo "<a href=\"index.php\">Ritorna</a>";
	}
drawClosePage("id_booking",$id_booking);
?>