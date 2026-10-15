<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">Edit Property</h2>
                    <p class="text-muted mb-0">Update property information</p>
                </div>
                <div>
                    <a href="<?= base_url('properties_list'); ?>" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Back to Properties
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <!-- Flash Error Message -->
            <?php if ($this->session->flashdata('property_error')): ?>
                <div class="alert alert-danger alert-dismissible fade show auto-hide-alert" role="alert">
                    <?= $this->session->flashdata('property_error'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <!-- Flash Success Message -->
            <?php if ($this->session->flashdata('property_success')): ?>
                <div class="alert alert-success alert-dismissible fade show auto-hide-alert" role="alert">
                    <?= $this->session->flashdata('property_success'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('update_properties/' . $property->id); ?>" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Property Information</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <!-- Property Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Property Name <span class="text-danger">*</span></label>
                                <input type="text" name="property_name" class="form-control" value="<?= html_escape($property->property_name); ?>" required>
                            </div>

                            <!-- Property ID -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Property ID <span class="text-danger">*</span></label>
                                <input type="text" name="property_id" class="form-control" value="<?= html_escape($property->property_id); ?>" required>
                            </div>

                            <!-- Property Type -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Property Type <span class="text-danger">*</span></label>
                                <select name="property_type" class="form-select" required>
                                    <option value="">Select Property Type</option>
                                    <option value="Residential" <?= $property->property_type == 'Residential' ? 'selected' : ''; ?>>Residential</option>
                                    <option value="Commercial" <?= $property->property_type == 'Commercial' ? 'selected' : ''; ?>>Commercial</option>
                                    <option value="Land" <?= $property->property_type == 'Land' ? 'selected' : ''; ?>>Land</option>
                                    <option value="Apartment" <?= $property->property_type == 'Apartment' ? 'selected' : ''; ?>>Apartment</option>
                                </select>
                            </div>

                            <!-- Location -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Location <span class="text-danger">*</span></label>
                                <input type="text" name="location" class="form-control" value="<?= html_escape($property->location); ?>" required>
                            </div>

                            <!-- Price -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Price</label>
                                <input type="text" name="price" class="form-control" value="<?= html_escape($property->price); ?>">
                            </div>

                            <!-- Size -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Size</label>
                                <input type="text" name="size" class="form-control" value="<?= html_escape($property->size); ?>">
                            </div>

                            <!-- Bedrooms -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Bedrooms</label>
                                <input type="number" name="bedrooms" class="form-control" value="<?= html_escape($property->bedrooms); ?>">
                            </div>

                            <!-- Bathrooms -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Bathrooms</label>
                                <input type="number" name="bathrooms" class="form-control" value="<?= html_escape($property->bathrooms); ?>">
                            </div>

                            <!-- Floor -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Floor</label>
                                <input type="text" name="floor" class="form-control" value="<?= html_escape($property->floor); ?>">
                            </div>

                            <!-- Parking -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Parking</label>
                                <input type="text" name="parking" class="form-control" value="<?= html_escape($property->parking); ?>">
                            </div>

                            <!-- Map Location -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Map Location</label>
                                <input type="text" name="map_location" class="form-control" value="<?= html_escape($property->map_location); ?>">
                            </div>

                            <!-- Description -->
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="5"><?= html_escape($property->description); ?></textarea>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="Draft" <?= $property->status == 'Draft' ? 'selected' : ''; ?>>Draft</option>
                                    <option value="Published" <?= $property->status == 'Published' ? 'selected' : ''; ?>>Published</option>
                                    <option value="Sold" <?= $property->status == 'Sold' ? 'selected' : ''; ?>>Sold</option>
                                </select>
                            </div>

                            <!-- Featured -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label d-block">Featured Property</label>
                                <div class="form-check form-switch mt-2">
                                    <input class="form-check-input" type="checkbox" name="featured" value="1" <?= $property->featured == 1 ? 'checked' : ''; ?>>
                                    <label class="form-check-label">Show as featured property</label>
                                </div>
                            </div>

                            <!-- Property Gallery Images -->
                            <div class="col-12 mt-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Property Images</h5>
                                    </div>
                                    <div class="card-body">
                                        <?php if (!empty($gallery_images)): ?>
                                            <div class="row mb-4">
                                                <?php foreach ($gallery_images as $image): ?>
                                                    <div class="col-md-3 mb-3">
                                                        <div class="border rounded p-2 text-center position-relative">
                                                            <img src="<?= base_url('assets/uploads/properties/images/' . $image); ?>" class="img-fluid rounded" style="width:100%; height:160px; object-fit:cover;">
                                                            <div class="mt-2">
                                                                <a href="<?= base_url('Admin_Properties/delete_property_image/' . $property->id . '/' . urlencode($image)); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this image?');">
                                                                    <i class="bi bi-trash"></i> Delete
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php else: ?>
                                            <p class="text-muted">No images available.</p>
                                        <?php endif; ?>

                                        <label class="form-label">Add New Images</label>
                                        <input type="file" name="gallery[]" class="form-control" multiple accept=".jpg,.jpeg,.png,.webp">
                                        <small class="text-muted">Existing images will remain. New images will be added.</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Floor Plan -->
                            <div class="col-12 mt-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Floor Plan</h5>
                                    </div>
                                    <div class="card-body">
                                        <?php if (!empty($property->floor_plan)): ?>
                                            <div class="mb-3">
                                                <?php $floor_ext = strtolower(pathinfo($property->floor_plan, PATHINFO_EXTENSION)); ?>
                                                <?php if (in_array($floor_ext, ['jpg', 'jpeg', 'png', 'webp'])): ?>
                                                    <img src="<?= base_url('assets/uploads/properties/floor_plan/' . $property->floor_plan); ?>" class="img-fluid rounded border" style="max-width:300px; max-height:200px; object-fit:contain;">
                                                <?php else: ?>
                                                    <a href="<?= base_url('assets/uploads/properties/floor_plan/' . $property->floor_plan); ?>" target="_blank" class="btn btn-outline-primary">
                                                        <i class="bi bi-file-earmark"></i> View Current Floor Plan
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>

                                        <label class="form-label">Replace Floor Plan</label>
                                        <input type="file" name="floor_plan" class="form-control" accept=".jpg,.jpeg,.png,.webp,.pdf">
                                        <small class="text-muted">Leave empty to keep current floor plan.</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Brochure -->
                            <div class="col-12 mt-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Brochure</h5>
                                    </div>
                                    <div class="card-body">
                                        <?php if (!empty($property->brochure)): ?>
                                            <div class="mb-3">
                                                <a href="<?= base_url('assets/uploads/properties/brochure/' . $property->brochure); ?>" target="_blank" class="btn btn-outline-danger">
                                                    <i class="bi bi-file-earmark-pdf"></i> View Current Brochure
                                                </a>
                                            </div>
                                        <?php endif; ?>

                                        <label class="form-label">Replace Brochure</label>
                                        <input type="file" name="brochure" class="form-control" accept=".pdf,.doc,.docx">
                                        <small class="text-muted">Leave empty to keep current brochure.</small>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 mt-3 mb-5">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="bi bi-check-lg me-2"></i> Save Property
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>




<script>
    setTimeout(function () {
        const alerts = document.querySelectorAll('.auto-hide-alert');

        alerts.forEach(function (alert) {
            alert.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-10px)';

            setTimeout(function () {
                alert.remove();
            }, 500);
        });
    }, 3000); // 3 seconds
</script>