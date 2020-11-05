<?php

    require "library/classInterfaces/classInterfaces.php";

    class Request implements EmailInterface, SubjectInterface, MessageInterface {

        private $email;
        private $subject;
        private $message;

        public function __construct(array $request) {
            $this->email   = htmlspecialchars($request["email"]);
            $this->subject = htmlspecialchars($request["subject"]);
            $this->message = $request["message"];
        }

        public function getEmail() {
            if(property_exists($this, "email")) {
                return $this->email;
            }
            die("Email property required");
        }

        public function getSubject() {
            if(property_exists($this, "subject")) {
                return $this->subject;
            }
            die("Subject property required");
        }

        public function getMessage() {
            if(property_exists($this, "message")) {
                return $this->message;
            }
            die("Message property required");
        }
    }