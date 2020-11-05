<?php

    require_once "library/phpmailer/vendor/autoload.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

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

            

        }

    }