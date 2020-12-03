<?php
    //get phpmailer file from here : https://github.com/PHPMailer/PHPMailer

    echo "hello";
    exit;


    require 'path/to/PHPMailer/src/Exception.php';  
    require 'path/to/PHPMailer/src/PHPMailer.php';
    require 'path/to/PHPMailer/src/SMTP.php';

    $mail->isSMTP();
    $mail->Host     	= "smpt.zoho.in";
    $mail->SMTPAuth 	= true;
    $mail->SMTPDebug  	= 4;          
    $mail->Username 	= "info@mumsrobo.com";
    $mail->Password 	= "@Mumsrobo#123";
    $mail->Port     	= 587;
    $mail->SMTPSecure   = "tls";
    
    $mail->setFrom('info@mumsrobo.com', 'mumsrobo.com');
    $mail->addReplyTo('info@mumsrobo.com', 'mumsrobo.com');
    
    $mail->addAddress("info@mumsrobo.com");
    
    // Add cc or bcc if required
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
    
    $mail->Subject = 'Mailer Subject';
    $mail->isHTML(true);
    $mailContent = '<html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            </head>

            <body style="padding: 0; margin: 0; width: 100%; height: 100%;">
                <div>Mailer Content Here </div>    
            </body>
        </html>';
    $mail->Body = $mailContent;
    
    if($mail->send()){
        echo "success";
    }else{
        echo "failed"
    }
?>