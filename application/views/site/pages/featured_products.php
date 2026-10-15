<?php
$projects = $this->db
    ->order_by('created_at', 'DESC')
    ->where('featured', 1)
    ->where('status', 'Published')
    ->limit(4)
    ->get('properties')
    ->result_array();
?>

<!-- Featured Projects Section -->
<section class="py-5 mt-4">
    <div class="container">

        <!-- Section Header -->
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <span class="text-muted text-uppercase fw-semibold small">
                    <?= lang('Our_Projects'); ?>
                </span>

                <h2 class="fw-bold mb-0">
                    <?= lang('Featured_Projects'); ?>
                </h2>
            </div>

            <a href="<?= base_url('properties'); ?>" class="btn btn-outline-green">
                View All Projects
            </a>
        </div>

        <!-- Projects -->
        <div class="row g-4">

            <?php if (!empty($projects)): ?>

                <?php foreach ($projects as $project): ?>

                    <?php
                    // Default image
                    $image = base_url('assets/frontend/images/default-property.jpg');

                    // Get first gallery image
                    if (!empty($project['gallery'])) {

                        $gallery = json_decode($project['gallery'], true);

                        if (is_array($gallery) && !empty($gallery)) {

                            $first_image = reset($gallery);

                            if (!empty($first_image)) {
                                $image = base_url('assets/uploads/properties/images/' . $first_image);
                            }
                        }
                    }
                    ?>

                    <div class="col-md-6 col-lg-3">

                        <div class="card h-100 border-0 shadow-sm overflow-hidden">

                            <!-- Property Image -->
                            <div class="property-image-wrapper">

                                <img
                                    src="<?= htmlspecialchars($image); ?>"
                                    class="card-img-top property-card-image"
                                    alt="<?= htmlspecialchars($project['property_name']); ?>"
                                
                                >

                                <!-- <?php if (!empty($project['featured']) && $project['featured'] == 1): ?>
                                    <span class="featured-badge">
                                        <i class="bi bi-star-fill me-1"></i>
                                        Featured
                                    </span>
                                <?php endif; ?> -->

                            </div>

                            <!-- Property Content -->
                            <div class="card-body d-flex flex-column">

                                <h5 class="card-title fw-bold mb-2">
                                    <?= htmlspecialchars($project['property_name']); ?>
                                </h5>

                                <!-- Location -->
                                <?php if (!empty($project['location'])): ?>
                                    <p class="text-muted small mb-2">
                                        <i class="bi bi-geo-alt me-1"></i>
                                        <?= htmlspecialchars($project['location']); ?>
                                    </p>
                                <?php endif; ?>

                                <hr>

                                <!-- Property Type -->
                                <?php if (!empty($project['property_type'])): ?>
                                    <div class="d-flex align-items-center small text-muted mb-2">
                                        <i class="bi bi-building me-2"></i>
                                        <span>
                                            <?= htmlspecialchars($project['property_type']); ?>
                                        </span>
                                    </div>
                                <?php endif; ?>

                                <!-- Size -->
                                <?php if (!empty($project['size'])): ?>
                                    <div class="d-flex align-items-center small text-muted mb-3">
                                        <i class="bi bi-aspect-ratio me-2"></i>
                                        <span>
                                            <?= htmlspecialchars($project['size']); ?>
                                        </span>
                                    </div>
                                <?php endif; ?>

                                <!-- View Details -->
                                <a
                                    href="<?= base_url('properties_details_view/' . $project['id']); ?>"
                                    class="btn btn-green w-100 mt-auto"
                                >
                                    View Details
                                </a>

                            </div>
                        </div>

                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <!-- No Projects -->
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="bi bi-building fs-1 text-muted"></i>

                        <h5 class="mt-3">
                            No Featured Projects Available
                        </h5>

                        <p class="text-muted mb-0">
                            Featured projects will appear here.
                        </p>
                    </div>
                </div>

            <?php endif; ?>

        </div>
    </div>
</section>


<style>
    .property-card-image{
        height: 300px;
    }
</style>