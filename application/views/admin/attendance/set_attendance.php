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
    <?php if ($this->session->flashdata('existing_staff_id_error')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('existing_staff_id_error'); ?>
        </div>
    <?php endif; ?>
    <div class="container-fluid max-width-xl">

        <!-- Page Header -->
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
            <div>
                <h2 class="h3 fw-bold text-dark mb-1 d-flex align-items-center gap-2">
                    <i class="bi bi-clock-history text-primary"></i>
                    Set Attendance Settings
                </h2>
                <p class="text-muted small mb-0">Configure work schedule, shifts, and grace periods for staff</p>
            </div>
            <a href="<?= base_url('projects_list') ?>" class="btn btn-outline-secondary btn-sm rounded-2">
                <i class="bi bi-arrow-left me-1"></i> Back to Projects List
            </a>
        </div>

        <form action="<?= base_url('set_attendence'); ?>" method="POST">
            <div class="row g-4">

                <!-- LEFT COLUMN: Main Form Inputs -->
                <div class="col-lg-8">
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title fw-bold text-dark mb-1 d-flex align-items-center gap-2">
                                <i class="bi bi-sliders text-primary"></i> Shift & Timing Parameters
                            </h5>
                            <p class="text-muted small mb-0">Enter the office timings and working specifications below
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Staff ID -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">
                                        Staff ID <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted">
                                            <i class="bi bi-person-badge"></i>
                                        </span>
                                        <input type="text" name="staff_id" class="form-control"
                                            placeholder="Enter Staff ID" required>
                                    </div>
                                </div>

                                <!-- Working Hours -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">Total Working Hours</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted">
                                            <i class="bi bi-hourglass-split"></i>
                                        </span>
                                        <input type="text" name="working_hours" class="form-control"
                                            placeholder="e.g. 8 hours">
                                    </div>
                                </div>

                                <!-- Office Start Time -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">
                                        Office Start Time <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted">
                                            <i class="bi bi-alarm"></i>
                                        </span>
                                        <input type="time" name="office_start" class="form-control" required>
                                    </div>
                                </div>

                                <!-- Office End Time -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small">
                                        Office End Time <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted">
                                            <i class="bi bi-alarm-fill"></i>
                                        </span>
                                        <input type="time" name="office_end" class="form-control" required>
                                    </div>
                                </div>

                                <!-- Grace Minutes -->
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold small">Grace Period (Minutes)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted">
                                            <i class="bi bi-stopwatch"></i>
                                        </span>
                                        <input type="number" name="grace_minutes" class="form-control"
                                            placeholder="e.g. 15" min="0">
                                    </div>
                                    <div class="form-text text-muted small mt-1">Allowed late arrival buffer in minutes
                                        before attendance is marked late.</div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN: Publishing & Metadata -->
                <div class="col-lg-4">

                    <!-- Schedule Options Card -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title fw-bold text-dark mb-1 d-flex align-items-center gap-2">
                                <i class="bi bi-calendar-week text-primary"></i> Weekly Schedule
                            </h5>
                        </div>
                        <div class="card-body d-flex flex-column gap-3">

                            <!-- Weekend Day Select -->
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label for="weekend_day" class="form-label fw-semibold small mb-0">Weekend Day <span
                                            class="text-danger">*</span></label>
                                </div>
                                <select name="weekend_day" id="weekend_day" class="form-select" required>
                                    <option value="" selected disabled>Select weekend day</option>
                                    <option value="Sunday">Sunday</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <!-- Readiness Summary Box -->
                    <div class="summary-box d-flex align-items-start gap-3 mb-4">
                        <div class="text-success fs-3 lh-1">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Ready to save?</h6>
                            <p class="text-muted small mb-0">Please review shift timings and grace periods before
                                applying settings.</p>
                        </div>
                    </div>

                    <!-- Submission Actions -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg fw-semibold shadow-sm fs-6">
                            <i class="bi bi-check-lg me-1"></i> Save Attendance Settings
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
        }, 3000);
    });
</script>