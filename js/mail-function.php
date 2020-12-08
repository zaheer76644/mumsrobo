<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');


    $adminEmail = "info@mumsrobo.com";
    $adminName = "Mums Robo";

    $studentFirstName = $_POST['studentFirstName'];
    $studentMiddleName = $_POST['studentMiddleName'];
    $parentFirstName = $_POST['parentFirstName'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    // $hourAppointment = $_POST['hourAppointment'];

    require_once './class.phpmailer.php';
    include("./class.smtp.php");
    
    //USER EMAIL
    $Subject2 = 'Mumsrobo - Thankyou for connecting with us.';
    $msg = '<html>
        <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <title>Thank You</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>  
        <body style="margin: 0; padding: 0;">
            <p>Dear User,</p> 
            <p>Thank you for contacting us.</p>
            <p>We will get back to you shortly.</p>
        </body>
    </html>';

    $BODY2 = $msg;
    $mail_user  = new PHPMailer();

    $mail_user->IsSMTP();  // telling the class to use SMTP
    $mail_user->Host       = "smtp.gmail.com";
    $mail_user->SMTPDebug  = 0;                     
    $mail_user->SMTPAuth   = true;  
    $mail_user->SMTPSecure = 'tls';                
    $mail_user->Port       = 587;                   
    $mail_user->Username   = "mumsrobo123@gmail.com";
    $mail_user->Password   = "MumsRobo@3423";

    $body2  = preg_replace("[\\\]",'',$BODY2);
    $mail_user->AddReplyTo($adminEmail, $adminName);
    $mail_user->SetFrom($adminEmail, $adminName);
    $mail_user->AddAddress($email);
    $mail_user->Subject  = $Subject2;
    $mail_user->AltBody  = "To view the message, please use an HTML compatible email viewer!"; 
    $mail_user->MsgHTML($body2);
    $mail_user->Send();

    
    //ADMIN EMAIL
    $Subject = "Enquiry Received from " . $studentFirstName . " " . $studentMiddleName;
    $message = '<html>
        <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <title>Thank You</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>  
        <body style="margin: 0; padding: 0;">
            <p>Dear Admin,</p>
            <p>Following person have contacted us</p>
            <p>Student First Name : '.$studentFirstName.'</p>
            <p>Student Middle Name : '.$studentMiddleName.'</p>
            <p>Parent First Name : '.$parentFirstName.'</p>
            <p>Email Id : '.$email.'</p>
            <p>Mobile Number : '.$phoneNumber.'</p>
            <p>Date : '.$date.'</p>
        </body>
    </html>';     

    $BODY = $message;
    $mail  = new PHPMailer();
    $mail->IsSMTP();  // telling the class to use SMTP
    $mail->Host       = "smtp.gmail.com";
    $mail->SMTPDebug  = 0;                     
    $mail->SMTPAuth   = true;  
    $mail->SMTPSecure = 'tls';                
    $mail->Port       = 587;                   
    $mail->Username   = "mumsrobo123@gmail.com";
    $mail->Password   = "MumsRobo@3423";
    
    $body  = preg_replace("[\\\]",'',$BODY);
    $mail->AddReplyTo($email, $studentFirstName);
    $mail->SetFrom($email, $studentFirstName);
    $mail->AddAddress($adminEmail, $adminName);
    $mail->Subject  = $Subject;
    $mail->AltBody  = "To view the message, please use an HTML compatible email viewer!"; 
    $mail->MsgHTML($body);
    
    if($mail->Send()){
        echo 'success';
    }else{
        echo $mail->ErrorInfo;
    }

?>

