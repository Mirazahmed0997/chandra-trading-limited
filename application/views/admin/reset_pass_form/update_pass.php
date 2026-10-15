<div class="container py-5">

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger text-center">
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success text-center">
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-10 col-12">

            <div class="card ">



                <div class="card-body p-4">

                    <form action="<?php echo base_url('update_new_password'); ?>" method="post">

                        <input type="hidden" name="token" value="<?= $token ?>">

                        <div class="section-title">লগইন পাসওয়ার্ড সেট করুন :</div>

                        <div class="grid">
                            <div class="form-group">
                                <label>পাসওয়ার্ড</label>
                                <div style="position:relative;">
                                    <input type="password" name="password" id="password" class="form-control">

                                    <i class="fa fa-eye" onclick="togglePassword('password', this)"
                                        style="position:absolute; right:10px; top:10px; cursor:pointer;">
                                    </i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>কন্ফার্ম পাসওয়ার্ড</label>
                                <div style="position:relative;">
                                    <input type="password" name="confirm_password" id="confirm_password"
                                        class="form-control">

                                    <i class="fa fa-eye" onclick="togglePassword('confirm_password', this)"
                                        style="position:absolute; right:10px; top:10px; cursor:pointer;">
                                    </i>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success w-100">

                            <i class="fas fa-save me-1"></i>
                            Update Password

                        </button>

                    </form>

                    <div class="text-center mt-4">



                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<style>
    .card {
        border-radius: 16px;
    }

    .form-control {
        height: 48px;
        border-radius: 10px;
    }

    .btn {
        height: 48px;
        border-radius: 10px;
        font-weight: 600;
    }

    @media(max-width: 576px) {

        .card-body {
            padding: 20px;
        }

        .container {
            padding-top: 20px !important;
            padding-bottom: 20px !important;
        }
    }
</style>

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



    function validatePassword() {

        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm_password").value;

        if (password.length < 8) {
            alert("পাসওয়ার্ড কমপক্ষে ৮ ডিজিট হতে হবে");
            return false;
        }
        if (password !== confirmPassword) {
            alert("পাসওয়ার্ড মিলছে না!");
            return false;
        }


        return true;
    }
</script>