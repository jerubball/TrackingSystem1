<?php

if(isset($_POST['button_pressed']))
{
    $to      = 'nobody@example.com';
    $subject = 'Emergency Response Email';
    $message = 'This is a Message in response to the emergency alarm button being pressed on the Tracking Program App, Please contact your child immidently';
    $headers = 'From: administrator@example.com' . "\r\n" .
        'Reply-To: administrator@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

    echo 'Emergency Contact has been Notified.';
}

?>