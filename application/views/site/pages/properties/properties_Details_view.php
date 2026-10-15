<div class="content-wrapper py-4 bg-light">
    <div class="container">

        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('properties'); ?>">Properties</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= html_escape($property->property_name); ?>
                </li>
            </ol>
        </nav>

        <div class="card border-0 shadow-sm mb-4 overflow-hidden">
            <div class="card-body p-4">
                <div class="row g-4">

                    <div class="col-lg-7">
                        <?php
                        $gallery = !empty($property->gallery) ? json_decode($property->gallery, true) : [];
                        $main_image = !empty($gallery) ? $gallery[0] : 'default.jpg';
                        ?>

                        <div class="main-image-container mb-3 border rounded overflow-hidden text-center bg-white d-flex align-items-center justify-content-center"
                            style="height: 400px;">
                            <a href="<?= base_url('./assets/uploads/properties/images/' . $main_image); ?>"
                                id="main-img-link" target="_blank" class="w-100 h-100">
                                <img src="<?= base_url('./assets/uploads/properties/images/' . $main_image); ?>"
                                    id="main-product-img" class="img-fluid h-100 w-100"
                                    style="object-fit: content; object-position: center;" alt="Property Preview">
                            </a>
                        </div>

                        <?php if (!empty($gallery) && is_array($gallery)): ?>
                            <div class="row g-2 thumbnail-grid">
                                <?php foreach ($gallery as $index => $img): ?>
                                    <div class="col-3 col-sm-2">
                                        <img src="<?= base_url('./assets/uploads/properties/images/' . $img); ?>"
                                            class="img-thumbnail thumb-img <?= $index === 0 ? 'border-primary' : ''; ?>"
                                            style="height: 70px; width: 100%; object-fit: cover; cursor: pointer;"
                                            onclick="switchMainImage(this.src)" alt="Thumbnail">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-lg-5 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <span
                                    class="badge bg-secondary text-uppercase px-2 py-1"><?= html_escape($property->property_type); ?></span>
                                <span class="text-muted small">ID:
                                    <strong><?= html_escape($property->property_id); ?></strong></span>
                            </div>

                            <h2 class="fw-bold mb-2"><?= html_escape($property->property_name); ?></h2>

                            <p class="text-muted mb-3">
                                <i class="fas fa-map-marker-alt text-danger me-1"></i>
                                <?= html_escape($property->location); ?>
                            </p>

                            <hr class="my-3">

                            <div class="price-box mb-4">
                                <span class="text-muted small d-block mb-1">Listing Price</span>
                                <div class="d-flex align-items-baseline gap-2">
                                    <h2 class="text-success fw-bold mb-0">
                                        <?= !empty($property->price) ? '৳' . number_format($property->price, 2) : 'Price on Request'; ?>
                                    </h2>
                                </div>
                            </div>

                            <div class="row g-2 mb-4 text-center">
                                <div class="col-4">
                                    <div class="p-2 border rounded bg-light">
                                        <i class="fas fa-ruler-combined text-primary mb-1"></i>
                                        <span class="d-block small text-muted">Area</span>
                                        <strong
                                            class="small"><?= !empty($property->size) ? html_escape($property->size) : 'N/A'; ?></strong>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="p-2 border rounded bg-light">
                                        <i class="fas fa-bed text-primary mb-1"></i>
                                        <span class="d-block small text-muted">Bedrooms</span>
                                        <strong
                                            class="small"><?= $property->bedrooms !== NULL ? (int) $property->bedrooms : 'N/A'; ?></strong>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="p-2 border rounded bg-light">
                                        <i class="fas fa-bath text-primary mb-1"></i>
                                        <span class="d-block small text-muted">Bathrooms</span>
                                        <strong
                                            class="small"><?= $property->bathrooms !== NULL ? (int) $property->bathrooms : 'N/A'; ?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="action-box bg-light p-3 border rounded">
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-primary btn-lg fw-semibold" data-bs-toggle="modal"
                                    data-bs-target="#bookingModal">
                                    <i class="fas fa-shopping-cart me-2"></i> Book Now
                                </button>

                                <div class="d-flex gap-2">
                                    <!-- <button type="button" class="btn btn-outline-secondary w-50" onclick="window.print()">
                                        <i class="fas fa-print me-1"></i> Print Sheet
                                    </button> -->
                                    <?php if (!empty($property->brochure)): ?>
                                        <a href="<?= base_url('./assets/uploads/properties/brochure/' . $property->brochure); ?>"
                                            target="_blank" class="btn btn-outline-dark w-100">
                                            <i class="fas fa-file-pdf me-1"></i> Brochure
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom-0 pt-3 px-4">
                <ul class="nav nav-tabs card-header-tabs" id="propertyTab" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active fw-semibold" id="desc-tab" data-bs-toggle="tab"
                            data-bs-target="#desc" type="button" role="tab">Description</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link fw-semibold" id="specs-tab" data-bs-toggle="tab" data-bs-target="#specs"
                            type="button" role="tab">Specifications</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link fw-semibold" id="floorplan-tab" data-bs-toggle="tab"
                            data-bs-target="#floorplan" type="button" role="tab">Floor Plan</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link fw-semibold" id="location-tab" data-bs-toggle="tab"
                            data-bs-target="#location" type="button" role="tab">Location & Map</button>
                    </li>
                </ul>
            </div>

            <div class="card-body p-4">
                <div class="tab-content" id="propertyTabContent">

                    <div class="tab-pane fade show active" id="desc" role="tabpanel">
                        <h5 class="fw-bold mb-3">About This Property</h5>
                        <?php if (!empty($property->description)): ?>
                            <p class="text-secondary" style="line-height: 1.8; font-size: 1.05rem;">
                                <?= nl2br(html_escape($property->description)); ?>
                            </p>
                        <?php else: ?>
                            <p class="text-muted">No description provided for this property.</p>
                        <?php endif; ?>
                    </div>

                    <div class="tab-pane fade" id="specs" role="tabpanel">
                        <h5 class="fw-bold mb-3">Full Technical Details</h5>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <th width="30%">Property ID</th>
                                        <td><?= html_escape($property->property_id); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Property Type</th>
                                        <td><?= html_escape($property->property_type); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Location</th>
                                        <td><?= html_escape($property->location); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        <td><?= !empty($property->price) ? '৳' . number_format($property->price, 2) : 'N/A'; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Total Area</th>
                                        <td><?= !empty($property->size) ? html_escape($property->size) : 'N/A'; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Bedrooms</th>
                                        <td><?= $property->bedrooms !== NULL ? (int) $property->bedrooms : 'N/A'; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Bathrooms</th>
                                        <td><?= $property->bathrooms !== NULL ? (int) $property->bathrooms : 'N/A'; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Amenities</th>
                                        <td>
                                            <?php
                                            $amenities = json_decode($property->amenities, true);
                                            ?>

                                            <?php if (!empty($amenities) && is_array($amenities)): ?>

                                                <div class="d-flex flex-wrap gap-2">

                                                    <?php foreach ($amenities as $amenity): ?>

                                                        <span class="badge bg-primary">
                                                            <?= html_escape($amenity); ?>
                                                        </span>

                                                    <?php endforeach; ?>

                                                </div>

                                            <?php else: ?>

                                                <span class="text-muted">N/A</span>

                                            <?php endif; ?>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="floorplan" role="tabpanel">
                        <h5 class="fw-bold mb-3">Floor Plan & Layout</h5>
                        <?php if (!empty($property->floor_plan)): ?>
                            <?php $ext = pathinfo($property->floor_plan, PATHINFO_EXTENSION); ?>
                            <?php if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'webp', 'gif'])): ?>
                                <div class="text-center bg-light p-3 border rounded">
                                    <a href="<?= base_url('./assets/uploads/properties/floor_plan/' . $property->floor_plan); ?>"
                                        target="_blank">
                                        <img src="<?= base_url('./assets/uploads/properties/floor_plan/' . $property->floor_plan); ?>"
                                            class="img-fluid rounded" style="max-height: 500px;" alt="Floor Plan">
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="alert alert-info">
                                    <i class="fas fa-file-pdf me-2"></i> Standard document available.
                                    <a href="<?= base_url('./assets/uploads/properties/floor_plan/' . $property->floor_plan); ?>"
                                        target="_blank" class="fw-bold ms-2">Download Floorplan Document</a>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <p class="text-muted">No floor plan has been uploaded for this listing.</p>
                        <?php endif; ?>
                    </div>

                    <div class="tab-pane fade" id="location" role="tabpanel">
                        <h5 class="fw-bold mb-3">Map & Surroundings</h5>
                        <div class="ratio ratio-21x9 rounded overflow-hidden border">
                            <iframe src="<?= html_escape($property->map_location); ?>" style="border:0;"
                                allowfullscreen="" loading="lazy"
                                referrerpolicy="strict-origin-when-cross-origin"></iframe>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>


<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="bookingModalLabel">
                    Book Property
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <form action="<?= base_url('property_book/' . $property->id); ?>" method="POST">

                <div class="modal-body">

                    <!-- Property ID -->
                    <input type="hidden" name="property_id" value="<?= $property->id; ?>">

                    <!-- Booking Date -->
                    <!-- <div class="mb-3">
                        <label for="booking_date" class="form-label fw-semibold">
                            Booking Date <span class="text-danger">*</span>
                        </label>

                        <input type="date" name="booking_date" id="booking_date" class="form-control"
                            min="<?= date('Y-m-d'); ?>" required>
                    </div> -->

                    <!-- Notes -->
                    <div class="mb-3">
                        <label for="notes" class="form-label fw-semibold">
                            Notes
                        </label>

                        <textarea name="notes" id="notes" class="form-control" rows="4"
                            placeholder="Enter any additional notes..."></textarea>
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check me-2"></i>
                        Confirm Booking
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>

<script>
    function switchMainImage(src) {
        document.getElementById('main-product-img').src = src;
        document.getElementById('main-img-link').href = src;

        // Highlight thumbnail border
        document.querySelectorAll('.thumb-img').forEach(img => img.classList.remove('border-primary'));
        event.target.classList.add('border-primary');
    }
</script>