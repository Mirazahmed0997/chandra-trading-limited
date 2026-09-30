<div class="content-wrapper py-4">

    <!-- Page Header -->
    <div
        class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center pb-3 mb-4 border-bottom gap-3 px-4">
        <div>
            <h4 class="fw-bold mb-1 text-dark d-flex align-items-center gap-2">
                <i class="bi bi-grid-3x3-gap-fill text-primary"></i>
                Project Categories
            </h4>
            <p class="text-muted small mb-0">
                Organize, manage, and filter projects across different categories.
            </p>
        </div>

        <div>
            <a href="<?= base_url('add_project'); ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Project
            </a>
        </div>
    </div>

    <!-- Category Grid -->
    <div class="row g-4">

        <?php if (!empty($categories) && (is_array($categories) || is_object($categories))): ?>

            <?php foreach ($categories as $category): ?>
                <?php
                $catName = $category->category ?? 'Unassigned';
                $count = (int) ($category->project_count ?? 0);
                ?>

                <div class="col-xl-3 col-lg-4 col-md-6">

                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden category-card transition-all">

                        <div class="card-body p-4 d-flex flex-column justify-content-between">

                            <div>
                                <!-- Top Bar: Icon & Badge -->
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div
                                        class="icon-wrapper bg-primary-subtle text-primary rounded-3 p-3 d-inline-flex align-items-center justify-content-center">
                                        <?= htmlspecialchars($catName[0], ENT_QUOTES, 'UTF-8'); ?>
                                        <i class="bi bi-building-gear fs-4"></i>
                                    </div>

                                    <span class="badge rounded-pill bg-light text-secondary border px-3 py-2 fw-semibold">
                                        <i class="bi bi-folder2-open me-1 text-primary"></i>
                                        <?= $count . ' ' . ($count === 1 ? 'Project' : 'Projects'); ?>
                                    </span>
                                </div>

                                <!-- Category Title -->
                                <h5 class="card-title fw-bold text-dark mb-1 text-truncate"
                                    title="<?= htmlspecialchars($catName, ENT_QUOTES, 'UTF-8'); ?>">
                                    <?= htmlspecialchars($catName, ENT_QUOTES, 'UTF-8'); ?>
                                </h5>

                                <!-- <p class="text-muted small mb-0">
                                    Active category portfolio
                                </p> -->
                            </div>

                        </div>

                        <!-- Card Footer Action -->
                        <div class="card-footer bg-light-subtle border-top-0 p-3 pt-0">
                            <a href="<?= base_url('projects_list/' . urlencode($catName)); ?>"
                                class="btn btn-outline-primary btn-sm w-100 rounded-3 py-2 fw-medium d-flex align-items-center justify-content-center gap-2 card-action-btn">
                                <span>View Projects</span>
                                <i class="bi bi-arrow-right transition-icon"></i>
                            </a>
                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <!-- Empty State -->
            <div class="col-12 py-5">
                <div class="text-center p-5 bg-light rounded-4 border border-dashed">
                    <div class="bg-white rounded-circle shadow-sm d-inline-flex p-3 mb-3">
                        <i class="bi bi-folder-x text-muted fs-1"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-1">No Categories Found</h5>
                    <p class="text-muted small mb-3">There are currently no active project categories to display.</p>
                    <a href="<?= base_url('admin/projects/add'); ?>" class="btn btn-sm btn-primary px-3">
                        <i class="bi bi-plus-lg me-1"></i> Create First Project
                    </a>
                </div>
            </div>

        <?php endif; ?>

    </div>

</div>

<!-- Custom CSS for subtle animations -->
<style>
    .transition-all {
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }

    .category-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.08) !important;
    }

    .transition-icon {
        transition: transform 0.2s ease-in-out;
    }

    .card-action-btn:hover .transition-icon {
        transform: translateX(4px);
    }

    .icon-wrapper {
        width: 48px;
        height: 48px;
    }

    /* Bootstrap 5.3 fallback background helpers */
    .bg-primary-subtle {
        background-color: rgba(13, 110, 253, 0.1) !important;
    }
</style>