<?php
// echo '<pre>';
//     print_r($current_staff_movements);
//     echo '</pre>';
//     exit;
?>

<div class="content-wrapper bg-light">

    <?php if ($this->session->flashdata('movement_error')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('movement_error'); ?>
        </div>
    <?php endif; ?>


    <section class="content-header py-4">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h3 class="fw-bold text-dark mb-1">
                        <i class="fas fa-calendar-check text-primary me-2"></i>
                        My Movements
                    </h3>
                    <p class="text-muted mb-0">
                        View and manage your daily movements records
                    </p>
                </div>

                <a href="<?= base_url('add_staff_movement_form'); ?>" class="btn btn-sm btn-secondary btn-outline">
                    Create Movement
                </a href="">
            </div>

            <div class="search-card mb-4">



            </div>

            <div class="attendance-card">

                <div class="attendance-card-header">

                    <div>
                        <h5 class="mb-1 fw-bold">
                            Attendance History
                        </h5>

                        <small class="text-muted">
                            Your registered attendance records
                        </small>
                    </div>

                    <div class="total-attendance">
                        <span>
                            <?= (int) ($total_rows ?? 0); ?>
                        </span>
                        Records
                    </div>

                </div>

                <div class="table-responsive">

                    <table class="table attendance-table align-middle mb-0">

                        <thead>
                            <tr>

                                <th class="text-center" style="width:70px;">
                                    #
                                </th>

                                <th>
                                    Movement Date
                                </th>

                                <th>
                                    Depurture Time
                                </th>

                                <th>
                                    Expected Return Time
                                </th>

                                <th>
                                    Return Time
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    purpose
                                </th>
                                <th>
                                    Action
                                </th>

                            </tr>
                        </thead>

                        <tbody>

                            <?php if (!empty($staff_movements)): ?>

                                <?php foreach ($staff_movements as $i => $row): ?>

                                    <tr>

                                        <td class="text-center">
                                            <span class="serial-number">
                                                <?= (int) $sl_start + $i; ?>
                                            </span>
                                        </td>

                                        <td>
                                            <div class="date-info">

                                                <div class="date-icon">
                                                    <i class="fas fa-calendar-day"></i>
                                                </div>

                                                <div>
                                                    <div class="date-text">
                                                        <?= $row->movement_date
                                                            ?> ('YEAR-MONTH-DAY')
                                                    </div>


                                                </div>

                                            </div>
                                        </td>

                                        <td>
                                            <div class="time-info">
                                                <i class="fas fa-sign-out-alt text-danger"></i>
                                                <?= !empty($row->departure_time)
                                                    ? date('h:i A', strtotime($row->departure_time))
                                                    : '—'; ?>

                                            </div>
                                        </td>

                                        <td>
                                            <div class="time-info">
                                                <i class="fas fa-sign-in-alt text-success"></i>
                                                <?= !empty($row->expected_return_time)
                                                    ? date('h:i A', strtotime($row->expected_return_time))
                                                    : '—'; ?>
                                            </div>
                                        </td>

                                        <td>

                                            <i class="fas fa-sign-in-alt text-success"></i>
                                            <?= !empty($row->actual_return_time)
                                                ? date('h:i A', strtotime($row->actual_return_time))
                                                : '—'; ?>

                                        </td>

                                        <td>

                                            <?php
                                            $status = strtolower(trim($row->status ?? ''));

                                            $status_class = 'status-present';
                                            if ($status == 'Open') {
                                                $status_class = 'status-default';
                                            } elseif ($status == 'Closed') {
                                                $status_class = 'status-absent';
                                            }
                                            ?>

                                            <span class="status-badge <?= $status_class; ?>">
                                                <span class="status-dot"></span>

                                                <?= html_escape(
                                                    $row->status ?? 'Unknown'
                                                ); ?>
                                            </span>

                                        </td>

                                        <td>
                                            <span title="<?= htmlspecialchars($row->purpose ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                                                style="cursor: pointer;">
                                                <?= htmlspecialchars(strlen($row->purpose) > 15
                                                    ? substr($row->purpose, 0, 15) . '...'
                                                    : $row->purpose); ?>
                                            </span>
                                        </td>


                                        <td >
                                            <?php if ($row->status == 'Open'): ?>
                                                <a  href="<?= base_url('close_staff_movement/' . $row->id); ?>"
                                                    class="btn print-btn bg-red  btn-sm btn-secondary rounded-3 px-3 fw-medium add_btn ">
                                                    <i class="bi bi-plus-lg me-1"></i> Close Now
                                                </a>


                                            <?php else: ?>
                                                <a href=""
                                                    class="btn print-btn btn-secondary btn-sm rounded-3 px-3 fw-medium add_btn disabled ">
                                                    <i class="bi bi-plus-lg me-1"></i> Closed
                                                </a>

                                            <?php endif; ?>
                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            <?php else: ?>

                                <tr>
                                    <td colspan="6" class="empty-state">

                                        <div class="empty-icon">
                                            <i class="fas fa-calendar-times"></i>
                                        </div>

                                        <h6>No Attendance Records Found</h6>

                                        <p>
                                            No attendance records were found
                                            matching your search.
                                        </p>

                                    </td>
                                </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>

                <div class="attendance-card-footer">

                    <div class="text-muted small">
                        Showing
                        <?= !empty($staff_attendance) ? count($staff_attendance) : 0; ?>
                        of
                        <?= (int) ($total_rows ?? 0); ?>
                        records
                    </div>

                    <div>
                        <?= $pagination ?? ''; ?>
                    </div>

                </div>

            </div>

        </div>
    </section>

</div>


<style>
    .content-wrapper {
        min-height: 100vh;
    }

    /* Search Card */

    .search-card {
        background: #ffffff;
        border: 1px solid #e9ecef;
        border-radius: 14px;
        padding: 22px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
    }

    .form-label {
        font-size: 13px;
        font-weight: 600;
        color: #495057;
        margin-bottom: 7px;
    }

    .search-input {
        height: 44px;
        display: flex;
        align-items: center;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        background: #fff;
        transition: 0.2s;
    }

    .search-input:focus-within {
        border-color: #0d6efd;
        box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.08);
    }

    .search-input i {
        width: 42px;
        text-align: center;
        color: #adb5bd;
    }

    .search-input input {
        width: 100%;
        height: 100%;
        border: 0;
        outline: none;
        font-size: 13px;
        padding-right: 12px;
        background: transparent;
    }

    .search-btn {
        height: 44px;
        flex: 1;
        font-weight: 600;
        border-radius: 8px;
        font-size: 13px;
    }

    .reset-btn {
        width: 44px;
        height: 44px;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Attendance Card */

    .attendance-card {
        background: #ffffff;
        border-radius: 14px;
        border: 1px solid #e9ecef;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        overflow: hidden;
    }

    .attendance-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid #edf0f2;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .attendance-card-header h5 {
        font-size: 17px;
        color: #212529;
    }

    .total-attendance {
        background: #eef5ff;
        color: #0d6efd;
        padding: 7px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
    }

    .total-attendance span {
        font-size: 15px;
        margin-right: 3px;
    }

    /* Table */

    .attendance-table thead th {
        background: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
        color: #6c757d;
        font-size: 12px;
        font-weight: 700;
        padding: 15px 16px;
        white-space: nowrap;
    }

    .attendance-table tbody td {
        padding: 15px 16px;
        border-bottom: 1px solid #f1f3f5;
        font-size: 13px;
        white-space: nowrap;
    }

    .attendance-table tbody tr:hover {
        background: #f8fbff;
    }

    .attendance-table tbody tr:last-child td {
        border-bottom: 0;
    }

    /* Serial */

    .serial-number {
        color: #adb5bd;
        font-weight: 600;
    }

    /* Date */

    .date-info {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .date-icon {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        background: #eef5ff;
        color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .date-text {
        font-weight: 600;
        color: #343a40;
    }

    /* Time */

    .time-info {
        color: #495057;
        font-weight: 500;
    }

    .time-info i {
        margin-right: 6px;
    }

    /* Working Hours */

    .working-hours {
        background: #f0f7ff;
        color: #0d6efd;
        padding: 6px 10px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 700;
    }

    /* Status */

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 6px 11px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .status-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: currentColor;
    }

    .status-present {
        background: #e9f8f0;
        color: #198754;
    }

    .status-absent {
        background: #fff0f1;
        color: #dc3545;
    }

    .status-late {
        background: #fff3cd;
        color: #856404;
    }

    .status-leave {
        background: #eef5ff;
        color: #0d6efd;
    }

    .status-halfday {
        background: #f3eefe;
        color: #6f42c1;
    }

    .status-default {
        background: #f1f3f5;
        color: #6c757d;
    }

    /* Empty State */

    .empty-state {
        padding: 70px 20px !important;
        text-align: center;
        white-space: normal !important;
    }

    .empty-icon {
        width: 65px;
        height: 65px;
        margin: 0 auto 15px;
        border-radius: 50%;
        background: #f1f3f5;
        color: #adb5bd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 25px;
    }

    .empty-state h6 {
        font-weight: 600;
        color: #495057;
    }

    .empty-state p {
        color: #adb5bd;
        font-size: 13px;
        margin-bottom: 0;
    }

    /* Footer */

    .attendance-card-footer {
        padding: 16px 24px;
        border-top: 1px solid #edf0f2;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        flex-wrap: wrap;
    }

    .attendance-card-footer .pagination {
        margin-bottom: 0;
    }

    .attendance-card-footer .page-link {
        border-radius: 5px;
        margin: 0 2px;
        color: #0d6efd;
    }

    .attendance-card-footer .page-item.active .page-link {
        background: #0d6efd;
        border-color: #0d6efd;
        color: #fff;
    }


    @media (max-width: 767px) {

        .content-header {
            padding-top: 20px !important;
        }

        .attendance-card-header {
            padding: 16px;
        }

        .attendance-card-footer {
            padding: 15px;
        }

        .attendance-table {
            min-width: 850px;
        }

        .search-card {
            padding: 16px;
        }

    }
</style>