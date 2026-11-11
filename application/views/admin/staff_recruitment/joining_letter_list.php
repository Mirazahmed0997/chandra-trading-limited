<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<style>
    .joining-wrapper {
        background: #f4f6f9;
        padding: 25px;
        min-height: 100vh;
    }

    .joining-card {
        background: #fff;
        border: 1px solid #e8edf3;
        border-radius: 12px;
        box-shadow: 0 3px 15px rgba(0,0,0,.035);
    }

    .joining-header {
        padding: 20px 22px;
        border-bottom: 1px solid #edf0f4;
    }

    .joining-header h5 {
        font-size: 18px;
        font-weight: 700;
        color: #243247;
        margin-bottom: 4px;
    }

    .joining-header p {
        font-size: 13px;
        color: #8993a4;
        margin: 0;
    }

    .joining-table th {
        background: #f8fafc;
        color: #64748b;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        padding: 14px 16px;
        white-space: nowrap;
    }

    .joining-table td {
        padding: 16px;
        vertical-align: middle;
        font-size: 13px;
        color: #475569;
    }

    .joining-table tbody tr:hover {
        background: #f8fafc;
    }

    .letter-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eaf3ee;
        color: #145c3a;
        font-size: 19px;
    }

    .letter-number {
        font-weight: 700;
        color: #145c3a;
    }

    .status-badge {
        padding: 6px 11px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
    }

    .status-issued {
        background: #e8f5ed;
        color: #198754;
    }

    .status-pending {
        background: #fff4dc;
        color: #b7791f;
    }

    .status-cancelled {
        background: #fdecec;
        color: #dc3545;
    }

    .action-btn {
        width: 32px;
        height: 32px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        border: 1px solid #e2e8f0;
        border-radius: 7px;
        background: #fff;
        color: #475569;
        text-decoration: none;
        margin-right: 3px;
    }

    .action-btn:hover {
        background: #145c3a;
        color: #fff;
        border-color: #145c3a;
    }

    .joining-search {
        max-width: 280px;
    }

    .joining-search input {
        font-size: 13px;
        padding: 9px 12px;
    }

    .joining-footer {
        padding: 16px 22px;
        border-top: 1px solid #edf0f4;
    }

    @media(max-width: 768px) {
        .joining-wrapper {
            padding: 12px;
        }

        .joining-header {
            padding: 16px;
        }
    }
</style>

<div class="joining-wrapper content-wrapper">

    <div class="joining-card">

        <!-- Header -->
        <div class="joining-header">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>
                    <h5>
                        <i class="bi bi-file-earmark-text me-2 text-success"></i>
                        My Joining Letters
                    </h5>
                    <p>View and manage your official joining letters.</p>
                </div>

                <div class="joining-search">
                    <form method="GET" action="<?= base_url('joining_letter'); ?>">
                        <div class="input-group">
                            <span class="input-group-text bg-white">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text"
                                   name="search"
                                   class="form-control"
                                   placeholder="Search letter..."
                                   value="<?= html_escape($search ?? ''); ?>">
                            <button class="btn btn-success" type="submit">
                                Search
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">

            <table class="table joining-table mb-0">

                <thead>
                    <tr>
                        <th width="65">SL</th>
                        <th>Letter Information</th>
                        <th>Employee ID</th>
                        <th>Joining Date</th>
                        <th>Issue Date</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if (!empty($staff_joining_letters)): ?>

                        <?php $i = $sl_start; ?>

                        <?php foreach ($staff_joining_letters as $letter): ?>

                            <tr>

                                <td><?= $i++; ?></td>

                                <td>
                                    <div class="d-flex align-items-center gap-3">

                                        <div class="letter-icon">
                                            <i class="bi bi-file-earmark-pdf"></i>
                                        </div>

                                        <div>
                                            <div class="fw-bold text-dark">
                                                Joining Letter
                                            </div>
                                            <small class="text-muted">
                                                Official Employment Document
                                            </small>
                                        </div>

                                    </div>
                                </td>

                                <td>
                                    <span class="letter-number">
                                        <?= html_escape($letter->employee_id ?? 'N/A'); ?>
                                    </span>
                                </td>

                                <td>
                                    <i class="bi bi-calendar3 me-1"></i>
                                    <?= !empty($letter->joining_date)
                                        ? date('d M Y', strtotime($letter->joining_date))
                                        : 'N/A'; ?>
                                </td>

                                <td>
                                    <?= !empty($letter->created_at)
                                        ? date('d M Y', strtotime($letter->created_at))
                                        : 'N/A'; ?>
                                </td>

                                <td>
                                    <?php
                                    $status = strtolower($letter->status ?? 'issued');

                                    $status_class = 'status-issued';

                                    if ($status == 'pending') {
                                        $status_class = 'status-pending';
                                    } elseif ($status == 'cancelled') {
                                        $status_class = 'status-cancelled';
                                    }
                                    ?>

                                    <span class="status-badge <?= $status_class; ?>">
                                        <?= ucfirst(html_escape($status)); ?>
                                    </span>
                                </td>

                                <td class="text-center">

                                    <a href="<?= base_url('admin_joining_letter_details/' . $letter->id); ?>"
                                       class="action-btn"
                                       title="View Letter">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                  

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="7" class="text-center py-5">

                                <i class="bi bi-file-earmark-x text-muted"
                                   style="font-size:45px;"></i>

                                <h6 class="mt-3 fw-bold text-secondary">
                                    No Joining Letters Found
                                </h6>

                                <p class="text-muted small mb-0">
                                    Your joining letters will appear here once issued.
                                </p>

                            </td>
                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

        <!-- Footer -->
        <div class="joining-footer">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <small class="text-muted">
                    Showing <?= count($staff_joining_letters ?? []); ?>
                    of <?= $total_rows; ?> records
                </small>

                <div>
                    <?= $pagination; ?>
                </div>

            </div>

        </div>

    </div>

</div>
