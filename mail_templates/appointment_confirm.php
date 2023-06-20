<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>w3newbie HTML Email</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

        body {
            Margin: 0;
            padding: 0;
        }

        table {
            border-spacing: 0;
        }

        td {
            padding: 0;
        }

        img {
            border: 0;
        }

        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #f6f6f9;
            padding-bottom: 40px;
        }

        .webkit {
            max-width: 600px;
            background: #ffffff;
        }

        .outer {
            Margin: 0 auto;
            width: 100%;
            max-width: 600px;
            border-spacing: 0;
            font-family: 'Poppins', sans-serif;
            color: #4a4a4a;
        }

        a {
            background-color: #1a8c97;
            color: #ffffff;
            padding: .5rem;
        }

        @media screen and (max-width: 600px) {}

        @media screen and (max-width: 400px) {}
    </style>
</head>

<body>
    <center class="wrapper">
        <div class="webkit">
            <table class="outer" align="center">
                <tr>
                    <td>
                        <table width="100%" style="border-spacing: 0;">
                            <!-- contains logo -->
                            <tr>
                                <td style="background-color: #1a8c97;padding:10px;text-align:center;">
                                    <a href="https://mail.momiwebs.com.ng">
                                        <img src="cid:logo" width="120" alt="Logo" title="NHMH Logo">
                                    </a>
                                    <!-- <h1>Welcome</h1> -->
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" style="border-spacing: 0;">
                            <!-- contains logo -->
                            <tr>
                                <td style="padding:10px;text-align:left;">
                                    <p>Hello, {firstname} .</p>
                                    <p>This is an email to confirm your appointment with <span style="color: #1a8c97;font-weight: 600;">Doctor {doctor}</span></p>
                                    <p> Below are the information of the apointment. </p>
                                    <p style="color: #1a8c97;font-weight: 600;">Doctor To See: Doctor {doctor}</p>
                                    <p style="color: #1a8c97;font-weight: 600;">Date of Appointment: {app_date}</p>
                                    <p style="color: #1a8c97;font-weight: 600;">Time of Appointment: {app_time}</p>

                                    <p>Please ensure you keep to time as lateness is not condoned at <span style=" color: #1a8c97;font-weight: 600;">NHMH</span>.</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" style="border-spacing: 0;">
                            <tr>
                                <td style="padding:10px;text-align:center;background-color: #1a8c97;color: #ffffff;">
                                    <a href="https://mail.momiwebs.com.ng">
                                        <img src="cid:logo" width="70" alt="Logo" title="NHMH Logo">
                                    </a>

                                </td>
                            </tr>
                            <tr>
                                <td style="padding:10px;text-align:center;background-color: #1a8c97;color: #ffffff;">
                                    <small>New Horizon Maternity Hospital</small>
                                    <p><a href="tel:08105029113">08105029113</a> <br>D29 Lejina Estate Adamo Ikorodu, Lagos.</p>

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </center>
</body>

</html>