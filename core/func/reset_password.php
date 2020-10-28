<?php 

securePage($DOMAIN_CURRENT_PATH);

if(isUserLoggedIn()) { header("Location: ".$DOMAIN_PATH."account"); die(); }



if(!empty($_GET["confirm"]))
{
	$token = trim($_GET["confirm"]);
	if($token == "" || !validateActivationToken($token,TRUE)) { $errors[] = lang("FORGOTPASS_INVALID_TOKEN"); }
	else { $userdetails = fetchUserDetails(NULL,$token); }
}

//User has denied this request
if(!empty($_GET["deny"]))
{
	$token = trim($_GET["deny"]);
	if($token == "" || !validateActivationToken($token,TRUE))
	{ $errors[] = lang("FORGOTPASS_INVALID_TOKEN"); }
	else
	{
		$userdetails = fetchUserDetails(NULL,$token);
		flagLostPasswordRequest($userdetails["user_name"],0);	
		$successes[] = lang("FORGOTPASS_REQUEST_CANNED");
	}
}




//Forms posted
if(!empty($_POST))
{
	if(!empty($_GET["confirm"]))
	{
		$token = trim($_GET["confirm"]);
		
		if($token == "" || !validateActivationToken($token,TRUE)) { $errors[] = lang("FORGOTPASS_INVALID_TOKEN"); }
		else
		{
			$password_new = $_POST["passwordc"];
			$password_confirm = $_POST["passwordcheck"];
			if ($password_new != "" OR $password_confirm != "")
			{
				if(trim($password_new) == "") { $errors[] = lang("ACCOUNT_SPECIFY_NEW_PASSWORD"); }
				else if(trim($password_confirm) == "") { $errors[] = lang("ACCOUNT_SPECIFY_CONFIRM_PASSWORD"); }
				else if(minMaxRange(8,50,$password_new)) { $errors[] = lang("ACCOUNT_NEW_PASSWORD_LENGTH",array(8,50)); }
				else if($password_new != $password_confirm) { $errors[] = lang("ACCOUNT_PASS_MISMATCH"); }
				
				//End data validation
				if(count($errors) == 0)
				{
					$secure_pass = generateHash($password_confirm);
					$userdetails = fetchUserDetails(NULL,$token); 
					$mail = new ha07MailClass();
					$link_url = $DOMAIN_PATH."login";

					$hooks = array( 
						"searchStrs" => array("#DOMAIN#", "#LOGIN-URL#","#USERNAME#"), 
						"subjectStrs" => array($DOMAIN_PATH, $link_url, $userdetails["display_name"])
					);
				
					if(!$mail->newTemplateMsg("reset_password.html",$hooks)) { $errors[] = lang("MAIL_TEMPLATE_BUILD_ERROR"); }
					else
					{	
						if(!$mail->sendMail($userdetails["email"],"SECURITY ALERT ! - HOLIDAY ACCOMMODATION AGENCY - NEW PASSWORD")) { $errors[] = lang("MAIL_ERROR"); }
						else
						{
							if(!updatePasswordFromToken($secure_pass,$token)) { $errors[] = lang("SQL_ERROR"); }
							else
							{	
								flagLostPasswordRequest($userdetails["user_name"],0);
								$successes[]  = lang("FORGOTPASS_NEW_PASS_EMAIL");
							}
						}
					}
				}
			}
		}
	}
}



$ERROR_MESSAGE = resultBlock($errors,$successes);

?>