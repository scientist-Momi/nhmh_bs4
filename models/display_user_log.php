<?php

include_once "./includes/db_connector.php";

$current_date = date("y-m-d");

$sql6 = mysqli_query($conn, "select * from nhmh_users_log where date = '$current_date' order by id desc");


$output = "";
$i = 1;

while ($result6 = mysqli_fetch_assoc($sql6)) {

    $unique = $result6['user_id'];

    $sql9 = mysqli_query($conn, "select * from nhmh_staff_db where unique_id = '$unique' ");

    $sql9_array = mysqli_fetch_assoc($sql9);

    if ($result6['action'] == "IN") {
        // insert output
        $output .= ' 
                
                <tr>
                    <td>'. $i .'</td>
                    <td>' . $sql9_array['firstname'] . ' ' . $sql9_array['lastname'] . '</td>
                    <td>' . $sql9_array['position'] . ' </td>
                    <td>' . $result6['time'] . '</td>
                    <td>' . $result6['date'] . '</td>
                    <td><button class="btn btn-success text-white">Login</button></td>
                </tr>
                
                
                
                
                ';
    } elseif ($result6['action'] == "OUT") {
        // insert output
        $output .= '      <tr>
                    <td>' . $i . '</td>
                    <td>' . $sql9_array['firstname'] . ' ' . $sql9_array['lastname'] . '</td>
                    <td>' . $sql9_array['position'] . ' </td>
                    <td>' . $result6['time'] . '</td>
                    <td>' . $result6['date'] . '</td>
                    <td><button class="btn btn-danger text-white">Logout</button></td>
                </tr>';
    }

    $i++;
}

echo $output;
