<?php 

securePage($_SERVER['PHP_SELF']);


/*if(!empty($_POST))
{
	$deletions = $_POST['delete'];
	if ($deletion_count = deleteUsers($deletions)){
		$successes[] = lang("ACCOUNT_DELETIONS_SUCCESSFUL", array($deletion_count));
	}
	else {
		$errors[] = lang("SQL_ERROR");
	}
}
$userData = fetchAllUsers(); */

$ERROR_MESSAGE = resultBlock($_ERRORS,$_SUCCESS);


?>