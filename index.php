<?php 
    session_start();
    require "helpers/sessionHelper.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatabile" content="IE=Edge">
    <meta name="author" content="Igor Djurdjic">
    <meta name="description" content="Contact form, Email, PHPMailer">
    <meta name="keywords" content="contact, igor djurdjic, phpmailer, email">
    <title>Contact Form | Igor Djurdjic</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    
    <header>
        <h1 class="text-center mt-5">Contact Form</h1>
        <p class="lead text-muted text-center">Complete the form below and send message to the app host.</p>
    </header>

    <div class="container"><?php echo output_message(); ?></div>

    <main>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-8 col-lg-8 col-sm-12 mx-auto">

                    <div class="card">
                        <div class="card-body bg-light">
                            <form action="proccess.php" method="post">
                                <div class="form-group">
                                    <label for="email">Your email address</label>
                                    <input type="text" name="email" id="email" class="form-control <?php echo checkSession('email'); ?>">
                                    <span class="invalid-feedback"><?php echo sessionMessage('email'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" name="subject" id="subject" class="form-control <?php echo checkSession('subject'); ?>">
                                    <span class="invalid-feedback"><?php echo sessionMessage('subject'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="summary-ckeditor" rows="10" class="form-control <?php echo checkSession('message'); ?>"></textarea>
                                    <span class="invalid-feedback"><?php echo sessionMessage('message'); ?></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div style="margin-top: 200px"></div>

    <script type="text-javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script>CKEDITOR.replace( 'summary-ckeditor' );</script>
</body>
</html>

<?php clearContactSessions(); ?>