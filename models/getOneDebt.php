<?php
include_once "../includes/db_connector.php";

if (empty($_POST['transaction_id'])) {
    echo json_encode([
        'status' => 401,
        'message' => ' Transaction ID not specified.'
    ]);
} else {
    $transaction_id = htmlspecialchars(strip_tags($_POST['transaction_id']));

    $sql1 = "select * from nhmh_patients_payment_plans_db where transaction_id = ?  ";
    $stmt2 = $conn->stmt_init();
    $stmt2->prepare($sql1);
    $stmt2->bind_param('s', $transaction_id);
    $stmt2->execute();
    $results = $stmt2->get_result();
    if ($results) {
        $output = "";
        $app_arr = array();
        foreach ($results as $result) {
            $pat_id = $result['patient_id'];

            $query = mysqli_query($conn, "select * from nhmh_patient_db where patient_id = '$pat_id' ");

            $query_arr = mysqli_fetch_assoc($query);

            $app_item = array(
                'message' => 200,
                'value' => [
                    'photo' => $query_arr['photo'],
                    'patient_id' => $result['patient_id'],
                    'firstname' => $query_arr['firstname'],
                    'lastname' => $query_arr['lastname'],
                    'amount' => $result['amount_to_pay'],
                    'date' => $result['date_to_pay'],
                    'plan_id' => $result['plan_id']
                ]

            );

            array_push($app_arr, $app_item);
        }

        echo json_encode($app_arr);
        // echo json_encode([
        //     'status' => 200,
        //     'message' => $output
        // ]);

        $stmt2->close();
    } else {
        echo json_encode([
            'status' => 401,
            'message' => 'No record found.'
        ]);
    }
}