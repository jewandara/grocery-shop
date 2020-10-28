<?php 

securePage($_SERVER['PHP_SELF']);
if(isUserLoggedIn()) { header("Location: ".$_DOMAIN."dashboard"); die(); }


if(isset($_GET["token"]))
{	
	$token = $_GET["token"];	
	if(!isset($token)) { $_ERRORS[] = lang("FORGOTPASS_INVALID_TOKEN"); }
	else if(!validateActivationToken($token)) { $_ERRORS[] = lang("ACCOUNT_TOKEN_NOT_FOUND"); }
	else { if(!setUserActive($token)) { $_ERRORS[] = lang("SQL_ERROR"); } }
}
else{ $_ERRORS[] = lang("FORGOTPASS_INVALID_TOKEN"); }
if(count($_ERRORS) == 0) { $_SUCCESS[] = lang("ACCOUNT_ACTIVATION_COMPLETE"); }

$ERROR_MESSAGE =  resultBlock($_ERRORS, $_SUCCESS);

?>
