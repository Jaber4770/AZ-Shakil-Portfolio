<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    http_response_code(500);
    echo "Invalid input";
    exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// $to = "hi@azshakil.com"; // Corrected email address
$to = "jaber.ahmed4770@gmail.com"; // Corrected email address
$subject = "$m_subject: $name";
$body = "You have received a new message from your website contact form.\n\n"
      . "Here are the details:\n\n"
      . "Name: $name\n\n"
      . "Email: $email\n\n"
      . "Subject: $m_subject\n\n"
      . "Message: $message";

$header = "From: noreply@yourdomain.com\r\n"; // Use a fixed domain email here
$header .= "Reply-To: $email\r\n";

if(mail($to, $subject, $body, $header)) {
    http_response_code(200);
    echo "Message sent successfully.";
} else {
    http_response_code(500);
    echo "Message could not be sent.";
}
?>
