<?php

GLOBAL $_CONSOLE; $_CONSOLE = [];

GLOBAL $_SQL; 		//SQL CONNECTION
GLOBAL $_PREFIX;	//SQL TABLE PREFIX
GLOBAL $_DOMAIN;	//WEB DOMAIN URL

GLOBAL $CONFIG_SITE;
GLOBAL $CONFIG_DOMAIN;
GLOBAL $CONFIG_PROTOCOL;
GLOBAL $CONFIG_PATH;
GLOBAL $CONFIG_URL;
GLOBAL $CONFIG_ACTIVATION;
GLOBAL $CONFIG_THRESHOLD;
GLOBAL $CONFIG_LANG;
GLOBAL $CONFIG_STYLE;
GLOBAL $CONFIG_MAIL;
GLOBAL $CONFIG_GMAIL;
GLOBAL $CONFIG_MAILPASS;
GLOBAL $_MAIL_PATH;
GLOBAL $_FOLDER;
GLOBAL $_MENU;
GLOBAL $_MENU_ADMIN;
GLOBAL $_MENU_MANAGER;
GLOBAL $_MENU_USER;

GLOBAL $_ERRORS; 
GLOBAL $_SUCCESS;
$_ERRORS = array();
$_SUCCESS = array();

GLOBAL $_DATE;

$_DATE = array(
	"YEAR"=>date("Y"), 
	"MONTH"=>date("m"), 
	"DAY"=>date("d"), 
	"HOUR"=>date("H"), 
	"MINIT"=>date("i"), 
	"SECOND"=>date("s"), 
	"STATE"=>date("a")
);
// $DATA_ARRY = previousMonth(12);
function previousMonth($i)
{
	$previousMonth = date("m",strtotime("-".$i." month"));
	$previousYear = date("Y",strtotime("-".$i." month"));
	$previousMonthString = date("F", mktime(0, 0, 0, $previousMonth, 10));
	$previousMonthStart = date('Y-m-01',strtotime("-".$i." month"));
	$previousMonthEnd = date('Y-m-t',strtotime("-".$i." month"));
	return array( $previousYear, $previousMonth, $previousMonthString, $previousMonthStart, $previousMonthEnd );
}

function previousDay($i)
{
	$previousDate = date("Y-m-d",strtotime("-".$i." day"));
	$previousDateString = date("Y F, d",strtotime("-".$i." day"));
	$previousDateDay = date("d",strtotime("-".$i." day"));
	$previousDateYear = date("Y",strtotime("-".$i." day"));
	$previousDateMonth = date("m",strtotime("-".$i." day"));
	$previousDateMonthString = date("F",strtotime("-".$i." day"));
	return array( $previousDateDay, $previousDateYear, $previousDateMonth, $previousDateMonthString, $previousDate, $previousDateString );
}

$_MENU = array(	
	"dashboard"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."dashboard'>&nbsp;<i class='fa fa-home'></i>&nbsp;&nbsp;  DASHBOARD</a>",
	"orders"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."orders'>&nbsp;<i class='fa fa-shopping-cart'></i>&nbsp;&nbsp;  ORDERS</a>",
	"items"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."items'>&nbsp;<i class='fa fa-file-text'></i>&nbsp;&nbsp;  ITEMS</a>",
	"users"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."users'>&nbsp;<i class='fa fa-users'></i>&nbsp;&nbsp;  USERS</a>",
	"customers"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."customers'>&nbsp;<i class='fa fa-smile-o'></i>&nbsp;&nbsp;  CUSTOMERS</a>",
	"pages"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."pages'>&nbsp;<i class='fa fa-file-code-o'></i>&nbsp;&nbsp;  PAGES</a>",
	"permissions"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."permissions'>&nbsp;<i class='fa fa-unlock-alt'></i>&nbsp;&nbsp;  PERMISSIONS</a>",
	"reports"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."reports'>&nbsp;<i class='fa fa-line-chart'></i>&nbsp;&nbsp;  REPORTS</a>",
	"settings"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."settings'>&nbsp;<i class='fa fa-cogs'></i>&nbsp;&nbsp;  SETTINGS</a>",
	"configuration"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."configuration'>&nbsp;<i class='fa fa-desktop'></i>&nbsp;&nbsp;  CONFIGURATIONS</a>"
);

