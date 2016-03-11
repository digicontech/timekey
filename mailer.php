<?php  
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = strip_tags(trim($_POST["full_name"]));
		$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $telephone = trim($_POST["telephone"]);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);

        $recipient = "nyejones01@gmail.com";

        $subject = "New Enquiry";

        $email_content = "Name: $name\n";
        $email_content .= "Telephone: $telephone\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";
        $email_headers = "From: Website-Enquiry";

        if (mail($recipient, $subject, $email_content, $email_headers)) {
            http_response_code(200);
            echo "Thank You!\n\nYour message has been sent.";
        } else {
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }
    } else {
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>
