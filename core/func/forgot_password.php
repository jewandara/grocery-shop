<?php 

securePage($DOMAIN_CURRENT_PATH);

if(isUserLoggedIn()) { header("Location: ".$DOMAIN_PATH."account"); die(); }


//Forms posted
if(!empty($_POST))
{
	$email = $_POST["email"];
	$username = sanitize($_POST["username"]);
	
	//Perform some validation
	//Feel free to edit / change as required
	
	if(trim($email) == "")
	{
		$errors[] = lang("ACCOUNT_SPECIFY_EMAIL");
	}
	//Check to ensure email is in the correct format / in the db
	else if(!isValidEmail($email) || !emailExists($email))
	{
		$errors[] = lang("ACCOUNT_INVALID_EMAIL");
	}
	
	if(trim($username) == "")
	{
		$errors[] = lang("ACCOUNT_SPECIFY_USERNAME");
	}
	else if(!usernameExists($username))
	{
		$errors[] = lang("ACCOUNT_INVALID_USERNAME");
	}
	
	if(count($errors) == 0)
	{
		
		//Check that the username / email are associated to the same account
		if(!emailUsernameLinked($email,$username))
		{
			$errors[] =  lang("ACCOUNT_USER_OR_EMAIL_INVALID");
		}
		else
		{
			//Check if the user has any outstanding lost password requests
			$userdetails = fetchUserDetails($username);
			if($userdetails["lost_password_request"] == 1)
			{
				$errors[] = lang("FORGOTPASS_REQUEST_EXISTS");
			}
			else
			{
				//Email the user asking to confirm this change password request
				//We can use the template builder here
				
				//We use the activation token again for the url key it gets regenerated everytime it's used.
				
				$mail = new ha07MailClass();
				$confirm_url = $DOMAIN_PATH."reset_password/index.php?confirm=".$userdetails["activation_token"];
				$deny_url = $DOMAIN_PATH."reset_password/index.php?deny=".$userdetails["activation_token"];
				
				//Setup our custom hooks
				$hooks = array(
					"searchStrs" => array("#DOMAIN#", "#CONFIRM-URL#", "#DENY-URL#", "#USERNAME#"),
					"subjectStrs" => array($DOMAIN_PATH, $confirm_url, $deny_url, $userdetails["user_name"])
					);
				
				if(!$mail->newTemplateMsg("forgot_password.html",$hooks))
				{
					$errors[] = lang("MAIL_TEMPLATE_BUILD_ERROR");
				}
				else
				{
					if(!$mail->sendMail($userdetails["email"],"HOLIDAY ACCOMMODATION AGENCY - LOST PASSWORD REQUEST"))
					{
						$errors[] = lang("MAIL_ERROR");
					}
					else
					{
						//Update the DB to show this account has an outstanding request
						flagLostPasswordRequest($username,1);
						
						$successes[] = lang("FORGOTPASS_REQUEST_SUCCESS");
					}
				}
			}
		}
	}
}

$ERROR_MESSAGE = resultBlock($errors,$successes);

?>