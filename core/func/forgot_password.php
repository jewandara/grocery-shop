<?php 

securePage($_CURRENT_PATH);
if(isUserLoggedIn()) { header("Location: ".$_DOMAIN."dashboard"); die(); }


if(!empty($_POST))
{
	$email = $_POST["email"];
	$username = sanitize($_POST["username"]);

	if(trim($email) == "") { $_ERRORS[] = lang("ACCOUNT_SPECIFY_EMAIL"); }
	else if(!isValidEmail($email) || !emailExists($email)) { $_ERRORS[] = lang("ACCOUNT_INVALID_EMAIL"); }
	
	if(trim($username) == "") { $_ERRORS[] = lang("ACCOUNT_SPECIFY_USERNAME"); }
	else if(!usernameExists($username)) { $_ERRORS[] = lang("ACCOUNT_INVALID_USERNAME"); }
	
	if(count($_ERRORS) == 0)
	{
		if(!emailUsernameLinked($email,$username)) { $_ERRORS[] =  lang("ACCOUNT_USER_OR_EMAIL_INVALID"); }
		else
		{
			$userdetails = fetchUserDetails($username);
			if($userdetails["lost_password_request"] == 1) { $_ERRORS[] = lang("FORGOTPASS_REQUEST_EXISTS"); }
			else
			{
				$date = previousDay(0);
				$mail = new MailServer();
				$confirm_url = $_DOMAIN."reset_password/index.php?confirm=".$userdetails["activation_token"];
				$deny_url = $_DOMAIN."reset_password/index.php?deny=".$userdetails["activation_token"];
				
				$hooks = array(
					"searchStrs" => array("#DOMAIN#", "#CONFIRM-URL#", "#DENY-URL#", "#FIRST#", "#LAST#", "#USERNAME#", "#DATE#"),
					"subjectStrs" => array($_DOMAIN, $confirm_url, $deny_url, $userdetails["first_name"], $userdetails["last_name"], $userdetails["username"], strval($date[5]))
				);
				
				if(!$mail->newTemplateMsg("forgot_password.html",$hooks)) { $_ERRORS[] = lang("MAIL_TEMPLATE_BUILD_ERROR"); }
				else
				{
					if(!$mail->sendMail($userdetails["email"],"GROCERY SHOP - Forgotten Password Request")) { $_ERRORS[] = lang("MAIL_ERROR"); }
					else
					{
						flagLostPasswordRequest($username,1);
						$_SUCCESS[] = lang("FORGOTPASS_REQUEST_SUCCESS");
					}
				}
			}
		}
	}
}

$ERROR_MESSAGE = resultBlock($_ERRORS, $_SUCCESS);

?>