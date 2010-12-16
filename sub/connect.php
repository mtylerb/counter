<?php
error_reporting(E_ALL ^ E_NOTICE);
$db_settings = explode("=",DB_DSN);
$db_name = explode(";" , $db_settings[1]);
$db_name = $db_name[0];
$db_host = explode(";", $db_settings[2]);
$db_host = $db_host[0];
$db_user = DB_USER;
$db_pass = DB_PASS;

$con = mysql_connect($db_host, $db_user, $db_pass);
$selectdb = mysql_select_db($db_name, $con);
if(!selectdb){
die("Incorect");
}
?>
