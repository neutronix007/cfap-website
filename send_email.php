<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $subject = htmlspecialchars($_POST['subject']);
  $message = htmlspecialchars($_POST['message']);

  $to = 'your-email@example.com'; // Replace with your email address
  $headers = "From: $name <$email>\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

  $mail_sent = mail($to, $subject, $message, $headers);

  if ($mail_sent) {
    echo '<p>Thank you for your message. It has been sent.</p>';
  } else {
    echo '<p>Sorry, there was an error sending your message. Please try again.</p>';
  }
}
?>
