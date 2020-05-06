<?php

use Core\Config\Config;
use PHPMailer\PHPMailer\PHPMailer;

class testEmailController{
    public function test()
    {
//        dd(Config::mail('smtp_server'));

        $mail=new PHPMailer(true);
        try {
            //Server settings
//            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = Config::mail('smtp_server');  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = Config::mail('username');                  // SMTP username
            $mail->Password = Config::mail('password');                          // SMTP password
            $mail->SMTPSecure = Config::mail('security');                             // Enable TLS encryption, `ssl` also accepted
            $mail->Port = Config::mail('port'); ;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
            $mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}