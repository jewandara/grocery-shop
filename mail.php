<?php

require_once(dirname(__FILE__).'/core/class.define.php');
require_once(dirname(__FILE__).'/core/class.sql.php');
require_once(dirname(__FILE__).'/core/class.func.php');
require_once(dirname(__FILE__).'/core/class.mail.php');


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

$fff = new MailServer();
$fff->sendMail("jewandara@gmail.com", "TEST", "Testing mail send");

?>