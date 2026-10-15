<div class="content-wrapper">

    <!-- Header -->
    <div class="content-header">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h2 class="mb-1">My Property Bookings for visit</h2>
                    <p class="text-muted mb-0">
                        Manage and track your property visits
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

                <div class="card-body">

                    <form method="get" action="<?= base_url('admin_property_visit_data'); ?>">

                        <div class="row g-3">

                            <!-- Search -->
                            <div class="col-md-4">

                                <label class="form-label">
                                    Search Property
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </span>

                                    <input type="text" name="search" class="form-control"
                                        placeholder="Property name or ID" value="<?= html_escape($search ?? ''); ?>">

                                </div>

                            </div>


                            <!-- Booking Date -->
                            <!-- <div class="col-md-3">

                                <label class="form-label">
                                    Booking Date
                                </label>

                                <input type="date" name="booking_date" class="form-control"
                                    value="<?= html_escape($booking_date ?? ''); ?>">

                            </div> -->


                            <!-- Status -->
                            <div class="col-md-3">

                                <label class="form-label">
                                    Status
                                </label>

                                <select name="status" class="form-control">

                                    <option value="">
                                        All Status
                                    </option>

                                    <option value="Pending" <?= ($status ?? '') == 'Pending' ? 'selected' : ''; ?>>
                                        Pending
                                    </option>

                                    <option value="Approved" <?= ($status ?? '') == 'Approved' ? 'selected' : ''; ?>>
                                        Approved
                                    </option>

                                    <option value="Cancelled" <?= ($status ?? '') == 'Cancelled' ? 'selected' : ''; ?>>
                                        Cancelled
                                    </option>

                                    <option value="Completed" <?= ($status ?? '') == 'Completed' ? 'selected' : ''; ?>>
                                        Completed
                                    </option>

                                </select>

                            </div>


                            <!-- Actions -->
                            <div class="col-md-2 d-flex align-items-end">

                                <button type="submit" class="btn btn-primary me-2">

                                    <i class="fas fa-filter"></i>
                                    Filter

                                </button>

                                <a href="<?= base_url('admin_property_visit_data'); ?>" class="btn btn-light border">

                                    Reset

                                </a>

                            </div>

                        </div>

                    </form>

                </div>

            </div>


            <!-- Booking Table -->
            <div class="card shadow-sm border-0">

                <!-- Card Header -->
                <div class="card-header bg-white">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h5 class="mb-0">
                                Property Booking List
                            </h5>

                            <small class="text-muted">
                                <?= number_format($total_rows); ?>
                                bookings found
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

                                    <th width="60">
                                        #
                                    </th>

                                    <th>
                                        Property
                                    </th>

                                    <th>
                                        Booking Date
                                    </th>

                                    <th>
                                        Notes
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                    <th>
                                        Phone
                                    </th>

                                    <th>
                                        Booked On
                                    </th>

                                    <th width="100">
                                        Action
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                <?php if (!empty($visit_bookings)): ?>

                                    <?php $sl = $sl_start; ?>

                                    <?php foreach ($visit_bookings as $booking): ?>

                                        <tr>

                                            <!-- Serial -->
                                            <td>
                                                <?= $sl++; ?>
                                            </td>


                                            <!-- Property -->
                                            <td>

                                                <div class="fw-semibold">

                                                    <?= html_escape(
                                                        $booking->property_name
                                                    ); ?>

                                                </div>

                                                <small class="text-muted">

                                                    ID:
                                                    <?= html_escape(
                                                        $booking->property_id
                                                    ); ?>

                                                </small>

                                            </td>


                                            <!-- Booking Date -->
                                            <td>

                                                <?php if (!empty($booking->booking_date)): ?>

                                                    <span>
                                                        <i class="far fa-calendar-alt me-1"></i>

                                                        <?= date(
                                                            'd M Y',
                                                            strtotime($booking->booking_date)
                                                        ); ?>

                                                    </span>

                                                <?php else: ?>

                                                    <span class="text-muted">
                                                        N/A
                                                    </span>

                                                <?php endif; ?>

                                            </td>


                                            <!-- Notes -->
                                            <td>

                                                <?php if (!empty($booking->notes)): ?>

                                                    <span title="<?= html_escape($booking->notes); ?>">

                                                        <?= html_escape(
                                                            mb_strimwidth(
                                                                $booking->notes,
                                                                0,
                                                                50,
                                                                '...'
                                                            )
                                                        ); ?>

                                                    </span>

                                                <?php else: ?>

                                                    <span class="text-muted">
                                                        —
                                                    </span>

                                                <?php endif; ?>

                                            </td>


                                            <!-- Status -->


                                            <td>
                                                <form action="<?= base_url('update_booked_property_visit_status/' . $booking->id); ?>"
                                                    method="post">

                                                    <select name="status" onchange="this.form.submit()"
                                                        class="form-select form-select-sm booking-status"
                                                        data-id="<?= $booking->id; ?>" style="min-width: 130px;">

                                                        <option value="pending" <?= ($booking->status == 'pending') ? 'selected' : ''; ?>>
                                                            Pending
                                                        </option>

                                                        <option value="confirmed" <?= ($booking->status == 'confirmed') ? 'selected' : ''; ?>>
                                                            Confirmed
                                                        </option>

                                                        <option value="cancelled" <?= ($booking->status == 'cancelled') ? 'selected' : ''; ?>>
                                                            Cancelled
                                                        </option>

                                                    </select>
                                                </form>

                                            </td>

                                            <td>

                                                <?php if (!empty($booking->user_phone)): ?>

                                                    <span>

                                                        <?=
                                                            $booking->user_phone
                                                        ?>

                                                    </span>

                                                <?php else: ?>

                                                    <span class="text-muted">
                                                        N/A
                                                    </span>

                                                <?php endif; ?>

                                            </td>


                                            <!-- Created Date -->
                                            <td>

                                                <?php if (!empty($booking->created_at)): ?>

                                                    <?= date(
                                                        'd M Y, h:i A',
                                                        strtotime($booking->created_at)
                                                    ); ?>

                                                <?php else: ?>

                                                    <span class="text-muted">
                                                        N/A
                                                    </span>

                                                <?php endif; ?>

                                            </td>


                                            <!-- Action -->
                                            <td>

                                                <a href="<?= base_url(
                                                    'admin_booked_property_visit_details/' . $booking->property_id
                                                ); ?>" class="btn btn-sm btn-outline-info" title="View Booking">

                                                    <i class="fas fa-eye"></i>

                                                </a>

                                            </td>

                                        </tr>

                                    <?php endforeach; ?>

                                <?php else: ?>

                                    <tr>

                                        <td colspan="7" class="text-center py-5">

                                            <div class="text-muted">

                                                <i class="fas fa-calendar-check fa-3x mb-3"></i>

                                                <p class="mb-0">
                                                    No property bookings found
                                                    matching your criteria.
                                                </p>

                                            </div>

                                        </td>

                                    </tr>

                                <?php endif; ?>

                            </tbody>

                        </table>

                    </div>

                </div>


                <!-- Footer -->
                <?php if (!empty($pagination)): ?>

                    <div class="card-footer bg-white
                                d-flex justify-content-between
                                align-items-center py-3">

                        <small class="text-muted">

                            Showing
                            <?= $total_rows > 0 ? $sl_start : 0; ?>

                            to

                            <?= min(
                                $sl_start + count($visit_bookings) - 1,
                                $total_rows
                            ); ?>

                            of

                            <?= number_format($total_rows); ?>

                            entries

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