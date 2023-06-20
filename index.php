<?php
include 'includes/header.php';
?>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark  bg-primary nav_border py-0">
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
                        <a class="nav-link" href="services">Hospital Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blogs">Hospital Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactnhmh">Contact Hospital</a>
                    </li>
                </ul>
                <button class="btn btn-dark btn-md ms-4 text-white" data-bs-toggle="modal" data-bs-target="#signin">Sign In</button>
            </div>
        </div>
    </nav>

    <!-- hero section -->
    <section class="bg-primary text-center text-light p-5 text-sm-start">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div>
                    <h1>Pregnant women choose us.</h1>
                    <p class="lead my-4">New Horizon Maternity Hospital is the best choice for pregnant women.</p>
                    <a href="contactnhmh.php"><button class="btn btn-dark btn-lg">Contact Us</button></a>
                </div>
                <img src="images/undraw_medicine_b-1-ol.svg" alt="" class="img-fluid w-50 d-none d-md-block">

            </div>

        </div>
    </section>
    <!-- hero section -->

    <!-- Modal -->
    <div class="modal fade" id="signin" tabindex="-1" aria-labelledby="signinLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-light text-dark">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="signinLabel">Sign In Form</h1>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="loginForm">
                        <!-- <div class="bg-success card p-1 mb-1 text-center">
                            <p class="mb-0">success</p>
                        </div>-->
                        <div class="bg-danger card p-1 mb-1 text-center text-white errMsg" style="display: none;">
                            <p class="mb-0">success</p>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="test" class="form-control" name="username" id="username" placeholder="Username">
                            <!-- <div class="invalid-feedback">Please enter your username</div> -->
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            <!-- <div class="invalid-feedback">Please enter your password</div> -->
                        </div>
                        <div class="modal-footer justify-content-center">
                            <!-- <div class="spinner-border text-light loader bg-danger" role="status" >
                                <span class="visually-hidden">Loading...</span>
                            </div> -->
                            <button type="submit" class="btn btn-primary text-white  px-5 w-100" id="submit" name="submit">Sign in

                            </button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>


    <?php
    include "includes/footer.php";
    ?>