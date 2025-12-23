<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Add custom text to the subject
    $custom_subject = "[CFAP UK] " . $subject;

    $to = 'info@cfapuk.com'; // Replace with your email address
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $body = "<strong>Name:</strong> $name<br>";
    $body .= "<strong>Email:</strong> $email<br>";
    $body .= "<strong>Subject:</strong> $custom_subject<br>";
    $body .= "<strong>Message:</strong><br>$message";

    if (mail($to, $custom_subject, $body, $headers)) {
        echo '<script type="text/javascript">
                alert("We have received your message, A member of our team will reach out to you soon. Thank you!");
                window.location.href = "./";
              </script>';
    } else {
        echo '<script type="text/javascript">
                alert("Failed to send email.");
                window.location.href = "./";
              </script>';
    }
} else {
    echo 'Invalid request method.';
}
?>
