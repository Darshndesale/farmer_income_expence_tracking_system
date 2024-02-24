<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sending email</title>
</head>
<body>
    <?php
    /* But before sending the mail I must have follow this 3 ground rules
        1> Install XAMPP 3.2.1 v
        2> It is normal not to received email with localhost
        => becuse inbetween the server and receiver there are some spam filters which holds the email as the spam

        3> then the contact your website hosting comapny
    */
    // We can write code but this is not execute becuse of this rules
    
    $emailTo = "darshandesale18@gmail.com"; // this the the receiver addrease to we send our side
    $body = "I am darshan welcome to write the code in php to send email";
    $subject = "This is emal sends using php";
    $headers = "From : darshandesale18@gmail.com";

    if(mail($emailTo, $subject, $body, $headers)){
        echo "Successfully send the mail !";
    } else {
        echo "Mail not sent !";
    }

    // It gives error becuse email path is not set Of 
    /*
        Warning: mail(): "sendmail_from" not set in php.ini or custom "From:" header missing in C:\xampp\htdocs\onlyphp\17_Form_Handling\SendEmail.php on line 24
Mail not sent !
    */

    // Note : We use it to send the mail from our form validation project With user details
    // It is help full for the creating the any type of form in using php 
    ?>
</body>
</html>