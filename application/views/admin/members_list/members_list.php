<div class="content-wrapper">
    

    <div class="content-header">
        <div class="container-fluid">
            <!-- Search / Filter Form -->
            <form method="get" action="<?= base_url('Admin/members_list') ?>">
                <div class="row g-2 mb-3 align-items-center">
                    <div class="col-md-auto">
                        <button type="button" class="btn btn-primary"><i class="fas fa-search"></i> সদস্য
                            খুঁজুন</button>
                    </div>
                    <div class="col-md">
                        <input type="text" name="member_no" value="<?= $this->input->get('member_no') ?>"
                            class="form-control" placeholder="সদস্য নম্বর">
                    </div>
                    <div class="col-md">
                        <input type="text" name="association_name" class="form-control"
                            placeholder="সমিতির নিবন্ধন নম্বর">
                    </div>
                    <div class="col-md">
                        <input type="text" name="a_contact" class="form-control" placeholder="মোবাইল নম্বর">
                    </div>
                    <div class="col-md">
                        <select name="association_name" class="form-select">
                            <!-- <option value="">সদস্য সমিতির নাম</option> -->
                            <option value=""> সকল সদস্য</option>
                            <?php foreach ($members as $member): ?>

                                <option value="<?= $member->association_name ?>"
                                    <?= $this->input->get('association_name') == $member->association_name ? 'selected' : '' ?>>
                                    <?= $member->association_name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row g-2 align-items-center mb-3">
                    <div class="col-md-auto">
                        <button type="button" class="btn btn-primary"><i class="fas fa-calendar-alt"></i> তারিখ
                            নির্বাচন</button>
                    </div>
                    <div class="col-md">
                        <input type="date" name="from_date" class="form-control">
                    </div>
                    <div class="col-md">
                        <input type="date" name="to_date" class="form-control">
                    </div>
                    <div class="col-md-auto">
                        <button type="submit" class="btn btn-success"><i class="fas fa-search"></i> Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Members Table -->
    <section class="content">
        <div class="container-fluid">
            <div class="card shadow">
                
                </div>
                <div class="header col-sm-12">
										<link rel="stylesheet" type="text/css"
											href="http://localhost/sbcl_online/assets/backend/css/page_print.css">
										<div class="row">
											<div class="col-sm-2"></div>
											<div class="col-sm-8">
												<h3 class="text-center font_size_14">
													বাংলাদেশ জাতীয় সমবায় ইউনিয়ন </h3>
											</div>
											
											
											<div class="col-sm-12">

												<center>
													<div class="text-center font_size_12">
														নিবন্ধন নম্বর: ৩৪, তারিখ ১৬.৬.১৯৬১ খ্রি:</div>
												</center>
												<center>
													<div class="text-center font_size_12">
														ঠিকানা: সমবায় ব্যাংক ভবন (৮ম তলা), ৯/ডি, মতিঝিল বা/এ, ঢাকা-১০০০।</div>
												</center>
												<center>
													<div class="text-center font_size_12">
														 ই-মেইলঃ bjsu61@gmail.com, মোবাইলঃ ০১৭০৯৬৫৩৫৯৯ ।</div>
												</center>


											</div>

                                           
										</div>
									</div>
                                     <div class="text-center headline">
                                                 <div class="card-header w-25 mt-2 mx-auto">
                                                         <h5 class="mb-0 text-center">আবেদন মঞ্জুর তালিকা</h5>
                                            </div>
                            </div>




                <div class="card-body p-2">
                    <div class="table-responsive" style="overflow:auto;">
                        <table id="membersTable" class="table table-bordered table-striped table-hover"
                            style="width:100%; white-space: nowrap;">

                            <button onclick="window.print()" class="btn btn-success ">
                                <i class="fas fa-print"></i> Print
                            </button>

                           <thead class="thead-dark">
                                <tr>
                                    <th>ক্র: নং</th>
                                    <th>আবেদনকৃত <br> সমিতির নাম</th>
                                    <th>সমিতির <br> ঠিকানা</th>
                                    <th>সমিতির<br> নিবন্ধন নম্বর</th>
                                    <th>নিবন্ধিত ঠিকানা</th>
                                    <th>সদস্য আবেদনের<br> তারিখ</th>
                                    <th>আবেদন<br> মঞ্জুর তারিখ</th>
                                    <th>মোবাইল নম্বর</th>
                                    <th>সমিতির <br>মেইল</th>
                                    <th>প্রতিনিধির <br>নাম</th>
                                    <th>প্রতিনিধির <br>মোবাইল নম্বর</th>
                                    <th>প্রতিনিধির <br>মেইল</th>
                                    <th>এসএমএস <br>প্রেরণ</th>
                                    <th>মেইল <br>প্রেরণ</th>
                                    <th>পেমেন্ট<br> স্ট্যাটাস</th>
                                    <th>আবেদন<br> ফরম ভিউ</th>
                                </tr>
                                <tr>
                                    <th>০১</th>
                                    <th>০২</th>
                                    <th>০৩</th>
                                    <th>০৪</th>
                                    <th>০৫</th>
                                    <th>০৬</th>
                                    <th>০৭</th>
                                    <th>০৮</th>
                                    <th>০৯</th>
                                    <th>১০</th>
                                    <th>১১</th>
                                    <th>১২</th>
                                    <th>১৩</th>
                                    <th>১৪</th>
                                    <th>১৫</th>
                                    <th>১৬</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($members as $row): ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row->association_name; ?></td>
                                        <td><?= $row->a_address; ?></td>
                                        <td><?= $row->registration_no; ?></td>
                                        <td><?= $row->r_address ?></td>
                                        <td><?= $row->created_at; ?></td>
                                        <td><?= $row->approved_date; ?></td>
                                        <td>0<?= $row->a_contact; ?></td>
                                        <td><?= $row->a_email; ?></td>
                                        <td><?= $row->issuer; ?></td>
                                        <td>0<?= $row->i_contact; ?></td>
                                        <td><?= $row->i_email; ?></td>
                                        <td></td>
                                        <td></td>
                                        <td><?= $row->payment_status; ?></td>
                                        <td>
                                            <a href="<?= base_url('Admin/members_details/' . $row->id); ?>"
                                            class=""><i class="fas fa-eye"></i></a>
                                        </td>
                                        
                                        
                                    






                                        <!-- <td>
                                            <?php if ($row->active_status == 1): ?>
                                                <span class="badge bg-success">Active</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">Inactive</span>
                                            <?php endif; ?>
                                        </td> -->


                                        <!-- <td>
                                            <form action="<?= base_url('member_active_status/' . $row->id); ?>"
                                                method="post">
                                                <select name="active_status" onchange="this.form.submit()"
                                                    class="form-control form-control-sm">
                                                    <option value=1 <?= $row->active_status == 1 ? 'selected' : '' ?>>Active
                                                    </option>
                                                    <option value=0 <?= $row->active_status == 0 ? 'selected' : '' ?>>Inactive
                                                    </option>

                                                </select>
                                            </form>
                                        </td> -->

                                        <!-- <td><a href="<?= base_url('Admin/members_account/'); ?>"
                                                class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a></td>
                                                <td>
                                            <?php if ($row->member_status == 'approved'): ?>
                                                <span class="badge bg-success">Approved</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">Pending</span>
                                            <?php endif; ?>
                                        </td> -->

                                        <!-- <td> -->
                                        
                                        <!-- <a href="<?= base_url('Admin/view_member/' . $row->id); ?>"
                                                class="btn btn-success btn-sm">Details</a> -->

                                        


                                        <!-- <a href="<?= base_url('Admin/delete_member/' . $row->id); ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?');">Delete</a> -->






                                        <!-- <a href="<?= base_url('Admin/seed_members/' . $row->id); ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?');">add dummy</a> -->





                                        <!-- <a href="javascript:void(0);" class="btn btn-success btn-sm active-button"
                                                data-id="<?= $row->id; ?>">
                                                <?= ($row->member_status == 'approved') ? 'approved' : 'Approve Now'; ?>
                                            </a> -->
                                        <!-- </td> -->
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>



