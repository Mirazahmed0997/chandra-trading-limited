<style>
    .table-section {
        background-image: url('https://static.vecteezy.com/system/resources/previews/026/536/158/non_2x/red-flowing-corner-background-vector.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        
    }

    .table-responsive , .sign{
        background-color: white;
        padding: 5px;
    }

    .header-section{
        background: #3D9970 ;
        color: white;
    }
</style>




<div class="content-wrapper ">

    <div class="content-header">
        <div class="container-fluid">
            <form method="get" action="<?= base_url('Permisions_controller/permissions_list') ?>">

                <div class="row g-2 mb-3">

                    <div class="col-md">
                        <input type="text" name="per_id" class="form-control" placeholder="Permission ID">
                    </div>

                    <div class="col-md">
                        <input type="text" name="per_identification" class="form-control" placeholder="Identification">
                    </div>

                    <div class="col-md">
                        <input type="text" name="per_name" class="form-control" placeholder="Name">
                    </div>

                    <div class="col-md">
                        <select name="per_status" class="form-select">
                            <option value="">Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <div class="col-md">
                        <input type="text" name="per_branch_code" class="form-control" placeholder="Branch Code">
                    </div>

                </div>

                <div class="row g-2 mb-3">
                    <div class="col-md">
                        <input type="date" name="from_date" class="form-control">
                    </div>

                    <div class="col-md">
                        <input type="date" name="to_date" class="form-control">
                    </div>

                    <div class="col-md-auto">
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <div class="shadow p-4 bg-white table-section">

                <div class="header-section text-center  text-white p-4 rounded">
                    <h4>শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি লিঃ</h4>
                    <h6>কর্মসংস্থান ও দারিদ্র বিমোচন প্রকল্প</h6>
                    <h6>নিবন্ধন নংঃ ০১/চাঁদ/১২, তাং ২৭.০১.২০১৫</h6>



                </div>
                <div class="tname d-flex justify-content-center  mt-2">
                    <h4 class=" mt-3 fw-bold fs-5 text-center px-4 py-2 border rounded bg-secondary shadow-lg">
                        বকেয়া ও খেলাপি তালিকা
                    </h4>
                </div>

                <div class="table-responsive mt-2">
                    <table class="table table-bordered table-sm">

                        <thead>
                            <tr>
                                <th rowspan="">ক্র. নং</th>
                                <th rowspan="">সমিতি নাম</th>
                                <th colspan="">বকেয়া ০১ কিস্তি সংখ্যা</th>
                                <th colspan="">বকেয়া ০২ কিস্তি সংখ্যা</th>
                                <th rowspan="">বকেয়া ৩ বা তার উর্ধে কিস্তি সংখ্যা</th>
                                <th rowspan="">খেলাপি সংখ্যা</th>
                                <th rowspan="">মোট সংখ্যা</th>
                                <th rowspan="">বকেয়া মূলধন ০১ কিস্তি টাকা</th>
                                <th>বকেয়া মূলধন ০২ কিস্তি টাকা</th>
                                <th>বকেয়া মূলধন ৩ বা তার উর্ধে কিস্তি টাকা</th>
                                <th colspan=""> মূলধন (খেলাপি)</th>
                                <th rowspan="">মোট মূলধন</th>
                                <th colspan="">মোট লাভ (বকেয়া)</th>
                                <th colspan="">মোট ও লাভ (খেলাপি)</th>
                                <th colspan="">মোট লাভ</th>
                                <th colspan="">বকেয়া খেলাপি মোট</th>
                                <th rowspan="">View</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>শিক্ষিত বেকার</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td onclick="toggleEye(this)" class="eye-icon" style="cursor:pointer;">
                                    <a href="<?= base_url('due_list_details'); ?>" class="btn btn-sm"><i
                                            class="fas fa-eye"></i></a>

                                </td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>পাটওয়ারী বাজার</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td onclick="toggleEye(this)" class="eye-icon" style="cursor:pointer;">
                                    <a href="<?= base_url('due_list_details'); ?>" class="btn btn-sm"><i
                                            class="fas fa-eye"></i></a>

                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>পাটওয়ারী বাজার</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td>
                                    <a href="#" class="btn btn-sm ">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>পাটওয়ারী বাজার</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td onclick="toggleEye(this)" class="eye-icon" style="cursor:pointer;">
                                    <a href="<?= base_url('due_list_details'); ?>" class="btn btn-sm"><i
                                            class="fas fa-eye"></i></a>

                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>পাটওয়ারী বাজার</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td onclick="toggleEye(this)" class="eye-icon" style="cursor:pointer;">
                                    <a href="<?= base_url('due_list_details'); ?>" class="btn btn-sm"><i
                                            class="fas fa-eye"></i></a>

                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>পাটওয়ারী বাজার</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td onclick="toggleEye(this)" class="eye-icon" style="cursor:pointer;">
                                    <a href="<?= base_url('due_list_details'); ?>" class="btn btn-sm"><i
                                            class="fas fa-eye"></i></a>

                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>পাটওয়ারী বাজার</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td onclick="toggleEye(this)" class="eye-icon" style="cursor:pointer;">
                                    <a href="<?= base_url('due_list_details'); ?>" class="btn btn-sm"><i
                                            class="fas fa-eye"></i></a>

                                </td>
                            </tr>

                            <tr>
                                <td colspan="2" class="text-end fw-bold">মোট</td>
                                <td colspan=""></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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

                            <tr>
                                <td colspan="2" class="text-end">বিগত বছর =</td>
                                <td colspan=""></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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

                            <tr>
                                <td colspan="2" class="text-end">বৃদ্ধি/হ্রাস</td>
                                <td colspan=""></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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

                <div class="sign d-flex justify-content-between p-5 text-center">

                    <div style="width:30%">
                        <hr>
                        <p>ব্যবস্থাপক/সহকারী</p>
                    </div>

                    <div style="width:30%">
                        <hr>
                        <p>পরিদর্শক</p>
                    </div>

                </div>

            </div>

        </div>
    </section>

</div>