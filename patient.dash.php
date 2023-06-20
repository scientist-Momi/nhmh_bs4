<?php
include "includes/headerDash.php";
include "includes/patientStats.php";
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
                        <span class="material-icons-sharp cursor" title="Notifications" onclick="show('dashbody_6','btn6');">
                            notifications
                        </span>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="photo bg-black rounded-circle overflow-hidden" id="userphoto"><img src="images/b1.png" alt="" class="img_size"></div>
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
                            <p class="m-0 p-0 ps-2 name"><?= $patient_info['firstname'] ?> <?= $patient_info['lastname'] ?></p>
                            <small class="position">Patient</small>
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
                            See? Just like this.
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
                        <div class="toast-body bg-success text-white" id="toast2Msg">
                            See? Just like this.
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
                                monitor_heart
                            </span>
                            <p class="align-self-center my-auto ms-3">Medical Profile</p>
                        </li>
                        <li class="nav-item nav_item d-flex align-items-center justify-content-start p-2" onclick="show('dashbody_3','btn3');" id="btn3">
                            <span class="material-icons-sharp text-primary">
                                assignment
                            </span>
                            <p class="align-self-center my-auto ms-3">Medical Records</p>
                        </li>
                        <li class="nav-item nav_item d-flex align-items-center justify-content-start p-2" onclick="show('dashbody_4','btn4');" id="btn4">
                            <span class="material-icons-sharp text-primary">
                                account_balance_wallet
                            </span>
                            <p class="align-self-center my-auto ms-3">Finance</p>
                        </li>
                        <li class="nav-item nav_item d-flex align-items-center justify-content-start p-2" onclick="show('dashbody_5','btn5');" id="btn5">
                            <span class="material-icons-sharp text-primary">
                                alarm_add
                            </span>
                            <p class="align-self-center my-auto ms-3">New Appointment</p>
                        </li>
                        <!-- <li class="nav-item nav_item d-flex align-items-center justify-content-start p-2" onclick="show('dashbody_6','btn6');" id="btn6">
                            <span class="material-icons-sharp text-primary">
                                notifications
                            </span>
                            <p class="align-self-center my-auto ms-3">Notification</p>
                        </li> -->
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
                        <p>Dashboard Patient #<span class="patID"><?= $patient_info['patient_id'] ?></span> </p>
                    </div>
                    <div class="body_2 mb-4">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white">Personal Data</h5>
                            <div class="card-body row px-4">
                                <div class="col">
                                    <div class="details d-flex align-items-center">
                                        <span class="material-icons-sharp me-2 span_1 fs-1 text-primary">
                                            reorder
                                        </span>
                                        <div class="details_2">
                                            <small class="mb-5 fw-bold">Estimated Delivery Date</small>
                                            <h4 class="edd"><?= $patient_info['edd_date'] ?></h4>
                                            <small class="text-muted">last updated: <?= $today ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="details d-flex align-items-center">
                                        <span class="material-icons-sharp me-2 span_1 fs-1 text-danger">
                                            reorder
                                        </span>
                                        <div class="details_2">
                                            <small class="mb-5 fw-bold">Age[y/o]</small>
                                            <h4 class="age"><?= $patient_info['age'] ?></h4>
                                            <small class="text-muted">last updated: <?= $today ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="details d-flex align-items-center">
                                        <span class="material-icons-sharp me-2 span_1 fs-1 text-info">
                                            reorder
                                        </span>
                                        <div class="details_2">
                                            <small class="mb-5 fw-bold">Height[cm]</small>
                                            <h4 class="height"><?= $patient_info['height'] ?></h4>
                                            <small class="text-muted">last updated: <?= $today ?></small>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer text-muted bg-white text-center justify-content-center">
                                <div class="more_1 bg-primary m-auto d-flex align-items-center gap-2" onclick="show('dashbody_2','btn2');">
                                    <span class="material-icons-sharp text-white">
                                        expand_more
                                    </span>
                                    <small class="text-white">View all</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="body_3">
                        <div class="row gap-3">
                            <div class="col-7">
                                <div class="card shadow border-0 rounded-0">
                                    <h5 class="card-header bg-white d-flex align-items-center gap-2">
                                        <span class="material-icons-sharp text-primary">
                                            access_alarms
                                        </span>
                                        Your Clinical Appointments
                                    </h5>
                                    <div class="card-body row px-4">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Doctor</th>
                                                    <th scope="col">Time</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                while ($result = mysqli_fetch_assoc($sql5)) {

                                                ?>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td>Doctor <?= $result['doctor_to_see'] ?></td>
                                                        <td><?= $result['app_time'] ?></td>
                                                        <td><?= $result['app_date'] ?></td>
                                                        <td><button class="btn btn-danger delete-btn" data-id="<?= $result['id'] ?>">Cancel</button></td>
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
                                            event_available
                                        </span>
                                        Your Last Appointments
                                    </h5>
                                    <div class="card-body row px-4">
                                        <table class="table table-hover table-primary">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Doctor seen</th>
                                                    <th scope="col">Reason</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                while ($result1 = mysqli_fetch_assoc($sql55)) {

                                                ?>
                                                    <tr>

                                                        <td><?= $result1['app_date'] ?></td>
                                                        <td>Doctor <?= $result1['doctor_to_see'] ?></td>

                                                        <td><?= $result1['purpose'] ?></td>

                                                    </tr>

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
                    <div class="body_1">
                        <p>Medical Profile</p>
                    </div>
                    <div class="body_2 mb-4">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                <span class="material-icons-sharp text-primary">
                                    dashboard
                                </span>
                                Your Medical Profile
                            </h5>
                            <div class="card-body row row-cols-3 px-4 row-gap-3">
                                <div class="col border-bottom">
                                    <div class="details d-flex align-items-center">
                                        <span class="material-icons-sharp me-2 span_1 fs-1 text-primary">
                                            reorder
                                        </span>
                                        <div class="details_2">
                                            <small class="mb-5">Genotype</small>
                                            <h4 class="gene"><?= $patient_info['genotype'] ?></h4>
                                            <small class="text-muted">last updated: <?= $today ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col border-bottom">
                                    <div class="details d-flex align-items-center">
                                        <span class="material-icons-sharp me-2 span_1 fs-1 text-primary">
                                            reorder
                                        </span>
                                        <div class="details_2">
                                            <small class="mb-5">Blood Group</small>
                                            <h4 class="blood"><?= $patient_info['bgroup'] ?></h4>
                                            <small class="text-muted">last updated: <?= $today ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col border-bottom">
                                    <div class="details d-flex align-items-center">
                                        <span class="material-icons-sharp me-2 span_1 fs-1 text-primary">
                                            reorder
                                        </span>
                                        <div class="details_2">
                                            <small class="mb-5">Number of Children</small>
                                            <h4 class="child"><?= $patient_info['children'] ?></h4>
                                            <small class="text-muted">last updated: <?= $today ?></small>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="body_2 mb-4">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                <span class="material-icons-sharp text-primary">
                                    dashboard
                                </span>
                                Your Latest Vitals
                            </h5>
                            <div class="card-body row row-cols-3 px-4 row-gap-3">
                                <div class="col border-bottom">
                                    <div class="details d-flex align-items-center">
                                        <span class="material-icons-sharp me-2 span_1 fs-1 text-danger">
                                            reorder
                                        </span>
                                        <div class="details_2">
                                            <small class="mb-5">Weight[kg]</small>
                                            <h4 class="weight"><?= $vital_info['weight'] ?></h4>
                                            <small class="text-muted">last updated: <?= $vital_info['date'] ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col border-bottom">
                                    <div class="details d-flex align-items-center">
                                        <span class="material-icons-sharp me-2 span_1 fs-1 text-danger">
                                            reorder
                                        </span>
                                        <div class="details_2">
                                            <small class="mb-5">Blood Pressure</small>
                                            <h4 class="pressure"><?= $vital_info['blood_pressure'] ?></h4>
                                            <small class="text-muted">last updated: <?= $vital_info['date'] ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col border-bottom">
                                    <div class="details d-flex align-items-center">
                                        <span class="material-icons-sharp me-2 span_1 fs-1 text-danger">
                                            reorder
                                        </span>
                                        <div class="details_2">
                                            <small class="mb-5">Temperature[&#8451;]</small>
                                            <h4 class="temperature"><?= $vital_info['temperature'] ?></h4>
                                            <small class="text-muted">last updated: <?= $vital_info['date'] ?></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="col border-bottom">
                                    <div class="details d-flex align-items-center">
                                        <span class="material-icons-sharp me-2 span_1 fs-1 text-danger">
                                            reorder
                                        </span>
                                        <div class="details_2">
                                            <small class="mb-5">Pulse</small>
                                            <h4 class="pulse"><?= $vital_info['pulse'] ?></h4>
                                            <small class="text-muted">last updated: <?= $vital_info['date'] ?></small>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- dash body 2 -->
                <!-- dash body 2 -->

                <!-- dash body 3 -->
                <!-- dash body 3 -->
                <div id="dashbody_3" class="page" style="display: none;">
                    <div class="body_1">
                        <p>Medical Records</p>
                    </div>
                    <!-- <div class="body_2 mb-2">
                        <div class="card shadow border-0 rounded-0">
                            <p class="card-header bg-white  d-flex align-items-center gap-2">
                                Search for specific record
                            </p>

                            <div class="card-body row">
                                <div class="input-group">
                                    <input type="date" class="col-2">
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="body_2 mb-4">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                <span class="material-icons-sharp text-primary">
                                    dashboard
                                </span>
                                Your Medical Records
                            </h5>
                            <div class="card-body">

                                <?= $output1 ?>

                                <?php while ($result4 = mysqli_fetch_assoc($sql4)) { ?>
                                    <?php
                                    $unique = $result4['unique_id'];

                                    $sql9 = mysqli_query($conn, "select * from nhmh_record_images_db where unique_id = '$unique' ");
                                    ?>
                                    <div class="card bg-light rounded-0 border-0 p-2 px-3 shadow mb-3">
                                        <div class="row">
                                            <div class="col">
                                                <label for="exampleFormControlInput1" class="form-label">Record Number</label>
                                                <input type="text" class="form-control" readonly value="<?= $result4['id'] ?>">
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" class="form-label">Patient ID</label>
                                                <input type="text" class="form-control" readonly value="<?= $result4['patient_id'] ?>">
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" class="form-label">Doctor</label>
                                                <input type="text" class="form-control" readonly value="<?= $result4['attending_doctor'] ?>">
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" class="form-label">Date</label>
                                                <input type="text" class="form-control" readonly value="<?= $result4['date'] ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col">
                                                <label for="exampleFormControlInput1" class="form-label">Diagnosis/Observation</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly><?= $result4['diagnosis'] ?></textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" class="form-label">Prescription/Advice</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly><?= $result4['instruction'] ?></textarea>
                                            </div>
                                        </div>

                                        <div class="row row-cols-4 row-gap-1 px-3">
                                            <?php while ($result9 = mysqli_fetch_assoc($sql9)) { ?>
                                                <div class="card rounded-0 border-0 p-0 col"><img src="images/medrec_images/<?= $result9['file_name'] ?>"></div>
                                            <?php } ?>

                                        </div>

                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- dash body 3 -->
                <!-- dash body 3 -->


                <!-- dash body 4 -->
                <!-- dash body 4 -->
                <div id="dashbody_4" class="page" style="display: none;">
                    <div class="body_1">
                        <p>Finance</p>
                    </div>
                    <div class="body_2 mb-4">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                <span class="material-icons-sharp text-primary">
                                    account_balance_wallet
                                </span>
                                Your Clinic Finance Profile
                            </h5>
                            <div class="card-body row row-cols-3 px-4 row-gap-3">
                                <div class="col">
                                    <div class="details d-flex align-items-center">
                                        <span class="material-icons-sharp me-2 span_1 fs-1 text-primary">
                                            account_balance_wallet
                                        </span>
                                        <div class="details_2">
                                            <small class="mb-5">Total Deposit</small>
                                            <h4>&#8358;<span class="deposit"><?= $formattedDeposits ?></span></h4>
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
                                            <h4>&#8358;<span class="debt"><?= $formattedDebts ?></span></h4>
                                            <small class="text-muted">last updated: <?= $today ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="details d-flex align-items-center">
                                        <a href='models/getPDFreport.php?patid= <?= $patient_info["patient_id"] ?>' target="_blank">
                                            <button class="btn btn-success">Download Transaction Report</button>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="body_2 mb-4">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                <span class="material-icons-sharp text-primary">
                                    receipt_long
                                </span>
                                Your Transaction reports
                            </h5>
                            <div class="card-body row row-cols-3 px-4">
                                <table class="table table-hover table-primary">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Transaction ID</th>
                                            <th scope="col">Service</th>
                                            <th scope="col">Amount Paid</th>
                                            <th scope="col">Amount Remaining</th>
                                            <th scope="col">Transaction Date</th>
                                        </tr>
                                    </thead>
                                    <tbody id="transacts">

                                        <?php
                                        $i = 1;
                                        while ($result5 = mysqli_fetch_assoc($sql8)) {

                                        ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $result5['transaction_id'] ?></td>
                                                <td><?= $result5['payment_for'] ?></td>
                                                <td>&#8358;<?= number_format($result5['deposited_amount'], 2) ?></td>
                                                <td>&#8358;<?= number_format($result5['remaining_amount'], 2) ?></td>
                                                <td><?= $result5['date_of_transaction'] ?></td>
                                            </tr>
                                            <?php $i++ ?>
                                        <?php } ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- dash body 4 -->
                <!-- dash body 4 -->


                <!-- dash body 5 -->
                <!-- dash body 5 -->
                <div id="dashbody_5" class="page" style="display: none;">
                    <div class="body_1">
                        <p>New Appointment</p>
                    </div>
                    <div class="body_2 mb-4">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                <span class="material-icons-sharp text-primary">
                                    dashboard
                                </span>
                                Book Appointment day and time to see a Doctor
                            </h5>
                            <div class="card-body px-5">
                                <form class="row g-3 bg-light pt-4 shadow pb-4 px-3" id="addAppForm">
                                    <input type="hidden" class="form-control" name="whobooked" value="Patient">
                                    <input type="hidden" class="form-control" name="patient_id" id="pid" value="<?= $patient_info['patient_id'] ?>">
                                    <div class="col-md-6">
                                        <label for="inputState" class="form-label">Choose Doctor to Book</label>
                                        <select id="docOpt" class="form-select" name="doctor_uid">
                                            <option value="" selected>Choose Doctor</option>
                                            <?php
                                            while ($result3 = mysqli_fetch_assoc($sql3)) {
                                            ?>
                                                <option value="<?= $result3['unique_id'] ?>">Doctor <?= $result3['firstname'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputState" class="form-label">Purpose of Appointment</label>
                                        <select id="inputState" class="form-select" name="purpose">
                                            <option value="" selected>Choose Purpose</option>
                                            <option value="CHECKUP">CHECKUP</option>
                                            <option value="DELIVERY">DELIVERY</option>
                                            <option value="OPERATION">OPERATION</option>
                                            <option value="OTHERS">OTHERS</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputEmail4" class="form-label">Choose Date</label>
                                        <input type="date" class="form-control" id="inputEmail4" name="appdate">
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label">Choose Time</label>
                                        <div class="row ">
                                            <div class="form-check col">
                                                <input type="radio" class="btn-check" id="btn-check-outlined1" autocomplete="off" name="app_time" value="9:00 - 10:00AM">
                                                <label class="btn btn-outline-primary" for="btn-check-outlined1">9AM - 10AM</label>
                                            </div>
                                            <div class="form-check col">
                                                <input type="radio" class="btn-check" id="btn-check-outlined2" autocomplete="off" name="app_time" value="11:00 - 12:00PM">
                                                <label class="btn btn-outline-primary" for="btn-check-outlined2">11AM - 12PM</label>
                                            </div>
                                            <div class="form-check col">
                                                <input type="radio" class="btn-check" id="btn-check-outlined3" autocomplete="off" name="app_time" value="1:00 - 2:00PM">
                                                <label class="btn btn-outline-primary" for="btn-check-outlined3">1PM - 2PM</label>
                                            </div>
                                            <div class="form-check col">
                                                <input type="radio" class="btn-check" id="btn-check-outlined4" autocomplete="off" name="app_time" value="3:00 - 4:00PM">
                                                <label class="btn btn-outline-primary" for="btn-check-outlined4">3PM - 4PM</label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary text-white w-100" id="addAppBtn" onclick="addApp()">Book Appointment

                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- dash body 5 -->
                <!-- dash body 5 -->


                <!-- dash body 6 -->
                <!-- dash body 6 -->
                 <!-- <div id="dashbody_6" class="page" style="display: none;">
                    <div class="body_1">
                        <p>Notifications</p>
                    </div>
                    <div class="body_2 mb-4">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                <span class="material-icons-sharp text-primary">
                                    dashboard
                                </span>
                                Your Clinic Finance Profile
                            </h5> 
                            <div class="card-body px-4">
                                <div class="card bg-light rounded-0 border-0 p-2 px-3 shadow mb-2">
                                    <div class="row">
                                        <div class="col">
                                            <small>12:45 23/89/9999</small>
                                        </div>
                                        <div class="col-6">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, nulla.</p>
                                        </div>
                                        <div class="col">
                                            <p>Doctor Olamide</p>
                                        </div>
                                        <div class="col text-end">

                                            <span class="material-icons-sharp text-danger text cursor">
                                                close
                                            </span>


                                        </div>
                                    </div>

                                </div>
                                <div class="card bg-light rounded-0 border-0 p-2 px-3 shadow mb-2">
                                    <div class="row">
                                        <div class="col">
                                            <small>12:45 23/89/9999</small>
                                        </div>
                                        <div class="col-6">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, nulla.</p>
                                        </div>
                                        <div class="col">
                                            <p>Doctor Olamide</p>
                                        </div>
                                        <div class="col text-end">

                                            <span class="material-icons-sharp text-danger text cursor">
                                                close
                                            </span>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>  -->
                <!-- dash body 6 -->
                <!-- dash body 6 -->

            </div>
        </div>

    </main>


    <!-- delete modal -->
    <!-- delete modal -->

    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cancel Appointment</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger delete-confirm-btn">Delete Appointment</button>
                </div>
            </div>
        </div>
    </div>

    <!-- delete modal -->
    <!-- delete modal -->







    <!-- Modal for dash profile-->
    <!-- Modal for dash profile-->
    <div class="modal fade" id="profileEdit" tabindex="-1" aria-labelledby="signinLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="signinLabel">Patient Profile</h1>
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
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">First Name</label>
                                <input type="text" class="form-control inp1" name="first_name" value="<?= $patient_info['firstname'] ?>">
                                <input type="hidden" class="form-control inp1" name="user_id" id="hideID" value="<?= $patient_info['unique_id'] ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Last Name</label>
                                <input type="text" class="form-control inp2" name="last_name" value="<?= $patient_info['lastname'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="text" class="form-control inp3" name="email" value="<?= $patient_info['email'] ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Phone</label>
                                <input type="text" class="form-control inp4" name="phone" value="<?= $patient_info['phone'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="inputEmail4" class="form-label">Address</label>
                                <textarea class="form-control inp5" name="address" id="exampleFormControlTextarea1" rows="3" readonly><?= $patient_info['address'] ?></textarea>
                            </div>
                        </div>
                        <div class="row mt-2 border-top p-2 pb-2">
                            <small class="text-danger">You can change your picture</small>
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="profile_photo" id="inputGroupFile02">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="javascript/inactivity.js"></script>
    <script src="javascript/updatePatient.js"></script>
    <script src="javascript/patientOpr.js"></script>

    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="javascript/navigate.js"></script>
</body>

</html>