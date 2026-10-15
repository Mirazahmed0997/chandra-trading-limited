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



    <section class="content ">
        <div class="table1 shadow container-fluid position-relative  p-4">

           

            <div class="d-flex justify-content-center mt-2">
                <h4 class="mt-3 fw-bold fs-5 text-center px-4 py-2 border rounded bg-secondary shadow">
                   Permission Table
                </h4>
            </div>




          

            <div class="table-responsive mt-4">
                <table class="table custom-table">
                    <a href="<?= base_url('permisssions_form/'); ?>" class="btn btn-sm btn-primary ">Create
                        Permission</a>
                        <a href="javascript:void(0);" class="btn btn-sm btn-primary open-charge-modal ml-2">Calculator</a>
                        
                    <thead>
                        <tr>
                            <th class="text-center align-top" rowspan="2">Per ID</th>
                            <th class="text-center align-top" rowspan="2">Per identification</th>
                            <th class="text-center align-top" rowspan="2">Name</th>
                            <th class="text-center align-top" rowspan="2">type</th>
                            <th class="text-center align-top" rowspan="2">Extra type</th>
                            <th class="text-center align-top" rowspan="2">Amount 1</th>
                            <th class="text-center align-top" rowspan="2">Amount 2</th>
                            <th class="text-center align-top" rowspan="2">Status</th>
                            <th class="text-center align-top" rowspan="2">Server Status</th>
                            <th class="text-center align-top" rowspan="2">Created at</th>
                            <th class="text-center align-top" rowspan="2">Created by</th>
                            <th class="text-center align-top" rowspan="2">Updated at</th>
                            <th class="text-center align-top" rowspan="2">Updated by</th>
                            <th class="text-center align-top" rowspan="2">per_online_offline_submit</th>
                            <th class="text-center align-top" rowspan="2">per_branch_code</th>
                            <th class="text-center align-top" rowspan="2">per_account_type</th>
                            <th class="text-center align-top"colspan='2' rowspan="4">Action</th>
                            <!-- <th class="text-center align-top" rowspan="2"></th> -->
                        </tr>


                    </thead>

                    <tbody>

                        <?php foreach ($permissions as $row): ?>
                            <tr style="height: 60px;">

                                <td><?= $row->per_id; ?></td>
                                <td><?= $row->per_identification; ?></td>
                                <td><?= $row->per_name; ?></td>
                                <td><?= $row->per_type; ?></td>
                                <td><?= $row->per_extra_type; ?></td>
                                <td><?= $row->per_amount1; ?></td>
                                <td><?= $row->per_amount2; ?></td>
                                <td><?= $row->per_status; ?></td>
                                <td><?= $row->per_server_status; ?></td>
                                <td><?= $row->per_created_at; ?></td>
                                <td><?= $row->per_created_by; ?></td>
                                <td><?= $row->per_updated_at; ?></td>
                                <td><?= $row->per_updated_by; ?></td>
                                <td><?= $row->per_online_offline_submit; ?></td>
                                <td><?= $row->per_branch_code; ?></td>
                                <td><?= $row->per_account_type; ?></td>    
                                <td>
                                    <a href="<?= base_url('edit_permission/' . $row->per_id); ?>" class="btn btn-sm"><i
                                            class="fas fa-edit"></i></a>
                                </td>
                                <td>
                                    <a href="<?= base_url('delete_permission/' . $row->per_id); ?>" class="btn btn-sm"><i
                                            class="fas fa-trash"></i></a>
                                </td>

                            </tr>
                        <?php endforeach; ?>

                        <tr class="total-row">
                            <td class="text-right" colspan=""></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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
    </section>
</div>

