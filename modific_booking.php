<?php

include 'include/pagina_apertura.php';
include_once 'function/function_room.php';
include_once 'function/function_booking.php';

$id_booking = $_REQUEST['id_booking'];
$booking = getBookingById($id_booking);

//var_dump($booking);

?><div id="titoloContenuti">MODIFICA PRENOTAZIONE</div><?php 

$rooms = getRooms();

if($_POST['salva']){
	
	var_dump($_POST);
	//echo "<br><br>";
	$id=$_POST['id'];
	$id_client=$_POST['id_client'];
	$id_room=$_POST['id_room'];
	$date_in=$_POST['date_in'];
	$date_out=$_POST['date_out'];
	$number_client=$_POST['number_client'];
	$note=$_POST['note'];
	updateBooking($id,$id_client,$id_room,$date_in,$date_out,$number_client,$note);
	echo "Prenotazione Correttamente Modificata!";
	include 'include/pagina_chiusura.php';
}else{

?>

		<link type="text/css" href="include_js/jquery-ui-1.7.2.custom/css/ui-darkness/jquery-ui-1.7.2.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="include_js/jquery-ui-1.7.2.custom//js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="include_js/jquery-ui-1.7.2.custom//js/jquery-ui-1.7.2.custom.min.js"></script>
	
		<script type="text/javascript">
			$(function() {
				$("#date_in").datepicker({dateFormat: 'yy-mm-dd'}); 
				$("#date_out").datepicker({dateFormat: 'yy-mm-dd'}); 
			});
		</script>
		
<form id="mofific_booking" name="mofific_booking" action="" method="post">
<input type="hidden" id="salva" name="salva" value="true"/>
<input type="hidden" id="id" name="id" value="<?php echo $booking['id'];?>"/>
<input type="hidden" id="id_client" name="id_client" value="<?php echo $booking['client'];?>"/>
<table align="center" bordercolor="FFFFFF">
	<tr>
		<td></td>
	</tr>
	<tr>
		<td></td>
	</tr>
	<tr>
		<td>Camera</td>
		<td>
		<select id="id_room" name="id_room">
		<?php
		foreach ($rooms as $r) {
			if($r['id']==$booking['room']){
				echo "<option value='".$r['id']."' selected='selected'>Stanza: ".$r['id']." - ".$r['type']."</option>";
			}else{
				echo "<option value='".$r['id']."' > Stanza: ".$r['id']." - ".$r['type']."</option>";	
			}
		}
		?>
		</select>
		</td>
	</tr>
	<tr>
		<td>Data Arrivo</td>
		<td><input type="text" id="date_in" name="date_in" autocomplete="off" value="<?php echo substr($booking['date_in'],0,10);?>" /></td>
	</tr>
	<tr>
		<td>Data Uscita</td>
		<td><input type="text" id="date_out" name="date_out" autocomplete="off" value="<?php echo substr($booking['date_out'],0,10);?>" /></td>
	</tr>
	<tr>
		<td>Numero clienti</td>
		<td><input type="text" name="number_client" autocomplete="off" value="<?php echo $booking['number_client'];?>" /></td>
	</tr>
	<tr>
		<td>Note</td>
		<td><input type="text" name="note" value="<?php echo $booking['note'];?>" /></td>
	</tr>
	<tr>
		<td></td>
		<td><button value="submit">Salva</button></td>
	</tr>
</table>

</form>
<?php 
include 'include/pagina_chiusura.php';
}
?>