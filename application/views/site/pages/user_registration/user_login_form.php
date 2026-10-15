<!-- welcome section start -->
<style>
    .row {
        margin-top: 5px;
    }

    .password-wrapper {
        position: relative;
    }
</style>

<section class="welcome" id="welcome" style="padding: 40px 0;">
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('login_failed')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('login_failed'); ?>
        </div>
    <?php endif; ?>



    <div class="container job_details">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card shadow-sm p-4">
                    <form action="<?= base_url('user_login_process'); ?>" method="post">
                        <input type="hidden" name="userType" value="2">
                        <input type="hidden" name="login_value" value="1">

                        <h1 class="text-center mb-3">User Login</h1>

                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success">
                                <?= $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif; ?>

                        <hr>

                        <!-- Mobile Number Field -->
                        <div class="mb-3 row align-items-center">
                            <label class="col-4 col-form-label">Email/Mobile No <span
                                    class="text-danger">*</span></label>
                            <div class="col-8">
                                <input type="text" name="userInfo" class="form-control" required>
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="mb-3 row align-items-center">
                            <label class="col-4 col-form-label">Password <span class="text-danger">*</span></label>
                            <div class="col-8 password-wrapper">
                                <input type="password" name="password" class="form-control" id="password" required>
                                <i class="fa fa-eye toggle-password" onclick="togglePassword('password', this)"
                                    style="position: absolute; right: 20px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #6c757d;">
                                </i>
                            </div>
                        </div>

                        <!-- Submit & Registration Links -->
                        <div class="row">
                            <div class="col-12 text-center mt-3">
                                <p class="mb-3">
                                    If you are not registered, please
                                    <a href="<?= base_url('user_registration_form'); ?>">click here</a> for
                                    registration.
                                </p>
                                <div class="text-center mt-3">
                                    <a href="<?= base_url('user_forget_password'); ?>">Forgot Password?</a>
                                </div>
                            </div>
                            <input type="submit" value="Submit" class="btn btn-info px-4">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- welcome section end -->

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