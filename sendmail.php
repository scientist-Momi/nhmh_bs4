<?php

require_once 'models/Mailer.class.php';

// Getting all inputs from form
$receiver = stripslashes($_POST['receiver']);
$message = stripslashes($_POST['message']);

$emailSender = new EmailSender();
$emailSender->sendTest($receiver, $message);