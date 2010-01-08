<?php
include_once 'function/function_page.php';
include_once 'function/function_booking.php';
include_once 'include/costant_generic.php';

drawOpenPage();

?><div id="titoloContenuti">ELIMINA PRENOTAZIONE</div><?php 

	if($_REQUEST['id_booking']){
			$id = $_REQUEST['id_booking'];
			$booking = getBookingById($id);
	//		echo "<b>Informazioni prenotazione</b>";
?>
	<link rel="STYLESHEET" type="text/css" href="include_js/dhtmlxGrid/codebase/dhtmlxgrid.css">
	<link rel="stylesheet" type="text/css" href="include_js/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_black.css">
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>        
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>

	<table width="805px">
		    <tr>
		        <td>
		            <div id="gridbox" style="width:100%;height:60px;background-color:white;overflow:hidden"></div>
		        </td>
		    </tr>
		</table>
	   
	<script>
		mygrid = new dhtmlXGridObject('gridbox');
		mygrid.setImagePath("include_js/dhtmlxGrid/codebase/imgs/");
		mygrid.setHeader("Stanza,Check  In,Check  Out,Numero Clienti,Note,Elimina");
		mygrid.setInitWidths("90,150,150,100,210,100");
		mygrid.setColAlign("left,left,left,left,left,left");
		mygrid.setColTypes("ro,ro,ro,ro,ro,ro");
		mygrid.setColSorting("str,str,str,str,str,str");
		mygrid.init();
		mygrid.setSkin("dhx_black");
		
		<?php 
			
			$button_delete = '<button onclick=\"window.location.href=\'delete_booking.php?delete='.$booking['id'].'\
								&id='.$booking['id'].'\'\">Elimina</button>';
		
			$str = "mygrid.addRow(".$booking['id'].", [\"".$booking['room']."\",\"".substr($booking['date_in'],0,10)."\", \"".
									substr($booking['date_out'],0,10)."\", \"".$booking['number_client']."\", \"".
									$booking['note']."\",\"".$button_delete."\"]);";
			echo $str;
	
	?>
	</script>
	<!-- 	 <br><br><br><br>
		<script LANGUAGE="JavaScript">
		function confirmSubmit()
		{
			var agree=confirm("Eliminare prenotazione?");
			if (agree)
				return true ;
			else
				return false ;
		}
	</script>
    <form id="delete" name="delete" action="" method="post">
    <input id="delete" name="delete" type="submit" onClick="return confirmSubmit();" value="Elimina Prenotazione"/>
    </form> -->
    <?php 
    
	}
    if(isset($_REQUEST['delete'])){
			deleteBooking($id);
			echo "Prenotazione eliminata con successo.";
			// "<a href=\"index.php\">Ritorna</a>";
		

drawClosePage("id_booking",$id_booking);}
?>