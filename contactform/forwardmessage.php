<?php

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["u_name"]));
        $subjct = strip_tags(trim($_POST["u_subject"]));
        $name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["u_email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["u_message"]);

        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($message) OR empty($subjct) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! There was a problem with your submission. Please complete the form and try again.";
            exit;
        }

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = "gabrielilo190@gmail.com";

        // Set the email subject.
        $subject = "New contact from Ulearning";

        // Build the email content.
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Subject: $subjct\n\n";
        $email_content .= "\t\t\t\t\tMESSAGE:\n$message\n";

//$headers =  'MIME-Version: 1.0' . "\r\n"; 
//$headers .= 'From: '.$name.' < '.$email.'>' . "\r\n";
//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
//mail($to, $subject, $body, $headers);
        
        // Build the email headers.
//default        $email_headers = "Reply-To: $name <$email>";
        $email_headers = 'From: '.$name.' < '.$email.'>';

        // Send the email. “-f mail@yourdomain.com” --add as fifth value
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message. ";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>
