<?php
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $message = $_POST['message'];

    $email_from = 'abdullah_busari@yahoo.com';
    $email_subject = "Contact";
    $email_body = "User: $name.\n".
                    "User_mail: $mail.\n".
                        "User_message: $message.\n";

    $to = 'abdullah_busari@yahoo.com';
    $headers = "From: $email_from \r\n";
    $headers .= "Reply-To: $mail \r\n";
    mail($to, $email_subject, $email_body, $headers);
    header("Location: index.html")

?>