<?php

$loggedUser = $this->session->userdata('login_user_info_all');
$menu_access = $this->db
    ->select('menu_key')
    ->where('user_id', $user->id)
    ->get('user_menu_access')
    ->result_array();

$assigned_menus = array_column($menu_access, 'menu_key');
?>


<?php if ($this->session->flashdata('pass_error')): ?>
    <div class="alert-banner alert-danger-custom auto-hide-alert">
        <i class="fa fa-exclamation-circle"></i>
        <span><?php echo $this->session->flashdata('error'); ?></span>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('success')): ?>
    <div class="alert-banner alert-success-custom auto-hide-alert">
        <i class="fa fa-check-circle"></i>
        <span><?php echo $this->session->flashdata('success'); ?></span>
    </div>
<?php endif; ?>


<style>
    .user-details-page {
        padding: 25px 0 50px;
    }

    /* Page Header */
    .page-title-wrapper {
        margin-bottom: 25px;
    }

    .page-title {
        font-size: 26px;
        font-weight: 700;
        color: #1f2937;
        margin: 0;
        letter-spacing: -0.3px;
    }

    .page-subtitle {
        color: #6b7280;
        font-size: 14px;
        margin-top: 5px;
        margin-bottom: 0;
    }

    .back-btn {
        border: 1px solid #d1d5db;
        background: #fff;
        color: #374151;
        padding: 9px 16px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        transition: all .2s ease;
        text-decoration: none;
    }

    .back-btn:hover {
        background: #f3f4f6;
        color: #111827;
        border-color: #9ca3af;
    }

    /* Main Card */
    .user-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(15, 23, 42, 0.07);
    }

    .user-card-header {
        padding: 22px 26px;
        background: linear-gradient(135deg, #0d6efd, #0b5ed7);
        color: #fff;
        position: relative;
    }

    .user-card-header::after {
        content: "";
        position: absolute;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 20px solid rgba(255, 255, 255, 0.08);
        right: -35px;
        top: -45px;
    }

    .header-content {
        position: relative;
        z-index: 2;
    }

    .header-icon {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.15);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-right: 12px;
        font-size: 19px;
    }

    .user-card-header h5 {
        font-size: 17px;
        font-weight: 700;
        margin: 0;
    }

    .user-card-header p {
        margin: 4px 0 0;
        font-size: 12px;
        opacity: .8;
    }

    /* Card Body */
    .user-card-body {
        padding: 28px;
    }

    .info-section-title {
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .7px;
        color: #6b7280;
        margin-bottom: 18px;
    }

    .info-row {
        display: flex;
        align-items: center;
        min-height: 52px;
        border-bottom: 1px solid #f1f5f9;
    }

    .info-row:last-child {
        border-bottom: 0;
    }

    .info-label {
        width: 40%;
        color: #6b7280;
        font-size: 14px;
        font-weight: 500;
    }

    .info-value {
        width: 60%;
        color: #1f2937;
        font-size: 14px;
        font-weight: 600;
    }

    .mobile-number {
        color: #198754 !important;
    }

    .role-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 11px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
    }

    .role-admin {
        background: #fee2e2;
        color: #b91c1c;
    }

    .role-super-admin {
        background: #fef3c7;
        color: #92400e;
    }

    .role-user {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .section-divider {
        border: 0;
        border-top: 1px solid #e5e7eb;
        margin: 25px 0;
    }

    /* Password Section */
    .password-section {
        background: #f8fafc;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 22px;
    }

    .password-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
    }

    .password-icon {
        width: 40px;
        height: 40px;
        border-radius: 9px;
        background: #e8f0fe;
        color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
    }

    .password-header h6 {
        margin: 0;
        color: #1f2937;
        font-size: 15px;
        font-weight: 700;
    }

    .password-header p {
        margin: 3px 0 0;
        color: #6b7280;
        font-size: 12px;
    }

    .password-section .form-label {
        color: #374151;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .password-section .form-control {
        height: 45px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        padding: 10px 13px;
        font-size: 14px;
        color: #1f2937;
        background: #fff;
        transition: all .2s ease;
    }

    .password-section .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 3px rgba(13, 110, 253, .10);
    }

    .change-password-btn {
        height: 45px;
        padding: 0 20px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        border: none;
        transition: all .2s ease;
    }

    .change-password-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 5px 12px rgba(13, 110, 253, .20);
    }

    /* Alerts */
    .alert-banner {
        margin: 0 auto 20px;
        max-width: 900px;
        padding: 12px 16px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
    }

    .alert-danger-custom {
        background: #fef2f2;
        color: #b91c1c;
        border: 1px solid #fecaca;
    }

    .alert-success-custom {
        background: #f0fdf4;
        color: #15803d;
        border: 1px solid #bbf7d0;
    }

    /* Responsive */
    @media (max-width: 767px) {

        .user-details-page {
            padding: 15px 0 30px;
        }

        .page-title {
            font-size: 21px;
        }

        .d-flex.justify-content-between {
            gap: 12px;
        }

        .back-btn {
            padding: 8px 11px;
            font-size: 12px;
        }

        .user-card-body {
            padding: 20px 17px;
        }

        .user-card-header {
            padding: 18px;
        }

        .info-row {
            min-height: auto;
            padding: 11px 0;
            align-items: flex-start;
        }

        .info-label {
            width: 42%;
            font-size: 13px;
        }

        .info-value {
            width: 58%;
            font-size: 13px;
            text-align: right;
        }

        .password-section {
            padding: 17px;
        }
    }
