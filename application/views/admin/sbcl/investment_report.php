<section id="main-content">
			<section class="wrapper">
				<div id="printableArea">
    <style>
		.table {
			background: lightblue;
		}
        .truncated {
            /* display: inline-block; */
            max-width: 100px; /* Adjust as needed */ 
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            cursor: pointer; /* Indicate that text can be interacted with */
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
        .truncated-text-hide {
            display: none;
        }
    </style>
	<div class="content-wrapper" style="min-height: 624.4px;">
		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
                <div id="banner_hide">
                                
	<div class="row">
		<div class="col-sm-12">
			<div class="card" style="background:linear-gradient(135deg, #0b3d5c, #145374); color: #fff;">
				<div class="card-header">
					<div class="text-center font_size_16">
						শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি লি.					</div>
					<center><div class="text-center font_size_14 ">কর্মসংস্থান ও দারিদ্র্য বিমোচন প্রকল্প</div></center>
					<div class="text-center font_size_12">
						নিবন্ধন নম্বর: ১১২(চট্র), তাং ২৭.০১.২০১৫,  ঠিকানা: ওয়্যারলেছ বাজার, চাঁদপুর সদর, চাঁদপুর।					</div>
				</div>
			</div>
		</div>
	</div>                                </div>

				<div class="row">
					<div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header" id="card_title_show">
                                <div class="row">
                                    <div class="col-sm-12">
																				<h4 class="card-title">সম্মিলিত বিনিয়োগের মাসিক প্রতিবেদন</h4>
										                                    </div>
                                </div>
                            </div>
							<div class="card-body print_body">
								<div id="banner_show" style="display: none;">
																
<link rel="stylesheet" type="text/css" href="http://192.168.0.121/sbcl_cca/assets/backend/css/page_print.css">
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
		    <div class="text-center font_size_16">
                শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি লি.            </div>
        </div>
		<div class="col-sm-2 text-right">
		    <div class="text-right font_size_14">
                কোড নং -৩৯            </div>
        </div>
		<div class="col-sm-12 font_size_14">
            <!-- <center><div class="text-center font_size_14 "></?php echo 'প্রকল্প পরিচালকের কার্যালয়'; ?></div></center> -->
            <center><div class="text-center font_size_14 ">কর্মসংস্থান ও দারিদ্র্য বিমোচন প্রকল্প</div></center>
		</div>
		<div class="col-sm-12">


			<center><div class="text-center font_size_12">
				নিবন্ধন নম্বর: ১১২(চট্র), তাং ২৭.০১.২০১৫,  ঠিকানা: ওয়্যারলেছ বাজার, চাঁদপুর সদর, চাঁদপুর।</div></center>


		</div>
	</div>																</div>
																<form action="http://192.168.0.121/sbcl_cca/cca/project/Project_accounts/c_39" method="post" class="has-validation-callback">

																			<div class="row" id="submit_button">
											<div class="col-sm-4">
												<strong>Start Date</strong>

												<input type="datetime-local" name="date_1" class="form-control">


											</div>
											<div class="col-sm-4">
												<strong>End Date</strong>

												<input type="datetime-local" name="date_2" class="form-control">
											</div>
											<div class="col-sm-2">
												<br>
												<button type="submit" class="btn bg-info">Search</button>
											</div>
											<div class="col-sm-2 text-right">
											<br>
												<button id="print_button" class="btn btn-primary" onclick="printDiv('printableArea')"><i class="fas fa-print">
														Print</i></button>
											</div>
										</div>


									</form>
									<div class="row" id="card_title_hide" style="display: none;">
										<div class="col-sm-12">
																					<center><div class="font_size_14 text-bold" style="margin-top: 10px;">সম্মিলিত বিনিয়োগের মাসিক প্রতিবেদন</div></center>
																				</div>

									</div>
									<div class="col-sm-12">
										<label>সময়কাল:</label>
										 To
										
									</div>
									<div class="row justify-content-center">
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

									<div class="card-body">
										<div class="row">
											<div class="col-sm-4">
												<center style="color: white">

												</center>
												<hr>
												<p class=" text-center align-middle">
													প্রকল্প পরিচালক
												</p>
											</div>
											<div class="col-sm-4">
												<center style="color: white">

												</center>
												<hr>
												<p class=" text-center align-middle">
													পরিচালক (অর্থ বিভাগ)
												</p>
											</div>
											<div class="col-sm-4">
												<center style="color: white">

												</center>
												<hr>
												<p class=" text-center align-middle">
													প্রতিবেদন যাচাইকারী
												</p>
											</div>

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
<script src="http://192.168.0.121/sbcl_cca/assets/backend/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    // document.getElementById('month_num').value = '</?= $month_num ?>';
    // document.getElementById('year').value = '</?= $year ?>';

    $("#banner_show").hide();
    $("#card_title_hide").hide();
});