<style>
    body {
        background: #ececec;
    }

    tbody tr td {
        text-align: center;
        vertical-align: middle !important;
    }

    .table1 {
        background: #ececec;
        padding: 30px;
        border-radius: 10px;
    }

    .table-responsive {
        background: transparent;
        padding: 0;
        overflow-x: auto;
    }


    .header-section {
        background: transparent;
        color: #111;
        text-align: center;
        margin-bottom: 10px;
    }

    .header-section h4 {
        font-size: 30px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .header-section div {
        font-size: 15px;
        font-weight: 500;
    }


    .report-title {
        display: flex;
        justify-content: center;
        margin: 25px 0;
    }

    .report-title h4 {
        background: #5f7385;
        color: #fff;
        padding: 12px 40px;
        border-radius: 0px;
        font-size: 22px;
        font-weight: 700;
        letter-spacing: 1px;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
    }


    .custom-table {
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
        background: #fff;
    }

    .custom-table thead tr:first-child th {
        color: #fff;
        font-size: 16px;
        font-weight: 700;
        /* padding:5px 5px; */
        /* border:1px solid #ffffff; */
        text-align: center;
    }

    .custom-table thead tr:nth-child(2) th {
        background: #B1D823 !important;
        color: #333;
        font-size: 14px;
        font-weight: 600;
        /* padding:5px 5px; */
        border-right: 1px dotted #888;
    }

    .custom-table thead tr:nth-child(3) th {
        background: #fafafa !important;
        color: #555;
        font-size: 10px;
        font-weight: 700;
        /* padding:8px; */
        border-right: 1px dotted #999;
    }

    .custom-table thead tr:first-child th:nth-child(1) {
        background: #4a9ad4;
    }

    .custom-table thead tr:first-child th:nth-child(2) {
        background: #65798b;
    }

    .custom-table thead tr:first-child th:nth-child(3) {
        background: #eda84a;
    }

    .custom-table thead tr:first-child th:nth-child(4) {
        background: #f5364f;
    }

    .custom-table thead tr:first-child th:nth-child(5) {
        background: #4a9ad4;
    }

    .custom-table thead tr:first-child th:nth-child(6) {
        background: #65798b;
    }

    .custom-table thead tr:first-child th:nth-child(7) {
        background: #eda84a;
    }

    .custom-table thead tr:first-child th:nth-child(8) {
        background: #f5364f;
    }

    .custom-table thead tr:first-child th:nth-child(9) {
        background: #4a9ad4;
    }
    .custom-table thead tr:first-child th:nth-child(10) {
        background: #f5364f;
    }
    .custom-table thead tr:first-child th:nth-child(11) {
        background: #eda84a;
    }
    .custom-table thead tr:first-child th:nth-child(12) {
        background: #65798b;
    }
    .custom-table thead tr:first-child th:nth-child(13) {
        background: #f5364f;
    }
    .custom-table thead tr:first-child th:nth-child(14) {
        background: #65798b;
    }
    .custom-table thead tr:first-child th:nth-child(15) {
        background: #4a9ad4;
    }
    .custom-table thead tr:first-child th:nth-child(17) {
        background: #f5364f;
    }


    .custom-table tbody tr td {
        /* padding:18px 10px; */
        font-size: 12px;
        color: #444;
        border: 1px dotted #8f8f8f;
        background: #fff;
    }

    .custom-table tbody tr:nth-child(even) td {
        background: #f7f7f7;
    }

    .custom-table tbody tr:hover td {
        background: #eef6ff;
        transition: 0.3s;
    }


    .total-row td {
        background: #5f7385 !important;
        color: #fff !important;
        font-weight: 700;
        font-size: 12px;
    }


    .eye-icon i {
        color: #f5364f;
        font-size: 18px;
    }

    .eye-icon a {
        text-decoration: none;
    }


    .small-number {
        width: 50px;
    }


    .content-header form {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        margin-bottom: 20px;
    }

    .form-control,
    .form-select {
        height: 45px;
        border-radius: 0;
    }

    .btn-success {
        height: 45px;
        padding: 0 25px;
        font-weight: 600;
    }
</style>


<?php $this->load->view('admin/calculator/calculator'); ?>

<script>


    function toggleSort(column) {
        const icon = document.getElementById('sort');
        const order_by = document.getElementById('order_by');
        const order_column = document.getElementById('order_column');

        order_column.value = column;

        if (icon.classList.contains('fa-angle-down')) {
            icon.classList.replace('fa-angle-down', 'fa-angle-up');
            order_by.value = 'asc';
        } else {
            icon.classList.replace('fa-angle-up', 'fa-angle-down');
            order_by.value = 'desc';
        }

        console.log(order_by.value, order_column.value);

        document.querySelector('form').submit();
    }





</script>