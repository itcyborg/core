<?php 

 require_once"vendor\autoload.php";

 use PHPMailer\PHPMailer\PHPMailer;

  Class Mail extends PHPMailer{
  	public function send(){
      /*
      $to="kathinirachael3@gmail.com";
      $subject="just a trial";
      $msg="this is a trial message";
      $headers="From:admin@localhost.com";
      */

  		if (!mail($to, $subject,$msg,$headers)) {
  			echo "unable to send mail";
  		}
  		else{
  			echo "mail sent successfully";
  		}
  	}
  }
  $mail=new Mail;
  $mail->send();
  
 ?>