<?php
include_once 'function/function_page.php';
include_once 'function/function_booking.php';
include_once 'include/costant_generic.php';

drawOpenPage();

?>
<div id="titoloContenuti">PRENOTAZIONE ELIMINATA</div>
<?php
if($_REQUEST['id_booking']){
	deleteBooking($_REQUEST['id_booking']);
}
drawClosePage();
?>

<script type="text/javascript">
	alert("Prenotazione Eliminata con successo!");
	window.location.href="index.php";
</script>