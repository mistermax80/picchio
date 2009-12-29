<?php
include_once 'include/header.php';
include_once 'function/function_calendar.php';

$month = $_REQUEST['month'];
$year = $_REQUEST['year'];
//If $month is not present, set it to current month.
$month = (empty($month)) ? date("n") : $month;


//If $year is not present, set it to current year.
$year = (empty($year)) ? date("Y") : $year;

drawCalendar("index.php","booking.php",$month,$year);

include_once 'include/menu.php';
include_once 'include/footer.php';
?>