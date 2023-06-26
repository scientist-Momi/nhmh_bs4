<?php
include_once "db_connector.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NHMH || Secure the pregnant</title>
    <link rel="stylesheet" href="sass/app.css">
    <link rel="icon" href="images/newLogo3.png" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark  bg-primary ">
        <div class="container">
            <div class="navbar-brand d-flex align-items-center">
                <a href="index"><img src="images/newLogo3.png" alt="" class="img_size2"></a>
                <h4>New Horizons Maternity Hospital</h4>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index">Front page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services">Hospital Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="blogs">Hospital Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactnhmh">Contact Hospital</a>
                    </li>


                </ul>
                <!-- <button class="btn btn-dark btn-md ms-4 text-white" data-bs-toggle="modal" data-bs-target="#signin">Sign
                    In</button> -->
            </div>
        </div>
    </nav>