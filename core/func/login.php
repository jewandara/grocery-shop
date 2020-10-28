<?php 

securePage($_SERVER['PHP_SELF']);
if(isUserLoggedIn()) { header("Location: ".$_DOMAIN."dashboard"); die(); }

if(!empty($_POST))
{
	$username = sanitize(trim($_POST["username"]));
	$password = trim($_POST["password"]);
	if($username == "") { $_ERRORS[] = lang("ACCOUNT_SPECIFY_USERNAME"); }
	if($password == "") {  $_ERRORS[] = lang("ACCOUNT_SPECIFY_PASSWORD"); }
	if(count($_ERRORS) == 0)
	{
		if(!usernameExists($username)) { $_ERRORS[] = lang("ACCOUNT_USER_OR_PASS_INVALID"); }
		else
		{
			$userdetails = fetchUserDetails($username);
			if($userdetails["active"]==0)
			{ $_ERRORS[] = lang("ACCOUNT_INACTIVE", array($_DOMAIN.'resend_activation')); }
			else
			{
				$entered_pass = generateHash($password, $userdetails["password"]);
				if($entered_pass != $userdetails["password"]) { $_ERRORS[] = lang("ACCOUNT_USER_OR_PASS_INVALID"); }
				else
				{
					$loggedInUser = new loggedInUser();
					$loggedInUser->email = $userdetails["email"];
					$loggedInUser->user_id = $userdetails["id"];
					$loggedInUser->hash_pw = $userdetails["password"];
					$loggedInUser->title = $userdetails["title"];
					$loggedInUser->contact = $userdetails["contact"];
					$loggedInUser->username = $userdetails["username"];
					$loggedInUser->firstname = $userdetails["first_name"];
					$loggedInUser->lastname = $userdetails["last_name"];
					$loggedInUser->updateLastSignIn();
					$_SESSION["GroceryShopUserSession"] = $loggedInUser;
					header("Location: ".$_DOMAIN."dashboard");
					die();
				}
			}
		}
	}
}


$ERROR_MESSAGE = resultBlock($_ERRORS,$_SUCCESS);

?>