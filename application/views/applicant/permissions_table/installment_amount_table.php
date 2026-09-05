<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>দৈনিক কিস্তির সংখ্যা তালিকা</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: "SolaimanLipi", "Noto Sans Bengali", sans-serif;
            background: #fff;
            padding: 30px;
        }

        .header-section {
            text-align: center;
            line-height: 1.8;
        }

        .header-section h4 {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .title-box {
            display: inline-block;
            padding: 10px 40px;
            border: 2px solid #6b4f2c;
            border-radius: 12px;
            margin: 20px 0;
            font-size: 24px;
            font-weight: bold;
        }

        .form-box {
            border: 2px solid #000;
            padding: 10px 20px;
            display: inline-block;
            font-size: 24px;
            font-weight: bold;
            position: absolute;
            right: 50px;
            top: 180px;
        }

        table {
            text-align: center;
            vertical-align: middle !important;
            border: 2px solid #000;
        }

        th,
        td {
            border: 1px solid #000 !important;
            font-size: 16px;
            padding: 8px;
        }

        .small-number {
            font-size: 14px;
            font-weight: normal;
        }

        .eye-icon {
            font-size: 24px;
        }

        .total-row td {
            font-weight: bold;
            text-align: center;
        }

        @media(max-width: 768px) {
            .form-box {
                position: static;
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="table1 content-wrapper w-75 container-fluid position-relative p-5">

        <div class="header-section">
            <h4>শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি লিঃ</h4>
            <div>নিবন্ধন নংঃ ১১১(চট্ট), তাং ২৭.০১.২০১৫,</div>
            <div>ঠিকানাঃ ওয়ারলেস বাজার, চাঁদপুর সদর, চাঁদপুর।</div>

            <div class="title-box">
                দৈনিক কিস্তির সংখ্যা তালিকা
            </div>
        </div>



        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr>

                        <th rowspan="2">তারিখ</th>
                        <th rowspan="2">সমিতির নাম</th>
                        <th colspan="4">দিনের বিনিয়োগ সংখ্যা</th>
                        <th rowspan="2">কিস্তির টাকার পরিমাণ</th>
                        <th rowspan="2">বিনিয়োগ অফিসার সংখ্যা</th>
                        <th rowspan="2">ভিউ</th>
                    </tr>
                    <tr>
                        <th>হালনাগাদ সংখ্যা</th>
                        <th>ভিউ</th>
                        <th>খেলাপি ও বকেয়া সংখ্যা</th>
                        <th>ভিউ</th>
                    </tr>
                    <tr>
                        <th class="small-number">1</th>
                        <th class="small-number">2</th>
                        <th class="small-number">3</th>
                        <th class="small-number">4</th>
                        <th class="small-number">5</th>
                        <th class="small-number">6</th>
                        <th class="small-number">7</th>
                        <th class="small-number">8</th>
                        <th class="small-number">9</th>
                    </tr>
                </thead>

                <tbody>
                    <tr style="height: 60px;">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="eye-icon">
                            <i class="fas fa-eye"></i>
                        </td>
                        <td></td>
                        <td class="eye-icon">
                            <i class="fas fa-eye"></i>
                        </td>
                        <td></td>
                        <td></td>
                        <td onclick="toggleEye(this)" class="eye-icon" style="cursor: pointer;">
                            <i id="i" class="fas fa-eye"></i>
                        </td>
                    </tr>

                    <tr style="height: 50px;">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr class="total-row">
                        <td colspan="2">মোট</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    <!-- ----------------------2nd table--------------------------- -->


    <style>
        body {
            font-family: "SolaimanLipi", "Noto Sans Bengali", sans-serif;
            background: white;
            padding: 30px;
        }

        .header {
            text-align: center;
            line-height: 1.8;
        }

        .header h3 {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .title-box {
            display: inline-block;
            margin-top: 20px;
            margin-bottom: 30px;
            padding: 12px 40px;
            border: 2px solid #5a3d1e;
            border-radius: 12px;
            font-size: 28px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border: 2px solid #000;
            text-align: center;
            vertical-align: middle !important;
        }

        th,
        td {
            border: 1px solid #000 !important;
            padding: 8px;
            font-size: 16px;
        }

        .small-num {
            font-size: 14px;
            font-weight: normal;
        }

        .eye {
            font-size: 26px;
        }

        .total-row td {
            font-weight: bold;
        }

        .blank-row {
            height: 50px;
        }

        @media (max-width: 768px) {
            .title-box {
                font-size: 20px;
                padding: 10px 20px;
            }

            th,
            td {
                font-size: 13px;
                padding: 5px;
            }
        }
    </style>



    </head>

    <body>

        <div id="table2" class="table2 container-fluid content-wrapper w-75 ">

            <div class="header">
                <h3>শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি লিঃ</h3>
                <div>নিবন্ধন নম্বরঃ ১১১(চট্ট), তাং ২৭.০১.২০১৫,</div>
                <div>ঠিকানাঃ ওয়ারলেস বাজার, চাঁদপুর সদর, চাঁদপুর।</div>

                <div class="title-box">
                    দৈনিক কিস্তির সংখ্যা তালিকা (একক সমিতি)
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2">নং</th>
                            <th rowspan="2">তারিখ</th>
                            <th colspan="4">দিনের বিনিয়োগ সংখ্যা</th>
                            <th rowspan="2">কিস্তির টাকার পরিমাণ</th>
                            <th rowspan="2">বিনিয়োগ অফিসার সংখ্যা</th>
                            <th rowspan="2">ভিউ</th>
                        </tr>
                        <tr>
                            <th>হালনাগাদ সংখ্যা</th>
                            <th>ভিউ</th>
                            <th>খেলাপি ও বকেয়া সংখ্যা</th>
                            <th>ভিউ</th>
                        </tr>
                        <tr>
                            <th class="small-num">1</th>
                            <th class="small-num">2</th>
                            <th class="small-num">3</th>
                            <th class="small-num">4</th>
                            <th class="small-num">5</th>
                            <th class="small-num">6</th>
                            <th class="small-num">7</th>
                            <th class="small-num">8</th>
                            <th class="small-num">9</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="blank-row">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="eye">👁</td>
                            <td></td>
                            <td class="eye">👁</td>
                            <td></td>
                            <td></td>
                            <td class="eye">👁</td>
                        </tr>

                        <tr class="blank-row">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr class="blank-row">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr class="blank-row">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr class="blank-row">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr class="total-row">
                            <td colspan="2">মোট</td>
                            <td></td>
                            <td>সকল ভিউ 👁</td>
                            <td></td>
                            <td>সকল ভিউ 👁</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>



    </body>

</html>



<script>

    function toggleEye(el) {
        icon = document.getElementById('i')

        show_icon = icon.classList.toggle('fa-eye');
        hide_icon = icon.classList.toggle('fa-eye-slash');

        if (hide_icon) {
            table2 = document.getElementById('table2')
            table2.classList.remove('d-none');
        }
        else if (show_icon) {
            table2 = document.getElementById('table2')
            table2.classList.add('d-none');
        }
    }
   
</script>