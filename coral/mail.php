<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        # FIX: Replace this email with recipient email
        $mail_to = "Your MAIL @domain.com";
        
        # Sender Data
        $subject = trim($_POST["subject"]);
        $name = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["name"])));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);
        
        if ( empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($subject) OR empty($message)) {
            # Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Заповніть форму та повторіть спробу.";
            exit;
        }
        
        # Mail Content
        $content = "Нове повідомлення від імені: $name\n";
        $content .= "Email: $email\n\n";
        $content .= "Subject: $subject\n\n";
        $content .= "Message:\n$message\n";

        # email headers.
        $headers = "From: $name <$email>";

        # Send the email.
        $success = mail($mail_to, $subject, $content, $headers);
        if ($success) {
            # Set a 200 (okay) response code.
            http_response_code(200);
            echo "Дякуємо! Ваше повідомлення було відправлене.";
        } else {
            # Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "На жаль! Щось пішло не так, ми не змогли надіслати ваше повідомлення.";
        }

    } else {
        # Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "Виникла проблема з вашим поданням. Повторіть спробу.";
    }

?>
