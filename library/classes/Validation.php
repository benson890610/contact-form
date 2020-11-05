<?php

    class Validation {

        private $validationOk = true;

        const MIN_CHAR_LEN = 5;

        public function contact(Request $request) {
            $this->validEmail($request->getEmail());
            $this->validSubject($request->getSubject());
            $this->validMessage($request->getMessage());
            
            return $this->validationOk;
        }
        private function validEmail($text) {
            if(empty($text)) {
                $this->validationOk = false;
                setSessionError("email", "Email address required");
            } else {
                if(filter_var($text, FILTER_VALIDATE_EMAIL) === FALSE) {
                    $this->validationOk = false;
                    setSessionError("email", "Invalid email address");
                }
            }
        }
        private function validSubject($text) {
            if(empty($text)) {
                $this->validationOk = false;
                setSessionError("subject", "Subject field required");
            } else {
                if(strlen($text) < self::MIN_CHAR_LEN) {
                    $this->validationOk = false;
                    setSessionError("subject", "Subject field require minimum 5 character length");
                }
            }
        }
        private function validMessage($text) {
            if(empty($text)) {
                $this->validationOk = false;
                setSessionError("message", "Message field is required");
            }
        }
    }