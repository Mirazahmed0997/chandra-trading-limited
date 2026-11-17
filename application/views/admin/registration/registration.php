
<?php if ($this->session->flashdata('users_reg_error')): ?>
    <div class="user-alert alert-danger">
        <i class="fa fa-exclamation-circle"></i>
        <?= $this->session->flashdata('users_reg_error'); ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('reg_error')): ?>
    <div class="user-alert alert-danger">
        <i class="fa fa-exclamation-circle"></i>
        <?= $this->session->flashdata('reg_error'); ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('success')): ?>
    <div class="user-alert alert-success">
        <i class="fa fa-check-circle"></i>
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<style>
    .user-create-page {
        --user-primary: #2563eb;
        --user-primary-dark: #1d4ed8;
        --user-text: #1e293b;
        --user-muted: #64748b;
        --user-border: #e2e8f0;
        color: var(--user-text);
        padding: 10px 0 25px;
    }

    .user-create-page * {
        box-sizing: border-box;
    }

    .user-create-page .page-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        margin-bottom: 22px;
    }

    .user-create-page .heading-left {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .user-create-page .heading-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        background: #eff6ff;
        color: var(--user-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }

    .user-create-page .page-heading h3 {
        font-size: 22px;
        font-weight: 700;
        margin: 0 0 5px;
        color: var(--user-text);
    }

    .user-create-page .page-heading p {
        margin: 0;
        color: var(--user-muted);
        font-size: 13px;
    }

    .user-create-page .form-card {
        background: #fff;
        border: 1px solid var(--user-border);
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 18px rgba(15, 23, 42, .04);
    }

    .user-create-page .card-top {
        padding: 20px 25px;
        border-bottom: 1px solid var(--user-border);
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .user-create-page .card-top i {
        color: var(--user-primary);
        font-size: 18px;
    }

    .user-create-page .card-top h4 {
        font-size: 16px;
        font-weight: 700;
        margin: 0 0 4px;
    }

    .user-create-page .card-top p {
        font-size: 12px;
        color: var(--user-muted);
        margin: 0;
    }

    .user-create-page .card-body {
        padding: 25px;
    }

    .user-create-page .section-title {
        display: flex;
        align-items: center;
        gap: 9px;
        font-size: 14px;
        font-weight: 700;
        color: #334155;
        margin: 4px 0 20px;
        padding-bottom: 12px;
        border-bottom: 1px solid #f1f5f9;
    }

    .user-create-page .section-title i {
        color: var(--user-primary);
    }

    .user-create-page .form-group {
        margin-bottom: 20px;
    }

    .user-create-page .form-group label {
        display: block;
        color: #334155;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .user-create-page .required {
        color: #dc2626;
    }

    .user-create-page .input-wrap {
        position: relative;
    }

    .user-create-page .input-wrap > .field-icon {
        position: absolute;
        left: 13px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 14px;
        z-index: 2;
        pointer-events: none;
    }

    .user-create-page .form-control {
        height: 44px;
        width: 100%;
        border: 1px solid #dbe2ea;
        border-radius: 8px;
        padding: 10px 13px 10px 39px;
        font-size: 13px;
        color: #1e293b;
        box-shadow: none;
        background-color: #fff;
        transition: .2s ease;
    }

    .user-create-page .form-control:focus {
        border-color: var(--user-primary);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, .10);
        outline: none;
    }

    .user-create-page select.form-control {
        cursor: pointer;
    }

    .user-create-page .password-toggle {
        position: absolute;
        right: 13px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        cursor: pointer;
        z-index: 3;
    }

    .user-create-page .password-input {
        padding-right: 42px;
    }

    .user-create-page .help-text {
        display: block;
        margin-top: 7px;
        color: #94a3b8;
        font-size: 11px;
    }

    .user-create-page .upload-box {
        border: 1px dashed #93b4ef;
        border-radius: 10px;
        background: #f8fbff;
        padding: 15px;
        min-height: 100px;
        display: flex;
        align-items: center;
        gap: 14px;
        cursor: pointer;
        transition: .2s ease;
    }

    .user-create-page .upload-box:hover {
        border-color: var(--user-primary);
        background: #eff6ff;
    }

    .user-create-page .upload-icon {
        width: 43px;
        height: 43px;
        flex-shrink: 0;
        background: #dbeafe;
        color: var(--user-primary);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    .user-create-page .upload-text strong {
        display: block;
        font-size: 13px;
        color: #334155;
        margin-bottom: 5px;
    }

    .user-create-page .upload-text span {
        font-size: 11px;
        color: var(--user-muted);
        overflow-wrap: anywhere;
    }

    .user-create-page .upload-input {
        display: none;
    }

    .user-create-page .form-footer {
        padding: 18px 25px;
        background: #f8fafc;
        border-top: 1px solid var(--user-border);
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .user-create-page .btn-user {
        border: 0;
        border-radius: 8px;
        padding: 11px 20px;
        font-size: 13px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        cursor: pointer;
        transition: .2s ease;
    }

    .user-create-page .btn-submit {
        background: var(--user-primary);
        color: #fff;
    }

    .user-create-page .btn-submit:hover {
        background: var(--user-primary-dark);
        color: #fff;
    }

    .user-create-page .btn-reset {
        background: #fff;
        color: #475569;
        border: 1px solid #dbe2ea;
    }

    .user-create-page .btn-reset:hover {
        background: #f1f5f9;
    }

    .user-alert {
        padding: 13px 16px;
        border-radius: 8px;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 13px;
    }

    .user-alert.alert-danger {
        color: #991b1b;
        background: #fef2f2;
        border: 1px solid #fecaca;
    }

    .user-alert.alert-success {
        color: #065f46;
        background: #ecfdf5;
        border: 1px solid #a7f3d0;
    }

    @media(max-width: 767px) {
        .user-create-page .page-heading {
            align-items: flex-start;
        }

        .user-create-page .card-body {
            padding: 18px;
        }

        .user-create-page .card-top {
            padding: 17px 18px;
        }

        .user-create-page .form-footer {
            padding: 15px 18px;
            flex-direction: column-reverse;
        }

        .user-create-page .btn-user {
            width: 100%;
        }
    }
</style>

<div class="content-wrapper user-create-page">

    <!-- Page Heading -->
    <div class="page-heading">
        <div class="heading-left">
            <div class="heading-icon">
                <i class="fa fa-user-plus"></i>
            </div>
            <div>
                <h3>Create New User</h3>
                <p>Register a new system user and assign their account information.</p>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="form-card">

        <div class="card-top">
            <i class="fa fa-id-card"></i>
            <div>
                <h4>User Registration Information</h4>
                <p>Enter the required information to create a new account.</p>
            </div>
        </div>

        <form action="<?= base_url('admin_registration'); ?>"
              method="post"
              enctype="multipart/form-data"
              onsubmit="return validatePassword();">

            <div class="card-body">

                <!-- Personal Information -->
                <div class="section-title">
                    <i class="fa fa-user"></i>
                    Personal Information
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">First Name <span class="required">*</span></label>
                            <div class="input-wrap">
                                <i class="fa fa-user field-icon"></i>
                                <input type="text" id="first_name" name="first_name"
                                       class="form-control" placeholder="Enter first name" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last_name">Last Name <span class="required">*</span></label>
                            <div class="input-wrap">
                                <i class="fa fa-user field-icon"></i>
                                <input type="text" id="last_name" name="last_name"
                                       class="form-control" placeholder="Enter last name" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Username <span class="required">*</span></label>
                            <div class="input-wrap">
                                <i class="fa fa-at field-icon"></i>
                                <input type="text" id="username" name="username"
                                       class="form-control" placeholder="Enter username" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email Address <span class="required">*</span></label>
                            <div class="input-wrap">
                                <i class="fa fa-envelope field-icon"></i>
                                <input type="email" id="email" name="email"
                                       class="form-control" placeholder="example@email.com" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile_number">Mobile Number <span class="required">*</span></label>
                            <div class="input-wrap">
                                <i class="fa fa-phone field-icon"></i>
                                <input type="tel" id="mobile_number" name="mobile_number"
                                       class="form-control" placeholder="+880 1700-000000" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="designation">Designation <span class="required">*</span></label>
                            <div class="input-wrap">
                                <i class="fa fa-briefcase field-icon"></i>
                                <select id="designation" name="designation" class="form-control" required>
                                    <option value="" disabled selected>Select Designation</option>
                                    <option value="Chairman">Chairman</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Staff">Staff</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Account Information -->
                <div class="section-title" style="margin-top:15px;">
                    <i class="fa fa-shield"></i>
                    Account & Access Information
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="role">Role <span class="required">*</span></label>
                            <div class="input-wrap">
                                <i class="fa fa-users field-icon"></i>
                                <select id="role" name="role" class="form-control" required>
                                    <option value="" disabled selected>Select Role</option>
                                    <option value="operator">Operator</option>
                                    <option value="admin">Admin</option>
                                    <option value="super Admin">Super Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="attachment">Authorized Signature</label>

                            <label for="attachment" class="upload-box">
                                <div class="upload-icon">
                                    <i class="fa fa-cloud-upload"></i>
                                </div>
                                <div class="upload-text">
                                    <strong>Choose signature image</strong>
                                    <span id="signatureFileName">JPG or PNG image</span>
                                </div>
                            </label>

                            <input type="file" name="user_sign" id="attachment"
                                   class="upload-input" accept=".jpg,.jpeg,.png,image/jpeg,image/png">

                            <small class="help-text">Allowed formats: JPG, JPEG and PNG.</small>
                        </div>
                    </div>
                   

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password <span class="required">*</span></label>
                            <div class="input-wrap">
                                <i class="fa fa-lock field-icon"></i>
                                <input type="password" name="password" id="password"
                                       class="form-control password-input"
                                       placeholder="Minimum 8 characters" minlength="8" required>
                                <i class="fa fa-eye password-toggle"
                                   onclick="togglePassword('password', this)"></i>
                            </div>
                            <small class="help-text">Password must contain at least 8 characters.</small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password <span class="required">*</span></label>
                            <div class="input-wrap">
                                <i class="fa fa-lock field-icon"></i>
                                <input type="password" name="confirm_password" id="confirm_password"
                                       class="form-control password-input"
                                       placeholder="Re-enter password" minlength="8" required>
                                <i class="fa fa-eye password-toggle"
                                   onclick="togglePassword('confirm_password', this)"></i>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Form Footer -->
            <div class="form-footer">

                <button type="reset" class="btn-user btn-reset" onclick="resetSignatureName();">
                    <i class="fa fa-refresh"></i>
                    Reset Form
                </button>

                <button type="submit" class="btn-user btn-submit">
                    <i class="fa fa-user-plus"></i>
                    Register User
                </button>

            </div>

        </form>
    </div>
</div>

<script>
    function validatePassword() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm_password").value;

        if (password.length < 8) {
            alert("Password must be at least 8 characters long.");
            return false;
        }

        if (password !== confirmPassword) {
            alert("Password and confirm password do not match.");
            document.getElementById("confirm_password").focus();
            return false;
        }

        return true;
    }

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

    document.getElementById("attachment").addEventListener("change", function () {
        var fileName = this.files.length ? this.files[0].name : "JPG or PNG image";
        document.getElementById("signatureFileName").textContent = fileName;
    });

    function resetSignatureName() {
        setTimeout(function () {
            document.getElementById("signatureFileName").textContent = "JPG or PNG image";
        }, 0);
    }

    // Automatically hide alerts after 5 seconds
    setTimeout(function () {
        document.querySelectorAll('.user-alert').forEach(function (alert) {
            alert.style.transition = "opacity .5s ease";
            alert.style.opacity = "0";

            setTimeout(function () {
                alert.remove();
            }, 500);
        });
    }, 5000);
</script>
