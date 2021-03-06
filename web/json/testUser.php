<?php
	function randCodePass( $length ) {
	    $chars = "!@#$&*abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$&*";
	    return substr(str_shuffle($chars),0,$length);
	}

	$_PASS = randCodePass(10);
	$username = trim($_JSON["username"]);
	$contact = trim($_JSON["contact"]);
	$password = trim($_PASS);
	$pass_confirm = trim($_PASS);
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






