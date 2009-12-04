<?php

include 'include/pagina_apertura.php';
include_once 'function/function_room.php';


?>
<div id="titoloContenuti">AGGIUNGI NUOVA STANZA</div> 


<?php
if(!(isset($_POST['save']) && $_POST['save']!="")){
	
	?>
	<form id="add_client" name="add_client" method="post">
		<input type="hidden" name="save" value="save" />
		<table align="center">
			<tr>
				<td>Numero</td>
				<td><input type="text" name="id" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Tipo</td>
				<td>
				<select name="type">
				<option>Scegliere la tipologia</option>
   				<option value= "singola">Singola</option>
   				<option value= "doppia">Doppia</option>
			   	<option value= "matrimoniale">Matrimoniale</option>
   				<option value= "tripla">Tripla</option>
   				<option value= "quadrupla">Quadrupla</option>
				</select>	
				</td>
			</tr>
			<tr>
				<td>Descrizione</td>
				<td><input type="text" name="description" autocomplete="off"/></td>
			</tr>
			<tr>
				<td>Prezzo</td>
				<td><input type="text" name="price" autocomplete="off"/></td>
			</tr>
			<tr>
				<td></td>
				<td><button value="submit">Salva</button></td>
			</tr>
		</table>
	</form>

<?php 	
 }else {
	$id = $_POST['id'];
	$type = $_POST['type'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	addroom($id,$type,$description,$price);
	
	echo "Stanza aggiunta con successo.";
	echo "<a href=\"room.php\">Ritorna</a>";
	
	
}






include 'include/pagina_chiusura.php';
?>