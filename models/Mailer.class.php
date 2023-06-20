<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

class EmailSender
{
    private $HOST;
    private $USERNAME;
    private $PASSWORD;
    private $PORT;

    public function __construct()
    {
        $this->HOST = 'smtp.gmail.com';
        $this->USERNAME = 'nhbank.rep@gmail.com';
        $this->PASSWORD = 'abnxlvvbknpqsedb';
        $this->PORT = 465;

        //    MAIL_MAILER=smtp
        //     MAIL_HOST=smtp.gmail.com
        //     MAIL_PORT=465
        //     MAIL_USERNAME=nhbank.rep@gmail.com
        //     MAIL_PASSWORD=abnxlvvbknpqsedb
        //     MAIL_ENCRYPTION=ssl
        //     MAIL_FROM_ADDRESS="nhbank.rep@gmail.com"
    }

    public function sendEmailOne($email, $uniqueOtp)
    {
        // Code to send email using recipient, subject, and message parameters

        try {
            // run program to send mail with details to patient.
            $mail = new PHPMailer(true);

            //$mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = $this->HOST;
            $mail->SMTPAuth = true;
            $mail->Username = $this->USERNAME;
            $mail->Password = $this->PASSWORD;
            $mail->SMTPSecure = 'ssl';
            $mail->Port = $this->PORT;

            $mail->setFrom($this->USERNAME, 'New Horizon Maternity Hospital');

            $mail->addAddress($email);

            $mail->isHTML(true);

            $mail->Subject = "New Horizon Maternity Hospital- Verify New Patient.";

            $mail->Headers = array(
                "MIME-Version" => "1.0",
                "Content-Type" => "text/html;charset=UTF-8"
            );

            $mail->Body = file_get_contents("../mail_templates/otp_send_temp.php");

            $mail->AddEmbeddedImage('../mail_templates/newLogo3.png', 'logo');

            $swap_var = array(
                "{otp_pin}" => "$uniqueOtp"
            );

            foreach (array_keys($swap_var) as $key) {
                if (
                    strlen($key) > 2 && trim($key) != ""
                ) {
                    $mail->Body = str_replace($key, $swap_var[$key], $mail->Body);
                }
            }

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function sendEmailTwo($email, $firstname, $username, $password, $position, $template, $id)
    {
        try {
            // run program to send mail with details to patient.
            $mail = new PHPMailer(true);

            //$mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = $this->HOST;
            $mail->SMTPAuth = true;
            $mail->Username = $this->USERNAME;
            $mail->Password = $this->PASSWORD;
            $mail->SMTPSecure = 'ssl';
            $mail->Port = $this->PORT;

            $mail->setFrom($this->USERNAME, 'New Horizon Maternity Hospital');

            $mail->addAddress($email);

            $mail->isHTML(true);

            $mail->Subject = "New Horizon Maternity Hospital- Welcome New {$position}.";

            $mail->Headers = array(
                "MIME-Version" => "1.0",
                "Content-Type" => "text/html;charset=UTF-8"
            );

            $mail->AddEmbeddedImage('../mail_templates/newLogo3.png', 'logo');

            $mail->Body = file_get_contents("../mail_templates/{$template}.php");

            $swap_var = array(
                "{username}" => "$username",
                "{password}" => "$password",
                "{firstname}" => "$firstname",
                "{id}" => "$id"
            );

            foreach (array_keys($swap_var) as $key) {
                if (
                    strlen($key) > 2 && trim($key) != ""
                ) {
                    $mail->Body = str_replace($key, $swap_var[$key], $mail->Body);
                }
            }

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function cancelAppointmentOne($email, $firstname, $doctor, $app_date)
    {
        try {
            // run program to send mail with details to patient.
            $mail = new PHPMailer(true);

            //$mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = $this->HOST;
            $mail->SMTPAuth = false;
            $mail->Username = $this->USERNAME;
            $mail->Password = $this->PASSWORD;
            $mail->SMTPSecure = 'ssl';
            $mail->Port = $this->PORT;

            $mail->setFrom($this->USERNAME, 'New Horizon Maternity Hospital');

            $mail->addAddress($email);

            $mail->isHTML(true);

            $mail->Subject = "New Horizon Maternity Hospital- Patient Appointment Cancelled.";

            $mail->Headers = array(
                "MIME-Version" => "1.0",
                "Content-Type" => "text/html;charset=UTF-8"
            );

            $mail->AddEmbeddedImage('../mail_templates/newLogo3.png', 'logo');

            $mail->Body = file_get_contents("../mail_templates/patientCancelApp.php");

            $swap_var = array(
                "{firstname}" => "$firstname",
                "{doctor}" => "$doctor",
                "{app_date}" => "$app_date"
            );

            foreach (array_keys($swap_var) as $key) {
                if (
                    strlen($key) > 2 && trim($key) != ""
                ) {
                    $mail->Body = str_replace($key, $swap_var[$key], $mail->Body);
                }
            }

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function cancelAppointmentTwo($email, $firstname, $patient_id, $app_date)
    {
        try {
            // run program to send mail with details to patient.
            $mail = new PHPMailer(true);

            //$mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = $this->HOST;
            $mail->SMTPAuth = false;
            $mail->Username = $this->USERNAME;
            $mail->Password = $this->PASSWORD;
            $mail->SMTPSecure = 'ssl';
            $mail->Port = $this->PORT;

            $mail->setFrom($this->USERNAME, 'New Horizon Maternity Hospital');

            $mail->addAddress($email);

            $mail->isHTML(true);

            $mail->Subject = "New Horizon Maternity Hospital- Patient Appointment Cancelled.";

            $mail->Headers = array(
                "MIME-Version" => "1.0",
                "Content-Type" => "text/html;charset=UTF-8"
            );

            $mail->AddEmbeddedImage('../mail_templates/newLogo3.png', 'logo');

            $mail->Body = file_get_contents("../mail_templates/doctorCancelApp.php");

            $swap_var = array(
                "{firstname}" => "$firstname",
                "{patient_id}" => "$patient_id",
                "{app_date}" => "$app_date"
            );

            foreach (array_keys($swap_var) as $key) {
                if (
                    strlen($key) > 2 && trim($key) != ""
                ) {
                    $mail->Body = str_replace($key, $swap_var[$key], $mail->Body);
                }
            }

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function newAppointment($email, $patient_firstname, $doctor_firstname, $app_date, $app_time)
    {
        try {
            // run program to send mail with details to patient.
            $mail = new PHPMailer(true);

            //$mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = $this->HOST;
            $mail->SMTPAuth = false;
            $mail->Username = $this->USERNAME;
            $mail->Password = $this->PASSWORD;
            $mail->SMTPSecure = 'ssl';
            $mail->Port = $this->PORT;

            $mail->setFrom($this->USERNAME, 'New Horizon Maternity Hospital');

            $mail->addAddress($email);

            $mail->isHTML(true);

            $mail->Subject = "New Horizon Maternity Hospital- Patient Appointment confirmation.";

            $mail->Headers = array(
                "MIME-Version" => "1.0",
                "Content-Type" => "text/html;charset=UTF-8"
            );

            $mail->AddEmbeddedImage('../mail_templates/newLogo3.png', 'logo');

            $mail->Body = file_get_contents("../mail_templates/appointment_confirm.php");

            $swap_var = array(
                "{patient_firstname}" => "$patient_firstname",
                "{doctor_firstname}" => "$doctor_firstname",
                "{app_date}" => "$app_date",
                "{app_time}" => "$app_time"
            );

            foreach (array_keys($swap_var) as $key) {
                if (
                    strlen($key) > 2 && trim($key) != ""
                ) {
                    $mail->Body = str_replace($key, $swap_var[$key], $mail->Body);
                }
            }

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function paymentReceiptOne($email, $pdfname, $service, $deposit, $price, $planChoice, $remains, $fname)
    {
        try {
            // run program to send mail with details to patient.
            $mail = new PHPMailer(true);

            //$mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = $this->HOST;
            $mail->SMTPAuth = false;
            $mail->Username = $this->USERNAME;
            $mail->Password = $this->PASSWORD;
            $mail->SMTPSecure = 'ssl';
            $mail->Port = $this->PORT;

            $mail->setFrom($this->USERNAME, 'New Horizon Maternity Hospital');

            $mail->addAddress($email);

            $mail->isHTML(true);

            $mail->AddAttachment(__DIR__ . '/' . $pdfname);

            $mail->Subject = "New Horizon Maternity Hospital- Payment Receipt.";

            $mail->Headers = array(
                "MIME-Version" => "1.0",
                "Content-Type" => "text/html;charset=UTF-8"
            );

            $mail->Body = file_get_contents("../email_temp/payment_receipt.php");

            $mail->AddEmbeddedImage('../mail_templates/newLogo3.png', 'logo');

            $swap_var = array(
                "{service}" => "$service",
                "{deposit}" => "$deposit",
                "{service_price}" => "$price",
                "{plan_choice}" => "$planChoice",
                "{amt_remain}" => "$remains",
                "{firstname}" => "$fname"
            );

            foreach (array_keys($swap_var) as $key) {
                if (strlen($key) > 2 && trim($key) != "") {
                    $mail->Body = str_replace($key, $swap_var[$key], $mail->Body);
                }
            }

            $mail->send();

            unlink(__DIR__ . '/' . $pdfname);
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function paymentReceiptTwo($email, $pdfname, $service, $deposit, $price, $fname)
    {
        try {
            // run program to send mail with details to patient.
            $mail = new PHPMailer(true);

            //$mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = $this->HOST;
            $mail->SMTPAuth = false;
            $mail->Username = $this->USERNAME;
            $mail->Password = $this->PASSWORD;
            $mail->SMTPSecure = 'ssl';
            $mail->Port = $this->PORT;

            $mail->setFrom($this->USERNAME, 'New Horizon Maternity Hospital');

            $mail->addAddress($email);

            $mail->isHTML(true);

            $mail->AddAttachment(__DIR__ . '/' . $pdfname);

            $mail->Subject = "New Horizon Maternity Hospital- Payment Receipt.";

            $mail->Headers = array(
                "MIME-Version" => "1.0",
                "Content-Type" => "text/html;charset=UTF-8"
            );

            $mail->Body = file_get_contents("../mail_templates/no_installment_recipt.php");

            $mail->AddEmbeddedImage('../mail_templates/newLogo3.png', 'logo');

            $swap_var = array(
                "{service}" => "$service",
                "{service_price}" => "$price",
                "{deposit}" => "$deposit",
                "{firstname}" => "$fname"
            );

            foreach (array_keys($swap_var) as $key) {
                if (strlen($key) > 2 && trim($key) != "") {
                    $mail->Body = str_replace($key, $swap_var[$key], $mail->Body);
                }
            }

            $mail->send();

            unlink(__DIR__ . '/' . $pdfname);
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }


    public function sendTest($email, $message)
    {
        try {
            // run program to send mail with details to patient.
            $mail = new PHPMailer(true);

            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = $this->HOST;
            $mail->SMTPAuth = false;
            $mail->Username = $this->USERNAME;
            $mail->Password = $this->PASSWORD;
            $mail->SMTPSecure = 'ssl';
            $mail->Port = $this->PORT;

            $mail->setFrom($this->USERNAME, 'New Horizon Maternity Hospital');

            $mail->addAddress($email);

            $mail->isHTML(true);

            // $mail->AddAttachment(__DIR__ . '/' . $pdfname);

            $mail->Subject = "New Horizon Maternity Hospital- Payment Receipt.";

            $mail->Headers = array(
                "MIME-Version" => "1.0",
                "Content-Type" => "text/html;charset=UTF-8"
            );

            $mail->Body = $message;
            // $mail->Body = file_get_contents("../mail_templates/no_installment_recipt.php");

            $mail->AddEmbeddedImage('../mail_templates/newLogo3.png', 'logo');

            // $swap_var = array(
            //     "{service}" => "$service",
            //     "{service_price}" => "$price",
            //     "{deposit}" => "$deposit",
            //     "{firstname}" => "$fname"
            // );

            // foreach (array_keys($swap_var) as $key) {
            //     if (strlen($key) > 2 && trim($key) != "") {
            //         $mail->Body = str_replace($key, $swap_var[$key], $mail->Body);
            //     }
            // }

            $mail->send();

            // unlink(__DIR__ . '/' . $pdfname);
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