function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    // Create a new window for printing
    var printWindow = window.open('', '', 'height=1600,width=1600');

    // Create a hidden print-preview container to apply media print styles
    var printPreviewContainer = document.createElement('div');
    printPreviewContainer.style.position = 'absolute';
    printPreviewContainer.style.left = '-9999px'; // Hide it off-screen
    printPreviewContainer.style.visibility = 'hidden'; // Make it invisible
    document.body.appendChild(printPreviewContainer);

    // Add styles to the print-preview container
    var printPreviewstyles = `
        <style>
			table {
				width: 100%;
				border-collapse: collapse;
			}
			th, td {
				border: 1px solid black !important;
				padding: 4px 0 !important;
			}
			th {
                font-size: 9px !important;
			}
			td {
                font-size: 9px !important;
			}
            .truncated {
                /* display: inline-block; */
                max-width: 50px; /* Adjust as needed */
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                cursor: pointer; /* Indicate that text can be interacted with */
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
            .truncated-text-hide {
                display: none;
            }
        </style>
    `;
    printPreviewContainer.innerHTML = printPreviewstyles;

    // Create a print-preview table
    var printPreviewTable = document.createElement('table');
    printPreviewTable.innerHTML = printContents;
    printPreviewContainer.appendChild(printPreviewTable);

    // Measure the heights of the rows from the print-preview table
    var rows = Array.from(printPreviewTable.querySelectorAll('tr'));
    function measureRowHeights(rows) {
        return rows.map(row => {
            var height = 72;
            return height;
        });
    }
    var rowHeights = measureRowHeights(rows);

    var currentRow = 0;
    var totalPages = 0;
    var isFirstPage = true;

    // Calculate page dimensions
    var pageHeight = 2080; // A4 height in pixels (landscape)
    var headerHeight = 100; // Approximate height of the header in pixels
    var availableHeightWithoutHeader = pageHeight;
    var availableHeightWithHeader = availableHeightWithoutHeader - headerHeight;

    // Store the number of rows for each page
    var rowsPerPage = [];
    var pageContentHeight;

    // Calculate number of rows per page
    while (currentRow < rows.length) {
        pageContentHeight = isFirstPage ? availableHeightWithHeader : availableHeightWithoutHeader;
		
        var pageRows = 0;

        while (currentRow < rows.length && rowHeights[currentRow] <= pageContentHeight) {
			
            pageContentHeight -= rowHeights[currentRow];
            pageRows++;
            currentRow++;
        }
        rowsPerPage.push(pageRows);
        totalPages++;
        isFirstPage = false;
    }

    // Generate each page content
    currentRow = 0;
    isFirstPage = true;

    // Write HTML to the new window
    printWindow.document.open();
    printWindow.document.write(`
        <html>
        <head>
            <title>Print</title>
            <link rel="stylesheet" type="text/css" href="http://192.168.0.121/sbcl_cca/assets/backend/dist/css/adminlte.min.css">
            <link rel="stylesheet" type="text/css" href="http://192.168.0.121/sbcl_cca/assets/backend/css/page_print.css">
            <style>
                @media print {
                    @page {
                        size: landscape;
                    }

                    .page-break {
                        page-break-after: always;
                        margin: 0.5in;
                        padding: 0;
                    }

                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }

                    th, td {
                        border: 1px solid black;
						padding: 4px 0 !important;
                    }
                    th {
                        font-size: 9px !important;
                    }
                    td {
                        font-size: 9px !important;
                    }
                    .font_size_5 {
                        font-size: 5px !important;
                    }

                    .print-footer {
                        font-size: 6px;
                        margin-top: 10px;
                    }

                    .print-header {
                        font-size: 12px;
                        text-align: center;
                        margin-bottom: 10px;
                    }
                    .code, .print_date {
                        text-align: right;
                        font-size: 10px;
                    }
						
                    .truncated {
                        /* display: inline-block; */
                        max-width: 50px; /* Adjust as needed */
                        overflow: hidden;
                        text-overflow: ellipsis;
                        white-space: nowrap;
                        cursor: pointer; /* Indicate that text can be interacted with */
                    }

                    .full-text {
                        display: none;
                    }

                    .truncated:hover .full-text,
                    .truncated.clicked .full-text {
                        display: inline;
                    }

                    // .truncated-text {
                    //     display: block; /* Ensure truncated text is displayed in print */
                    // }

                    .full-text {
                        display: none; /* Hide full text in print */
                    }
                    abbr[title] {
                        text-decoration: unset;
                    }
                    .truncated-text {
                        display: none;
                    }
                }
            </style>
        </head>
        <body>
    `);

    // Use the `headerHtml` and `lastPageHtml` variables you provided
    var headerHtml = `
        <div class="row" id="card_title_hide">
            <div class="col-sm-12">
								
<link rel="stylesheet" type="text/css" href="http://192.168.0.121/sbcl_cca/assets/backend/css/page_print.css">
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
		    <div class="text-center font_size_16">
                শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি লি.            </div>
        </div>
		<div class="col-sm-2 text-right">
		    <div class="text-right font_size_14">
                কোড নং -৩৯            </div>
        </div>
		<div class="col-sm-12 font_size_14">
            <!-- <center><div class="text-center font_size_14 "></?php echo 'প্রকল্প পরিচালকের কার্যালয়'; ?></div></center> -->
            <center><div class="text-center font_size_14 ">কর্মসংস্থান ও দারিদ্র্য বিমোচন প্রকল্প</div></center>
		</div>
		<div class="col-sm-12">


			<center><div class="text-center font_size_12">
				নিবন্ধন নম্বর: ১১২(চট্র), তাং ২৭.০১.২০১৫,  ঠিকানা: ওয়্যারলেছ বাজার, চাঁদপুর সদর, চাঁদপুর।</div></center>


		</div>
	</div>													<center><div class="font_size_14 text-bold" style="margin-top: 10px;">সম্মিলিত বিনিয়োগের মাসিক প্রতিবেদন</div></center>
				            </div>
            
            <div class="col-sm-6 font_size_11 text-bold">
                
					সময়কাল:
					 To
					            </div>
            <div class="col-sm-6 text-right font_size_11 text-bold">
                প্রিন্ট এর তারিখ: 2026-07-06 16:03:39            </div>
        </div>
    `;

    var lastPageHtml = `
		<br><div class="row font_size_10">
    <div class="col-sm-4">
        <center> মোঃ জসিম উদ্দীন</center>
        <hr>
        <div class=" text-center align-middle">প্রকল্প পরিচালক</div>
    </div>
    <div class="col-sm-4">
        <center>মোঃ শাহজালাল আল সাফী</center>
        <hr>
        <div class=" text-center align-middle">পরিচালক ( অর্থ বিভাগ )</div>
    </div>
    <div class="col-sm-4">
        <center>
            মো. জসিম উদ্দিন শেখ        </center>
        <hr>
        <div class=" text-center align-middle">প্রতিবেদন যাচাইকারী</div>
    </div>
    

</div>    `;

    for (var i = 0; i < totalPages; i++) {
        printWindow.document.write('<div class="page-break">');

        // Print header only on the first page
        if (i === 0) {
            printWindow.document.write(headerHtml);
        }

        printWindow.document.write('<table>');

        // Add the header row on each page except the first page
        if (i > 0) {
            printWindow.document.write('<thead>');
            printWindow.document.write(`
               <tr style="background: #3d9970">
					<th class="text-center ">
					</th>
					<th class="text-center ">
					</th>
					<th colspan="4" class="text-center">
						বিনিয়োগ
						সংখ্যা স্থিতি
					</th>
					<th colspan="5" class="text-center">
						বিনিয়োগের
						ধরন সংখ্যা
					</th>
					<th colspan="4" class="text-center">
						বিনিয়োগের
						মূলধন পাওনা
					</th>
					<th colspan="4" class="text-center">
						বিনিয়োগ
						হতে
						লাভ পাওনা
					</th>
					<th rowspan="2" class="text-center">
						মূলধন ও লাভ পাওনা
					</th>
					<th rowspan="2" class="text-center">
						সর্বমোট মূলধন
					</th>
				</tr>


				<tr style="background: #3d9970">
					<th class="text-center">সমিতির নাম
					</th>
					<th class="text-center"> বিনিয়োগ
						পদ্ধতি
					</th>
					<td class="text-center  align-middl">
						বিগত
						স্থিতি
					</td>
					<td class="text-center  align-middl">
						
						বিতরণ
					</td>
					<td class="text-center  align-middl">
						
						পরিশোধ
					</td>
					<td class="text-center  align-middl">
						
						স্থিতি
					</td>
					<td class="text-center  align-middle">
						চাকরিজীবী
					</td>
					<td class="text-center  align-middl">
						প্রবাসী
					</td>
					<td class="text-center  align-middl">
						ব্যাবসায়ী
					</td>
					<td class="text-center  align-middl">
						অন্যান্য
						
					</td>
					<td class="text-center  align-middl">মোট
					</td>
					<td class="text-center  align-middl">
						বিগত স্থিতি
					</td>
					<td class="text-center  align-middl">
					বিতরণ
					</td>
					<td class="text-center  align-middl">
						আদায়
					</td>
					<td class="text-center  align-middl">
					মোট স্থিতি
					</td>
					<td class="text-center  align-middl">
						বিগত
						স্থিতি
					</td>
					<td class="text-center  align-middl">
						বিতরনের
						লাভ
					</td>
					<td class="text-center  align-middl">
						আদায়
						লাভ
					</td>
					<td class="text-center  align-middl">
						পাওনা
						লাভ
					</td>
				</tr>
				<tr>
					<th class="text-center ">

					</th>
											<th class="font_size_5 text-center ">
							1						</th>
											<th class="font_size_5 text-center ">
							2						</th>
											<th class="font_size_5 text-center ">
							3						</th>
											<th class="font_size_5 text-center ">
							4						</th>
											<th class="font_size_5 text-center ">
							5						</th>
											<th class="font_size_5 text-center ">
							6						</th>
											<th class="font_size_5 text-center ">
							7						</th>
											<th class="font_size_5 text-center ">
							8						</th>
											<th class="font_size_5 text-center ">
							9						</th>
											<th class="font_size_5 text-center ">
							10						</th>
											<th class="font_size_5 text-center ">
							11						</th>
											<th class="font_size_5 text-center ">
							12						</th>
											<th class="font_size_5 text-center ">
							13						</th>
											<th class="font_size_5 text-center ">
							14						</th>
											<th class="font_size_5 text-center ">
							15						</th>
											<th class="font_size_5 text-center ">
							16						</th>
											<th class="font_size_5 text-center ">
							17						</th>
											<th class="font_size_5 text-center ">
							18						</th>
											<th class="font_size_5 text-center ">
							19						</th>
											<th class="font_size_5 text-center ">
							20						</th>
									</tr>
            `);
            printWindow.document.write('</thead>');
        }

        // Print rows for the current page
        printWindow.document.write('<tbody>');
        var rowsForPage = rowsPerPage[i];
        for (var j = 0; j < rowsForPage; j++) {
            printWindow.document.write(rows[currentRow].outerHTML);
            currentRow++;
        }
        printWindow.document.write('</tbody>');

        printWindow.document.write('</table>');

        // Check if this is the last page and add additional content
        if (i === totalPages - 1) {
            printWindow.document.write(lastPageHtml);
        }

        printWindow.document.write(`
            <div class="row">
                <div class="col-sm-6">
                    <div class="print-footer">পৃষ্ঠা নম্বর ${i + 1}/${totalPages}</div>
                </div>
                <div class="col-sm-6 text-right">
                    <div class="print-footer">
                        আইডি বিবরণ: PE-22 - মো. জসিম উদ্দিন শেখ                    </div>
                </div>
            </div>
        `);

        printWindow.document.write('</div>');
    }

    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.focus();

    // truncateForPrint();
    // Wait for the content to load before printing
    printWindow.onload = function() {
        printWindow.print();
        printWindow.close();
    };

    // restoreText();
    // Restore original content
    document.body.innerHTML = originalContents;

    // Remove the print-preview container only if it exists
    if (document.body.contains(printPreviewContainer)) {
        document.body.removeChild(printPreviewContainer);
    }
}
</script>

			<div id="sidebar-overlay"></div></section>
		</section>