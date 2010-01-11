<?php

include_once 'function/function_page.php';
include_once 'function/function_product.php';


drawOpenPage();

$id_booking = $_REQUEST['id_booking'];
?><div id="titoloContenuti">SERVIZI BAR</div>

	<link rel="STYLESHEET" type="text/css" href="include_js/dhtmlxGrid/codebase/dhtmlxgrid.css">
	<link rel="stylesheet" type="text/css" href="include_js/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_black.css">
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>        
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>

	<table width="805px">
		    <tr>
		        <td>
		            <div id="gridbox" style="width:85%;height:400px;background-color:white;overflow:hidden"></div>
		        </td>
		    </tr>
		</table>
	   
	<script>
		mygrid = new dhtmlXGridObject('gridbox');
		mygrid.setImagePath("include_js/dhtmlxGrid/codebase/imgs/");
		mygrid.setHeader("Articolo,Prezzo (Euro),Descrizione,Aggiungi,Modifica");
		mygrid.setInitWidths("200,150,120,100,100");
		mygrid.setColAlign("left,left,left,left,left");
		mygrid.setColTypes("ro,ro,ro,ro,ro");
		mygrid.setColSorting("str,str,str,str,str");
		mygrid.init();
		mygrid.setSkin("dhx_black");

		<?php 
		$products = getProducts();
		foreach ($products as $p) {
			
		$button_add = '<button onclick=\"window.location.href=\'option_booking.php?add_product='.$p['id'].'\
									&id_booking='.$id_booking.'\'\">Aggiungi</button>';
		
		$button_modify = '<button onclick=\"window.location.href=\'product.php?modify_product='.$p['id'].'\'\">Modifica</button>';
			
		$str = "mygrid.addRow(".$p['id'].", [\"".$p['name']."\",\"".$p['price']."\", \"".
									$p['description']."\", \"".
									$button_add."\",\"".$button_modify."\"]);";
									
			echo $str;
		}
?>
	</script>
	
<?php
			




drawClosePage("id_booking",$id_booking);
?>