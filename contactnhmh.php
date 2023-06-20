<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="sass/app.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark  bg-primary ">
        <div class="container">
            <div class="navbar-brand d-flex align-items-center">
                <a href="#"><img src="images/momi.png" alt="" class="img_size2"></a>
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
                        <a class="nav-link" href="blogs">Hospital Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contactnhmh">Contact Hospital</a>
                    </li>


                </ul>
                <!-- <button class="btn btn-dark btn-md ms-4 text-white" data-bs-toggle="modal" data-bs-target="#signin">Sign
                    In</button> -->
            </div>
        </div>
    </nav>

    <!-- main section -->
    <section class="bg-light text-dark py-5 px-5">
        <div class="container">
            <div class="row row-cols-md-2 row-cols-sm-1 shadow mx-md-5">
                <div class="col bg-primary p-5 text-white">
                    <h4>Contact the Hospital or send us your enquiry</h4>
                    <div class="contacts p-3">
                        <div class="phone d-flex">
                            <span class="material-icons-sharp">
                                call
                            </span>
                            <p class="ms-3">09098998998</p>
                        </div>
                        <div class="phone d-flex">
                            <span class="material-icons-sharp">
                                mail
                            </span>
                            <p class="ms-3"><a href="mailto:admin@momiwebs.com.ng" class="text-white">NHMH email</a></p>
                        </div>
                        <div class="phone d-flex">
                            <span class="material-icons-sharp">
                                place
                            </span>
                            <p class="ms-3">78, New Horizons Haruna Bus stop Ikorodu, Lagos. Nigeria.</p>
                        </div>
                    </div>

                </div>
                <div class="col border-primary border border-primary bg-white">
                    <form action="" class="p-md-5 p-sm-3" id="contactForm">
                        <div class="bg-success card p-1 mb-1 text-center text-white" id="success" style="display: none;">
                            <p class="mb-0" id="succmsg">success</p>
                        </div>
                        <div class="bg-danger card p-1 mb-1 text-center text-white" id="error" style="display: none;">
                            <p class="mb-0" id="errmsg">success</p>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="test" class="form-control" name="name" placeholder="Name">

                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Your Message or Question</label>
                            <textarea class="form-control" name="message" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-primary text-white  px-5 w-100" onclick="newContact()" id="contactBtn">Submit Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- main section -->



    <?php
    include "includes/footer.php";
    ?>