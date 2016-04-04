<?php  
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

        $recipient = "enquires@thetimekey.co.uk";

        $subject = "Mailing list";

        $email_content .= "Email: $email\n\n";
        $email_headers = "From: Mailing-List-Enquiry";

        if (mail($recipient, $subject, $email_content, $email_headers)) {
            http_response_code(200);
            echo "Thank You!\n\nYou have joined our mailing list.";
        } else {
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }
    } else {
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
?>