<div class="content-wrapper">

    <!-- Header Section -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <a href="<?= base_url('properties_list'); ?>" class="btn btn-outline-secondary btn-sm mb-2">
                        <i class="fas fa-arrow-left"></i> Back to Properties
                    </a>
                    <h2 class="mb-0"><?= html_escape($property->property_name); ?></h2>
                    <p class="text-muted mb-0">
                        <i class="fas fa-map-marker-alt text-danger me-1"></i>
                        <?= html_escape($property->location); ?>
                        <span class="mx-2">•</span>
                        <strong class="text-secondary">ID: <?= html_escape($property->property_id); ?></strong>
                    </p>
                </div>
                <div class="d-flex gap-2">
                    <a href="<?= base_url('admin/properties/edit/' . $property->id); ?>" class="btn btn-primary">
                        <i class="fas fa-edit me-1"></i> Edit Property
                    </a>
                    <a href="<?= base_url('admin/properties/delete/' . $property->id); ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this property?');">
                        <i class="fas fa-trash me-1"></i> Delete
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- Left Column: Details & Overview -->
                <div class="col-lg-8">

                    <!-- Key Metrics Overview -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-6 col-md-3 border-end">
                                    <span class="text-muted d-block small mb-1">Price</span>
                                    <h4 class="text-success fw-bold mb-0">
                                        <?= !empty($property->price) ? '৳' . number_format($property->price, 2) : 'N/A'; ?>
                                    </h4>
                                </div>
                                <div class="col-6 col-md-3 border-end">
                                    <span class="text-muted d-block small mb-1">Property Type</span>
                                    <h5 class="fw-semibold mb-0"><?= html_escape($property->property_type); ?></h5>
                                </div>
                                <div class="col-6 col-md-3 border-end mt-3 mt-md-0">
                                    <span class="text-muted d-block small mb-1">Size</span>
                                    <h5 class="fw-semibold mb-0"><?= !empty($property->size) ? html_escape($property->size) : 'N/A'; ?></h5>
                                </div>
                                <div class="col-6 col-md-3 mt-3 mt-md-0">
                                    <span class="text-muted d-block small mb-1">Bed / Bath</span>
                                    <h5 class="fw-semibold mb-0">
                                        <?php if ($property->bedrooms !== NULL): ?>
                                            <!-- <i class="fas fa-bed text-muted me-1"> -->

                                            </i><?= (int)$property->bedrooms; ?> 
                                            <span class="text-muted mx-1">/</span> 
                                            <!-- <i class="fas fa-bath text-muted me-1"></i> -->
                                            <?= (int)$property->bathrooms; ?>
                                        <?php else: ?>
                                            N/A
                                        <?php endif; ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Property Description</h5>
                        </div>
                        <div class="card-body">
                            <?php if (!empty($property->description)): ?>
                                <p class="mb-0 text-secondary" style="line-height: 1.7;"><?= nl2br(html_escape($property->description)); ?></p>
                            <?php else: ?>
                                <p class="text-muted mb-0">No description provided for this property.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Key Specifications Table -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Detailed Specifications</h5>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped mb-0">
                                <tbody>
                                    <tr>
                                        <th width="35%" class="ps-4">Property Code / ID</th>
                                        <td><?= html_escape($property->property_id); ?></td>
                                    </tr>
                                    <tr>
                                        <th class="ps-4">Type</th>
                                        <td><?= html_escape($property->property_type); ?></td>
                                    </tr>
                                    <tr>
                                        <th class="ps-4">Location</th>
                                        <td><?= html_escape($property->location); ?></td>
                                    </tr>
                                    <tr>
                                        <th class="ps-4">Price</th>
                                        <td><?= !empty($property->price) ? '৳' . number_format($property->price, 2) : 'N/A'; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="ps-4">Total Area / Size</th>
                                        <td><?= !empty($property->size) ? html_escape($property->size) : 'N/A'; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="ps-4">Bedrooms</th>
                                        <td><?= $property->bedrooms !== NULL ? (int)$property->bedrooms : 'N/A'; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="ps-4">Bathrooms</th>
                                        <td><?= $property->bathrooms !== NULL ? (int)$property->bathrooms : 'N/A'; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <!-- Right Column: Status, Media & System Info -->
                <div class="col-lg-4">

                    <!-- Status & Visibility -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Status & Visibility</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span>Publication Status</span>
                                    <?php
                                    $status_class = 'secondary';
                                    if ($property->status == 'Published') {
                                        $status_class = 'success';
                                    } elseif ($property->status == 'Available') {
                                        $status_class = 'primary';
                                    } elseif ($property->status == 'Draft') {
                                        $status_class = 'warning text-dark';
                                    }
                                    ?>
                                    <span class="badge bg-<?= $status_class; ?>"><?= html_escape($property->status); ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span>Featured Listing</span>
                                    <?php if ($property->featured == 1): ?>
                                        <span class="badge bg-warning text-dark"><i class="fas fa-star me-1"></i> Featured</span>
                                    <?php else: ?>
                                        <span class="text-muted">Standard</span>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Property Gallery -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Media Gallery</h5>
                        </div>
                        <div class="card-body">
                            <?php 
                                $gallery = !empty($property->gallery) ? json_decode($property->gallery, true) : [];
                            ?>
                            <?php if (!empty($gallery) && is_array($gallery)): ?>
                                <div class="row g-2">
                                    <?php foreach ($gallery as $img): ?>
                                        <div class="col-4">
                                            <a href="<?= base_url('./assets/uploads/properties/images/' . $img); ?>" target="_blank">
                                                <img src="<?= base_url('./assets/uploads/properties/images/' . $img); ?>" class="img-fluid rounded border" style="height: 80px; width: 100%; object-fit: cover;" alt="Gallery Image">
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <p class="text-muted mb-0 small">No gallery images uploaded.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Floor Plan -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Floor Plan</h5>
                        </div>
                        <div class="card-body">
                            <?php if (!empty($property->floor_plan)): ?>
                                <?php $ext = pathinfo($property->floor_plan, PATHINFO_EXTENSION); ?>
                                <?php if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'webp', 'gif'])): ?>
                                    <a href="<?= base_url('./assets/uploads/properties/floor_plan/' . $property->floor_plan); ?>" target="_blank">
                                        <img src="<?= base_url('./assets/uploads/properties/floor_plan/' . $property->floor_plan); ?>" class="img-fluid rounded border w-100" style="max-height: 200px; object-fit: contain;" alt="Floor Plan">
                                    </a>
                                <?php else: ?>
                                    <a href="<?= base_url('./assets/uploads/properties/floor_plan/' . $property->floor_plan); ?>" target="_blank" class="btn btn-outline-primary btn-sm w-100">
                                        <i class="fas fa-file-download me-1"></i> View / Download Document
                                    </a>
                                <?php endif; ?>
                            <?php else: ?>
                                <p class="text-muted mb-0 small">No floor plan file uploaded.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-header bg-white">
                            <h5 class="mb-0">Brochure</h5>
                        </div>
                        <div class="card-body">
                            <?php if (!empty($property->brochure)): ?>
                                <?php $ext = pathinfo($property->brochure, PATHINFO_EXTENSION); ?>
                                <?php if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'webp', 'gif'])): ?>
                                    <a href="<?= base_url('./assets/uploads/properties/brochure/' . $property->brochure); ?>" target="_blank">
                                        <img src="<?= base_url('./assets/uploads/properties/brochure/' . $property->brochure); ?>" class="img-fluid rounded border w-100" style="max-height: 200px; object-fit: contain;" alt="Floor Plan">
                                    </a>
                                <?php else: ?>
                                    <a href="<?= base_url('./assets/uploads/properties/brochure/' . $property->brochure); ?>" target="_blank" class="btn btn-outline-primary btn-sm w-100">
                                        <i class="fas fa-file-download me-1"></i> View / Download Document
                                    </a>
                                <?php endif; ?>
                            <?php else: ?>
                                <p class="text-muted mb-0 small">No floor plan file uploaded.</p>
                            <?php endif; ?>
                        </div>


                         <!-- System Log -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">System Log</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <small class="text-muted d-block">Created At</small>
                                <span><?= !empty($property->created_at) ? date('F j, Y, g:i a', strtotime($property->created_at)) : 'N/A'; ?></span>
                            </div>
                            <div>
                                <small class="text-muted d-block">Last Updated</small>
                                <span><?= !empty($property->updated_at) ? date('F j, Y, g:i a', strtotime($property->updated_at)) : 'N/A'; ?></span>
                            </div>
                        </div>
                    </div>
                    </div>

                   

                </div>

            </div>
        </div>
    </section>
</div>