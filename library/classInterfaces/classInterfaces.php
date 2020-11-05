<?php

    interface EmailInterface {
        public function getEmail();
    }

    interface SubjectInterface {
        public function getSubject();
    }

    interface MessageInterface {
        public function getMessage();
    }

    interface ContactInterface {
        public function __construct(Database $repository);
        public function save();
        public function send();
    }