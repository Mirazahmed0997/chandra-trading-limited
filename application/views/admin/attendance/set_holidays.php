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

        <!-- Flash Messages -->
        <?php if ($this->session->flashdata('set_holiday_success')): ?>
            <div class="alert alert-success alert-dismissible fade show auto-hide-alert mb-4 shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                <?= $this->session->flashdata('set_holiday_success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('set_holiday_error')): ?>
            <div class="alert alert-danger alert-dismissible fade show auto-hide-alert mb-4 shadow-sm" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <?= $this->session->flashdata('set_holiday_error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Page Header -->
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
            <div>
                <h2 class="h3 fw-bold text-dark mb-1 d-flex align-items-center gap-2">
                    <i class="bi bi-calendar2-heart text-primary"></i>
                    Set Holiday
                </h2>
                <p class="text-muted small mb-0">Configure upcoming holidays and company-wide time off for staff</p>
            </div>
            <a href="#" class="btn btn-outline-secondary btn-sm rounded-2">
                <i class="bi bi-arrow-left me-1"></i> Back to List
            </a>
        </div>

        <form action="<?= base_url('set_holidays'); ?>" method="POST">
            <div class="row g-4">

                <!-- LEFT COLUMN: Main Form Inputs -->
                <div class="col-lg-8">
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title fw-bold text-dark mb-1 d-flex align-items-center gap-2">
                                <i class="bi bi-info-circle text-primary"></i> Holiday Details
                            </h5>
                            <p class="text-muted small mb-0">Provide the title, date, and classification of the holiday</p>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Holiday Name -->
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold small">
                                        Holiday Name <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted">
                                            <i class="bi bi-calendar-event"></i>
                                        </span>
                                        <input type="text" name="holiday_name" class="form-control"
                                            placeholder="e.g. Independence Day / New Year" required>
                                    </div>
                                </div>

                                <!-- Holiday Date -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">
                                        Holiday Date <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted">
                                            <i class="bi bi-calendar-date"></i>
                                        </span>
                                        <input type="date" name="holiday_date" class="form-control" required>
                                    </div>
                                </div>

                                <!-- Holiday Type -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">
                                        Holiday Type <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted">
                                            <i class="bi bi-tag"></i>
                                        </span>
                                        <select name="holiday_type" class="form-select" required>
                                            <option value="" selected disabled>Select holiday type</option>
                                            <option value="National">National Holiday</option>
                                            <option value="Public">Public Holiday</option>
                                            <option value="Company">Company Holiday</option>
                                            <option value="Optional">Optional / Restricted</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold small">Description / Notes</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted align-items-start pt-2">
                                            <i class="bi bi-file-text"></i>
                                        </span>
                                        <textarea name="description" class="form-control" rows="4"
                                            placeholder="Enter any additional details or context about this holiday..."></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN: Summary & Actions -->
                <div class="col-lg-4">

                    <!-- Readiness Summary Box -->
                    <div class="summary-box d-flex align-items-start gap-3 mb-4">
                        <div class="text-success fs-3 lh-1">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Ready to publish?</h6>
                            <p class="text-muted small mb-0">Verify the date and holiday type before saving to update the staff schedule.</p>
                        </div>
                    </div>

                    <!-- Submission Actions -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg fw-semibold shadow-sm fs-6">
                            <i class="bi bi-check-lg me-1"></i> Save Holiday
                        </button>
                        <a href="<?= base_url('projects_list') ?>" class="btn btn-light border text-muted">
                            Cancel
                        </a>
                    </div>

                </div>

            </div>
        </form>
    </div>
</div>

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
        }, 4000);
    });
</script>