</style>


<div class="content-wrapper">

    <div class="content-header">

        <div class="container-fluid user-details-page">

            <!-- Page Header -->
            <div class="page-title-wrapper d-flex justify-content-between align-items-center">

                <div>
                    <h2 class="page-title">
                        👤 User Details
                    </h2>

                    <p class="page-subtitle">
                        View user information and manage account password
                    </p>
                </div>

                <a href="<?= base_url('Admin/users_list') ?>" class="back-btn">
                    <i class="fa fa-arrow-left me-1"></i>
                    Back to List
                </a>

            </div>


            <div class="row">

                <div class="col-lg-7 col-md-9 mx-auto">

                    <div class="user-card">

                        <!-- Card Header -->
                        <div class="user-card-header">

                            <div class="header-content d-flex align-items-center">

                                <div class="header-icon">
                                    <i class="fa fa-user"></i>
                                </div>

                                <div>
                                    <h5>User Information</h5>
                                    <p>Account details and security settings</p>
                                </div>

                            </div>

                        </div>


                        <!-- Card Body -->
                        <div class="user-card-body">

                            <!-- User Information -->
                            <div class="info-section-title">
                                <i class="fa fa-id-card me-1"></i>
                                Personal Information
                            </div>


                            <div class="info-row">

                                <div class="info-label">
                                    User Name
                                </div>

                                <div class="info-value">
                                    <?= $user->username ?>
                                </div>

                            </div>


                            <div class="info-row">

                                <div class="info-label">
                                    First Name
                                </div>

                                <div class="info-value">
                                    <?= $user->first_name ?>
                                </div>

                            </div>


                            <div class="info-row">

                                <div class="info-label">
                                    Last Name
                                </div>

                                <div class="info-value">
                                    <?= $user->last_name ?>
                                </div>

                            </div>


                            <div class="info-row">

                                <div class="info-label">
                                    Designation
                                </div>

                                <div class="info-value">
                                    <?= $user->designation ?>
                                </div>

                            </div>


                            <div class="info-row">

                                <div class="info-label">
                                    Contact
                                </div>

                                <div class="info-value mobile-number">
                                    <i class="fa fa-phone me-1"></i>
                                    <?= $user->mobile_number ?>
                                </div>

                            </div>


                            <div class="info-row">

                                <div class="info-label">
                                    Role
                                </div>

                                <div class="info-value">

                                    <?php if ($user->role == 'admin'): ?>

                                        <span class="role-badge role-admin">
                                            <i class="fa fa-shield"></i>
                                            Admin
                                        </span>

                                    <?php elseif ($user->role == 'super_admin'): ?>

                                        <span class="role-badge role-super-admin">
                                            <i class="fa fa-star"></i>
                                            Super Admin
                                        </span>

                                    <?php else: ?>

                                        <span class="role-badge role-user">
                                            <i class="fa fa-user"></i>
                                            User
                                        </span>

                                    <?php endif; ?>

                                </div>

                            </div>


                            <hr class="section-divider">


                            <!-- Change Password -->
                            <div class="password-section">

                                <div class="password-header">

                                    <div class="password-icon">
                                        <i class="fa fa-lock"></i>
                                    </div>

                                    <div>
                                        <h6>Change Password</h6>
                                        <p>Update the password for this account</p>
                                    </div>

                                </div>


                                <form action="<?= base_url('change_password'); ?>" method="post">

                                    <div class="mb-3">

                                        <label for="current_password" class="form-label">
                                            Current Password
                                        </label>

                                        <input
                                            type="password"
                                            class="form-control"
                                            id="current_password"
                                            name="current_password"
                                            placeholder="Enter current password"
                                            required>
                                            <i class="fa fa-eye password-toggle" onclick="togglePassword('current_password', this)"></i>

                                    </div>


                                    <div class="mb-3">

                                        <label for="new_password" class="form-label">
                                            New Password
                                        </label>

                                        <input
                                            type="password"
                                            class="form-control"
                                            id="new_password"
                                            name="new_password"
                                            placeholder="Enter new password"
                                            required>
                                            <i class="fa fa-eye password-toggle" onclick="togglePassword('new_password', this)"></i>

                                    </div>


                                    <div class="mb-3">

                                        <label for="confirm_password" class="form-label">
                                            Confirm New Password
                                        </label>

                                        <input
                                            type="password"
                                            class="form-control"
                                            id="confirm_password"
                                            name="confirm_password"
                                            placeholder="Confirm new password"
                                            required>
                                            <i class="fa fa-eye password-toggle" onclick="togglePassword('confirm_password', this)"></i>

                                    </div>


                                    <div class="text-end pt-2">

                                        <button
                                            type="submit"
                                            class="btn btn-primary change-password-btn">

                                            <i class="fa fa-key me-1"></i>
                                            Change Password

                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>




<script>
    function togglePassword(fieldId, icon) {
        var input = document.getElementById(fieldId);

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>
<script>
    setTimeout(function () {
        const alerts = document.querySelectorAll('.auto-hide-alert');

        alerts.forEach(function (alert) {
            alert.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-10px)';

            setTimeout(function () {
                alert.remove();
            }, 500);
        });
    }, 3000); // 3 seconds
</script>





