<?php
include_once "../includes/db_connector.php";

$outgoing = stripslashes($_POST['outgoing']);
$incoming = stripslashes($_POST['incoming']);
$message = stripslashes($_POST['message']);

if (!empty($message)) {
    $is_read = 1;
    $sql = mysqli_query(
        $conn,
        "INSERT INTO nhmh_internal_messages_db (incoming_msg_id, outgoing_msg_id, message, is_read) VALUES ('$incoming', '$outgoing', '$message', '$is_read')"
    );

    if ($sql) {
        echo json_encode([
            'msg' => 'success',
            'id' => $incoming
        ]);
    }
}
