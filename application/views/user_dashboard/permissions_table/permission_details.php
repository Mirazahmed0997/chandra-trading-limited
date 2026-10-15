<div class="content-wrapper">

    <?php if ($this->session->flashdata('success')): ?>
        <div class="position-fixed top-0 start-50 translate-middle-x mt-3" style="z-index:9999; width: 400px;">

            <div class="alert alert-success alert-dismissible fade show shadow">
                <?= $this->session->flashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>

        </div>
    <?php endif; ?>

    <div class="content-header">
        <div class="container-fluid">
            <form method="get" action="<?= base_url('Permisions_controller/permissions_list') ?>">
                <div class="row g-2 mb-3">

                    <div class="col-md">
                        <input type="text" name="per_id" value="<?= $this->input->get('per_id') ?>" class="form-control"
                            placeholder="Permission ID">
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


                    <input type="hidden" id="order_by" name="order_by" value="desc">
                    <input type="hidden" id="order_column" name="order_column" value="per_amount1">

                </div>

                <div class="row g-2 mb-3">
                    <div class="col-md">
                        <input type="date" name="from_date" class="form-control">
                    </div>

                    <div class="col-md">
                        <input type="date" name="to_date" class="form-control">
                    </div>

                    <div class="col-md-auto">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <section class="content">
        <div class="table1 shadow container-fluid position-relative p-4">

            <div class="header-section text-center  p-4">
                <h4>শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি লিঃ</h4>
                <div>নিবন্ধন নংঃ ১১১(চট্ট), তাং ২৭.০১.২০১৫,</div>
                <div>ঠিকানাঃ ওয়ারলেস বাজার, চাঁদপুর সদর, চাঁদপুর।</div>


            </div>

            <!-- <div class="d-flex justify-content-center  mt-2">
                <h4 class="mt-3 fw-bold fs-5 text-center px-4 py-2 border rounded bg-secondary shadow">
                    দৈনিক কিস্তির সংখ্যা তালিকা
                </h4>
            </div> -->
            <div class="d-flex justify-content-center  mt-2">
                <h4 class="mt-3 fw-bold fs-5 text-center px-4 py-2 border rounded bg-secondary shadow">
                    দৈনিক কিস্তির সংখ্যা তালিকা
                </h4>
            </div>

            <!-- <div class="table-responsive mt-4">
                <table class="table table-bordered"> -->

            <div class="table-responsive mt-4">
                <table class="table custom-table">

                    <thead>
                        <tr>
                            <th class="text-center align-top" rowspan="2">নং</th>
                            <th class="text-center align-top" rowspan="2">তারিখ</th>
                            <th class="text-center align-top" colspan="4">দিনের বিনিয়োগ সংখ্যা</th>
                            <th class="text-center align-top" rowspan="2">কিস্তির টাকার <br> পরিমাণ</th>
                            <th class="text-center align-top" rowspan="2">বিনিয়োগ<br> অফিসার সংখ্যা</th>
                            <th class="text-center align-top" rowspan="2">ভিউ</th>
                        </tr>

                        <tr>
                            <th class="text-center align-top">হালনাগাদ সংখ্যা</th>
                            <th class="text-center align-top">ভিউ</th>
                            <th class="text-center align-top">খেলাপী ও বকেয়া সংখ্যা</th>
                            <th class="text-center align-top">ভিউ</th>
                        </tr>

                        <tr>
                            <th class="text-center align-top small-number">1</th>
                            <th class="text-center align-top small-number">2</th>
                            <th class="text-center align-top small-number">3</th>
                            <th class="text-center align-top small-number">4</th>
                            <th class="text-center align-top small-number">5</th>
                            <th class="text-center align-top small-number">6</th>
                            <th class="text-center align-top small-number">7</th>
                            <th class="text-center align-top small-number">8</th>
                            <th class="text-center align-top small-number">9</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr style="height: 30px;">

                            <td><?= $permission->per_id; ?></td>
                            <td><?= $permission->per_created_at; ?></td>


                            <td><?= $permission->per_amount1; ?></td>

                            <td class="eye-icon">
                                <i class="fas fa-eye"></i>
                            </td>

                            <td><?= $permission->per_amount2; ?></td>

                            <td class="eye-icon">
                                <i class="fas fa-eye"></i>
                            </td>

                            <td><?= $permission->per_amount1 + $permission->per_amount2; ?></td>

                            <td><?= $permission->per_branch_code; ?></td>

                            <td onclick="toggleEye(this)" class="eye-icon" style="cursor:pointer;">
                                <a href="<?= base_url('permission_details/' . $permission->per_id); ?>"
                                    class="btn btn-sm"><i class="fas fa-eye"></i></a>

                            </td>

                        </tr>

                        <tr class="total-row">
                            <td class="text-right" colspan="2">মোট</td>
                            <td></td>
                            <td></td>
                            <td>সকল ভিউ <i class="fas fa-eye"></i></td>
                            <td></td>
                            <td>সকল ভিউ <i class="fas fa-eye"></i></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </tbody>

                </table>
            </div>

        </div>
    </section>


