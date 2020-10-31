<?php

require_once(dirname(__FILE__).'/class.define.php');
require_once(dirname(__FILE__).'/class.url.php');
require_once(dirname(__FILE__).'/class.sql.php');
require_once(dirname(__FILE__).'/class.func.php');
require_once(dirname(__FILE__).'/class.mail.php');
require_once(dirname(__FILE__).'/class.user.php');


$stmt = $_SQL->prepare('SELECT id, name, value FROM '.$_PREFIX.'configuration');	
$stmt->execute();
$stmt->bind_result($id, $name, $value);
while ($stmt->fetch()){ $settings[$name] = array('id' => $id, 'name' => $name, 'value' => $value); }
$stmt->close();


$CONFIG_SITE = $settings['SITE']['value'];
$CONFIG_DOMAIN = $settings['DOMAIN']['value'];
$CONFIG_PROTOCOL = $settings['PROTOCOL']['value'];
$CONFIG_PATH = $settings['PATH']['value'];
$CONFIG_URL = $settings['URL']['value'];
$CONFIG_ACTIVATION = $settings['ACTIVATION']['value'];
$CONFIG_THRESHOLD = $settings['THRESHOLD']['value'];
$CONFIG_LANG = $settings['LANG']['value'];
$CONFIG_STYLE = $settings['STYLE']['value'];
$CONFIG_MAIL = $settings['MAIL']['value'];
$CONFIG_GMAIL = $settings['GMAIL']['value'];
$CONFIG_MAILPASS = $settings['MAILPASS']['value'];


$_DOMAIN =  $CONFIG_PROTOCOL.'://'.$CONFIG_DOMAIN.$CONFIG_PATH;
$_PATH_ARRY = explode('/', $_DOMAIN);
$_PATH_ARRY_COUNT = count($_PATH_ARRY)-3;

if( ($_SERVER['REQUEST_SCHEME']=='http') and ($CONFIG_PROTOCOL=='https') ){ 
	header('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], true, 301);
	exit();
}

if (!file_exists($CONFIG_LANG)) { $_LANGUAGE = $_FOLDER.'core/languages/en.php'; } 
else { $_LANGUAGE = dirname(__FILE__).$CONFIG_LANG; }
if(!isset($CONFIG_LANG)){ $_LANGUAGE = $_FOLDER.'core/languages/en.php'; } 
else { $_LANGUAGE = dirname(__FILE__).$CONFIG_LANG; }
require_once($_LANGUAGE);

if (!file_exists($CONFIG_MAIL)) { $_MAIL_PATH = $_FOLDER.'core/mail/templates/'; } 
else { $_MAIL_PATH = dirname(__FILE__).$CONFIG_MAIL; }
if(!isset($CONFIG_LANG)){ $_MAIL_PATH = $_FOLDER.'core/mail/templates/'; } 
else { $_MAIL_PATH = dirname(__FILE__).$CONFIG_MAIL; }


//if($CONFIG_ACTIVATION){ require_once($_FOLDER.'core/mail/PHPMailer/PHPMailerAutoload.php'); }
//$default_hooks = array('#WEBSITENAME#','#WEBSITEURL#','#DATE#');
//$default_replace = array($websiteName,$websiteUrl,$emailDate);


session_start();

if(isset($_SESSION['GroceryShopUserSession']) && is_object($_SESSION['GroceryShopUserSession'])) { 
	$loggedInUser = $_SESSION['GroceryShopUserSession']; 
}


if(isUserLoggedIn()) { 
	if ($loggedInUser->checkPermission(array(3))) { $_MENU = $_MENU_MANAGER; }
	else if ($loggedInUser->checkPermission(array(2))) { $_MENU = $_MENU_ADMIN; }
	else if ($loggedInUser->checkPermission(array(1))) { $_MENU = $_MENU_USER; }
	else { $_MENU = $_MENU_USER; }
	switch ($_URL[$_PATH_ARRY_COUNT]) {
		case '': require_once($_FOLDER.'core/func/dashboard.php'); break;
		case 'index': require_once($_FOLDER.'core/func/dashboard.php'); break;
		case 'dashboard': require_once($_FOLDER.'core/func/dashboard.php'); break;
		case 'account': require_once($_FOLDER.'core/func/dashboard.php'); break;
		case 'home': require_once($_FOLDER.'core/func/dashboard.php'); break;
		case 'order': require_once($_FOLDER.'core/func/orders.php'); break;
		case 'orders': require_once($_FOLDER.'core/func/orders.php'); break;
		case 'item': require_once($_FOLDER.'core/func/items.php'); break;
		case 'items': require_once($_FOLDER.'core/func/items.php'); break;
		case 'customer': require_once($_FOLDER.'core/func/customers.php'); break;
		case 'customers': require_once($_FOLDER.'core/func/customers.php'); break;
		case 'setting': require_once($_FOLDER.'core/func/settings.php'); break;
		case 'settings': require_once($_FOLDER.'core/func/settings.php'); break;
		case 'user': require_once($_FOLDER.'core/func/users.php'); break;
		case 'users': require_once($_FOLDER.'core/func/users.php'); break;
		case 'report': require_once($_FOLDER.'core/func/reports.php'); break;
		case 'reports': require_once($_FOLDER.'core/func/reports.php'); break;
		case 'page': require_once($_FOLDER.'core/func/pages.php'); break;
		case 'pages': require_once($_FOLDER.'core/func/pages.php'); break;
		case 'permission': require_once($_FOLDER.'core/func/permissions.php'); break;
		case 'permissions': require_once($_FOLDER.'core/func/permissions.php'); break;
		case 'configuration': require_once($_FOLDER.'core/func/configurations.php'); break;
		case 'configurations': require_once($_FOLDER.'core/func/configurations.php'); break;
		case 'logout': require_once($_FOLDER.'core/func/logout.php'); break;
		case 'api': break;
		default: header("Location: ".$_DOMAIN."dashboard");  exit(); break;
	}
}
else{
	switch ($_URL[$_PATH_ARRY_COUNT]) {
		case 'login': require_once($_FOLDER.'core/func/login.php'); break;
		//case 'register': require_once($_FOLDER.'core/func/register.php'); break;
		case 'forgot_password': require_once($_FOLDER.'core/func/forgot_password.php'); break;
		case 'reset_password': require_once($_FOLDER.'core/func/reset_password.php'); break;
		case 'resend_activation': require_once($_FOLDER.'core/func/resend_activation.php'); break;
		case 'activate_account': require_once($_FOLDER.'core/func/activate_account.php'); break;
		case 'api': break;
		default: header("Location: ".$_DOMAIN."login");  exit(); break;
	}
}


array_push($_CONSOLE, 'CLASS.FILE: OPEN->'.$_SERVER['PHP_SELF']);

?>
