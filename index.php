<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="codecell, btechkers, contact, Anonboy, html, css, js, vanilla css">
        <meta name="description" content="Anonymous Mail Sender">
        <meta name="author" content="Anonboy">

        <link href="https://fonts.googleapis.com/css2?family=Overpass+Mono&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./static/css/base.css">
        <link rel="stylesheet" href="./static/css/navbar.css">
        <link rel="stylesheet" href="./static/css/main.css">
        <link rel="stylesheet" href="./static/css/footer.css">
        
        <link rel="shortcut icon" href="./static/img/bt.png" type="image/x-icon" sizes="any">

        <script defer src="./static/js/account_dropdown.js"></script>
        <script defer src="./static/js/burger_menu_dropdown.js"></script>

        <title>Anon Mail</title>
    </head>

    <body>
        <nav class="navbar">
            <div class="left-side">
                <div class="burger-menu">
                    <div class="line-1"></div>
                    <div class="line-2"></div>
                    <div class="line-3"></div>
                </div>

                <div class="logo">
                    <a href="https://btechkers.netlify.app"><img src="./static/img/bt.png" alt="Btechkers"></a>
                </div>
               
            </div>

            <div class="right-side">
                <div class="account">
                    <img src="./static/img/insta.png" alt="Anonboy">

                    <div class="dropdown-caret"></div>
                </div>

                <div class="dropdown hide">
                    <div class="user-name">Umang Patel</div>

                    <ul>
                        <a href="https://anonboy.netlify.app"><li>Your profile</li></a>
                    </ul>
                </div>
            </div>
        </nav>
                <center class="title">Send Anonymous Email</center>
                &nbsp;&nbsp;&nbsp;
    <main>
        <?php 
            if(isset($_POST['sendmail'])) {
                require 'PHPMailerAutoload.php';
                require 'credential.php';

                $mail = new PHPMailer;

                // $mail->SMTPDebug = 4;                                  // Enable verbose debug output

                $mail->isSMTP();                                        // Set mailer to use SMTP
                $mail->Host = 'smtp-relay.brevo.com';                  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'amanwar5566@gmail.com';            // SMTP username
                $mail->Password = 'AcMmgUk7PHBYN2bG';                // SMTP password
                $mail->SMTPSecure = 'tls';             // Enable TLS encryption, `ssl` also accepted
                $mail->Port=587;                                  // TCP port to connect to

                $mail->setFrom($_POST['From']);
                $mail->addAddress($_POST['email']);     // Add a recipient

                $mail->addReplyTo(EMAIL);
                // print_r($_FILES['file']); exit;
                for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++) { 
                    $mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);    // Optional name
                }
                $mail->isHTML(true);                                  // Set email format to HTML

                $mail->Subject = $_POST['subject'];
                $mail->Body = $_POST['message'];

                if(!$mail->send()) {
            echo("<meta http-equiv='refresh' content='1'>");
                } else {
                    echo 'Message has been sent';
            echo("<meta http-equiv='refresh' content='1'>");
                }
            }
         ?>
        
            
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <input type="email" class="form-control" id="email" name="From" placeholder="Enter Email To Send" maxlength="50">
                    <label for="first-name">From:</label>
                </div>
                <br>
                <div class="input-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" maxlength="50">
                    <label for="last-name">To:</label>
                </div>
               <br>
                <div class="input-group">
                    <input type="contact" class="form-control" id="subject" name="subject" placeholder="Enter Your Subject" maxlength="50">
                    <label for="e-mail">subject</label>
                </div>
                <br>
                <div class="textarea-group">
                    <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Your Message Here" maxlength="6000" rows="4"></textarea>
                    <label for="message">Message</label>
                </div>
                <div class="button-div">
                    <input name="file[]" multiple="multiple" class="form-control" type="file" id="file">
                </div>
                <br>
                <div class="button-div">
                    <button type="submit" name="sendmail" >Send</button>
                </div>
            </form>
        </main>

        <footer>
            <a href="https://github.com/anonboy96" target="_blank"><img class="social-media-img" src="./static/img/social_media/github.svg" alt="GitHub"></a>
            <a href="https://instagram.com/justt.mango" target="_blank"><img class="social-media-img" src="./static/img/social_media/instagram.svg" alt="Instagram"></a>
 
            <a href="https://btechkers.netlify.app"><img class="codecell-img" src="./static/img/bt.png" alt="TSEC CodeCell"></a>
 
            <a href="https://www.linkedin.com/in/umang-patel-514517257" target="_blank"><img class="social-media-img" src="./static/img/social_media/linkedin.svg" alt="LinkedIn"></a>
            <a href="https://telegram.me/anonboy96" target="_blank"><img class="social-media-img" src="./static/img/social_media/Telegram.svg" alt="telegram""></a>
        </footer>
    </body>
</html>