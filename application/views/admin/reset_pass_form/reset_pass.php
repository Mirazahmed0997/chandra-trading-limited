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

    <div class="row justify-content-center align-items-center">

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-4">

            <div class="card shadow border-0">
                <div class="card-body p-4">

                    <form action="<?= base_url('send_reset_link') ?>" method="post">

                        <div class="form-group mb-3">
                            <label class="mb-2">
                                Email Address
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="Enter your email"
                                required>
                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary w-100">

                            <i class="fas fa-paper-plane me-1"></i>
                            Send Reset Link

                        </button>

                    </form>

                    <div class="text-center mt-4">
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


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
    }, 5000); // 5 seconds
</script>