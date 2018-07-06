<?php

use Core\Database\DB\DB;
use Core\Exceptions\ExceptionsHandler;
use Core\Requests\Request;
use Core\Storage\Storage;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/15/2018
 * Time: 2:43 PM
 */

class AboutController
{
    public function __construct()
    {
    }

    public function hello()
    {
        dd(\Core\Database\Migration\Migration::load());
        dd(PHPMailer::$validator);
        dd(DB::all('users'));
    }

    function send(){//get the required
        $mail=new PHPMailer();
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'user@example.com';                 // SMTP username
            $mail->Password = 'secret';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
            $mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');

            //Attachments
            $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

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

    public function index()
    {
        echo "ondec ";
    }

    public function help()
    {
        echo "help";
    }

    public function file()
    {
        $request = new Request();
        $f = $request->files('file', 'file1');
        try {
            $storage = new Storage();
            dd($storage->store($f->file, 'private'));
        } catch (ExceptionsHandler $e) {
            dd($e);
        }
    }

    public static function download()
    {
        $file = 'Storage/Public/mn9h85ySdY5Iki6.mp3';
        try {
            Storage::download($file, 'music');
        } catch (ExceptionsHandler $e) {
            dd($e);
        }
    }
}