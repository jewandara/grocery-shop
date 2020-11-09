<?php
//error_clear_last();
class MailServer {
	public $contents = NULL;
	public function newTemplateMsg($template, $additionalHooks)
	{
		global $_MAIL_PATH;
		$this->contents = file_get_contents($_MAIL_PATH.$template);
		if(!$this->contents || empty($this->contents)) { return false; }
		else
		{
			$this->contents = replaceDefaultHook($this->contents);
			$this->contents = str_replace($additionalHooks["searchStrs"],$additionalHooks["subjectStrs"],$this->contents);
			return true;
		}
	}
	
	public function sendMail($email, $subject, $msg = NULL)
	{
		global $_CONSOLE, $CONFIG_DOMAIN, $CONFIG_GMAIL, $CONFIG_MAILPASS, $CONFIG_SITE;
		$header = "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/plain; charset=iso-8859-1\r\n";
		$header .= "From: ". $CONFIG_DOMAIN . " <" . $CONFIG_GMAIL . ">\r\n";
		if($msg == NULL){ $msg = $this->contents; }
		$message = $msg;
		$message = wordwrap($message, 70);
 		//require dirname(__FILE__).'/mail/PHPMailer/PHPMailerAutoload.php';
 		require dirname(__FILE__).'/mail/src/PHPMailer.php';
 		require dirname(__FILE__).'/mail/src/SMTP.php';
	    $mail = new PHPMailer\PHPMailer\PHPMailer();
	    try {
	        $mail->isSMTP();
	        $mail->SMTPDebug  = 0; 
	        $mail->SMTPAuth   = true;
	        $mail->SMTPSecure = 'ssl';
	        $mail->Port       =  465;
	        $mail->CharSet = "UTF-8";
	        $mail->Host       = 'smtp.gmail.com';
	        $mail->Username   = $CONFIG_GMAIL;
	        $mail->Password   = $CONFIG_MAILPASS;
	        $mail->setFrom($CONFIG_GMAIL, $CONFIG_SITE);
	        $mail->addReplyTo($CONFIG_GMAIL, $CONFIG_SITE);
	        $mail->addAddress($email, $email);
	        $mail->addCC('egsahansigamage@gmail.com', 'Sahansi Gamage');
	        $mail->addCustomHeader('X-SES-CONFIGURATION-SET', 'ConfigSet');
	        $mail->isHTML(true);
	        $mail->Subject = $subject;
	        $mail->MsgHTML($message); 
	        if (!$mail->send()) { array_push($_CONSOLE, 'CLASS(MailServer->sendMail): ERROR->'.$mail->ErrorInfo); } 
	        else { array_push($_CONSOLE, 'CLASS(MailServer->sendMail): SUCCESS'); return true; }
	    } 
	    catch (Exception $ex) { array_push($_CONSOLE, 'CLASS(MailServer->sendMail): EXCEPTION->'.$ex); }
	}
}

array_push($_CONSOLE, 'CLASS.FILE: OPEN->'.$_SERVER['PHP_SELF']);

?>