<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/_base.inc.php';
include_once FUNCTION_PATH.'function_page.php';
include_once FUNCTION_PATH.'function_client.php';

drawOpenPage();

if(!isset($_POST['search']) || !$_POST['search']!="" ){
?>
<form method="post"> 
	<input id="text_search" name="text_search" type="text" value="" /> 
	<input id="search" name="search" type="submit" value="Cerca"></input>
</form>
<?php
}else{
	
	$text_search = $_POST['text_search'];
	$clients = searchClients($text_search);
	echo "<form method=\"post\">";
	echo "<input id=\"text_search\" name=\"text_search\" type=\"text\" name=\"search\" value=\"Cerca\">";
	echo "<input type=\"submit\" id=\"search\" name=\"search\" value=\"Cerca\">";
	echo "<input type=\"submit\" name=\"insert\" value=\"Aggiungi\">";
	echo "<input type=\"submit\" name=\"update\" value=\"Modifica\">";
	echo "<input type=\"submit\" name=\"delete\" value=\"Elimina\">";
	echo "<input type=\"submit\" name=\"select\" value=\"Seleziona\">";

	echo "<table id=\"tabella\">";
	echo "<tr>";
	echo "<th></th>";
	echo "<th>Cognome</th>";
	echo "<th>Nome</th>";
	echo "<th>Cognome</th>";
	echo "<th>Tipo Documento</th>";
	echo "<th>Data di Nascita</th>";
	echo "<th>Luogo di Nascita</th>";
	echo "<th>Indirizzo</th>";
	echo "<th>Citt&agrave;</th>";
	echo "<th>Telefono</th>";
	echo "<th>Email</th>";	
	echo "</tr>";

	$i=0;	
	foreach ($clients as $client) {
		echo "<tr class=\"celle_tabella_".($i%2)."\">";
		echo "<td><input type=\"radio\" name=\"id_client\" value=\"".$client['id']."\"></td>";
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
		echo "</tr>";
		$i++;
	}
	echo "</table>";
	echo "</form>";
}
drawClosePage();
?>