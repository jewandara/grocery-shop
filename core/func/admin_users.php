<?php 

securePage($DOMAIN_CURRENT_PATH);

//Forms posted
if(!empty($_POST))
{
	$deletions = $_POST['delete'];
	if ($deletion_count = deleteUsers($deletions)){
		$successes[] = lang("ACCOUNT_DELETIONS_SUCCESSFUL", array($deletion_count));
	}
	else {
		$errors[] = lang("SQL_ERROR");
	}
}

$userData = fetchAllUsers(); 
//Fetch information for all users
$ERROR_MESSAGE = resultBlock($errors,$successes);

?>