<?php 

$months = array("Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno",
				"Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre");

?>

<select name="month">
<?php
//$mon == date("n")
$m_corr=11;
$m = 1;
foreach($months as $month){
	if($m == $m_corr){
		echo "<option value=\"".$m."\" selected=\"selected\">".$month."</option>";
	}else{
		echo "<option value=\"".$m."\">".$month."</option>";
	}
	$m++;
}
?>
</select>

<select name="year">
<?php
//$mon == date("n")
for($year=2005;$year<=2030;$year++){
	if($year == date("Y")){
		echo "<option value=\"".$year."\" selected=\"selected\">".$year."</option>";
	}else{
		echo "<option value=\"".$year."\">".$year."</option>";
	}
}
?>
</select>
