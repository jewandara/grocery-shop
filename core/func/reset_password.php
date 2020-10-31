<?php 

securePage($_SERVER['PHP_SELF']);
if(isUserLoggedIn()) { header("Location: ".$_DOMAIN."dashboard"); die(); }


if(!empty($_GET["confirm"]))
{
	$token = trim($_GET["confirm"]);
	if($token == "" || !validateActivationToken($token,TRUE)) { $_ERRORS[] = lang("FORGOTPASS_INVALID_TOKEN"); }
	else { $userdetails = fetchUserDetails(NULL,$token); }
}


if(!empty($_GET["deny"]))
{
	$token = trim($_GET["deny"]);
	if($token == "" || !validateActivationToken($token,TRUE))
	{ $_ERRORS[] = lang("FORGOTPASS_INVALID_TOKEN"); }
	else
	{
		$userdetails = fetchUserDetails(NULL,$token);
		flagLostPasswordRequest($userdetails["username"],0);	
		$_SUCCESS[] = lang("FORGOTPASS_REQUEST_CANNED");
	}
}







if(!empty($_POST))
{
	if(!empty($_GET["confirm"]))
	{
		$token = trim($_GET["confirm"]);
		
		if($token == "" || !validateActivationToken($token,TRUE)) { $_ERRORS[] = lang("FORGOTPASS_INVALID_TOKEN"); }
		else
		{
			$password_new = $_POST["passwordc"];
			$password_confirm = $_POST["passwordcheck"];
			if ($password_new != "" OR $password_confirm != "")
			{
				if(trim($password_new) == "") { $_ERRORS[] = lang("ACCOUNT_SPECIFY_NEW_PASSWORD"); }
				else if(trim($password_confirm) == "") { $_ERRORS[] = lang("ACCOUNT_SPECIFY_CONFIRM_PASSWORD"); }
				else if(minMaxRange(8,50,$password_new)) { $_ERRORS[] = lang("ACCOUNT_NEW_PASSWORD_LENGTH",array(8,50)); }
				else if($password_new != $password_confirm) { $_ERRORS[] = lang("ACCOUNT_PASS_MISMATCH"); }
				
				//End data validation
				if(count($_ERRORS) == 0)
				{
					$secure_pass = generateHash($password_confirm);
					$userdetails = fetchUserDetails(NULL,$token); 
					$mail = new MailServer();
					$link_url = $_DOMAIN."login";

					$hooks = array( 
						"searchStrs" => array("#DOMAIN#", "#LOGIN-URL#","#FIRST#", "#LAST#", "#USERNAME#"), 
						"subjectStrs" => array($_DOMAIN, $link_url, $userdetails["first_name"], $userdetails["last_name"], $userdetails["username"])
					);
				
					if(!$mail->newTemplateMsg("reset_password.html",$hooks)) { $_ERRORS[] = lang("MAIL_TEMPLATE_BUILD_ERROR"); }
					else
					{	
						if(!$mail->sendMail($userdetails["email"],"SECURITY ALERT ! - GROCERY SHOP - NEW PASSWORD")) { $_ERRORS[] = lang("MAIL_ERROR"); }
						else
						{
							if(!updatePasswordFromToken($secure_pass,$token)) { $_ERRORS[] = lang("SQL_ERROR"); }
							else
							{	
								flagLostPasswordRequest($userdetails["username"],0);
								$_SUCCESS[]  = lang("FORGOTPASS_NEW_PASS_EMAIL");
							}
						}
					}
				}
			}
		}
	}else{ $_ERRORS[] = lang("FORGOTPASS_INVALID_TOKEN"); }
}



$ERROR_MESSAGE = resultBlock($_ERRORS,$_SUCCESS);

?>