<?php 

securePage($_CURRENT_PATH);
if(isUserLoggedIn()) { header("Location: ".$_DOMAIN."dashboard"); die(); }

if(!empty($_POST))
{
	$_ERRORS = array();
	$firstname = trim($_POST["firstname"]);
	$lastname = trim($_POST["lastname"]);
	$contact = trim($_POST["contact"]);
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);
	$pass_confirm = trim($_POST["pass_confirm"]);
	$email = trim($_POST["email"]);
	$captcha = md5(strtolower($_POST["captcha"]));
	
	$valid_chars = array('-', '_', ' ', '.');
	if($firstname=="") { $_ERRORS[] = lang("EMPTY_STRING_CHAR_LIMIT", array("First name")); }
	else{ 
		if(minMaxRange(3,50, $firstname)) { $_ERRORS[] = lang("ACCOUNT_FIRST_NAME_CHAR_LIMIT",array(3,50)); } 
		else{ 
			if(!ctype_alnum(str_replace($valid_chars, '', $firstname))) { 
				$_ERRORS[] = lang("ACCOUNT_FIRST_NAME_INVALID_CHARACTERS");}
		}
	}
	if($lastname=="") { $_ERRORS[] = lang("EMPTY_STRING_CHAR_LIMIT", array("Last name")); }
	else{ 
		if(minMaxRange(3,50, $lastname)) { $_ERRORS[] = lang("ACCOUNT_LAST_NAME_CHAR_LIMIT",array(3,50)); } 
		else{
			if(!ctype_alnum(str_replace($valid_chars, '', $lastname))) { 
				$_ERRORS[] = lang("ACCOUNT_LAST_NAME_INVALID_CHARACTERS"); }
		}
	}

	if ($captcha != $_SESSION['captcha']) { $_ERRORS[] = lang("CAPTCHA_FAIL"); }
	if($username=="") { $_ERRORS[] = lang("EMPTY_STRING_CHAR_LIMIT", array("Contact number")); }
	else{ if(minMaxRange(7,15, $username)) { $_ERRORS[] = lang("ACCOUNT_USER_CHAR_LIMIT",array(7,15)); } }

	if($password=="") { $_ERRORS[] = lang("EMPTY_STRING_CHAR_LIMIT", array("Password")); }
	else{ 
		if(minMaxRange(4,30,$password) && minMaxRange(4,30,$pass_confirm)) { $_ERRORS[] = lang("ACCOUNT_PASS_CHAR_LIMIT",array(4,30)); }
		else if($password != $pass_confirm) { $_ERRORS[] = lang("ACCOUNT_PASS_MISMATCH"); }
		if(!isValidEmail($email)) { $_ERRORS[] = lang("ACCOUNT_INVALID_EMAIL"); }
	}

	if(count($_ERRORS) == 0)
	{
		$user = new User($firstname, $lastname, $username, $contact, $password, $email);
		if(!$user->status)
		{
			if($user->username_taken) $_ERRORS[] = lang("ACCOUNT_USERNAME_IN_USE",array($username));
			if($user->contact_taken) $_ERRORS[] = lang("ACCOUNT_DISPLAYNAME_IN_USE",array($contact));
			if($user->email_taken) 	  $_ERRORS[] = lang("ACCOUNT_EMAIL_IN_USE",array($email));		
		}
		else
		{
			if(!$user->userAddUser())
			{
				if($user->mail_failure) $_ERRORS[] = lang("MAIL_ERROR");
				if($user->sql_failure)  $_ERRORS[] = lang("SQL_ERROR");
			}
		}
	}
	if(count($_ERRORS) == 0) { $_SUCCESS[] = $user->success; }
}

$ERROR_MESSAGE = resultBlock($_ERRORS, $_SUCCESS);

?>
