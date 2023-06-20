<?php
include "includes/headerDash.php";
include "includes/nurseStats.php";
include "includes/messaging.php";

?>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow position-fixed fixed-top">
        <div class="container">
            <div class="navbar-brand d-grid">
                <a href="#"><img src="images/newLogo3.png" alt="" class=" img_size"></a>
            </div>

            <div class="profile_detail d-flex align-items-center justify-content-between text-white">
                <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="d-flex align-items-center me-4">
                        <span class="material-icons-sharp cursor" title="Notifications" onclick="show('dashbody_7','btn7');">
                            notifications
                        </span>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="photo bg-black rounded-circle overflow-hidden" id="userphoto">
                            <img src="<?= $staff_photo ?>" alt="" class="img_size">
                        </div>
                        <div class="dropdown me-3">
                            <a class="text-white dropdown-toggle" role="button" data-bs-toggle="dropdown">
                            </a>
                            <ul class="dropdown-menu px-2">
                                <li class="d-flex align-items-center">
                                    <span class="material-icons-sharp">
                                        person
                                    </span>
                                    <a class="dropdown-item cursor" data-bs-toggle="modal" data-bs-target="#profileEdit">
                                        My Profile
                                    </a>
                                </li>
                                <li class="d-flex align-items-center">
                                    <span class="material-icons-sharp">
                                        logout
                                    </span>
                                    <a class="dropdown-item cursor" href="models/logout.php">
                                        Logout
                                    </a>
                                </li>
                                <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                            </ul>
                        </div>
                        <div class="row">
                            <p class="m-0 p-0 ps-2 name"><?= $staff_info["firstname"] ?> <?= $staff_info["lastname"] ?></p>
                            <small class="position"><?= $staff_info["position"] ?></small>
                        </div>
                    </li>
                </ul>
            </div>


        </div>
    </nav>
    <div class="pad"></div>

    <main>
        <div class="row mx-0">
            <!-- alerts -->
            <!-- alerts -->
            <div aria-live="polite" aria-atomic="true" class="position-relative">
                <!-- Position it: -->
                <!-- - `.toast-container` for spacing between toasts -->
                <!-- - `top-0` & `end-0` to position the toasts in the upper right corner -->
                <!-- - `.p-3` to prevent the toasts from sticking to the edge of the container  -->
                <div class="toast-container top-0 end-0 p-3">
                    <!-- Then put toasts within -->
                    <div class="toast" id="toast1" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <span class="material-icons-sharp rounded me-2 text-danger">
                                warning
                            </span>
                            <strong class="me-auto">Error Message</strong>
                            <small class="text-muted">just now</small>
                            <button type="button" class="btn-close" onclick="closeAlert()"></button>
                        </div>
                        <div class="toast-body bg-danger text-white toast1Msg">
                            .........
                        </div>
                    </div>
                    <div class="toast" id="toast2" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <span class="material-icons-sharp rounded me-2 text-success">
                                warning
                            </span>
                            <strong class="me-auto">Success Message</strong>
                            <small class="text-muted">just now</small>
                            <button type="button" class="btn-close" onclick="closeAlert2()"></button>
                        </div>
                        <div class="toast-body bg-success text-white " id="toast2Msg">
                            ........
                        </div>
                    </div>
                </div>
            </div>
            <!-- alerts -->
            <!-- alerts -->




            <!-- ASIDE -->
            <!-- ASIDE -->
            <aside class="bg-white col d-none d-lg-grid p-3 pt-5">
                <div class="dash_navigation">
                    <ul class="navbar-nav">
                        <li class="nav-item nav_item nav_item2 d-flex align-items-center justify-content-start p-2" onclick="show('dashbody_1','btn1');" id="btn1">
                            <span class="material-icons-sharp text-primary">
                                dashboard
                            </span>
                            <p class="align-self-center my-auto ms-3">Dashboard</p>
                        </li>
                        <li class="nav-item nav_item d-flex align-items-center justify-content-start p-2" onclick="show('dashbody_2','btn2');" id="btn2">
                            <span class="material-icons-sharp text-primary">
                                person_add_alt
                            </span>
                            <p class="align-self-center my-auto ms-3">New Patient</p>
                        </li>
                        <li class="nav-item nav_item d-flex align-items-center justify-content-start p-2" onclick="show('dashbody_3','btn3');" id="btn3">
                            <span class="material-icons-sharp text-primary">
                                note_alt
                            </span>
                            <p class="align-self-center my-auto ms-3">Patient Vitals</p>
                        </li>
                        <li class="nav-item nav_item d-flex align-items-center justify-content-start p-2" onclick="show('dashbody_4','btn4');" id="btn4">
                            <span class="material-icons-sharp text-primary">
                                person_search
                            </span>
                            <p class="align-self-center my-auto ms-3">Find Patient</p>
                        </li>
                        <li class="nav-item nav_item d-flex align-items-center justify-content-start p-2" onclick="show('dashbody_9','btn9');" id="btn9">
                            <span class="material-icons-sharp text-primary">
                                screen_search_desktop
                            </span>
                            <p class="align-self-center my-auto ms-3">Check Payment</p>
                        </li>
                        <li class="nav-item nav_item d-flex align-items-center justify-content-start p-2" onclick="show('dashbody_8','btn8');" id="btn8">
                            <span class="material-icons-sharp text-primary">
                                pageview
                            </span>
                            <p class="align-self-center my-auto ms-3">Medical Records</p>
                        </li>
                        <li class="nav-item nav_item d-flex align-items-center justify-content-start p-2" onclick="show('dashbody_5','btn5');" id="btn5">
                            <span class="material-icons-sharp text-primary">
                                alarm_add
                            </span>
                            <p class="align-self-center my-auto ms-3">Appointments</p>
                        </li>
                        <li class="nav-item nav_item d-flex align-items-center justify-content-start p-2" onclick="show('dashbody_6','btn6');" id="btn6">
                            <span class="material-icons-sharp text-primary">
                                calculate
                            </span>
                            <p class="align-self-center my-auto ms-3">EDD Calculator</p>
                        </li>
                        <li class="nav-item nav_item d-flex align-items-center justify-content-start p-2" onclick="show('dashbody_7','btn7');" id="btn7">
                            <span class="material-icons-sharp text-primary">
                                email
                            </span>
                            <p class="align-self-center my-auto ms-3">Messages <span class="badge badge-pill badge-danger bg-danger">0</span></p>
                        </li>
                    </ul>
                </div>
            </aside>
            <!-- ASIDE -->
            <!-- ASIDE -->

            <!-- CHANGING DASHBOARD -->
            <!-- CHANGING DASHBOARD -->
            <div class="dashbody col-10 p-5 overflow-y-scroll">
                <!-- dash body 1 -->
                <!-- dash body 1 -->
                <div id="dashbody_1" class="page">
                    <div class="body_1">
                        <p>Dashboard Nurse #<span class="staffID"><?= $staff_info['Staff_id'] ?></span></p>
                    </div>
                    <div class="body_2 mb-4">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white">Hospital Stats</h5>
                            <div class="card-body row px-4">
                                <div class="col">
                                    <div class="details d-flex align-items-center">
                                        <span class="material-icons-sharp me-2 span_1 fs-1 text-primary">
                                            reorder
                                        </span>
                                        <div class="details_2">
                                            <small class="mb-5 fw-bold">Today's Appointments</small>
                                            <h4 class="appToday"><?= $sql1_count ?></h4>
                                            <small class="text-muted">last updated: <span class="lupdated1"><?= $today ?></span></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="details d-flex align-items-center">
                                        <span class="material-icons-sharp me-2 span_1 fs-1 text-danger">
                                            reorder
                                        </span>
                                        <div class="details_2">
                                            <small class="mb-5 fw-bold">Available Doctors</small>
                                            <h4 class="docActive"><?= $sql2_count ?></h4>
                                            <small class="text-muted">last updated: <span class="lupdated1"><?= $today ?></span></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="details d-flex align-items-center">
                                        <span class="material-icons-sharp me-2 span_1 fs-1 text-info">
                                            reorder
                                        </span>
                                        <div class="details_2">
                                            <small class="mb-5 fw-bold">Total Patients</small>
                                            <h4 class="noPatient"><?= $sql3_count ?></h4>
                                            <small class="text-muted">last updated: <span class="lupdated1"><?= $today ?></span> </small>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="body_3">
                        <div class="row gap-3">
                            <div class="col-6">
                                <div class="card shadow border-0 rounded-0">
                                    <div class="d-flex card-header align-items-center">
                                        <span class="material-icons-sharp text-primary m-0">
                                            access_alarms
                                        </span>
                                        <h5 class="m-0 mx-3">
                                            Appointments for Today
                                        </h5>

                                        <div class="more_1 bg-primary m-auto d-flex align-items-center gap-2" onclick="show('dashbody_5','btn5');">
                                            <span class="material-icons-sharp text-white">
                                                expand_more
                                            </span>
                                            <small class="text-white">View all</small>
                                        </div>
                                    </div>

                                    <div class="card-body row px-4">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Patient ID</th>
                                                    <th scope="col">Patient</th>
                                                    <th scope="col">Doctor to see</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data-output">
                                                <?php
                                                $i = 1;
                                                while ($result1 = mysqli_fetch_assoc($sql1)) {
                                                    $unique = $result1['patient_id'];

                                                    $sql5 = mysqli_query($conn, "select * from nhmh_patient_db where patient_id = '$unique' ");

                                                    $sql3_array = mysqli_fetch_assoc($sql5);

                                                ?>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td><?= $unique ?></td>
                                                        <td><?= $sql3_array['firstname'] ?> <?= $sql3_array['lastname'] ?></td>
                                                        <td>Doctor <?= $result1['doctor_to_see'] ?></td>
                                                    </tr>
                                                    <?php $i++ ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card shadow border-0 rounded-0">
                                    <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                        <span class="material-icons-sharp text-primary">
                                            supervised_user_circle
                                        </span>
                                        Doctors Active
                                    </h5>
                                    <div class="card-body row px-4">
                                        <table class="table table-hover table-primary">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Doctor</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data-output3">
                                                <?php
                                                $i = 1;
                                                while ($result3 = mysqli_fetch_assoc($sql2a)) {
                                                    $status = $result3['status'];
                                                ?>
                                                    <?php if ($status == 'Active now') { ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td>Doctor <?= $result3['firstname'] ?></td>
                                                            <td><button class="btn btn-success text-white m-0"> <?= $result3['status'] ?></button></td>
                                                        </tr>

                                                    <?php } else { ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td>Doctor <?= $result3['firstname'] ?></td>
                                                            <td><button class="btn btn-danger text-white m-0"> <?= $result3['status'] ?></button></td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php $i++ ?>
                                                <?php } ?>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- dash body 1 -->
                <!-- dash body 1 -->


                <!-- dash body 2 -->
                <!-- dash body 2 -->
                <div id="dashbody_2" class="page" style="display: none;">
                    <div class="body_2 mb-4">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                <span class="material-icons-sharp text-primary">
                                    person_add_alt
                                </span>
                                Confirm Patient Payment
                            </h5>
                            <div class="card-body px-2">
                                <div class="row g-3 px-3">

                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Registration Code [10 digits]</label>
                                        <input type="text" class="form-control" id="inputCode" oninput="verifyRegCode('showStatus')">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Status</label>
                                        <div id="showStatus">
                                            <!-- <button class="btn btn-danger text-white w-100">CODE IS INACTIVE
                                            </button> -->

                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>

                    <div class="body_2 mb-4" id="formtoAdd" style="display: none;">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                <span class="material-icons-sharp text-primary">
                                    person_add_alt
                                </span>
                                Add New Patient Record
                            </h5>
                            <div class="card-body px-2">
                                <form class="row g-3 px-3" id="addPatForm">
                                    <div class="col-md-12 mb-0 text-danger">
                                        <small>Personal Details</small>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputEmail4" class="form-label">Firstname</label>
                                        <input type="text" class="form-control" name="fname">
                                        <input type="hidden" class="form-control" name="regCode" id="regCode">
                                        <input type="hidden" class="form-control" name="nurse_id" value="<?= $staff_info['Staff_id'] ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputEmail4" class="form-label">Lastname</label>
                                        <input type="text" class="form-control" name="lname">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputEmail4" class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputEmail4" class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email">
                                    </div>
                                    <div class="col">
                                        <label for="inputEmail4" class="form-label">Address</label>
                                        <input type="text" class="form-control" name="address">
                                    </div>
                                    <div class="col-md-12 mb-0 text-danger">
                                        <small>Medical Details</small>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="inputEmail4" class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" id="inputEmail4" name="dob">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputState" class="form-label">Genotype</label>
                                        <select id="inputState" class="form-select" name="genotype">
                                            <option value="">Choose Genotype</option>
                                            <option value="AA"> AA </option>
                                            <option value="AS"> AS </option>
                                            <option value="AC"> AC </option>
                                            <option value="SS"> SS </option>
                                            <option value="SC"> SC </option>

                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputState" class="form-label">Blood Group</label>
                                        <select id="inputState" class="form-select" name="bgroup">
                                            <option value="">Choose Blood Group</option>
                                            <option value="A+"> A+ </option>
                                            <option value="A-"> A- </option>
                                            <option value="B+"> B+ </option>
                                            <option value="B-"> B- </option>
                                            <option value="AB+"> AB+ </option>
                                            <option value="AB-"> AB- </option>
                                            <option value="O+"> O+ </option>
                                            <option value="O-"> O- </option>

                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="inputState" class="form-label">Number of Children</label>
                                        <input type="text" class="form-control" name="children">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="inputEmail4" class="form-label">Height[cm]</label>
                                        <input type="text" class="form-control" name="height">
                                    </div>


                                    <div class="col-md-12 mb-0 text-danger">
                                        <small>Next of Kin Details</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="nokname">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="nokphone">
                                    </div>

                                    <div class="col-md-5">
                                        <label for="inputEmail4" class="form-label">Relationship</label>
                                        <select id="inputState" class="form-select" name="nokrel">
                                            <option value="">Choose next of kin relationship with patient.....</option>
                                            <option value="Husband">Husband</option>
                                            <option value="Father">Father</option>
                                            <option value="Brother">Brother</option>
                                            <option value="Sister">Sister</option>
                                            <option value="Son">Son</option>
                                            <option value="Daughter">Daughter</option>
                                            <option value="Others">Other relations</option>
                                        </select>
                                    </div>
                                    <div class="col-md-7">
                                        <label for="inputEmail4" class="form-label">Address</label>
                                        <input type="text" class="form-control" name="nokaddress">
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary text-white w-100" id="addPatBtn" onclick="addPat()">Save Record
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="body_2 mb-4" style="display: none;" id="verifyOtp">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                <span class="material-icons-sharp text-primary">
                                    person_add_alt
                                </span>
                                Verify Patient Email
                            </h5>
                            <small class="text-success mx-3">A code has been sent to Patients' email which contains a code for verification</small>
                            <div class="card-body px-2">

                                <form class="row g-3 px-3 border">
                                    <div class="col-md-3 m-auto">
                                        <label for="inputEmail4" class="form-label">Verification Code</label>
                                        <input type="text" class="form-control" id="inpOTP">
                                    </div>
                                    <div class="d-flex justify-content-around">
                                        <div class="ms-auto me-2 text-center">
                                            <button type="button" class="btn btn-primary text-white w-100" id="addPatBtn" onclick="resend()">Check Email
                                            </button>
                                        </div>
                                        <div class="me-auto ms-2 text-center">
                                            <button type="button" class="btn btn-primary text-white w-100" id="addPatBtn" onclick="validateOtp()">Validate Code
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- dash body 2 -->
                <!-- dash body 2 -->


                <!-- dash body 3 -->
                <!-- dash body 3 -->
                <div id="dashbody_3" class="page" style="display: none;">
                    <div class="body_2 mb-4">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                <span class="material-icons-sharp text-primary">
                                    note_alt
                                </span>
                                Record Patient Vitals
                            </h5>
                            <div class="card-body px-2">
                                <form class="row g-3 px-3" id="addVital">
                                    <div class="col-md-12">
                                        <label for="inputState" class="form-label">Input Patient ID or Name</label>
                                        <div class="input-group mb-0">
                                            <input type="text" class="form-control" placeholder="Patient's ID" name="pid">
                                            <!-- <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button> -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputState" class="form-label">Body Temperature[&#8451;]</label>
                                        <select id="inputState" class="form-select" name="temp">
                                            <option value="">Choose temperature range</option>
                                            <option value="Low (less than 35.8)">Low (less than 35.8)</option>
                                            <option value="Normal (between 35.8 - 37.0)">Normal (between 35.8 - 37.0)</option>
                                            <option value="Moderate High (between 37.1 - 38.0)">Moderately High (between 37.1 - 38.0)</option>
                                            <option value="High (between 38.1 - 42.0)">High (between 38.1 - 42.0)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputState" class="form-label">Blood Pressure</label>
                                        <select id="inputState" class="form-select" name="bpressure">
                                            <option value="">Choose Blood pressure range</option>
                                            <option value="Low (less than 90 / 60)">Low (less than 90 / 60)</option>
                                            <option value="Normal (120/80)">Normal (120-91 / 80-61)</option>
                                            <option value="Elevated(120-129 / 80-61)">Elevated (120-129 / 80-61)</option>
                                            <option value="High Blood Pressure(greater than 130 / greater than 80)">High Blood Pressure(greater than 130 / greater
                                                than 80)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputState" class="form-label">Pulse Rate</label>
                                        <select id="inputState" class="form-select" name="pulse">
                                            <option value="">Choose Pulse rate range</option>
                                            <option value="Low (less than 60 beats per minute)">Low (less than 60 beats per minute)</option>
                                            <option value="Normal (between 60 - 100 beats per minute)">Normal (between 60 - 100 beats per minute)</option>
                                            <option value="High ( above 100 beats per minute)">High ( above 100 beats per minute)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputEmail4" class="form-label">Weight[KG]</label>
                                        <input type="text" class="form-control" name="weight">
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary text-white w-100" id="addVitalBtn" onclick="addVital()">Record Patient Vitals

                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- dash body 3 -->
                <!-- dash body 3 -->

                <!-- dash body 4 -->
                <!-- dash body 4 -->
                <div id="dashbody_4" class="page" style="display: none;">
                    <div class="body_2 mb-4">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                <span class="material-icons-sharp text-primary">
                                    search
                                </span>
                                Find Patient
                            </h5>
                            <div class="card-body px-2">
                                <form class="row g-3 px-3" id="patInp">
                                    <div class="col-md-12">
                                        <label for="inputState" class="form-label">Input Patient ID or Name</label>
                                        <div class="input-group mb-0">
                                            <input type="text" class="form-control" placeholder="Patient's ID" name="patient_id" id="pat">
                                            <button class="btn btn-outline-primary" type="submit" id="searchpat" onclick="searchPat('searchpat')">Search
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="resultPat1" style="display: none;">
                        <div class="body_2 mb-2">
                            <div class="card shadow border-0 rounded-0">
                                <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                    <span class="material-icons-sharp text-primary">
                                        person
                                    </span>
                                    Patient Personal Data
                                </h5>
                                <div class="card-body px-4">
                                    <div class="patient_img text-center border mb-2 out1">
                                        <img src="images/b1.png" class="img_size2">
                                    </div>
                                    <form class="row g-3 px-3">
                                        <div class="col-md-4">
                                            <label for="inputEmail4" class="form-label">Patient ID</label>
                                            <input type="text" class="form-control out2" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputEmail4" class="form-label">Patient EDD</label>
                                            <input type="text" class="form-control out3" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputEmail4" class="form-label">Full Name</label>
                                            <input type="text" class="form-control out4" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputEmail4" class="form-label">Email Address</label>
                                            <input type="text" class="form-control out5" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputEmail4" class="form-label">Phone Number</label>
                                            <input type="text" class="form-control out6" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputEmail4" class="form-label">House Address</label>
                                            <input type="text" class="form-control out7" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputEmail4" class="form-label">Next of Kin Name</label>
                                            <input type="text" class="form-control out8" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputEmail4" class="form-label">Next of Kin Phone Number</label>
                                            <input type="text" class="form-control out10" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputEmail4" class="form-label">Next of Kin House Address</label>
                                            <input type="text" class="form-control out11" readonly>
                                        </div>
                                        <!-- <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary text-white w-100">Update Patient Profile
                                                <div class="spinner-border text-light" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            </button>
                                        </div> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="body_2 mb-2">
                            <div class="card shadow border-0 rounded-0">
                                <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                    <span class="material-icons-sharp text-primary">
                                        person
                                    </span>
                                    Patient Medical Data
                                </h5>
                                <div class="card-body px-4">
                                    <form class="row g-3 px-3">
                                        <div class="col-md-2">
                                            <label for="inputEmail4" class="form-label">Patient Age[y/o]</label>
                                            <input type="text" class="form-control out12" readonly>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="inputEmail4" class="form-label">Patient Blood Group</label>
                                            <input type="text" class="form-control out13" readonly>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="inputEmail4" class="form-label">Patient Genotype</label>
                                            <input type="text" class="form-control out14" readonly>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="inputEmail4" class="form-label">Patient Height[cm]</label>
                                            <input type="text" class="form-control out15" readonly>
                                        </div>
                                        <div class="col">
                                            <label for="inputEmail4" class="form-label">Patient Number of Children</label>
                                            <input type="text" class="form-control out16" readonly>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="body_2 mb-2">
                            <div class="card shadow border-0 rounded-0">
                                <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                    <span class="material-icons-sharp text-primary">
                                        person
                                    </span>
                                    Patient Updated Vitals
                                </h5>
                                <div class="card-body px-4">
                                    <form class="row g-3 px-3">
                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Patient Temperature[&#8451;]</label>
                                            <input type="text" class="form-control out17" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Patient Blood Pressure</label>
                                            <input type="text" class="form-control out18" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Patient Weight[KG]</label>
                                            <input type="text" class="form-control out19" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Patient Pulse Rate</label>
                                            <input type="text" class="form-control out20" readonly>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- dash body 4 -->
                <!-- dash body 4 -->

                <!-- dash body 3 -->
                <!-- dash body 3 -->
                <div id="dashbody_8" class="page" style="display: none;">
                    <div class="body_2 mb-4">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                <span class="material-icons-sharp text-primary">
                                    search
                                </span>
                                Find Patient Medical Record
                            </h5>
                            <div class="card-body px-2">
                                <form class="row g-3 px-3" id="getMedfrm">
                                    <div class="col-md-12">
                                        <label for="inputState" class="form-label">Input Patient ID</label>
                                        <div class="input-group mb-0">
                                            <input type="text" class="form-control" placeholder="Patient's ID" name="patient_id">
                                            <button class="btn btn-outline-secondary" type="submit" id="medBtn" onclick="searchMedPat('medBtn')">Search

                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="body_2 mb-4" id="medPat1" style="display: none;">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                <span class="material-icons-sharp text-primary">
                                    pageview
                                </span>
                                Patient Medical Records
                            </h5>
                            <div class="card-body" id="medDataOut">


                            </div>
                        </div>
                    </div>
                </div>

                <!-- dash body 3 -->
                <!-- dash body 3 -->

                <!-- dash body 5 -->
                <!-- dash body 5 -->
                <div id="dashbody_5" class="page" style="display: none;">
                    <div class="body_2 mb-4">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                <span class="material-icons-sharp text-primary">
                                    dashboard
                                </span>
                                All Appointments Set for Today
                            </h5>
                            <div class="card-body px-2">
                                <table class="table table-hover table-primary">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Patient ID</th>
                                            <th scope="col">Patient Name</th>
                                            <th scope="col">Doctor to See</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Purpose of Appointment</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data-output2">
                                        <?php
                                        $i = 1;
                                        while ($result2 = mysqli_fetch_assoc($sql1a)) {
                                            $unique = $result2['patient_id'];

                                            $sql5 = mysqli_query($conn, "select * from nhmh_patient_db where patient_id = '$unique' ");

                                            $sql3_array = mysqli_fetch_assoc($sql5);

                                        ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $unique ?></td>
                                                <td><?= $sql3_array['firstname'] ?> <?= $sql3_array['lastname'] ?></td>
                                                <td>Doctor <?= $result2['doctor_to_see'] ?></td>
                                                <td><?= $result2['app_time'] ?></td>
                                                <td><?= $result2['app_date'] ?></td>
                                                <td><?= $result2['purpose'] ?></td>
                                            </tr>
                                            <?php $i++ ?>
                                        <?php } ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- dash body 5 -->
                <!-- dash body 5 -->


                <!-- dash body 6 -->
                <!-- dash body 6 -->
                <div id="dashbody_6" class="page" style="display: none;">
                    <div class="body_2 mb-4">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                <span class="material-icons-sharp text-primary">
                                    dashboard
                                </span>
                                Calculate the Estimated Delivery Date of Patient
                            </h5>
                            <div class="card-body px-5">
                                <form class="row g-3 bg-light pt-4 shadow pb-4 px-3" id="eddForm">
                                    <div class="col-md-12">
                                        <label for="inputState" class="form-label">Input Patient ID to record her EDD</label>
                                        <div class="input-group mb-0">
                                            <input type="text" class="form-control" placeholder="Patient's ID" name="patient">
                                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">First Day of Last Menstrual Period</label>
                                        <input type="date" class="form-control" name="lmp" onchange="eddCalculate()">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Date of Conception </label>
                                        <input type="text" class="form-control eddOut1" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Gestational Age</label>
                                        <input type="text" class="form-control eddOut2" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Estimated Due Date</label>
                                        <input type="text" class="form-control eddOut3" readonly name="edd">
                                    </div>

                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary text-white w-100" id="addEddBtn" onclick="addEdd()">Record EDD for Patient
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- dash body 6 -->
                <!-- dash body 6 -->


                <!-- dash body 7 -->
                <!-- dash body 7 -->
                <div id="dashbody_7" class="page" style="display: none;">
                    <div class="body_2 mb-4">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                <span class="material-icons-sharp text-primary">
                                    dashboard
                                </span>
                                NHMH Messaging software
                            </h5>
                            <div class="card-body px-4">
                                <div class="row">
                                    <div class="col-4">
                                        <h3>Chats</h3>
                                        <div class="card-body bg-light rounded-3 p-1 d-flex align-items-center">
                                            <span class="material-icons-sharp text-primary me-2">
                                                search
                                            </span>
                                            <input type="text" class="form-control bg-light text-primary border-0" id="searchUsers" placeholder="Search Users...." value="">
                                        </div>

                                        <div class="users mt-2">
                                            <?php while ($mresult10 = mysqli_fetch_assoc($msql10)) {

                                                $outgoing_id = $staff_info['unique_id'];

                                                $msql11 = mysqli_query($conn, "SELECT * FROM nhmh_internal_messages_db WHERE (incoming_msg_id = {$mresult10['unique_id']}
                OR outgoing_msg_id = {$mresult10['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1");

                                                $row11 = mysqli_fetch_assoc($msql11);

                                                (mysqli_num_rows($msql11) > 0) ? $result = $row11['message'] : $result = "No message available";
                                                (strlen($result) > 20) ? $msg =  substr($result, 0, 20) . '...' : $msg = $result;

                                                if (isset($row11['outgoing_msg_id'])) {
                                                    ($outgoing_id == $row11['outgoing_msg_id']) ? $you = "You: " : $you = "";
                                                } else {
                                                    $you = "";
                                                }

                                            ?>
                                                <div class="card-body d-flex align-items-start gap-2 border-bottom cursor" data-userMsgId="<?= $mresult10['unique_id'] ?>">
                                                    <form action="" id="messageForm">
                                                        <input type="hidden" name="incoming_id" id="incoming_id">
                                                        <input type="hidden" name="outgoing_id" value="<?= $staff_info['unique_id'] ?>">
                                                    </form>

                                                    <img src="images/staff<?= $mresult10['photo'] ?>" alt="" class="bg-primary img_wrap rounded">
                                                    <div class="row">
                                                        <div class="d-flex align-items-center mb-0 col-12 ">
                                                            <h6><?= $mresult10['position'] ?> <?= $mresult10['firstname'] ?></h6>
                                                            <!-- <small class="text-muted mx-auto">09:24</small> -->
                                                        </div>
                                                        <small class="col-12"><?= $you . $msg ?></small>
                                                    </div>
                                                    <?php if (($mresult10['status']) == "Offline now") { ?>
                                                        <span class="badge badge-pill badge-danger bg-light">0</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-pill badge-danger bg-success">0</span>
                                                    <?php } ?>

                                                </div>
                                            <?php } ?>


                                        </div>
                                    </div>
                                    <div class="col-8 bg-light p-2">

                                        <div class="card-body bg-white" id="msgUI1" style="display: none;">
                                            <div class="card-header d-flex bg-white gap-4">
                                                <span class="material-icons-sharp cursor" onclick="closeMsg()">
                                                    clear
                                                </span>
                                                <img src="" id="msgUIimg" class="bg-primary img_size">
                                                <div class=" mb-0">
                                                    <h6 id="msgUIname">Doctor Olamide</h6>
                                                    <small class="text-muted mx-auto" id="msgUIstatus">Active now</small>
                                                </div>

                                            </div>
                                            <div class="card-body bg-light msg-body d-fl" id="msg_blank">


                                            </div>
                                            <div class="card-body bg-white ">
                                                <form class="d-flex align-items-center" id="sendMessage">
                                                    <input type="hidden" name="incoming" id="incoming_id1">
                                                    <input type="hidden" name="outgoing" value="<?= $staff_info['unique_id'] ?>">
                                                    <input type="text" class="form-control bg-light border-0" id="send" placeholder="Send Message" name="message">
                                                    <button type="submit" class="btn btn-primary" onclick="insertChat()">
                                                        <span class="material-icons-sharp text-white ">
                                                            send
                                                        </span>
                                                    </button>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- dash body 7 -->
                <!-- dash body 7 -->

                <!-- dash body 9 -->
                <!-- dash body 9 -->
                <div id="dashbody_9" class="page" style="display: none;">
                    <div class="body_2 mb-4">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                <span class="material-icons-sharp text-primary">
                                    screen_search_desktop
                                </span>
                                Find Patient Payment Transaction
                            </h5>
                            <div class="card-body px-2">
                                <form class="row g-3 px-3" id="transForm">
                                    <div class="col-md-12">
                                        <label for="inputState" class="form-label">Input Transaction ID</label>
                                        <div class="input-group mb-0">
                                            <input type="text" class="form-control" placeholder="Transaction ID" name="trans_id">
                                            <button class="btn btn-outline-secondary" type="submit" id="transBtn" onclick="searchTransact()">Search
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div style="display: none;" id="showTransacts">
                        <!-- <div class="body_2 mb-4">
                            <div class="card shadow border-0 rounded-0">
                                <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                    <span class="material-icons-sharp text-primary">
                                        account_balance_wallet
                                    </span>
                                    Clinic Finance Profile of Patient <span class="transDetail"></span>
                                </h5>
                                <div class="card-body row row-cols-3 px-4 row-gap-3">
                                    <div class="col">
                                        <div class="details d-flex align-items-center">
                                            <span class="material-icons-sharp me-2 span_1 fs-1 text-primary">
                                                account_balance_wallet
                                            </span>
                                            <div class="details_2">
                                                <small class="mb-5">Total Deposit</small>
                                                <h4 class="deposit">12,000</h4>
                                                <small class="text-muted">last updated: <?= $today ?></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="details d-flex align-items-center">
                                            <span class="material-icons-sharp me-2 span_1 fs-1 text-primary">
                                                account_balance_wallet
                                            </span>
                                            <div class="details_2">
                                                <small class="mb-5">Total Debt</small>
                                                <h4 class="debt">50,000</h4>
                                                <small class="text-muted">last updated: <?= $today ?></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="details d-flex align-items-center" id="downloadBtn">


                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div> -->

                        <div class="body_2 mb-4">
                            <div class="card shadow border-0 rounded-0">
                                <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                    <span class="material-icons-sharp text-primary">
                                        receipt_long
                                    </span>
                                    Transaction report of <span id="patName"></span>
                                </h5>
                                <div class="card-body row row-cols-3 px-4">
                                    <table class="table table-hover table-primary">
                                        <thead>
                                            <tr>

                                                <th scope="col">Transaction ID</th>
                                                <th scope="col">Service</th>
                                                <th scope="col">Amount Paid</th>
                                                <th scope="col">Amount Remaining</th>
                                                <th scope="col">Transaction Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="transacts">



                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- dash body 9 -->
                <!-- dash body 9 -->
            </div>
        </div>
    </main>




    <!-- Modal for dash profile-->
    <!-- Modal for dash profile-->
    <div class="modal fade" id="profileEdit" tabindex="-1" aria-labelledby="signinLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="signinLabel">Nurse Profile</h1>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"><small>You can edit your profile</small>
                    <form action="" id="updateProfile">
                        <!-- <div class="bg-success card p-1 mb-1 text-center">
                                    <p class="mb-0">success</p>
                                </div>
                                <div class="bg-danger card p-1 mb-1 text-center">
                                    <p class="mb-0">success</p>
                                </div> -->
                        <div class="bg-danger card p-1 mb-1 text-center errMsg text-white" style="display: none;">
                            <p class="mb-0">success</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">First Name</label>
                                <input type="text" class="form-control inp1" name="first_name" value="<?= $staff_info['firstname'] ?>">
                                <input type="hidden" name="user_id" id="hideID" value="<?= $staff_info['unique_id'] ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Last Name</label>
                                <input type="text" class="form-control inp2" name="last_name" value="<?= $staff_info['lastname'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="text" class="form-control inp3" name="email" value="<?= $staff_info['email'] ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Phone</label>
                                <input type="text" class="form-control inp4" name="phone" value="<?= $staff_info['phone'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="inputEmail4" class="form-label">Address</label>
                                <textarea class="form-control inp5" name="address" id="exampleFormControlTextarea1" rows="3" readonly><?= $staff_info['address'] ?></textarea>
                            </div>
                        </div>
                        <div class="row mt-2 border-top p-2 pb-2">
                            <small class="text-danger">You can change your picture</small>
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="inputGroupFile02" name="profile_photo">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-primary text-white  px-5 w-100" onclick="updateProfiles('updateBtn')" id="updateBtn">Save
                                Changes
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
    <script src="javascript/inactivity.js"></script>
    <script src="javascript/nurseOpr.js"></script>
    <script src="javascript/updateStaff.js"></script>
    <script src="javascript/getMessages.js"></script>

    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="javascript/navigate.js"></script>
</body>

</html>