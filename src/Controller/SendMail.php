<?php


namespace Controller;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class SendMail
{

    private $mail;


    public function __construct()
    {

        $this->mail = new PHPMailer(true);

      //Server settings
        $this->mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $this->mail->isSMTP();                                      // Set mailer to use SMTP
        $this->mail->Host = 'smtp.orange.fr';  // Specify main and backup SMTP servers
        $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
        $this->mail->Username = 'mac-luckie.dimitri@orange.fr';                 // SMTP username
        $this->mail->Password = 'dimitri156.';                           // SMTP password
        $this->mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $this->mail->Port = 465;                                    // TCP port to connect to

      //Recipients
        $this->mail->addAddress('dimitri.macluckie@gmail.com', 'contact client');     // Add a recipient
      //$this->mail->addAddress('ellen@example.com');               // Name is optional
        $this->mail->CharSet = "UTF-8";
      //$this->mail->addCC('dimitri.macluckie@gmail.com');
      //$this->mail->addBCC('dimitri.macluckie@gmail.com');

      //Attachments
      //$this->mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      //$this->mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

      //Content
        $this->mail->isHTML(true);                                  // Set email format to HTML
    //Recipients
    $this->mail->addAddress('dimitri.macluckie@gmail.com', 'contact client');     // Add a recipient
    //$this->mail->addAddress('ellen@example.com');               // Name is optional
    $this->mail->CharSet = "UTF-8";
    //$this->mail->addCC('dimitri.macluckie@gmail.com');
    //$this->mail->addBCC('dimitri.macluckie@gmail.com');

    //Attachments
    //$this->mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$this->mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $this->mail->isHTML(true);                                  // Set email format to HTML


  }


    public function send($email, $subject, $body)
    {

        $this->mail->setFrom($email, 'tetradigital');
        $this->mail->addReplyTo($email, 'Client');
        $this->mail->Subject = $subject;
        $this->mail->Body    = $body;
      //$this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      // Passing `true` enables exceptions
        try {
            $this->mail->send();
            echo '<strong> vos informations ont bien était envoyé à l \'agence. vous allez être recontacté dans maximum 24h00 </strong>';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $this->mail->ErrorInfo;
        }
    }
}
