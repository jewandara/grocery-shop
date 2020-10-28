<?php

//header("Content-Type: application/json;charset=utf-8");
require_once(dirname(__FILE__).'/core/class.define.php');
require_once(dirname(__FILE__).'/core/class.url.php');
require_once(dirname(__FILE__).'/core/class.sql.php');


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

if($_URL[$_PATH_ARRY_COUNT+1] == "grid"){
    switch ($_URL[$_PATH_ARRY_COUNT+2]) {
        case 'orders':
            require_once($_FOLDER.'web/grid/orders.php');
            break;
        case 'items':
            require_once($_FOLDER.'web/grid/items.php');
            break;
        case 'users':
            require_once($_FOLDER.'web/grid/users.php');
            break;
        case 'customers':
            require_once($_FOLDER.'web/grid/customers.php');
            break;
        case 'pages':
            require_once($_FOLDER.'web/grid/pages.php');
            break;
        case 'permissions':
            require_once($_FOLDER.'web/grid/permissions.php');
            break;
        case 'reports':
            require_once($_FOLDER.'web/grid/reports.php');
            break;
        default:
            $_MATCH[0] = array( "Sql Error Found",  "Sql Error Found", "Sql Error Found", "Sql Error Found", "Sql Error Found", 
                "Sql Error Found", "Sql Error Found", "Sql Error Found", "Sql Error Found", "Sql Error Found" );
            $json_data = array( "draw" => 1, "recordsTotal" => 1,  "recordsFiltered" => 1, "data" => $_MATCH );
            echo json_encode($json_data);
            break;
    }
}
else if($_URL[$_PATH_ARRY_COUNT+1] == "json"){
    switch ($_URL[$_PATH_ARRY_COUNT+2]) {
        case 'orders':
            require_once($_FOLDER.'web/grid/orders.php');
            break;
        case 'items':
            require_once($_FOLDER.'web/grid/items.php');
            break;
        case 'users':
            require_once($_FOLDER.'web/grid/users.php');
            break;
        case 'customers':
            require_once($_FOLDER.'web/grid/customers.php');
            break;
        case 'pages':
            require_once($_FOLDER.'web/grid/pages.php');
            break;
        case 'permissions':
            require_once($_FOLDER.'web/grid/permissions.php');
            break;
        case 'reports':
            require_once($_FOLDER.'web/grid/reports.php');
            break;
        default:
            $_MATCH[0] = array( "Sql Error Found",  "Sql Error Found", "Sql Error Found", "Sql Error Found", "Sql Error Found", 
                "Sql Error Found", "Sql Error Found", "Sql Error Found", "Sql Error Found", "Sql Error Found" );
            $json_data = array( "draw" => 1, "recordsTotal" => 1,  "recordsFiltered" => 1, "data" => $_MATCH );
            echo json_encode($json_data);
            break;
    }
}
else{
    echo "No API Call Found On this Url";
}
?>