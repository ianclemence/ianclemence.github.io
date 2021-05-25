<?php
$message_sent = false;
if (isset($_POST['submit']) && $_POST['g-recaptcha-response'] != "") {


  $secret = '6LcDrXAaAAAAAAIiBS_x_USQwbUc-BljtmRv0Xih'; //Your SECRET KEY is here
  $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
  $responseData = json_decode($verifyResponse);
  if ($responseData->success) {

    if (isset($_POST['email']) && $_POST['email'] != '') {

      if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

        $userName = $_POST['name'];
        $userEmail = $_POST['email'];
        $userPhone = $_POST['phone'];
        $quantity = $_POST['quantity'];
        $message = $_POST['message'];

        $to = "info@ezeehandle.com";
        $messageSubject = "Email from Ezee Handle Website";
        $body = "";

        $body .= "From: " . $userName . " \r\n";
        $body .= "Email: " . $userEmail . " \r\n";
        $body .= "Phone: " . $userPhone . " \r\n";
        $body .= "Quantity: " . $quantity . " \r\n";
        $body .= "Message: " . $message . " \r\n";

        mail($to, $messageSubject, $body);
        echo $success_message;
        $message_sentt = true;
      }
    }
  }
}
?>