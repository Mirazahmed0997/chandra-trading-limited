<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>One Page Form Design</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .page {
            width: 100%;

            min-height: 100vh;
            margin: 0;
            background: #fff;
            padding: 20px 30px;
            color: #000;
            position: relative;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.25);
        }

        body {
            margin: 0;
            padding: 0;
            background: #fff;
            width: 85%;
        }

        .header {
            text-align: center;
            position: relative;
            line-height: 1.3;
            background: #c45ebc;
            box-shadow: 0 2px 6px rgba(23, 23, 23, 0.5);
            padding: 20px;
            color: white;
            /* margin-bottom: 40px !important; */
        }

        .header h2 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .header p {
            font-size: 13px;
            margin-bottom: 2px;
        }

        .print {
            position: absolute;
            right: 0;
            top: 0;
            font-size: 16px;
            font-weight: 700;
        }

        .badge-title {
            display: inline-block;
            border: 2px solid #e6e0e0;
            padding: 6px 25px;
            margin-top: 10px;
            font-size: 18px;
            font-weight: 700;
        }

        .top-box {
            display: flex;
            justify-content: space-between;
            padding-top: 40px;
            margin-bottom: 12px;
        }

        .number-group {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 15px;
            font-weight: 600;
        }

        .digit-box {
            display: flex;
            align-items: center;
        }

        .digit-box span {
            width: 28px;
            height: 28px;
            border: 1px solid #000;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: -1px;
            font-size: 13px;
        }

        .digit-box .border-none {
            border: none;
            width: auto;
            margin: 0 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 6px;
        }

        .content {
            font-size: 14px;
            line-height: 1.3;
            margin-top: 8px;
            text-align: justify;
        }

        .content p {
            margin-bottom: 8px;
        }

        .section-title {
            border: 1.5px solid #000;
            text-align: center;
            padding: 5px;
            font-size: 17px;
            font-weight: 700;
            margin-top: 10px;
            margin-bottom: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        table td {
            border: 1px solid #000;
            padding: 5px 7px;
            vertical-align: middle;
        }

        .label {
            width: 20%;
            font-weight: 600;
        }

        .value {
            width: 30%;
        }

        .image-title {
            text-align: center;
            font-weight: 700;
        }

        .image-box {
            min-height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .image-box img {
            min-width: 150px;
            max-width: 150px;
            height: 40%;
            object-fit: contain;
            cursor: pointer;
            transition: 0.3s;
        }

        .image-box img:hover {
            transform: scale(1.05);
        }

        .sign-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: -5px;
        }

        .member-sign {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            font-size: 12px;
        }

        .sign-text {
            text-align: right;
            line-height: 1.5;
        }

        .bank-acc {
            font-size: 12px;
            margin-top: 10px;
            background-color: #EAF1DD;
            padding: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.25);
        }

        .bank-acc p {
            margin-bottom: 5px;
        }

        .bank-acc ul {
            margin: 0;
            padding-left: 18px;
        }

        .footer-sign {
            margin-top: 25px;
            padding-bottom: 5px;
        }

        .footer-sign .line {
            border-top: 1px solid #000;
            width: 150px;
            margin: 0 auto;
        }

        .member-sign .line {
            border-top: 1px solid #000;
            width: 150px;
            margin: 0 auto 5px;
        }

        .footer-sign p {
            text-align: center;
            font-size: 12px;
            font-weight: 600;
            margin: 0%;
        }

        .footer {
            background-color: #c45ebc;
            padding: 5px;
            box-shadow: 0 2px 6px rgba(23, 23, 23, 0.5);
        }

        .footer p {
            font-size: 14px;
            font-weight: bold;
            color: white;
        }

        .note {
            font-size: 14px;
            padding: 10px;
            /* box-shadow: 0 2px 6px rgba(23, 23, 23, 0.5); */
        }

        .invisible-box {
            visibility: hidden;
        }

        .badge-title {
            background-color: #FFDFB7;
        }

       


        @media print {

            @page {
                size: A4;
                margin: 0;
            }


            .print {
                display: none;
            }

            .section-title {

                padding: 5px;
                font-size: 17px;
                font-weight: 700;
                margin-top: 6px !important;
                margin-bottom: 5px !important;
            }

            .border {
                display: none;
            }


            html,
            body {
                width: 100%;
                height: 100%;
                margin: 0 !important;
                padding: 20px !important;
                background: #fff;
            }

            .header {
                text-align: center;
                position: relative;
                line-height: 1.3;
                background: none !important;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.50);
                padding: 0 !important;
                color: black !important;
                margin-bottom: 0 !important;
            }

            .badge-title {
                border: 2px solid black;
                width: 50%;

            }



            .top-box {

                padding-top: 5px !important;
                margin-bottom: 0 !important;
            }

            table td {
                padding: 3px 7px !important;
            }

            .content {
                margin-top: 5px !important;
            }

            .content p {
                margin-bottom: 0 !important;
            }

            .content-wrapper {
                margin: 0 !important;
                padding: 0 !important;
                background: #fff !important;
            }

            .container-fluid {
                width: 100% !important;
                padding: 0 !important;
                margin: 0 !important;
            }

            .page {
                width: 100% !important;
                min-height: 100vh !important;
                margin: 0 !important;
                padding: 10mm !important;
                box-shadow: none !important;
                border: none !important;
                page-break-after: avoid;
            }

            .image-box {
                min-height: 50px !important;
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: hidden;
            }

            .bank-acc {
                font-size: 12px;
                margin-top: 0 !important;
            }

            .bank-acc p {
                margin-bottom: 5px;
            }

            .image-box img {
                width: 100px !important;
                height: 100px !important;
                object-fit: contain;
                cursor: pointer;
                transition: 0.3s;
            }



            .main-sidebar,
            .main-header,
            .main-footer,
            .no-print {
                display: none !important;
            }

            .sign-wrapper {

                margin-top: -5px !important;
            }

            .member-sign {
                margin-top: 0 !important;
            }

            /* .bank-acc p{
                margin-bottom: 0 !important;
            } */

            .footer-sign {
                padding: 0 !important;
            }

            .footer {
                padding: 5px !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
                box-shadow: 0 2px 6px rgba(23, 23, 23, 0.5);
            }

            .footer p {
                font-size: 16px !important;
                color: black !important;
            }

            .footer a {
                color: black !important;
            }

        }
    </style>

