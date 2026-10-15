<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chandra Trading Limited - Receipt</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Bengali Font -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 25px;
            /* background: #e9ecef; */
            font-family: "Sutonnny MJ", Arial, sans-serif;
            color: #111;
        }

        /* PRINT BUTTON */
        .print-toolbar {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto 15px;
            text-align: right;
        }

        /* RECEIPT PAPER */
        .receipt-paper {
            position: relative;
            width: 100%;
            max-width: 1100px;
            min-height: 760px;
            margin: 0 auto;
            background: #fff;
            overflow: hidden;
            border: 1px solid #ddd;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .12);
            padding-bottom: 48px;
        }

        /* LEFT COLOR STRIP */
        .left-strip {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 42px;
            background: linear-gradient(to bottom,
                    #fcb452 0%,
                    #fcb452 20.5%,
                    #2487c9 20.5%,
                    #2487c9 100%);
            z-index: 1;
        }

        .vertical-company {
            font-family: 'SolaimanLipi', sans-serif;
            position: absolute;
            left: 0;
            top: 27%;
            width: 42px;
            height: 55%;
            display: flex;
            justify-content: center;
            align-items: center;
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            color: white;
            font-size: 28px;
            font-weight: 600;
            letter-spacing: 2px;
            z-index: 2;
        }

        /* MAIN CONTENT */
        .receipt-content {
            position: relative;
            padding-left: 42px;
        }

        /* HEADER */
        .receipt-header {
            min-height: 125px;
            background-color: #eef9fe;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 25px;
            border-bottom: 1px solid #f0f0f0;
        }

        .company-area {
            display: flex;
            align-items: center;
            /* gap: 15px; */
        }

        .company-logo {
            width: 160px;
            height: 95px;
            object-fit: contain;
            position: absolute;
            left: 29px;
        }

        .company-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .company-name {
            color: #034ea2;
            font-size: 36px;
            font-weight: 700;
            line-height: 1.1;
            white-space: nowrap;
            position: absolute;
            top: 38px;
            left: 154px;
        }

        .company-registration {
            /* margin-top: 38px; */
            font-size: 13px;
            font-weight: 500;
            color: #222;
            position: absolute;
            top: 74px;
            left: 157px;
        }

        .contact-area {
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-width: 220px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
            font-family: Arial, sans-serif;
            font-size: 13px;
        }

        .contact-item:last-child {
            margin-bottom: 0;
        }

        .contact-icon {
            width: 20px;
            height: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #143f87;
            border-radius: 50%;
            color: #143f87;
            font-size: 10px;
        }

        /* RECEIPT DETAILS BAR */
        .receipt-top {
            display: flex;
            justify-content: space-between;
            padding: 15px 25px 10px;
            font-size: 14px;
            font-weight: 400;
        }

        .code {
            margin-right: 200px !important;
        }

        .reciept_no {
            margin-left: 10px;
        }

        /* CUSTOMER BOX */
        .customer-box {
            border: 2px solid #d4effc ;
            border-radius: 12px;
            padding: 6px 20px;
            margin: 0 25px 15px;
            background-color: #eef9fe;
        }

        .customer-grid {
            display: grid;
            grid-template-columns: 1fr 1.25fr 1.4fr;
            column-gap: 30px;
            row-gap: 12px;
        }

        .customer-field {
            display: flex;
            align-items: baseline;
            font-size: 14px;
            min-height: 25px;
        }

        .customer-label {
            font-weight: 400;
            white-space: nowrap;
            margin-right: 7px;
        }

        .customer-value {
            flex: 1;
            /* border-bottom: 1px dotted #999; */
            min-height: 20px;
            padding-left: 5px;
        }

        .table-container {
            padding: 0 25px;
        }

        .transaction-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border: 2px solid #d4effc;
            border-radius: 8px;
            overflow: hidden;
            font-size: 14px;
            /* background-color: #E9ECEF; */
        }

        .transaction-table th,
        .transaction-table td {
            
            border-right: 2px solid #d4effc;
            border-bottom: 2px solid #d4effc;
            padding: 8px 12px;
        }

        .transaction-table th:last-child,
        .transaction-table td:last-child {
            border-right: none;
        }

        .transaction-table tr:last-child td {
            border-bottom: none;
        }

        .transaction-table th {
            text-align: center;
            font-weight: 400;
            height: 38px;
            /* background-color: #E9ECEF; */
        }

        .serial-column {
            width: 10%;
            text-align: center;
        }

        .description-column {
            width: 70%;
            
        }

        .amount-column {
            width: 20%;
            text-align: right;
        }

        .transaction-body {
            height: 130px;
            vertical-align: top;
        }

        .remarks-row td {
            height: 40px;
            vertical-align: middle;
        }

        .remarks {
            font-weight: 400;
        }

        .total-label {
            text-align: right;
            font-weight: 400;
        }

        .signature-area {
            display: grid;
            grid-template-columns: 1.25fr 1.25fr 1.25fr;
            gap: 30px;
            margin-top: 45px;
            padding: 0 30px;
            /* background-color: #E9ECEF; */
        }

        .signature-box {
            text-align: center;
        }

        .signature-line {
            border-top: 1px dotted #333;
            margin-bottom: 6px;
        }

        .signature-title {
            font-size: 13px;
            font-weight: 600;
        }

        .receipt-footer {
            position: absolute;
            left: 0px;
            right: 0;
            bottom: -1px;
            height: 30px;
            display: flex;
            background: #2487c9;
            color: white;
            font-size: 16px;
            font-weight: 500;
            z-index: 5;
        }

        .footer-label {
            width: 300px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            background: #fcb452;
            color: #111;
            font-weight: bold;
            text-align: end;
            
        }
      
        .footer-address {
            flex: 1;
            display: flex;
            align-items: center;
            padding-left: 20px;
        }

        /* PRINT STYLES */
        @page {
            size: 210mm 297mm;
            /* Standard A4 Portrait */
            margin: 0;
            /* Disables default browser header/footer text space */
        }

        @media print {
            html {
                width: 210mm;
                height: 297mm;
                margin: 0 !important;
                padding: 0 !important;
            }

            body {
                width: 100% !important;
                height: 100% !important;
                margin: 0 !important;
                padding: 15mm !important;
                box-sizing: border-box !important;
                background: white !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            .left-strip {
                position: absolute;
                left: 0;
                top: 0;
                bottom: 0;
                width: 42px;
                background: linear-gradient(to bottom,
                        #f7a900 0%,
                        #f7a900 20.5%,
                        #2487c9 20.5%,
                        #2487c9 100%);
                z-index: 1;
            }

            .print-toolbar {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="print-toolbar">
        <button type="button" onclick="window.print()" class="btn btn-primary px-4">
            <i class="fa fa-print me-2"></i> Print Receipt
        </button>
    </div>

    <div class="receipt-paper content-wrapper">

        <!-- LEFT COLOR STRIP -->
        <div class="left-strip"></div>
        <div class="vertical-company">
            খরচ ভাউচার 
        </div>

        <div class="receipt-content">

            <!-- HEADER -->
            <div class="receipt-header">
                <div class="company-area">
                    <img src="./assets/uploads/ctl2_logo.png" class="company-logo" alt="CTL Logo">
                    <div class="company-info">
                        <div class="company-name">
                            চান্দ্রা ট্রেডিং লি.
                        </div>
                        <div class="company-registration">
                            রেজি. নং: সি-২১১০০৫, &nbsp;তারিখ: ১১.০৬.২০২৬ খ্রি.
                        </div>
                    </div>
                </div>

                <div class="contact-area">
                    <div class="contact-item">
                        <span class="contact-icon">
                            <i class="fa fa-phone"></i>
                        </span>
                        <span class="contact">01709-653595</span>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </span>
                        <span class="contact">ctl05.2026@gmail.com</span>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">
                            <i class="fa-brands fa-facebook-f"></i>
                        </span>
                        <span class="contact">Chandra Trading Limited</span>
                    </div>
                </div>
            </div>

            <!-- RECEIPT / CODE -->
            <div class="receipt-top">
                <div class="reciept_no">
                    ভাউচার নং:
                    <span class="ms-2">
                        <?= isset($receipt_no) ? htmlspecialchars($receipt_no) : ''; ?>
                    </span>
                </div>
                <div class="code">
                    কোড নং:
                    <span class="mr-2">
                        <?= isset($code_no) ? htmlspecialchars($code_no) : ''; ?>
                    </span>
                </div>
            </div>

            <!-- CUSTOMER INFORMATION -->
            <div class="customer-box">
                <div class="customer-grid">
                    <!-- Row 1 -->
                    <div class="customer-field">
                        <span class="customer-label">শেয়ার হোল্ডার নং :</span>
                        <span class="customer-value">
                            <?= isset($shareholder_no) ? htmlspecialchars($shareholder_no) : ''; ?>
                        </span>
                    </div>
                    <div class="customer-field">
                        <span class="customer-label">নাম :</span>
                        <span class="customer-value">
                            <?= isset($name) ? htmlspecialchars($name) : ''; ?>
                        </span>
                    </div>
                    <div class="customer-field">
                        <span class="customer-label">পিতা/স্বামীর নাম :</span>
                        <span class="customer-value">
                            <?= isset($father_husband_name) ? htmlspecialchars($father_husband_name) : ''; ?>
                        </span>
                    </div>

                    <!-- Row 2 -->
                    <div class="customer-field">
                        <span class="customer-label">তারিখ :</span>
                        <span class="customer-value">
                            <!-- <?= isset($date) ? htmlspecialchars($date) : date('d-m-Y'); ?> -->
                        </span>
                    </div>
                    <div class="customer-field">
                        <span class="customer-label">ঠিকানা :</span>
                        <span class="customer-value">
                            <?= isset($address) ? htmlspecialchars($address) : ''; ?>
                        </span>
                    </div>
                    <div></div>
                </div>
            </div>

            <!-- TRANSACTION TABLE -->
            <div class="table-container">
                <table class="transaction-table">
                    <thead>
                        <tr>
                            <th class="serial-column">ক্র নং</th>
                            <th class="description-column">খাত/বিবরণ</th>
                            <th class="amount-column">টাকা</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Transaction rows -->
                        <?php if (!empty($transactions)): ?>
                            <?php foreach ($transactions as $key => $transaction): ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $key + 1; ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($transaction['description'] ?? ''); ?>
                                    </td>
                                    <td class="text-end">
                                        <?= number_format((float) ($transaction['amount'] ?? 0), 2); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <!-- Empty space fill -->
                        <tr>
                            <td colspan="" class="transaction-body"></td>
                            <td colspan="" class="transaction-body"></td>
                            <td colspan="" class="transaction-body"></td>
                        </tr>

                        <!-- Remarks / Total -->
                        <tr class="remarks-row">
                            <td colspan="" class="remarks">
                                কথায় : <?= isset($amount_words) ? htmlspecialchars($amount_words) : ''; ?>
                            </td>
                            <td>
                                <div class="total-label">
                                    মোট =
                                    <span class="ms-2">

                                    </span>
                                </div>
                            </td>
                            <td colspan="" class="remarks">

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="signature-area">
                <div class="signature-box">
                    <div class="signature-line"></div>
                    <div class="signature-title">চেয়ারম্যান/ব্যবস্থাপনা পরিচালক</div>
                </div>
                <div class="signature-box">
                    <div class="signature-line"></div>
                    <div class="signature-title">গ্রহণকারী</div>
                </div>
                <div class="signature-box">
                    <div class="signature-line"></div>
                    <div class="signature-title">হিসাবরক্ষক</div>
                </div>
            </div>

        </div>

        <div class="receipt-footer">
            <div class="footer-label">
                <div style="margin-right:20px;" class="address-box">ঠিকানা:</div>
            </div>
            <div class="footer-address">
                লিলি পন্ড সেন্টার, ২১ তলা, ৩৩ আর. কে. মিশন রোড, মতিঝিল, ঢাকা।
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>