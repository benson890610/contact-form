<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once "library/phpmailer/vendor/autoload.php";

    class Contact implements ContactInterface {

        public $email;
        public $subject;
        public $message;

        private $repository;

        public function __construct(Database $repository) {
            $this->repository = $repository;
        }
        public function save() {
            //$this->repository->save($this->email,$this->subject,$this->message);
        }
        public function send() {
            $mail = new PHPMailer;
            
            $mail->Host     = MAIL_HOST;
            $mail->Username = MAIL_USERNAME;
            $mail->Password = MAIL_PASS;
            $mail->Port     = MAIL_RECIVE_PORT;

            $mail->setFrom($this->email);
            $mail->addAddress(MAIL_USERNAME); 
            $mail->addReplyTo($this->email);
            
            $mail->isHtml(true);
            $mail->Subject = $this->subject;
            $mail->Body    = $this->message;

            return $mail->send();
        }

    }