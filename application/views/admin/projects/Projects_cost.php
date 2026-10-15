<style>
    tbody tr td{
        border: 1px solid #5b5d60;
        text-align: center;
    }

    thead tr th{
        border: 1px solid white;
        text-align: center;
    }
</style>


<div class="content-wrapper">

    <!-- Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">Projects Cost</h2>
                    <p class="text-muted mb-0">Manage all projects listings</p>
                </div>
                <div>
                    <a href="<?= base_url('add_cost'); ?>" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add Cost
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Filter Card -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <!-- <form method="get" action="<?= base_url(''); ?>">
                        <div class="row g-3">

                            <div class="col-md-4">
                                <label class="form-label">Search Property</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    <input type="text" name="search" class="form-control"
                                        placeholder="Name, ID or location" value="<?= html_escape($search); ?>">
                                </div>
                            </div>
                           
                            <div class="col-md-2">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="">All Status</option>
                                    <option value="Draft" <?= ($status == 'Draft') ? 'selected' : ''; ?>>Draft
                                    </option>
                                    <option value="Sold" <?= ($status == 'Sold') ? 'selected' : ''; ?>>Sold
                                    </option>
                                    <option value="Reserved" <?= ($status == 'Reserved') ? 'selected' : ''; ?>>Reserved</option>
                                </select>
                            </div>

                          

                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary me-2">
                                    <i class="fas fa-filter"></i> Filter
                                </button>
                                <a href="<?= base_url('projects_list/' . urlencode($category)); ?>" class="btn btn-light border">Reset</a>
                            </div>

                        </div>
                    </form> -->
                </div>
            </div>

            <!-- Property Table -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0">Projects Cost List</h5>
                            <small class="text-muted"> Project found</small>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th width="60">#</th>
                                    <th>Project NO.</th>
                                    <th>Medium of Cost</th>
                                    <th>Type of Cost</th>
                                    <th>Others</th>
                                    <th width="140">Amount</th>
                                    <th width="">Payment Type</th>
                                    <th width="">Payment Document</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><i class="fas fa-folder"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Footer with Pagination -->
                <!-- <?php if (!empty($pagination)): ?>
                    <div class="card-footer bg-white d-flex justify-content-between align-items-center py-3">
                        <small class="text-muted">
                            Showing <?= min($sl_start, $total_rows); ?> to
                            <?= min($sl_start + count($properties) - 1, $total_rows); ?> of
                            <?= number_format($total_rows); ?> entries
                        </small>
                        <nav><?= $pagination; ?></nav>
                    </div>
                <?php endif; ?> -->

            </div>

        </div>
    </section>
</div>