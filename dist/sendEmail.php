<?php
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];

    require_once "../PHPMailer/PHPMailer.php";
    require_once "../PHPMailer/SMTP.php";
    require_once "../PHPMailer/Exception.php";


    $mail = new PHPMailer();

    $mail -> isSMTP();
    $mail -> Host = "smtp.gmail.com";
    $mail -> SMTPAuth = true;
    $mail -> Username = "ramzord@gmail.com";
    $mail -> Password = "clovahywftzympfz";
    $mail -> Port = 465;
    $mail -> SMTPSecure = "ssl";

    $mail -> isHTML(true);
    $mail -> setFrom($email, $name);
    $mail -> addAddress("ramzord@gmail.com");
    $mail -> Subject = ("$email ($subject)");
    $mail -> Body = "<h3>Name: $name <br>Email: $email <br>Subject: $subject<br> Message: $body </h3>";

    if($mail->send()){
        $status = "success";
        $response = "Email sent";
    } 
    else
    {
        $status = "failed";
        $response = " fail send email " . $mail ->ErrorInfo;
    }

    exit(json_encode(array("status" => $status, "response" => $response)));

}










?>