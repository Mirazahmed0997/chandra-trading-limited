<div class="content-wrapper">


    <div class="content-header">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>
                    <h2 class="mb-1 fw-bold text-dark">
                        <i class="fas fa-user-tie me-2 text-success"></i>
                        Contact Messages Details
                    </h2>

                    <p class="text-muted mb-0">
                        View complete information about this enquiry.
                    </p>
                </div>

                <div>
                    <a href="<?= base_url('contact_messages'); ?>" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i>
                        Back to List
                    </a>
                </div>

            </div>

        </div>
    </div>


    <section class="content">
        <div class="container-fluid">


            <div class="card border-0 shadow-sm mb-4">

                <div class="card-body p-4">

                    <div class="row align-items-center">

                        <!-- Avatar -->
                        <div class="col-auto">

                            <div class="landowner-avatar">
                                <i class="fas fa-user"></i>
                            </div>

                        </div>


                        <!-- Name -->
                        <div class="col">

                            <h4 class="mb-1 fw-bold">
                                <?= html_escape($contact_messages->full_name ?? 'N/A'); ?>
                            </h4>

                            <p class="text-muted mb-2">
                                General Inquiry
                            </p>

                            <?php
                            $status = strtolower(trim($contact_messages->status ?? ''));

                            if ($status == 'new') {
                                $status_class = 'bg-primary';
                            } elseif ($status == 'read') {
                                $status_class = 'bg-info';
                            } elseif ($status == 'replied') {
                                $status_class = 'bg-success';
                            } elseif ($status == 'closed') {
                                $status_class = 'bg-secondary';
                            } else {
                                $status_class = 'bg-light text-dark';
                            }
                            ?>

                            <span class="badge <?= $status_class; ?> px-3 py-2">
                                <?= ucfirst(str_replace('_', ' ', $status ?: 'Pending')); ?>
                            </span>

                        </div>


                        <!-- Lead ID -->
                        <div class="col-md-auto mt-3 mt-md-0">

                            <div class="lead-id-box">

                                <small class="text-muted d-block">
                                    Enquiry ID
                                </small>

                                <strong>
                                    #<?= html_escape($contact_messages->id ?? 'N/A'); ?>
                                </strong>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <div class="row">

                <div class="col-lg-6 mb-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-header bg-white border-0 pt-4 px-4">

                            <h5 class="fw-bold mb-1">
                                <i class="fas fa-user text-success me-2"></i>
                                Personal Information
                            </h5>

                            <p class="text-muted small mb-0">
                                Basic contact information of the landowner.
                            </p>

                        </div>

                        <div class="card-body px-4">

                            <div class="info-row">

                                <div class="info-label">
                                    <i class="fas fa-user"></i>
                                    Full Name
                                </div>

                                <div class="info-value">
                                    <?= html_escape($contact_messages->full_name ?? 'N/A'); ?>
                                </div>

                            </div>


                            <div class="info-row">

                                <div class="info-label">
                                    <i class="fas fa-phone"></i>
                                    Phone
                                </div>

                                <div class="info-value">

                                    <?php if (!empty($contact_messages->phone)): ?>

                                        <a href="tel:<?= html_escape($contact_messages->phone); ?>"
                                            class="text-decoration-none">

                                            <?= html_escape($contact_messages->phone); ?>

                                        </a>

                                    <?php else: ?>

                                        N/A

                                    <?php endif; ?>

                                </div>

                            </div>


                            <div class="info-row">

                                <div class="info-label">
                                    <i class="fas fa-envelope"></i>
                                    Email
                                </div>

                                <div class="info-value">

                                    <?php if (!empty($contact_messages->email)): ?>

                                        <a href="mailto:<?= html_escape($contact_messages->email); ?>"
                                            class="text-decoration-none">

                                            <?= html_escape($contact_messages->email); ?>

                                        </a>

                                    <?php else: ?>

                                        N/A

                                    <?php endif; ?>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="col-lg-4 mb-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-header bg-white border-0 pt-4 px-4">

                            <h5 class="fw-bold mb-1">
                                <i class="fas fa-info-circle text-success me-2"></i>
                                Lead Information
                            </h5>

                        </div>

                        <div class="card-body px-4">

                            <div class="mb-3">

                                <small class="text-muted d-block mb-1">
                                    Status
                                </small>

                                <span class="badge <?= $status_class; ?> px-3 py-2">
                                    <?= ucfirst(str_replace('_', ' ', $status ?: 'Pending')); ?>
                                </span>

                            </div>


                            <div class="mb-3">

                                <small class="text-muted d-block mb-1">
                                    Submitted At
                                </small>

                                <strong>
                                    <?= !empty($contact_messages->created_at)
                                        ? date('d M Y, h:i A', strtotime($contact_messages->created_at))
                                        : 'N/A';
                                    ?>
                                </strong>

                            </div>


                            <?php if (!empty($contact_messages->updated_at)): ?>

                                <div class="mb-3">

                                    <small class="text-muted d-block mb-1">
                                        Last Updated
                                    </small>

                                    <strong>
                                        <?= date(
                                            'd M Y, h:i A',
                                            strtotime($contact_messages->updated_at)
                                        ); ?>
                                    </strong>

                                </div>

                            <?php endif; ?>


                            <?php if (!empty($contact_messages->source)): ?>

                                <div>

                                    <small class="text-muted d-block mb-1">
                                        Source
                                    </small>

                                    <strong>
                                        <?= html_escape($landowner_leads->source); ?>
                                    </strong>

                                </div>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>

                <div class="col-lg-12 mb-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-header bg-white border-0 pt-4 px-4">

                            <h5 class="fw-bold mb-1">
                                <i class="fas fa-comment-dots text-success me-2"></i>
                                Query Details
                            </h5>

                            <p class="text-muted small mb-0">
                                Message and additional information provided by the user.
                            </p>

                        </div>

                        <div class="card-body px-4">

                            <div class="query-box">

                                <?= !empty($contact_messages->message)
                                    ? nl2br(html_escape($contact_messages->message))
                                    : '<span class="text-muted">No message provided.</span>';
                                ?>

                            </div>

                        </div>

                    </div>

                </div>




                <!-- <?php if (!empty($landowner_leads->notes)): ?>

                    <div class="col-12 mb-4">

                        <div class="card border-0 shadow-sm">

                            <div class="card-header bg-white border-0 pt-4 px-4">

                                <h5 class="fw-bold mb-1">
                                    <i class="fas fa-sticky-note text-warning me-2"></i>
                                    Internal Notes
                                </h5>

                            </div>

                            <div class="card-body px-4">

                                <div class="notes-box">
                                    <?= nl2br(html_escape($landowner_leads->notes)); ?>
                                </div>

                            </div>

                        </div>

                    </div>

                <?php endif; ?> -->


            </div>

        </div>
    </section>

