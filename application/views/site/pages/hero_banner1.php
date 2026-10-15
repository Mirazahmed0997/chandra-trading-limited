<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />

<section class="bg-body-secondary min-vh-100 d-flex align-items-center py-5 overflow-hidden">
    <div class="container">
        <div class="row align-items-center g-4 g-lg-5">

            <div class="col-12 col-lg-5 text-center text-lg-start" data-aos="fade-right" data-aos-duration="1000"
                data-aos-once="true">
              

                <div class="hero-img-wrapper overflow-hidden rounded-3 shadow-lg d-inline-block">
                    <video class="hero-img" autoplay muted loop playsinline preload="auto"
                        style="width: 380px; height: 380px; object-fit: cover; display: block;">
                        <source src="./assets/uploads/videos/VID-20260813-WA0000 (1).mp4" type="video/mp4">
                    </video>
                </div>
            </div>

            <div class="col-12 col-lg-7 text-center text-lg-start">

                <h1 class="display-4 fw-bold lh-1 mb-3" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200"
                    data-aos-once="true">
                    <?= lang('chandra_trading_limited'); ?>
                </h1>

                <h4>
                     <?= lang('building_today'); ?>
                </h4>

                <p class="lead text-body-secondary py-2 mb-4" data-aos="fade-up" data-aos-duration="800"
                    data-aos-delay="400" data-aos-once="true">
                    <?= lang('about_company_text_1'); ?>
                    <br><br>
                     <?= lang('about_company_text_2'); ?>
                </p>

                <!-- Button with Pulsing Aura + Entrance Animation -->
                <div class="aura-wrapper d-inline-block p-2" data-aos="fade-up" data-aos-duration="800"
                    data-aos-delay="600" data-aos-once="true">
                    <button type="button" class="btn btn-primary btn-lg position-relative aura-btn px-4">
                         <?= lang('about_us'); ?>
                    </button>
                </div>

            </div>

        </div>
    </div>
</section>

<style>
    /* Image Hover Zoom Effect */
    .hero-img-wrapper {
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .hero-img {
        transition: transform 0.5s ease;
        display: block;
    }

    .hero-img-wrapper:hover .hero-img {
        transform: scale(1.05);
        /* Soft zoom on hover */
    }

    /* Aura Pulse Button Effect */
    .aura-wrapper {
        position: relative;
        isolation: isolate;
    }

    .aura-btn {
        z-index: 1;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .aura-btn:hover {
        transform: translateY(-2px);
        /* Subtle lift on hover */
    }

    .aura-wrapper::before,
    .aura-wrapper::after {
        content: "";
        position: absolute;
        inset: 0;
        border-radius: var(--bs-btn-border-radius, 0.375rem);
        background: var(--bs-primary);
        z-index: -1;
        opacity: 0.6;
        animation: aura-pulse 2s cubic-bezier(0, 0, 0.2, 1) infinite;
    }

    .aura-wrapper::after {
        animation-delay: 1s;
    }

    @keyframes aura-pulse {
        0% {
            transform: scale(0.95);
            opacity: 0.7;
        }

        70% {
            transform: scale(1.25, 1.35);
            opacity: 0;
        }

        100% {
            transform: scale(1.25, 1.35);
            opacity: 0;
        }
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>


