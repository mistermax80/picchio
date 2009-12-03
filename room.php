<?php
include 'include/pagina_apertura.php';
include_once 'function/function_room.php';


//if(!($_POST['modific'])&&(!($_POST['salva']))){
	
?>

<div id="titoloContenuti">DISPOSIZIONE STANZE</div>


	<link rel="STYLESHEET" type="text/css" href="include_js/dhtmlxGrid/codebase/dhtmlxgrid.css">
	<link rel="stylesheet" type="text/css" href="include_js/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_black.css">
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>        
	<script  src="include_js/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>
	
		<table width="805px">
		    <tr>
		        <td>
		            <div id="gridbox" style="width:100%;height:250px;background-color:white;overflow:hidden"></div>
		        </td>
		    </tr>
		</table>
	   
	<script>
		mygrid = new dhtmlXGridObject('gridbox');
		mygrid.setImagePath("include_js/dhtmlxGrid/codebase/imgs/");
		mygrid.setHeader("Numero,Tipo,Descrizione,Prezzo");
		mygrid.setInitWidths("100,200,200,100");
		mygrid.setColAlign("right,right,right,right");
		mygrid.setColTypes("ro,ro,ro,ro");
		mygrid.setColSorting("str,str,str,str");
		mygrid.init();
		mygrid.setSkin("dhx_black");

		<?php 
				$rooms = getRooms();
				foreach ($rooms as $r) {
					$button_modify = '<button onclick=\"window.location.href=\'modific_client.php?id_client='.$c['id'].'\'\">Modifica</button>';
					$str = "mygrid.addRow(".$r['id'].", [\"".$r['type']."\", \"".$r['description']."\", \"".
											$r['price']."\", \"".
											$button_modify."\"]);";
					//echo $str;
				}
				?>

	</script>
	<form id="add_room" name="add_room" action="room.php" method="post">
					<input type="hidden" name="return_page" value="client"/>
					<button id="add_client" value="submit">Aggiungi Stanza</button>
	</form>

	
<?php
//}

if($_POST['modific']&&(!($_POST['salva']))){
	$room=getRoom($room);
	?>
	<div id="titoloContenuti">MODIFICA DISPOSIZIONE STANZE</div>
	<form id="mofidic_room" name="mofidic_room" action="" method="post">
		<input type="hidden" id="salva" name="salva" value="true"/>
		<input type="hidden" id="id" name="id" value="<?php echo $room['id'];?>"/>
		<table align="center">
			<tr>
				<td>Tipo</td>
				<td><input type="text" name="type" value="<?php echo $room['type'];?>"/></td>
			</tr>
			<tr>
				<td>Descrizione</td>
				<td><input type="text" name="description" value="<?php echo $room['description'];?>"/></td>
			</tr>
			<tr>
				<td>Prezzo</td>
				<td><input type="text" name="price" value="<?php echo $room['price'];?>"/></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td><button value="submit">Salva</button></td>
			</tr>
		</table>
	</form>
	<?php 
}
	if($_POST['salva']){	
	//Aggiorna nel db
	$id = $_POST['id'];
	$type = $_POST['type'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	updateRoom($id,$type,$description,$price);
	//header ('Location: http://localhost/progetti-php/hotel/index.php');	
}


include 'include/pagina_chiusura.php';
?>