<style>

    .header{
        background-color: #3BAAB7;
        padding: 10px;
        /* color: white; */
        font-weight: bold;
        border-radius: 10px;
    }

    .card-header{
        background-color: #3BAAB7;
        width: 25%;
        /* color: white; */
        border-radius: 10px;
        
    }

    thead tr th{
        text-align: center;
        vertical-align: top !important;

    }

    td{
        text-align: center;
    }
    @media print {

        thead {
            display: table-header-group !important;
        }



        table {
            width: 100%;
            border-collapse: collapse !important;
            white-space: normal !important;
            font-size: 9px;
            page-break-inside: auto;
        }

        thead th {
            color: #000 !important;
            background: #fff !important;

            border: 1px solid #000 !important;
            font-weight: bold;
            text-align: center;
        }

        table th,
        table td {
            border: 1px solid #000 !important;
            padding: 5px !important;
            font-size: 10px;
            text-align: center;
            vertical-align: middle;
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        .btn,
        .open-charge-modal,
        .active-button,
        a {
            display: none !important;
        }

        table th:last-child,
        table td:last-child {
            display: none !important;
        }

        .table-responsive {
            overflow: visible !important;
        }


    }
</style>





<!-- ---------------------popup-------------------------- -->

<div class="modal fade" id="chargeModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <form id="chargeForm">

                <div class="modal-header">
                    <h5 class="modal-title">Update Charge</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="member_id" id="member_id">

                    <div class="form-group">
                        <label>Subscription Fee</label>
                        <input type="number" name="subscription_fee" id="subscription_fee" class="form-control"
                            required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>





<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#membersTable').DataTable({
            responsive: false,
            scrollX: true,
            scrollY: "500px",
            scrollCollapse: true,
            paging: false,
            fixedHeader: true,
            pageLength: 10,
            searching: false,
            lengthMenu: [10, 25, 50, 100],
            language: {
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ members"
            }
        });
    });


    // for popup------------------------------------------

    $(document).on("click", ".open-charge-modal", function () {
        let memberId = $(this).data("id");
        let fee = $(this).data("fee");

        $("#member_id").val(memberId);
        $("#subscription_fee").val(fee);

        $("#chargeModal").modal("show");
    });


    $("#chargeForm").submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "<?= base_url('Admin/save_charge'); ?>",
            type: "POST",
            data: $(this).serialize(),
            success: function (response) {

                $("#chargeModal").modal("hide");

                alert("Charge updated successfully!");

                location.reload();
            }
        });
    });




    // --------------------------for approval----------------

    $(document).on("click", ".active-button", function () {
        let memberId = $(this).data("id");

        if (confirm("Are you sure you want to mark as Active?")) {

            $.ajax({
                url: "<?= base_url('Admin/approval_update'); ?>",
                type: "POST",
                data: { member_id: memberId },
                success: function (res) {

                    alert("Member Active Successfully !");

                    $("tr[data-id='" + memberId + "'] .payment-status")
                        .text("Active")
                        .removeClass("badge-danger")
                        .addClass("badge-success");

                }
            });
        }
    });



</script>