</div>



<style>
    .landowner-avatar {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background: linear-gradient(135deg, #198754, #146c43);
        color: #fff;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 28px;

        box-shadow: 0 8px 20px rgba(25, 135, 84, 0.20);
    }


    .lead-id-box {
        background: #f8f9fa;
        border: 1px solid #e9ecef;

        padding: 12px 18px;

        border-radius: 10px;

        min-width: 110px;
        text-align: center;
    }


    .info-row {
        display: flex;

        padding: 15px 0;

        border-bottom: 1px solid #f0f0f0;

        gap: 15px;
    }


    .info-row:last-child {
        border-bottom: 0;
    }


    .info-label {
        min-width: 145px;

        color: #6c757d;

        font-size: 14px;
        font-weight: 500;

        display: flex;
        align-items: center;

        gap: 8px;
    }


    .info-label i {
        width: 18px;

        color: #198754;

        text-align: center;
    }


    .info-value {
        flex: 1;

        color: #212529;

        font-weight: 500;

        word-break: break-word;
    }


    .query-box {
        background: #f8f9fa;

        border: 1px solid #e9ecef;

        border-radius: 10px;

        padding: 20px;

        min-height: 140px;

        line-height: 1.7;

        color: #495057;
    }


    .notes-box {
        background: #fff8e1;

        border-left: 4px solid #ffc107;

        padding: 18px 20px;

        border-radius: 6px;

        line-height: 1.7;
    }


    .card {
        border-radius: 12px;
    }


    .card-header {
        border-radius: 12px 12px 0 0 !important;
    }


    @media (max-width: 767px) {

        .info-row {
            display: block;
        }

        .info-label {
            margin-bottom: 5px;
        }

        .landowner-avatar {
            width: 55px;
            height: 55px;
            font-size: 22px;
        }

    }
</style>