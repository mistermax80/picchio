<?php

include_once 'function/function_page.php';
include_once 'function/function_booking.php';
include_once 'function/function_client.php';
include_once 'function/function_report.php';

drawOpenPage();


if(!(isset($_REQUEST['id_report']))){
?>
<div id="titoloContenuti">NOTIFICHE CLIENTI</div> 
<link rel="STYLESHEET" type="text/css" href="include_js/dhtmlxGrid/codebase/dhtmlxgrid.css">
	<link rel="stylesheet" type="text/css" href="include_js/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_black.css">
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>        
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>
	
	<div id="table_report"></div>
	   
	<script>
		mygrid = new dhtmlXGridObject('table_report');
		mygrid.setImagePath("include_js/dhtmlxGrid/codebase/imgs/");
		mygrid.setHeader("Cliente,Path,Data,inviato,spedizione,Vedi,Elimina");
		mygrid.setInitWidths("100,200,100,100,100,100,100,100");
		mygrid.setColAlign("left,left,left,left,left,left,left");
		mygrid.setColTypes("ro,ro,ro,ro,ro,ro,ro");
		mygrid.setColSorting("str,str,str,str,str,str,str");
		mygrid.init();
		mygrid.setSkin("dhx_black"); 
	
	<?php 
		$reports = getReports();
		foreach ($reports as $r) {
			
			$button_modify = '<button onclick=\"window.open(\''.$r['path'].'\', \'Report\',\'\');\">Report</button>';
			$button_delete = '<button onclick=\"window.location.href=\'option.php?id_report='.$r['id'].'\'\">Elimina</button>';
			$button_send = '<button onclick=\"window.location.href=\'option.php?id_report='.$r['id'].'\'\">Elimina</button>';
			$str = "mygrid.addRow(".$r['id'].", [\"".$r['surname']."\",\"".$r['path']."\", \"".
									$r['date']."\", \"".$r['send']."\", \"".
									$button_modify."\",\"".$button_modify."\",\"".$button_delete."\"]);";
			echo $str;
		}
	?></script><?php
	drawClosePage();
}else{
	?><div id="titoloContenuti">ELIMINAZIONE NOTIFICA CLIENTE</div>
	<?php 
	$id = $_REQUEST['id_report'];
	deleteReport($id);
	?>
	<script type="text/javascript">
		alert("Notifica Eliminata con successo!");
		window.location.href="option.php";
	</script>
	<?php 	
}	
?>