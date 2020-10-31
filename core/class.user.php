<?php

class User 
{
	public $user_active = 0;
	public $user_type = 1;
	public $user_type_name;
	private $clean_email;
	public $status = false;
	private $clean_password;
	private $first_name;
	private $last_name;
	private $username;
	private $contact;
	public $sql_failure = false;
	public $mail_failure = false;
	public $email_taken = false;
	public $username_taken = false;
	public $contact_taken = false;
	public $activation_token = 0;
	public $success = NULL;
	
	function __construct($first, $last, $user, $contact, $pass, $email, $type="user")
	{
		$this->first_name = $first;
		$this->last_name = $last;
		$this->username = $user;
		$this->contact = $contact;
		if($type=="admin"){ 
			$this->user_type = 3;
			$this->user_type_name = "Administrator";
		}
		else if($type=="manager"){ 
			$this->user_type = 2;
			$this->user_type_name = "Manager";
		}
		else {
			$this->user_type = 1;
			$this->user_type_name = "User";
		}
		$this->clean_email = sanitize($email);
		$this->clean_password = trim($pass);
		if(usernameExists($this->username)) { $this->username_taken = true; }
		else if(contactExists($this->contact)) { $this->contact_taken = true; }
		else if(emailExists($this->clean_email)) { $this->email_taken = true; }
		else { $this->status = true; }
	}
	
	public function userAddUser()
	{
		global $_CONSOLE, $_DOMAIN, $_SQL, $_PREFIX, $CONFIG_ACTIVATION, $CONFIG_DOMAIN;
		if($this->status)
		{
			$secure_pass = generateHash($this->clean_password);
			$this->activation_token = generateActivationToken();
			if($CONFIG_ACTIVATION)
			{
				$this->user_active = 0;
				$mail = new MailServer();
				$activation_url = $_DOMAIN."activate_account/index.php?token=".$this->activation_token;
				$hooks = array(
					"searchStrs" => array("#WEBSITENAME#", "#ACTIVATION-URL#","#FIRST#","#LAST#","#USERNAME#", "#PASSWORD#"),
					"subjectStrs" => array($CONFIG_DOMAIN, $activation_url, $this->first_name, $this->last_name, $this->username, $this->clean_password)
				);
				if(!$mail->newTemplateMsg("registration.html",$hooks)) { $this->mail_failure = true; }
				else { if(!$mail->sendMail($this->clean_email,"Registration Confirmation")) { $this->mail_failure = true; } }
				$this->success = lang("ACCOUNT_REGISTRATION_COMPLETE_TYPE2");
			}
			else
			{ $this->user_active = 1; $this->success = lang("ACCOUNT_REGISTRATION_COMPLETE_TYPE1"); }
			if(!$this->mail_failure)
			{
				try {
					$stmt = $_SQL->prepare("INSERT INTO ".$_PREFIX."users (
							username, contact, password,
							first_name, last_name, email,
							activation_token, last_activation_request, lost_password_request,
							active, title, sign_up_stamp, last_sign_in_stamp )
						VALUES ( 
							?, ?, ?,
							?, ?, ?,
							?, '".time()."', '0', 
							?, ?, '".time()."', '0' )");
					$stmt->bind_param("sssssssis", 
						$this->username, $this->contact, $secure_pass,
						$this->first_name, $this->last_name, $this->clean_email,
						$this->activation_token, $this->user_active, $this->user_type_name);
					$stmt->execute();
					$inserted_id = $_SQL->insert_id;
					$stmt->close();
					$stmt = $_SQL->prepare("INSERT INTO ".$_PREFIX."user_permission_matches  ( user_id, permission_id )
						VALUES ( ?, ? )");
					$stmt->bind_param("ss", $inserted_id, $this->user_type);
					$stmt->execute();
					$stmt->close();
	        		if ($inserted_id==0) { array_push($_CONSOLE, 'CLASS(User->userAddUser): ERROR->New user did not created, ID: '.$inserted_id); } 
	        		else { array_push($_CONSOLE, 'CLASS(User->userAddUser): SUCCESS'); return true; }
			    } 
			    catch (Exception $ex) { array_push($_CONSOLE, 'CLASS(User->userAddUser): EXCEPTION->'.$ex); }
			}
		}
	}
}

class loggedInUser {
	public $email = NULL;
	public $user_id = NULL;
	public $hash_pw = NULL;
	public $title = NULL;
	public $contact = NULL;
	public $username = NULL;
	public $firstname = NULL;
	public $lastname = NULL;

	public function updateLastSignIn()
	{
		global $_SQL,$_PREFIX;
		$time = time();
		$stmt = $_SQL->prepare("UPDATE ".$_PREFIX."users SET last_sign_in_stamp = ? WHERE id = ?");
		$stmt->bind_param("ii", $time, $this->user_id);
		$stmt->execute();
		$stmt->close();	
	}
	
	//Return the timestamp when the user registered
	public function signupTimeStamp()
	{
		global $_SQL,$_PREFIX;
		
		$stmt = $_SQL->prepare("SELECT sign_up_stamp
			FROM ".$_PREFIX."users
			WHERE id = ?");
		$stmt->bind_param("i", $this->user_id);
		$stmt->execute();
		$stmt->bind_result($timestamp);
		$stmt->fetch();
		$stmt->close();
		return ($timestamp);
	}
	
	//Update a users password
	public function updatePassword($pass)
	{
		global $_SQL,$_PREFIX;
		$secure_pass = generateHash($pass);
		$this->hash_pw = $secure_pass;
		$stmt = $_SQL->prepare("UPDATE ".$_PREFIX."users
			SET
			password = ? 
			WHERE
			id = ?");
		$stmt->bind_param("si", $secure_pass, $this->user_id);
		$stmt->execute();
		$stmt->close();	
	}
	
	//Update a users email
	public function updateEmail($email)
	{
		global $_SQL,$_PREFIX;
		$this->email = $email;
		$stmt = $_SQL->prepare("UPDATE ".$_PREFIX."users
			SET 
			email = ?
			WHERE
			id = ?");
		$stmt->bind_param("si", $email, $this->user_id);
		$stmt->execute();
		$stmt->close();	
	}
	
	//Is a user has a permission
	public function checkPermission($permission)
	{
		global $_SQL,$_PREFIX;
		
		$stmt = $_SQL->prepare("SELECT id 
			FROM ".$_PREFIX."user_permission_matches WHERE user_id = ?
			AND permission_id = ? LIMIT 1 ");
		$access = 0;
		foreach($permission as $check){
			if ($access == 0){
				$stmt->bind_param("ii", $this->user_id, $check);
				$stmt->execute();
				$stmt->store_result();
				if ($stmt->num_rows > 0){
					$access = 1;
				}
			}
		}
		if ($access == 1) { return true; }
		else { return false; }
		$stmt->close();
	}
	
	//Logout
	public function userLogOut() { destroySession("GroceryShopUserSession"); }	
}

array_push($_CONSOLE, 'CLASS.FILE: OPEN->'.$_SERVER['PHP_SELF']);

?>