<?php

include_once 'function/function_room.php';
include_once 'function/function_booking.php';

$id_booking = $_REQUEST['id_booking'];
$booking = getBookingById($id_booking);

//var_dump($booking);

$rooms = getRooms();

if($_POST['salva']){
	
	//var_dump($_POST);
	//echo "<br><br>";
	$id=$_POST['id'];
	$id_client=$_POST['id_client'];
	$id_room=$_POST['id_room'];
	$date_in=$_POST['date_in'];
	$date_out=$_POST['date_out'];
	$note=$_POST['note'];
	updateBooking($id,$id_client,$id_room,$date_in,$date_out,$note);
	echo "Prenotazione Correttamente Modificata!";
}else{

?>
<form id="mofific_booking" name="mofific_booking" action="" method="post">
<input type="hidden" id="salva" name="salva" value="true"/>
<input type="hidden" id="id" name="id" value="<?php echo $booking['id'];?>"/>
<input type="hidden" id="id_client" name="id_client" value="<?php echo $booking['client'];?>"/>
<fieldset>
<table bordercolor="FFFFFF" border="1px">
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
		<td><input type="text" name="date_in" value="<?php echo substr($booking['date_in'],0,10);?>" /></td>
	</tr>
	<tr>
		<td>Data Uscita</td>
		<td><input type="text" name="date_out" value="<?php echo substr($booking['date_out'],0,10);?>" /></td>
	</tr>
	<tr>
		<td>Note</td>
		<td><input type="text" name="note" value="<?php echo $booking['note'];?>" /></td>
	</tr>
</table>
<button value="submit">Salva</button>
</fieldset>
</form>
<?php 
}
?>