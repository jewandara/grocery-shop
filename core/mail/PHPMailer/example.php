<?php

    require 'PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();

    try {
        //Server settings
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->SMTPDebug = 2; 
        $mail->Host       = 'mail.whitedw.com;mail.whitedw.com';    // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'info@whitedw.com';                     // SMTP username
        $mail->Password   = 'info#123';                             // SMTP password
        $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to

        $mail->setFrom('info@whitedw.com', 'White Dwarf');
        $mail->addReplyTo('jewandara@whitedw.com', 'Rachitha Jeewandara');
        $mail->addAddress('info@whitedw.com', 'White Dwarf');
        $mail->addCC('jewandara@gmail.com');
        $mail->addBCC('jewandara@hotmail.com');

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = 'PHPMailer test';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


        //send the message, check for errors
        if (!$mail->send()) { echo "Mailer Error: " . $mail->ErrorInfo; } 
        else { echo "Message sent!"; }

    } 
    catch (Exception $e) { echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; }



/*$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'mail.whitedw.com;mail.whitedw.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'info@whitedw.com';                     // SMTP username
    $mail->Password   = 'info#123';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('info@whitedw.com', 'Mailer');
    $mail->addAddress('info@whitedw.com', 'Joe User');     // Add a recipient
    $mail->addAddress('info@whitedw.com');               // Name is optional
    $mail->addReplyTo('info@whitedw.com', 'Information');
    $mail->addCC('info@whitedw.com');
    $mail->addBCC('info@whitedw.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}*/