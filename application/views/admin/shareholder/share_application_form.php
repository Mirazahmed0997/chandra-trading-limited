<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share Application Form - Chandra Trading Ltd.</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            background: #e9ecef;
            font-family: 'Noto Sans Bengali', sans-serif;
            color: #111;
            font-size: 13px;
        }

        .form-wrapper {
            max-width: 1260px;
            min-height: 297mm;
            margin: 24px auto;
            padding: 24px 28px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .1);
        }

        .form-header {
            border-bottom: 2px solid #0867bd;
            padding-bottom: 12px;
            margin-bottom: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .section {
            border: 1.5px solid var(--section-color);
            border-radius: 12px;
            margin-bottom: 16px;
            overflow: hidden;
        }

        .section-heading {
            color: #fff;
            background: var(--section-color);
            padding: 7px 14px;
            font-size: 15px;
            font-weight: 700;
        }

        .section-body {
            padding: 14px;
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
            --section-color: #d9480f;
        }

        .personal-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 190px;
            gap: 16px;
            align-items: start;
        }

        .personal-photo {
            border: 1.5px solid #1689bb;
            border-radius: 10px;
            padding: 8px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            background: #f8fcff;
        }

        .photo-box {
            width: 100%;
            height: 170px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-radius: 6px;
            background: #eef6fb;
        }

        .photo-preview {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
        }

        .photo-placeholder {
            color: #1689d5;
            font-size: 72px;
        }

        .photo-caption {
            color: #fff;
            background: #0875b9;
            width: 100%;
            padding: 4px 6px;
            font-weight: 700;
            font-size: 12px;
            border-radius: 6px;
            margin-top: 8px;
        }

        .sub-heading {
            background: #e0f4f8;
            color: #004a74;
            font-size: 13px;
            font-weight: 700;
            padding: 5px 10px;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        .print-button {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 100;
        }

        @media print {
            body {
                background: #fff;
            }

            .print-button,
            .no-print {
                display: none !important;
            }

            .form-wrapper {
                margin: 0;
                padding: 10px;
                box-shadow: none;
                max-width: 100%;
            }
        }

        @media (max-width: 767px) {
            .personal-layout {
                grid-template-columns: 1fr;
            }

            .personal-photo {
                max-width: 210px;
                margin: 0 auto;
            }

            .print-button {
                position: static;
                margin: 12px 12px 0 auto;
                display: block;
            }
        }
    </style>
</head>

<body>


    <div class="form-wrapper content-wrapper">
        <div class="form-header">
            <div>
                <h4 class="fw-bold mb-0 text-primary">Shareholder Application Form</h4>
                <small class="text-muted">Chandra Trading Ltd.</small>
            </div>
            <span class="badge bg-light text-dark border">New Application</span>
        </div>

        <form action="<?= base_url('create_shareholder') ?>" method="POST" enctype="multipart/form-data">
            <!-- <?php if (isset($this->security)): ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                    value="<?= $this->security->get_csrf_hash(); ?>">
            <?php endif; ?> -->

            <div class="section blue">
                <div class="section-heading">1. আবেদকারীর ব্যক্তিগত তথ্য (Personal Information)</div>
                <div class="section-body">
                    <div class="personal-layout">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label for="applicant_name_bn" class="form-label fw-semibold small mb-1">আবেদিনকারীর
                                    পূর্ণ নাম (বাংলা) <span class="text-danger">*</span></label>
                                <input type="text" name="applicant_name_bn" id="applicant_name_bn"
                                    class="form-control form-control-sm" placeholder="আবেদনকারীর নাম" required>
                            </div>
                            <div class="col-md-6">
                                <label for="applicant_name_en" class="form-label fw-semibold small mb-1">Full Name
                                    (English)</label>
                                <input type="text" name="applicant_name_en" id="applicant_name_en"
                                    class="form-control form-control-sm" placeholder="Full Name in English">
                            </div>
                            <div class="col-md-6">
                                <label for="father_name" class="form-label fw-semibold small mb-1">পিতার নাম</label>
                                <input type="text" name="father_name" id="father_name"
                                    class="form-control form-control-sm" placeholder="Father's name">
                            </div>
                            <div class="col-md-6">
                                <label for="mother_name" class="form-label fw-semibold small mb-1">মাতার নাম</label>
                                <input type="text" name="mother_name" id="mother_name"
                                    class="form-control form-control-sm" placeholder="Mother's name">
                            </div>
                            <div class="col-md-6">
                                <label for="husband_wife_name" class="form-label fw-semibold small mb-1">স্বামী/স্ত্রীর
                                    নাম</label>
                                <input type="text" name="husband_wife_name" id="husband_wife_name"
                                    class="form-control form-control-sm" placeholder="Husband / Wife name">
                            </div>
                            <div class="col-md-3">
                                <label for="gender" class="form-label fw-semibold small mb-1">লিঙ্গ</label>
                                <select name="gender" id="gender" class="form-select form-select-sm">
                                    <option value="">Select</option>
                                    <option value="পুরুষ">পুরুষ</option>
                                    <option value="মহিলা">মহিলা</option>
                                    <option value="অন্যান্য">অন্যান্য</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="birth_date" class="form-label fw-semibold small mb-1">জন্ম তারিখ</label>
                                <input type="date" name="birth_date" id="birth_date"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="nationality" class="form-label fw-semibold small mb-1">জাতীয়তা</label>
                                <input type="text" name="nationality" id="nationality"
                                    class="form-control form-control-sm" value="Bangladeshi">
                            </div>
                            <div class="col-md-4">
                                <label for="profession" class="form-label fw-semibold small mb-1">পেশা</label>
                                <input type="text" name="profession" id="profession"
                                    class="form-control form-control-sm" placeholder="e.g. Business, Service">
                            </div>
                            <div class="col-md-4">
                                <label for="nid_no" class="form-label fw-semibold small mb-1">জাতীয় পরিচয়পত্র (NID)
                                    নম্বর <span class="text-danger">*</span></label>
                                <input type="text" name="nid_no" id="nid_no" class="form-control form-control-sm"
                                    placeholder="National ID number" required>
                            </div>
                            <div class="col-md-4">
                                <label for="tin_no" class="form-label fw-semibold small mb-1">TIN নম্বর (যদি
                                    থাকে)</label>
                                <input type="text" name="tin_no" id="tin_no" class="form-control form-control-sm"
                                    placeholder="Taxpayer ID number">
                            </div>
                            <div class="col-md-4">
                                <label for="mobile_no" class="form-label fw-semibold small mb-1">মোবাইল নম্বর<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="mobile_no" id="mobile_no" class="form-control form-control-sm"
                                    placeholder="01XXXXXXXXX" required>
                            </div>
                            <div class="col-md-4">
                                <label for="additional_contact" class="form-label fw-semibold small mb-1">অতিরিক্ত
                                    মোবাইল নম্বর</label>
                                <input type="text" name="additional_contact" id="additional_contact"
                                    class="form-control form-control-sm" placeholder="01XXXXXXXXX">
                            </div>
                            <div class="col-md-4">
                                <label for="email" class="form-label fw-semibold small mb-1">ইমেইল</label>
                                <input type="email" name="email" id="email" class="form-control form-control-sm"
                                    placeholder="name@example.com">
                            </div>
                            <div class="col-md-4">
                                <label for="additional_email" class="form-label fw-semibold small mb-1">অতিরিক্ত
                                    ইমেইল</label>
                                <input type="email" name="additional_email" id="additional_email"
                                    class="form-control form-control-sm" placeholder="name@example.com">
                            </div>
                        </div>

                        <div class="personal-photo">
                            <div class="photo-box">
                                <i id="photoPlaceholder" class="fas fa-user-circle photo-placeholder"></i>
                                <img id="photoPreview" class="photo-preview" alt="Applicant Photo Preview">
                            </div>
                            <div class="photo-caption">Applicant Photo</div>
                            <input type="file" name="applicant_img" id="applicant_img"
                                class="form-control form-control-sm mt-2" accept=".jpg,.jpeg,.png,.webp"
                                onchange="previewPhoto(event)">
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. Contact Information -->
            <div class="section green">
                <div class="section-heading">2. যোগাযোগের ঠিকানা (Contact Information)</div>
                <div class="section-body">
                    <div class="sub-heading">Present Address</div>
                    <div class="row g-2 mb-3">
                        <div class="col-md-3">
                            <label for="present_village" class="form-label fw-semibold small mb-1">গ্রাম/বাসা</label>
                            <input type="text" name="present_village" id="present_village"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-md-3">
                            <label for="present_post_office" class="form-label fw-semibold small mb-1">ডাকঘর</label>
                            <input type="text" name="present_post_office" id="present_post_office"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-md-3">
                            <label for="present_sub_district" class="form-label fw-semibold small mb-1">উপজেলা</label>
                            <input type="text" name="present_sub_district" id="present_sub_district"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-md-3">
                            <label for="present_district" class="form-label fw-semibold small mb-1">জেলা</label>
                            <input type="text" name="present_district" id="present_district"
                                class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="sub-heading">স্থায়ী ঠিকানা</div>
                    <div class="row g-2">
                        <div class="col-md-3">
                            <label for="permanent_village" class="form-label fw-semibold small mb-1">গ্রাম/বাসা</label>
                            <input type="text" name="permanent_village" id="permanent_village"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-md-3">
                            <label for="permanent_post_office" class="form-label fw-semibold small mb-1">ডাকঘর</label>
                            <input type="text" name="permanent_post_office" id="permanent_post_office"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-md-3">
                            <label for="permanent_sub_district" class="form-label fw-semibold small mb-1">উপজেলা</label>
                            <input type="text" name="permanent_sub_district" id="permanent_sub_district"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-md-3">
                            <label for="permanent_district" class="form-label fw-semibold small mb-1">জেলা</label>
                            <input type="text" name="permanent_district" id="permanent_district"
                                class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Nominee Information -->
            <div class="section purple">
                <div class="section-heading">3. নমিনির তথ্য (Nominee Information)</div>
                <div class="section-body">
                    <div class="row g-2">
                        <div class="col-md-6">
                            <label for="nominee_name" class="form-label fw-semibold small mb-1">নমিনির পূর্ণ নাম</label>
                            <input type="text" name="nominee_name" id="nominee_name"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-md-6">
                            <label for="nominee_father_husband_name"
                                class="form-label fw-semibold small mb-1">পিতা/স্বামীর নাম</label>
                            <input type="text" name="nominee_father_husband_name" id="nominee_father_husband_name"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-md-4">
                            <label for="relation_with_applicant" class="form-label fw-semibold small mb-1">আবেদনকারীর
                                সাথে সম্পর্ক</label>
                            <input type="text" name="relation_with_applicant" id="relation_with_applicant"
                                class="form-control form-control-sm" placeholder="e.g. Spouse, Son, Daughter">
                        </div>
                        <div class="col-md-4">
                            <label for="nominee_date_of_birth" class="form-label fw-semibold small mb-1">জন্ম
                                তারিখ</label>
                            <input type="date" name="nominee_date_of_birth" id="nominee_date_of_birth"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-md-4">
                            <label for="nominee_share" class="form-label fw-semibold small mb-1">নমিনির প্রাপ্য অংশ
                                (%)</label>
                            <input type="number" step="0.01" name="nominee_share" id="nominee_share"
                                class="form-control form-control-sm" placeholder="100">
                        </div>
                        <div class="col-md-6">
                            <label for="nominee_nid_no" class="form-label fw-semibold small mb-1">জাতীয় পরিচয়পত্র
                                নম্বর</label>
                            <input type="text" name="nominee_nid_no" id="nominee_nid_no"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-md-6">
                            <label for="nominee_mobile_no" class="form-label fw-semibold small mb-1">মোবাইল
                                নম্বর</label>
                            <input type="text" name="nominee_mobile_no" id="nominee_mobile_no"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-12">
                            <label for="nominee_address" class="form-label fw-semibold small mb-1">ঠিকানা</label>
                            <textarea name="nominee_address" id="nominee_address" rows="2"
                                class="form-control form-control-sm"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. Share & Investment Details -->
            <div class="section orange">
                <div class="section-heading">4. শেয়ার ও বিনিয়োগের বিবরণ (Share & Investment Details)</div>
                <div class="section-body">
                    <div class="row g-2">

                        <div class="col-md-4">
                            <label for="share_type" class="form-label fw-semibold small mb-1">শেয়ারের ধরন</label>
                            <select name="share_type" id="share_type" class="form-select form-select-sm">
                                <option value="">নির্বাচন করুন</option>
                                <option value="সাধারণ শেয়ার">সাধারণ শেয়ার</option>
                                <option value="অন্যান্য">অন্যান্য</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="share_quantity" class="form-label fw-semibold small mb-1">আবেদনকৃত শেয়ারের
                                সংখ্যা</label>
                            <input type="number" step="any" min="0" name="share_quantity" id="share_quantity"
                                class="form-control form-control-sm" oninput="calcTotal()">
                        </div>
                        <div class="col-md-4">
                            <label for="share_price" class="form-label fw-semibold small mb-1">প্রতি শেয়ারের
                                মূল্য</label>
                            <input type="number" step="0.01" min="0" name="share_price" id="share_price"
                                class="form-control form-control-sm" oninput="calcTotal()">
                        </div>
                        <div class="col-md-4">
                            <label for="total_share_price" class="form-label fw-semibold small mb-1">মোট মূল্য
                            </label>
                            <input type="number" step="0.01" name="total_share_price" id="total_share_price"
                                class="form-control form-control-sm bg-light" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="share_no" class="form-label fw-semibold small mb-1">শেয়ার নম্বর
                            </label>
                            <input type="text" step="0.01" name="share_no" id="share_no"
                                class="form-control form-control-sm bg-light" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="total_invest_amount" class="form-label fw-semibold small mb-1">মোট বিনিয়োগের
                                পরিমাণ</label>
                            <input type="number" step="0.01" name="total_invest_amount" id="total_invest_amount"
                                class="form-control form-control-sm bg-light">
                        </div>

                        <div class="col-md-4">
                            <label for="invest_type" class="form-label fw-semibold small mb-1">বিনিয়োগের ধরন</label>
                            <select name="invest_type" id="invest_type" class="form-select form-select-sm">
                                <option value="">নির্বাচন করুন</option>
                                <option value="এককালীন">এককালীন</option>
                                <option value="কিস্তি">কিস্তি</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="medium_of_payment" class="form-label fw-semibold small mb-1">অর্থ পরিশোধের
                                মাধ্যম</label>
                            <select name="medium_of_payment" id="medium_of_payment" class="form-select form-select-sm">
                                <option value="">নির্বাচন করুন</option>
                                <option value="নগদ">নগদ (Cash)</option>
                                <option value="ব্যাংক">ব্যাংক ট্রান্সফার</option>
                                <option value="অনলাইন ব্যাংকিং">অনলাইন ব্যাংকিং</option>
                                <option value="অন্যান্য">অন্যান্য</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="date_of_payment" class="form-label fw-semibold small mb-1">অর্থ পরিশোধের
                                তারিখ</label>
                            <input type="date" name="date_of_payment" id="date_of_payment"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-md-6">
                            <label for="transaction_vouchar_no"
                                class="form-label fw-semibold small mb-1">ট্রানজেকশন/ভাউচার নম্বর</label>
                            <input type="text" name="transaction_vouchar_no" id="transaction_vouchar_no"
                                class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5. Bank Details -->
            <div class="section blue">
                <div class="section-heading">5. ব্যাংক হিসাবের বিবরণ (Bank Account Information)</div>
                <div class="section-body">
                    <div class="row g-2">
                        <div class="col-md-6">
                            <label for="bank_name" class="form-label fw-semibold small mb-1">ব্যাংকের নাম</label>
                            <input type="text" name="bank_name" id="bank_name" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-6">
                            <label for="branch_name" class="form-label fw-semibold small mb-1">শাখার নাম</label>
                            <input type="text" name="branch_name" id="branch_name" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-4">
                            <label for="account_name" class="form-label fw-semibold small mb-1">হিসাবের নাম</label>
                            <input type="text" name="account_name" id="account_name"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-md-4">
                            <label for="account_no" class="form-label fw-semibold small mb-1">হিসাব নম্বর</label>
                            <input type="text" name="account_no" id="account_no" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-4">
                            <label for="routing_no" class="form-label fw-semibold small mb-1">রাউটিং নম্বর</label>
                            <input type="text" name="routing_no" id="routing_no" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
            </div>

            <!-- 6. Attachments -->
            <div class="section green">
                <div class="section-heading">6. প্রয়োজনীয় সংযুক্তি (Required Documents)</div>
                <div class="section-body">
                    <div class="row g-2">
                        <div class="col-md-6">
                            <label for="applicant_nid_att" class="form-label fw-semibold small mb-1">জাতীয় পরিচয়পত্রের
                                কপি</label>
                            <input type="file" name="applicant_nid_att" id="applicant_nid_att"
                                class="form-control form-control-sm" accept=".pdf,.jpg,.jpeg,.png">
                        </div>
                        <div class="col-md-6">
                            <label for="applicant_sign" class="form-label fw-semibold small mb-1">আবেদকারীর
                                স্বাক্ষর</label>
                            <input type="file" name="applicant_sign" id="applicant_sign"
                                class="form-control form-control-sm" accept=".jpg,.jpeg,.png">
                        </div>
                        <div class="col-md-6">
                            <label for="nominee_img" class="form-label fw-semibold small mb-1">নমিনির ছবি</label>
                            <input type="file" name="nominee_img" id="nominee_img" class="form-control form-control-sm"
                                accept=".jpg,.jpeg,.png,.webp">
                        </div>
                        <div class="col-md-6">
                            <label for="nominee_nid_att" class="form-label fw-semibold small mb-1">নমিনির জাতীয়
                                পরিচয়পত্রের কপি</label>
                            <input type="file" name="nominee_nid_att" id="nominee_nid_att"
                                class="form-control form-control-sm" accept=".jpg,.jpeg,.png,.pdf">
                        </div>
                        <div class="col-md-6">
                            <label for="nominee_sign" class="form-label fw-semibold small mb-1">নমিনির স্বাক্ষর</label>
                            <input type="file" name="nominee_sign" id="nominee_sign"
                                class="form-control form-control-sm" accept=".jpg,.jpeg,.png">
                        </div>
                        <div class="col-md-6">
                            <label for="payment_reciept" class="form-label fw-semibold small mb-1">অর্থ পরিশোধের
                                প্রমাণপত্র</label>
                            <input type="file" name="payment_reciept" id="payment_reciept"
                                class="form-control form-control-sm" accept=".jpg,.jpeg,.png,.pdf">
                        </div>
                        <div class="col-md-12">
                            <label for="documents" class="form-label fw-semibold small mb-1">অন্যান্য প্রয়োজনীয়
                                কাগজপত্র</label>
                            <input type="file" name="documents" id="documents" class="form-control form-control-sm"
                                accept=".jpg,.jpeg,.png,.pdf">
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-3 no-print">
                <button type="reset" class="btn btn-outline-secondary btn-sm px-3">Reset</button>
                <button type="submit" class="btn btn-primary btn-sm px-4">Submit Application</button>
            </div>
        </form>
    </div>

    <script>
        function previewPhoto(event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function (e) {
                const preview = document.getElementById('photoPreview');
                const placeholder = document.getElementById('photoPlaceholder');
                preview.src = e.target.result;
                preview.style.display = 'block';
                if (placeholder) placeholder.style.display = 'none';
            };
            reader.readAsDataURL(file);
        }

        function calcTotal() {
            const qty = parseFloat(document.getElementById('share_quantity').value) || 0;
            const price = parseFloat(document.getElementById('share_price').value) || 0;
            const totalField = document.getElementById('total_invest_amount');
            if (qty > 0 && price > 0) {
                totalField.value = (qty * price).toFixed(2);
            }
        }


        numbers = document.querySelectorAll('input[type="number"]').forEach(function (input) {

            input.addEventListener('wheel', function (e) {
                this.blur();
            });

        });
    </script>

</body>

</html>



<script>
    function calcTotal() {
        const qtyInput = document.getElementById('share_quantity');
        const priceInput = document.getElementById('share_price');
        const totalInput = document.getElementById('total_share_price');

        const qty = parseFloat(qtyInput.value);
        const price = parseFloat(priceInput.value);

        if (!isNaN(qty) && !isNaN(price)) {
            const total = qty * price;
            // Round to 2 decimal places to avoid floating-point noise like 19.990000000000002
            totalInput.value = Number.isInteger(total) ? total : total.toFixed(2);
        } else {
            totalInput.value = '';
        }
    }

    // Run once on load in case the form is pre-populated (e.g., edit mode)
    document.addEventListener('DOMContentLoaded', calcTotal);
</script>