<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Letter - Chandra Trading Ltd.</title>

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --brand: #145c3a;
            --brand-dark: #0b4028;
            --brand-soft: #eef6f1;
            --ink: #202b27;
            --muted: #65716b;
            --line: #d9e3dc;
            --paper: #ffffff;
            --page-bg: #edf1ee;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 32px 16px;
            background: var(--page-bg);
            color: var(--ink);
            font-family: 'Noto Sans Bengali', Arial, sans-serif;
            font-size: 13px;
            line-height: 1.65;
        }

        .letter-container {
            position: relative;
            width: 100%;
            max-width: 850px;
            min-height: 1050px;
            margin: 0 auto;
            padding: 42px 48px 30px;
            overflow: hidden;
            background: var(--paper);
            border: 1px solid #e1e8e3;
            border-radius: 10px;
            box-shadow: 0 14px 42px rgba(22, 54, 37, .09);
        }

        .letter-container::before {
            position: absolute;
            inset: 0 0 auto;
            height: 7px;
            background: #9DB9C6;
            /* background: linear-gradient(90deg, var(--brand-dark), #2f875c); */
            content: "";
        }

        /* Print Button */
        .action-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 22px;
        }

        .print-btn {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 10px 17px;
            color: #fff;
            background: var(--brand);
            border: 0;
            border-radius: 6px;
            font: 600 13px Arial, sans-serif;
            cursor: pointer;
            transition: background .2s ease;
        }

        .print-btn:hover {
            background: var(--brand-dark);
        }

        /* Company Header */
        .header {
            text-align: center;
            display: flex;
            align-items: center;
            gap: 24px;
            padding-bottom: 23px;
            border-bottom: 2px solid var(--brand);
            background: #9DB9C6;
            padding: 20px;
            color: #fff;
            font-weight: bold;
        }

        .logo {
            display: flex;
            flex: 0 0 112px;
            align-items: center;
            justify-content: center;
            width: 112px;
            height: 100px;
        }

        .logo img {
            display: block;
            width: 200px;
            /* max-height: 100px; */
            object-fit: contain;
            position: absolute;
            left: 40px;
        }

        .company-details {
            position: absolute;
            right: 190px;
        }

        .company-name {
            margin: 0 0 5px;
            /* color: var(--brand-dark); */
            font-size: 25px;
            font-weight: 700;
            line-height: 1.3;
        }

        .company-info {
            /* color: var(--muted); */
            font-size: 11.5px;
            line-height: 1.8;
        }

        /* Date */
        .letter-meta {
            display: flex;
            justify-content: space-between;
            margin: 22px 0 8px;
            color: var(--muted);
            font-size: 12px;
        }

        /* Document Title */
        .title {
            margin: 10px 0 24px;
            text-align: center;
        }

        .title h2 {
            display: inline-block;
            margin: 0;
            padding-bottom: 8px;
            color: var(--brand-dark);
            border-bottom: 2px solid var(--brand);
            font-size: 22px;
            font-weight: 700;
            letter-spacing: .2px;
        }

        /* appointment_letters Information */
        .applicant-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 22px;
            margin-bottom: 25px;
            padding: 18px 20px;
            background: var(--brand-soft);
            border: 1px solid #d6e7dc;
            border-left: 4px solid var(--brand);
            border-radius: 7px;
        }

        .applicant-info {
            flex: 1;
            min-width: 0;
        }

        .info-row {
            display: flex;
            gap: 8px;
            margin-bottom: 7px;
            font-size: 12px;
            line-height: 1.55;
        }

        .info-row:last-child {
            margin-bottom: 0;
        }

        .info-label {
            flex: 0 0 132px;
            color: #34463b;
            font-size: 11.5px;
            font-weight: 700;
        }

        .info-value {
            min-width: 0;
            color: #26342c;
            overflow-wrap: anywhere;
            font-size: 12px;
        }

        .applicant-img {
            flex: 0 0 94px;
        }

        .applicant-img img {
            display: block;
            width: 94px;
            height: 112px;
            object-fit: cover;
            border: 3px solid #fff;
            border-radius: 5px;
            box-shadow: 0 2px 8px rgba(20, 60, 38, .14);
        }

        /* Letter Content */
        .content {
            margin-top: 0;
            font-size: 13px;
        }

        .intro-text {
            margin: 0 0 19px;
            color: #303a34;
            font-size: 13px;
            line-height: 1.9;
            text-align: justify;
        }

        .section-heading {
            margin: 20px 0 12px;
            padding: 9px 13px;
            color: var(--brand-dark);
            background: #f3f7f4;
            border: 1px solid #e0e9e2;
            border-left: 4px solid var(--brand);
            border-radius: 4px;
            font-size: 13px;
            font-weight: 700;
        }

        .terms-list {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .terms-list li {
            position: relative;
            margin: 0 0 9px;
            padding-left: 28px;
            color: #303a34;
            font-size: 12.5px;
            line-height: 1.75;
            text-align: justify;
        }

        .terms-list li .num {
            position: absolute;
            top: 0;
            left: 0;
            color: var(--brand);
            font-weight: 700;
        }

        /* Signature Section */
        .signature-section {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 35px;
            margin-top: 58px;
            page-break-inside: avoid;
            break-inside: avoid;
        }

        .signature-box {
            flex: 1;
            min-width: 0;
            max-width: 220px;
            text-align: center;
        }

        .signature-line {
            min-height: 45px;
            padding-top: 9px;
            color: var(--ink);
            border-top: 1px solid #7d8981;
            font-size: 11.5px;
            line-height: 1.6;
        }

        /* Footer */
        .footer {
            margin-top: 35px;
            padding-top: 13px;
            color: var(--muted);
            border-top: 1px solid var(--line);
            font-size: 10.5px;
            line-height: 1.7;
            text-align: center;
            page-break-inside: avoid;
            background: #9DB9C6;
            color: #fff;
            font-weight: 800;
        }

        .footer p {
            margin: 2px 0;
        }

        /* Responsive */
        @media (max-width: 640px) {
            body {
                padding: 12px 7px;
            }

            .letter-container {
                min-height: 0;
                padding: 28px 20px 24px;
                border-radius: 7px;
            }

            .header {
                gap: 14px;
                align-items: flex-start;
            }

            .logo {
                flex-basis: 76px;
                width: 76px;
                height: 76px;
            }

            .logo img {
                max-height: 76px;
            }

            .company-name {
                font-size: 19px;
            }

            .company-info {
                font-size: 10px;
                overflow-wrap: anywhere;
            }

            .title h2 {
                font-size: 19px;
            }

            .applicant-card {
                align-items: flex-start;
                gap: 12px;
                padding: 13px;
            }

            .info-row {
                gap: 5px;
            }

            .info-label {
                flex-basis: 105px;
                font-size: 10.5px;
            }

            .info-value {
                font-size: 11px;
            }

            .applicant-img {
                flex-basis: 72px;
            }

            .applicant-img img {
                width: 72px;
                height: 88px;
            }

            .signature-section {
                gap: 20px;
                margin-top: 40px;
            }
        }

        /* A4 Print Layout */
        @page {
            size: A4 portrait;
            /* margin: 12mm; */
        }

        @media print {

            html,
            body {
                width: 100%;
                margin: 0 !important;
                padding: 0 !important;
                background: #fff !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            .letter-container {
                width: 100%;
                max-width: none;
                min-height: 0;
                margin: 0 !important;
                padding: 8mm 7mm 5mm !important;
                overflow: visible;
                border: 0;
                border-radius: 0;
                box-shadow: none;
            }

            .letter-container::before {
                height: 4px;
            }

            .action-bar {
                display: none !important;
            }

            .header,
            .applicant-card,
            .signature-section,
            .footer {
                break-inside: avoid;
                page-break-inside: avoid;
            }

            .header {
                display: flex;
                align-items: center;
                justify-items: center !important;
                padding-bottom: 23px;
                border-bottom: 2px solid var(--brand);
            }

            .logo img {
                display: block;
                width: 220px;
                /* max-height: 100px; */
                object-fit: contain;
                position: absolute;
                left: 20px;
            }

            .company-details {
                position: absolute;
                right: 265px;
            }

            .applicant-card {
                background: var(--brand-soft) !important;
            }

            .section-heading {
                background: #f3f7f4 !important;
            }

            .signature-section {
                margin-top: 42px;
            }

            a {
                color: inherit;
                text-decoration: none;
            }


        }
    </style>
</head>

<body>

    <div class="letter-container">

        <!-- Print Button -->
        <div class="action-bar">
             <div>
                
             </div>
            <button id="print_button" class="print-btn" onclick="window.print()">
                <i class="fas fa-print"></i> Print
            </button>
         
        </div>

        <!-- Company Header -->
        <div class="header">
            <div class="logo">
                <img src="<?= base_url('assets/uploads/CTL_logo_Finalll.png'); ?>" alt="CTL Logo">
            </div>

            <div class="company-details">
                <div class="company-name">Chandra Trading Ltd.</div>

                <div class="company-info">
                    Lily Pond Center, Floor 21, Mission Road,
                    Motijheel, Dhaka-1203, Bangladesh
                    <br>

                </div>
            </div>
        </div>

        <!-- Date -->
        <div class="letter-meta">
            <div><strong>Ref:</strong> <?= html_escape($appointment_letters->letter_number ?? '-'); ?></div>
            <div><strong>Date:</strong> <?= html_escape($appointment_letters->appointment_date ?? '-'); ?></div>
        </div>

        <!-- Title -->
        <div class="title">
            <h2>Appointment Letter</h2>
        </div>

        <!-- Applicant Information -->
        <div class="applicant-card">

            <div class="applicant-info">

                <div class="info-row">
                    <span class="info-label">Name</span>
                    <span class="info-value">: <?= html_escape($appointment_letters->employee_name ?? '-'); ?></span>
                </div>

                <div class="info-row">
                    <span class="info-label">Father's Name</span>
                    <span class="info-value">: <?= html_escape($appointment_letters->father_name ?? '-'); ?></span>
                </div>

                <div class="info-row">
                    <span class="info-label">Mother's Name</span>
                    <span class="info-value">: <?= html_escape($appointment_letters->mother_name ?? '-'); ?></span>
                </div>

                <div class="info-row">
                    <span class="info-label">Permanent Address</span>
                    <span class="info-value">
                        : <?= html_escape($appointment_letters->permanent_address ?? '-'); ?>
                    </span>
                </div>

                <div class="info-row">
                    <span class="info-label">Present Address</span>
                    <span class="info-value">
                        : <?= html_escape($appointment_letters->present_address ?? '-'); ?>
                    </span>
                </div>
                <div class="info-row">
                    <span class="info-label">Joinning Date</span>
                    <span class="info-value">
                        : <?= html_escape($appointment_letters->joining_date ?? '-'); ?>
                    </span>
                </div>

            </div>

            <div class="appointment_letters-img">
                <img width="100px"
                    src="<?= base_url('assets/uploads/applications/photo/' . $application->photo_url); ?>"
                    alt="appointment_letters's Photo">
            </div>

        </div>

        <!-- Appointment Content -->
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
            <div class="signature-section">

                <div class="signature-box">
                    <!-- <div class="signature-line">
                        Employee's Signature
                    </div> -->
                </div>

                <div class="signature-box">
                    <div class="signature-line">
                        <strong><?= html_escape($appointment_letters->reporting_authority ?? 'N/A'); ?></strong><br>
                        <?= html_escape($loggedUser->designation ?? 'N/A'); ?><br>
                    </div>
                </div>

            </div>

        </div>

        <!-- Footer -->
        <div class="footer">

            <p>
                This appointment letter has been generated
                automatically. Please contact us if you require
                any assistance.
            </p>

            <p>
                <strong>Email:</strong>
                ctl05.2026@gmail.com
                |
                <strong>Mobile:</strong>
                +880 1709-653400
            </p>

        </div>

    </div>



</body>

</html>