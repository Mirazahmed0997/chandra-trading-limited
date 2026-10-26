<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Appointment Letter - Chandra Trading Ltd.</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #ffffff;
            color: #202b27;
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 12px;
            line-height: 1.5;
        }

        .letter-container {
            width: 100%;
            margin: 0 auto;
            background: #ffffff;
            padding: 10px;
        }

        /* Top Bar */
        .top-bar {
            height: 4px;
            background: #9DB9C6;
            width: 100%;
            margin-bottom: 0px;
        }

        /* Header Table */
        .header-table {
            width: 100%;
            border-bottom: 2px solid #145c3a;
            background: #9DB9C6;
            border-collapse: collapse;
        }

        .header-table td {
            padding: 12px 15px;
            vertical-align: middle;
        }

        .logo img {
            width: 150px;
            height: auto;
            display: block;
        }

        .company-details {
            text-align: right;
            color: #ffffff;
        }

        .company-name {
            margin: 0 0 4px;
            font-size: 20px;
            font-weight: bold;
        }

        .company-info {
            font-size: 10.5px;
            line-height: 1.5;
        }

        /* Meta Table */
        .letter-meta {
            width: 100%;
            margin: 15px 0 10px;
            font-size: 11.5px;
            color: #65716b;
            border-collapse: collapse;
        }

        /* Title */
        .title {
            text-align: center;
            margin: 10px 0 15px;
        }

        .title h2 {
            display: inline-block;
            margin: 0;
            padding-bottom: 4px;
            color: #0b4028;
            border-bottom: 2px solid #145c3a;
            font-size: 17px;
            font-weight: bold;
        }

        /* Applicant Info Table */
        .applicant-table {
            width: 100%;
            background: #eef6f1;
            border: 1px solid #d6e7dc;
            border-left: 4px solid #145c3a;
            margin-bottom: 15px;
            border-collapse: collapse;
        }

        .applicant-table td {
            padding: 10px 12px;
            vertical-align: top;
        }

        .info-label {
            width: 125px;
            font-weight: bold;
            color: #34463b;
            font-size: 11px;
        }

        .info-value {
            color: #26342c;
            font-size: 11px;
        }

        .applicant-img img {
            width: 80px;
            height: 100px;
            object-fit: cover;
            border: 2px solid #ffffff;
        }

        /* Content */
        .intro-text {
            margin: 0 0 12px;
            text-align: justify;
            color: #303a34;
            font-size: 11.5px;
            line-height: 1.6;
        }

        .section-heading {
            margin: 12px 0 8px;
            padding: 6px 10px;
            color: #0b4028;
            background: #f3f7f4;
            border-left: 4px solid #145c3a;
            font-weight: bold;
            font-size: 11.5px;
        }

        .terms-list {
            margin: 0;
            padding-left: 18px;
        }

        .terms-list li {
            margin-bottom: 6px;
            text-align: justify;
            font-size: 11px;
            line-height: 1.5;
            color: #303a34;
        }

        /* Signatures */
        .signature-table {
            width: 100%;
            margin-top: 40px;
            border-collapse: collapse;
        }

        .signature-table td {
            width: 50%;
            vertical-align: bottom;
            text-align: right;
        }

        .signature-line {
            border-top: 1px solid #7d8981;
            padding-top: 6px;
            font-size: 11px;
            display: inline-block;
            text-align: center;
            min-width: 180px;
        }

        /* Footer */
        .footer {
            margin-top: 25px;
            padding: 8px;
            background: #9DB9C6;
            color: #ffffff;
            text-align: center;
            font-size: 9.5px;
            font-weight: bold;
        }

        .footer p {
            margin: 2px 0;
        }
    </style>
</head>

