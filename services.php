<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/newLogo3.png" type="image/png">
    <title>NHMH || Services.</title>
    <link rel="stylesheet" href="sass/app.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark  bg-primary ">
        <div class="container">
            <div class="navbar-brand d-flex align-items-center">
                <a href="#"><img src="images/newLogo3.png" alt="" class="img_size2"></a>
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
                        <a class="nav-link active" href="services">Hospital Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blogs">Hospital Blog</a>
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

    <!-- main section -->
    <section class="bg-white text-dark py-4">
        <div class="container">
            <h4 class="mb-3">OUR HOSPITAL SERVICES</h4>

            <div class="row row-cols-lg-2 row-cols-sm-1 ">
                <div class="card mb-3 bg-light col">
                    <img src="images/doc-preg2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">PREGNANCY CARE</h5>
                        <p class="card-text">Our physicians and nurse practitioners have expertise caring for every type of pregnancy and delivery. Whether routine or high-risk. Our exceptional multidisciplinary team offers leading-edge diagnostic testing and imaging, management, and treatment options to provide the best care for expectant mothers, complex fetal patients and newborns.</p>
                        <button class="btn btn-dark"><a class="text-white" href="contactnhmh.php">Visit NHMH</a></button>
                    </div>
                </div>
                <div class="card mb-3 bg-light col">
                    <img src="images/antenatal.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">ANTENATAL CARE</h5>
                        <p class="card-text">Physicians at NHMH are well trained and equipped with the best of technologies to help access the state of your health and that of your fetus at the early stages. These service also help to detect any complication faster and can be resolved immediately.</p>
                        <button class="btn btn-dark"><a class="text-white" href="contactnhmh.php">Visit NHMH</a></button>
                    </div>
                </div>
                <div class="card mb-3 bg-light col">
                    <img src="images/post.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">POSTNATAL CARE</h5>
                        <p class="card-text">After labour and delivery. We have dedicated team to properly care for you and your baby and attend to any issues and complications after labour. These includes all forms of immunization and proper physical health hygiene.</p>
                        <button class="btn btn-dark"><a class="text-white" href="contactnhmh.php">Visit NHMH</a></button>
                    </div>
                </div>
                <div class="card mb-3 bg-light col">
                    <img src="images/labour.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">LABOUR AND DELIVERY</h5>
                        <p class="card-text">Our team at NHMH will provide you and your baby with nurturing care and an extraordinary birth experience. While your family prepare for your new baby.</p>
                        <button class="btn btn-dark"><a class="text-white" href="contactnhmh.php">Visit NHMH</a></button>
                    </div>
                </div>
                <div class="card mb-3 bg-light col">
                    <img src="images/ultra.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">ULTRASOUND SCAN</h5>
                        <p class="card-text">NHMH is equipped with the best ultrasound scanning technologies and well trained physicians that operates them. Best place you can get the first image of your baby.</p>
                        <button class="btn btn-dark"><a class="text-white" href="contactnhmh.php">Visit NHMH</a></button>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- main section -->


    <?php
    include "includes/footer.php";
    ?>