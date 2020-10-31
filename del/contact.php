<?php 

securePage($DOMAIN_CURRENT_PATH);


if(!empty($_POST))
{
	$errors = array();
	$name = trim($_POST["name"]);
	$email = trim($_POST["email"]);
	$megase = trim($_POST["megase"]);

	if(minMaxRange(5,25,$name)) { $errors[] = lang("ACCOUNT_USER_CHAR_LIMIT",array(5,25)); }
	if(!isValidEmail($email)) { $errors[] = lang("ACCOUNT_INVALID_EMAIL"); }

	if(count($errors) == 0) {

		$mail = new ha07MailClass();
		$hooks = array(
			"searchStrs" => array("#NAME#","#MESSAGE#","#EMAIL#"),
			"subjectStrs" => array($name, $megase, $email)
		);

		if(!$mail->newTemplateMsg("contact.html",$hooks)) { $errors[] = lang("MAIL_ERROR"); }
		else
		{
			if(!$mail->sendMail($email,"Holiday Accommodation Agency Contact Us")) { $errors[] = lang("MAIL_ERROR"); }
			else{ $successes[] = lang("CONTACT_US_SUCCESS"); }
		}

	}
}

$ERROR_MESSAGE = resultBlock($errors,$successes);

 ?>