<body>

    <div class="letter-container">
        <div class="top-bar"></div>

        <!-- Header Table -->
        <table class="header-table" cellpadding="0" cellspacing="0">
            <tr>
                <td width="30%">
                    <?php 
                        $logo_path = FCPATH . 'assets/uploads/CTL_logo_Finalll.png';
                        if (file_exists($logo_path)) {
                            echo '<img src="' . $logo_path . '" alt="CTL Logo" style="width:150px; display:block;" />';
                        }
                    ?>
                </td>
                <td width="70%" class="company-details">
                    <div class="company-name">Chandra Trading Ltd.</div>
                    <div class="company-info">
                        Lily Pond Center, Floor 21, Mission Road,<br>
                        Motijheel, Dhaka-1203, Bangladesh
                    </div>
                </td>
            </tr>
        </table>

        <!-- Meta Table -->
        <table class="letter-meta" cellpadding="0" cellspacing="0">
            <tr>
                <td><strong>Ref:</strong> <?= html_escape($appointment_letters->letter_number ?? '-'); ?></td>
                <td style="text-align: right;"><strong>Date:</strong> <?= html_escape($appointment_letters->appointment_date ?? '-'); ?></td>
            </tr>
        </table>

        <!-- Title -->
        <div class="title">
            <h2>Appointment Letter</h2>
        </div>

        <!-- Applicant Info Table -->
        <table class="applicant-table" cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="info-label">Name</td>
                            <td class="info-value">: <?= html_escape($appointment_letters->employee_name ?? '-'); ?></td>
                        </tr>
                        <tr>
                            <td class="info-label">Father's Name</td>
                            <td class="info-value">: <?= html_escape($appointment_letters->father_name ?? '-'); ?></td>
                        </tr>
                        <tr>
                            <td class="info-label">Mother's Name</td>
                            <td class="info-value">: <?= html_escape($appointment_letters->mother_name ?? '-'); ?></td>
                        </tr>
                        <tr>
                            <td class="info-label">Permanent Address</td>
                            <td class="info-value">: <?= html_escape($appointment_letters->permanent_address ?? '-'); ?></td>
                        </tr>
                        <tr>
                            <td class="info-label">Present Address</td>
                            <td class="info-value">: <?= html_escape($appointment_letters->present_address ?? '-'); ?></td>
                        </tr>
                        <tr>
                            <td class="info-label">Joining Date</td>
                            <td class="info-value">: <?= html_escape($appointment_letters->joining_date ?? '-'); ?></td>
                        </tr>
                    </table>
                </td>
                <td width="90" style="text-align: right;">
                    <?php 
                        if (!empty($application->photo_url)) {
                            $photo_path = FCPATH . 'assets/uploads/applications/photo/' . $application->photo_url;
                            if (file_exists($photo_path)) {
                                echo '<img src="' . $photo_path . '" alt="Applicant Photo" style="width:80px; height:100px; object-fit:cover; border:2px solid #fff;" />';
                            }
                        }
                    ?>
                </td>
            </tr>
        </table>

        <!-- Content -->
        <div class="content">
            <p class="intro-text">
                <?= html_escape($appointment_letters->additional_instructions ?? 'N/A'); ?>
            </p>

            <div class="section-heading">
                Terms and Conditions of Appointment
            </div>

            <ol class="terms-list">
                <?php
                $conditions = $appointment_letters->conditions ?? '';
                if (!empty($conditions)) {
                    $items = explode('-', $conditions);
                    foreach ($items as $item) {
                        $item = trim($item);
                        if (!empty($item)) {
                            echo '<li>' . html_escape($item) . '</li>';
                        }
                    }
                } else {
                    echo '<li>N/A</li>';
                }
                ?>
            </ol>

            <!-- Signatures -->
            <table class="signature-table" cellpadding="0" cellspacing="0">
                <tr>
                    <td></td>
                    <td>
                        <div class="signature-line">
                            <strong><?= html_escape($appointment_letters->reporting_authority ?? 'N/A'); ?></strong><br>
                            <?= html_escape($loggedUser->designation ?? 'N/A'); ?>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>This appointment letter has been generated automatically. Please contact us if you require any assistance.</p>
            <p><strong>Email:</strong> ctl05.2026@gmail.com | <strong>Mobile:</strong> +880 1709-653400</p>
        </div>
    </div>

</body>

</html>