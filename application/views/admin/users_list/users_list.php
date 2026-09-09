<!-- Content Wrapper -->
<div class="content-wrapper bg-light">

    <section class="content-header py-4">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>
                    <h3 class="fw-bold text-dark mb-1">
                        <i class="fas fa-users text-primary me-2"></i>
                        User List
                    </h3>

                    <p class="text-muted mb-0">
                        Manage all system users and their roles
                    </p>
                </div>

                <a href="<?= base_url('admin_registration_form'); ?>" class="btn btn-primary px-4">
                    <i class="fas fa-user-plus me-2"></i>
                    New User
                </a>

            </div>


            <!-- Search Card -->
            <div class="search-card mb-4">

                <form method="get" action="<?= base_url('Admin/users_list') ?>">

                    <div class="row g-3 align-items-end">

                        <!-- User ID -->
                        <div class="col-lg-3 col-md-6">

                            <label class="form-label">
                                User ID
                            </label>

                            <div class="search-input">

                                <i class="fas fa-id-card"></i>

                                <input type="text" name="id" value="<?= html_escape($this->input->get('id')) ?>"
                                    placeholder="Enter User ID">

                            </div>

                        </div>


                        <!-- Username -->
                        <div class="col-lg-3 col-md-6">

                            <label class="form-label">
                                Username
                            </label>

                            <div class="search-input">

                                <i class="fas fa-user"></i>

                                <input type="text" name="username"
                                    value="<?= html_escape($this->input->get('username')) ?>"
                                    placeholder="Enter username">

                            </div>

                        </div>


                        <!-- Mobile -->
                        <div class="col-lg-3 col-md-6">

                            <label class="form-label">
                                Mobile Number
                            </label>

                            <div class="search-input">

                                <i class="fas fa-phone"></i>

                                <input type="text" name="mobile_number"
                                    value="<?= html_escape($this->input->get('mobile_number')) ?>"
                                    placeholder="Enter mobile number">

                            </div>

                        </div>


                        <!-- Buttons -->
                        <div class="col-lg-3 col-md-6">

                            <div class="d-flex gap-2">

                                <button type="submit" class="btn btn-primary search-btn">

                                    <i class="fas fa-search me-2"></i>
                                    Search

                                </button>

                                <a href="<?= base_url('Admin/users_list') ?>" class="btn btn-light reset-btn"
                                    title="Reset Filters">

                                    <i class="fas fa-sync-alt"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                </form>

            </div>


            <!-- Flash Messages -->

           


            <!-- Users Card -->
            <div class="users-card">

                <!-- Card Header -->
                <div class="users-card-header">

                    <div>

                        <h5 class="mb-1 fw-bold">
                            All Users
                        </h5>

                        <small class="text-muted">
                            Registered system users
                        </small>

                    </div>


                    <div class="total-users">

                        <span>
                            <?= !empty($users) ? count($users) : 0 ?>
                        </span>

                        Users

                    </div>

                </div>


                <!-- Table -->
                <div class="table-responsive">

                    <table id="membersTable" class="table users-table align-middle mb-0">

                        <thead>

                            <tr>

                                <th class="text-center" style="width:70px;">
                                    #
                                </th>

                                <th>
                                    User
                                </th>

                                <!-- ROLE -->
                                <th style="width:190px;">
                                    Role
                                </th>

                                <th>
                                    Designation
                                </th>

                                <th>
                                    Contact
                                </th>

                                <th class="text-center" style="width:130px;">
                                    Actions
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php if (!empty($users)): ?>

                                <?php $i = 1; ?>

                                <?php foreach ($users as $row): ?>

                                    <tr>

                                        <!-- Serial -->
                                        <td class="text-center">

                                            <span class="serial-number">
                                                <?= $i++; ?>
                                            </span>

                                        </td>


                                        <!-- USER -->
                                        <td>

                                            <div class="user-info">

                                                <div class="user-avatar">

                                                    <?= strtoupper(
                                                        substr(
                                                            $row->first_name,
                                                            0,
                                                            1
                                                        )
                                                    ); ?>
                                                    <?= strtoupper(
                                                        substr(
                                                            $row->last_name,
                                                            0,
                                                            1
                                                        )
                                                    ); ?>

                                                </div>


                                                <div>

                                                    <div class="username">
                                                        <?= html_escape($row->first_name); ?>
                                                        <?= html_escape($row->last_name); ?>
                                                    </div>

                                                    <small class="user-id">
                                                        ID #<?= html_escape($row->id); ?>
                                                    </small>

                                                </div>

                                            </div>

                                        </td>


                                        <!-- ROLE -->
                                        <td>

                                            <form action="<?= base_url('update_users_role/' . $row->id); ?>" method="post"
                                                class="role-form">

                                                <select name="role" onchange="this.form.submit()" class="role-select
                                                <?= $row->role == 'super_admin'
                                                    ? 'role-super'
                                                    : ($row->role == 'admin'
                                                        ? 'role-admin'
                                                        : 'role-user'); ?>">

                                                    <?php if ($row->role == 'super_admin'): ?>

                                                        <!-- Current Role First -->
                                                        <option value="super_admin" selected>
                                                            Super Admin
                                                        </option>

                                                        <option value="admin">
                                                            Admin
                                                        </option>

                                                        <option value="user">
                                                            User
                                                        </option>

                                                    <?php elseif ($row->role == 'admin'): ?>

                                                        <!-- Current Role First -->
                                                        <option value="admin" selected>
                                                            Admin
                                                        </option>

                                                        <option value="super_admin">
                                                            Super Admin
                                                        </option>

                                                        <option value="user">
                                                            User
                                                        </option>

                                                    <?php else: ?>

                                                        <!-- Current Role First -->
                                                        <option value="user" selected>
                                                            User
                                                        </option>

                                                        <option value="admin">
                                                            Admin
                                                        </option>

                                                        <option value="super_admin">
                                                            Super Admin
                                                        </option>

                                                    <?php endif; ?>

                                                </select>

                                            </form>


                                        </td>


                                        <!-- DESIGNATION -->
                                        <td>

                                            <span class="designation">
                                                <?= html_escape($row->designation); ?>
                                            </span>

                                        </td>


                                        <!-- CONTACT -->
                                        <td>

                                            <div class="mobile-number">

                                                <i class="fas fa-phone"></i>

                                                <?= html_escape(
                                                    $row->mobile_number
                                                ); ?>

                                            </div>

                                        </td>


                                        <!-- ACTIONS -->
                                        <td class="text-center">

                                            <div class="action-buttons">

                                                <!-- View -->
                                                <a href="<?= base_url('Admin/view_user/' . $row->id); ?>"
                                                    class="action-btn view-btn" title="View User">

                                                    <i class="fas fa-eye"></i>

                                                </a>


                                                <!-- Delete -->
                                                <a href="<?= base_url('Admin/delete_user/' . $row->id); ?>"
                                                    class="action-btn delete-btn"
                                                    onclick="return confirm('Are you sure you want to delete this user?');"
                                                    title="Delete User">

                                                    <i class="fas fa-trash"></i>

                                                </a>

                                            </div>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>


                            <?php else: ?>

                                <tr>

                                    <td colspan="6" class="empty-state">

                                        <div class="empty-icon">

                                            <i class="fas fa-users"></i>

                                        </div>

                                        <h6>
                                            No Users Found
                                        </h6>

                                        <p>
                                            No users were found matching your search.
                                        </p>

                                    </td>

                                </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </section>

