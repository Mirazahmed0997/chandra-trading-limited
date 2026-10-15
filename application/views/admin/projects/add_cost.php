<!-- Bootstrap CSS & Icons -->
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
                    Add New Cost
                </h2>
                <p class="text-muted small mb-0">Create  projects Cost</p>
            </div>
            <a href="<?= base_url('projects_cost') ?>" class="btn btn-outline-secondary btn-sm rounded-2">
                <i class="bi bi-arrow-left me-1"></i> Back to Projects List
            </a>
        </div>

        <form action="<?= base_url('') ?>" method="POST"
            enctype="multipart/form-data">
            <div class="row g-4">

                <!-- LEFT COLUMN: Main Form Inputs -->
                <div class="col-lg-8">
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title fw-bold text-dark mb-1 d-flex align-items-center gap-2">
                                <i class="bi bi-info-circle text-primary"></i> Basic Information
                            </h5>
                            <p class="text-muted small mb-0">Enter the primary projects cost details below</p>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Project Name -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">
                                        Project ID <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted">
                                            <!-- <i class="bi bi-building"></i> -->
                                        </span>
                                        <input type="text" name="project_name" class="form-control"
                                            placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">
                                        Medium of Cost <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted">
                                            <!-- <i class="bi bi-building"></i> -->
                                        </span>
                                        <input type="text" name="project_name" class="form-control"
                                            placeholder="" required>
                                    </div>
                                </div>

                                <!-- Property Address -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">Others</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted">
                                            <!-- <i class="bi bi-geo-alt"></i> -->
                                        </span>
                                        <input type="text" name="address" class="form-control"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">Amount</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted">
                                            <!-- <i class="bi bi-geo-alt"></i> -->
                                        </span>
                                        <input type="text" name="address" class="form-control"
                                            placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">Document</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted">
                                            <!-- <i class="bi bi-geo-alt"></i> -->
                                        </span>
                                        <input type="file" name="address" class="form-control"
                                            placeholder="">
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN: Publishing & Metadata -->
                <div class="col-lg-4">

                    <!-- Publishing Card -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title fw-bold text-dark mb-1 d-flex align-items-center gap-2">
                                <i class="bi bi-send text-primary"></i> Type Options
                            </h5>
                        </div>
                        <div class="card-body d-flex flex-column gap-3">

                            <!-- Status Select -->
                            <div>
                                <label class="form-label fw-semibold small">Type of Costs</label>
                                <select name="status" class="form-select">
                                    <option value="Publish" selected>Select</option>
                                    <option value="Transportation">Transportation</option>
                                    <option value="Buy Lan">Buy Land</option>
                                    <option value="Hospitality">Hospitality</option>
                                </select>
                            </div>
                            <div>
                                <label class="form-label fw-semibold small">Payment Type</label>
                                <select name="status" class="form-select">
                                    <option value="Publish" selected>Select</option>
                                    <option value="Draft">Bkash</option>
                                    <option value="Sold">Nagad</option>
                                    <option value="Reserved">Online</option>
                                    <option value="Reserved">Cheque</option>
                                    <option value="Reserved">Debit/Credit</option>
                                </select>
                            </div>

                        </div>
                    </div>

                
                    <!-- Submission Actions -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg fw-semibold shadow-sm fs-6">
                            <i class="bi bi-check-lg me-1"></i> Save Property
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

<!-- Modal Includes -->
<?php $this->load->view('admin/properties/category_form.php'); ?>
<?php $this->load->view('admin/properties/types_form.php'); ?>

<!-- Bootstrap JS -->
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
</script>