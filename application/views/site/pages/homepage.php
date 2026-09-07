<!DOCTYPE html>
<?php $current_lang = $this->session->userdata('site_language') ?? 'english'; ?>
<html lang="<?= ($current_lang == 'bangla') ? 'bn' : 'en'; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Valley Real Estate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-green: #1b7b43;
            --primary-green-dark: #145e33;
            --light-bg: #f8f9fa;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            background-color: #fcfcfc;
        }

        .btn-green {
            background-color: var(--primary-green) !important;
            color: #fff !important;
            border: none;
        }

        .btn-green:hover {
            background-color: var(--primary-green-dark);
            color: #fff;
        }

        .btn-outline-green {
            border-color: var(--primary-green);
            color: var(--primary-green);
        }

        .btn-outline-green:hover {
            background-color: var(--primary-green);
            color: #fff;
        }

        .text-green {
            color: var(--primary-green);
        }

        /* Combined background overlay and image properly */
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),
                        url('https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
            padding: 100px 0 140px 0;
            color: #fff;
        }

        .lead {
            font-weight: bold !important;
        }

        .features-box {
            margin-top: -60px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .feature-item {
            border-right: 1px solid #eee;
        }

        .feature-item:last-child {
            border-right: none;
        }

        .feature-icon-wrapper {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #eef7f2;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-green);
            font-size: 1.5rem;
        }

        .step-number {
            width: 28px;
            height: 28px;
            background-color: var(--primary-green);
            color: white;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .badge-available {
            background-color: #d1e7dd;
            color: #0f5132;
        }

        .badge-booked {
            background-color: #f8d7da;
            color: #842029;
        }

        .testimonial-card {
            background-color: #003829;
            color: white;
            border-radius: 12px;
        }

        .top-bar {
            background-color: #0d3b20;
            padding: 8px 0;
        }
    </style>
</head>

<body>

    <!-- Language selection pop-up -->
    <?php
    $language_selected = $this->session->userdata('language_selected');
    $language_selected_at = $this->session->userdata('language_selected_at');
    $current_time = time();
    $popup_time = 6;
    $show_language_popup = false;

    if (!$language_selected || !$language_selected_at || (($current_time - $language_selected_at) >= $popup_time)) {
        $show_language_popup = true;
    }
    ?>

    <?php if ($show_language_popup): ?>
        <div class="modal fade" id="firstVisitLanguageModal" tabindex="-1" data-bs-backdrop="static"
            data-bs-keyboard="false" aria-labelledby="languageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center p-3 shadow-lg border-0">
                    <div class="modal-header border-0 pb-0 justify-content-center">
                        <h4 class="modal-title fw-bold text-success" id="languageModalLabel">
                            <i class="bi bi-globe me-2"></i> Select Language / ভাষা নির্বাচন করুন
                        </h4>
                    </div>
                    <div class="modal-body py-4">
                        <p class="text-muted mb-4">
                            Please select your preferred language to continue.<br>
                            অনুগ্রহ করে আপনার পছন্দের ভাষা বেছে নিন।
                        </p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                            <a href="<?= base_url('language/set/english?redirect=' . urlencode(current_url())); ?>"
                                class="btn btn-outline-success btn-lg px-4 fw-semibold">
                                English
                            </a>
                            <a href="<?= base_url('language/set/bangla?redirect=' . urlencode(current_url())); ?>"
                                class="btn btn-success btn-lg px-4 fw-semibold">
                                Bangla
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var modalElement = document.getElementById('firstVisitLanguageModal');
                var langModal = new bootstrap.Modal(modalElement);
                langModal.show();
            });
        </script>
    <?php endif; ?>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <span class="text-warning fw-semibold"><?= lang('hero_tagline'); ?></span>
                    <h3 class="display-4 fw-bold mt-2 mb-3"><?= lang('hero_title'); ?></h3>
                    <p class="lead mb-4 text-light"><?= lang('hero_subtitle'); ?></p>
                    <div class="d-flex gap-3">
                        <a href="#" class="btn btn-green btn-lg px-4"><?= lang('explore_projects'); ?></a>
                        <a href="#" class="btn btn-light btn-lg px-4 text-dark"><?= lang('book_plot'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <div class="container">
        <div class="features-box p-4">
            <div class="row text-center g-4">
                <div class="col-md-4 col-lg-2">
                    <div class="feature-icon-wrapper mb-3"><i class="bi bi-geo-alt"></i></div>
                    <h6 class="fw-bold mb-1"><?= lang('prime_location'); ?></h6>
                    <small class="text-muted"><?= lang('prime_location_desc'); ?></small>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="feature-icon-wrapper mb-3"><i class="bi bi-building"></i></div>
                    <h6 class="fw-bold mb-1"><?= lang('quality_living'); ?></h6>
                    <small class="text-muted"><?= lang('quality_living_desc'); ?></small>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="feature-icon-wrapper mb-3"><i class="bi bi-file-earmark-text"></i></div>
                    <h6 class="fw-bold mb-1"><?= lang('transparent_process'); ?></h6>
                    <small class="text-muted"><?= lang('transparent_process_desc'); ?></small>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="feature-icon-wrapper mb-3"><i class="bi bi-shield-check"></i></div>
                    <h6 class="fw-bold mb-1"><?= lang('secure_investment'); ?></h6>
                    <small class="text-muted"><?= lang('secure_investment_desc'); ?></small>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="feature-icon-wrapper mb-3"><i class="bi bi-headset"></i></div>
                    <h6 class="fw-bold mb-1"><?= lang('customer_support'); ?></h6>
                    <small class="text-muted"><?= lang('customer_support_desc'); ?></small>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="feature-icon-wrapper mb-3"><i class="bi bi-people"></i></div>
                    <h6 class="fw-bold mb-1"><?= lang('trust_reliability'); ?></h6>
                    <small class="text-muted"><?= lang('trust_reliability_desc'); ?></small>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('site/pages/property_search_section.php'); ?>
    <?php $this->load->view('site/pages/property_catagories.php'); ?>
    <?php $this->load->view('site/pages/featured_products'); ?>
    <?php $this->load->view('site/pages/our_projects'); ?>
    <?php $this->load->view('site/pages/why_chandra'); ?>
    <?php $this->load->view('site/pages/about_chandra'); ?>
    <?php $this->load->view('site/pages/investment_card'); ?>
    <?php $this->load->view('site/pages/joint_venture'); ?>
    <?php $this->load->view('site/pages/gallary/gallary'); ?>
    <?php $this->load->view('site/pages/how_it_works'); ?>
    <?php $this->load->view('site/pages/gallary/videos'); ?>
    <?php $this->load->view('site/pages/newz_testimonial'); ?>

</body>

</html>