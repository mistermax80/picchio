<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/_base.inc.php';

include_once INCLUDE_PATH.'header.php';
include_once FUNCTION_PATH.'function_calendar.php';
include_once FUNCTION_PATH.'function_page.php';

$month = $_REQUEST['month'];
$year = $_REQUEST['year'];

//If $month is not present, set it to current month.
$month = (empty($month)) ? date("n") : $month;

//If $year is not present, set it to current year.
$year = (empty($year)) ? date("Y") : $year;

drawCalendar(CANONICAL_HOST,BOOKING_LOCATION,$month,$year);

drawClosePage();
?>