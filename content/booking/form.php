<?php 
include_once FUNCTION_PATH.'function_client.php';
?>


<link type="text/css" href="<?=JQ_LOCATION?>css/ui-darkness/jquery-ui-1.7.2.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="<?=JQ_LOCATION?>js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?=JQ_LOCATION?>js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="<?=JQ_LOCATION?>development-bundle/ui/i18n/ui.datepicker-it.js"></script>

<script language="JavaScript" type="text/javascript">
<!--
	$(function() {
		$.datepicker.setDefaults($.datepicker.regional['it']);
		$("#date_in").datepicker({
			dateFormat: 'dd-mm-yy',
			changeMonth: true,
			changeYear: true,
			showOtherMonths: true,
			selectOtherMonths: true});
		$("#date_out").datepicker({
			dateFormat: 'dd-mm-yy',
			changeMonth: true,
			changeYear: true,
			showOtherMonths: true,
			selectOtherMonths: true});
	});
//-->
</script>
<?php
if(isset($_SESSION['id_client']) && $_SESSION['id_client']!=""){
	$client = getClient($_SESSION['id_client']);
} 

?>

<table align="center" bordercolor="FFFFFF">
	<tr>
		<th>Cliente</th>
		<td>
			<label> <?= $client['name']." ".$client['surname']?> </label>
		</td>
	</tr>
	<tr>
		<th>Camera</th>
		<td>
			<input type="text" name="id_room" value="<?=$_SESSION['id_room']?>"/>
		</td>
	</tr>
	<tr>
		<th>Data Arrivo</th>
		<td>
			<input type="text" id="date_in" name="date_in" value="<?php echo $_SESSION['date_in'];?>"/>
		</td>
	</tr>
	<tr>
		<th>Data Uscita</th>
		<td><input type="text" id="date_out" name="date_out" value="<?php echo $_SESSION['date_out'];?>" autocomplete="off"/></td>
	</tr>
	<tr>
		<th>Numero clienti</th>
		<td><input type="text" id="number_client" name="number_client"  value="<?php if($_SESSION['number_client']=="" || !isset($_SESSION['number_client'])){echo 1;}else{echo $_SESSION['number_client'];}?>" autocomplete="off"/></td>
	</tr>
	<tr>
		<th>Note</th>
		<td><input type="text" name="note"  value="<?php echo $_SESSION['note'];?>" autocomplete="off"/></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="<?php if($_REQUEST['mode']=="insert"){echo "insert_booking";}else{echo "update_booking";}?>" value="Salva"/></td>
	</tr>
</table>