<div class="content-wrapper">

    <!-- Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">Properties</h2>
                    <p class="text-muted mb-0">Manage all property listings</p>
                </div>
                <div>
                    <a href="<?= base_url('add_properties'); ?>" class="btn btn-primary">
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
                    <form method="get" action="<?= base_url('properties_list'); ?>">
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
                            <div class="col-md-2">
                                <label class="form-label">Property Type</label>
                                <select name="property_type" class="form-control">
                                    <option value="">All Types</option>
                                    <option value="Apartment" <?= ($property_type == 'Apartment') ? 'selected' : ''; ?>>
                                        Apartment</option>
                                    <option value="Villa" <?= ($property_type == 'Villa') ? 'selected' : ''; ?>>Villa
                                    </option>
                                    <option value="Plot" <?= ($property_type == 'Plot') ? 'selected' : ''; ?>>Plot</option>
                                    <option value="Commercial" <?= ($property_type == 'Commercial') ? 'selected' : ''; ?>>
                                        Commercial</option>
                                    <option value="Office" <?= ($property_type == 'Office') ? 'selected' : ''; ?>>Office
                                    </option>
                                </select>
                            </div>

                            <!-- Status -->
                            <div class="col-md-2">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="">All Status</option>
                                    <option value="Published" <?= ($status == 'Published') ? 'selected' : ''; ?>>Published
                                    </option>
                                    <option value="Available" <?= ($status == 'Available') ? 'selected' : ''; ?>>Available
                                    </option>
                                    <option value="Draft" <?= ($status == 'Draft') ? 'selected' : ''; ?>>Draft</option>
                                </select>
                            </div>

                            <!-- Featured -->
                            <div class="col-md-2">
                                <label class="form-label">Featured</label>
                                <select name="featured" class="form-control">
                                    <option value="">All</option>
                                    <option value="1" <?= ($featured === '1') ? 'selected' : ''; ?>>Featured</option>
                                    <option value="0" <?= ($featured === '0') ? 'selected' : ''; ?>>Not Featured</option>
                                </select>
                            </div>
                            <!-- Min Price -->
                            <div class="col-md-2">
                                <label class="form-label">Min Price</label>
                                <input type="number" step="any" name="min_price" class="form-control"
                                    placeholder="Min ৳"
                                    value="<?= html_escape(isset($min_price) ? $min_price : ''); ?>">
                            </div>

                            <!-- Max Price -->
                            <div class="col-md-2">
                                <label class="form-label">Max Price</label>
                                <input type="number" step="any" name="max_price" class="form-control"
                                    placeholder="Max ৳"
                                    value="<?= html_escape(isset($max_price) ? $max_price : ''); ?>">
                            </div>

                            <!-- Actions -->
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary me-2">
                                    <i class="fas fa-filter"></i> Filter
                                </button>
                                <a href="<?= base_url('properties_list'); ?>" class="btn btn-light border">Reset</a>
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
                            <small class="text-muted"><?= number_format($total_rows); ?> properties found</small>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th width="60">#</th>
                                    <th>Property</th>
                                    <th>Type</th>
                                    <th>Location</th>
                                    <th>Price</th>
                                    <th>Size</th>
                                    <th>Beds / Baths</th>
                                    <th>Featured</th>
                                    <th>Status</th>
                                    <th width="140">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($properties)): ?>
                                    <?php $sl = $sl_start; ?>
                                    <?php foreach ($properties as $property): ?>
                                        <tr>
                                            <td><?= $sl++; ?></td>
                                            <td>
                                                <div class="fw-semibold"><?= html_escape($property->property_name); ?></div>
                                                <small class="text-muted">ID:
                                                    <?= html_escape($property->property_id); ?></small>
                                            </td>
                                            <td>
                                                <span class="badge bg-info"><?= html_escape($property->property_type); ?></span>
                                            </td>
                                            <td>
                                                <i class="fas fa-map-marker-alt text-danger me-1"></i>
                                                <?= html_escape($property->location); ?>
                                            </td>
                                            <td>
                                                <?php if (!empty($property->price)): ?>
                                                    <strong>৳<?= number_format($property->price, 2); ?></strong>
                                                <?php else: ?>
                                                    <span class="text-muted">N/A</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?= !empty($property->size) ? html_escape($property->size) : 'N/A'; ?>
                                            </td>
                                            <td>
                                                <?php if ($property->bedrooms !== NULL): ?>
                                                    <!-- <span><i class="fas fa-bed"> -->

                                                    </i> <?= (int) $property->bedrooms; ?></span>
                                                    <span class="mx-1">/</span>
                                                    <!-- <span><i class="fas fa-bath"> -->
                                                        
                                                    </i> <?= (int) $property->bathrooms; ?></span>
                                                <?php else: ?>
                                                    <span class="text-muted">N/A</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($property->featured == 1): ?>
                                                    <span class="badge bg-warning text-dark"><i class="fas fa-star"></i>
                                                        Featured</span>
                                                <?php else: ?>
                                                    <span class="text-muted">—</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
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
                                                <span
                                                    class="badge bg-<?= $status_class; ?>"><?= html_escape($property->status); ?></span>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?= base_url('properties_details/' . $property->id); ?>"
                                                        class="btn btn-sm btn-outline-info" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="<?= base_url('admin/properties/edit/' . $property->id); ?>"
                                                        class="btn btn-sm btn-outline-primary" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="<?= base_url('admin/properties/delete/' . $property->id); ?>"
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