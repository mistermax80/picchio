<?php 

$hour=0;
$min=0;
$sec=0;
$day=23;
$month=11;
$year=2009;

$time = mktime($hour,$min,$sec,$month,$day,$year);

echo $time;
$time2 = 1257289200;
echo "<br>".date("d-m-Y",$time2);


?>