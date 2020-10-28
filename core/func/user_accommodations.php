<?php 

securePage($DOMAIN_CURRENT_PATH);

//Forms posted
if(!empty($_POST))
{
	$newAccommodations = $_POST['newAccommodations'];
	$newAddress = $_POST['newAddress'];

	if ($re = createNewAccommodation($loggedInUser->user_id, $newAccommodations, $newAddress)){
		$successes[] = lang("NEW_ACCOMMODATION_SUCCESSFUL");
	}
	else { $errors[] = lang("SQL_ERROR"); }
}


if(isUserLoggedIn()) {  
	if ($loggedInUser->checkPermission(array(2))) { $userAccommodationData = fetchAllUserAccommodations(); }
	else{ $userAccommodationData = fetchAllUserAccommodations($loggedInUser->user_id); }
}


//Fetch information for all users
$ERROR_MESSAGE = resultBlock($errors,$successes);

?>