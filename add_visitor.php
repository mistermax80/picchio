<?php
include_once 'function/function_page.php';
include_once 'function/function_visitor.php';
include_once 'function/function_client.php';
include_once 'function/function_booking.php';

drawOpenPage();

$id = $_REQUEST['id_booking'];
/*
$date_stamp_in = $_REQUEST['date_stamp_in'];
$booking=getBookingById($id);
$room=$booking['room'];
*/

?>
		<div id="titoloContenuti">AGGIUNGI  NUOVO VISITATORE</div>
		<form id="search_client" name="search_client" method="post">
		<input id="text_search" name="text_search" type="text" value=""/>
		<input id="search" name="search" type="submit" value="Cerca"/>
		</form>
		<br><br>
		<form id="add_visitor" name="add_client" action="add_client.php" method="post">
		<input type="hidden" name="id_booking" value="<?php echo $id ?>"/>
		<button id="add_visitor" value="submit">Aggiungi Visitatore</button>
		</form>
<?php 
if(isset($_POST['search']) && $_POST['search']!="" ){
if(!(isset($_REQUEST['id_client']) && $_REQUEST['id_booking'])){
?>
	<link rel="STYLESHEET" type="text/css" href="include_js/dhtmlxGrid/codebase/dhtmlxgrid.css">
	<link rel="stylesheet" type="text/css" href="include_js/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_black.css">
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>        
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>
	
		<table width="805px">
		    <tr>
		        <td>
		            <div id="gridbox" style="width:110%;height:350px;background-color:white;overflow:hidden"></div>
		        </td>
		    </tr>
		</table>
	   
	<script>
		mygrid = new dhtmlXGridObject('gridbox');
		mygrid.setImagePath("include_js/dhtmlxGrid/codebase/imgs/");
		mygrid.setHeader("Cognome,Nome,Tipo Doc.,Num Doc.,Data Nascita,Luogo Nascita,Indirizzo,Citt&agrave;,Telefono,Email,Aggiungi,Modifica");
		mygrid.setInitWidths("70,70,70,70,70,70,70,70,70,70,80,80,80");
		mygrid.setColAlign("left,left,left,left,left,left,left,left,left,left,left,left");
		mygrid.setColTypes("ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro,ro");
		mygrid.setColSorting("str,str,str,str,str,str,str,str,str,str,str,str,str");
		mygrid.init();
		mygrid.setSkin("dhx_black");
	
	<?php
		$text_search = $_POST['text_search'];
		$clients = searchClients($text_search);
		foreach ($clients as $c) {
			$button_modify = '<button onclick=\"window.location.href=\'modific_client.php?id_client='.$c['id'].'\
									& id_booking='.$id.'\'\">Modifica</button>';
			$button_add = '<button onclick=\"window.location.href=\'add_visitor.php?id_client='.$c['id'].'\
									& id_booking='.$id.'\'\">Aggiungi</button>';
			$str = "mygrid.addRow(".$c['id'].", [\"".$c['surname']."\", \"".$c['name']."\", \"".
									$c['type_document']."\", \"".$c['number_document']."\", \"".
									$c['date_birth']."\", \"".$c['city_birth']."\", \"".
									$c['address']."\", \"".$c['city']."\", \"".
									$c['telephone']."\", \"".$c['email']."\", \"".
									$button_add."\",\"".$button_modify."\"]);";
			echo $str;
		}
	?>
	</script>
<?php
	}
}if((isset($_REQUEST['id_client']) && $_REQUEST['id_booking'])){

		//Aggiungi nel db
		$id_booking = $_REQUEST['id_booking'];
		$id_client = $_REQUEST['id_client'];
		$id_visitor = addVisitor($id_booking,$id_client);
		if($id_visitor==""){
			echo "Visitatore aggiunto con successo.";
			}else{
				echo "<a href=\"add_visitor.php\">ERRORE</a>";
	}

	?>


<?php }
drawClosePage("id_booking",$id_booking);
?>