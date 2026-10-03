<?php

echo '<pre>';
        print_r($category);
        echo '</pre>';
        // exit;

?>

<div class="content-wrapper">

    <!-- Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">Properties</h2>
                    <p class="text-muted mb-0">Manage all projects listings</p>
                </div>
                <div>
                    <a href="<?= base_url('add_project/'. urlencode($category)); ?>" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add Property
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
                    <form method="get" action="<?= base_url('projects_list/' . urlencode($category)); ?>">
                        <div class="row g-3">

                            <!-- Search -->
                            <div class="col-md-4">
                                <label class="form-label">Search Property</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    <input type="text" name="search" class="form-control"
                                        placeholder="Name, ID or location" value="<?= html_escape($search); ?>">
                                </div>
                            </div>

                            <!-- Property Type -->
                           

                            <!-- Status -->
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

                          

                            <!-- Actions -->
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary me-2">
                                    <i class="fas fa-filter"></i> Filter
                                </button>
                                <a href="<?= base_url('projects_list/' . urlencode($category)); ?>" class="btn btn-light border">Reset</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <!-- Property Table -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0">Property List</h5>
                            <small class="text-muted"><?= number_format($total_rows); ?> Project found</small>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th width="60">#</th>
                                    <th>Project</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Category</th>
                                    <th width="140">Action</th>
                                    <th width=""></th>
                                    <th width=""></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($projects)): ?>
                                    <?php $sl = $sl_start; ?>
                                    <?php foreach ($projects as $project): ?>
                                        <tr>
                                            <td><?= $sl++; ?></td>
                                            <td>
                                                <div class="fw-semibold"><?= html_escape($project->project_name); ?></div>
                                                <small class="text-muted">ID:
                                                    <?= html_escape($project->project_id); ?></small>
                                            </td>
                                            
                                            <td>
                                                <i class="fas fa-map-marker-alt text-danger me-1"></i>
                                                <?= html_escape($project->address); ?>
                                            </td>
                                             <td>
                                                <?php
                                                $status_class = 'secondary';
                                                if ($project->status == 'Published') {
                                                    $status_class = 'success';
                                                } elseif ($project->status == 'Sold') {
                                                    $status_class = 'primary';
                                                } elseif ($project->status == 'Draft') {
                                                    $status_class = 'warning text-dark';
                                                } elseif ($project->status == 'Reserved') {
                                                    $status_class = 'warning text-dark';
                                                }
                                                ?>
                                                <span
                                                    class="badge bg-<?= $status_class; ?>"><?= html_escape($project->status); ?></span>
                                            </td>
                                           
                                            <td>
                                                <?= !empty($project->category) ? html_escape($project->category) : 'N/A'; ?>
                                            </td>
                                          
                                           
                                          
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?= base_url('projects_details/' . $project->id); ?>"
                                                        class="btn btn-sm btn-outline-info" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="<?= base_url('project_update_form/' . $project->id); ?>"
                                                        class="btn btn-sm btn-outline-primary" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="<?= base_url('delete_project/' . $project->id); ?>"
                                                        class="btn btn-sm btn-outline-danger" title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete this property?');">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="10" class="text-center py-5">
                                            <div class="text-muted">
                                                <i class="fas fa-home fa-3x mb-3"></i>
                                                <p class="mb-0">No properties found matching your criteria.</p>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Footer with Pagination -->
                <?php if (!empty($pagination)): ?>
                    <div class="card-footer bg-white d-flex justify-content-between align-items-center py-3">
                        <small class="text-muted">
                            Showing <?= min($sl_start, $total_rows); ?> to
                            <?= min($sl_start + count($properties) - 1, $total_rows); ?> of
                            <?= number_format($total_rows); ?> entries
                        </small>
                        <nav><?= $pagination; ?></nav>
                    </div>
                <?php endif; ?>

            </div>

        </div>
    </section>
</div>