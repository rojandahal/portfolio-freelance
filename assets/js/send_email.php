<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $full_name = $_POST['full-name'];
    $email = $_POST['email'];
    $project_type = $_POST['project'];
    $mobile = $_POST['number'];
    $message = $_POST['message'];

    // Validate form fields
    $errors = [];
    if (empty($full_name)) {
        $errors[] = "Full Name is required";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid Email is required";
    }
    if (empty($project_type)) {
        $errors[] = "Project Type is required";
    }
    if (empty($mobile)) {
        $errors[] = "Mobile Number is required";
    }
    if (empty($message)) {
        $errors[] = "Project Details are required";
    }

    // If there are no errors, send email
    if (empty($errors)) {
        // Set email parameters
        $to = "dahalrojan07@gmail.com"; // Change this to your email
        $subject = "New Project Inquiry";
        $body = "Full Name: $full_name\n";
        $body .= "Email: $email\n";
        $body .= "Project Type: $project_type\n";
        $body .= "Mobile: $mobile\n";
        $body .= "Message:\n$message";

        // Send email
        if (mail($to, $subject, $body)) {
            $result = "Your message has been sent successfully!";
        } else {
            $result = "Sorry, there was an error sending your message.";
        }
    } else {
        $result = implode("<br>", $errors);
    }

    // Output result
    echo $result;
}
?>