</div>

<style>
    .content-wrapper {
        min-height: 100vh;
    }


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


    /* Alerts */

    .custom-alert {
        border-radius: 10px;
        border: 0;
        padding: 14px 18px;
        font-size: 14px;
    }


    /* Users Card */

    .users-card {
        background: #ffffff;
        border-radius: 14px;
        border: 1px solid #e9ecef;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        overflow: hidden;
    }


    .users-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid #edf0f2;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }


    .users-card-header h5 {
        font-size: 17px;
        color: #212529;
    }


    .total-users {
        background: #eef5ff;
        color: #0d6efd;
        padding: 7px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
    }


    .total-users span {
        font-size: 15px;
        margin-right: 3px;
    }


    /* Table */

    .users-table thead th {
        background: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
        color: #6c757d;
        font-size: 12px;
        font-weight: 700;
        padding: 14px 16px;
        white-space: nowrap;
    }


    .users-table tbody td {
        padding: 15px 16px;
        border-bottom: 1px solid #f1f3f5;
        font-size: 14px;
    }


    .users-table tbody tr {
        transition: 0.2s;
    }


    .users-table tbody tr:hover {
        background: #f8fbff;
    }


    .users-table tbody tr:last-child td {
        border-bottom: 0;
    }


    /* Serial */

    .serial-number {
        color: #adb5bd;
        font-weight: 600;
    }


    /* User */

    .user-info {
        display: flex;
        align-items: center;
        gap: 11px;
    }


    .user-avatar {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #eaf2ff;
        color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 14px;
        flex-shrink: 0;
    }


    .username {
        font-weight: 600;
        color: #212529;
    }


    .user-id {
        color: #adb5bd;
        font-size: 11px;
    }


    /* Role */

    .role-form {
        margin: 0;
    }


    .role-select {
        width: 100%;
        height: 38px;
        border-radius: 7px;
        padding: 0 12px;
        font-size: 13px;
        font-weight: 600;
        border: 1px solid transparent;
        cursor: pointer;
        outline: none;
    }


    .role-select:focus {
        box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.10);
    }


    .role-super {
        background: #fff3cd;
        color: #856404;
        border-color: #ffe69c;
    }


    .role-admin {
        background: #e8f1ff;
        color: #0d6efd;
        border-color: #cfe2ff;
    }


    .role-user {
        background: #e9f8f0;
        color: #198754;
        border-color: #c7ead8;
    }


    /* Designation */

    .designation {
        color: #495057;
        font-weight: 500;
    }


    /* Mobile */

    .mobile-number {
        color: #495057;
        white-space: nowrap;
    }


    .mobile-number i {
        color: #adb5bd;
        margin-right: 7px;
        font-size: 12px;
    }


    /* Actions */

    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 7px;
    }


    .action-btn {
        width: 34px;
        height: 34px;
        border-radius: 7px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: 0.2s;
    }


    .view-btn {
        color: #0d6efd;
        background: #eef5ff;
    }


    .view-btn:hover {
        background: #0d6efd;
        color: #fff;
    }


    .delete-btn {
        color: #dc3545;
        background: #fff0f1;
    }


    .delete-btn:hover {
        background: #dc3545;
        color: #fff;
    }


    /* Empty State */

    .empty-state {
        padding: 70px 20px !important;
        text-align: center;
    }


    .empty-icon {
        width: 65px;
        height: 65px;
        margin: 0 auto 15px;
        border-radius: 50%;
        background: #f1f3f5;
        color: #adb5bd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 25px;
    }


    .empty-state h6 {
        font-weight: 600;
        color: #495057;
    }


    .empty-state p {
        color: #adb5bd;
        font-size: 13px;
        margin-bottom: 0;
    }


    /* Mobile */

    @media (max-width: 767px) {

        .content-header {
            padding-top: 20px !important;
        }

        .users-card-header {
            padding: 16px;
        }

        .users-table {
            min-width: 850px;
        }

        .total-users {
            font-size: 11px;
        }

    }
</style>



<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>


<script>

    $(document).ready(function () {

        $('#membersTable').DataTable({

            responsive: false,

            paging: true,

            pageLength: 10,

            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ],

            order: [],

            language: {

                search: "",

                searchPlaceholder: "Search users...",

                lengthMenu: "Show _MENU_",

                info: "_START_ - _END_ of _TOTAL_ users",

                infoEmpty: "No users available",

                zeroRecords: "No matching users found",

                paginate: {
                    previous: "‹",
                    next: "›"
                }

            }

        });

    });

</script>