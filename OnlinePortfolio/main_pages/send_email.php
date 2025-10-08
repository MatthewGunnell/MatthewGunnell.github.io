 <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
        $subject = htmlspecialchars($_POST['subject']);
        $message = htmlspecialchars($_POST['message']);

        $to = "mattgunnell05@gmail.com"; // Your email address
        $subject = "Form Submission from your portfolio website";
        $headers = "From: " . $email . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";

        $email_body = "
            <html>
            <body>
                <h2>Form Submission Details</h2>
                <p><strong>Name:</strong> {$name}</p>
                <p><strong>Email:</strong> {$email}</p>
                <p><strong>Phone Number</strong> {$phoneNumber}</p>
                <p><strong>Subject:</strong><br>{$subject}</p>
                <p><strong>Message:</strong>{$message}</p>
            </body>
            </html>
        ";

        ini_set( 'smtp_port', '587' )

        if (mail($to, $subject, $email_body, $headers)) {
            echo "Thank you for your submission!";
        } 
        else {
            echo "Oops! Something went wrong.";
        }
    } 
    else {
        echo "Invalid request method.";
    }
?>