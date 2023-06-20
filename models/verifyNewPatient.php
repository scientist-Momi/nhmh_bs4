 <?php
    include_once "../includes/db_connector.php";
    require_once "./Mailer.class.php";

    $fname = stripslashes($_POST['fname']);
    $lname = stripslashes($_POST['lname']);
    $email = stripslashes($_POST['email']);
    $phone = stripslashes($_POST['phone']);
    $address = stripslashes($_POST['address']);
    $dob = stripslashes($_POST['dob']);
    $genotype = stripslashes($_POST['genotype']);
    $bgroup = stripslashes($_POST['bgroup']);
    $height = stripslashes($_POST['height']);
    $children = stripslashes($_POST['children']);
    $nokname = stripslashes($_POST['nokname']);
    $nokrel = stripslashes($_POST['nokrel']);
    $nokphone = stripslashes($_POST['nokphone']);
    $nokaddress = stripslashes($_POST['nokaddress']);
    $nurse_id = stripslashes($_POST['nurse_id']);

    // Check if fields are empty
    if (empty($fname)) {
        echo json_encode([
            'status' => 404,
            'message' => "First Name field cannot be empty."
        ]);
    } elseif (empty($lname)) {
        echo json_encode([
            'status' => 404,
            'message' => "Last Name field cannot be empty."
        ]);
    } elseif (empty($phone)) {
        echo json_encode([
            'status' => 404,
            'message' => "Phone field cannot be empty."
        ]);
    } elseif (empty($email)) {
        echo json_encode([
            'status' => 404,
            'message' => "Email field cannot be empty."
        ]);
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            'status' => 404,
            'message' => "Email is invalid."
        ]);
    } elseif (empty($address)) {
        echo json_encode([
            'status' => 404,
            'message' => "Address field cannot be empty."
        ]);
    } elseif (empty($dob)) {
        echo json_encode([
            'status' => 404,
            'message' => "Please input patient birth date."
        ]);
    } elseif (empty($genotype)) {
        echo json_encode([
            'status' => 404,
            'message' => "Please choose patient genotype."
        ]);
    } elseif (empty($bgroup)) {
        echo json_encode([
            'status' => 404,
            'message' => "Please choose patient blood group."
        ]);
    } elseif (empty($height)) {
        echo json_encode([
            'status' => 404,
            'message' => "Please input patient height."
        ]);
    } elseif (empty($children)) {
        echo json_encode([
            'status' => 404,
            'message' => "Please input patient number of children."
        ]);
    } elseif (empty($nokname)) {
        echo json_encode([
            'status' => 404,
            'message' => "Please input patient next of kin full name."
        ]);
    } elseif (empty($nokrel)) {
        echo json_encode([
            'status' => 404,
            'message' => "Please input patient relationship with next of kin."
        ]);
    } elseif (empty($nokphone)) {
        echo json_encode([
            'status' => 404,
            'message' => "Please input patient next of kin phone number."
        ]);
    } elseif (empty($nokaddress)) {
        echo json_encode([
            'status' => 404,
            'message' => "Please input patient next of kin address."
        ]);
    } else {
        //Generate random password for staff
        $data = 'NHMHPATIENT1234567890nhmhpatient!@#$%&';

        $password = substr(str_shuffle($data), 0, 10);

        // Generate first username for staff
        $rand_user = rand(time(), 100000);
        $fix = "PAT";
        $username = $fix . $rand_user;

        $rand_id = rand(time(), 100000000);
        $status = "Offline now";

        // calculate age from dob
        $today = date("y-m-d");
        $age = date_diff(date_create($dob), date_create($today))->y;

        // check if username exists
        $checkusername = mysqli_query($conn, "select * from nhmh_patient_db where email = '$email' ");

        if (mysqli_num_rows($checkusername) > 0) {
            echo json_encode([
                'status' => 404,
                'message' => "Email already exists."
            ]);
        } else {

            $_SESSION['patient_email'] = $email;

            $uniqueOtp = random_int(100000, 999999);

            $emailSender = new EmailSender();
            $emailSender->sendEmailOne($email, $uniqueOtp);

            echo json_encode([
                'status' => 200,
                'OTP' => $uniqueOtp
            ]);
        }
    }
