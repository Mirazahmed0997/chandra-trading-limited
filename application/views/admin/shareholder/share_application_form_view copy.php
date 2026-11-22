<?php
// echo '<pre>';
// print_r($shareholder_applications->applicant_name_bn);
// print_r($shareholder_contact_information);
// print_r($shareholder_nominee_information);
// print_r($shareholder_bank_details);
// print_r($share_holder_invest_share_details);
// print_r($shareholder_att);
// echo '</pre>';
// exit;
?>


<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share Application Form - Chandra Trading Ltd.</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Bangla Font -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">


<style>
        * {
            box-sizing: border-box;
        }

        body {
            background: #e9ecef;
            font-family: 'Noto Sans Bengali', sans-serif;
            color: #111;
            font-size: 12px;
        }

        .form-wrapper {
            /* width: 210mm; */
            min-height: 297mm;
            margin: 20px auto;
            padding: 7mm;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        }

        .top-information {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 8px;
        }

        span {
            margin-top: 2px;
            font-weight: bold;
        }

        .top-field {
            border: 2px solid #2695bd;
            border-radius: 10px;
            padding: 5px 9px;
            height: 39px;
            display: flex;
            align-items: center;
            gap: 6px;
            flex: 1;
            font-weight: 700;
            font-size: 14px;
        }

        .top-field.date-field {
            flex: .7;
        }

        .top-field input {
            min-width: 0;
            flex: 1;
        }

        .top-field i {
            color: #1264a0;
            font-size: 18px;
        }

        .form-control,
        .form-select {
            border: 0;
            border-bottom: 1px dotted #aaa;
            border-radius: 0;
            padding: 1px 4px;
            height: 23px;
            font-size: 12px;
            background: transparent;
            box-shadow: none !important;
        }

        .form-control:focus,
        .form-select:focus {
            border-bottom: 1px solid #1686bc;
            background: #f7fcff;
        }

        .section {
            border: 1.5px solid var(--section-color);
            border-radius: 13px;
            margin-bottom: 10px;
            overflow: hidden;
            position: relative;
        }

        .section-heading {
            color: white;
            background: var(--section-color);
            padding: 5px 12px;
            font-size: 15px;
            font-weight: 800;
            line-height: 1.5;
            border-radius: 9px 9px 0 0;
        }

        .section-body {
            padding: 7px 10px;
        }

        .green {
            --section-color: #087e24;
        }

        .blue {
            --section-color: #0867bd;
        }

        .purple {
            --section-color: #5022a2;
        }

        .orange {
            --section-color: #ed480d;
        }

        .personal-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 52mm;
            gap: 5px;
        }

        .personal-photo {
            border: 1.5px solid #1689bb;
            border-radius: 12px;
            height: 73mm;
            padding: 6px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .photo-preview {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
        }

        .photo-placeholder {
            color: #1689d5;
            font-size: 110px;
        }

        .photo-caption {
            color: white;
            background: #0875b9;
            width: 100%;
            padding: 5px;
            font-weight: 700;
            margin-top: auto;
        }

        .photo-upload {
            width: 100%;
            font-size: 10px;
            margin-top: 3px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 27px 285px 12px minmax(0, 1fr);
            align-items: center;
            min-height: 23px;
            gap: 3px;
        }

        .form-row label {
            font-weight: 600;
            margin: 0;
        }

        .form-row .colon {
            text-align: center;
            font-weight: 700;
        }

        .form-row input {
            width: 100%;
        }

        .form-row .date {
            width: 60% !important;
            text-decoration: none;
        }

        .form-row .form-control {
            min-width: 0;
        }

        .gender-options {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .gender-options label,
        .check-option {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-weight: 600;
            white-space: nowrap;
        }

        input[type="checkbox"],
        input[type="radio"] {
            accent-color: #0875bd;
            width: 15px;
            height: 15px;
            margin: 0;
        }

        .sub-heading {
            background: #83d8e5;
            color: #004a74;
            font-size: 13px;
            font-weight: 800;
            padding: 3px 8px;
            border-radius: 7px;
            margin-bottom: 5px;
        }

        .address-row {
            display: grid;
            grid-template-columns: 78px 12px minmax(0, 1fr);
            gap: 3px;
            align-items: center;
            min-height: 24px;
        }

        .address-row label {
            font-weight: 600;
            margin: 0;
        }

        .address-row input {
            min-width: 0;
        }

        .contact-bottom {
            border-top: 1px solid #9ccbdc;
            margin-top: 5px;
            padding-top: 5px;
        }

        .contact-item {
            display: grid;
            grid-template-columns: 25px 125px 12px minmax(0, 1fr);
            gap: 4px;
            align-items: center;
            min-height: 25px;
        }

        .contact-item i {
            color: #064e9a;
            font-size: 16px;
        }

        .contact-item label {
            font-weight: 700;
            margin: 0;
        }

        .two-column {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 10px;
            align-items: start;
        }

        .share-row {
            display: grid;
            grid-template-columns: 27px 220px 12px minmax(0, 1fr);
            align-items: center;
            min-height: 24px;
            gap: 3px;
        }

        .share-row label {
            font-weight: 600;
            margin: 0;
        }

        .share-row input {
            min-width: 0;
        }

        .bank-row {
            display: grid;
            grid-template-columns: 25px 115px 12px minmax(0, 1fr);
            align-items: center;
            min-height: 24px;
            gap: 3px;
        }

        .bank-row label {
            font-weight: 600;
            margin: 0;
        }

        .nominee-row {
            display: grid;
            grid-template-columns: 27px 185px 12px minmax(0, 1fr);
            align-items: center;
            min-height: 25px;
            gap: 3px;
        }

        .nominee-row label {
            font-weight: 600;
            margin: 0;
        }

        .nominee-row input {
            min-width: 0;
        }

        .document-list {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5px 8px;
            padding: 8px;
        }

        .document-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 11px;
            font-weight: 600;
        }

        .document-item i {
            color: #111;
            font-size: 16px;
        }

        .declaration-text {
            font-size: 11.5px;
            line-height: 1.9;
            font-weight: 600;
            text-align: justify;
        }

        .signature-area {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 25px;
            padding: 12px 5px 0;
            margin-top: 20px;
            text-align: center;
        }

        .signature {
            padding-top: 18px;
            font-weight: 700;
        }

        .signature-line {
            border-top: 1px solid #333;
            width: 85%;
            margin: 0 auto 5px;
        }

        .applicant-signature {
            width: 33%;
            margin-left: auto;
            margin-bottom: 35px;
            text-align: center;
            font-weight: 700;
        }

        .applicant-signature .signature-line {
            width: 85%;
        }

        .date-inline {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .date-inline input {
            width: 100px;
        }

        .date-inline i {
            color: #064c93;
        }

        .print-button {
            position: fixed;
            top: 20px;
            right: 25px;
            z-index: 100;
        }

        @media (max-width: 767px) {
            .form-wrapper {
                width: 100%;
                margin: 0;
                padding: 12px;
            }

            .personal-layout {
                grid-template-columns: 1fr;
            }

            .personal-photo {
                width: 150px;
                height: 190px;
                margin: auto;
                grid-row: 1;
            }

            .form-row,
            .nominee-row,
            .share-row,
            .bank-row {
                grid-template-columns: 25px minmax(100px, 42%) 10px minmax(0, 1fr);
            }

            .two-column {
                grid-template-columns: 1fr;
            }

            .top-information {
                flex-wrap: wrap;
            }

            .top-field {
                min-width: 45%;
            }

            .signature-area {
                gap: 5px;
            }
        }
    </style>
</head>

<body>

    <button class="btn btn-primary print-button" onclick="window.print()">
        <i class="fas fa-print me-1"></i> Print Form
    </button>

    <div class="form-wrapper content-wrapper">

        <div class="top-information">

            <div class="top-field">
                <i class="fas fa-file-alt"></i>
                Application No.
                <input type="text" class="form-control" readonly >
            </div>

            <div class="top-field">
                Share Holder No.
                <input type="text" class="form-control">
            </div>

            <div class="top-field date-field">
                <i class="fas fa-calendar-alt"></i>
                Date:
                <input type="date" class="form-control">
            </div>

        </div>

        <div class="personal-layout">

            <section class="section green">

                <div class="section-heading">
                    1. আবেদনকারীর ব্যক্তিগত তথ্য (Personal Information)
                </div>

                <div class="section-body">

                    <div class="form-row">
                        <span>1.</span>
                        <label>আবেদনকারীর পূর্ণ নাম (বাংলা)</label>
                        <span class="colon">:</span>
                        <input type="text" class="form-control" name="full_name_bn">
                    </div>

                    <div class="form-row">
                        <span>2.</span>
                        <label>Full Name (English)</label>
                        <span class="colon">:</span>
                        <input type="text" class="form-control" name="full_name">
                    </div>

                    <div class="form-row">
                        <span>3.</span>
                        <label>পিতার নাম</label>
                        <span class="colon">:</span>
                        <input type="text" class="form-control" name="father_name">
                    </div>

                    <div class="form-row">
                        <span>4.</span>
                        <label>মাতার নাম</label>
                        <span class="colon">:</span>
                        <input type="text" class="form-control" name="mother_name">
                    </div>

                    <div class="form-row">
                        <span>5.</span>
                        <label>স্বামী/স্ত্রীর নাম</label>
                        <span class="colon">:</span>
                        <input type="text" class="form-control" name="spouse_name">
                    </div>

                    <div class="form-row">
                        <span>6.</span>
                        <label>জন্ম তারিখ</label>
                        <span class="colon">:</span>
                        <div class="d-flex align-items-center gap-2">
                            <input class="date" type="date" class="form-control">
                            <strong>7. লিঙ্গ:</strong>
                            <div class="gender-options">
                                <label><input type="radio" name="gender" value="Male"> পুরুষ</label>
                                <label><input type="radio" name="gender" value="Female"> মহিলা</label>
                                <label><input type="radio" name="gender" value="Other"> অন্যান্য</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <span>7.</span>
                        <label>জাতীয়তা</label>
                        <span class="colon">:</span>
                        <input type="text" class="form-control" name="nationality">
                    </div>

                    <div class="form-row">
                        <span>8.</span>
                        <label>পেশা</label>
                        <span class="colon">:</span>
                        <input type="text" class="form-control" name="occupation">
                    </div>

                    <div class="form-row">
                        <span>9.</span>
                        <label>জাতীয় পরিচয়পত্র (NID) নম্বর</label>
                        <span class="colon">:</span>
                        <input type="text" class="form-control" name="nid">
                    </div>

                    <div class="form-row">
                        <span>10.</span>
                        <label>TIN নম্বর (যদি থাকে)</label>
                        <span class="colon">:</span>
                        <input type="text" class="form-control" name="tin">
                    </div>

                </div>
            </section>

            <div class="personal-photo">

                <img id="photoPreview" class="photo-preview" alt="Applicant Photo">

                <div id="photoPlaceholder">
                    <i class="fas fa-user-tie photo-placeholder"></i>
                </div>

                <div class="photo-caption">
                    ছবি<br>(পাসপোর্ট সাইজ)
                </div>



            </div>

        </div>

        <div class="two-column mt-2">

            <section class="section blue">

                <div class="section-heading">
                    2. যোগাযোগের ঠিকানা (Contact Information)
                </div>

                <div class="section-body">

                    <div class="row g-2">

                        <div class="col-6">
                            <div class="sub-heading">বর্তমান ঠিকানা :</div>

                            <div class="address-row">
                                <label>গ্রাম/বাসা</label>
                                <span>:</span>
                                <input class="form-control" name="present_village">
                            </div>

                            <div class="address-row">
                                <label>ডাকঘর</label>
                                <span>:</span>
                                <input class="form-control" name="present_post">
                            </div>

                            <div class="address-row">
                                <label>উপজেলা</label>
                                <span>:</span>
                                <input class="form-control" name="present_upazila">
                            </div>

                            <div class="address-row">
                                <label>জেলা</label>
                                <span>:</span>
                                <input class="form-control" name="present_district">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="sub-heading">স্থায়ী ঠিকানা :</div>

                            <div class="address-row">
                                <label>গ্রাম/বাসা</label>
                                <span>:</span>
                                <input class="form-control" name="permanent_village">
                            </div>

                            <div class="address-row">
                                <label>ডাকঘর</label>
                                <span>:</span>
                                <input class="form-control" name="permanent_post">
                            </div>

                            <div class="address-row">
                                <label>উপজেলা</label>
                                <span>:</span>
                                <input class="form-control" name="permanent_upazila">
                            </div>

                            <div class="address-row">
                                <label>জেলা</label>
                                <span>:</span>
                                <input class="form-control" name="permanent_district">
                            </div>
                        </div>

                    </div>

                    <div class="contact-bottom">

                        <div class="contact-item">
                            <i class="fas fa-phone-alt"></i>
                            <label>মোবাইল নম্বর</label>
                            <span>:</span>
                            <input class="form-control" type="tel" name="mobile">
                        </div>

                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <label>ই-মেইল</label>
                            <span>:</span>
                            <input class="form-control" type="email" name="email">
                        </div>

                    </div>

                </div>
            </section>

            <!-- NOMINEE INFORMATION -->
            <section class="section green">

                <div class="section-heading">
                    3. নমিনির তথ্য (Nominee Information)
                </div>

                <div class="section-body">

                    <div class="nominee-row">
                        <span>1.</span>
                        <label>নমিনির পূর্ণ নাম</label>
                        <span>:</span>
                        <input class="form-control" name="nominee_name">
                    </div>

                    <div class="nominee-row">
                        <span>2.</span>
                        <label>পিতা/স্বামীর নাম</label>
                        <span>:</span>
                        <input class="form-control" name="nominee_father">
                    </div>

                    <div class="nominee-row">
                        <span>3.</span>
                        <label>আবেদনকারীর সাথে সম্পর্ক</label>
                        <span>:</span>
                        <input class="form-control" name="nominee_relation">
                    </div>

                    <div class="nominee-row">
                        <span>4.</span>
                        <label>জন্ম তারিখ</label>
                        <span>:</span>
                        <input type="date" class="form-control" name="nominee_dob">
                    </div>

                    <div class="nominee-row">
                        <span>5.</span>
                        <label>জাতীয় পরিচয়পত্র নম্বর</label>
                        <span>:</span>
                        <input class="form-control" name="nominee_nid">
                    </div>

                    <div class="nominee-row">
                        <span>6.</span>
                        <label>মোবাইল নম্বর</label>
                        <span>:</span>
                        <input class="form-control" name="nominee_mobile">
                    </div>

                    <div class="nominee-row">
                        <span>7.</span>
                        <label>ঠিকানা</label>
                        <span>:</span>
                        <input class="form-control" name="nominee_address">
                    </div>

                    <div class="nominee-row">
                        <span>8.</span>
                        <label>নমিনির প্রাপ্য অংশ (%)</label>
                        <span>:</span>
                        <div class="d-flex align-items-center gap-2">
                            <input type="number" class="form-control" name="nominee_percentage" style="max-width:75px">
                            <strong>%</strong>
                        </div>
                    </div>

                </div>
            </section>

        </div>

        <div class="two-column">

            <section class="section purple">

                <div class="section-heading">
                    4. শেয়ার ও বিনিয়োগের বিবরণ (Share & Investment Details)
                </div>

                <div class="section-body">

                    <div class="share-row">
                        <span>1.</span>
                        <label>শেয়ারের ধরন</label>
                        <span>:</span>
                        <div class="gender-options">
                            <label><input type="checkbox" name="share_type[]" value="General"> সাধারণ শেয়ার</label>
                            <label><input type="checkbox" name="share_type[]" value="Other"> অন্যান্য</label>
                        </div>
                    </div>

                    <div class="share-row">
                        <span>2.</span>
                        <label>আবেদনকৃত শেয়ারের সংখ্যা</label>
                        <span>:</span>
                        <input type="number" class="form-control" name="share_quantity">
                    </div>

                    <div class="share-row">
                        <span>3.</span>
                        <label>প্রতি শেয়ারের মূল্য</label>
                        <span>:</span>
                        <input type="number" class="form-control" name="share_price">
                    </div>

                    <div class="share-row">
                        <span>4.</span>
                        <label>মোট বিনিয়োগের পরিমাণ</label>
                        <span>:</span>
                        <input type="number" class="form-control" name="total_investment">
                    </div>

                    <div class="share-row">
                        <span>5.</span>
                        <label>বিনিয়োগের ধরন</label>
                        <span>:</span>
                        <div class="gender-options">
                            <label><input type="checkbox" name="investment_type[]" value="One Time"> এককালীন</label>
                            <label><input type="checkbox" name="investment_type[]" value="Installment"> কিস্তিতে</label>
                        </div>
                    </div>

                    <div class="share-row">
                        <span>6.</span>
                        <label>অর্থ পরিশোধের মাধ্যম</label>
                        <span>:</span>
                        <div class="gender-options">
                            <label><input type="checkbox" name="payment_method[]" value="Cash"> নগদ</label>
                            <label><input type="checkbox" name="payment_method[]" value="Bank"> ব্যাংক</label>
                            <label><input type="checkbox" name="payment_method[]" value="Online"> অনলাইন
                                ব্যাংকিং</label>
                            <label><input type="checkbox" name="payment_method[]" value="Other"> অন্যান্য</label>
                        </div>
                    </div>

                    <div class="share-row">
                        <span>7.</span>
                        <label>অর্থ পরিশোধের তারিখ</label>
                        <span>:</span>
                        <input type="date" class="form-control" name="payment_date">
                    </div>

                    <div class="share-row">
                        <span>8.</span>
                        <label>ট্রানজেকশন/ভাউচার নম্বর</label>
                        <span>:</span>
                        <input class="form-control" name="transaction_number">
                    </div>

                </div>
            </section>

            <!-- BANK INFORMATION -->
            <section>

                <div class="section green">

                    <div class="section-heading">
                        5. ব্যাংক হিসাবের বিবরণ (Bank Account Information)
                    </div>

                    <div class="section-body">

                        <div class="bank-row">
                            <span>1.</span>
                            <label>ব্যাংকের নাম</label>
                            <span>:</span>
                            <input class="form-control" name="bank_name">
                        </div>

                        <div class="bank-row">
                            <span>2.</span>
                            <label>শাখার নাম</label>
                            <span>:</span>
                            <input class="form-control" name="bank_branch">
                        </div>

                        <div class="bank-row">
                            <span>3.</span>
                            <label>হিসাবের নাম</label>
                            <span>:</span>
                            <input class="form-control" name="account_name">
                        </div>

                        <div class="bank-row">
                            <span>4.</span>
                            <label>হিসাব নম্বর</label>
                            <span>:</span>
                            <input class="form-control" name="account_number">
                        </div>

                        <div class="bank-row">
                            <span>5.</span>
                            <label>রাউটিং নম্বর</label>
                            <span>:</span>
                            <input class="form-control" name="routing_number">
                        </div>

                    </div>
                </div>

                <!-- REQUIRED DOCUMENTS -->
                <div class="section orange">

                    <div class="section-heading">
                        6. প্রয়োজনীয় সংযুক্তি (Required Documents)
                    </div>

                    <div class="document-list">

                        <label class="document-item">
                            <input type="checkbox" name="documents[]" value="Applicant NID">
                            <i class="fas fa-eye"></i>
                            জাতীয় পরিচয়পত্রের কপি
                        </label>

                        <label class="document-item">
                            <input type="checkbox" name="documents[]" value="Nominee Photo">
                            <i class="fas fa-eye"></i>
                            নমিনির ছবি
                        </label>

                        <label class="document-item">
                            <input type="checkbox" name="documents[]" value="Payment Receipt">
                            <i class="fas fa-eye"></i>
                            অর্থ পরিশোধের প্রমাণপত্র
                        </label>

                        <label class="document-item">
                            <input type="checkbox" name="documents[]" value="Nominee NID">
                            <i class="fas fa-eye"></i>
                            নমিনির জাতীয় পরিচয়পত্রের কপি
                        </label>

                        <label class="document-item">
                            <input type="checkbox" name="documents[]" value="Other Documents">
                            <i class="fas fa-eye"></i>
                            অন্যান্য প্রয়োজনীয় কাগজপত্র
                        </label>

                        <label class="document-item">
                            <input type="checkbox" name="documents[]" value="Nominee Signature">
                            <i class="fas fa-eye"></i>
                            নমিনির স্বাক্ষর
                        </label>

                    </div>
                </div>

            </section>

        </div>

        <section class="section blue">

            <div class="section-heading">
                7. আবেদনকারীর ঘোষণা (Declaration)
            </div>

            <div class="section-body">

                <div class="declaration-text">

                    আমি এই মর্মে ঘোষণা করছি যে, উপরের সকল তথ্য আমার জ্ঞান ও বিশ্বাস অনুযায়ী সঠিক ও সত্য।
                    আমি CHANDRA TRADING LTD. এর শেয়ার বরাদ্দের শর্তাবলী এবং কোম্পানির অনুমোদিত নীতিমালা
                    মেনে চলতে সম্মত আছি। আমার বিনিয়োগকৃত অর্থের উৎস বৈধ।

                    <br>

                    আমি অবগত আছি যে, এই আবেদন জমা দেওয়ার মাধ্যমে শেয়ারহোল্ডার হিসেবে আমার অধিকার সৃষ্টি
                    হবে না। কোম্পানির যথাযথ যাচাই, অনুমোদন ও শেয়ার বরাদ্দের প্রক্রিয়া সম্পন্ন হওয়ার পর
                    তা কার্যকর হবে।

                </div>

            </div>
        </section>

        <div class="applicant-signature">
            <div class="signature-line"></div>
            আবেদনকারীর স্বাক্ষর
        </div>

        <div class="signature-area">

            <div class="signature">
                <div class="signature-line"></div>
                চেয়ারম্যান/ব্যবস্থাপনা পরিচালক
            </div>

            <div class="signature">
                <div class="signature-line"></div>
                ব্যবস্থাপক
            </div>

            <div class="signature">
                <div class="signature-line"></div>
                যাচাইকারী
            </div>

        </div>

    </div>

    <script>
        function previewPhoto(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    const preview = document.getElementById('photoPreview');

                    preview.src = e.target.result;
                    preview.style.display = 'block';

                    document.getElementById('photoPlaceholder').style.display = 'none';
                };

                reader.readAsDataURL(file);
            }
        }
    </script>

</body>

</html>