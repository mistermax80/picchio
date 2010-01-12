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
	
		<table width="805px">
		    <tr>
		        <td>
		            <div id="gridbox" style="width:80%;height:250px;background-color:white;overflow:hidden"></div>
		        </td>
		    </tr>
		</table>
	   
	<script>
		mygrid = new dhtmlXGridObject('gridbox');
		mygrid.setImagePath("include_js/dhtmlxGrid/codebase/imgs/");
		mygrid.setHeader("Cliente,Path,Data,spedizione,Vedi,Elimina");
		mygrid.setInitWidths("100,100,130,100,100,100,100");
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
			$str = "mygrid.addRow(".$r['id'].", [\"".$r['surname']."\",\"".$r['path']."\", \"".
									$r['date']."\", \"".$r['send']."\", \"".
									$button_modify."\",\"".$button_delete."\"]);";
			echo $str;
		}
	?></script><?php
}else{
	?><div id="titoloContenuti">ELIMINAZIONE NOTIFICA CLIENTE</div>
	<?php 
	$id = $_REQUEST['id_report'];
	deleteReport($id);
	echo "Report eliminato con successo.";
	//echo "<a href=\"option.php\">Ritorna</a>";
	
}	
drawClosePage();

?>