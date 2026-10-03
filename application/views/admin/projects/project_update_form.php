<?php
$categories = $this->db
    ->order_by('name', 'ASC')
    ->get('property_categories')
    ->result();

$types = $this->db
    ->order_by('name', 'ASC')
    ->get(' property_types')
    ->result();


// echo '<pre>';
// print_r($data['categories']);
// echo '</pre>';
// exit;
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <a href="<?= base_url('properties_list'); ?>" class="btn btn-outline-secondary btn-sm mb-2">
                        <i class="fas fa-arrow-left"></i> Back to Properties
                    </a>
                    <h2 class="mb-0">Edit Project</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Form -->
    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <form action="<?= base_url('update_project/'.$projects->id); ?>" method="post">
                        <!-- Hidden ID -->
                        <input type="hidden" name="id" value="<?= html_escape($projects->id); ?>">

                        <div class="row">
                            <!-- Project Name -->
                            <div class="col-md-6 mb-3">
                                <label for="project_name" class="form-label">Project Name</label>
                                <input type="text" class="form-control" id="project_name" name="project_name"
                                    value="<?= html_escape($projects->project_name); ?>" required>
                            </div>

                            <!-- Project ID -->
                            <div class="col-md-6 mb-3">
                                <label for="project_id" class="form-label">Project Code / ID</label>
                                <input type="text" class="form-control" id="project_id" name="project_id"
                                    value="<?= html_escape($projects->project_id); ?>" required readonly>
                            </div>

                            <!-- Category -->
                            <div class="col-md-6 mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select form-control" id="category" name="category" required>
                                    <!-- <option value="">Select Category</option> -->


                                    <option value="<?= $projects->category; ?>">
                                        <?= htmlspecialchars($projects->category); ?>
                                    </option>


                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?= $category->name; ?>">
                                            <?= htmlspecialchars($category->name); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>

                            </div>

                            <!-- Status -->
                            <!-- <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select form-control" id="status" name="status" required>
                                    <option value="Draft" <?= ($projects->status == 'Draft') ? 'selected' : ''; ?>>Draft
                                    </option>
                                    <option value="Active" <?= ($projects->status == 'Active') ? 'selected' : ''; ?>>Active
                                    </option>
                                    <option value="Completed" <?= ($projects->status == 'Completed') ? 'selected' : ''; ?>>
                                        Completed</option>
                                    <option value="Inactive" <?= ($projects->status == 'Inactive') ? 'selected' : ''; ?>>
                                        Inactive</option>
                                </select>
                            </div> -->

                            <!-- Address -->
                            <div class="col-md-12 mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3"
                                    required><?= html_escape($projects->address); ?></textarea>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="d-flex justify-content-end gap-2 mt-3">
                            <a href="<?= base_url('projects_list/'.$projects->category); ?>" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>