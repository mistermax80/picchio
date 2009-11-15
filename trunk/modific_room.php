<?php


$room = $_REQUEST['id'];

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
		$type = $c['name'];
		$description = $c['surname'];
		$price = $c['price'];
		echo "<tr>";
		echo "<td><input type=\"radio\" name=\"id_client\" value=\"".$id."\"/></td>";
		echo "<td>".$type."</td>";
		echo "<td>".$description."</td>";
		echo "<td>".$price."</td>";
		echo "</tr>";
	}

?>

</table>