$_MENU_URL = array(
	""=>"<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."dashboard'>&nbsp;<i class='fa fa-home'></i>&nbsp;&nbsp;  DASHBOARD</a>",
	"index"=>"<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."dashboard'>&nbsp;<i class='fa fa-home'></i>&nbsp;&nbsp;  DASHBOARD</a>",
	"dashboard"=>"<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."dashboard'>&nbsp;<i class='fa fa-home'></i>&nbsp;&nbsp;  DASHBOARD</a>",
	"account"=>"<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."dashboard'>&nbsp;<i class='fa fa-home'></i>&nbsp;&nbsp;  DASHBOARD</a>",
	"home"=>"<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."dashboard'>&nbsp;<i class='fa fa-home'></i>&nbsp;&nbsp;  DASHBOARD</a>",
	"order"=>"<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."orders'>&nbsp;<i class='fa fa-shopping-cart'></i>&nbsp;&nbsp;  ORDERS</a>",
	"orders"=>"<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."orders'>&nbsp;<i class='fa fa-shopping-cart'></i>&nbsp;&nbsp;  ORDERS</a>",
	"item"=>"<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."items'>&nbsp;<i class='fa fa-file-text'></i>&nbsp;&nbsp;  ITEMS</a>",
	"items"=>"<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."items'>&nbsp;<i class='fa fa-file-text'></i>&nbsp;&nbsp;  ITEMS</a>",
	"user"=>"<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."users'>&nbsp;<i class='fa fa-users'></i>&nbsp;&nbsp;  USERS</a>",
	"users"=>"<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."users'>&nbsp;<i class='fa fa-users'></i>&nbsp;&nbsp;  USERS</a>",
	"customer"=>"<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."customers'>&nbsp;<i class='fa fa-smile-o'></i>&nbsp;&nbsp;  CUSTOMERS</a>",
	"customers"=>"<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."customers'>&nbsp;<i class='fa fa-smile-o'></i>&nbsp;&nbsp;  CUSTOMERS</a>",
	"page"=>"<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."pages'>&nbsp;<i class='fa fa-file-code-o'></i>&nbsp;&nbsp;  PAGES</a>",
	"pages"=>"<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."pages'>&nbsp;<i class='fa fa-file-code-o'></i>&nbsp;&nbsp;  PAGES</a>",
	"permission"=>"<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."permissions'>&nbsp;<i class='fa fa-unlock-alt'></i>&nbsp;&nbsp;  PERMISSIONS</a>",
	"permissions"=>"<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."permissions'>&nbsp;<i class='fa fa-unlock-alt'></i>&nbsp;&nbsp;  PERMISSIONS</a>",
	"report"=>"<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."reports'>&nbsp;<i class='fa fa-line-chart'></i>&nbsp;&nbsp;  REPORTS</a>",
	"reports"=>"<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."reports'>&nbsp;<i class='fa fa-line-chart'></i>&nbsp;&nbsp;  REPORTS</a>",
	"settings"=>"<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."settings'>&nbsp;<i class='fa fa-cogs'></i>&nbsp;&nbsp;  SETTINGS</a>",
	"configuration"=>"<a class='gs-bar-item gs-button gs-teal' href='".$_DOMAIN."configuration'>&nbsp;<i class='fa fa-desktop'></i>&nbsp;&nbsp;  CONFIGURATIONS</a>"
);

GLOBAL $loggedInUser;
array_push($_CONSOLE, 'FILE:'.$_SERVER['PHP_SELF']);
?>