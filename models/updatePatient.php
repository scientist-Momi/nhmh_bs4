<?php
include_once "../includes/db_connector.php";

if (!empty($_POST['user_id'])) {

    $user_id = htmlspecialchars(strip_tags($_POST['user_id']));
    $fname = htmlspecialchars(strip_tags($_POST['first_name']));
    $lname = htmlspecialchars(strip_tags($_POST['last_name']));
    $mail = htmlspecialchars(strip_tags($_POST['email']));
    $rPhone = htmlspecialchars(strip_tags($_POST['phone']));
    $house = htmlspecialchars(strip_tags($_POST['address']));
    $avatar = ($_FILES['profile_photo']);

    $sql1 = mysqli_query($conn, "select * from nhmh_patient_db where unique_id = '$user_id' limit 1");

    if (mysqli_num_rows($sql1) > 0) {
        $sql1_array = mysqli_fetch_assoc($sql1);

        $first_name = $sql1_array['firstname'];
        $last_name = $sql1_array['lastname'];
        $email = $sql1_array['email'];
        $phone = $sql1_array['phone'];
        $photo = $sql1_array['photo'];
        $address = $sql1_array['address'];

        if (!empty($fname)) {
            $first_name = $fname;
        }
        if (!empty($lname)) {
            $last_name = $lname;
        }
        if (!empty($mail)) {
            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $email = $email;
            } else {
                $email = $mail;
            }
        }
        if (!empty($rPhone)) {

            if (is_numeric($rPhone)) {
                $phone = $rPhone;
            } else {
                $phone = $phone;
            }
        }
        if (!empty($house)) {
            $address = $house;
        }
        if (!empty($avatar)) {
            // $photo = $avatar['name'];

            $affix = "nhmh";

            $avatar_name = $affix . $avatar['name'];
            $avatar_tmp_name = $avatar['tmp_name'];
            $avatar_destination_path = '../images/patient' . $avatar_name;

            // make sure file is an image
            $allowed_files = ['png', 'jpg', 'jpeg', 'JPG', 'JPEG', 'PNG'];
            $extension = explode('.', $avatar_name);
            $extension = end($extension);

            if (in_array($extension, $allowed_files)) {
                //make sure image is not too large
                if ($avatar['size'] < 6000000) {
                    // to check if file already exists

                    if (file_exists($avatar_destination_path)) {
                        $photo = $photo;
                        // echo json_encode([
                        //     'status' => 401,
                        //     'message' => "Sorry, file already exist"
                        // ]);
                    } else {

                        $photo = $avatar_name;
                    }
                } else {
                    $photo = $photo;
                    // echo json_encode([
                    //     'status' => 401,
                    //     'message' => "File size is too big. Should be less than 2mb."
                    // ]);
                }
            } else {
                $photo = $photo;
                // echo json_encode([
                //     'status' => 401,
                //     'message' => "File should be png, jpg or jpeg."
                // ]);
            }
        }

        $sql = "update nhmh_patient_db set firstname = ?, lastname = ?, email = ?, phone = ?, photo = ?, address = ? where unique_id = ? ";
        $stmt = $conn->stmt_init();
        if (!$stmt->prepare($sql)) {
            echo json_encode([
                "status" => 401,
                "message" => "Something went wrong"
            ]);
        }
        $stmt->bind_param('sssssss', $first_name, $last_name, $email, $phone, $photo, $address, $user_id);
        $stmt->execute();
        if ($stmt->affected_rows) {
            move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
            echo "Successful";
            // echo json_encode([
            //     "status" => 200,
            //     "message" => "Update successful"
            // ]);
        } else {
            echo "Update unsuccessful" . mysqli_error($conn);
            // echo json_encode([
            //     "status" => 401,
            //     "message" => "Update unsuccessful" . mysqli_error($conn)
            // ]);
        }
        exit();
    } else {
        echo "User not found.";
        // echo json_encode([
        //     "status" => "401",
        //     "message" => "User not found."
        // ]);
    }
} else {
    echo "User ID not specified.";
    // echo json_encode([
    //     "status" => "401",
    //     "message" => "User ID not specified."
    // ]);
}
