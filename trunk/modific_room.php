<?php

include_once 'function/function_room.php';


$room = $_REQUEST['id'];

echo "<fieldset>";

echo "Stanza corrente"." ".$room['id'];
echo "<br>Cambiare con la stanza :";

?>



<table border=1>
<tr>
	<td>Numero</td>
	<td>Posti letto</td>
	<td></td>
</tr>
<?php 
$rooms = getRooms();

	foreach ($rooms as $c) {
		$id = $c['id'];
		$type = $c['type'];
		$description = $c['surname'];
		$price = $c['price'];
		echo "<tr>";
		echo "<td>".$id."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$description."</td>";
		echo "<td><input type=\"radio\" name=\"id_room\" value=\"".$id."\"/></td>";
		echo "</tr>";
	}

	?>
	
	<form id="mofific_room" name="modific_room" action="booking.php" method="post">
	<input type="hidden" name="room" value="<?php echo $room;?>"/>
	<button value="submit">Salva modifiche</button>
	</form>

</table>
</fieldset>

