<?php

$_DB_HOST = "localhost";
$_DB_NAME = "grocery_shop_db";
$_DB_USER = "groceryShopUser";
$_DB_PASS = "Project@2020";
$_DB_PX = "gs_";
$_PREFIX = $_DB_PX;
$_SQL = new mysqli($_DB_HOST, $_DB_USER, $_DB_PASS, $_DB_NAME);
if(mysqli_connect_errno()) { 
	array_push($_CONSOLE, "SQL_CONNECTION_ERROR:".mysqli_connect_errno()); 
	exit(); 
}
else{ array_push($_CONSOLE, "SQL_CONNECTION_SUCCESS"); }

array_push($_CONSOLE, 'FILE:'.$_SERVER['PHP_SELF']);

?>