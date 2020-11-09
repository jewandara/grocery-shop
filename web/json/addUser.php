<?php

	function randomPassword() {
	    $alphabet = "abcdefghijklmnopqrstuwxyz@#$&*ABCDEFGHIJKLMNOPQRSTUWXYZ0123456789@#$&*";
	    $pass = array();
	    $alphaLength = strlen($alphabet) - 1;
	    for ($i = 0; $i < 10; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	    return implode($pass);
	}

	$genaratedPass = randomPassword();
	$username = trim($_JSON["username"]);
	$contact = trim($_JSON["contact"]);
	$password = trim($genaratedPass);
	$pass_confirm = trim($genaratedPass);
	$firstname = trim($_JSON["first_name"]);
	$lastname = trim($_JSON["last_name"]);
	$email = trim($_JSON["email"]);

	

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

	//if ($captcha != $_SESSION['captcha']) { $_ERRORS[] = lang("CAPTCHA_FAIL"); }
	if($username=="") { $_ERRORS[] = lang("EMPTY_STRING_CHAR_LIMIT", array("Username")); }
	else{ if(minMaxRange(4,15, $username)) { $_ERRORS[] = lang("ACCOUNT_USER_CHAR_LIMIT",array(4,15)); } }

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
			if($user->contact_taken) $_ERRORS[] = lang("ACCOUNT_CONTACT_IN_USE",array($contact));
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



	if(count($_ERRORS) == 0) { 
		$_SUCCESS[] = $user->success; 
		$_RESULT = new stdClass();
		$_RESULT->error = false;
		$_RESULT->message = "success";
		$_RESULT->result = $_SUCCESS;
		echo json_encode($_RESULT);
	}
	else{
		$_RESULT = new stdClass();
		$_RESULT->error = true;
		$_RESULT->message = "error";
		$_RESULT->result = $_ERRORS;
		echo json_encode($_RESULT);
	}






