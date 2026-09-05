<div id="printableArea">
    <style>
        .truncated {
            /* display: inline-block; */
            max-width: 80px;
            /* Adjust as needed */
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            cursor: pointer;
            /* Indicate that text can be interacted with */
        }

        .full-text {
            display: none;
        }

        .truncated:hover .full-text,
        .truncated.clicked .full-text {
            display: inline;
        }

        abbr[title] {
            text-decoration: unset;
        }
    </style>
    <link rel="stylesheet" href="http://localhost/sbcl_online/assets/backend/css/page_print.css">
    <div class="content-wrapper" style="min-height: 321.4px;">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card" style="background: #001f3f">
                            <div class="card-header">
                                <center>
                                    <h3 class="text-center text-white">
                                        শিক্ষিত বেকার সঞ্চয় ও ঋণদান সমবায় সমিতি লি. </h3>
                                </center>


                                <center>
                                    <h4 class="text-center text-white">কর্মসংস্থান ও দারিদ্র্য বিমোচন প্রকল্প</h4>
                                </center>


                                <center>
                                    <h6 class="text-center text-white">
                                        নিবন্ধন নম্বর: ০১/চাঁদ/১২, তারিখ: ০১.০৭.২০১২, ঠিকানা: চান্দ্রা বাজার, ফরিদগঞ্জ,
                                        চাঁদপুর।</h6>
                                </center>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="title-section d-flex justify-content-center my-3">

                                <div class="headline border border-dark p-2 text-center w-auto table-name "
                                    style="border-width: 2px !important;">
                                    <h3 class=" m-0 text-dark font-weight-bold" style="font-size: 16px;">
                                        বিনিয়োগ প্রতিবেদন
                                    </h3>
                                </div>

                            </div>



                            <div class="card-body">
                                <div class="row" id="card_title_hide" style="display: none;">
                                </div>
                                <div class="row">
                                    <div class="col-sm-10">

                                    </div>
                                    <div class="col-sm-2 text-right">
                                        <button id="print_button" class="btn btn-primary"
                                            onclick="printDiv('printableArea')"><i class="fas fa-print">
                                                Print</i></button>

                                    </div>
                                </div>
                               
                                <form action="http://localhost/sbcl_online/project/invest/Invest/c_38" method="post"
                                    class="has-validation-callback">
                                    <div class="row" id="submit_button">
                                        <div class="col-sm-3">
                                            <strong>Start Date</strong>
                                            <input type="datetime-local" name="date_1" class="form-control">
                                        </div>
                                        <div class="col-sm-3">
                                            <strong>End Date</strong>
                                            <input type="datetime-local" name="date_2" class="form-control">
                                        </div>
                                        <div class="col-sm-3">
                                            <strong>বিনিয়োগের ধরণ</strong>
                                            <select name="la_type" class="form-control">
                                                <option value="">--- Select ---</option>
                                                <option value="1">কিস্তিতে</option>
                                                <option value="2">বিসুবি</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <strong>--- Select ---</strong>
                                            <select name="la_type" class="form-control">
                                                <option value="">All- default</option>
                                                <option value="1">GM</option>
                                                <option value="2">PM</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <br>
                                            <button type="submit" class="btn bg-info">Search</button>
                                        </div>

                                    </div>

                            </div>
                            </form>
                            <br>
                            <div class="row justify-content-center font_size_11">
                                <div class="col-sm-6">
                                    মাসের নাম:
                                    2026-05-01 00:00:00 To
                                    2026-05-18 16:46:29
                                </div>
                                <div class="col-sm-6 text-right">
                                    প্রিন্ট এর তারিখ: 2026-05-18 16:46:31 </div>
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover mt-2 table-striped print-table"
                                            id="dataTable">
                                            <thead class="table-head">
                                                <tr>

                                                    <th class="text-center text-bold align-center" rowspan="2">সমিতির
                                                        নাম</th>
                                                    <th class="text-center text-bold align-center" rowspan="2">ধরণ
                                                    </th>
                                                    <th class="text-center text-bold align-center" colspan="4">বিনিয়োগ
                                                        সংখ্যা স্থিতি
                                                    </th>
                                                    <th class="text-center text-bold align-center" colspan="9"
                                                        style="white-space: nowrap;">বিনিয়োগ ধরণ সংখ্যা<br> সংখ্যা</th>


                                                    <th class="text-center text-bold align-center" rowspan="2"
                                                        style="white-space: nowrap;">কর্ম সংস্থান <br> সংখ্যা</th>


                                                    <th class="text-center text-bold align-center" colspan="4"
                                                        style="white-space: nowrap;">মূলধন পাওনা</th>
                                                    <th class="text-center text-bold align-center" colspan="4"
                                                        style="white-space: nowrap;">লাভ পাওনা</th>


                                                    <th class="text-center text-bold align-center " rowspan="2"
                                                        style="width: 200px !important;">মূলধন ও লাভ পাওনা</th>
                                                    <th class="text-center text-bold align-center " rowspan="2"
                                                        style="width: 150px !important;">সর্বশেষ নম্বর</th>
                                                    <th class="text-center text-bold align-center view" rowspan="2"
                                                        style="width: 150px !important;">ভিউ</th>




                                                </tr>
                                                <tr>
                                                    <th class="text-center text-bold align-top"
                                                        style="white-space: nowrap;">বিগত স্থিতি</th>
                                                    <th class="text-center text-bold align-top"
                                                        style="white-space: nowrap;">বিতরণ</th>
                                                    <th class="text-center text-bold align-top"
                                                        style="white-space: nowrap;">পরিশোধ</th>
                                                    <th class="text-center text-bold align-top"
                                                        style="white-space: nowrap;">স্থিতি</th>

                                                    <th class="text-center text-bold align-top"
                                                        style="white-space: nowrap;">উদ্দোগতা</th>
                                                    <th class="text-center text-bold align-top"
                                                        style="white-space: nowrap;">উৎপাদন </th>
                                                    <th class="text-center text-bold align-top"
                                                        style="white-space: nowrap;">আবাসন</th>
                                                    <th class="text-center text-bold align-top"
                                                        style="white-space: nowrap;">হোম ফার্নিচার</th>
                                                    <th class="text-center text-bold align-top"
                                                        style="white-space: nowrap;">পরিবহন</th>
                                                    <th class="text-center text-bold align-top"
                                                        style="white-space: nowrap;">ব্যবসা</th>
                                                    <th class="text-center text-bold align-top"
                                                        style="white-space: nowrap;">প্রবাসী</th>
                                                    <th class="text-center text-bold align-top"
                                                        style="white-space: nowrap;">কৃষি</th>
                                                    <th class="text-center text-bold align-top"
                                                        style="white-space: nowrap;">মোট</th>


                                                    <th class="text-center text-bold align-top"
                                                        style="white-space: nowrap;">বিগত স্থিতি</th>
                                                    <th class="text-center text-bold align-top"
                                                        style="white-space: nowrap;">বিতরণ</th>
                                                    <th class="text-center text-bold align-top"
                                                        style="white-space: nowrap;">পাওনা স্থিতি</th>
                                                    <th class="text-center text-bold align-top"
                                                        style="white-space: nowrap;">আদায়</th>


                                                    <th class="text-center text-bold align-top"
                                                        style="white-space: nowrap;">বিগত স্থিতি</th>
                                                    <th class="text-center text-bold align-top"
                                                        style="white-space: nowrap;">বিতরণ লাভ</th>
                                                    <th class="text-center text-bold align-top"
                                                        style="white-space: nowrap;">আদায়</th>
                                                    <th class="text-center text-bold align-top"
                                                        style="white-space: nowrap;">পাওনা লাভ</th>





                                                </tr>

                                                <tr class="serial-row">
                                                    <td class="text-center text-bold">1</td>
                                                    <td class="text-center text-bold">2</td>
                                                    <td class="text-center text-bold">3</td>
                                                    <td class="text-center text-bold">4</td>
                                                    <td class="text-center text-bold">5</td>
                                                    <td class="text-center text-bold">6</td>
                                                    <td class="text-center text-bold">7</td>
                                                    <td class="text-center text-bold">8</td>
                                                    <td class="text-center text-bold">9</td>
                                                    <td class="text-center text-bold">10</td>
                                                    <td class="text-center text-bold">11</td>
                                                    <td class="text-center text-bold">12</td>
                                                    <td class="text-center text-bold">13</td>
                                                    <td class="text-center text-bold">14</td>
                                                    <td class="text-center text-bold">15</td>
                                                    <td class="text-center text-bold">16</td>
                                                    <td class="text-center text-bold">17</td>
                                                    <td class="text-center text-bold">18</td>
                                                    <td class="text-center text-bold">19</td>
                                                    <td class="text-center text-bold">20</td>
                                                    <td class="text-center text-bold">21</td>
                                                    <td class="text-center text-bold">22</td>
                                                    <td class="text-center text-bold">23</td>
                                                    <td class="text-center text-bold">24</td>
                                                    <td class="text-center text-bold">25</td>
                                                    <td class="text-center text-bold">26</td>
                                                    <td class="text-center text-bold view">27</td>
                                                </tr>
                                            </thead>

                                            <tbody>

                                               
                                               
                                                <tr>
                                                    <td class="text-right text-bold align-middle" rowspan="3">শিক্ষিত বেকার 
                                                    </td>
                                                    <td>কিস্তিতে</td>
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
                                                    <td></td>
                                                    <td rowspan="3" class="align-middle view"><i class="fas fa-eye"></i></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>এককালীন</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>মোট =</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right text-bold align-middle" rowspan="3">ওয়্যারলেছ বাজার
                                                    </td>
                                                    <td>কিস্তিতে</td>
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
                                                    <td></td>
                                                    <td rowspan="3" class="align-middle view"><i class="fas fa-eye"></i></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>এককালীন</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>মোট =</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right text-bold align-middle" rowspan="3">চাঁদপুর শিক্ষিত বেকার 
                                                    </td>
                                                    <td>কিস্তিতে</td>
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
                                                    <td></td>
                                                    <td rowspan="3" class="align-middle view"><i class="fas fa-eye"></i></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>এককালীন</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>মোট =</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right text-bold align-middle" rowspan="3">শিক্ষিত বেকার সঞ্চয়
                                                    </td>
                                                    <td>কিস্তিতে</td>
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
                                                    <td></td>
                                                    <td rowspan="3" class="align-middle view"><i class="fas fa-eye"></i></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>এককালীন</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>মোট =</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right text-bold align-middle" rowspan="3">মহামায়া শিক্ষিত বেকার
                                                    </td>
                                                    <td>কিস্তিতে</td>
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
                                                    <td></td>
                                                    <td rowspan="3" class="align-middle view"><i class="fas fa-eye"></i></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>এককালীন</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>মোট =</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right text-bold align-middle" rowspan="3">মহামায়া শিক্ষিত বেকার
                                                    </td>
                                                    <td>কিস্তিতে</td>
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
                                                    <td></td>
                                                    <td rowspan="3" class="align-middle view"><i class="fas fa-eye"></i></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>এককালীন</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>মোট =</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right text-bold align-middle" rowspan="3">হাজীগঞ্জ শিক্ষিত বেকার
                                                    </td>
                                                    <td>কিস্তিতে</td>
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
                                                    <td></td>
                                                    <td rowspan="3" class="align-middle view"><i class="fas fa-eye"></i></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>এককালীন</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>মোট =</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right text-bold align-middle" rowspan="3">পাটওয়ারী বাজার
                                                    </td>
                                                    <td>কিস্তিতে</td>
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
                                                    <td></td>
                                                    <td rowspan="3" class="align-middle view"><i class="fas fa-eye"></i></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>এককালীন</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>মোট =</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right text-bold align-middle" rowspan="3">বাঘড়া শিক্ষিত বেকার
                                                    </td>
                                                    <td>কিস্তিতে</td>
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
                                                    <td></td>
                                                    <td rowspan="3" class="align-middle view"><i class="fas fa-eye"></i></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>এককালীন</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>মোট =</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right text-bold align-middle" rowspan="3">টোরা মুন্সির হাট 
                                                    </td>
                                                    <td>কিস্তিতে</td>
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
                                                    <td></td>
                                                    <td rowspan="3" class="align-middle view"><i class="fas fa-eye"></i></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>এককালীন</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>মোট =</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right text-bold align-middle" rowspan="3">রূপসা শিক্ষিত বেকার
                                                    </td>
                                                    <td>কিস্তিতে</td>
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
                                                    <td></td>
                                                    <td rowspan="3" class="align-middle view"><i class="fas fa-eye"></i></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>এককালীন</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>মোট =</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right text-bold align-middle" rowspan="3">ফরিদগঞ্জ শিক্ষিত বেকার 
                                                    </td>
                                                    <td>কিস্তিতে</td>
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
                                                    <td></td>
                                                    <td rowspan="3" class="align-middle view"><i class="fas fa-eye"></i></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>এককালীন</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>মোট =</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right text-bold align-middle" rowspan="3">নয়া হাট শিক্ষিত বেকার 
                                                    </td>
                                                    <td>কিস্তিতে</td>
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
                                                    <td></td>
                                                    <td rowspan="3" class="align-middle view"><i class="fas fa-eye"></i></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>এককালীন</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>মোট =</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right text-bold align-middle" rowspan="3">কচুয়া শিক্ষিত বেকার
                                                    </td>
                                                    <td>কিস্তিতে</td>
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
                                                    <td></td>
                                                    <td rowspan="3" class="align-middle view"><i class="fas fa-eye"></i></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>এককালীন</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>মোট =</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right text-bold align-middle" rowspan="3">মতলব শিক্ষিত বেকার
                                                    </td>
                                                    <td>কিস্তিতে</td>
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
                                                    <td></td>
                                                    <td rowspan="3" class="align-middle view"><i class="fas fa-eye"></i></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>এককালীন</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>মোট =</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right text-bold align-middle" rowspan="3">শাহরাস্তি শিক্ষিত বেকার
                                                    </td>
                                                    <td>কিস্তিতে</td>
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
                                                    <td></td>
                                                    <td rowspan="3" class="align-middle view"><i class="fas fa-eye"></i></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>এককালীন</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>মোট =</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right text-bold align-middle" rowspan="3">গৃদকালিন্দিয়া শিক্ষিত বেকার
                                                    </td>
                                                    <td>কিস্তিতে</td>
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
                                                    <td></td>
                                                    <td rowspan="3" class="align-middle view"><i class="fas fa-eye"></i></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>এককালীন</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>মোট =</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right text-bold align-middle" rowspan="3">চান্দ্রা শিক্ষিত বেকার
                                                    </td>
                                                    <td>কিস্তিতে</td>
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
                                                    <td></td>
                                                    <td rowspan="3" class="align-middle view"><i class="fas fa-eye"></i></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>এককালীন</td>
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
                                                    <td class=""></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>মোট =</td>
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
                                                    <td class=""></td>
                                                </tr> 
                                                 <tr>
                                                    <td class="text-right text-bold align-middle" style="font-size:10px;" colspan="2">কিস্তিতে মোট =
                                                    </td>
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
                                                    <td></td>
                                                    <td class="view"></td>
                                                </tr>
                                                 <tr>
                                                    <td class="text-right text-bold align-middle" style="font-size:10px;" colspan="2">বিসুবি মোট
                                                    </td>
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
                                                    <td></td>
                                                    <td class="view"></td>
                                                </tr>
                                                 <tr>
                                                    <td class="text-right text-bold align-middle" style="font-size:10px;" colspan="2">সর্বমোট =
                                                    </td>
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
                                                    <td></td>
                                                    <td class="view"></td>
                                                </tr>
                                                 <tr>
                                                    <td class="text-right text-bold align-middle" style="font-size:10px;" colspan="2">বিগত বছর স্থিতি 
                                                    </td>
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
                                                    <td></td>
                                                    <td class="view"></td>
                                                </tr>
                                                 <tr>
                                                    <td class="text-right text-bold align-middle" style="font-size:10px;" colspan="2">বৃদ্ধি
                                                    </td>
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
                                                    <td></td>
                                                    <td class="view"></td>
                                                </tr>
                                               

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <center>
                                    </center><br>
                                    <hr>
                                    <p class="text-bold text-center align-middle">
                                        প্রকল্প পরিচালক
                                    </p>
                                </div>
                                <div class="col-sm-4">
                                    <center>
                                    </center><br>
                                    <hr>
                                    <p class="text-bold text-center align-middle">
                                        পরিচালক (অর্থবিভাগ)
                                    </p>
                                </div>
                                <div class="col-sm-4">
                                    <center>
                                    </center><br>
                                    <hr>
                                    <p class="text-bold text-center align-middle">
                                        প্রতিবেদন যাচাইকারী
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
</div>

