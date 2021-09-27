<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include('../principal/vendor/autoload.php');

function smtp_mailer($to,$subject,$name,$docno){
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'simatlms5@gmail.com';                     //SMTP username
    $mail->Password   = '#Simat@LMS100%';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('simatlms5@gmail.com', 'E-Governance');
    $mail->addAddress($to,$name);     
              
   
   
     

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = 'Your Certificate application has been Approved. Please loging to E-Governance portal to download the certificate using your <b>Document Number  : ';
    $mail->Body .= $docno;
    $mail->Body .= '</b> and <b>Admission Number</b>.<br><br><br> This is an auto-generated message hence there is no need to reply.';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}