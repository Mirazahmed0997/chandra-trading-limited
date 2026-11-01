<!-- Bootstrap CSS & Icons -->

<?php
// echo '<pre>';
// print_r($projects);
// echo '</pre>';
// exit;
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<style>
    .card-custom {
        border: 1px solid rgba(0, 0, 0, 0.08);
        border-radius: 0.75rem;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.04);
        background-color: #fff;
    }

    .card-custom .card-header {
        background-color: transparent;
        border-bottom: 1px solid rgba(0, 0, 0, 0.08);
        padding: 1.25rem 1.5rem;
    }

    .card-custom .card-body {
        padding: 1.5rem;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
    }

    .summary-box {
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 0.75rem;
        padding: 1.25rem;
    }
</style>

<div class="content-wrapper py-4 bg-light min-vh-100">
    <div class="container-fluid max-width-xl">

        <!-- Page Header -->
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
            <div>
                <h2 class="h3 fw-bold text-dark mb-1 d-flex align-items-center gap-2">
                    <i class="bi bi-building text-primary"></i>
                    Add Deposite/Expense
                </h2>

                <!-- <p class="text-muted small mb-0">Create projects Cost</p> -->
            </div>

            <div>
                <a href="<?= base_url('accountHeadForm'); ?>" class="btn btn-sm btn-outline-primary px-4 ">
                    <i class="fas fa-plus"></i>
                    New Account Head
                </a>
                <!-- <a href="<?= base_url('projects_cost') ?>" class="btn btn-outline-secondary btn-sm rounded-2">
                    <i class="bi bi-arrow-left me-1"></i> Back to Projects List
                </a> -->
            </div>
        </div>

        <form action="<?= base_url('') ?>" method="POST" enctype="multipart/form-data">
            <div class="row g-4">

                <!-- LEFT COLUMN: Main Form Inputs -->
                <div class="col-lg-8">
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title fw-bold text-dark mb-1 d-flex align-items-center gap-2">
                                <i class="bi bi-info-circle text-primary"></i> Basic Information
                            </h5>
                            <p class="text-muted small mb-0"> Enter the primary cost details below</p>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">



                                <!-- Property Address -->

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">Amount</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted">
                                            <!-- <i class="bi bi-geo-alt"></i> -->
                                        </span>
                                        <input type="number" name="amount" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">Document</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted">
                                            <!-- <i class="bi bi-geo-alt"></i> -->
                                        </span>
                                        <input type="file" name="document" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">Additional Cost (if any)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted">
                                            <!-- <i class="bi bi-geo-alt"></i> -->
                                        </span>
                                        <input type="number" name="additional_cost" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-semibold small">Descriptions</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted">
                                            <!-- <i class="bi bi-geo-alt"></i> -->
                                        </span>
                                        <textarea name="descriptions" class="form-control" placeholder="Notes"
                                            rows="3"></textarea>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">

                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title fw-bold text-dark mb-1 d-flex align-items-center gap-2">
                                <i class="bi bi-send text-primary"></i> Type Options
                            </h5>
                        </div>
                        <div class="card-body d-flex flex-column gap-3">


                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label for="project_id" class="form-label fw-semibold small mb-0">Project
                                        ID</label>
                                </div>

                                <select name="project_id" id="project_id" class="form-select">
                                    <option value="">-- Select Project --</option>
                                    <?php foreach ($projects as $project): ?>
                                        <option value="<?= htmlspecialchars($project->project_id); ?>">
                                            <?= htmlspecialchars($project->project_id); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- <div>
                                <label class="form-label fw-semibold small">Type of Costs</label>
                                <select name="cost_type" class="form-select" required>
                                    <option value="Publish" selected>Select</option>
                                    <option value="Deposite">Deposite</option>
                                    <option value="Expense">Expense</option>
                                </select>
                            </div> -->
                            <div>
                                <label class="form-label fw-semibold small">Account Head</label>
                                <select name="account_head" class="form-select">
                                    <option value="Publish" selected>Select</option>
                                    <?php foreach ($account_heads as $account_head): ?>
                                        <option value="<?= htmlspecialchars($account_head->id); ?>">
                                            <?= htmlspecialchars($account_head->account_head_name); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div>
                                <label class="form-label fw-semibold small">Payment Method</label>
                                <select name="method" class="form-select">
                                    <option value="Publish" selected>Select</option>
                                    <option value="Draft">Bkash</option>
                                    <option value="Sold">Nagad</option>
                                    <option value="Reserved">Bank</option>
                                    <option value="Reserved">Cheque</option>
                                    <option value="Reserved">Cash</option>
                                </select>
                            </div>

                        </div>
                    </div>


                    <!-- Submission Actions -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg fw-semibold shadow-sm fs-6">
                            <i class="bi bi-check-lg me-1"></i> Submit
                        </button>
                        <a href="" class="btn btn-light border text-muted">
                            Cancel
                        </a>
                    </div>

                </div>

            </div>
        </form>
    </div>
</div>

<?php $this->load->view('admin/properties/category_form.php'); ?>
<?php $this->load->view('admin/properties/types_form.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Auto-dismiss alert banner script
    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function () {
            const alerts = document.querySelectorAll('.auto-hide-alert');
            alerts.forEach(function (alert) {
                alert.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-10px)';
                setTimeout(() => alert.remove(), 500);
            });
        }, 3000);
    });
    document.querySelectorAll('input[type="number"]').forEach(function (input) {

        input.addEventListener('wheel', function (e) {
            this.blur();
        });

    });
</script>