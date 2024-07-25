<?php
// Returns an error 405. This will be fixed in future. Placeholder code for now

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve form data
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    // Validate input (you can add more validation as needed)
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        // Handle empty fields (you can customize error handling here)
        die("Please fill out all required fields.");
    }

    // Set recipient email address
    $to = "egarcia3403@gmail.com"; // Replace with your email address

    // Set email subject
    $email_subject = "New Message from Contact Form";

    // Build email content
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n";
    $email_body .= "Message:\n$message\n";

    // Set headers
    $headers = "From: $email";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Email sent successfully
        header("Location: thank_you.html"); // Redirect to thank you page
        exit();
    } else {
        // Handle email sending failure
        die("Error sending email.");
    }

} else {
    // Redirect to error page if accessed directly
    header("Location: error.html");
    exit();
}
?>
