<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../phpMailer/vendor/autoload.php';
// 
$mail = new PHPMailer(true);

try {
    //Server settings
   /* $mail->SMTPDebug = SMTP::DEBUG_SERVER;*/                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'mitphotos99@gmail.com';                     // SMTP username
    $mail->Password   = '12345@Mitphotos';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('madhuvermamit2k15@gmail.com', 'Admin');
    $mail->addAddress('madhuvermamit2k15@gmail.com', 'Joe User');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Testing for mail';
    $mail->Body    = $messageBody;
                        //n=body me html send kr skti ho
                        // ye sb htmlcss js ka page h
                        // page bna ke fir send kr diya page bna ke yha include krna hota h?
                        // variable me send kr do

    //$mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

// jayada fake message send krogi to gmail wala spam me dal deta h
// mtlb fraud samj leta h achha kitna bar kr skte h
// jo message aya uska reply kr do uska algorithm ko lgega ki normal user tha