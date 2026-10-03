
<div class="content-wrapper">

    <!-- Header Section -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <a href="<?= base_url('projects_list/'. $projects->category); ?>" class="btn btn-outline-secondary btn-sm mb-2">
                        <i class="fas fa-arrow-left"></i> Back to Properties
                    </a>
                    <h2 class="mb-0">Name: <?= html_escape($projects->project_name); ?></h2>
                    <p class="text-muted mb-0">
                        <i class="fas fa-map-marker-alt text-danger me-1"></i>
                        <?= html_escape($projects->address); ?>
                        <span class="mx-2">•</span>
                        <strong class="text-secondary">ID: <?= html_escape($projects->project_id); ?></strong>
                    </p>
                </div>
                <div class="d-flex gap-2">
                    <a href="<?= base_url('project_update_form/' . $projects->id); ?>" class="btn btn-primary">
                        <i class="fas fa-edit me-1"></i> Edit Project
                    </a>
                    <a href="<?= base_url('delete_project/' . $projects->id); ?>"
                       class="btn btn-outline-danger"
                       onclick="return confirm('Are you sure you want to delete this project?');">
                        <i class="fas fa-trash me-1"></i> Delete
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->

</div>