<?php
$loggedUser = $this->session->userdata('login_user_info_all');

$profileImage = !empty($user->user_img)
    ? base_url('assets/uploads/user_img/' . $user->user_img)
    : base_url('assets/dist/img/user2-160x160.jpg');

$signatureImage = !empty($user->user_sign)
    ? base_url('assets/uploads/user_sign/' . $user->user_sign)
    : '';
?>

<style>
    .profile-page {
        background: #f0f2f5;
        padding: 25px 0 40px;
        min-height: 100vh;
    }

    .profile-container {
        max-width: 1000px;
        margin: auto;
    }

    .profile-card {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .08);
        margin-bottom: 22px;
    }

    .cover-photo {
        height: 240px;
        background: linear-gradient(120deg, #1877f2, #144e91);
        position: relative;
    }

    .cover-photo:after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(transparent, rgba(0, 0, 0, .12));
    }

    .profile-main {
        padding: 0 30px 22px;
        position: relative;
    }

    .profile-top {
        display: flex;
        align-items: flex-end;
        gap: 22px;
        margin-top: -85px;
        position: relative;
        z-index: 2;
    }

    .profile-picture-wrapper {
        position: relative;
        flex-shrink: 0;
    }

    .profile-picture {
        width: 170px;
        height: 170px;
        border-radius: 50%;
        object-fit: cover;
        border: 6px solid white;
        background: #e4e6eb;
    }

    .profile-camera {
        position: absolute;
        bottom: 12px;
        right: 8px;
        background: #e4e6eb;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        border: 2px solid white;
    }

    .profile-name {
        font-size: 29px;
        font-weight: 750;
        color: #1c1e21;
        margin-bottom: 5px;
    }

    .profile-designation {
        color: #65676b;
        font-size: 15px;
    }

    .profile-role {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        background: #e7f3ff;
        color: #1877f2;
        font-size: 12px;
        font-weight: 700;
        margin-top: 8px;
    }

    .profile-actions {
        margin-left: auto;
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .profile-btn {
        padding: 9px 16px;
        border-radius: 7px;
        font-weight: 600;
        border: none;
        text-decoration: none;
        display: inline-block;
        font-size: 13px;
    }

    .btn-blue {
        background: #1877f2;
        color: white;
    }

    .btn-gray {
        background: #e4e6eb;
        color: #1c1e21;
    }

    .profile-tabs {
        display: flex;
        gap: 30px;
        padding: 0 30px;
        border-top: 1px solid #e4e6eb;
    }

    .profile-tabs a {
        text-decoration: none;
        padding: 17px 5px;
        color: #65676b;
        font-weight: 600;
        font-size: 14px;
        border-bottom: 3px solid transparent;
    }

    .profile-tabs a.active {
        color: #1877f2;
        border-bottom-color: #1877f2;
    }

    .profile-section {
        padding: 25px;
    }

    .section-heading {
        font-size: 19px;
        font-weight: 700;
        color: #1c1e21;
        margin-bottom: 20px;
    }

    .info-box {
        background: #f7f8fa;
        padding: 15px;
        border-radius: 9px;
        margin-bottom: 12px;
        min-height: 75px;
    }

    .info-label {
        color: #65676b;
        font-size: 12px;
        margin-bottom: 5px;
    }

    .info-value {
        font-size: 15px;
        color: #1c1e21;
        font-weight: 600;
        word-break: break-word;
    }

    .signature-box {
        border: 1px dashed #cbd5e1;
        border-radius: 10px;
        padding: 18px;
        background: #fafafa;
        min-height: 120px;
    }

    .signature-box img {
        max-width: 230px;
        max-height: 90px;
        object-fit: contain;
    }

    .form-control {
        border-radius: 8px;
        min-height: 43px;
    }

    .upload-preview {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #e4e6eb;
        display: block;
        margin-bottom: 12px;
    }

    .signature-preview {
        max-width: 220px;
        max-height: 100px;
        object-fit: contain;
        display: block;
        margin-bottom: 12px;
    }


    .input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-wrapper .form-control {
        padding-left: 42px;
        padding-right: 42px;
        height: 45px;
    }

    .field-icon {
        position: absolute;
        left: 15px;
        color: #64748b;
        z-index: 2;
        font-size: 15px;
    }

    .password-toggle {
        position: absolute;
        right: 15px;
        color: #64748b;
        cursor: pointer;
        z-index: 3;
        font-size: 16px;
    }

    .password-toggle:hover {
        color: #2563eb;
    }


    @media(max-width:767px) {
        .cover-photo {
            height: 160px;
        }

        .profile-main {
            padding: 0 16px 20px;
        }

        .profile-top {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
            margin-top: -65px;
        }

        .profile-picture {
            width: 130px;
            height: 130px;
        }

        .profile-name {
            font-size: 23px;
        }

        .profile-actions {
            margin-left: 0;
        }

        .profile-tabs {
            padding: 0 15px;
            gap: 18px;
            overflow-x: auto;
        }

        .profile-section {
            padding: 18px;
        }
    }
</style>

<div class="content-wrapper">
    <div class="profile-page">
        <div class="container-fluid profile-container">

            <!-- FACEBOOK STYLE PROFILE HEADER -->
            <div class="profile-card">

                <div class="cover-photo"></div>

                <div class="profile-main">

                    <div class="profile-top">

                        <div class="profile-picture-wrapper">
                            <img src="<?= $profileImage ?>" class="profile-picture" alt="Profile Picture">

                           
                        </div>

                        <div class="flex-grow-1">
                            <h2 class="profile-name">
                                <?= html_escape($user->first_name . ' ' . $user->last_name) ?>
                            </h2>

                            <div class="profile-designation">
                                <i class="fas fa-briefcase mr-1"></i>
                                <?= html_escape($user->designation ?: 'No designation added') ?>
                            </div>

                            <span class="profile-role">
                                <i class="fas fa-user-shield mr-1"></i>
                                <?= html_escape(ucwords(str_replace('_', ' ', $user->role))) ?>
                            </span>
                        </div>

                        <div class="profile-actions">
                            <button type="button" class="profile-btn btn-blue" data-toggle="modal"
                                data-target="#editProfileModal">
                                <i class="fas fa-edit mr-1"></i> Edit Profile
                            </button>

                          
                        </div>

                    </div>
                </div>

                <div class="profile-tabs">
                    <a href="#about" class="active">About</a>
                    <a href="#signature">Signature</a>
                    <a href="#security">Security</a>
                </div>

            </div>

            <!-- ABOUT SECTION -->
            <div class="profile-card profile-section" id="about">

                <h5 class="section-heading">
                    <i class="fas fa-user-circle mr-2 text-primary"></i>
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
                                <?= html_escape($user->designation ?: 'Not added') ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-box">
                            <div class="info-label">Mobile Number</div>
                            <div class="info-value">
                                <i class="fas fa-phone text-success mr-1"></i>
                                <?= html_escape($user->mobile_number) ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-box">
                            <div class="info-label">Email Address</div>
                            <div class="info-value">
                                <?= html_escape($user->email ?: 'Not added') ?>
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

            <!-- SIGNATURE SECTION -->
            <div class="profile-card profile-section" id="signature">

                <h5 class="section-heading">
                    <i class="fas fa-signature mr-2 text-primary"></i>
                    Digital Signature
                </h5>

                <div class="signature-box">
                    <?php if ($signatureImage): ?>
                        <img src="<?= $signatureImage ?>" alt="User Signature">
                    <?php else: ?>
                        <p class="text-muted mb-0">
                            <i class="fas fa-info-circle mr-1"></i>
                            No signature uploaded yet.
                        </p>
                    <?php endif; ?>
                </div>

                <small class="text-muted d-block mt-2">
                    Your saved signature can be used in official documents.
                </small>

            </div>

            <div class="profile-card profile-section" id="security">

                <h5 class="section-heading">
                    <i class="fas fa-lock mr-2 text-primary"></i>
                    Account Security
                </h5>


                <form action="<?= base_url('change_password') ?>" method="post">

                    <div class="row">

                        <div class="form-group col-md-12">
                            <label for="current_password">Current Password</label>
                            <div class="input-wrapper">
                                <input value="<?= html_escape($user->password) ?>" type="password"
                                    name="current_password" id="current_password" class="form-control"
                                    placeholder="Enter current password" required>
                                <i class="fa fa-eye password-toggle"
                                    onclick="togglePassword('current_password', this)"></i>
                            </div>
                        </div>

                        <!-- New Password -->
                        <div class="form-group col-md-12">
                            <label for="new_password">New Password</label>
                            <div class="input-wrapper">
                                <input type="password" name="new_password" id="new_password" class="form-control"
                                    placeholder="Minimum 8 characters" minlength="8" required>
                                <i class="fa fa-eye password-toggle" onclick="togglePassword('new_password', this)"></i>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group col-md-12">
                            <label for="confirm_password">Confirm Password</label>
                            <div class="input-wrapper">
                                <input type="password" name="confirm_password" id="confirm_password"
                                    class="form-control" placeholder="Re-enter new password" minlength="8" required>
                                <i class="fa fa-eye password-toggle"
                                    onclick="togglePassword('confirm_password', this)"></i>
                            </div>
                        </div>

                    </div>

                    <div class="text-right">
                        <button type="submit" class="profile-btn btn-blue">
                            <i class="fas fa-key mr-1"></i>
                            Update Password
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

<!-- EDIT PROFILE MODAL -->
<div class="modal fade" id="editProfileModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">
                    <i class="fas fa-user-edit mr-2 text-primary"></i>
                    Edit Profile Information
                </h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <form action="<?= base_url('update_admin_profile') ?>" method="post" enctype="multipart/form-data">

                <div class="modal-body">

                    <input type="hidden" name="id" value="<?= (int) $user->id ?>">

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control"
                                value="<?= html_escape($user->first_name) ?>" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control"
                                value="<?= html_escape($user->last_name) ?>" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control"
                                value="<?= html_escape($user->username) ?>" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Mobile Number</label>
                            <input type="text" name="mobile_number" class="form-control"
                                value="<?= html_escape($user->mobile_number) ?>" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control"
                                value="<?= html_escape($user->email) ?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Designation</label>
                            <input type="text" name="designation" class="form-control"
                                value="<?= html_escape($user->designation) ?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Profile Picture</label>
                            <img src="<?= $profileImage ?>" class="upload-preview" id="profilePreview">
                            <input type="file" name="user_img" id="profile_image" class="form-control" accept="image/*">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Digital Signature</label>

                            <?php if ($signatureImage): ?>
                                <img src="<?= $signatureImage ?>" class="signature-preview" id="signaturePreview">
                            <?php else: ?>
                                <img src="" class="signature-preview" id="signaturePreview" style="display:none;">
                            <?php endif; ?>

                            <input type="file" name="user_sign" id="user_sign" class="form-control" accept="image/*">
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="profile-btn btn-gray" data-dismiss="modal">Cancel</button>

                    <button type="submit" class="profile-btn btn-blue">
                        <i class="fas fa-save mr-1"></i>
                        Save Changes
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
    document.getElementById('profile_image').addEventListener('change', function (e) {
        if (e.target.files[0]) {
            document.getElementById('profilePreview').src =
                URL.createObjectURL(e.target.files[0]);
        }
    });

    document.getElementById('user_sign').addEventListener('change', function (e) {
        if (e.target.files[0]) {
            var preview = document.getElementById('signaturePreview');
            preview.src = URL.createObjectURL(e.target.files[0]);
            preview.style.display = 'block';
        }
    });


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