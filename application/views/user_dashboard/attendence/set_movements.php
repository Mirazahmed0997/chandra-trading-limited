```php
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
        <?php if ($this->session->flashdata('movement_success')): ?>
            <div class="alert alert-success alert-dismissible fade show auto-hide-alert mb-4 shadow-sm">
                <i class="bi bi-check-circle-fill me-2"></i>
                <?= $this->session->flashdata('movement_success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('movement_error')): ?>
            <div class="alert alert-danger alert-dismissible fade show auto-hide-alert mb-4 shadow-sm">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <?= $this->session->flashdata('movement_error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
            <div>
                <h2 class="h3 fw-bold text-dark mb-1 d-flex align-items-center gap-2">
                    <i class="bi bi-person-walking text-primary"></i>
                    Staff Movement Request
                </h2>
                <p class="text-muted small mb-0">
                    Submit your official or personal movement request for approval
                </p>
            </div>

          
        </div>

        <form action="<?= base_url('add_staff_movement'); ?>" method="POST">

            <div class="row g-4">

                <div class="col-lg-8">

                    <div class="card card-custom mb-4">

                        <div class="card-header">
                            <h5 class="card-title fw-bold text-dark mb-1 d-flex align-items-center gap-2">
                                <i class="bi bi-info-circle text-primary"></i>
                                Movement Details
                            </h5>
                            <p class="text-muted small mb-0">
                                Provide your destination and purpose of movement
                            </p>
                        </div>

                        <div class="card-body">

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">
                                        Movement Date <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted">
                                            <i class="bi bi-calendar-event"></i>
                                        </span>
                                        <input type="date"
                                            name="movement_date"
                                            id="movement_date"
                                            class="form-control"
                                            value="<?= date('Y-m-d'); ?>"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">
                                        Movement Type <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted">
                                            <i class="bi bi-tag"></i>
                                        </span>
                                        <select name="movement_type" class="form-select" required>
                                            <option value="Official" selected>Official</option>
                                            <option value="Personal">Personal</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">
                                        Departure Time <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted">
                                            <i class="bi bi-clock"></i>
                                        </span>
                                        <input type="time"
                                            name="departure_time"
                                            class="form-control"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">
                                        Expected Return Time
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted">
                                            <i class="bi bi-clock-history"></i>
                                        </span>
                                        <input type="time"
                                            name="expected_return_time"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-semibold small">
                                        Destination <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted">
                                            <i class="bi bi-geo-alt"></i>
                                        </span>
                                        <input type="text"
                                            name="destination"
                                            class="form-control"
                                            placeholder="Enter your destination or visiting location"
                                            maxlength="255"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-semibold small">
                                        Purpose of Movement <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted align-items-start pt-2">
                                            <i class="bi bi-file-text"></i>
                                        </span>
                                        <textarea name="purpose"
                                            class="form-control"
                                            rows="4"
                                            placeholder="Describe the reason for your movement..."
                                            required></textarea>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="summary-box mb-4">

                        <div class="d-flex align-items-start gap-3">
                            <div class="text-primary fs-3 lh-1">
                                <i class="bi bi-clipboard-check"></i>
                            </div>

                            <div>
                                <h6 class="fw-bold mb-1">Movement Request</h6>
                                <p class="text-muted small mb-0">
                                    Please verify your movement information before submitting your request.
                                </p>
                            </div>
                        </div>

                        <hr>

                        <div class="small">
                           

                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Request Date</span>
                                <strong><?= date('d-m-Y'); ?></strong>
                            </div>

                            
                        </div>

                    </div>

                    <div class="card card-custom mb-4">
                        <div class="card-body">

                            <h6 class="fw-bold mb-3">
                                <i class="bi bi-info-circle text-primary me-1"></i>
                                Important Information
                            </h6>

                            <ul class="text-muted small ps-3 mb-0">
                                <li class="mb-2">
                                    Submit your movement request before leaving the office.
                                </li>
                                <li class="mb-2">
                                    Provide an accurate destination and movement purpose.
                                </li>
                                <li class="mb-2">
                                    Your request requires management approval.
                                </li>
                                <li>
                                    Update your actual return time after returning to the office.
                                </li>
                            </ul>

                        </div>
                    </div>

                    <div class="d-grid gap-2">

                        <button type="submit" class="btn btn-primary btn-lg fw-semibold shadow-sm fs-6">
                            <i class="bi bi-send me-1"></i>
                            Submit Movement Request
                        </button>

                        <a href="<?= base_url('user_movement_list'); ?>"
                            class="btn btn-light border text-muted">
                            Cancel
                        </a>

                    </div>

                </div>

            </div>

        </form>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    setTimeout(function () {
        document.querySelectorAll('.auto-hide-alert').forEach(function (alert) {
            alert.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-10px)';

            setTimeout(() => alert.remove(), 500);
        });
    }, 4000);

    // Prevent expected return from being earlier than departure
    const departure = document.querySelector('[name="departure_time"]');
    const expectedReturn = document.querySelector('[name="expected_return_time"]');

    departure.addEventListener('change', function () {
        expectedReturn.min = departure.value;
    });

});
</script>
```