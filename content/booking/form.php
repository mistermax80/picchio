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

<table align="center" bordercolor="FFFFFF">
	<tr>
		<th>Id Cliente</th>
		<td>
			<input type="text" name="id_client" value="<?=$_SESSION['id_client']?>"/>
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
			<input type="text" id="date_in" name="date_in" value="<?php echo date('j-m-Y',$_SESSION['date_stamp_in']);?>"/>
		</td>
	</tr>
	<tr>
		<th>Data Uscita</th>
		<td><input type="text" id="date_out" name="date_out" value="<?php echo $_SESSION['date_out'];?>" autocomplete="off"/></td>
	</tr>
	<tr>
		<th>Numero clienti</th>
		<td><input type="text" id="number_client" name="number_client"  value="<?php echo $_SESSION['number_client'];?>" autocomplete="off"/></td>
	</tr>
	<tr>
		<th>Note</th>
		<td><input type="text" name="note"  value="<?php echo $_SESSION['note'];?>" autocomplete="off"/></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="save_booking" value="Salva"></input></td>
	</tr>
</table>