<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  // If using Composer, this will autoload PHPMailer

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get and sanitize the email from the form
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Validate the email address
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        // 1. Save the email to a text file
        $file = 'emails.txt';  // Make sure this file is writable
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND);

        // 2. Send a confirmation email to the user
        $subject = "Thank you for joining the waitlist!";
        $message = "Hi,\n\nThank you for joining our waitlist! We'll notify you when we launch.\n\nCheers!";

        // Initialize PHPMailer and configure it to send via Gmail's SMTP
        $mail = new PHPMailer(true);  // Create an instance of PHPMailer

        try {
            // Server settings
            $mail->isSMTP();                                           // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through (Gmail SMTP server)
            $mail->SMTPAuth   = true;                                    // Enable SMTP authentication
            $mail->Username   = 'terragrav.app@gmail.com';                 // Your Gmail address
            $mail->Password   = 'hgwc ezcd ewpu njau';                    // Your Gmail App Password (if 2FA is enabled)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption
            $mail->Port       = 587;                                    // TCP port to connect to (587 for TLS)

            // Recipients
            $mail->setFrom('your-email@gmail.com', 'Terragrav');
            $mail->addAddress($email);                                  // Add the user's email to the recipients

            // Content
            $mail->isHTML(false);                                      // Set email format to plain text
            $mail->Subject = $subject;
            $mail->Body    = $message;

            // Send the email
            $mail->send();
            echo "<p>Thank you for signing up! You'll hear from us soon.</p>";

            // 3. Admin email notification
            $admin_email = "terragrav.app@gmail.com";  // Your admin email
            $admin_subject = "New Waitlist Signup for Empower";
            $admin_message = "
             $email has signed up for Terragrav!
            ";
            $admin_headers = "MIME-Version: 1.0" . "\r\n";
            $admin_headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
            $admin_headers .= "From: terragrav.app@gmail.com" . "\r\n";  // Replace with your Gmail email

            // Send the email to the admin
            $mail->clearAddresses();  // Clear the previous recipient
            $mail->addAddress($admin_email);  // Add the admin email
            $mail->Subject = $admin_subject;
            $mail->Body = $admin_message;
            $mail->send();
        } catch (Exception $e) {
            echo "There was an error sending your confirmation email. Please try again.";
        }

    } else {
        echo "<p>Invalid email address. Please try again.</p>";
    }
}
?>
