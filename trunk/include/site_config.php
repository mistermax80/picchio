<?php
//include_once '_base.inc.php';

//Sono definite costanti di configurazioni dell'applicazione
define('CANONICAL_HOST','hotel');
define('SITE_TITLE','Hotel 2010');
define('SITE_OWNER','La Villa Hotel');
define('COPYRIGHT_OWNER','Picchio & Picchio');
define('COPYRIGHT_YEARS','2010');

define("FORMAT_DATE_IT","j-F-Y");
define("FORMAT_DATE","Y-m-j");

//Definizione dei location importanti per le aree di interesse pubbliche visibili da web
define("ROOT_LOCATION","/");

define("CSS_LOCATION","/");
define("IMAGES_LOCATION","/images/");
define("ICONS_LOCATION","/images/icons/");
define("REPORT_LOCATION","/report/");

define("JS_LOCATION","/include_js/");
define("JQ_LOCATION","/include_js/jquery-ui-1.7.2.custom/");

define("CONTENT_LOCATION","/content/");
define("CLIENT_LOCATION",CONTENT_LOCATION."client/");
define("ROOM_LOCATION",CONTENT_LOCATION."room/");
define("BOOKING_LOCATION",CONTENT_LOCATION."booking/");
define("PRODUCT_LOCATION",CONTENT_LOCATION."product/");

//Definizione delle costanti di configurazione del database
define("LOCALHOST","localhost");
define("DB_ADDRESS","127.0.0.1");
define("DB_NAME","hotel");

define("USER_ROOT","root");
define("PASS_ROOT","root");

define("USER","root");
define("PASS","root");
?>