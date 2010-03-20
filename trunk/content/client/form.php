<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/_base.inc.php';
include_once FUNCTION_PATH.'function_client.php';
include_once FUNCTION_PATH.'function_page.php';

if(isset($_POST['update']) && $_POST['update']!=""){
	if(isset($_POST['id_client']) && $_POST['id_client']!="" ){ //Controllo se è stato impostato un id_client
		$client = getClient($_POST['id_client']);
	}
}
?>
<link type="text/css" href="<?=JQ_LOCATION?>css/ui-darkness/jquery-ui-1.7.2.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="<?=JQ_LOCATION?>js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?=JQ_LOCATION?>js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="<?=JQ_LOCATION?>development-bundle/ui/i18n/ui.datepicker-it.js"></script>

<script language="JavaScript" type="text/javascript">
<!--
	$(function() {
		$.datepicker.setDefaults($.datepicker.regional['it']);
		$("#date_birth").datepicker({
			yearRange: '<?=date('Y')-80?>:<?=date('Y')?>',
			dateFormat: 'dd-MM-yy',
			changeMonth: true,
			changeYear: true,
			showOtherMonths: true,
			selectOtherMonths: true});
		$("#release_document_date").datepicker({
			yearRange: '<?=date('Y')-80?>:<?=date('Y')?>',
			dateFormat: 'dd-MM-yy',
			changeMonth: true,
			changeYear: true,
			showOtherMonths: true,
			selectOtherMonths: true});
	});
//-->
</script>

<script language="JavaScript" type="text/javascript">
<!--
function checkforminsert(form){
	if (form.surname.value == "") {
	   alert( "Per favore inserire il Cognome!" );
	   form.surname.focus();
	   return false ;
	}
  	if (form.name.value == "") {
    	alert( "Per favore inserire il Nome!" );
    	form.name.focus();
    	return false ;
	}
  	if (form.date_birth.value == "") {
    	alert( "Per favore inserire la Data di Nascita!" );
    	form.date_birth.focus();
   	 	return false ;
	}
}
//-->
</script>
<input type="hidden" name="id_client" value="<?=$client['id']?>">
	<table align="center" id="tabella">
		<tr>
			<th>Cognome*</th>
			<td><input type="text" name="surname" value="<?=$client['surname']?>" autocomplete="off"/></td>
		</tr>
		<tr>
			<th>Nome*</th>
			<td><input type="text" name="name" value="<?=$client['name']?>" autocomplete="off"/></td>
		</tr>
		<tr>
			<th>Tipo Documento</th>
			<td><select name="type_document">
					<option value="cartaIdentita" <?php if($client['type_document']=="cartaIdentita"){echo " selected=\"selected\"";}?>>Carta di Identit&agrave;</option>
					<option value="patente" <?php if($client['type_document']=="patente"){echo " selected=\"selected\"";}?>>Patente di Guida</option>
					<option value="passaporto" <?php if($client['type_document']=="passaporto"){echo " selected=\"selected\"";}?>>Passaporto</option>
					<option value="altro" <?php if($client['type_document']=="altro"){echo " selected=\"selected\"";}?>>Altro</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Num. Documento</th>
			<td><input type="text" name="number_document" value="<?=$client['number_document']?>" autocomplete="off"/></td>
		</tr>
		<tr>
			<th>Documento rilasciato il</th>
			<td><input type="text" id="release_document_date" name="release_document_date" value="<?=$client['release_document_date']?>" autocomplete="off"/></td>
		</tr>
		<tr>
			<th>Documento rilasciato da</th>
			<td><input type="text" name="release_document_to" value="<?=$client['release_document_to']?>" autocomplete="off"/></td>
		</tr>
		<tr>
			<th>Cittadinanza</th>
			<td><input type="text" name="nationality" value="<?=$client['nationality']?>" autocomplete="off"/></td>
		</tr>
		<tr>
			<th>Data Nascita*</th>
			<td><input type="text" id="date_birth" name="date_birth" value="<?=$client['date_birth']?>" autocomplete="off"/></td>
		</tr>
		<tr>
			<th>Luogo Nascita</th>
			<td><input type="text" name="city_birth" value="<?=$client['city_birth']?>" autocomplete="off"/></td>
		</tr>
		<tr>
			<th>Indirizzo</th>
			<td><input type="text" name="address" value="<?=$client['address']?>" autocomplete="off"/></td>
		</tr>
		<tr>
			<th>Citt&agrave;</th>
			<td><input type="text" name="city" value="<?=$client['city']?>" autocomplete="off"/></td>
		</tr>
		<tr>
			<th>Telefono</th>
			<td><input type="text" name="telephone" value="<?=$client['telephone']?>" autocomplete="off"/></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><input type="text" name="email" value="<?=$client['email']?>" autocomplete="off"/></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td><h5>Campi Obbligatori*</h5></td>
			<td><input type="submit" name="<?php if($_POST['update']){echo "update_data";}else{echo "insert_data";}?>" value="Salva" onclick="return checkforminsert(this.form);return false;"/></td>
		</tr>
	</table>