<?php
$loggedUser = $this->session->userdata('login_user_info_all');

$menu_access = $this->db
    ->select('menu_key')
    ->where('user_id', $user->id)
    ->get('user_menu_access')
    ->result_array();

$assigned_menus = array_column($menu_access, 'menu_key');

$available_menus = [
    'Properties' => ["Our Properties", "Add new Properties"],
    'Projects' => ["Our Projects", "Add new Project"],
    'Client' => [],
    'Transaction' => [],
    'Account' => [
        'Account Head Management',
        'Project Deposit Vouchar',
        'Project Expense Vouchar',
        'Office Expense Managment',
        'Pending Vouchars'
    ],
    'Communication & Messages' => [
        "Landowner Enquiries",
        "General Enquiries",
        "Investment Enquiries",
        "Bookings"
    ],
    'Promotional Publications' => [],
    'Leave Applications' => ['Applications List'],
    'Reporting' => [],
    'Staff' => ['Staff list', 'Joining Letter'],
    'Job Portal' => [
        "Accepted List",
        "Pending Applications",
        "Rejected Applications"
    ],
    'Site Visits' => [],
    'Customers' => [],
    'News Management' => [],
    'Gallery' => [],
    'Team' => [],
    'Testimonials' => [],
    'Documents' => [],
    'Share Holder Managment' => ['Share Holder Application', 'Pending Share Holder'],
    'Settings' => ['Set Attendence', 'Set Holidays'],
    'User Management' => ['Add new User', 'User']
];

$profileImage = !empty($user->user_img)
    ? base_url('assets/uploads/user_img/' . $loggedUser->user_img)
    : base_url('assets/dist/img/user2-160x160.jpg');

$signatureImage = !empty($loggedUser->user_sign)
    ? base_url('assets/uploads/user_sign/' . $user->user_sign)
    : '';

