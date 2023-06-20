<?php
include "includes/headerDash.php";
include "includes/accountantStats.php";
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
                            <img src="<?= $staff_photo ?>" class="img_size">
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
                            <p class="m-0 p-0 ps-2 name"><?= $staff_info['firstname'] ?> <?= $staff_info['lastname'] ?></p>
                            <small class="position"><?= $staff_info['position'] ?></small>
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
                                person_search
                            </span>
                            <p class="align-self-center my-auto ms-3">Find Patient</p>
                        </li>

                        <li class="nav-item nav_item d-flex align-items-center justify-content-start p-2" onclick="show('dashbody_3','btn3');" id="btn3">
                            <span class="material-icons-sharp text-primary">
                                add_card
                            </span>
                            <p class="align-self-center my-auto ms-3">New Payment</p>
                        </li>

                        <li class="nav-item nav_item d-flex align-items-center justify-content-start p-2" onclick="show('dashbody_4','btn4');" id="btn4">
                            <span class="material-icons-sharp text-primary">
                                screen_search_desktop
                            </span>
                            <p class="align-self-center my-auto ms-3">Payment Records</p>
                        </li>
                        <li class="nav-item nav_item d-flex align-items-center justify-content-start p-2" onclick="show('dashbody_5','btn5');" id="btn5">
                            <span class="material-icons-sharp text-primary">
                                upcoming
                            </span>
                            <p class="align-self-center my-auto ms-3">Outstanding Payments</p>
                        </li>
                        <li class="nav-item nav_item d-flex align-items-center justify-content-start p-2" onclick="show('dashbody_6','btn6');" id="btn6">
                            <span class="material-icons-sharp text-primary">
                                view_list
                            </span>
                            <p class="align-self-center my-auto ms-3">Services and Price</p>
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
                        <p>Dashboard Accountant #<span class="staffID"><?= $staff_info['Staff_id'] ?></span></p>
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
                                            <small class="mb-5 fw-bold">Month Revenue</small>
                                            <h4 class="mrevenue">&#8358;<?= $mdeposits ?></h4>
                                            <small class="text-muted ">last updated: <span class="lupdated1"><?= $today ?></span> </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="details d-flex align-items-center">
                                        <span class="material-icons-sharp me-2 span_1 fs-1 text-danger">
                                            reorder
                                        </span>
                                        <div class="details_2">
                                            <small class="mb-5 fw-bold">Account Receivable</small>
                                            <h4 class="debts">&#8358;<?= $debts ?></h4>
                                            <small class="text-muted ">last updated: <span class="lupdated2"><?= $today ?></span> </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="details d-flex align-items-center">
                                        <span class="material-icons-sharp me-2 span_1 fs-1 text-info">
                                            reorder
                                        </span>
                                        <div class="details_2">
                                            <small class="mb-5 fw-bold">Total Revenue</small>
                                            <h4 class="revenue">&#8358;<?= $deposits ?></h4>
                                            <small class="text-muted ">last updated: <span class="lupdated3"><?= $today ?></span> </small>
                                        </div>
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

                    <div class="body_2 mb-2" id="resultPat1" style="display: none;">
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
                                    <div class="col-md-3">
                                        <label for="inputEmail" class="form-label">Patient ID</label>
                                        <input type="text" class="form-control out2" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputEmail" class="form-label">Full Name</label>
                                        <input type="text" class="form-control out3" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputEmail" class="form-label">Email Address</label>
                                        <input type="text" class="form-control out4" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputEmail" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control out5" readonly>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="inputEmail" class="form-label">House Address</label>
                                        <input type="text" class="form-control out6" readonly>
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
                    <form action="" id="paymentForm">
                        <div class="body_2 mb-4">
                            <div class="card shadow border-0 rounded-0">
                                <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                    <span class="material-icons-sharp text-primary">
                                        add_card
                                    </span>
                                    New Payment Record
                                </h5>

                                <div class="card-body px-2">
                                    <div class="row g-3 px-3">
                                        <div class="col-md-6">
                                            <label for="inputState" class="form-label">Input Patient ID or Name</label>
                                            <div class="input-group mb-0">
                                                <input type="text" class="form-control" placeholder="Patient's ID" name="patientID">
                                                <input type="hidden" name="staff_name" value="<?= $staff_info['firstname'] ?>">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputState" class="form-label">Select Service</label>
                                            <select id="serviceSelect" class="form-select" name="service" onchange="servicePrice()">
                                                <option value="" selected>Choose Service</option>
                                                <?php
                                                while ($result7 = mysqli_fetch_assoc($sql18)) {
                                                ?>
                                                    <option value="<?= $result7['id'] ?>"><?= $result7['service_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="body_2 mb-4" id="pay0" style="display: none;">
                            <div class="card shadow border-0 rounded-0">
                                <div class="card-body px-2">
                                    <div class="row g-3 px-3">
                                        <div class="col-md-6">
                                            <label for="inputState" class="form-label">Price of Choosen Service [&#8358;]</label>
                                            <input type="text" class="form-control" readonly id="serviceprice1" name="service_price1">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputState" class="form-label">Regsitration Code</label>
                                            <input type="text" class="form-control" readonly id="regCode" name="">
                                            <input type="hidden" class="form-control" id="staffName" value="<?= $staff_info['firstname'] ?>">
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <button type="submit" class="btn btn-primary text-white w-100" id="genBtn" onclick="genRegCode('genBtn')"> Generate New Code
                                            </button>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <button type="submit" class="btn btn-primary text-white w-100" id="savecodeBtn" onclick="saveRegCode('savecodeBtn')"> Save Registration Code
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="body_2 mb-4" id="pay1" style="display: none;">
                            <div class="card shadow border-0 rounded-0">
                                <div class="card-body px-2">
                                    <div class="row g-3 px-3">
                                        <div class="col-md-6">
                                            <label for="inputState" class="form-label">Price of Choosen Service [&#8358;]</label>
                                            <input type="text" class="form-control" readonly id="serviceprice" name="service_price">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputState" class="form-label">Type of Payment</label>
                                            <select id="type_id" class="form-select" onchange="payType()">
                                                <option value="" selected>Choose Type of Payment</option>
                                                <option value="1">Full Payment</option>
                                                <option value="2">Installmental Payment</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="body_2 mb-4" id="pay2" style="display: none;">
                            <div class="card shadow border-0 rounded-0">
                                <div class="card-body px-2">
                                    <div class="row g-3 px-3">
                                        <div class="col-md-6">
                                            <label for="inputState" class="form-label">Deposit Amount [&#8358;]</label>
                                            <input type="text" class="form-control" id="fullDeposit" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputState" class="form-label">Means of Payment</label>
                                            <select id="inputState" class="form-select" name="modeofPay">
                                                <option selected value="">Choose Means of Payment</option>
                                                <option value="Cash">Cash</option>
                                                <option value="POS">POS</option>
                                                <option value="Transfer">Bank Transfer</option>
                                            </select>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary text-white w-100" id="fullPayBtn" onclick="fullPay()"> Save Payment
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="body_2 mb-4" id="pay3" style="display: none;">
                            <div class="card shadow border-0 rounded-0">
                                <div class="card-body px-2">
                                    <div class="row g-3 px-3">
                                        <div class="col-md-6">
                                            <label for="inputState" class="form-label">Initial Deposit [&#8358;]</label>
                                            <input type="text" class="form-control" readonly id="downpay" name="downPay">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputState" class="form-label">Deposit Amount [&#8358;]</label>
                                            <input type="text" class="form-control" name="deposit">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="inputState" class="form-label">Installment plan</label>
                                            <select id="inputState" class="form-select" name="planChoice">
                                                <option selected value="">Choose Plan</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputState" class="form-label">Means of Payment</label>
                                            <select id="inputState" class="form-select" name="modeofPay1">
                                                <option selected value="">Choose Means of Payment</option>
                                                <option value="Cash">Cash</option>
                                                <option value="POS">POS</option>
                                                <option value="Transfer">Bank Transfer</option>
                                            </select>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary text-white w-100" id="PayDraftBtn" onclick="payDraft()"> Get Payment Draft
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="body_2 mb-4" id="pay4" style="display: none;">
                            <div class="card shadow border-0 rounded-0">
                                <div class="card-body px-2">
                                    <div class="row g-3 px-3">
                                        <div class="col-md-6">
                                            <label for="inputState" class="form-label">Debt to Pay [&#8358;]</label>
                                            <input type="text" class="form-control" readonly id="out2" name="remains">
                                            <input type="text" class="form-control" readonly id="out3" name="interval">
                                            <input type="text" class="form-control" readonly id="out4" name="moneytoPay">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputState" class="form-label">Payment Draft</label>
                                            <div class="card border p-3" id="out1">
                                            </div>
                                        </div>


                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary text-white w-100" onclick="instPay()" id="instPayBtn">Save Payment

                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
                                    screen_search_desktop
                                </span>
                                Find Patient Finance Transaction
                            </h5>
                            <div class="card-body px-2">
                                <form class="row g-3 px-3" id="transForm">
                                    <div class="col-md-12">
                                        <label for="inputState" class="form-label">Input Patient ID or Name</label>
                                        <div class="input-group mb-0">
                                            <input type="text" class="form-control" placeholder="Patient's ID" name="patient_id">
                                            <button class="btn btn-outline-secondary" type="submit" id="transBtn" onclick="searchTransact('transBtn')">Search
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div style="display: none;" id="showTransacts">
                        <div class="body_2 mb-4">
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


                        </div>

                        <div class="body_2 mb-4">
                            <div class="card shadow border-0 rounded-0">
                                <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                    <span class="material-icons-sharp text-primary">
                                        receipt_long
                                    </span>
                                    Transaction reports
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



                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- dash body 4 -->
                <!-- dash body 4 -->


                <!-- dash body 5 -->
                <!-- dash body 5 -->
                <div id="dashbody_5" class="page" style="display: none;">
                    <div class="body_2 mb-4">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                <span class="material-icons-sharp text-primary">
                                    screen_search_desktop
                                </span>
                                Find Patient Debts and clear them.
                            </h5>
                            <div class="card-body px-2">
                                <form class="row g-3 px-3" id="srcDebtForm">
                                    <div class="col-md-12">
                                        <label for="inputState" class="form-label">Input Transaction ID on payment receipt</label>
                                        <div class="input-group mb-0">
                                            <input type="text" class="form-control" placeholder="Trasnsaction ID" name="transaction_id">
                                            <button class="btn btn-outline-secondary" type="submit" id="srcDebtBtn" onclick="searchDebt()">Search
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="body_2 mb-4" style="display:none" id="oneDebt">
                        <div class="card shadow border-0 rounded-0">
                            <div class="card-body px-2">
                                <table class="table table-hover table-primary">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Patient Photo</th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Amount to Pay</th>
                                            <th scope="col">Date to pay</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="showDebts">

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="body_2 mb-4" id="twoDebt">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                <span class="material-icons-sharp text-primary">
                                    upcoming
                                </span>
                                Patients Debts
                            </h5>
                            <div class="card-body px-2">
                                <table class="table table-hover table-primary">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Patient Photo</th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Amount to Pay</th>
                                            <th scope="col">Date to pay</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $i = 1;
                                        while ($result1 = mysqli_fetch_assoc($sql115)) {
                                            $pat_id = $result1['patient_id'];

                                            $query = mysqli_query($conn, "select * from nhmh_patient_db where patient_id = '$pat_id' ");

                                            $query_arr = mysqli_fetch_assoc($query);
                                        ?>

                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><img src="images/patient<?= $query_arr['photo'] ?>" class="img_size2"></td>
                                                <td><?= $result1['patient_id'] ?></td>
                                                <td><?= $query_arr['firstname'] ?> <?= $query_arr['lastname'] ?></td>
                                                <td><?= number_format($result1['amount_to_pay'], 2) ?></td>
                                                <td><?= $result1['date_to_pay'] ?></td>

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

                            <div class="d-flex card-header align-items-center bg-white">
                                <span class="material-icons-sharp text-primary m-0">
                                    view_list
                                </span>
                                <h5 class="m-0 mx-3">
                                    Clinic Services and Respective Price
                                </h5>

                                <div class=" d-flex align-items-center gap-2 ms-auto">
                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addService">Add New Service</button>

                                </div>
                            </div>
                            <div class="card-body px-2">
                                <table class="table table-hover table-primary">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Description</th>
                                            <th scope="col"></th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $i = 1;
                                        while ($result = mysqli_fetch_assoc($sql7)) {

                                        ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $result['service_name'] ?></td>
                                                <td>&#8358;<?= number_format($result['service_price'], 2) ?></td>
                                                <td><?= $result['service_description'] ?></td>
                                                <td><button class="btn btn-danger btnClass delete-btn1" data-id="<?= $result['id'] ?>">Delete</button></td>
                                            </tr>
                                            <?php $i++ ?>
                                        <?php } ?>

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- dash body 6 -->
                <!-- dash body 6 -->

                <!-- delete modal -->
                <!-- delete modal -->

                <div class="modal fade" id="delete-modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Service</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger delete-confirm-btn1">Delete Service</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- delete modal -->
                <!-- delete modal -->


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


            </div>
        </div>
    </main>







    <!-- Modal for Add Service-->
    <!-- Modal for Add Service-->
    <div class="modal fade" id="addService" tabindex="-1" aria-labelledby="signinLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="signinLabel">Add New Service</h1>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="newServiceForm">
                        <!-- <div class="bg-success card p-1 mb-1 text-center">
                                        <p class="mb-0">success</p>
                                    </div>
                                    <div class="bg-danger card p-1 mb-1 text-center">
                                        <p class="mb-0">success</p>
                                    </div> -->
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Service Name</label>
                                <input type="text" class="form-control" name="servename">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Service Price</label>
                                <input type="text" class="form-control" name="serveprice">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="inputEmail4" class="form-label">Service Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="servedesc"></textarea>
                            </div>
                        </div>

                        <div class="modal-footer justify-content-center">
                            <button type="submit" class="btn btn-primary text-white  px-5 w-100" id="newServiceBtn" onclick="newService('newServiceBtn')">Add
                                Service
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
    <!-- Modal for Add Service-->
    <!-- Modal for Add Service-->

    <!-- Modal for dash profile-->
    <!-- Modal for dash profile-->
    <div class="modal fade" id="profileEdit" tabindex="-1" aria-labelledby="signinLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="signinLabel">Accountant Profile</h1>
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
                                <textarea class="form-control inp5" id="exampleFormControlTextarea1" rows="3" name="address"><?= $staff_info['address'] ?></textarea>
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
                                <!-- <div class="spinner-border text-light" role="status">
                                                                <span class="visually-hidden">Loading...</span>
                                                            </div> -->
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
    <!-- Modal for dash profile-->
    <!-- Modal for dash profile-->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="javascript/inactivity.js"></script>
    <script src="javascript/updateStaff.js"></script>
    <script src="javascript/accountantOpr.js"></script>
    <script src="javascript/getMessages.js"></script>

    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="javascript/navigate.js"></script>
</body>

</html>