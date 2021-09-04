<?php
     
     require "phpmailer/PHPMailerAutoload.php";
    $mail=new PHPMailer;
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                        // Send using SMTP
    $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'librarymanagment2020@gmail.com';                     // SMTP username
    $mail->Password   = 'library308';                              // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('librarymanagment2020@gmail.com');
    $mail->addAddress('mehulpateliya01@gmail.com');     // Add a recipient
   // $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('librarymanagment2020@gmail.com');
   // $mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send())
    {
        echo 'Message success';
    }
    else
    {
        echo 'Message failure';
    }
    

?>