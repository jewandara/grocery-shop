<?php

$_FOLDER = str_replace('core','', dirname(__FILE__));

$_URL = explode("/", $_SERVER['REQUEST_URI']);
$_JSON = json_decode(file_get_contents('php://input'), true);

#if( (!isset($_URL[1])) && (empty($_URL[1])) ) { $_URL[1] = ""; }
#if( (!isset($_POST)) && (empty($_POST)) ) { $_POST = array("0"=>"0"); }
#if( (!isset($_GET)) && (empty($_GET)) ) { $_GET = array("0"=>"0"); }

$_CURRENT_PATH = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].$_SERVER['REQUEST_URI'];

$ADMIN_URLS = array( "Dashboard", "Orders", "Items", "Users", "Customers", "Pages", "Permissions", "Reports", "Settings");
$MANAGER_URLS = array( "Dashboard", "Orders", "Items", "Users", "Customers", "Reports", "Settings" );
$USER_URLS = array( "Dashboard", "Orders", "Items", "Customers", "Settings" );

$_MENU_ADMIN = array(
  "dashboard"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."dashboard'>&nbsp;<i class='fa fa-home'></i>&nbsp;&nbsp;  DASHBOARD</a>",
  "order"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."orders'>&nbsp;<i class='fa fa-shopping-cart'></i>&nbsp;&nbsp; ORDERS</a>",
  "item"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."items'>&nbsp;<i class='fa fa-file-text'></i>&nbsp;&nbsp; ITEMS</a>",
  "user"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."users'>&nbsp;<i class='fa fa-users'></i>&nbsp;&nbsp; USERS</a>",
  "customer"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."customers'>&nbsp;<i class='fa fa-smile-o'></i>&nbsp;&nbsp; CUSTOMERS</a>",
  /*"permission"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."permissions'>&nbsp;<i class='fa fa-unlock-alt'></i>&nbsp;&nbsp; PERMISSIONS</a>",*/
  "report"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."reports'>&nbsp;<i class='fa fa-line-chart'></i>&nbsp;&nbsp; REPORTS</a>",
  /*"setting"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."settings'>&nbsp;<i class='fa fa-cogs'></i>&nbsp;&nbsp; SETTINGS</a>",*/
  "pages"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."pages'>&nbsp;<i class='fa fa-file-code-o'></i>&nbsp;&nbsp; PAGES</a>",
  "configuration"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."configurations'>&nbsp;<i class='fa fa-desktop'></i>&nbsp;&nbsp; CONFIGURATIONS</a>"
);

$_MENU_MANAGER = array(
  "dashboard"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."dashboard'>&nbsp;<i class='fa fa-home'></i>&nbsp;&nbsp;  DASHBOARD</a>",
  "order"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."orders'>&nbsp;<i class='fa fa-shopping-cart'></i>&nbsp;&nbsp; ORDERS</a>",
  "item"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."items'>&nbsp;<i class='fa fa-file-text'></i>&nbsp;&nbsp; ITEMS</a>",
  "user"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."users'>&nbsp;<i class='fa fa-users'></i>&nbsp;&nbsp; USERS</a>",
  "customer"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."customers'>&nbsp;<i class='fa fa-smile-o'></i>&nbsp;&nbsp; CUSTOMERS</a>",
  "report"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."reports'>&nbsp;<i class='fa fa-line-chart'></i>&nbsp;&nbsp; REPORTS</a>"
);


$_MENU_USER = array(
  "dashboard"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."dashboard'>&nbsp;<i class='fa fa-home'></i>&nbsp;&nbsp;  DASHBOARD</a>",
  "order"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."orders'>&nbsp;<i class='fa fa-shopping-cart'></i>&nbsp;&nbsp; ORDERS</a>",
  "item"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."items'>&nbsp;<i class='fa fa-file-text'></i>&nbsp;&nbsp; ITEMS</a>",
  "customer"=>"<a class='gs-bar-item gs-button' href='".$_DOMAIN."customers'>&nbsp;<i class='fa fa-smile-o'></i>&nbsp;&nbsp; CUSTOMERS</a>"
);

array_push($_CONSOLE, 'FILE:'.$_SERVER['PHP_SELF']);

?>