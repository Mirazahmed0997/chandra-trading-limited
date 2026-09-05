<style>
    .table-section {
        /* background-image: url('https://static.vecteezy.com/system/resources/previews/026/536/158/non_2x/red-flowing-corner-background-vector.jpg'); */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .table-box {
        background: white;
        padding: 10px;
        border-radius: 6px;
    }

    .header-section {
        background: #3D9970;
        color: white;
    }

    .table th,
    .table td {
        font-size: 12px;
        padding: 4px;

    }

    .table td {
        border: 1px solid black;
    }



    .report-title {
        background: #D6E3BC;
        color: black;
        border-radius: 6px;
    }


    @media print {

        @page {
            size: landscape;
            margin: 0.25in 0.5in 0.25in 0.5in;
        }

        body {
            margin: 0 !important;
            padding: 0 !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        .header-section {
            background: none !important;
            color: black !important;
        }

        #printableArea,
        #printableArea * {
            visibility: visible;
        }



        button,
        .btn {
            display: none !important;
        }

        .print-footer {
            position: fixed;
            bottom: 0;
            right: 0;
            font-size: 11px;
        }

        .pageNumber:after {
            content: counter(page);
        }

        .totalPages:after {
            content: counter(pages);
        }

        .row {
            display: flex !important;
            flex-wrap: nowrap !important;
        }

        .col-md-5 {
            width: 41.666667% !important;
            flex: 0 0 41.666667% !important;
            max-width: 41.666667% !important;
        }

        .col-md-3 {
            width: 25% !important;
            flex: 0 0 25% !important;
            max-width: 25% !important;
        }

        .col-md-4 {
            width: 33.333333% !important;
            flex: 0 0 33.333333% !important;
            max-width: 33.333333% !important;
        }

        .table-box {
            padding: 0 !important;
            margin: 0 !important;
            border-radius: 0 !important;
            box-shadow: none !important;
        }

        .table {
            width: 100% !important;
            border-collapse: collapse !important;
            page-break-inside: avoid !important;
        }


        .table td {
            border: 1px solid #000 !important;
            font-size: 10px !important;
            padding: 2px !important;
            vertical-align: middle !important;
            background-color: #EAF1DD !important;

        }

        .table th {
            background-color: #EAF1DD !important;
            border: 1px solid #000 !important;
        }



        .report-title {
            background: #6c757d !important;
            color: #fff !important;
        }

        .table-success th {
            background: #B6DDE8 !important;
            color: #000 !important;
        }

        tr,
        td,
        th {
            page-break-inside: avoid !important;

        }
    }
</style>


<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">

            <div class="shadow p-4 table-section">

                <div class="header-section text-center p-4 rounded">
                    <h4>শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি লিঃ</h4>
                    <h6>কর্মসংস্থান ও দারিদ্র বিমোচন প্রকল্প</h6>
                    <h6>নিবন্ধন নম্বর: ০১/চাঁদ/১২, তারিখ: ০১.০৭.২০১২, ঠিকানা: চান্দ্রা বাজার, ফরিদগঞ্জ, চাঁদপুর।</h6>
                </div>

                <div class="d-flex justify-content-center mt-3 title-section">
                    <h4 class="fw-bold fs-5 px-4 py-2 report-title shadow-lg">
                        বকেয়া ও খেলাপি তালিকা
                    </h4>
                </div>

                <button onclick="printDiv('printableArea')" class="btn btn-success ">
                    <i class="fas fa-print"></i> Print
                </button>

                <div>
                    <div id="sub-table" class="row justify-content-center sub-table">


                        <!-- --------------------------1st table-------------------- -->
                        <div class="col-md-5">
                            <div class="table-responsive mt-3 table-box">
                                <table class="table table-bordered table-sm text-center align-middle">

                                    <thead class="table-success">

                                        <tr>
                                            <th rowspan="2">ক্র. নং</th>
                                            <th rowspan="2" colspan="3">ধরণ </th>

                                            <th rowspan="2">সংখ্যা</th>

                                            <th colspan="3">মূলধন ও পাওনা</th>
                                        </tr>

                                        <tr>
                                            <th>মূলধন</th>
                                            <th>লাভ</th>
                                            <th>পাওনা</th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                        <tr style="height: 30px;">
                                            <td>১</td>
                                            <td class="text-left" colspan="3">বকেয়া ১ কিস্তি</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr style="height: 30px;">
                                            <td>২</td>
                                            <td class="text-left" colspan="3">বকেয়া ২ কিস্তি</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr style="height: 30px;">
                                            <td>৩</td>
                                            <td class="text-left" colspan="3">বকেয়া ৩ কিস্তি বা তার উর্ধে</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr style="height: 30px;">
                                            <td>৪</td>
                                            <td class="text-left" colspan="3">খেলাপী</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>


                                        <tr style="height: 30px;">
                                            <td></td>
                                            <td class="text-right" colspan="3">মোট(১-৪) =</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        <tr style="height: 30px;">
                                            <td>৫</td>
                                            <td class="text-left" colspan="3">খেলাপী (বিসুবি)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                    </tbody>

                                </table>
                            </div>
                        </div>

                        <!-- --------------------------2nd table-------------------- -->

                        <div class="col-md-3">
                            <div class="table-responsive mt-3 table-box">
                                <table class="table table-bordered table-sm text-center align-middle">
                                    <tbody>

                                        <tr style="height: 30px;">
                                            <td class="text-left" colspan="">মূলধন স্থিতি</td>
                                            <td colspan="2">12334</td>
                                        </tr>
                                        <tr style="height: 30px;">
                                            <td class="text-left" colspan="">খেলাপি হার</td>
                                            <td colspan="2">123123</td>
                                        </tr>
                                        <tr style="height: 30px;">
                                            <td class="text-left" colspan="">বকেয়া হার</td>
                                            <td colspan="2">123123</td>
                                        </tr>
                                        <tr style="height: 30px;">
                                            <td class="text-left" colspan="">খেলাপি ও বকেয়া হার</td>
                                            <td colspan="2">12312312</td>
                                        </tr>

                                    </tbody>

                                </table>
                            </div>
                        </div>

                        <!-- --------------------------3rd table-------------------- -->

                        <div class="col-md-4">
                            <div class="table-responsive mt-3 table-box">
                                <table class="table table-bordered table-sm text-center align-middle">

                                    <thead class="table-success">

                                        <tr>
                                            <th colspan="3">আদায় অগ্রগতি</th>
                                        </tr>

                                        <tr>
                                            <th>ধরণ </th>
                                            <th>সংখ্যা </th>
                                            <th>টাকা</th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                        <tr style="height: 30px;">
                                            <td class="text-left" colspan="">বকেয়া ১ কিস্তি</td>
                                            <td></td>
                                            <td></td>

                                        </tr>


                                        <tr style="height: 30px;">
                                            <td class="text-left" colspan="">বকেয়া ১ কিস্তি</td>
                                            <td></td>
                                            <td></td>

                                        </tr>
                                        <tr style="height: 30px;">
                                            <td class="text-left" colspan="">বকেয়া ১ কিস্তি</td>
                                            <td></td>
                                            <td></td>

                                        </tr>
                                        <tr style="height: 30px;">
                                            <td class="text-left" colspan="">বকেয়া ১ কিস্তি</td>
                                            <td></td>
                                            <td></td>

                                        </tr>


                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>



                    <!-- -----main table=---- -->
                    <div id="printableArea" class="table-responsive mt-3 table-box">
                        <table class="table table-bordered table-sm text-center align-middle">

                            <thead class="table-success">

                                <tr>
                                    <th rowspan="3">ক্র. নং</th>
                                    <th rowspan="3">হিসাব নাম</th>
                                    <th rowspan="3">গ্রহণ তারিখ</th>
                                    <th rowspan="3">গ্রহণ টাকা</th>
                                    <th rowspan="3">মেয়াদ</th>
                                    <th rowspan="3">কিস্তি</th>
                                    <th rowspan="3">বকেয়া সংখ্যা</th>

                                    <th colspan="3">পাওনা</th>

                                    <th rowspan="3">বিলম্ব ফি</th>
                                    <th rowspan="3">মেয়াদ পরবর্তি লাভ</th>
                                    <th rowspan="3">খেলাপি তারিখ</th>
                                    <th rowspan="3">সর্বমোট পাওনা</th>
                                    <th rowspan="3">সদস্য নম্বর</th>
                                    <th rowspan="3">ভর্তির তারিখ</th>
                                    <th rowspan="3">সদস্য জমা স্থিতি</th>
                                    <th rowspan="3">লেনদেন হয়নি (মাস)</th>

                                    <th colspan="3">সম্পৃক্ত কর্মকর্তা</th>


                                    <th rowspan="3">সদস্য খতিয়ান</th>
                                    <th rowspan="3"> যোগাযোগ</th>
                                </tr>

                                <tr>
                                    <th rowspan="2">মূলধন</th>
                                    <th rowspan="2">লাভ</th>
                                    <th rowspan="2">মোট</th>


                                </tr>

                                <tr>
                                    <th rowspan="2">অনুমোদন </th>
                                    <th rowspan="2">পরিদর্শন</th>
                                    <th rowspan="2">সুপারিশ</th>
                                </tr>


                            </thead>

                            <tbody>

                                <tr style="height: 30px;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
                                <tr style="height: 30px;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
                                <tr style="height: 30px;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
                                <tr style="height: 30px;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
                                <tr style="height: 30px;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
                                <tr style="height: 30px;">
                                    <td colspan="4">মোট =</td>

                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
                            </tbody>


                        </table>

                    </div>

                </div>





                <script type="text/javascript">
                    function printDiv(divName) {
                        var printContents = document.getElementById(divName).innerHTML;
                        var originalContents = document.body.innerHTML;

                        var subtables = document.getElementById('sub-table').innerHTML;

                        var printWindow = window.open('', '', 'height=1600,width=1600');

                        var printPreviewContainer = document.createElement('div');
                        printPreviewContainer.style.position = 'absolute';
                        printPreviewContainer.style.left = '-9999px';
                        printPreviewContainer.style.visibility = 'hidden';
                        document.body.appendChild(printPreviewContainer);

                        var printPreviewStyles = `
      <style>

      

        .serial-row td {
            font-size: 6px !important;
            padding: 1px !important;
            background-color: #B6DDE8;
            
    }

    #dataTable,
    #dataTable th,
    #dataTable td {
        color: #000000 !important;
        border: 1px solid #000000 !important;
    }

    #dataTable th {
        background-color: #B6DDE8;
    }

    #dataTable {
        table-layout: fixed;
        width: 100%;
    }

    #dataTable td {
        background-color: #EAF1DD; 
        
    }
    

    .table-name {
        background-color: #D6E3BC !important;
        border-radius: 10px;
    }



    
    
</style>
    `;
                        printPreviewContainer.innerHTML = printPreviewStyles;

                        var printPreviewTable = document.createElement('table');
                        printPreviewTable.innerHTML = printContents;
                        printPreviewContainer.appendChild(printPreviewTable);

                        var rows = Array.from(printPreviewTable.querySelectorAll('tbody tr'));
                        var headerHTMLString = printPreviewTable.querySelector('thead').innerHTML;

                        function measureRowHeights(rows) {
                            return rows.map(row => {
                                var tempTable = document.createElement('table');
                                var tempBody = document.createElement('tbody');
                                var tempRow = document.createElement('tr');
                                tempRow.innerHTML = row.innerHTML;
                                tempBody.appendChild(tempRow);
                                tempTable.appendChild(tempBody);
                                printPreviewContainer.appendChild(tempTable);
                                var height = tempRow.getBoundingClientRect().height;
                                printPreviewContainer.removeChild(tempTable);
                                return height;
                            });
                        }
                        var rowHeights = measureRowHeights(rows);

                        var currentRow = 0;
                        var totalPages = 0;
                        var isFirstPage = true;

                        var pageHeight = 1104;
                        var headerHeight = 350;
                        var footerHeight = 80;
                        var availableHeightWithoutHeader = pageHeight - footerHeight;
                        var availableHeightWithHeader = availableHeightWithoutHeader - headerHeight;

                        var rowsPerPage = [];
                        var pageContentHeight;

                        var now = new Date();
                        var year = now.getFullYear();
                        var month = now.toLocaleString('default', { month: 'long' });
                        var day = String(now.getDate()).padStart(2, '0');
                        var hours = String(now.getHours()).padStart(2, '0');
                        var minutes = String(now.getMinutes()).padStart(2, '0');
                        var seconds = String(now.getSeconds()).padStart(2, '0');

                        var currentDateTimeString = year + ' - ' + month + ' - ' + day + ' ' + hours + ':' + minutes + ':' + seconds;

                        // Calculate number of rows per page
                        while (currentRow < rows.length) {
                            pageContentHeight = isFirstPage ? availableHeightWithHeader : availableHeightWithoutHeader;
                            var pageRows = 0;

                            while (currentRow < rows.length && rowHeights[currentRow] <= pageContentHeight) {
                                pageContentHeight -= rowHeights[currentRow];
                                pageRows++;
                                currentRow++;
                            }

                            if (pageRows === 0 && currentRow < rows.length) {
                                pageRows = 1;
                                currentRow++;
                            }

                            rowsPerPage.push(pageRows);
                            totalPages++;
                            isFirstPage = false;
                        }

                        var headerHtml = `
        <div class="print-header">

        <div>
            <p style="text-align:right;">
            <span style=" border: 2px solid #000; padding: 6px 15px; font-weight: bold;  font-size: 16px; color: #000;">কোড নং -৩৮</span>
            </p>
        </div>
            
            <div style=" padding: 10px; border-radius: 4px; text-align: center;">
                <h2 style="margin: 5px 0; font-size: 20px;">শিক্ষিত বেকার সঞ্চয় ও ঋণদান সমবায় সমিতি লি.</h2>
                <h4 style="margin: 5px 0; font-size: 15px;">কর্মসংস্থান ও দারিদ্র্য বিমোচন প্রকল্প</h4>
                <h6 style="margin: 5px 0; font-size: 12px;">নিবন্ধন নম্বর: ০১/চাঁদ/১২, তারিখ: ০১.০৭.২০১২, ঠিকানা: চান্দ্রা বাজার, ফরিদগঞ্জ, চাঁদপুর।</h6>
            </div>

                
            <div style="margin: 5px 0; text-align: center;">
                <span style="background-color: #D6E3BC !important; border: 2px solid #000; padding: 6px 15px; font-weight: bold; border-radius: 10px; font-size: 16px; color: #000;">
                    বকেয়া ও খেলাপি তালিকা
                </span>
            </div>

            
            
            <div style="display: flex; justify-content:space-between">
                <div style="font-size: 11px;"><strong>মাসের নাম : ${month} - ${year} </strong></div>
            </div>

    `;


                        var signatureHtml = `
        <div class="print-signature-section">
            <div class="sig-col"><span>সম্পাদক /ব্যবস্থাপক</span></div>
            <div class="sig-col"><span>প্রতিবেদন প্রস্তুতকারী <br> পরিদর্শনকারীর নাম ও স্বাক্ষর</span></div>
            <div class="sig-col"><span>ক্যাশিয়ার</span></div>
        </div>
    `;

                        printWindow.document.open();
                        printWindow.document.write(`
        <html>
        <head>
            <title>Print</title>
            <link rel="stylesheet" type="text/css" href="http://localhost/sbcl_online/assets/backend/dist/css/adminlte.min.css">
            <style>
                @media print {
                    @page {
                        size: landscape;
                        margin: 0.25in 0.5in 0.25in 0.5in;
                    }


                    body {
                        font-family: Arial, sans-serif;
                        margin: 0;
                        padding: 0 !important;				
                    }
                
                    .page-break {
                        page-break-after: always;
                        clear: both;
                        display: flex;
                        flex-direction: column;
                        min-height: 95vh; 
                    }	
                    .table-wrapper {
                        flex-grow: 1; 
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-top: 10px;
                    }
                    th, td {
                        border: 1px solid black !important;
                        padding: 2px !important;
                        text-align: center !important;
                    }
                    .view{
                        display:none;
                        }
                    th {
                        font-size: 9px;
                        background-color: #B6DDE8 !important;
                        -webkit-print-color-adjust: exact;
                        print-color-adjust: exact;
                    }
                    tbody td {
                        font-size: 12px;
                        background-color: #EAF1DD !important;
                        -webkit-print-color-adjust: exact;
                        print-color-adjust: exact;
                        max-width: 60px !important;
                        overflow: hidden !important;
                        text-overflow: ellipsis !important;
                        white-space: nowrap !important;
                        cursor: pointer !important;
                    }
                    .serial-row td {
                        background-color: #B6DDE8 !important;
                        font-size: 6px !important;
                        font-weight: bold;
                        padding: 1px !important;
                        text-align: center !important;
                    }
                    
                    .print-signature-section {
                        display: flex;
                        justify-content: space-between;
                        margin-top: 20px; 
                        padding-top: 5px;
                    }
                    .sig-col {
                        width: 20%;
                        text-align: center;
                        font-size: 11px;
                        font-weight: bold;
                        border-top: 1px dashed #000; 
                        padding-top: 4px;
                        color: #000;
                    }
                    
                    .print-footer {
                        font-size: 9px;
                        text-align: right;
                        margin-top: 10px;
                        color: #000;
                    }
                    abbr[title] {
                        text-decoration: unset;
                    }
                }


                    
            </style>
        </head>
        <body>
    `);

                        currentRow = 0;
                        for (var p = 0; p < totalPages; p++) {
                            printWindow.document.write('<div class="page-break">');

                            if (p === 0) {

                                printWindow.document.write(headerHtml);
                                printWindow.document.write(subtables);
                            }


                            printWindow.document.write('<div class="table-wrapper">');
                            printWindow.document.write('<table>');
                            printWindow.document.write('<thead>' + headerHTMLString + '</thead>');
                            printWindow.document.write('<tbody>');

                            var limit = currentRow + rowsPerPage[p];
                            for (var r = currentRow; r < limit; r++) {
                                if (rows[r]) {
                                    printWindow.document.write(rows[r].outerHTML);
                                }
                            }
                            currentRow = limit;

                            printWindow.document.write('</tbody>');
                            printWindow.document.write('</table>');
                            printWindow.document.write('</div>');

                            if (p === totalPages - 1) {
                                printWindow.document.write(signatureHtml);
                            }

                            printWindow.document.write('<div class="print-footer">পাতা ' + (p + 1) + ' / ' + totalPages + '</div>');
                            printWindow.document.write('</div>');
                        }

                        printWindow.document.write(`
        </body>
        </html>
    `);
                        printWindow.document.close();

                        document.body.removeChild(printPreviewContainer);

                        printWindow.setTimeout(function () {
                            printWindow.focus();
                            printWindow.print();
                            printWindow.close();
                        }, 500);
                    }
                </script>




