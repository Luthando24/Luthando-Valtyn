<?php
     if(isset($_Post["submit"]))
     {
        $User_name = $_Post["name"];
        $phone = $_Post["phone"];
        $User_email = $_Post["email"];
        $User_message = $_Post['message'];


        $email_from = "luthandovaltyn@gmail.com";
        $email_subject = "Form Submission";
        $email_body = "Name: $User_Name.\n".
                       "Phone No: $phone.\n".
                        "Email id: $user_email.\n".
                        "User Message: $user_email.\n";

        $to_email = "luthandovaltyn@gmail.com";
        $headers = "From:" $email_user\r\n";
        $headers = "Reply-To: $user_email\r\n";
        
        
        $secretKey = "6LdtlewZAAAAAMWDItQhhWvEB_5xbprJBeCUXCZ6";
        $responseKey = $_POST["g-recaptcha-response"];
        $UserIP = $_SERVER["REMOTE_ADDR"]
        $url = "URL: https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$UserIP";

        $response = file_get_content($url);
        $response = luthando_valtyn($response);

        if ($response->success)
        {
           mail($to_email,$email_subject,$email_body,$headers);
           echo "Message sent Successfully";
        }
        else 
        {
           echo <span>"Invalid Captcha, Please Try Again</span>";
        
     }
     
     require_once "PHPMailer/PHPMailer.php";
     require_once "PHPMailer/SMTP.php";
     require_once "PHPMailer/Exception.php";

     $mail = new PHPMailer();

     //SMTP Settings
     $mail->isSMTP();
     $mail->Host = "smtp.gmail.com";
     $mail->SMTPAuth = true;
     $mail->Username = "luthandovaltyn@gmail.com";
     $mail->Password = "468468468";
     $mail->Port = 587; //465
     $mail->SMTPSecure = "tls"; //ssl

     //Email Settings
     $mail->isHTML(true);
     $mail->setFrom($email, $name);
     $mail->addAddress("luthandovaltyn@gmail.com");
     $mail->Subject = $subject;
     $mail->Body = $body;

     if ($mail->send()) {
         $status = "success";
         $response = "Email is sent!";
     } else {
         $status = "failed";
         $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
     }

     exit(json_encode(array("status" => $status, "response" => $response)));
 }
?>
 
