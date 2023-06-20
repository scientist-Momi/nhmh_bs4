<?php
include_once "../includes/db_connector.php";


// To check if any of the field is empty
if (empty($_POST['staff_id'])) {
    echo json_encode([
        'status' => 401,
        'message' => 'ID not specified.'
    ]);
} else {
    $staff_id = htmlspecialchars(strip_tags($_POST['staff_id']));

    $sql1 = mysqli_query($conn, "select * from nhmh_staff_db where Staff_id = '$staff_id' ");
    $sql1_array = mysqli_fetch_assoc($sql1);

    if (mysqli_num_rows($sql1) > 0) {

        echo json_encode([
            'status' => 200,
            'staff_id' => $sql1_array['Staff_id'],
            'unique_id' => $sql1_array['unique_id'],
            'firstname' => $sql1_array['firstname'],
            'lastname' => $sql1_array['lastname'],
            'email' => $sql1_array['email'],
            'phone' => $sql1_array['phone'],
            'address' => $sql1_array['address'],
            'position' => $sql1_array['position'],
            'photo' => $sql1_array['photo'],
            'active_status' => $sql1_array['status'],
            'created_at' => $sql1_array['created_at']
        ]);
    } else {
        echo json_encode([
            'status' => 401,
            'message' => 'No record found.'
        ]);
    }
}