</div>


<!-- <style>
    tbody tr td {
        text-align: center !important;
    }

    .table1 {
        background-image: url('https://static.vecteezy.com/system/resources/previews/026/536/158/non_2x/red-flowing-corner-background-vector.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        
    }

    .table-responsive {
        background-color: white;
        padding: 5px;
    }
    .header-section{
        background: #3D9970 ;
        color: white;
    }
</style> -->

<style>

body{
    background:#ececec;
    font-family: sans-serif;
}



.table1{
    background:#ececec;
    padding:25px;
    border-radius:10px;
}

.header-section{
    text-align:center;
    margin-bottom:15px;
    color:#111;
}

.header-section h4{
    font-size:32px;
    font-weight:700;
    margin-bottom:10px;
}

.header-section div{
    font-size:15px;
    font-weight:500;
}


.report-title{
    display:flex;
    justify-content:center;
    margin:25px 0;
}

.report-title h4{
    background:#65798b;
    color:#fff;
    padding:12px 45px;
    font-size:22px;
    font-weight:700;
    letter-spacing:1px;
    margin:0;
}


.table-responsive{
    overflow-x:auto;
    background:#fff;
    padding:0;
}

.custom-table{
    width:100%;
    border-collapse:collapse;
    margin:0;
    background:#fff;
}


.custom-table thead th{
    text-align:center;
    /* vertical-align:middle !important; */
    border:1px dotted #888 !important;
}


.custom-table thead tr:first-child th{
    color:#fff;
    font-size:16px;
    font-weight:700;
    /* padding:18px 10px; */
}


.custom-table thead tr:first-child th:nth-child(1){
    background:#4a9ad4;
}

.custom-table thead tr:first-child th:nth-child(2){
    background:#65798b;
}

.custom-table thead tr:first-child th:nth-child(3){
    background:#eda84a;
}

.custom-table thead tr:first-child th:nth-child(4){
    background:#f5364f;
}

.custom-table thead tr:first-child th:nth-child(5){
    background:#4a9ad4;
}

.custom-table thead tr:first-child th:nth-child(6){
    background:#65798b;
}


.custom-table thead tr:nth-child(2) th{
    background:#B1D823;
    color:#333;
    font-size:14px;
    font-weight:600;
    /* padding:14px 8px; */
}


.custom-table thead tr:nth-child(3) th{
    background:#fafafa;
    color:#555;
    font-size:12px;
    font-weight:700;
    /* padding:8px; */
}


.custom-table tbody td{
    text-align:center;
    vertical-align:middle;
    /* padding:18px 10px; */
    font-size:14px;
    color:#444;
    border:1px dotted #999 !important;
}


.custom-table tbody tr:nth-child(even) td{
    background:#f8f8f8;
}


.custom-table tbody tr:hover td{
    background:#eef6ff;
    transition:0.3s;
}


.total-row td{
    background:#65798b !important;
    color:#fff !important;
    font-weight:700;
    font-size:15px;
}


.eye-icon i{
    color:#f5364f;
    font-size:18px;
}

.eye-icon a{
    text-decoration:none;
}


.content-header form{
    background:#fff;
    padding:20px;
    border-radius:10px;
    box-shadow:0 2px 10px rgba(0,0,0,0.08);
    margin-bottom:20px;
}

.form-control,
.form-select{
    height:45px;
    border-radius:0;
}

.btn-success{
    height:45px;
    padding:0 25px;
    font-weight:600;
}

</style>