<?php
include_once 'function/function_page.php';
include_once 'function/function_booking.php';
include_once 'function/function_client.php';
include_once 'function/function_report.php';
include_once 'function/function_notify.php';
include_once 'function/function_visitor.php';

drawOpenPage();

if(isset($_REQUEST['notify']) && isset($_REQUEST['id_booking'])){
	
	$id_booking = $_REQUEST['id_booking']; 
	$id_client = $_REQUEST['id_client'];
	
	unset($_REQUEST['notify']);
	unset($_REQUEST['id_booking']);
	
	$client = getClient($id_client);
	$surname = $client['surname'];
	
	$datefile = date("Ymdhms");

	//Se windows mettere a true la seguente variabile
	$ifWindows = false;
	if ($ifWindows) {
		$absolute_filename = "report\\notifica-".$datefile.".pdf";
	}else{
		$absolute_filename = "report/notifica-".$datefile.".pdf";
	}
	$filename = "report/notifica-".$datefile.".pdf";
	 
	$result = generateNotification($absolute_filename,$id_client);
	
	if($result){
		insertReport($id_client,$filename,$id_booking);
	?>
	<script type="text/javascript">
		alert("Report generato con successo!");
		window.location.href="report.php?id_booking=<?php echo $id_booking?>";
	</script>
	<?php
	//Salvalo nel db
	//insertReport($booking['client'],$filename,$id_booking);
	}else{
		?>
	<script type="text/javascript">
		alert("Errore nella generazione del Report!");
		window.location.href="report.php?id_booking=<?php echo $id_booking?>";
	</script>
	<?php
	}
}else{
		
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
		            <div id="gridbox" style="width:108%;height:160px;background-color:white;overflow:hidden"></div>
		        </td>
		    </tr>
		</table>
	<script>
		mygrid = new dhtmlXGridObject('gridbox');
		mygrid.setImagePath("include_js/dhtmlxGrid/codebase/imgs/");
		mygrid.setHeader("Utente,Cognome,Nome,Tipo Doc.,Num Doc.,Data nascita,Luogo nascita,Indirizzo,Citt&agrave;,Telefono,Email,Genera");
		mygrid.setInitWidths("70,70,70,60,80,60,60,80,80,80,65,80,90");
		mygrid.setColAlign("left,left,left,left,left,left,left,left,left,left,left,left");
		mygrid.setColTypes("ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro");
		mygrid.setColSorting("str,str,str,str,str,str,str,str,str,str,str,str");
		mygrid.init();
		mygrid.setSkin("dhx_black");
	
	<?php 
		$button_notify = '<button onclick=\"window.location.href=\'report.php?id_booking='.$booking['id'].'\
									&notify=true&id_client='.$booking['client'].'\'\">Notifica</button>';
		$str = "mygrid.addRow(".$client['id'].", [\"".Cliente."\",\"".$client['name']."\",\"".$client['surname']."\", \"".
									$client['type_document']."\", \"".$client['number_document']."\", \"".
									$client['date_birth']."\", \"".$client['city_birth']."\", \"".
									$client['address']."\", \"".$client['city']."\", \"".
									$client['telephone']."\", \"".$client['email']."\", \"".
									$button_notify."\"]);";
															
		echo $str;						
		
			$visitors = getVisitor($id_booking);
			foreach ($visitors as $v) {
				$id_client = $v['id_client'];
				$client = getClient($id_client);
				
				$button_notify = '<button onclick=\"window.location.href=\'report.php?id_booking='.$booking['id'].'\
									&notify=true&id_client='.$id_client.'\'\">Notifica</button>';
				
				$str = "mygrid.addRow(".$client['id'].", [\"".Ospite."\",\"".$client['surname']."\",\"".$client['name']."\", \"".
									$client['type_document']."\", \"".$client['number_document']."\", \"".
									$client['date_birth']."\", \"".$client['city_birth']."\", \"".
									$client['address']."\", \"".$client['city']."\", \"".
									$client['telephone']."\", \"".$client['email']."\", \"".
									$button_notify."\"]);";
				echo $str;	
			}
	?>
	</script>
		<br><br>
		<table width="805px">
		    <tr>
		        <td>
		            <div id="gridbox1" style="width:108%;height:55px;background-color:white;overflow:hidden"></div>
		        </td>
		    </tr>
		</table>
	   
	<script>
		mygrid = new dhtmlXGridObject('gridbox1');
		mygrid.setImagePath("include_js/dhtmlxGrid/codebase/imgs/");
		mygrid.setHeader("Stanza,Check  In,Check  Out,Numero Clienti,Note");
		mygrid.setInitWidths("120,200,200,100,238");
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
<?php 
	}
	
	$reports = getReportIdBooking($id_booking);
	if(!$reports==0){
		//stampami quelli già generati
		?>
		<br><br><br>
		<b><?php echo "Notifiche generate"?></b>
		<br><br>
		<table width="805px">
		    <tr>
		        <td>
		            <div id="gridbox2" style="width:68%;height:100px;background-color:white;overflow:hidden"></div>
		        </td>
		    </tr>
		</table>
	   
	<script>
		mygrid = new dhtmlXGridObject('gridbox2');
		mygrid.setImagePath("include_js/dhtmlxGrid/codebase/imgs/");
		mygrid.setHeader("Cliente,Path,Data,Visualizza");
		mygrid.setInitWidths("100,200,130,112");
		mygrid.setColAlign("left,left,left,left");
		mygrid.setColTypes("ro,ro,ro,ro");
		mygrid.setColSorting("str,str,str,str");
		mygrid.init();
		mygrid.setSkin("dhx_black"); 
	
	<?php 
		foreach ($reports as $r) {
			
			$id_client = $r['id_client'];
			$client = getClient($id_client);
			
			$button_view = '<button onclick=\"window.open(\''.$r['path'].'\', \'Report\',\'\');\">Visualizza</button>';

			$str = "mygrid.addRow(".$r['id'].", [\"".$client['surname']."  ".$client['name']."\",\"".$r['path']."\", \"".
									$r['date']."\", \"".
									$button_view."\"]);";
			echo $str;
		}
	?></script>
		<?php 
	}	
	drawClosePage("id_booking",$id_booking);
}
?>