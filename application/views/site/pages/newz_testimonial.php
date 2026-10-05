<?php
$news = $this->db->order_by('created_at', 'DESC')
    ->where('status', 1)
    ->get('news')
    ->result_array();
?> 
<!-- News & Testimonial Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <!-- News Column -->
            <div class="col-lg-7">
                <div class="d-flex justify-content-between align-items-end mb-4">
                    <div>
                        <span class="text-muted text-uppercase fw-semibold small">Latest News & Insights</span>
                        <h3 class="fw-bold mb-0">News & Updates</h3>
                    </div>
                    <a href="#" class="btn btn-outline-green btn-sm">View All News</a>
                </div>

                <div class="row g-3">
                    <?php if (!empty($news)): ?>
                        <?php foreach (array_slice($news, 0, 3) as $item): ?>
                            <div class="col-md-4">
                                <div class="card h-100 border-0 shadow-sm">
                                    <img height="180px" src="<?= base_url('/assets/uploads/project/news_image/' . $item['image']) ?>"
                                        class="card-img-top" alt="News">
                                    <div class="card-body p-3">
                                        <small
                                            class="text-muted"><?= !empty($item['created_at']) ? date('d M, Y', strtotime($item['created_at'])) : ''; ?></small>
                                        <h6 class="fw-bold mt-1"><?= htmlspecialchars($item['headline'] ?? ''); ?></h6>
                                        <a href="<?= base_url('news_details/' . $item['id']); ?>" class="text-green text-decoration-none small fw-semibold">Read More
                                            &rarr;</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <p class="text-muted">No news updates available at the moment.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Testimonial Column -->
            <div class="col-lg-5">
                <div class="testimonial-card p-4 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <span class="text-uppercase small fw-semibold text-warning">Testimonial</span>
                        <h3 class="fw-bold text-white mb-4">What Our Clients Say</h3>
                        <i class="bi bi-quote display-4 text-warning opacity-50 d-block mb-2"></i>
                        <p class="fs-6 text-light">Chandra Trading Limited helped me to find the perfect plot for my
                            dream home. The process was smooth and transparent.</p>
                        <div class="text-warning mb-3">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <h6 class="fw-bold mb-0 text-white">&mdash; Ahmed Rahman</h6>
                        <small class="text-light opacity-75">Happy Customer</small>
                    </div>
                    <div class="mt-4 text-end">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRLn1KRroqT0RtYADtsKG6EBHBcqvEmILbUFFqm1SvJqdE4iuFKh35DUs&s=10"
                            class="rounded-circle border border-2 border-warning" width="80" height="80" alt="Client">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>