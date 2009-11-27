<?php

include 'include/pagina_apertura.php';
include_once 'function/function_client.php';

?><div id="titoloContenuti">GESTIONE CLIENTI</div> 


<form id="modific_client" name="modific_client" action="modific_client.php" method="request" >
<table align="center" bordercolor="FFFFFF">
			<tr>
				<th></th>
				<td><b>Nome</b></td>
				<td><b>Cognome</b></td>
			</tr>
			<?php
			$clients = getClients();
		
			foreach ($clients as $c) {
				$id = $c['id'];
				$name = $c['name'];
				$surname = $c['surname'];
				echo "<tr>";
				echo "<td><input type=\"radio\" name=\"id\" value=\"".$id."\"/></td>";
				echo "<td>".$name."</td>";
				echo "<td>".$surname."</td>";
				echo "</tr>";
			}
			?>
			<tr>
			
				<td></td>
				<td></td>
				<td><br>
				<button value="submit">Modifica informazioni cliente</button></td>
			</table>
			</form>
			
			
<?php 
		include 'include/pagina_chiusura.php';
	?>