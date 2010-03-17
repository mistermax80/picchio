<?php
require_once '../../function/function_client.php';
require_once '../../include/site_config.php';
include_once '../../function/function_page.php';
drawOpenPage();
?>
<form id="search_client" name="search_client" method="post"><input
	type="hidden" name="date_in" value="<?php echo $date_in;?>" /> <input
	type="hidden" name="id_room" value="<?php echo $id_room;?>" /> <input
	id="text_search" name="text_search" type="text" value="" /> <input
	id="search" name="search" type="submit" value="Cerca"></input></form>
<form id="add_client" name="add_client" action="add_client.php"
	method="post"><input type="hidden" name="return_page" value="booking" />
<input type="hidden" name="date_in" value="<?php echo $date_stamp_in;?>" />
<input type="hidden" name="id_room" value="<?php echo $id_room;?>" />
<button id="add_client" value="submit">Aggiungi Cliente</button>
</form>

<?php
if(isset($_POST['search']) && $_POST['search']!="" ){
	?>

	<?php
	$text_search = $_POST['text_search'];
	$clients = searchClients($text_search);
		//Cognome,Nome,Tipo Doc.,Num Doc.,Data Nascita,Luogo Nascita,Indirizzo,Citt&agrave;,Telefono,Email,Seleziona,Modifica
	echo "<table id=\"tabelle_dati\">";
	echo "<tr>";
	echo "<th class=\"head_tabella\">Cognome</th>";
	echo "<th>Nome</th>";
	echo "<th>Cognome</th>";
	echo "<th>Tipo Documento</th>";
	echo "<th>Data di Nascita</th>";
	echo "<th>Luogo di Nascita</th>";
	echo "<th>Indirizzo</th>";
	echo "<th>Citt&agrave;</th>";
	echo "<th>Telefono</th>";
	echo "<th>Email</th>";
	echo "<th>Seleziona</th>";
	echo "<th>Modifica</th>";	
	echo "</tr>";

	$i=0;	
	foreach ($clients as $client) {
		echo "<tr class=\"celle_tabella_".($i%2)."\">";
		echo "<td>".$client['name']."</td>";
		echo "<td>".$client['surname']."</td>";
		echo "<td>".$client['type_document']."</td>";
		echo "<td>".$client['number_document']."</td>";
		echo "<td>".$client['date_birth']."</td>";
		echo "<td>".$client['city_birth']."</td>";
		echo "<td>".$client['address']."</td>";
		echo "<td>".$client['city']."</td>";
		echo "<td>".$client['telephone']."</td>";
		echo "<td>".$client['email']."</td>";
		echo "<td><input type=\"button\" value=\"Seleziona\" onclick=\"window.location.href='booking.php?id_client=".$client['id']."'\" /></td>";
		echo "<td><input type=\"button\" value=\"Modifica\"/></td>";
		echo "</tr>";
		$i++;
	}
	echo "</table>";
}
drawClosePage();
?>