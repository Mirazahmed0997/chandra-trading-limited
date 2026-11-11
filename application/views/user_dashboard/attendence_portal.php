<?php
$id = $this->session->userdata("login_user_info_all")->staff_id;
$date = date('Y-m-d');

$attendence = $this->db->order_by('id', 'desc')
    ->where('staff_id', $id)
    ->where('attendance_date', $date)
    ->get('staff_attendance')
    ->result_array();

$single_attendence = !empty($attendence) ? $attendence[0] : null;
?>


<div class="modal fade" id="attendencePortal" tabindex="-1" aria-labelledby="VerificationReportLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">

            <div class="modal-header bg-gradient text-white p-4 card-theme-blue">
                <div>
                    <h5 class="modal-title fw-bold mb-0 text-white" id="VerificationReportLabel">Attendance Portal</h5>
                    <small class="text-white-50">Log your daily entry/exit time</small>
                </div>
                <button type="button" class="btn-close btn-close-white ms-auto me-0" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <?php date_default_timezone_set('Asia/Dhaka'); ?>
            <?php if (!empty($single_attendence) && !empty($single_attendence['entry_time']) && !empty($single_attendence['exit_time'])): ?>

                <div>
                    <div class="col-12 col-md-6">
                        <label for="attendance_date" class="form-label text-secondary fw-semibold small">
                            <i class="fas fa-calendar-alt me-1 text-primary"></i> Attendence Completed, You have already Exit today
                        </label>

                    </div>
                </div>

            <?php else: ?>
                <?php if (!empty($single_attendence) && !empty($single_attendence['entry_time']) && empty($single_attendence['exit_time'])): ?>
                    <form action="<?= base_url('user_exit'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="modal-body p-4 bg-light bg-opacity-50">
                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label for="attendance_date" class="form-label text-secondary fw-semibold small">
                                        <i class="fas fa-calendar-alt me-1 text-primary"></i> Date
                                    </label>
                                    <div class="input-group input-group-lg shadow-sm rounded-3">
                                        <input value="<?= htmlspecialchars(date('Y-m-d')); ?>" type="date" name="date"
                                            id="attendance_date" class="form-control border-0 bg-white fs-6 fw-medium text-dark"
                                            required readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="time" class="form-label text-secondary fw-semibold small">
                                        <i class="fas fa-clock me-1 text-primary"></i> Time
                                    </label>
                                    <div class="input-group input-group-lg shadow-sm rounded-3">
                                        <input value="<?= htmlspecialchars(date('h:i A')); ?>" type="text" name="exit_time"
                                            id="time" class="form-control border-0 bg-white fs-6 fw-medium text-dark" required
                                            readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0 p-4 bg-white d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-light px-4 py-2 rounded-3 fw-semibold text-secondary"
                                data-bs-dismiss="modal">Cancel</button>
                            <button type="submit"
                                class="btn btn-primary px-4 py-2 rounded-3 fw-semibold shadow-sm d-flex align-items-center gap-2"
                                style="background: #4f46e5; border: none;">
                                <i class="fas fa-check-circle"></i> Submit Exit
                            </button>
                        </div>
                    </form>
                <?php else: ?>
                    <form action="<?= base_url('user_entry'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="modal-body p-4 bg-light bg-opacity-50">
                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label for="attendance_date" class="form-label text-secondary fw-semibold small">
                                        <i class="fas fa-calendar-alt me-1 text-primary"></i> Date
                                    </label>
                                    <div class="input-group input-group-lg shadow-sm rounded-3">
                                        <input value="<?= htmlspecialchars(date('Y-m-d')); ?>" type="date" name="date"
                                            id="attendance_date" class="form-control border-0 bg-white fs-6 fw-medium text-dark"
                                            required readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="time" class="form-label text-secondary fw-semibold small">
                                        <i class="fas fa-clock me-1 text-primary"></i> Time
                                    </label>
                                    <div class="input-group input-group-lg shadow-sm rounded-3">
                                        <input value="<?= htmlspecialchars(date('h:i A')); ?>" type="text" name="time" id="time"
                                            class="form-control border-0 bg-white fs-6 fw-medium text-dark" required readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0 p-4 bg-white d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-light px-4 py-2 rounded-3 fw-semibold text-secondary"
                                data-bs-dismiss="modal">Cancel</button>
                            <button type="submit"
                                class="btn btn-primary px-4 py-2 rounded-3 fw-semibold shadow-sm d-flex align-items-center gap-2"
                                style="background: #4f46e5; border: none;">
                                <i class="fas fa-check-circle"></i> Submit Entry
                            </button>
                        </div>
                    </form>
                <?php endif; ?>
            <?php endif; ?>



        </div>
    </div>
</div>