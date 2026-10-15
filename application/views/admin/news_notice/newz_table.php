<div class="content-wrapper">

    <div class="content-header">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h3 class="fw-bold text-dark mb-1">
                    <i class="fas fa-newspaper text-primary me-2"></i>
                    News List
                </h3>

                <p class="text-muted mb-0">
                    Manage all system News
                </p>
            </div>

            <button type="button" class="btn btn-primary mb-2" id="openCreateModal">
                <i class="fas fa-edit"></i> Create News
            </button>

        </div>

        <div class="search-card mb-4">

            <form method="get" action="<?= base_url('news_notice_management/news_list') ?>">

                <div class="row g-3 align-items-end">

                    <!--  ID -->
                    <div class="col-lg-3 col-md-6">

                        <label class="form-label">
                            News ID
                        </label>

                        <div class="search-input">

                            <i class="fas fa-id-card"></i>

                            <input type="text" name="id" value="<?= html_escape($this->input->get('id')) ?>"
                                placeholder="Enter News ID">

                        </div>

                    </div>


                    <!-- Headline -->
                    <div class="col-lg-3 col-md-6">

                        <label class="form-label">
                            Headline
                        </label>

                        <div class="search-input">
                            <i class="fa fa-newspaper" aria-hidden="true"></i>
                            <input type="text" name="headline"
                                value="<?= htmlspecialchars($this->input->get('headline') ?? '') ?>"
                                class="form-control" placeholder="Headline">
                        </div>

                    </div>


                    <div class="search-input ">
                        <input type="date" name="from_date"
                            value="<?= htmlspecialchars($this->input->get('from_date') ?? '') ?>" class="form-control">
                    </div>
                    <div class="search-input ">
                        <input type="date" name="to_date"
                            value="<?= htmlspecialchars($this->input->get('to_date') ?? '') ?>" class="form-control">
                    </div>


                    <!-- Buttons -->
                    <div class="col-lg-3 col-md-6">

                        <div class="d-flex gap-2">

                            <!-- <button type="submit" class="btn btn-primary search-btn">

                                <i class="fas fa-search me-2"></i>
                                Search

                            </button> -->

                            <button type="submit" class="btn btn-primary me-2">
                                <i class="fas fa-filter"></i> Filter
                            </button>
                            <a href="<?= base_url('news_list') ?>" class="btn btn-light reset-btn"
                                title="Reset Filters">

                                <i class="fas fa-sync-alt"></i>

                            </a>

                        </div>

                    </div>

                </div>

            </form>

        </div>
    </div>

    <!-- news Table -->
    <section class="content">
        <div class="container-fluid">
            <div class="card shadow">

                <div class="card-body p-2">


                    <div class="table-responsive" style="overflow:auto;">
                        <table id="membersTable" class="table table-bordered table-striped table-hover"
                            style="width:100%; white-space: nowrap;">
                            <thead class="">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Headline</th>
                                    <th>Details</th>
                                    <th>Status</th>
                                    <th>Posted By</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = $start_index;
                                foreach ($news as $row): ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td>
                                            <img src="<?= base_url('/assets/uploads/project/news_image/' . $row->image) ?>"
                                                alt="Image" width="100px" height="100px">
                                        </td>
                                        <td style="max-height: 100px; overflow-y: auto; white-space: normal;">
                                            <?= $row->headline; ?>
                                        </td>
                                        <td style="max-height: 100px; overflow-y: auto; white-space: normal;">
                                            <?= $row->details; ?>
                                        </td>
                                        <td>
                                            <form action="<?= base_url('update_news_status/' . $row->id); ?>" method="post">
                                                <select name="status" onchange="this.form.submit()"
                                                    class="form-control form-control-sm">
                                                    <option value="1" <?= $row->status == 1 ? 'selected' : '' ?>>Active
                                                    </option>
                                                    <option value="0" <?= $row->status == 0 ? 'selected' : '' ?>>Inactive
                                                    </option>
                                                </select>
                                            </form>
                                        </td>
                                        <td><?= $row->posted_by; ?></td>
                                        <td><?= $row->created_at; ?></td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-warning btn-sm open-charge-modal"
                                                data-id="<?= $row->id; ?>"
                                                data-headline="<?= htmlspecialchars($row->headline, ENT_QUOTES); ?>"
                                                data-details="<?= htmlspecialchars($row->details, ENT_QUOTES); ?>">
                                                <i class="fas fa-edit nav-icon"></i>
                                            </a>
                                            <a href="<?= base_url('delete_news/' . $row->id) ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this news?')">
                                                <i class="fas fa-trash nav-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Render Pagination Links -->
                    <div class="d-flex justify-content-end mt-3">
                        <?= $pagination; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    /* Search Card */

    .search-card {
        background: #ffffff;
        border: 1px solid #e9ecef;
        border-radius: 14px;
        padding: 22px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
    }


    .form-label {
        font-size: 13px;
        font-weight: 600;
        color: #495057;
        margin-bottom: 7px;
    }


    .search-input {
        height: 44px;
        display: flex;
        align-items: center;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        background: #fff;
        transition: 0.2s;
    }


    .search-input:focus-within {
        border-color: #0d6efd;
        box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.08);
    }


    .search-input i {
        width: 42px;
        text-align: center;
        color: #adb5bd;
    }


    .search-input input {
        width: 100%;
        height: 100%;
        border: 0;
        outline: none;
        font-size: 14px;
        padding-right: 12px;
        background: transparent;
    }


    .search-btn {
        height: 44px;
        flex: 1;
        font-weight: 600;
        border-radius: 8px;
    }


    .reset-btn {
        width: 48px;
        height: 44px;
        border: 1px solid #dee2e6;
        border-radius: 8px;
    }
</style>


<!-- ---------------------create popup-------------------------- -->

<?php $this->load->view('admin/news_notice/news_create_form'); ?>

<!-- ---------------------update popup-------------------------- -->

<?php $this->load->view('admin/news_notice/update_news_form'); ?>





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    // $(document).ready(function () {
    //     // Basic formatting without client-side pagination interference
    //     $('#membersTable').DataTable({
    //         paging: false,
    //         searching: false,
    //         info: false,
    //         scrollX: true,
    //         fixedHeader: true
    //     });

    //     // Handle Edit Modal display and populate existing data
    //     $(document).on("click", ".open-charge-modal", function () {
    //         var id = $(this).data('id');
    //         var headline = $(this).data('headline');
    //         var details = $(this).data('details');

    //         $('#chargeModal input[name="headline"]').val(headline);
    //         $('#chargeModal textarea[name="details"]').val(details);

    //         if ($('#chargeModal input[name="news_id"]').length === 0) {
    //             $('<input>').attr({
    //                 type: 'hidden',
    //                 name: 'news_id',
    //                 value: id
    //             }).appendTo('#chargeModal form');
    //         } else {
    //             $('#chargeModal input[name="news_id"]').val(id);
    //         }

    //         $("#chargeModal").modal("show");
    //     });

    //     // Handle AJAX Form Submission for Update
    //     $("#chargeForm").submit(function (e) {
    //         e.preventDefault();
    //         $.ajax({
    //             url: "<?= base_url('news_notice_management/update_news'); ?>",
    //             type: "POST",
    //             data: $(this).serialize(),
    //             success: function (response) {
    //                 $("#chargeModal").modal("hide");
    //                 alert("Updated successfully!");
    //                 location.reload();
    //             }
    //         });
    //     });

    //     // Handle Open Create Modal
    //     $('#openCreateModal').click(function () {
    //         $('#createNewsModal').modal('show');
    //     });
    // });
</script>