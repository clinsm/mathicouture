<?php
use PHPMailer\PHPMailer\PHPMailer;
  //   if($_POST['challenge'] == 10){
    function sendmail(){
        //$user_id = $_SESSION['user_id'];
      //   $contact_date = date("Y-m-d H:i:s");
        $contact_email = $_POST['email'];
      $contact_name = $_POST['name'];
  $contact_phone = $_POST['phone'];
  $service = $_POST['service-selection'];
  $reserve_date = $_POST['date'];
     $contact_message = trim(stripslashes($_POST['message']));
   /*if (!empty($error_message)) {
           echo "Check the following errors:<br>".$error_message. "<br> <a href='contact.html'>Contact us</a> for assistance.";
           return;
       }*/
        $name = "Online Consultation Booking";  // Name of website
        $to = "info@mathiscouture.com";  // mail of reciever
      //$to2 =  $contact_email;  // mail of reciever
        $subject = "Consultation Booking";
        $body = "<b>Contact Details </b> <br>Name: $contact_name"."<br>";
        $body .= "Email: $contact_email"."<br>";
        $body .= "Phone: $contact_phone"."<br>";
        $body .= "Service: $service"."<br>";
        $body .= "Date Reserved: $reserve_date"."<br>";
        $body .= "Vision: <i> $contact_message </i>"."<br>";
        $from = "noreply@mathiscouture.com";  // your mail
        $password = "maT.ply@l1v3";  // your mail password

        // Ignore from here

        require_once "PHPMailer/src/PHPMailer.php";
        require_once "PHPMailer/src/SMTP.php";
        require_once "PHPMailer/src/Exception.php";
        $mail = new PHPMailer();

        // To Here

        //SMTP Settings
        $mail->isSMTP();
        // $mail->SMTPDebug = 3;  Keep It commented this is used for debugging
        $mail->Host = "mail.mathiscouture.com"; // smtp address of your email
        $mail->SMTPAuth = true;
        $mail->Username = $from;
        $mail->Password = $password;
        $mail->Port = 587;  // port
        $mail->SMTPSecure = "tls";  // tls or ssl
        $mail->smtpConnect([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ]
        ]);

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($from, $name);
        $mail->addAddress($to); // enter email address whom you want to send
      //  $mail->addAddress($to2); // enter email address whom you want to send
        $mail->Subject = ("$subject");
        $mail->Body = $body;

        if ($mail->send()) {

           //echo "Success";
            echo json_encode(array('success' => 1));

        } else {
        //  echo "Failed. <br>". $mail->ErrorInfo;;
            //error by php mailer
           echo json_encode(array('success' => 0));
        }
    }
         sendmail();

 ?>
