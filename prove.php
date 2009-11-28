<?php 
include_once 'function/function_client.php';
$clients = getClients();
?>

<link rel="STYLESHEET" type="text/css" href="include_js/dhtmlxGrid/codebase/dhtmlxgrid.css">
<link rel="stylesheet" type="text/css" href="include_js/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_black.css">
<script  src="include_js/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>        
<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>    
 
<table width="710px">
    <tr>
        <td>
            <div id="gridbox" style="width:100%;height:250px;background-color:white;overflow:hidden"></div>
        </td>
    </tr>
</table>
    
<script>
	mygrid = new dhtmlXGridObject('gridbox');
	mygrid.setImagePath("include_js/dhtmlxGrid/codebase/imgs/");
	mygrid.setHeader("Nome,Cognome,Tipo Doc.,Num Doc.,Data Nascita,Luogo Nascita,Indirizzo,Citt&agrave;,Telefono,Email");
	mygrid.setInitWidths("70,70,70,70,70,70,70,70,70,70");
	mygrid.setColAlign("right,right,right,right,right,right,right,right,right,right");
	mygrid.setColTypes("ro,ro,ro,ro,ro,ro,ro,ro,ro,ro");
	mygrid.setColSorting("str,str,str,str,str,str,str,str,str,str");
	mygrid.init();
	mygrid.setSkin("dhx_black");

<?php
	foreach ($clients as $c) {
		$str = "mygrid.addRow(".$c['id'].", [\"".$c['name']."\", \"".$c['surname']."\", \"".
								$c['type_document']."\", \"".$c['number_document']."\", \"".
								$c['date_birth']."\", \"".$c['city_birth']."\", \"".
								$c['address']."\", \"".$c['city']."\", \"".
								$c['telephone']."\", \"".$c['email']."\"]);";
		echo $str;
	}
?>
</script>

