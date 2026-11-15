<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Joining Letter - Chandra Trading Ltd.</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bengali Font -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
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
            padding: 50px;
            overflow: hidden;
            background: var(--paper);
            border: 1px solid #e1e8e3;
            border-radius: 10px;
            box-shadow: 0 14px 42px rgba(22, 54, 37, .09);
        }

        .header{
            display: none !important;
        }
        .footer{
            display: none !important;
        }

        .letter-container::before {
            position: absolute;
            inset: 0 0 auto;
            height: 7px;
            background: #9DB9C6;
            content: "";
        }

        /* Action Bar */

        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            text-decoration: none;
        }

        .print-btn:hover {
            color: #fff;
            background: var(--brand-dark);
        }

        /* Company Header */

        .header img {
            width: 100%;
            border-bottom: 2px solid #302D2E;
        }

        /* Letter Meta */

        .letter-meta {
            display: flex;
            justify-content: space-between;
            margin: 10px 0 5px;
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
            padding: 10px 12px 6px;
            color: #fff;
            border-bottom: 2px solid var(--brand);
            font-size: 22px;
            font-weight: 700;
            background: #3A4EA2;
            border-radius: 5px;
        }


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

        .info-label {
            flex: 0 0 110px;
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

        .appointment_letters-img {
            flex: 0 0 94px;
        }

        .appointment_letters-img img {
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
            font-size: 13px;
        }

        .intro-text {
            margin: 0 0 19px;
            color: #303a34;
            font-size: 13px;
            line-height: 1.8;
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
            padding-left: 22px;
        }

        .terms-list li {
            margin-bottom: 10px;
            color: #303a34;
            font-size: 13px;
            line-height: 1.8;
            text-align: justify;
        }

        /* Signature */

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
            font-size: 11.5px;
            line-height: 1.6;
        }

        .signature-line img {
            width: 100px;
            max-height: 45px;
            object-fit: contain;
        }

        /* Footer */

        .footer img {
            width: 100%;
            margin-top: 30px;
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

            .title h2 {
                font-size: 19px;
            }

            .applicant-card {
                align-items: flex-start;
                gap: 12px;
                padding: 13px;
            }

            .info-label {
                flex-basis: 85px;
                font-size: 10.5px;
            }

            .info-value {
                font-size: 11px;
            }

            .signature-section {
                gap: 20px;
                margin-top: 45px;
            }

            .letter-meta {
                gap: 10px;
                font-size: 10px;
            }
        }

        /* A4 Print */

        @page {
            size: A4 portrait;
            margin: 0;
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

            .action-bar {
                display: none !important;
            }

            .letter-container {
                width: 100%;
                max-width: none;
                min-height: 0;
                margin: 0 !important;
                padding: 10mm 22mm !important;
                border: 0;
                border-radius: 0;
                box-shadow: none;
            }

            .signature-section {
                margin-top: 55px !important;
            }

            .section-heading,
            .applicant-card,
            .title h2 {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
        }
    </style>
</head>

<body>

    <?php
    // Applicant information
    $name = $staff_joining_letters->name ?? '-';

    $designation = $staff_joining_letters->designation ?? '-';
    $employee_id = $staff_joining_letters->employee_id ?? '-';
    $joining_date = $staff_joining_letters->joining_date ?? '-';

   

    $letter_number = $staff_joining_letters->reference_no ?? 'CTL/HR/2026/0001';
    ?>

    <div class="letter-container">

        <!-- Action Bar -->

        <div class="action-bar no-print">

            <p></p>

            <button id="print_button" class="print-btn" onclick="window.print()">
                <i class="fas fa-print"></i> Print
            </button>

        </div>

        <!-- Company Letterhead -->

        <div class="header">

            <img src="<?= base_url('assets/uploads/letter_pad/CTL PNG-01.png'); ?>"
                alt="Chandra Trading Limited Letterhead">

        </div>


        <div class="letter-meta">

           <div>
            
           </div>

            <div>
                <strong>Date:</strong>
                <?= $joining_date?>
            </div>

        </div>


        <div class="title">
            <h2>Joining Letter</h2>
        </div>



        <div class="content">

            <p class="intro-text">

                To,<br>

                Managing Director<br>
                Chandra Trading Limited<br>

                <strong>Subject: Joining Letter for Employment.</strong> <br>
                <strong>Reference No.:</strong>
                <?= html_escape($letter_number); ?>

            </p>

            <p class="intro-text">

                Dear Sir,

            </p>

            <p class="intro-text">

                With due respect, I am
                <strong><?= html_escape($name); ?></strong>,
                appointed as
                <strong><?= html_escape($designation); ?></strong>
                at your organization, officially joining my duties and workplace today,
                <strong><?= html_escape($joining_date); ?></strong>.

                I pledge to perform the duties assigned to me with honesty, dedication, and responsibility, strictly
                abiding by the rules, regulations, policies, and instructions of your organization.

            </p>

            <p class="intro-text mt-4">

                Therefore, I sincerely request you to kindly accept my joining letter and grant me the opportunity to
                discharge my duties.

            </p>

            <p class="intro-text">
                Sincerely yours,
            </p>

            <!-- Signature Section -->

            <div class="signature-section">

                <div class="signature-box">

                    <div class="signature-line">

                        
                    </div>

                </div>

                <div class="signature-box">

                    <div class="signature-line">
                            <img src="<?= base_url('./assets/uploads/staff_sign/' . $staff_joining_letters->signature) ?>"
                                alt="Authorized Signature">
                                <br>
                        <strong><?= html_escape($name); ?></strong><br>

                        <?= html_escape($designation); ?><br>

                        Chandra Trading Limited.

                    </div>

                </div>

            </div>

        </div>

        <!-- Company Footer -->

        <div class="footer">

            <img src="<?= base_url('assets/uploads/letter_pad/CTL PNG-02.png'); ?>" alt="Company Footer">

        </div>

    </div>

</body>

</html>