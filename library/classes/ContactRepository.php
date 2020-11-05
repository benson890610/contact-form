<?php

    class ContactRepository extends Database{

        public function __construct() {
            parent::__construct();
        }

        public function save(string $email, string $subject, string $message) {
            
            $sql = "INSERT INTO contacts SET email = ?, subject = ?, message = ?";

            $this->prepare($sql);
            $this->execute([$email, $subject, $message]);
        }

    }