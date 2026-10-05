<?php

$recent_news = $this->db->order_by('created_at', 'DESC')
    ->where('status', 1)
    ->get('news')
    ->result_array();
?>


<section class="py-5 bg-light">
    <div class="container">
        <!-- Breadcrumb Navigation -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>"
                        class="text-decoration-none text-muted">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('news'); ?>"
                        class="text-decoration-none text-muted">News</a></li>
                <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">
                    <?= htmlspecialchars($news_item->headline ?? 'News Details'); ?>
                </li>
            </ol>
        </nav>

        <div class="row g-4">
            <!-- Main Content Area -->
            <div class="col-lg-8">
                <article class="bg-white p-4 p-md-5 rounded shadow-sm border">
                    <!-- Meta Info -->
                    <div class="d-flex align-items-center gap-3 text-muted small mb-3">
                        <span><i class="bi bi-person me-1"></i>
                            <?= htmlspecialchars($news_item->posted_by ?? 'Admin'); ?></span>
                        <span>&bull;</span>
                        <span><i class="bi bi-calendar3 me-1"></i>
                            <?= !empty($news_item->created_at) ? date('d M, Y', strtotime($news_item->created_at)) : date('d M, Y'); ?></span>
                    </div>

                    <!-- Article Headline -->
                    <h1 class="fw-bold mb-4 text-dark"><?= htmlspecialchars($news_item->headline ?? 'News Title'); ?>
                    </h1>

                    <!-- Featured Image -->
                    <div class="mb-4 overflow-hidden rounded">
                        <?php if (!empty($news_item->image)): ?>
                            <img src="<?= base_url('assets/uploads/project/news_image/' . htmlspecialchars($news_item->image)); ?>"
                                alt="<?= htmlspecialchars($news_item->headline ?? 'News Image'); ?>"
                                class="img-fluid w-100 object-fit-cover" style="max-height: 420px;">
                        <?php else: ?>
                            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=800&q=80"
                                alt="Featured News Placeholder" class="img-fluid w-100 object-fit-cover"
                                style="max-height: 420px;">
                        <?php endif; ?>
                    </div>

                    <!-- Article Body Content -->
                    <div class="article-content lh-lg text-secondary fs-6 mb-4">
                        <p><?= nl2br(htmlspecialchars($news_item->details ?? 'No content available for this news item.')); ?>
                        </p>
                    </div>

                    <hr class="my-4">

                    <!-- Social Share & Back Button -->
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                        <a href="<?= base_url(''); ?>" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                            <i class="bi bi-arrow-left me-1"></i> Back to News
                        </a>

                        <div class="d-flex align-items-center gap-2">
                            <span class="small text-muted fw-semibold me-1">Share:</span>
                            <a href="https://web.facebook.com/profile.php?id=61592764217077" target="_blank"
                                class="btn btn-sm btn-light border text-primary rounded-circle"><i
                                    class="bi bi-facebook"></i></a>
                            <a href="https://twitter.com/intent/tweet?url=<?= urlencode(current_url()); ?>"
                                target="_blank" class="btn btn-sm btn-light border text-info rounded-circle"><i
                                    class="bi bi-twitter"></i></a>
                            <a href="https://api.whatsapp.com/send?text=<?= urlencode(current_url()); ?>"
                                target="_blank" class="btn btn-sm btn-light border text-success rounded-circle"><i
                                    class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="bg-white p-4 rounded shadow-sm border mb-4">
                    <h5 class="fw-bold mb-3 border-bottom pb-2">Recent News</h5>

                    <?php if (!empty($recent_news)): ?>
                        <div class="d-flex flex-column gap-3 overflow-y-auto pe-1" style="max-height: 380px;">
                            <?php foreach ($recent_news as $recent): ?>
                                <a href="<?= base_url('news_details/' . $recent['id']); ?>"
                                    class="text-decoration-none text-dark d-flex gap-3 align-items-center">
                                    <img src="<?= !empty($recent['image']) ? base_url('assets/uploads/project/news_image/' . htmlspecialchars($recent['image'])) : 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=150&q=80'; ?>"
                                        alt="Thumbnail" class="rounded object-fit-cover flex-shrink-0" width="70" height="70">
                                    <div>
                                        <h6 class="mb-1 fw-bold fs-7 text-truncate-2">
                                            <?= htmlspecialchars($recent['headline']); ?>
                                        </h6>
                                        <small class="text-muted"><i
                                                class="bi bi-calendar3 me-1"></i><?= !empty($recent['created_at']) ? date('d M, Y', strtotime($recent['created_at'])) : date('d M, Y'); ?></small>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-muted small mb-0">No recent posts available.</p>
                    <?php endif; ?>
                </div>

                <div class="bg-success bg-gradient text-white p-4 rounded shadow-sm">
                    <h5 class="fw-bold mb-2">Looking for Real Estate Plots?</h5>
                    <p class="small opacity-75 mb-3">Get in touch with our team today to discover premium properties
                        across Bangladesh.</p>
                    <a href="<?= base_url('contact_us'); ?>"
                        class="btn btn-light btn-sm text-success fw-semibold rounded-pill px-4">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>