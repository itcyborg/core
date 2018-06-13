<?php 

 require_once"vendor\autoload.php";

  Class Email{
  	public function send($to,$subject,$msg,$headers){

  		if (!mail($to, $subject,$msg,$headers)) {
  			echo "unable to send mail";
  		}
  		else{
  			echo "mail sent successfully";
  		}
  	}
  }
  $mail=new Email;
  $mail->send();
  
 ?>