<?php
include_once "../includes/db_connector.php";
require_once "./Mailer.class.php";


$price = stripslashes($_POST['service_price']);
$patient = stripslashes($_POST['patientID']);
$deposit = stripslashes($_POST['deposit']);
$modeofPay = stripslashes($_POST['modeofPay1']);
$planChoice = stripslashes($_POST['planChoice']);
$service_id = stripslashes($_POST['service']);
$accountant = stripslashes($_POST['staff_name']);
$remains = stripslashes($_POST['remains']);
$interval = stripslashes($_POST['interval']);
$moneytoPay = stripslashes($_POST['moneytoPay']);

if (empty($patient)) {
    echo "Patient ID not specified.";
} elseif (empty($price)) {
    echo "Service price can not be retrieved.";
} elseif (empty($deposit)) {
    echo "Amount deposited not specified. ";
} elseif (empty($modeofPay)) {
    echo "Mode of payment not specified. ";
} elseif (empty($planChoice)) {
    echo "Installment plan not specified. ";
} elseif (empty($service_id)) {
    echo "Could not get service detail. ";
} elseif (empty($remains)) {
    echo "Could not get remaining amount. ";
} elseif (empty($interval)) {
    echo "Could not get Plan interval. ";
} elseif (empty($moneytoPay)) {
    echo "Could not get money to pay. ";
}else{

    $sql2 = mysqli_query($conn, "select * from nhmh_services_db where id = '$service_id' ");
    if(mysqli_num_rows($sql2) > 0){
        $sql2_array = mysqli_fetch_assoc($sql2);
        $service = $sql2_array['service_name'];

        $moneytoPay1 = floor($moneytoPay);

        $today = date("Y-m-d");

        $pay_status = "Not paid";

        $firstday = $today;

        $trans_id = rand(time(), 1000);

        // get patient fullname
        $sql = mysqli_query($conn, "select * from nhmh_patient_db where patient_id = '$patient' ");

        $sql_array = mysqli_fetch_assoc($sql);
        $fullname = $sql_array['firstname'] ." ". $sql_array['lastname'];

        $fname = $sql_array['firstname'];
        $email = $sql_array['email'];

        $month = date('F', strtotime($today));

        $sql3 = mysqli_query($conn, "insert into nhmh_patient_accounts_db (patient_id,transaction_id,fullname,payment_for,amount_to_pay,deposited_amount,remaining_amount,installment_plan,mode_of_payment,date_of_transaction,month_of_transaction,accountant_in_charge) values('$patient', '$trans_id', '$fullname', '$service', '$price', '$deposit', '$remains', '$planChoice', '$modeofPay', '$today', '$month', '$accountant') ");

            if ($sql3) {

                for ($i = 1; $i <= $planChoice; $i++) {

                    $firstday = date('Y-m-d', strtotime('+' . $interval . 'days', strtotime($firstday)));

                    $sql1 = mysqli_query($conn, "insert into nhmh_patients_payment_plans_db (patient_id,transaction_id,amount_to_pay,date_to_pay,payment_status) values ('$patient', '$trans_id', '$moneytoPay1', '$firstday', '$pay_status')");
                }

                if ($sql1) {
                    $sql4 = mysqli_query($conn, "select * from nhmh_patient_accounts_db where transaction_id = '$trans_id' ");
                    $sql4_array = mysqli_fetch_assoc($sql4);
                    $service_paid_for = $sql4_array['payment_for'];
                    $amount_she_paid = $sql4_array['deposited_amount'];

                    $her_debt = $sql4_array['remaining_amount'];
                    $installment = $sql4_array['installment_plan'];

                    $sql5 = mysqli_query($conn, "select * from nhmh_patients_payment_plans_db where transaction_id = '$trans_id' ");

                    $output = "";
                    while ($result5 = mysqli_fetch_assoc($sql5)) {
                        $output .= '
                                    <tr>
                                        <td width="110" align="center">
                                            ' . $result5['plan_id'] . '
                                        </td>
                                        <td width="110" align="center">
                                            ' . $result5['transaction_id'] . '
                                        </td>
                                        <td width="110" align="center">
                                            &#8358;' . number_format($result5['amount_to_pay'], 2) . '
                                        </td>
                                        <td width="120" align="center">
                                            ' . $result5['date_to_pay'] . '
                                        </td>
                                        <td  width="140" align="center">
                                        ' . $result5['date_created'] . '
                                        </td>
                                    </tr>
                                ';
                    }

                    //==================================================================
                    //RECEIPT IN PDF
                    //=================================================================

                    // Include the main TCPDF library (search for installation path).
                    require_once('../TCPDF-main/tcpdf.php');

                    // Extend the TCPDF class to create custom Header and Footer
                    class MYPDF extends TCPDF
                    {
                        // Page footer
                        public function Footer()
                        {
                            // Position at 15 mm from bottom
                            $this->SetY(-15);
                            // Set font
                            $this->SetFont('helvetica', 'I', 8);
                            $this->setTextColor(0, 191, 255);
                            // Page number
                            $this->Cell(0, 10, 'NEW HORIZON MATERNITY HOSPITAL      ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');

                            // $this->Cell(0, 10, 'NEW HORIZON MATERNITY HOSPITAL', 0, false, 'C', 0, '', 0, false, 'T', 'M');
                        }
                    }

                    // create new PDF document
                    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

                    // set document information
                    $pdf->SetCreator(PDF_CREATOR);
                    $pdf->SetAuthor('Nicola Asuni');
                    $pdf->SetTitle('NEW HORIZON MATERNITY HOSPITAL');
                    $pdf->SetSubject('');
                    $pdf->SetKeywords('');

                    // $imageFile = K_PATH_IMAGES . 'logo3.jpg';

                    // set default header data
                    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'NEW HORIZON MATERNITY HOSPITAL', "Accounting Department\nwww.mail.momiwebs.com.ng", array(0, 191, 255));


                    // set header and footer fonts
                    $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
                    $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

                    // set default monospaced font
                    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

                    // set margins
                    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

                    // set auto page breaks
                    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

                    // set image scale factor
                    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

                    // set some language-dependent strings (optional)
                    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
                        require_once(dirname(__FILE__) . '/lang/eng.php');
                        $pdf->setLanguageArray($l);
                    }

                    // ---------------------------------------------------------

                    // set font
                    $pdf->SetFont('dejavusans', '', 8);

                    // add a page
                    $pdf->AddPage();

                    // create some HTML content
                    $html = '
                            <h1>Hello, ' . $fname . '</h1>
                                <table border="1" cellpadding="5" cellspacing="2" style="color:#990000;font-size: 9pt;">
                                    <tr >
                                        <td width="280" align="left">
                                        PATIENT ID: ' . $patient . '
                                        </td>
                                    </tr>        
                                    <tr>
                                        <td width="280" align="left">
                                        PATIENT NAME: ' . $fname . ' ' . $sql_array['lastname'] . '
                                        </td>
                                    </tr>        
                                    <tr>
                                        <td width="280" align="left">
                                        SERVICE PAID FOR: ' . $service_paid_for . '
                                        </td>
                                    </tr>        
                                    <tr>
                                        <td width="280" align="left">
                                            AMOUNT PAID: &#8358;' . number_format($amount_she_paid, 2) . '
                                        </td>
                                    </tr>        
                                    <tr>
                                        <td width="280" align="left">
                                            AMOUNT REMAINING: &#8358;' . number_format($her_debt, 2) . '
                                        </td>
                                    </tr>        
                                    <tr>
                                        <td width="280" align="left">
                                            PAYMENT PLAN CHOOSED: ' . $installment . '
                                        </td>
                                    </tr>        
                                </table>

                            <p>Below is your account statement with NHMH.</p>
                                <table border="1" cellpadding="3" cellspacing="2">
                                    <tr>
                                        <td width="110" align="center">
                                            PLAN ID
                                        </td>
                                        <td width="110" align="center">
                                            TRANSACTION ID
                                        </td>
                                        <td width="110" align="center">
                                            AMOUNT TO PAY
                                        </td>
                                        <td width="120" align="center">
                                            DATE TO PAY
                                        </td>
                                        <td  width="140" align="center">
                                            DATE OF TRANSACTION
                                        </td>
                                    </tr>
                                    
                                        ' . $output . '
                                    
                                </table>
                            ';

                    // output the HTML content
                    $pdf->writeHTML($html, true, false, true, false, '');
                    $id = "PAT" . $patient . md5(rand());
                    $pdfname = $id . ".pdf";
                    //Close and output PDF document
                    // $pdf->Output($pdfname, 'D');
                    // $pdf_string = $pdf->Output($pdfname, 'D');
                    $pdf->Output(__DIR__ . '/' . $pdfname, 'F');

                // $pdf_string = $pdf->Output();
                // file_put_contents($pdfname, $pdf_string);
                
                $emailSender = new EmailSender();
                $emailSender->paymentReceiptOne($sql_array['email'], $pdfname, $service, $deposit, $price, $planChoice, $remains, $fname);

                    echo "Successful";

                } else {
                    echo "error";
                }
            } else {
                echo "error adding to transactions";
            }
    }
    else{
        echo "Could not get service information.";
    }

}