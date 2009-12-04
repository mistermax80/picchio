<?php
include 'include/pagina_apertura.php';
include_once 'function/function_room.php';


if(isset($_POST['save']) && $_POST['save']!=""){	
	//Aggiorna nel db
	$id = $_POST['id'];
	$type = $_POST['type'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	updateRoom($id,$type,$description,$price);
	echo "Salvataggio avvenuto con successo.";
	echo "<a href=\"room.php\">Ritorna</a>";	

}else if(isset($_POST['delete']) && $_POST['delete']!=""){
	$id = $_POST['id'];
	deleteRoom($id);
	echo "Cliente eliminato con successo.";
	echo "<a href=\"modific_client.php\">Ritorna</a>";
}


else if(!(isset($_REQUEST['id_room']))){
	
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
		            <div id="gridbox" style="width:82%;height:250px;background-color:white;overflow:hidden"></div>
		        </td>
		    </tr>
		</table>
	   
	<script>
		mygrid = new dhtmlXGridObject('gridbox');
		mygrid.setImagePath("include_js/dhtmlxGrid/codebase/imgs/");
		mygrid.setHeader("Numero,Tipo,Descrizione,Prezzo,Modifica");
		mygrid.setInitWidths("50,200,200,100,102");
		mygrid.setColAlign("left,left,left,left,left");
		mygrid.setColTypes("ro,ro,ro,ro,ro");
		mygrid.setColSorting("str,str,str,str,str");
		mygrid.init();
		mygrid.setSkin("dhx_black");

		<?php 
				$rooms = getRooms();
				foreach ($rooms as $r) {
					$button_modify = '<button onclick=\"window.location.href=\'room.php?id_room='.$r['id'].'\'\">Modifica</button>';
					$str = "mygrid.addRow(".$r['id'].", [\"<b>".$r['id']."</b>\", \"".$r['type']."\", \"".$r['description']."\", \"".
											$r['price']."\", \"".
											$button_modify."\"]);";
					echo $str;
				}
				?>

	</script>
	<form id="add_room" name="add_room" action="room.php" method="post">
					<input type="hidden" name="return_page" value="client"/>
					<button id="add_client" value="submit">Aggiungi Stanza</button>
	</form>

	
<?php
}
	else {

	$id_room=$_REQUEST['id_room'];
	$room=getRoom($id_room);
	?>
	<div id="titoloContenuti">MODIFICA DISPOSIZIONE STANZE</div>
	
	<script LANGUAGE="JavaScript">
		function confirmSubmit()
		{
			var agree=confirm("Eliminare stanza?");
			if (agree)
				return true ;
			else
				return false ;
		}
	</script>
	
	<form id="mofidic_room" name="mofidic_room" action="" method="post">
		<input type="hidden" id="salva" name="salva" value="true"/>
		<input type="hidden" id="id" name="id" value="<?php echo $room['id'];?>"/>
		<table align="center">
			<tr>
				<td>Camera</td>
				<td><?php echo $room['id'];?>
				<!-- <input type="text" name="type" value=""/></td> -->
			</tr>
			<tr>
				<td>Tipo</td>
				<td><input type="text" name="type" autocomplete="off" value="<?php echo $room['type'];?>"/></td>
			</tr>
			<tr>
				<td>Descrizione</td>
				<td><input type="text" name="description" autocomplete="off" value="<?php echo $room['description'];?>"/></td>
			</tr>
			<tr>
				<td>Prezzo</td>
				<td><input type="text" name="price" autocomplete="off" value="<?php echo $room['price'];?>"/></td>
			</tr>
			<tr>
					<td><input id="delete" name="delete" type="submit" onClick="return confirmSubmit();" value="Elimina"/></td>
					<td><input id="save" name="save" type="submit" value="Salva"/></td>
				</tr>
		</table>
	</form>
	<?php 
}

include 'include/pagina_chiusura.php';
?>