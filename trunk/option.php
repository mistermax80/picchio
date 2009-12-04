<?php

include 'include/pagina_apertura.php';
include_once 'function/function_booking.php';
include_once 'function/function_client.php';
include_once 'function/function_report.php';

?>

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
		mygrid.setHeader("Cliente,Data,spedizione,Invia");
		mygrid.setInitWidths("120,120,120,120,120");
		mygrid.setColAlign("left,left,left,left,left");
		mygrid.setColTypes("ro,ro,ro,ro,ro");
		mygrid.setColSorting("str,str,str,str,str");
		mygrid.init();
		mygrid.setSkin("dhx_black"); 
	
	<?php 
		$reports = getReports();
		foreach ($reports as $r) {
			$button_modify = '<button onclick=\"window.location.href=\'option.php?id_report='.$r['id'].'\'\">Invia</button>';
			$str = "mygrid.addRow(".$r['id'].", [\"".$r['path']."\", \"".
									$r['date']."\", \"".$r['send']."\", \"".
									$button_modify."\"]);";
			echo $str;
		}
	?></script><?php 
			$reports = getReports();
			
include 'include/pagina_chiusura.php';

?>