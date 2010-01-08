<?php

include_once 'function/function_page.php';


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
		            <div id="gridbox" style="width:73%;height:25px;background-color:white;overflow:hidden"></div>
		        </td>
		    </tr>
		</table>
	   
	<script>
		mygrid = new dhtmlXGridObject('gridbox');
		mygrid.setImagePath("include_js/dhtmlxGrid/codebase/imgs/");
		mygrid.setHeader("Articolo,Prezzo (Euro),Aggiungi,Elimina");
		mygrid.setInitWidths("200,150,120,112");
		mygrid.setColAlign("left,left,left,left");
		mygrid.setColTypes("ro,ro,ro,ro");
		mygrid.setColSorting("str,str,str,str");
		mygrid.init();
		mygrid.setSkin("dhx_black");


	</script>
	
	<table   height="60">
		<tr>
			<td width="195">
			Colazione
			</td>
			<td width="145">
			5,00
			</td>
			<td width="115">
			<form id="bar" name="bar" action="option_booking.php" method="post">
			<input type="hidden" name="id_booking" value="<?php echo $id_booking ?>"/>
			<input type="hidden" name="bar" value="bar"/>
			<input type="hidden" name="type" value="colazione"/>
			<input type="hidden" name="price" value="5"/>
			<button id="bar" value="submit">Aggiungi</button>
			</form>
			</td>
			<td width="100">
			<input type="button" value="Elimina">
			</td>
		</tr>
	</table>
<?php
			




drawClosePage("id_booking",$id_booking);
?>