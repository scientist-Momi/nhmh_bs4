<?php
include_once "../includes/db_connector.php";

$searchTerm = stripslashes($_POST['patient_id']);

if(empty($searchTerm)){
    echo "Patient ID not specified";
}else{



//search data base for ID
$sql1 = mysqli_query($conn, "select * from nhmh_patient_medical_record_db where patient_id = '$searchTerm' ");


$output = "";

if (mysqli_num_rows($sql1) > 0) {



    while ($sql1_array = mysqli_fetch_assoc($sql1)) {

        $unique = $sql1_array['unique_id'];
        $sql9 = mysqli_query($conn, "select * from nhmh_record_images_db where unique_id = '$unique' ");

        $output1 = "";
        if (mysqli_num_rows($sql9) > 0) {

            while ($result9 = mysqli_fetch_assoc($sql9)) {
                $output1 .= '
                    
                    <div class="card rounded-0 border-0 p-0 col out27 img_size2"><img src="./images/medrec_images/' . $result9['file_name'] . ' "></div>
                    ';
            }
        }

        // insert output
        $output .= '                   
                    
                    
                    
                    <div class="card bg-light rounded-0 border-0 p-2 px-3 shadow mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <label for="exampleFormControlInput1" class="form-label">Record Number</label>
                                            <input type="text" class="form-control out21" readonly id="med1" value="' . $sql1_array['id'] . '">
                                        </div>
                                        <div class="col">
                                            <label for="exampleFormControlInput1" class="form-label">Patient ID</label>
                                            <input type="text" class="form-control out22" readonly id="med2" value=" ' . $sql1_array['patient_id'] . ' ">
                                        </div>
                                        <div class="col">
                                            <label for="exampleFormControlInput1" class="form-label">Doctor</label>
                                            <input type="text" class="form-control out23" readonly id="med3" value=" ' . $sql1_array['attending_doctor'] . ' ">
                                        </div>
                                        <div class="col">
                                            <label for="exampleFormControlInput1" class="form-label">Date</label>
                                            <input type="text" class="form-control out24" readonly id="med4" value=" ' . $sql1_array['created_at'] . ' ">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <label for="exampleFormControlInput1" class="form-label">Diagnosis/Observation</label>
                                            <textarea class="form-control out25" id="med5" rows="3" readonly>' . $sql1_array['diagnosis'] . '</textarea>
                                        </div>
                                        <div class="col">
                                            <label for="exampleFormControlInput1" class="form-label">Prescription/Advice</label>
                                            <textarea class="form-control out26" id="med6" rows="3" readonly>' . $sql1_array['instruction'] . '</textarea>
                                        </div>
                                    </div>

                                    <div class="row row-cols-4 row-gap-1 px-3">
                                        ' . $output1 . '
                                    </div>

                                </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    ';
    }
} else {
    $output .= '<span class="material-icons-sharp red"> error </span><p class="red">No Medical record for PATIENT ' . $searchTerm . '</p>';
}

echo $output;
}