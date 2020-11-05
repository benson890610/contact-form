<?php

    class FormHandler {

        public function proccessContact() {
            $request  = new Request($_POST);
            $validate = new Validation;

            if($validate->contact($request) === false) redirect("index");
            
            $contact = new Contact(new ContactRepository);
            $contact->email   = $request->getEmail();
            $contact->subject = $request->getSubject();
            $contact->message = $request->getMessage();

            if($contact->send()) {
                $contact->save();
                session("success", "Your email has been successfully sent. We will reply as soon as possible");
            } else {
                session("error", "Your email could not be sent. Please try again later");
            }
            redirect("index");
        }

    }