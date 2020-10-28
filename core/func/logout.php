<?php

if(isUserLoggedIn()) { 
	$loggedInUser->userLogOut();
	header("Location: ".$_DOMAIN."login");
	die();
}

?>

