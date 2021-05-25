<?php 
if(isset($_POST['submit'])){
    $to = "ianclemence17@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $name . " wrote the following:" . "\n\n" . $_POST['message'];

    mail($to,$subject,$message);
    echo "Mail Sent. Thank you " . $name . ", I will contact you shortly.";
    }
?>
