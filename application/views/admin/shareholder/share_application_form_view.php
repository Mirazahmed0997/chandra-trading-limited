<?php
$application = $shareholder_applications ?? (object) [];
$address = $shareholder_contact_information[0] ?? (object) [];
$nominee = $shareholder_nominee_information[0] ?? (object) [];
$bank = $shareholder_bank_details[0] ?? (object) [];
$investment = $share_holder_invest_share_details[0] ?? (object) [];
$attachment = $shareholder_att[0] ?? (object) [];

// echo '<pre>';
// print_r($attachment->applicant_img);
// echo '</pre>';
// exit;

$uploadBaseUrl = base_url('uploads/shareholder_applications/');

function h(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function fmtDate(?string $value, string $format = 'd/m/Y'): string
{
    if (empty($value) || $value === '0000-00-00' || strpos($value, '0000-00-00') === 0) {
        return '';
    }
    $ts = strtotime($value);
    return $ts ? date($format, $ts) : '';
}

function fmtNum($value): string
{
    if ($value === null || $value === '') {
        return '';
    }
    return is_numeric($value) ? (string) (float) $value : h((string) $value);
}

$appDate = fmtDate($application->created_at ?? '');
$birthDate = fmtDate($application->birth_date ?? '');
$nomineeDob = fmtDate($nominee->nominee_date_of_birth ?? '');
$paymentDate = fmtDate($investment->date_of_payment ?? '');

$genderVal = strtolower(trim((string) ($application->gender ?? '')));
$shareTypeRaw = trim((string) ($investment->share_type ?? ''));
$shareTypeVal = strtolower($shareTypeRaw);
$investTypeVal = strtolower(trim((string) ($investment->invest_type ?? '')));
$paymentMethodVal = strtolower(trim((string) ($investment->medium_of_payment ?? '')));

$applicantImgUrl = !empty($attachment->applicant_img) ? base_url('uploads/shareholder_applications/applicant_img/') . h($attachment->applicant_img) : '';
$applicantNidUrl = !empty($attachment->applicant_nid_att) ? $uploadBaseUrl . h($attachment->applicant_nid_att) : '';
$nomineeImgUrl = !empty($attachment->nominee_img) ? $uploadBaseUrl . h($attachment->nominee_img) : '';
$paymentReceiptUrl = !empty($attachment->payment_reciept) ? $uploadBaseUrl . h($attachment->payment_reciept) : '';
$nomineeNidUrl = !empty($attachment->nominee_nid_att) ? $uploadBaseUrl . h($attachment->nominee_nid_att) : '';
$otherDocsUrl = !empty($attachment->documents) ? $uploadBaseUrl . h($attachment->documents) : '';
$nomineeSignUrl = !empty($attachment->nominee_sign) ? $uploadBaseUrl . h($attachment->nominee_sign) : '';
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
            width: 340mm;
            /* max-width: 100%; */
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

        .top-field .field-val {
            min-width: 0;
            flex: 1;
            border-bottom: 1px dotted #888;
            padding: 1px 6px;
            font-weight: 700;
            font-size: 13px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .top-field i {
            color: #1264a0;
            font-size: 18px;
        }

        .field-val {
            display: inline-block;
            border-bottom: 1px dotted #888;
            padding: 1px 4px;
            min-height: 21px;
            line-height: 1.45;
            font-size: 12px;
            font-weight: 600;
            color: #111;
            word-break: break-word;
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
            overflow: hidden;
        }

        .photo-preview {
            width: 100%;
            height: calc(100% - 42px);
            object-fit: cover;
            border-radius: 6px;
        }

        .photo-placeholder {
            color: #1689d5;
            font-size: 95px;
        }

        .photo-caption {
            color: white;
            background: #0875b9;
            width: 100%;
            padding: 4px 5px;
            font-weight: 700;
            font-size: 11px;
            line-height: 1.3;
            margin-top: auto;
            border-radius: 0 0 6px 6px;
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

        .form-row .field-val {
            width: 100%;
            min-width: 0;
        }

        .form-row .date-val {
            width: 125px;
            flex-shrink: 0;
        }

        .gender-options {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .gender-options .option-item,
        .check-option {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-weight: 600;
            white-space: nowrap;
        }



        input[type="checkbox"] {
            appearance: none;
            -webkit-appearance: none;

            width: 15px;
            height: 15px;
            border: 2px solid black;
            border-radius: 3px;
            background-color: #fff;

            display: inline-grid;
            place-content: center;
            margin: 0;
            opacity: 1;
            cursor: default;
        }

        input[type="checkbox"]:checked {
            background-color: black;
            border-color: black;
        }

        input[type="checkbox"]:checked::before {
            content: "";
            width: 4px;
            height: 8px;
            border: solid #fff;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
            margin-top: -2px;
        }

        input[type="checkbox"]:disabled {
            opacity: 1;
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

        .address-row .field-val {
            min-width: 0;
            width: 100%;
        }


        .contact-bottom {
            border-top: 1px solid #9ccbdc;
            margin-top: 5px;
            padding-top: 5px;
        }

        .contact-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .contact-item {
            display: grid;
            grid-template-columns: 20px 125px 12px minmax(0, 1fr);
            gap: 4px;
            align-items: center;
            min-height: 25px;
            width: 100%;
            min-width: 0;
        }

        .contact-item i {
            color: #064e9a;
            font-size: 12px;
        }

        .contact-item label {
            font-weight: 700;
            margin: 0;
            font-size: 12px;
            white-space: nowrap;
        }

        .contact-item .field-val {
            min-width: 0;
            width: 100%;
            overflow-wrap: anywhere;
            font-size: 10px;
        }


        @media (max-width: 576px) {
            .contact-row {
                grid-template-columns: 1fr;
                gap: 5px;
            }
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

        .share-row .field-val {
            min-width: 0;
            width: 100%;
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

        .bank-row .field-val {
            min-width: 0;
            width: 100%;
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

        .nominee-row .field-val {
            min-width: 0;
            width: 100%;
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
            font-size: 15px;
        }

        .document-item a {
            color: #0867bd;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }

        .declaration-text {
            font-size: 14px;
            line-height: 1.2;
            font-weight: bolder;
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
            width: 50%;
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
            width: 50%;
        }

        .print-button {
            position: fixed;
            top: 60px;
            right: 25px;
            z-index: 100;
        }


        @media print {
          

            .print-button {
                display: none !important;
            }

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

    <button type="button" class="btn btn-primary print-button" onclick="window.print()">
        <i class="fas fa-print me-1"></i> Print Form
    </button>

    <div class="form-wrapper content-wrapper">

        <div class="top-information">

            <div class="top-field">
                <i class="fas fa-file-alt"></i>
                Application No.
                <span class="field-val"><?= h((string) ($application->id ?? '')) ?></span>
            </div>

            <div class="top-field">
                Share Holder No.
                <span class="field-val"></span>
            </div>

            <div class="top-field date-field">
                <i class="fas fa-calendar-alt"></i>
                Date:
                <span class="field-val"><?= h($appDate) ?></span>
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
                        <span class="field-val"><?= h($application->applicant_name_bn ?? '') ?></span>
                    </div>

                    <div class="form-row">
                        <span>2.</span>
                        <label>Full Name (English)</label>
                        <span class="colon">:</span>
                        <span class="field-val"><?= h($application->applicant_name_en ?? '') ?></span>
                    </div>

                    <div class="form-row">
                        <span>3.</span>
                        <label>পিতার নাম</label>
                        <span class="colon">:</span>
                        <span class="field-val"><?= h($application->father_name ?? '') ?></span>
                    </div>

                    <div class="form-row">
                        <span>4.</span>
                        <label>মাতার নাম</label>
                        <span class="colon">:</span>
                        <span class="field-val"><?= h($application->mother_name ?? '') ?></span>
                    </div>

                    <div class="form-row">
                        <span>5.</span>
                        <label>স্বামী/স্ত্রীর নাম</label>
                        <span class="colon">:</span>
                        <span class="field-val"><?= h($application->husband_wife_name ?? '') ?></span>
                    </div>

                    <div class="form-row">
                        <span>6.</span>
                        <label>জন্ম তারিখ</label>
                        <span class="colon">:</span>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <span class="field-val date-val"><?= h($birthDate) ?></span>
                            <strong>7. লিঙ্গ:</strong>
                            <div class="gender-options">
                                <span class="option-item"><input type="checkbox" disabled <?= $genderVal === 'পুরুষ' ? 'checked' : '' ?>> পুরুষ</span>
                                <span class="option-item"><input type="checkbox" disabled <?= $genderVal === 'মহিলা' ? 'checked' : '' ?>> মহিলা</span>
                                <span class="option-item"><input type="checkbox" disabled <?= $genderVal === 'অন্যান্য' ? 'checked' : '' ?>> অন্যান্য</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <span>7.</span>
                        <label>জাতীয়তা</label>
                        <span class="colon">:</span>
                        <span class="field-val"><?= h($application->nationality ?? '') ?></span>
                    </div>

                    <div class="form-row">
                        <span>8.</span>
                        <label>পেশা</label>
                        <span class="colon">:</span>
                        <span class="field-val"><?= h($application->profession ?? '') ?></span>
                    </div>

                    <div class="form-row">
                        <span>9.</span>
                        <label>জাতীয় পরিচয়পত্র (NID) নম্বর</label>
                        <span class="colon">:</span>
                        <span class="field-val"><?= h($application->nid_no ?? '') ?></span>
                    </div>

                    <div class="form-row">
                        <span>10.</span>
                        <label>TIN নম্বর (যদি থাকে)</label>
                        <span class="colon">:</span>
                        <span class="field-val"><?= h($application->tin_no ?? '') ?></span>
                    </div>

                </div>
            </section>

            <div class="personal-photo">

                <?php if ($attachment->applicant_img): ?>
                    <img src="<?= base_url('assets/uploads/shareholder_applications/applicant_img/' . $attachment->applicant_img); ?>"
                        class="photo-preview" alt="Applicant Photo">
                <?php else: ?>
                    <div>
                        <i class="fas fa-user-tie photo-placeholder"></i>
                    </div>
                <?php endif; ?>

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
                                <span class="field-val"><?= h($address->present_village ?? '') ?></span>
                            </div>

                            <div class="address-row">
                                <label>ডাকঘর</label>
                                <span>:</span>
                                <span class="field-val"><?= h($address->present_post_office ?? '') ?></span>
                            </div>

                            <div class="address-row">
                                <label>উপজেলা</label>
                                <span>:</span>
                                <span class="field-val"><?= h($address->present_sub_district ?? '') ?></span>
                            </div>

                            <div class="address-row">
                                <label>জেলা</label>
                                <span>:</span>
                                <span class="field-val"><?= h($address->present_district ?? '') ?></span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="sub-heading">স্থায়ী ঠিকানা :</div>

                            <div class="address-row">
                                <label>গ্রাম/বাসা</label>
                                <span>:</span>
                                <span class="field-val"><?= h($address->permanent_village ?? '') ?></span>
                            </div>

                            <div class="address-row">
                                <label>ডাকঘর</label>
                                <span>:</span>
                                <span class="field-val"><?= h($address->permanent_post_office ?? '') ?></span>
                            </div>

                            <div class="address-row">
                                <label>উপজেলা</label>
                                <span>:</span>
                                <span class="field-val"><?= h($address->permanent_sub_district ?? '') ?></span>
                            </div>

                            <div class="address-row">
                                <label>জেলা</label>
                                <span>:</span>
                                <span class="field-val"><?= h($address->permanent_district ?? '') ?></span>
                            </div>
                        </div>

                    </div>


                    <div class="contact-bottom">

                        <div class="contact-row">
                            <div class="contact-item">
                                <i class="fas fa-phone-alt"></i>
                                <label>মোবাইল নম্বর</label>
                                <span>:</span>
                                <span class="field-val"><?= h($application->mobile_no ?? '') ?></span>
                            </div>

                            <div class="contact-item">
                                <i></i>
                                <label>অতিরিক্ত (যদি থাকে)</label>
                                <span>:</span>
                                <span class="field-val"><?= h($address->additional_contact ?? '') ?></span>
                            </div>
                        </div>

                        <div class="contact-row">
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <label>ই-মেইল</label>
                                <span>:</span>
                                <span class="field-val"><?= h($application->email ?? '') ?></span>
                            </div>

                            <div class="contact-item">
                                <i></i>
                                <label>অতিরিক্ত (যদি থাকে)</label>
                                <span>:</span>
                                <span class="field-val"><?= h($address->additional_email ?? '') ?></span>
                            </div>
                        </div>

                    </div>


                </div>
            </section>

            <section class="section green">

                <div class="section-heading">
                    3. নমিনির তথ্য (Nominee Information)
                </div>

                <div class="section-body">

                    <div class="nominee-row">
                        <span>1.</span>
                        <label>নমিনির পূর্ণ নাম</label>
                        <span>:</span>
                        <span class="field-val"><?= h($nominee->nominee_name ?? '') ?></span>
                    </div>

                    <div class="nominee-row">
                        <span>2.</span>
                        <label>পিতা/স্বামীর নাম</label>
                        <span>:</span>
                        <span class="field-val"><?= h($nominee->nominee_father_husband_name ?? '') ?></span>
                    </div>

                    <div class="nominee-row">
                        <span>3.</span>
                        <label>আবেদনকারীর সাথে সম্পর্ক</label>
                        <span>:</span>
                        <span class="field-val"><?= h($nominee->relation_with_applicant ?? '') ?></span>
                    </div>

                    <div class="nominee-row">
                        <span>4.</span>
                        <label>জন্ম তারিখ</label>
                        <span>:</span>
                        <span class="field-val"><?= h($nomineeDob) ?></span>
                    </div>

                    <div class="nominee-row">
                        <span>5.</span>
                        <label>জাতীয় পরিচয়পত্র নম্বর</label>
                        <span>:</span>
                        <span class="field-val"><?= h($nominee->nominee_nid_no ?? '') ?></span>
                    </div>

                    <div class="nominee-row">
                        <span>6.</span>
                        <label>মোবাইল নম্বর</label>
                        <span>:</span>
                        <span class="field-val"><?= h($nominee->nominee_mobile_no ?? '') ?></span>
                    </div>

                    <div class="nominee-row">
                        <span>7.</span>
                        <label>ঠিকানা</label>
                        <span>:</span>
                        <span class="field-val"><?= h($nominee->nominee_address ?? '') ?></span>
                    </div>

                    <div class="nominee-row">
                        <span>8.</span>
                        <label>নমিনির প্রাপ্য অংশ (%)</label>
                        <span>:</span>
                        <div class="d-flex align-items-center gap-2">
                            <span class="field-val"
                                style="max-width:75px"><?= h(fmtNum($nominee->nominee_share ?? '')) ?></span>
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
                            <span class="option-item"><input type="checkbox" disabled <?= $shareTypeVal === 'সাধারণ শেয়ার' ? 'checked' : '' ?>> সাধারণ শেয়ার</span>
                            <span class="option-item">
                                <input type="checkbox" disabled <?= ($shareTypeVal !== '' && $shareTypeVal !== 'সাধারণ শেয়ার') ? 'checked' : '' ?>>
                                অন্যান্য<?= ($shareTypeVal !== '' && $shareTypeVal !== 'সাধারণ শেয়ার') ? ' (' . h($shareTypeRaw) . ')' : '' ?>
                            </span>
                        </div>
                    </div>


                    <div class="share-info-row d-flex">
                        <div class="share-row">
                            <span class="serial">2.</span>
                            <label>আবেদনকৃত শেয়ারের সংখ্যা</label>
                            <span>:</span>
                            <span class="field-val"><?= h(fmtNum($investment->share_quantity ?? '')) ?></span>
                        </div>

                        <div class="share-row" style="margin-left: 15px;">
                            <span class=""></span>
                            <label class="field-val">শেয়ার নম্বর : <?= h(fmtNum($investment->share_no ?? '')) ?></label>
                            <!-- <span class="field-val"></span> -->
                        </div>
                    </div>

                    <div class="share-info-row d-flex">
                        <div class="share-row">
                            <span class="serial">3.</span>
                            <label>প্রতি শেয়ারের মূল্য</label>
                            <span>:</span>
                            <span class="field-val"><?= h(fmtNum($investment->share_price ?? '')) ?></span>
                        </div>

                        <div class="share-row text-left">
                            <span class="serial"></span>
                            <label class="field-val">মোট মূল্য : <?= h(fmtNum($investment->total_invest_amount ?? '')) ?></label>
                            <!-- <span class="field-val"></span> -->
                        </div>
                    </div>


                    <div class="share-row">
                        <span>4.</span>
                        <label>মোট বিনিয়োগের পরিমাণ</label>
                        <span>:</span>
                        <span class="field-val"><?= h(fmtNum($investment->total_invest_amount ?? '')) ?></span>
                    </div>

                    <div class="share-row">
                        <span>5.</span>
                        <label>বিনিয়োগের ধরন</label>
                        <span>:</span>
                        <div class="gender-options">
                            <span class="option-item"><input type="checkbox" disabled <?= in_array($investTypeVal, ['এককালীন', 'onetime', 'lump sum'], true) ? 'checked' : '' ?>> এককালীন</span>
                            <span class="option-item"><input type="checkbox" disabled <?= $investTypeVal === 'কিস্তিতে' ? 'checked' : '' ?>> কিস্তিতে</span>
                        </div>
                    </div>

                    <div class="share-row">
                        <span>6.</span>
                        <label>অর্থ পরিশোধের মাধ্যম</label>
                        <span>:</span>
                        <div class="gender-options">
                            <span class="option-item"><input type="checkbox" disabled <?= $paymentMethodVal === 'নগদ' ? 'checked' : '' ?>> নগদ</span>
                            <span class="option-item"><input type="checkbox" disabled <?= $paymentMethodVal === 'ব্যাংক' ? 'checked' : '' ?>> ব্যাংক</span>
                            <span class="option-item"><input type="checkbox" disabled <?= in_array($paymentMethodVal, ['অনলাইন ব্যাংকিং'], true) ? 'checked' : '' ?>> অনলাইন
                                ব্যাংকিং</span>
                            <span class="option-item"><input type="checkbox" disabled <?= (!in_array($paymentMethodVal, ['', 'নগদ', 'ব্যাংক', 'অনলাইন ব্যাংকিং'], true)) ? 'checked' : '' ?>>
                                অন্যান্য</span>
                        </div>
                    </div>

                    <div class="share-row">
                        <span>7.</span>
                        <label>অর্থ পরিশোধের তারিখ</label>
                        <span>:</span>
                        <span class="field-val"><?= h($paymentDate) ?></span>
                    </div>

                    <div class="share-row">
                        <span>8.</span>
                        <label>ট্রানজেকশন/ভাউচার নম্বর</label>
                        <span>:</span>
                        <span class="field-val"><?= h($investment->transaction_vouchar_no ?? '') ?></span>
                    </div>

                </div>
            </section>

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
                            <span class="field-val"><?= h($bank->bank_name ?? '') ?></span>
                        </div>

                        <div class="bank-row">
                            <span>2.</span>
                            <label>শাখার নাম</label>
                            <span>:</span>
                            <span class="field-val"><?= h($bank->branch_name ?? '') ?></span>
                        </div>

                        <div class="bank-row">
                            <span>3.</span>
                            <label>হিসাবের নাম</label>
                            <span>:</span>
                            <span class="field-val"><?= h($bank->account_name ?? '') ?></span>
                        </div>

                        <div class="bank-row">
                            <span>4.</span>
                            <label>হিসাব নম্বর</label>
                            <span>:</span>
                            <span class="field-val"><?= h($bank->account_no ?? '') ?></span>
                        </div>

                        <div class="bank-row">
                            <span>5.</span>
                            <label>রাউটিং নম্বর</label>
                            <span>:</span>
                            <span class="field-val"><?= h($bank->routing_no ?? '') ?></span>
                        </div>

                    </div>
                </div>

                <div class="section orange">

                    <div class="section-heading">
                        6. প্রয়োজনীয় সংযুক্তি (Required Documents)
                    </div>


                    <div class="document-list">

                        <div class="document-item">
                            <input type="checkbox" disabled <?= $applicantNidUrl ? 'checked' : '' ?>>
                            <?php if ($attachment->applicant_nid_att): ?>
                                <a href="<?= base_url('assets/uploads/shareholder_applications/nid/' . $attachment->applicant_nid_att); ?>"
                                    target="_blank" title="<?= h($attachment->applicant_nid_att ?? '') ?>"><i
                                        class="fas fa-eye"></i></a>
                            <?php else: ?>
                                <i class="fas fa-eye text-muted"></i>
                            <?php endif; ?>
                            <span>জাতীয় পরিচয়পত্রের কপি</span>
                        </div>

                        <div class="document-item">
                            <input type="checkbox" disabled <?= $nomineeImgUrl ? 'checked' : '' ?>>
                            <?php if ($attachment->nominee_img): ?>
                                <a href="<?= base_url('assets/uploads/shareholder_applications/nominee_img/' . $attachment->nominee_img); ?>"
                                    target="_blank" title="<?= h($attachment->nominee_img ?? '') ?>"><i
                                        class="fas fa-eye"></i></a>
                            <?php else: ?>
                                <i class="fas fa-eye text-muted"></i>
                            <?php endif; ?>
                            <span>নমিনির ছবি</span>
                        </div>

                        <div class="document-item">
                            <input type="checkbox" disabled <?= $paymentReceiptUrl ? 'checked' : '' ?>>
                            <?php if ($attachment->payment_reciept): ?>
                                <a href="<?= base_url('assets/uploads/shareholder_applications/receipts/' . $attachment->payment_reciept); ?>"
                                    target="_blank" title="<?= h($attachment->payment_reciept ?? '') ?>"><i
                                        class="fas fa-eye"></i></a>
                            <?php else: ?>
                                <i class="fas fa-eye text-muted"></i>
                            <?php endif; ?>
                            <span>অর্থ পরিশোধের প্রমাণপত্র</span>
                        </div>

                        <div class="document-item">
                            <input type="checkbox" disabled <?= $nomineeNidUrl ? 'checked' : '' ?>>
                            <?php if ($attachment->nominee_nid_att): ?>
                                <a href="<?= base_url('assets/uploads/shareholder_applications/nid/' . $attachment->nominee_nid_att); ?>"
                                    target="_blank" title="<?= h($attachment->nominee_nid_att ?? '') ?>"><i
                                        class="fas fa-eye"></i></a>
                            <?php else: ?>
                                <i class="fas fa-eye text-muted"></i>
                            <?php endif; ?>
                            <span>নমিনির জাতীয় পরিচয়পত্রের কপি</span>
                        </div>

                        <div class="document-item">
                            <input type="checkbox" disabled <?= $otherDocsUrl ? 'checked' : '' ?>>
                            <?php if ($attachment->documents): ?>
                                <a href="<?= base_url('assets/uploads/shareholder_applications/documents/' . $attachment->documents); ?>"
                                    target="_blank" title="<?= h($attachment->documents ?? '') ?>"><i
                                        class="fas fa-eye"></i></a>
                            <?php else: ?>
                                <i class="fas fa-eye text-muted"></i>
                            <?php endif; ?>
                            <span>অন্যান্য প্রয়োজনীয় কাগজপত্র</span>
                        </div>

                        <div class="document-item">
                            <input type="checkbox" disabled <?= $nomineeSignUrl ? 'checked' : '' ?>>
                            <?php if ($attachment->nominee_sign): ?>
                                <a href="<?= base_url('assets/uploads/shareholder_applications/signature/' . $attachment->nominee_sign); ?>"
                                    target="_blank" title="<?= h($attachment->nominee_sign ?? '') ?>"><i
                                        class="fas fa-eye"></i></a>
                            <?php else: ?>
                                <i class="fas fa-eye text-muted"></i>
                            <?php endif; ?>
                            <span>নমিনির স্বাক্ষর</span>
                        </div>

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
                    আমি CHANDRA TRADING LTD. এর শেয়ার বরাদ্দ শর্তাবলী এবং কোম্পানির অনুমোদিত নীতিমালা
                    মেনে চলতে সম্মত আছি। আমার বিনিয়োগকৃত অর্থের উৎস বৈধ।

                    <br>

                    আমি অবগত আছি যে, এই আবেদন জমা দেওয়ার মাত্রই শেয়ারহোল্ডার হিসেবে আমার অধিকার সৃষ্টি
                    হবে না। কোম্পানির যথাযথ যাচাই, অনুমোদন ও শেয়ার বরাদ্দের প্রক্রিয়া সম্পন্ন হওয়ার পর
                    তা কার্যকর হবে।

                </div>

            </div>
        </section>

        <div class="applicant-signature">
            <img width="90px"
                src="<?= base_url('assets/uploads/shareholder_applications/signature/' . $attachment->applicant_sign); ?>"
                alt="CTL Logo"> <br>
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

</body>

</html>