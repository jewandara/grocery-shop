<?php 

securePage($DOMAIN_CURRENT_PATH); 


if(isUserLoggedIn()) { header("Location: ".$DOMAIN_PATH."login"); die(); }
else{ header("Location: ".$DOMAIN_PATH."login"); die(); }


?>