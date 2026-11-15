<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joining Letter - Chandra Trading Ltd.</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bengali Font -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --brand: #145c3a;
            --brand-dark: #0b4028;
            --brand-soft: #eef6f1;
            --ink: #202b27;
            --muted: #65716b;
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
            /* min-height: 850px !important; */
            margin: 0 auto;
            padding: 40px 50px;
            margin-top: 50px;
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
            content: "";
        }

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
        .header {
            display: none !important;
        }
        .footer {
            display: none !important;
        }

        .header img {
            width: 100%;
            border-bottom: 2px solid #302D2E;
        }

        .letter-meta {
            display: flex;
            justify-content: space-between;
            margin: 15px 0 5px;
            color: var(--muted);
            font-size: 12px;
        }

        .title {
            margin: 10px 0 20px;
            text-align: center;
        }

        .title h2 {
            display: inline-block;
            margin: 0;
            padding: 8px 16px 6px;
            color: #fff;
            font-size: 20px;
            font-weight: 700;
            background: #3A4EA2;
            border-radius: 5px;
        }

        .content {
            font-size: 13px;
        }

        .intro-text {
            margin: 0 0 16px;
            color: #303a34;
            font-size: 13px;
            line-height: 1.8;
            text-align: justify;
        }

        .signature-section {
            width: 100%;
            margin-top: 50px;
            overflow: hidden;
            page-break-inside: avoid;
            break-inside: avoid;
        }

        .signature-box {
            width: 45%;
            float: left;
            text-align: center;
        }

        .signature-box:last-child {
            float: right;
        }

        .signature-line {
            min-height: 45px;
            padding-top: 9px;
            color: var(--ink);
            font-size: 11.5px;
            line-height: 1.6;
        }

        .signature-line img {
            width: 110px;
            max-height: 45px;
            object-fit: contain;
            margin-bottom: 5px;
        }

        .footer img {
            width: 100%;
            margin-top: 35px;
        }

        @page {
            size: A4 portrait;
            margin: 10mm;
        }

        @media print {
            html, body {
                width: 100%;
                margin: 0 !important;
                padding: 0 !important;
                background: #fff !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            .action-bar, .no-print {
                display: none !important;
            }

            .letter-container {
                width: 100%;
                max-width: none;
                min-height: 1850px !important;
                margin: 0 !important;
                padding: 5mm 10mm !important;
                border: 0;
                border-radius: 0;
                box-shadow: none;
            }

            .signature-section {
                margin-top: 40px !important;
            }
        }
    </style>
</head>

<body>

    <?php
    $name = $staff_joining_letters->name ?? '-';
    $designation = $staff_joining_letters->designation ?? '-';
    $employee_id = $staff_joining_letters->employee_id ?? '-';
    $joining_date = $staff_joining_letters->joining_date ?? '-';
    $letter_number = $staff_joining_letters->reference_no ?? 'CTL/HR/2026/0001';
    ?>

    <div class="letter-container">

        <!-- Action Bar -->
        <div class="action-bar no-print">
            <button id="print_button" class="print-btn" onclick="window.print()">
                <i class="fas fa-print"></i> Print
            </button>

            <?php if (isset($staff_joining_letters->status) && $staff_joining_letters->status == 'Approved'): ?>
                <button type="button" class="btn btn-sm btn-secondary px-4 me-2" disabled>
                    <i class="bi bi-check-circle-fill me-1"></i> Accepted
                </button>
            <?php else: ?>
                <a href="<?= base_url('accept_joining_letter/' . ($staff_joining_letters->id ?? '')); ?>"
                    class="btn btn-sm btn-success px-4 me-2"
                    onclick="return confirm('Are you sure you want to accept this letter?');">
                    <i class="bi bi-check-lg me-1"></i> Accept Now
                </a>
            <?php endif; ?>
        </div>

        <!-- Company Letterhead -->
        <div class="header">
            <img src="<?= base_url('assets/uploads/letter_pad/CTL PNG-01.png'); ?>"
                alt="Chandra Trading Limited Letterhead">
        </div>

        <div class="letter-meta">
            <div></div>
            <div>
                <strong>Date:</strong> <?= html_escape($joining_date); ?>
            </div>
        </div>

        <div class="title">
            <h2>Joining Letter</h2>
        </div>

        <div class="content">

            <p class="intro-text">
                To,<br>
                Managing Director<br>
                Chandra Trading Limited<br><br>
                <strong>Subject: Joining Letter for Employment.</strong><br>
                <strong>Reference No.:</strong> <?= html_escape($letter_number); ?>
            </p>

            <p class="intro-text">
                Dear Sir,
            </p>

            <p class="intro-text">
                With due respect, I am <strong><?= html_escape($name); ?></strong>, appointed as 
                <strong><?= html_escape($designation); ?></strong> at your organization, officially joining my duties and workplace today, 
                <strong><?= html_escape($joining_date); ?></strong>. 
                I pledge to perform the duties assigned to me with honesty, dedication, and responsibility, strictly abiding by the rules, regulations, policies, and instructions of your organization.
            </p>

            <p class="intro-text mt-3">
                Therefore, I sincerely request you to kindly accept my joining letter and grant me the opportunity to discharge my duties.
            </p>

            <p class="intro-text">
                Sincerely yours,
            </p>

            <!-- Signature Section (Float-based for precise print rendering) -->
            <div class="signature-section">
                <div class="signature-box">
                    <div class="signature-line">
                        <!-- Left Signature box (if needed or left blank for employee) -->
                    </div>
                </div>

                <div class="signature-box">
                    <div class="signature-line">
                        <?php if (!empty($staff_joining_letters->signature)): ?>
                            <img src="<?= base_url('./assets/uploads/staff_sign/' . $staff_joining_letters->signature) ?>"
                                alt="Authorized Signature"><br>
                        <?php endif; ?>
                        <strong><?= html_escape($name); ?></strong><br>
                        <?= html_escape($designation); ?><br>
                        Chandra Trading Limited
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