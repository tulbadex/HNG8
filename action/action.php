<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/* require_once __DIR__.'/../PHPMailer/src/Exception.php';
require_once __DIR__.'/../PHPMailer/src/PHPMailer.php';
require_once __DIR__.'/../PHPMailer/src/SMTP.php'; */
require_once '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';

error_reporting(-1);
header("Access-Control-Allow-Origin: *");
if (session_status() === PHP_SESSION_NONE) { session_start(); }

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $errorMsg = $successMsg = "";
    $errorStatus = $successStatus = false;
    $_POST = json_decode(file_get_contents('php://input'), true);
    if ($_POST['action'] == 'send') {
        /* print_r($_POST);
        die(); */
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
            $mail = new PHPMailer(true);
            $sendersEmail = "tulbadex@gmail.com";
            try {
                //Server settings SMTP::DEBUG_SERVER
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;     //Enable verbose debug output
                $mail->isSMTP();                              //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';          //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                     //Enable SMTP authentication
                $mail->Username   = 'tulbadex@gmail.com';     //SMTP username
                $mail->Password   = 'babatunde12345';           //SMTP password
                // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   //Enable implicit TLS encryption
                $mail->Port       = 587;                      //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                $mail->SMTPSecure = 'tls';
        
                /* $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                ); */
        
                //Recipients
                $senderEmail = $sendersEmail ? $sendersEmail : "info@nairaload.com";
                
                $mail->setFrom($senderEmail, 'My Site');
                $mail->addAddress($email, $name);     //Add a recipient
        
        
                //Content
                // $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $message;
        
                $mail->send();
                echo json_encode(array('msg' => 'success'));
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
}