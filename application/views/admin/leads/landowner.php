<div class="content-wrapper">

    <!-- Header -->
    <div class="content-header">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h2 class="mb-1">Landowner Queries</h2>
                    <p class="text-muted mb-0">
                        Manage landowner enquiries and submitted information
                    </p>
                </div>

            </div>

        </div>
    </div>


    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Filter Card -->
            <div class="card shadow-sm border-0 mb-4">

                <div class="card-header bg-white border-0 py-3">
                    <div class="d-flex align-items-center">
                        <div class="filter-icon me-2">
                            <i class="fas fa-filter"></i>
                        </div>

                        <div>
                            <h5 class="mb-0">Search & Filter</h5>
                            <small class="text-muted">
                                Find landowner queries quickly
                            </small>
                        </div>
                    </div>
                </div>


                <div class="card-body">

                    <form method="get" action="<?= base_url('landowners_query'); ?>">

                        <div class="row g-3">

                            <!-- Search -->
                            <div class="col-md-4">

                                <label class="form-label">
                                    Search
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </span>

                                    <input type="text" name="search" class="form-control"
                                        placeholder="Search landowner query..."
                                        value="<?= html_escape(isset($search) ? $search : ''); ?>">

                                </div>

                            </div>


                            <!-- Property ID -->
                            <!-- <div class="col-md-2">

                                <label class="form-label">
                                    Property ID
                                </label>

                                <input type="text" name="property_id" class="form-control" placeholder="Property ID"
                                    value="<?= html_escape(isset($id) ? $id : ''); ?>">

                            </div> -->


                            <!-- Property Type -->
                            <!-- <div class="col-md-2">

                                <label class="form-label">
                                    Property Type
                                </label>

                                <input type="text" name="property_type" class="form-control" placeholder="Property type"
                                    value="<?= html_escape(isset($name) ? $name : ''); ?>">

                            </div> -->


                            <!-- Location -->
                            <!-- <div class="col-md-2">

                                <label class="form-label">
                                    Location
                                </label>

                                <input type="text" name="location" class="form-control" placeholder="Location"
                                    value="<?= html_escape(isset($location) ? $location : ''); ?>">

                            </div> -->


                            <!-- Mobile -->
                            <div class="col-md-2">

                                <label class="form-label">
                                    Mobile
                                </label>

                                <input type="text" name="mobile" class="form-control" placeholder="Mobile number"
                                    value="<?= html_escape(isset($mobile) ? $mobile : ''); ?>">

                            </div>


                            <!-- Email -->
                            <div class="col-md-3">

                                <label class="form-label">
                                    Email
                                </label>

                                <input type="email" name="email" class="form-control" placeholder="Email address"
                                    value="<?= html_escape(isset($email) ? $email : ''); ?>">

                            </div>


                            <!-- Buttons -->
                            <div class="col-md-2 d-flex align-items-end">

                                <button type="submit" class="btn btn-primary me-2">

                                    <i class="fas fa-search me-1"></i>
                                    Search

                                </button>


                                <a href="<?= base_url('landowners_query'); ?>" class="btn btn-light border">

                                    <i class="fas fa-redo me-1"></i>
                                    Reset

                                </a>

                            </div>

                        </div>

                    </form>

                </div>

            </div>


            <!-- Landowner Query Table -->
            <div class="card shadow-sm border-0">

                <!-- Card Header -->
                <div class="card-header bg-white">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h5 class="mb-0">
                                Landowner Query List
                            </h5>

                            <small class="text-muted">
                                <?= number_format($total_rows); ?>
                                queries found
                            </small>

                        </div>

                    </div>

                </div>


                <!-- Table -->
                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle mb-0">

                            <thead class="table-light">

                                <tr>

                                    <th width="60">#</th>

                                    <th>Landowner</th>

                                    <th>Property ID</th>

                                    <th>Property Type</th>

                                    <th>Location</th>

                                    <th>Mobile</th>

                                    <th>Email</th>

                                    <th width="100">Action</th>

                                </tr>

                            </thead>


                            <tbody>

                                <?php if (!empty($landowner_leads)): ?>

                                    <?php $sl = $sl_start; ?>

                                    <?php foreach ($landowner_leads as $lead): ?>

                                        <tr>

                                            <!-- Serial -->
                                            <td>
                                                <?= $sl++; ?>
                                            </td>


                                            <!-- Landowner -->
                                            <td>

                                                <div class="fw-semibold">

                                                    <?= html_escape(
                                                        isset($lead->name)
                                                        ? $lead->name
                                                        : 'N/A'
                                                    ); ?>

                                                </div>

                                            </td>


                                            <!-- Property ID -->

                                            <td>

                                                <form action="<?= base_url('update_land_query_status/' . $lead->id); ?>"
                                                    method="post" class="status-form">
                                                    <?php
                                                    // Map ENUM values to display labels
                                                    $statuses = [
                                                        'New' => 'New',
                                                        'Contacted' => 'Contacted',
                                                        'In Progress' => 'In Progress',
                                                        'Converted' => 'Converted',
                                                        'Rejected' => 'Rejected'
                                                    ];

                                                    // Dynamic CSS class based on status (e.g., status-select-new)
                                                    $status_class = strtolower(str_replace(' ', '-', $lead->status));
                                                    ?>

                                                    <select name="status" onchange="this.form.submit()"
                                                        class="status-select status-<?= html_escape($status_class); ?>">
                                                        <?php foreach ($statuses as $value => $label): ?>
                                                            <option value="<?= $value; ?>" <?= ($lead->status == $value) ? 'selected' : ''; ?>>
                                                                <?= $label; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </form>


                                            </td>


                                            <!-- Property Type -->
                                            <td>

                                                <?php if (!empty($lead->property_type)): ?>

                                                    <span class="badge bg-info">

                                                        <?= html_escape(
                                                            $lead->property_type
                                                        ); ?>

                                                    </span>

                                                <?php else: ?>

                                                    <span class="text-muted">
                                                        N/A
                                                    </span>

                                                <?php endif; ?>

                                            </td>


                                            <!-- Location -->
                                            <td>

                                                <?php if (!empty($lead->location)): ?>

                                                    <i class="fas fa-map-marker-alt text-danger me-1"></i>

                                                    <?= html_escape(
                                                        $lead->location
                                                    ); ?>

                                                <?php else: ?>

                                                    <span class="text-muted">
                                                        N/A
                                                    </span>

                                                <?php endif; ?>

                                            </td>


                                            <!-- Mobile -->
                                            <td>

                                                <?php if (!empty($lead->mobile)): ?>

                                                    <a href="tel:<?= html_escape($lead->mobile); ?>" class="text-decoration-none">

                                                        <i class="fas fa-phone-alt me-1"></i>

                                                        <?= html_escape(
                                                            $lead->mobile
                                                        ); ?>

                                                    </a>

                                                <?php else: ?>

                                                    <span class="text-muted">
                                                        N/A
                                                    </span>

                                                <?php endif; ?>

                                            </td>


                                            <!-- Email -->
                                            <td>

                                                <?php if (!empty($lead->email)): ?>

                                                    <a href="mailto:<?= html_escape($lead->email); ?>" class="text-decoration-none">

                                                        <i class="fas fa-envelope me-1"></i>

                                                        <?= html_escape(
                                                            $lead->email
                                                        ); ?>

                                                    </a>

                                                <?php else: ?>

                                                    <span class="text-muted">
                                                        N/A
                                                    </span>

                                                <?php endif; ?>

                                            </td>


                                            <!-- Action -->
                                            <td>

                                                <div class="btn-group">

                                                    <a href="<?= base_url(
                                                        'landowners_query_details/' . $lead->id
                                                    ); ?>" class="btn btn-sm btn-outline-info" title="View">

                                                        <i class="fas fa-eye"></i>

                                                    </a>


                                                    <a href="<?= base_url(
                                                        'delete_land_query/' . $lead->id
                                                    ); ?>" class="btn btn-sm btn-outline-danger" title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete this landowner query?');">

                                                        <i class="fas fa-trash"></i>

                                                    </a>

                                                </div>

                                            </td>

                                        </tr>

                                    <?php endforeach; ?>


                                <?php else: ?>

                                    <tr>

                                        <td colspan="8" class="text-center py-5">

                                            <div class="text-muted">

                                                <i class="fas fa-user-tie fa-3x mb-3"></i>

                                                <h5 class="mb-2">
                                                    No Landowner Queries Found
                                                </h5>

                                                <p class="mb-0">
                                                    No landowner queries match
                                                    your current search criteria.
                                                </p>

                                            </div>

                                        </td>

                                    </tr>

                                <?php endif; ?>

                            </tbody>

                        </table>

                    </div>

                </div>


                <!-- Pagination -->
                <?php if (!empty($pagination)): ?>

                    <div class="card-footer bg-white
                                d-flex justify-content-between
                                align-items-center py-3">

                        <small class="text-muted">

                            <?php if ($total_rows > 0): ?>

                                Showing
                                <?= $sl_start; ?>
                                to
                                <?= min(
                                    $sl_start + count($landowner_leads) - 1,
                                    $total_rows
                                ); ?>
                                of
                                <?= number_format($total_rows); ?>
                                entries

                            <?php else: ?>

                                Showing 0 entries

                            <?php endif; ?>

                        </small>


                        <nav>
                            <?= $pagination; ?>
                        </nav>

                    </div>

                <?php endif; ?>

            </div>

        </div>
    </section>

</div>


<style>
    .filter-icon {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f1f5f9;
        border-radius: 8px;
        color: #0d6efd;
    }

    .form-label {
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 6px;
    }

    .form-control,
    .input-group-text {
        min-height: 40px;
    }

    .table th {
        font-size: 13px;
        font-weight: 600;
        white-space: nowrap;
    }

    .table td {
        font-size: 14px;
    }

    .table tbody tr {
        transition: 0.2s ease;
    }

    .table tbody tr:hover {
        background-color: #f8fafc;
    }

    .btn-group .btn {
        margin-right: 2px;
    }
</style>