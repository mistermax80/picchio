<?php
include 'include/header.php';

include_once 'function/calendar.php';


$month = $_REQUEST['month'];
$year = $_REQUEST['year'];
//If $month is not present, set it to current month.
$month = (empty($month)) ? date("n") : $month;


//If $year is not present, set it to current year.
$year = (empty($year)) ? date("Y") : $year;

print_calendar("index.php","booking.php",$month,$year);

include 'include/footer.php';

?>