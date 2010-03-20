<?php
if(isset($_POST['delete']) && $_POST['delete']!="" ){ // Controllo se sono la pagina richiesta

	if(isset($_POST['id_client']) && $_POST['id_client']!="" ){ //Controllo se è stato impostato un id_client
		if(deleteClient($_POST['id_client'])){
			echo "<div id='messaggioContenutiCorretto'>Il cliente &egrave; stato rimosso con successo</div>";
		}else{
			echo "<div id='messaggioContenutiErrore'>Errore, il cliente non è stato rimosso</div>";
		}
	}else{?>
		<div id='messaggioContenutiErrore'>
			Errore, devi selezionare un cliente
			<br>
			<a href="javascript:history.back()">Torna Indietro</a>		
		</div>
		<?php
	}
}
?>