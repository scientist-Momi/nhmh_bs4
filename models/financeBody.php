<?php
include_once "../includes/db_connector.php";

$patient_id = htmlspecialchars(strip_tags($_GET['patient_id']));

if (empty($patient_id)) {
    echo json_encode([
        'status' => 401,
        'message' => 'Patient ID not specified'
    ]);
} else {

    $sql1 = "select * from nhmh_patient_accounts_db where patient_id = ? order by id desc ";
    $stmt2 = $conn->stmt_init();
    $stmt2->prepare($sql1);
    $stmt2->bind_param('s', $patient_id);
    $stmt2->execute();
    $results = $stmt2->get_result();
    if ($results) {

        $app_arr = array();
        foreach ($results as $result) {

            $app_item = array(
                'message' => 'success',
                'value' => [
                    'payment_id' => $result['transaction_id'],
                    'payment_for' => $result['payment_for'],
                    'deposit' => number_format($result['deposited_amount'], 2),
                    'remain' => number_format($result['remaining_amount'], 2),
                    'date' => $result['date_of_transaction']
                ]

            );

            array_push($app_arr, $app_item);
        }

        echo json_encode($app_arr);

        $stmt2->close();
    } else {
        echo json_encode([
            'status' => 401,
            'message' => 'No record found.'
        ]);
    }
}