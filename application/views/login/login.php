<link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

<style>
    .login {
        font-family: 'Hind Siliguri', 'Noto Sans Bengali', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        background: #4e5052;
    }

    .card-header,
    .btn {
        background-color: #212529 !important;
    }
</style>

<div class="container-fluid">

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <div class="login row justify-content-center ">
        <div class="col-md-5">

            <div class="card card-primary shadow mt-4">

                <div class="card-header text-center">
                    <h3 class="card-title">
                        <i class="fas fa-user-shield"></i> Login Panel
                    </h3>
                </div>

                <div class="card-body">

                    <form action="<?php echo base_url('Admin_login/login_process'); ?>" method="post">

                        <input type="hidden" name="userType" value="1">

                        <div class="form-group">
                            <label>User Name / Mobile Number</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                                <input type="text" name="mobile_number" class="form-control"
                                    placeholder="ইউজার নাম / মোবাইল নাম্বার" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="পাসওয়ার্ড" required>
                                <i class="fa fa-eye" onclick="togglePassword('password', this)"
                                    style="position:absolute; right:10px; top:10px; cursor:pointer;">
                                </i>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">
                            Login
                        </button>

                    </form>

                    <div class="text-center mt-3">
                        <a href="<?= base_url('forget_password'); ?>">Forgot Password?</a>
                    </div>

                    <!-- <div class="text-center mt-2">
                        <p>
                            Click here
                            <a href="<?php echo base_url('admin_registration_form'); ?>">
                                to registration
                            </a>
                        </p>
                    </div> -->

                    <div class="text-center mt-2">
                        <a href="<?php echo base_url(); ?>">
                            <i class="fas fa-arrow-left"></i> Go back to the Home page
                        </a>
                    </div>

                    <!-- <div class="text-center mt-3">
                        <a href="<?php base_url('Auth/google_login_process'); ?>" class="btn btn-outline-danger w-100 py-2 fw-semibold">
                            <i class="bi bi-google me-2"></i>
                            Continue with Google
                        </a>
                    </div> -->

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