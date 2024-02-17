<?php
define('TITLE', 'Contact Item | Franklin Dining');
include('includes/header.php');
?>

<div id="contact">
    <h1>Get in touch with us!</h1>
    <?php
    //check for header injection
    function has_header_injection($str) {
        return preg_match("/[\r\n]/", $str);
    }

    if (isset($_POST['contact_submit'])) {
        $name=trim($_POST['name']);
        $email=trim($_POST['email']);
        $msg=$_POST['message'];

        if(has_header_injection($name) || has_header_injection($email)){
            die();
        }

        if(!$name || !$email || !$msg){
            echo '<h4 class="error">All fields required.</h4><a href="contact.php" class="button block">Go back and try again</a>';
            exit;
        }

        //add the recipient email to a variable
        $to = "your@email.com";

        //create a subject
        $subject = "$name sent you a message via your contact from";

        //construct the message
        $message = "Name: $name\r\n";
        $message .= "Email: $email\r\n";
        $message .= "Message: \r\n$msg";

        if(isset($_POST['subscribe']) && $_POST['subscribe'] == 'Subscribe'){
            //add a new line to the message
            $message .= "\r\n\r\nPlease add $email to the mailing list.\r\n";
        }

        $message = wordwrap($message,72);
        //set the mail headers into a variable string
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\r\n";
        $headers .= "From: $name <$email> \r\n";
        //spam filter
        $headers .= "X-Priority: 1\r\n";
        //email high priority
        $headers .= "X-MSMail-Priority: High\r\n\r\n";

        //send email
        mail($to,$subject,$message,$headers);
    ?>
    <!-- Show message after email has sent -->
        <h4>Thanks for contacting!</h4>
        <p>Please allow 24 hours for a response.</p>
        <a href="index.php" class="button previous">Back to Home</a>

    <?php } else { ?>

    <form action="" method="post" id="contact-form">
        <label for="name">Your name</label>
        <input type="text" name="name" id="name">

        <label for="email">Your email</label>
        <input type="email" name="email" id="email">

        <label for="message">Your message</label>
        <textarea name="message" id="message" cols="30" rows="10"></textarea>

        <input type="checkbox" name="subscribe" id="subscribe" value="Subscribe">
        <label for="subscribe">Subscribe to newsletter</label>

        <input type="submit" class="button next" name="contact_submit" value="Send Message">
    </form>
    <?php } ?>
</div>

<a href="menu.php" class="button previous">Back to Menu</a>

<?php include('includes/footer.php'); ?>;