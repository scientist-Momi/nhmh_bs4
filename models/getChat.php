<?php
include_once "../includes/db_connector.php";

$outgoing_id = stripslashes($_POST['outgoing_id']);
$incoming_id = stripslashes($_POST['incoming_id']);

$sql191 = mysqli_query($conn, "select * from nhmh_staff_db where unique_id = '$incoming_id' ");
$sql191_array = mysqli_fetch_assoc($sql191);



$sql190 = mysqli_query($conn, "SELECT * FROM nhmh_internal_messages_db LEFT JOIN nhmh_staff_db ON nhmh_staff_db.unique_id = nhmh_internal_messages_db.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id");

$output = "";

if (mysqli_num_rows($sql190) > 0) {
    while ($row190 = mysqli_fetch_assoc($sql190)) {
        if ($row190['outgoing_msg_id'] === $outgoing_id) {
            $output .= '                               
                        <div class="out-message d-flex">
                            <div class="ms-auto realMsg">
                                <p class="realMsgPOUT bg-dark text-white p-3 mb-0">' . $row190['message'] . '</p>
                                <small class="mt-1 mb-3">' . $row190['time'] . '</small>
                            </div>
                            
                        </div>
                                
                                ';
        } else {
            $output .= '<div class="in-message d-flex">
                            <div class="me-auto realMsg">
                                <p class="realMsgPIN bg-white p-3 mb-0">' . $row190['message'] . ' </p>
                                <small class="mt-1 mb-3">' . $row190['time'] . '</small>
                            </div>
                        </div>';
        }
    }
} else {
    $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
}

echo json_encode([
    "value" => $output,
    "position" => $sql191_array['position'],
    "status" => $sql191_array['status'],
    "firstname" => $sql191_array['firstname'],
    "photo" => $sql191_array['photo'],
    "incoming" => $incoming_id
]) ;