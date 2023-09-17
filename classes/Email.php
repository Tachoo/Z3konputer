<?php

namespace Classes;
use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    public $email;
    public $usuario;
    public $token;
   public function __construct($email,$token)
   {
     $this->email=$email;
     $this->usuario=$email;
     $this->token=$token;
   }

   public function EnviarConfirm()
   {
    //crear objeto email
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = $_ENV['EMAIL_HOST'];
    $mail->SMTPAuth = true;
    $mail->SMTPSecure='ssl';
    $mail->Port = $_ENV['EMAIL_PORT'];
    $mail->Username = $_ENV['EMAIL_USER'];
    $mail->Password = $_ENV['EMAIL_PASS'];
    $mail->isHTML(true);
    $mail->CharSet='UTF-8';

    $mail->setFrom($_ENV['EMAIL_USER']);
    $mail->addAddress($this->usuario);
    $mail->Subject='Confima tu cuenta';

    //Cargar el html en un objeto
    ob_start();
    include("../views/templates/mail.php");
    $contenido=ob_get_contents();
    ob_get_clean();

    $mail->Body=$contenido;

    $mail->send();

   }

   public function EnviarResetPassword()
   {
        //crear objeto email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->SMTPSecure='ssl';
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
        $mail->isHTML(true);
        $mail->CharSet='UTF-8';
    
        $mail->setFrom($_ENV['EMAIL_USER']);
        $mail->addAddress($this->usuario);
        $mail->Subject='Restablece tu cuenta';
    
        //Cargar el html en un objeto
        ob_start();
        include("../views/templates/reset-password.php");
        $contenido=ob_get_contents();
        ob_get_clean();
    
        $mail->Body=$contenido;
    
        $mail->send();
        
   }

}