</div>


<style>
    .serial-row td {

        font-size: 8px !important;
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

    #dataTable td {
        background-color: #EAF1DD
    }

    .table-name {
        background-color: #D6E3BC !important;
        border-radius: 10px;
    }
</style>


<script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

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

        var pageHeight = 1080;
        var headerHeight = 500;
        var footerHeight = 10;
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
            <span style=" border: 2px solid #000; padding: 6px 15px; font-weight: bold;  font-size: 16px; color: #000;">কোড নং -৩৯</span>
            </p>
        </div>
            
            <div style=" padding: 10px; border-radius: 4px; text-align: center;">
                <h2 style="margin: 5px 0; font-size: 20px;">শিক্ষিত বেকার সঞ্চয় ও ঋণদান সমবায় সমিতি লি.</h2>
                <h4 style="margin: 5px 0; font-size: 15px;">কর্মসংস্থান ও দারিদ্র্য বিমোচন প্রকল্প</h4>
                <h6 style="margin: 5px 0; font-size: 12px;">নিবন্ধন নম্বর: ০১/চাঁদ/১২, তারিখ: ০১.০৭.২০১২, ঠিকানা: চান্দ্রা বাজার, ফরিদগঞ্জ, চাঁদপুর।</h6>
            </div>

                
            <div style="margin: 5px 0; text-align: center;">
                <span style="background-color: #D6E3BC !important; border: 2px solid #000; padding: 6px 15px; font-weight: bold; border-radius: 10px; font-size: 16px; color: #000;">
                    বিনিয়োগ প্রতিবেদন
                </span>
            </div>
            <div style="display: flex; justify-content:space-between">
                <div style="font-size: 11px;"><strong>মাসের নাম : ${month} - ${year} </strong></div>
            </div>
    `;

        var signatureHtml = `
        <div class="print-signature-section">
            <div class="sig-col"><span>প্রকল্প পরিচালক</span></div>
            <div class="sig-col"><span>পরিচালক (অর্থবিভাগ)</span></div>
            <div class="sig-col"><span>প্রতিবেদন যাচাইকারী</span></div>
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
                        margin-top: 40px; 
                        padding-top: 20px;
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