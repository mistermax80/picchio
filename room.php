<?php
include 'include/pagina_apertura.php';
include_once 'function/function_room.php';
$rooms = getRooms();

if(!($_POST['modific'])&&(!($_POST['salva']))){
?>

<div id="titoloContenuti">DISPOSIZIONE STANZE</div>


<form id="mofidic_room" name="mofidic_room" action="" method="post">
<input type="hidden" id="modific" name="modific" value="true"/>
<input type="hidden" id="room" name="room" value="<?php echo $r['id'];?>"/>
<table align="center" bordercolor="FFFFFF">
	<tr>
		<td></td>
	</tr>
	<tr>
		<td></td>
	</tr>
	<tr>
		<td>Camera</td>
		<td>
		<select id="room" name="room">
		<?php 
		foreach ($rooms as $r) {
				echo "<option value='".$r['id']."' > Stanza: ".$r['id']." - ".$r['type']."</option>";	
			}
		?>
		</select>
		</td>
	</tr>
	<tr>
		<td></td>
	</tr>
	<tr>
		<td></td>
	</tr>
	<tr>
	<tr>
		<td></td>
		<td><button value="submit">Modifica disposizione stanza</button></td>
	</tr>
	</table>
</form>	
	
<?php
} 


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
	$type = $_POST['$type'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	updateRoom($id,$type,$description,$price);
	//header ('Location: http://localhost/progetti-php/hotel/index.php');	
}


include 'include/pagina_chiusura.php';
?>