</head>

<body>

    <div class="content-wrapper page">

        <div class="header">

            <div class="print form-code m-2">
                <button onclick="window.print()" class="btn btn-sm btn-danger ">
                    <i class="fas fa-print"></i> Print
                </button>
                <!-- <a href="<?= base_url('approval_update/' . $member->id); ?>"
                    class="btn btn-success btn-sm active-button"
                    onclick="return confirm('Are you sure you want to approve this member?');">
                    <?= ($member->member_status == 'approved') ? 'approved' : 'Approve Now'; ?>
                </a> -->
            </div>

            <h2>বাংলাদেশ জাতীয় সমবায় ইউনিয়ন</h2>

            <p>নিবন্ধন নম্বর: ৩৪, ১৬.০৬.১৯৬১ খ্রি. (সংশোধিত) সঅ-০১, তারিখ: ০৭.০৭.২০২৫ খ্রি.</p>

            <p>ঠিকানা: সমবায় ব্যাংক ভবন (৮ম তলা), ৯/ডি, মতিঝিল বা/এ, ঢাকা-১০০০।</p>

            <!-- <div class="badge-title">
                সদস্য আবেদন ফরম
            </div> -->

        </div>

        <div class="badge-title-container d-flex justify-content-center">
            <div class="badge-title text-center w-25 ">
                সদস্য আবেদন ফরম
            </div>
        </div>

        <div class="top-box <?= ($member->member_status != 'approved') ? 'invisible-box' : '' ?>">

            <div class="number-group">

                <span>তারিখ :</span>

                <?php
                $date = date('dmY', strtotime($member->created_at));
                ?>

                <div class="digit-box">
                    <?php foreach (str_split($date) as $digit) { ?>
                        <span><?= $digit ?></span>
                    <?php } ?>
                </div>

            </div>

            <div class="number-group">
                <span>সদস্য নং :</span>

                <div class="digit-box">
                    <?php
                    $memberNo = $member->member_no;

                    foreach (str_split($memberNo) as $index => $char) {

                        if ($index == 4) {
                            echo '<span class="border-none">-</span>';
                        }

                        echo "<span>{$char}</span>";
                    }
                    ?>
                </div>

            </div>

        </div>

        <div class="content">

            <p>
                বরাবর,<br>
                সভাপতি/সম্পাদক,<br>
                বাংলাদেশ জাতীয় সমবায় ইউনিয়ন<br>
                সমবায় ব্যাংক ভবন (৮ম তলা), ৯/ডি, মতিঝিল বা/এ, ঢাকা-১০০০।
            </p>


            <p>
                বিষয় : সদস্য ভর্তির আবেদন।
            </p>

            <p>
                জনাব, <br>
                আমি নিন্ম স্বাক্ষরকারী আবেদনকৃত সমিতির পক্ষে ক্ষমতাপ্রাপ্ত হয়ে আমাদের সমিতি বাংলাদেশ জাতীয় সমবায় ইউনিয়ন
                এর সদস্য
                ভর্তি হওয়ার জন্য ব্যবস্থাপনা কমিটির সিদ্ধান্ত অনুযায়ী আবেদন করলাম । এই মর্মে বাংলাদেশ জাতীয় সমবায় ইউনিয়ন
                এর ব্যবস্থাপনা কমিটির সিদ্ধান্ত
                এবং বার্ষিক সাধারন সভার সিদ্ধান্ত সহ ইউনিয়ন এর উপ-আইন এবং সমবায় সমিতি আইন ও বিধিমালা মেনে চলার পূর্ণ
                অঙ্গীকার ব্যক্ত করছি । নিম্নে সমিতির তথ্য উপস্থাপন করলাম,

            </p>

        </div>

        <div class="section-title">
            আবেদনকৃত সমিতির ধরণ : <?= $member->a_type ?>
        </div>

        <table>

            <tr>
                <td class="label">সমিতির নাম</td>
                <td colspan="">
                    <?= $member->association_name ?>
                </td>
                <td class="label">কার্যকরী মূলধন</td>
                <td class="value"><?= $member->valid_cap ?></td>


            </tr>

            <tr>
                <td class="label">কার্যালয়ের ঠিকানা</td>
                <td class="value"><?= $member->a_address ?></td>
                <td class="label">সর্বশেষ অর্থ-বছরের নীট লাভ</td>
                <td><?= $member->last_finYear_profit ?></td>



            </tr>

            <tr>

                <td class="label">নিবন্ধন নম্বর</td>
                <td><?= $member->registration_no ?></td>
                <td class="label">সর্বশেষ বার্ষিক সাধারণ সভার তারিখ</td>
                <td><?= $member->last_gen_meeting_date ?></td>


            </tr>
            <tr>

                <td class="label">নিবন্ধন তারিখ</td>
                <td><?= $member->r_date ?></td>


                <td class="label">অডিট সম্পাদনের তারিখ</td>
                <td><?= $member->audit_execution_date ?></td>
            </tr>
            <tr>


                <td class="label">নিবন্ধন ঠিকানা</td>
                <td><?= $member->r_address ?></td>
                <td class="label">নির্বাচন অনুষ্ঠানের তারিখ</td>
                <td><?= $member->election_date ?></td>

            </tr>



            <tr>

                <td class="label">মোবাইল নম্বর</td>
                <td><?= $member->a_contact ?></td>
                <td style="font-size: 12px;" class="label">নির্বাচিত ব্যবস্থাপনা কমিটির প্রথম সভার তারিখ</td>
                <td><?= $member->first_man_meeting_date ?></td>


            </tr>

            <tr>
                <td class="label">ই-মেইল</td>
                <td>
                    <?= $member->a_email ?>
                </td>


                <td class="label">নির্বাচিত সভাপতির নাম</td>
                <td><?= $member->elected_president ?></td>

            </tr>
            <!-- ------------------- -->
            <tr>

                <td class="label">সমিতির পক্ষে প্রতিনিধির নাম</td>
                <td>
                    <?= $member->issuer ?>
                </td>
                <td class="label">মোবাইল নম্বর ও ই-মেইল</td>
                <td><?= $member->president_contact ?>, <?= $member->president_email ?></td>


            </tr>

            <tr>
                <td class="label">পদবী ও ঠিকানা</td>
                <td><?= $member->i_designation ?></td>
                <td class="label">নির্বাচিত সম্পাদকের নাম </td>
                <td><?= $member->elected_editor ?></td>


            </tr>

            <tr>

                <td class="label">মোবাইল নম্বর ও ই-মেইল</td>
                <td>
                    <?= $member->i_contact ?>,
                    <?= $member->i_email ?>
                </td>

                <td class="label">মোবাইল নম্বর ও ই-মেইল</td>
                <td><?= $member->editor_contact ?>, <?= $member->e_email ?></td>


            </tr>

            <tr>
                <td class="label">অনুমোদিত শেয়ার</td>
                <td><?= $member->authorized_shares ?></td>


                <td style="font-size: 12px;" class="label">সর্বশেষ লভ্যাংশ প্রদানের সমবায় বর্ষ ও লভ্যাংশ হার</td>
                <td><?= $member->dividend_percentage ?>%,
                    <?= date('Y', strtotime($member->last_dividend_payment_year)) ?>
                </td>

            </tr>
            <tr>

                <td class="label">পরিশোধিত মূলধন</td>
                <td>
                    <?= $member->capital ?>
                </td>
                <td class="label">লভ্যাংশ প্রদান ধরন</td>
                <td><?= $member->Dividend_payment_type ?></td>
            </tr>

        </table>

        <table style="margin-top:10px;">

            <tr>
                <td class="image-title">নিবন্ধন সনদ</td>
                <td class="image-title">ফরমপত্র</td>
                <td class="image-title">রেজুলেশন</td>
                <td class="image-title">উপ-আইন</td>
            </tr>

            <tr>

                <td>
                    <div class="image-box">

                        <a href="<?= base_url('./http://localhost:8080/bjsu/assets/uploads/project/members/att_reg_cer/' . $member->att_reg_cer) ?>"
                            target="_blank">

                            <img src="<?= base_url('./http://localhost:8080/bjsu/assets/uploads/project/members/att_reg_cer/' . $member->att_reg_cer) ?>"
                                width="60px">
                        </a>

                    </div>
                </td>

                <td>
                    <div class="image-box">

                        <a href="<?= base_url('./http://localhost:8080/bjsu/assets/uploads/project/members/att_auth_cer/' . $member->att_auth_cer) ?>"
                            target="_blank">

                            <img src="<?= base_url('./http://localhost:8080/bjsu/assets/uploads/project/members/att_auth_cer/' . $member->att_auth_cer) ?>"
                                width="60px">

                        </a>

                    </div>
                </td>

                <td>
                    <div class="image-box">

                        <a href="<?= base_url('./http://localhost:8080/bjsu/assets/uploads/project/members/att_resulation/' . $member->att_resulation) ?>"
                            target="_blank">

                            <img src="<?= base_url('./http://localhost:8080/bjsu/assets/uploads/project/members/att_resulation/' . $member->att_resulation) ?>"
                                width="60px">

                        </a>

                    </div>
                </td>

                <td>
                    <div class="image-box">

                        <a href="<?= base_url('./http://localhost:8080/bjsu/assets/uploads/project/members/att_laws/' . $member->att_laws) ?>"
                            target="_blank">

                            <img src="<?= base_url('./http://localhost:8080/bjsu/assets/uploads/project/members/att_laws/' . $member->att_laws) ?>"
                                width="60px">

                        </a>

                    </div>
                </td>

            </tr>

        </table>

        <div class="note text-bold">
            <p>সদস্য ভর্তির চাহিত তথ্য সঠিক এবং ভর্তি ফি ২০০০/=(দুই হাজার) টাকা এবং বার্ষিক চাঁদা ১০০০/=(এক হাজার) টাকা
                ব্যাংক হিসাব নম্বর জমা করবো এবং পরবর্তী বার্ষিক চাঁদা প্রত্যেক বছরের ডিসেম্বর মাসের মধ্যে পরিশোধ করার
                অঙ্গীকার করলাম।
            </p>
        </div>

        <div class="sign-wrapper">
            <div class="">

            </div>

            <div class="member-sign text-center">

                <div class="sign-text">

                    <div class="text-center">
                        <a href="<?= base_url('http://localhost:8080/bjsu/assets/persident_editor_sign/e_sign.png'); ?>" target="_blank">

                            <img src="<?= base_url('./http://localhost:8080/bjsu/assets/uploads/project/members/i_sign/' . $member->i_sign) ?>"
                                width="60px">
                        </a>
                    </div>
                    <div class="line"></div>
                    <div class="text-center"><?= $member->issuer ?></div>
                    <div class="text-center">সমিতির পক্ষে প্রতিনিধির নাম ও স্বাক্ষর</div>
                    <div class="text-center">
                        আবেদনের তারিখ : <?= date('d-m-Y', strtotime($member->created_at)) ?>
                    </div>
                </div>


            </div>

        </div>
        <div class="bank-wrapper">
            <div class="bank-acc col-12 text-bold">
                <p class="">ইউনিয়নের ব্যাংক হিসাব নম্বর :</p>
                <p class=""><span>১.</span> রূপালী ব্যাংক পিএলসি,হিসাব নম্বর : ০০৬৭০১০০৩৯৯৭, ফরেন এক্সচেঞ্জ কর্পোরেট
                    ব্রাঞ্চ ঢাকা।</p>
                <p class=""><span>২.</span> মার্কেন্টাইল ব্যাংক পিএলসি,হিসাব নম্বর : ১১২১০১২২১০৩৪৩, চাঁদপুর ব্রাঞ্চ।</p>
                <p class="">আবেদনটি ব্যবস্থাপনা কমিটি কর্তৃক অনুমোদন করা হলে সদস্য পদের ভর্তি ফি ও চাঁদা ব্যাংক হিসেবে
                    জমা করলে
                    স্বয়ংক্রিয়ভাবে জমা রশিদ আপনার ই-মেইলে প্রেরিত হবে।</p>
            </div>
            <div class="member-sign text-center">


            </div>

        </div>

        <div class="row footer-sign">


            <div class="col-4">

                <div class="text-center">
                    <a href="<?= base_url('http://localhost:8080/bjsu/assets/persident_editor_sign/p_sign.png'); ?>" target="_blank">
                        <img src="<?= base_url('http://localhost:8080/bjsu/assets/persident_editor_sign/p_sign.png'); ?>" width="60px"
                            alt="President Editor Signature">
                    </a>
                </div>
                <p>স্বয়ংক্রিয়ভাবে প্রস্তুত</p>
                <div class="line"></div>
                <p>মো. আব্দুস সালাম</p>
                <p>সভাপতি</p>
            </div>

            <div class="col-4">
                <div class="text-center">
                    <a href="<?= base_url('http://localhost:8080/bjsu/assets/persident_editor_sign/e_sign.png'); ?>" target="_blank">
                        <img src="<?= base_url('http://localhost:8080/bjsu/assets/persident_editor_sign/e_sign.png'); ?>" width="60px"
                            alt="President Editor Signature">
                    </a>
                </div>
                <p>স্বয়ংক্রিয়ভাবে প্রস্তুত</p>
                <div class="line"></div>
                <p>মো. জসিম উদ্দিন</p>
                <p>সম্পাদক</p>
            </div>

            <div class="col-4">
                <div class="text-center">
                    <a href="<?= base_url('http://localhost:8080/bjsu/assets/persident_editor_sign/o_sign.png'); ?>" target="_blank">

                        <img src="<?= base_url('http://localhost:8080/bjsu/assets/persident_editor_sign/o_sign.png'); ?>" width="60px">
                    </a>
                </div>
                <p>স্বয়ংক্রিয়ভাবে প্রস্তুত</p>
                <div class="line"></div>

                <p>অপারেটর</p>
            </div>

        </div>

        <div class="footer">
            <div class="footer-note text-center">
            </div>
            <div class="text-center">
                <p class="text-bold">
                    <!-- আবেদনটি ব্যবস্থাপনা কমিটি কর্তৃক অনুমোদন করা হলে সদস্য পদের ভর্তি ফি ও চাঁদা ব্যাংক হিসেবে জমা করলে
                    স্বয়ংক্রিয়ভাবে জমা রশিদ আপনার ই-মেইলে প্রেরিত হবে। <br> -->
                    ই-মেইলঃ bjsu61@gmail.com
                    মোবাইলঃ ০১৭০৯৬৫৩৫৯৯ । হালনাগাদ তথ্য দেখার জন্য ওয়েবসাইট লগইন করুন : <a class="text-white"
                        href="https://bjsucoop.org/">https://bjsucoop.org/</a>
                </p>
            </div>
            <div>

            </div>
        </div>

        <div class="border text-center mt-2">
            <a href="<?= base_url('approval_update/' . $member->id); ?>" class="btn btn-success btn-sm active-button"
                onclick="return confirm('Are you sure you want to approve this member?');">
                <?= ($member->member_status == 'approved') ? 'Approved' : 'Approve Now'; ?>
            </a>

            <?php if ($member->member_status == 'approved'): ?>
                <span class="badge bg-success"></span>
            <?php else: ?>
                <a href="<?= base_url('reject_member/' . $member->id); ?>" class="btn btn-danger btn-sm reject-button"
                    onclick="return confirm('Are you sure you want to reject this member?');">Reject</a>
            <?php endif; ?>
            <?php if ($member->member_status == 'approved'): ?>
                <span class="badge bg-success"></span>
            <?php else: ?>
                <a href=" <?= base_url('review_member/' . $member->id); ?>" class="btn btn-success btn-sm reject-button"
                    onclick="return confirm('Are you sure you want to reject this member?');">
                    Review</a>
            <?php endif; ?>

            <button class="btn btn-success btn-sm reject-button" onclick="comment()">
                Add Comment
            </button>
        </div>

    </div>





</body>

</html>

<form class="text-center  comment" action="<?php echo base_url('Admin/update_comment/' . $member->id); ?>" method="POST">
    <div id="comment-box" class="form-group d-none">
        <label>মন্তব্য লিখুন :</label><br>
        <textarea name="comments" ></textarea><br>
        <button onclick="return confirm('Are you sure you ?');" type="submit"
            class="btn btn-success btn-sm reject-button">Submit</button>
        <button onclick="cancel()"
            class="btn btn-success btn-sm reject-button">Cancel</button>
    </div>
</form>


<script>

    function comment() {
        comment = document.getElementById('comment-box')
        comment.classList.remove('d-none');
    }

    function cancel()
    {
        comment = document.getElementById('comment-box')
        comment.classList.add('d-none');
    }

</script>


