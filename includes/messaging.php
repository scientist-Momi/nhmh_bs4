<?php

$user_id = stripslashes($_SESSION['staff_uid']);

$msql = mysqli_query($conn, "select * from nhmh_staff_db where unique_id = '$user_id'");
if (mysqli_num_rows($sql) > 0) {
    // $staff_info = mysqli_fetch_assoc($sql);

    $msql10 = mysqli_query($conn, "select * from nhmh_staff_db where not unique_id = '$user_id' order by Staff_id");

    // $msql10 = mysqli_query($conn, "SELECT nhmh_staff_db.*, nhmh_internal_messages_db.msg_id 
    //                             FROM nhmh_staff_db 
    //                             INNER JOIN nhmh_internal_messages_db ON nhmh_staff_db.unique_id = nhmh_internal_messages_db.outgoing_msg_id
    //                             WHERE nhmh_staff_db.unique_id <> '$user_id'
    //                             ORDER BY nhmh_internal_messages_db.msg_id");

    // $msql10 = mysqli_query($conn, "SELECT s.*, m.time
    //                                 FROM nhmh_staff_db s
    //                                 LEFT JOIN (
    //                                 SELECT outgoing_msg_id, MAX(time) AS time
    //                                 FROM nhmh_internal_messages_db
    //                                 WHERE incoming_msg_id = '$user_id'
    //                                 GROUP BY outgoing_msg_id
    //                                 ) m ON s.unique_id = m.outgoing_msg_id
    //                                 ORDER BY m.time DESC NULLS LAST;
    //                                 ");

    // $msql10 = mysqli_query($conn, "SELECT s.*, m.time
    //                                 FROM nhmh_staff_db s
    //                                 LEFT JOIN (
    //                                 SELECT outgoing_msg_id, MAX(time) AS time
    //                                 FROM nhmh_internal_messages_db
    //                                 WHERE incoming_msg_id = '$user_id'
    //                                 GROUP BY outgoing_msg_id
    //                                 ) m ON s.unique_id = m.outgoing_msg_id
    //                                 ORDER BY m.time DESC NULLS LAST;

    //                             ");


    

}