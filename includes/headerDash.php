<?php
session_start();
include_once "db_connector.php";

if (!isset($_SESSION['patient_uid']) && !isset($_SESSION['staff_uid'])) {
    header('location: index');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NHMH || Dashboard</title>
    <link rel="stylesheet" href="sass/app.css">
    <link rel="icon" href="images/newLogo3.png" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>