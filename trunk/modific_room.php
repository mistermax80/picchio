<?php

include_once 'function/function_room.php';


$room = $_POST['room'];
echo "<fieldset>";
echo "<div align = center>";
echo "<br>Cambiare con la stanza :";

?>


<form id="mofific_room" name="modific_room" action="index.php" method="post">
<table border=1px>
<tr>
	<td>Numero</td>
	<td>Posti letto</td>
	
</tr>
<?php 
$rooms = getRooms();

	foreach ($rooms as $c) {
		$id = $c['id'];
		if ($c['id'] != $room){
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
	}

	?>

</table>
<br>
<input type="hidden" name="room" value="<?php echo $id_room;?>"/>
<button  value="submit">Salva modifiche</button>
</form>
</fieldset>
</div>

