<?php

    if($_SERVER["REQUEST_METHOD"] === "POST") {

        session_start();
        
        require_once "helpers/sessionHelper.php";
        require_once "helpers/redirectHelper.php";
        require_once "library/classInterfaces/classInterfaces.php";
        require_once "data/appData.php";

        spl_autoload_register(function($className){
            if(file_exists("library/classes/" . $className . ".php")) {
                require "library/classes/" . $className . ".php";
            }
        });

        $form = new FormHandler;
        $form->proccessContact();

    } else {
        header("Location: index.php");
        exit;
    }