$fullName = trim($user->first_name . ' ' . $user->last_name);
?>
<style>
    .user-profile-page {
        background: #f0f2f5;
        min-height: 100vh;
        padding: 25px 0 40px;
    }

    .profile-container {
        max-width: 1100px;
        margin: auto;
    }

    .profile-card {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .07);
        margin-bottom: 22px;
    }

    .profile-cover {
        height: 230px;
        background: linear-gradient(120deg, #123c69, #1877f2, #65a9ee);
        position: relative;
        overflow: hidden;
    }

    .profile-cover:before {
        content: "";
        position: absolute;
        width: 300px;
        height: 300px;
        border: 45px solid rgba(255, 255, 255, .08);
        border-radius: 50%;
        right: 8%;
        top: -150px;
    }

    .profile-cover:after {
        content: "";
        position: absolute;
        width: 200px;
        height: 200px;
        border: 35px solid rgba(255, 255, 255, .07);
        border-radius: 50%;
        right: 35%;
        bottom: -150px;
    }

    .profile-details {
        padding: 0 30px 20px;
    }

    .profile-main {
        display: flex;
        align-items: flex-end;
        gap: 22px;
        margin-top: -82px;
        position: relative;
        z-index: 2;
    }

    .profile-image-wrapper {
        position: relative;
        flex-shrink: 0;
    }

    .profile-image {
        width: 165px;
        height: 165px;
        border-radius: 50%;
        object-fit: cover;
        background: #e4e6eb;
        border: 6px solid #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .12);
    }

    .profile-image-edit {
        position: absolute;
        right: 8px;
        bottom: 12px;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #e4e6eb;
        border: 2px solid #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        color: #333;
    }

    .profile-user-name {
        font-size: 28px;
        font-weight: 750;
        color: #1c1e21;
        margin-bottom: 5px;
    }

    .profile-username {
        font-size: 14px;
        color: #65676b;
    }

    .profile-designation {
        color: #65676b;
        font-size: 14px;
        margin-top: 5px;
    }

    .profile-role {
        display: inline-block;
        padding: 5px 13px;
        background: #e7f3ff;
        color: #1877f2;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        margin-top: 8px;
    }

    .profile-actions {
        margin-left: auto;
        padding-bottom: 8px;
    }


    .profile-btn {
        border: none;
        border-radius: 7px;
        padding: 10px 17px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none !important;
        display: inline-block;
        cursor: pointer;
    }

    .profile-btn-primary {
        background: #1877f2;
        color: #fff !important;
    }

    .profile-btn-secondary {
        background: #e4e6eb;
        color: #1c1e21 !important;
    }

    .profile-tabs {
        display: flex;
        gap: 28px;
        border-top: 1px solid #e4e6eb;
        padding: 0 30px;
        margin-top: 22px;
    }

    .profile-tabs a {
        padding: 16px 5px;
        color: #65676b;
        font-weight: 600;
        font-size: 14px;
        text-decoration: none !important;
        border-bottom: 3px solid transparent;
    }

    .profile-tabs a.active,
    .profile-tabs a:hover {
        color: #1877f2;
        border-bottom-color: #1877f2;
    }

    /* Content Cards */
    .content-card {
        background: #fff;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .06);
        margin-bottom: 22px;
    }

    .content-heading {
        font-size: 18px;
        font-weight: 700;
        color: #1c1e21;
        margin-bottom: 20px;
    }

    .content-heading i {
        color: #1877f2;
        margin-right: 8px;
    }

    .info-box {
        background: #f7f8fa;
        border-radius: 9px;
        padding: 15px;
        margin-bottom: 14px;
        min-height: 78px;
    }

    .info-label {
        color: #65676b;
        font-size: 12px;
        margin-bottom: 7px;
    }

    .info-value {
        color: #1c1e21;
        font-size: 14px;
        font-weight: 600;
        word-break: break-word;
    }

    .signature-container {
        background: #f8f9fa;
        border: 1px dashed #cbd5e1;
        border-radius: 10px;
        padding: 20px;
        min-height: 135px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .signature-container img {
        max-width: 250px;
        max-height: 100px;
        object-fit: contain;
    }

    .signature-empty {
        color: #9ca3af;
        text-align: center;
    }

    .permission-card {
        border: 1px solid #e5e7eb;
        border-radius: 9px;
        padding: 15px;
        background: #fff;
        transition: .2s;
        margin-bottom: 12px;
    }

    .permission-card:hover {
        border-color: #1877f2;
        background: #f8fbff;
    }

    .permission-parent {
        font-weight: 700;
        color: #1c1e21;
        cursor: pointer;
        margin-bottom: 0;
        font-size: 14px;
    }

    .permission-submenus {
        border-top: 1px solid #eee;
        margin-top: 12px;
        padding-top: 12px;
    }

    .permission-submenus label {
        color: #65676b;
        font-size: 12px;
        cursor: pointer;
        margin-bottom: 9px;
    }

    .permission-card input {
        cursor: pointer;
    }

    .profile-modal-label {
        font-size: 13px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 7px;
    }

    .profile-modal-input {
        height: 43px;
        border-radius: 7px;
        font-size: 13px;
    }

    .preview-profile {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #e5e7eb;
        margin-bottom: 10px;
    }

    .preview-signature {
        max-width: 220px;
        max-height: 90px;
        display: block;
        margin-bottom: 10px;
        object-fit: contain;
    }

    @media(max-width:767px) {
        .profile-cover {
            height: 160px;
        }

        .profile-details {
            padding: 0 16px 18px;
        }

        .profile-main {
            flex-direction: column;
            align-items: flex-start;
            margin-top: -65px;
            gap: 10px;
        }

        .profile-image {
            width: 130px;
            height: 130px;
        }

        .profile-user-name {
            font-size: 22px;
        }

        .profile-actions {
            margin-left: 0;
            padding: 8px 0;
        }

        .profile-tabs {
            padding: 0 15px;
            gap: 18px;
            overflow-x: auto;
        }

        .content-card {
            padding: 17px;
        }
    }
</style>

<div class="content-wrapper">

    <div class="user-profile-page">
        <div class="container-fluid profile-container">

            <div class="profile-card">

                <div class="profile-cover"></div>

                <div class="profile-details">

                    <div class="profile-main">

                        <div class="profile-image-wrapper">

                            <img src="<?= $profileImage ?>" class="profile-image" id="mainProfileImage"
                                alt="User Profile">



                        </div>

                        <div class="flex-grow-1">

                            <h2 class="profile-user-name">
                                <?= html_escape($fullName) ?>
                            </h2>

                            <div class="profile-username">
                                <i class="fas fa-at"></i>
                                <?= html_escape($user->username) ?>
                            </div>

                            <div class="profile-designation">
                                <i class="fas fa-briefcase mr-1"></i>
                                <?= html_escape($user->designation ?: 'Designation not added') ?>
                            </div>

                            <span class="profile-role">
                                <i class="fas fa-user-shield mr-1"></i>
                                <?= html_escape(ucwords(str_replace('_', ' ', $user->role))) ?>
                            </span>

                        </div>



                    </div>

                </div>

                <div class="profile-tabs">
                    <a href="#about" class="active">About</a>
                    <a href="#signature">Signature</a>

                    <?php if ($loggedUser->role == 'super_admin'): ?>
                        <a href="#permissions">Menu Permissions</a>
                    <?php endif; ?>
                </div>

            </div>


            <!-- PERSONAL INFORMATION -->
            <div class="content-card" id="about">

                <h5 class="content-heading">
                    <i class="fas fa-user-circle"></i>
                    Personal Information
                </h5>

                <div class="row">

                    <div class="col-md-6">
                        <div class="info-box">
                            <div class="info-label">First Name</div>
                            <div class="info-value">
                                <?= html_escape($user->first_name) ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-box">
                            <div class="info-label">Last Name</div>
                            <div class="info-value">
                                <?= html_escape($user->last_name) ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-box">
                            <div class="info-label">Username</div>
                            <div class="info-value">
                                <?= html_escape($user->username) ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-box">
                            <div class="info-label">Designation</div>
                            <div class="info-value">
                                <?= html_escape($user->designation ?: 'N/A') ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-box">
                            <div class="info-label">Mobile Number</div>
                            <div class="info-value text-success">
                                <i class="fas fa-phone mr-1"></i>
                                <?= html_escape($user->mobile_number ?: 'N/A') ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-box">
                            <div class="info-label">Email Address</div>
                            <div class="info-value">
                                <i class="fas fa-envelope mr-1 text-primary"></i>
                                <?= html_escape($user->email ?: 'N/A') ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-box">
                            <div class="info-label">Account Role</div>
                            <div class="info-value">
                                <?= html_escape(ucwords(str_replace('_', ' ', $user->role))) ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-box">
                            <div class="info-label">Account Created</div>
                            <div class="info-value">
                                <?= !empty($user->created_at)
                                    ? date('d M Y', strtotime($user->created_at))
                                    : 'N/A' ?>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


            <!-- DIGITAL SIGNATURE -->
            <div class="content-card" id="signature">

                <h5 class="content-heading">
                    <i class="fas fa-signature"></i>
                    Digital Signature
                </h5>

                <div class="signature-container">

                    <?php if ($signatureImage): ?>

                        <img src="<?= $signatureImage ?>" alt="User Digital Signature">

                    <?php else: ?>

                        <div class="signature-empty">
                            <i class="fas fa-signature fa-2x mb-2"></i>
                            <p class="mb-0">No digital signature uploaded.</p>
                        </div>

                    <?php endif; ?>

                </div>

                <small class="text-muted d-block mt-3">
                    <i class="fas fa-info-circle mr-1"></i>
                    This signature can be used in official documents and letters.
                </small>

            </div>


            <!-- MENU PERMISSIONS -->
            <?php if ($loggedUser->role == 'super_admin'): ?>

                <div class="content-card" id="permissions">

                    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">

                        <h5 class="content-heading mb-0">
                            <i class="fas fa-user-lock"></i>
                            Menu Access Permissions
                        </h5>

                        <span class="badge badge-primary px-3 py-2">
                            Super Admin Only
                        </span>

                    </div>

                    <form action="<?= base_url('menu_access/' . $user->id); ?>" method="post">

                        <div class="row">

                            <?php $index = 0; ?>

                            <?php foreach ($available_menus as $parent_menu => $sub_menus): ?>

                                <?php
                                $parent_name = $parent_menu;
                                $has_submenus = !empty($sub_menus);
                                $parent_id = 'menu_check_' . $index++;
                                ?>

                                <div class="col-md-6">

                                    <div class="permission-card">

                                        <div class="custom-control custom-checkbox">

                                            <input type="checkbox" class="custom-control-input parent-checkbox"
                                                id="<?= $parent_id ?>" name="menus[]" value="<?= html_escape($parent_name) ?>"
                                                <?= in_array($parent_name, $assigned_menus) ? 'checked' : '' ?>>

                                            <label class="custom-control-label permission-parent" for="<?= $parent_id ?>">
                                                <?= html_escape($parent_name) ?>
                                            </label>

                                        </div>

                                        <?php if ($has_submenus): ?>

                                            <div class="row permission-submenus">

                                                <?php foreach ($sub_menus as $sub_index => $sub_menu): ?>

                                                    <?php $sub_id = $parent_id . '_sub_' . $sub_index; ?>

                                                    <div class="col-sm-6">

                                                        <div class="custom-control custom-checkbox">

                                                            <input type="checkbox" class="custom-control-input sub-checkbox"
                                                                id="<?= $sub_id ?>" name="menus[]" value="<?= html_escape($sub_menu) ?>"
                                                                <?= in_array($sub_menu, $assigned_menus) ? 'checked' : '' ?>>

                                                            <label class="custom-control-label" for="<?= $sub_id ?>">
                                                                <?= html_escape($sub_menu) ?>
                                                            </label>

                                                        </div>

                                                    </div>

                                                <?php endforeach; ?>

                                            </div>

                                        <?php endif; ?>

                                    </div>

                                </div>

                            <?php endforeach; ?>

                        </div>

                        <div class="text-right mt-3">

                            <button type="submit" class="profile-btn profile-btn-primary">
                                <i class="fas fa-save mr-1"></i>
                                Save Access Permissions
                            </button>

                        </div>

                    </form>

                </div>

            <?php endif; ?>

        </div>
    </div>
</div>


<div class="modal fade" id="editProfileModal" tabindex="-1">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title font-weight-bold">
                    <i class="fas fa-user-edit text-primary mr-2"></i>
                    Edit User Profile
                </h5>

                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>

            </div>

            <form action="<?= base_url('update_user_profile') ?>" method="post" enctype="multipart/form-data">

                <div class="modal-body">

                    <input type="hidden" name="id" value="<?= (int) $user->id ?>">

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="profile-modal-label">First Name</label>
                            <input type="text" name="first_name" class="form-control profile-modal-input"
                                value="<?= html_escape($user->first_name) ?>" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="profile-modal-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control profile-modal-input"
                                value="<?= html_escape($user->last_name) ?>" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="profile-modal-label">Username</label>
                            <input type="text" name="username" class="form-control profile-modal-input"
                                value="<?= html_escape($user->username) ?>" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="profile-modal-label">Mobile Number</label>
                            <input type="text" name="mobile_number" class="form-control profile-modal-input"
                                value="<?= html_escape($user->mobile_number) ?>" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="profile-modal-label">Email</label>
                            <input type="email" name="email" class="form-control profile-modal-input"
                                value="<?= html_escape($user->email) ?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="profile-modal-label">Designation</label>
                            <input type="text" name="designation" class="form-control profile-modal-input"
                                value="<?= html_escape($user->designation) ?>">
                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="profile-modal-label">Profile Picture</label>

                            <img src="<?= $profileImage ?>" id="profilePreview" class="preview-profile">

                            <input type="file" name="user_img" id="profile_image" class="form-control"
                                accept="image/jpeg,image/png,image/webp">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="profile-modal-label">Digital Signature</label>

                            <?php if ($signatureImage): ?>

                                <img src="<?= $signatureImage ?>" id="signaturePreview" class="preview-signature">

                            <?php else: ?>

                                <img src="" id="signaturePreview" class="preview-signature" style="display:none;">

                            <?php endif; ?>

                            <input type="file" name="user_sign" id="user_sign" class="form-control"
                                accept="image/jpeg,image/png,image/webp">

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="profile-btn profile-btn-secondary" data-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit" class="profile-btn profile-btn-primary">
                        <i class="fas fa-save mr-1"></i>
                        Update Profile
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<script>
    // Profile image preview
    document.getElementById('profile_image').addEventListener('change', function (e) {

        if (e.target.files && e.target.files[0]) {

            var imageUrl = URL.createObjectURL(e.target.files[0]);

            document.getElementById('profilePreview').src = imageUrl;
            document.getElementById('mainProfileImage').src = imageUrl;
        }

    });

    // Signature preview
    document.getElementById('user_sign').addEventListener('change', function (e) {

        if (e.target.files && e.target.files[0]) {

            var preview = document.getElementById('signaturePreview');

            preview.src = URL.createObjectURL(e.target.files[0]);
            preview.style.display = 'block';
        }

    });

    // Menu checkbox handling
    document.querySelectorAll('.parent-checkbox').forEach(function (parent) {

        parent.addEventListener('change', function () {

            var card = this.closest('.permission-card');

            card.querySelectorAll('.sub-checkbox').forEach(function (sub) {
                sub.checked = parent.checked;
            });

        });

    });

    document.querySelectorAll('.sub-checkbox').forEach(function (sub) {

        sub.addEventListener('change', function () {

            var card = this.closest('.permission-card');
            var parent = card.querySelector('.parent-checkbox');

            var allSubs = card.querySelectorAll('.sub-checkbox');
            var checkedSubs = card.querySelectorAll('.sub-checkbox:checked');

            parent.checked = checkedSubs.length > 0;
            parent.indeterminate =
                checkedSubs.length > 0 &&
                checkedSubs.length < allSubs.length;

        });

    });

    document.querySelectorAll('.profile-tabs a').forEach(function (tab) {

        tab.addEventListener('click', function () {

            document.querySelectorAll('.profile-tabs a').forEach(function (item) {
                item.classList.remove('active');
            });

            this.classList.add('active');

        });

    });
</script>