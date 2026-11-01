<style>
    .projects-cost-table thead th {
        text-align: center;
        vertical-align: middle;
        white-space: nowrap;
        border: 1px solid #dee2e6;
    }

    .projects-cost-table tbody td {
        text-align: center;
        vertical-align: middle;
        border: 1px solid #dee2e6;
    }

    .projects-cost-table .description-cell {
        min-width: 150px;
        text-align: left;
    }

    .projects-cost-table .amount-cell {
        white-space: nowrap;
        font-weight: 600;
    }

    .document-link {
        text-decoration: none;
        font-size: 18px;
    }
</style>

<div class="content-wrapper">

    <!-- Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h2 class="mb-1">Office Expenses</h2>
                    <p class="text-muted mb-0">
                        Manage all Office expenses and additional costs.
                    </p>
                </div>

                <a href="<?= base_url('office_expenses'); ?>" class="btn btn-outline-primary">
                    <i class="fas fa-plus"></i> Add Expenses
                </a>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <!-- Filters -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">

                    <form method="get" action="<?= base_url('projects_cost'); ?>">
                        <div class="row g-3">

                          

                            <div class="col-md-4">
                                <label class="form-label">Account Code</label>
                                <input type="text" name="account_head" class="form-control"
                                    placeholder="Enter account Code" value="<?= html_escape($account_head ?? ''); ?>">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">From Date</label>
                                <input type="date" name="from_date" class="form-control"
                                    value="<?= html_escape($from_date ?? ''); ?>">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">To Date</label>
                                <input type="date" name="to_date" class="form-control"
                                    value="<?= html_escape($to_date ?? ''); ?>">
                            </div>


                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary me-2">
                                    <i class="fas fa-filter"></i> Filter
                                </button>

                                <a href="<?= base_url('projects_cost'); ?>" class="btn btn-light border">
                                    Reset
                                </a>
                            </div>

                        </div>
                    </form>

                </div>
            </div>

            <!-- Projects Cost Table -->
            <div class="card shadow-sm border-0">

                <div class="card-header bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0">Office Expenses List</h5>
                            <small class="text-muted">
                                <?= number_format($total_rows ?? 0); ?> records found
                            </small>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">

                        <table class="table table-hover align-middle mb-0 projects-cost-table">

                            <thead class="table-light">
                                <tr>
                                    <th width="60">#</th>
                                    <th>Amount</th>
                                    <th>Account Head</th>
                                    <th>Description</th>
                                    <th>Payment Method</th>
                                    <th>Payment Document</th>
                                    <th>Created By</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php if (!empty($a_accounts)): ?>

                                    <?php foreach ($a_accounts as $index => $account): ?>

                                        <tr>
                                            <td>
                                                <?= $sl_start + $index; ?>
                                            </td>

                                            <td class="amount-cell">
                                                <?= number_format((float) ($account->amount ?? 0), 2); ?>
                                            </td>

                                            <td>
                                                <?= html_escape($account->account_head ?? '-'); ?>
                                            </td>

                                            <td class="description-cell">
                                                <?= nl2br(html_escape($account->descriptions ?? '-')); ?>
                                            </td>

                                            <!-- <td class="amount-cell">
                                                <?= number_format((float) ($account->additional_cost ?? 0), 2); ?>
                                            </td> -->

                                            <td>
                                                <?= html_escape($account->method ?? '-'); ?>
                                            </td>

                                            <td>
                                                <?php if (!empty($account->document)): ?>

                                                    <a href="<?= base_url('/assets/uploads/accounts_attachments/' . rawurlencode($account->document)); ?>"
                                                        target="_blank" rel="noopener noreferrer" class="document-link text-primary"
                                                        title="View payment document">

                                                        <i class="fas fa-file-pdf"></i>
                                                    </a>

                                                <?php else: ?>

                                                    <span class="text-muted">No document</span>

                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <?= html_escape($account->created_by ?? '-'); ?>
                                            </td>

                                            <td>
                                                <?= !empty($account->created_at)
                                                    ? html_escape(date('d M Y', strtotime($account->created_at)))
                                                    : '-'; ?>
                                            </td>

                                            <td>
                                                <a href="<?= base_url('vouchar/' . (int) $account->id); ?>"
                                                    class="btn btn-sm btn-outline-primary" title="View details">

                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>

                                <?php else: ?>

                                    <tr>
                                        <td colspan="11" class="text-center py-4">
                                            <i class="fas fa-folder-open text-muted"></i>
                                            <p class="mb-0 mt-2">
                                                No project costs found.
                                            </p>
                                        </td>
                                    </tr>

                                <?php endif; ?>

                            </tbody>

                        </table>

                    </div>
                </div>

                <!-- Pagination -->
                <?php if (!empty($pagination)): ?>
                    <div
                        class="card-footer bg-white d-flex justify-content-between align-items-center flex-wrap gap-2 py-3">

                        <small class="text-muted">
                            Showing
                            <?= $total_rows > 0 ? $sl_start : 0; ?>
                            to
                            <?= min($sl_start + count($a_accounts) - 1, $total_rows); ?>
                            of
                            <?= number_format($total_rows); ?> entries
                        </small>

                        <nav aria-label="Projects cost pagination">
                            <?= $pagination; ?>
                        </nav>

                    </div>
                <?php endif; ?>

            </div>

        </div>
    </section>
</div>