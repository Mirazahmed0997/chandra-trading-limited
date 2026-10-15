<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<section class="notice-details py-4">
    <div class="container">

        <div class="card shadow-sm border-0">
            <div class="row g-0">
                <div class="col-md-7">
                    <div class="card-body p-4">

                        <h3 class="card-title mb-2">
                            <?= $current_projects['title']; ?>
                        </h3>

                        <p class="text-muted mb-3">
                            <i class="fas fa-calendar-alt"></i>
                            <?= date('d-m-Y', strtotime($current_projects['created_at'])); ?>
                        </p>

                        <p class="card-text" style="line-height:1.8;">
                            <?= $current_projects['details']; ?>
                        </p>
                    </div>
                </div>

                <div class="col-md-5">
                    <img src="<?= base_url('./assets/uploads/project/project_image/' . $current_projects['image']) ?>"
                        class="img-fluid h-100 w-100 object-fit-cover rounded-start" alt="Announcement Image">
                </div>

            </div>
        </div>

    </div>
</section>

<style>
    .notice-details .card-title {
        font-size: 22px;
        font-weight: 600;
    }

    .notice-details img {
        /* max-height: 100%; */
        object-fit: cover;
    }

    .notice-details .card-text {
        font-size: 15px;
        color: #444;
    }
</style>