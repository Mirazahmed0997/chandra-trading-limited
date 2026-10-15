<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Mission | Premium 3D Real Estate</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root {
      --navy: #0b1d3a;
      --gold: #c5a059;
      --gold-glow: rgba(197, 160, 89, 0.4);
    }

    body {
      background-color: #f4f6f9;
      overflow-x: hidden;
    }

    .bg-navy { background-color: var(--navy); }
    .text-gold { color: var(--gold); }
    .bg-gold { background-color: var(--gold); }

    /* --- 3D Background Grid & Light Orbs --- */
    .hero-3d-bg {
      position: relative;
      background: radial-gradient(circle at 50% 20%, #152e5a 0%, var(--navy) 70%);
      overflow: hidden;
    }
    
    .hero-3d-bg::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(rgba(197, 160, 89, 0.05) 1px, transparent 1px),
                  linear-gradient(90deg, rgba(197, 160, 89, 0.05) 1px, transparent 1px);
      background-size: 50px 50px;
      transform: perspective(500px) rotateX(60deg) translateY(-100px);
      animation: gridMove 20s linear infinite;
    }

    @keyframes gridMove {
      0% { transform: perspective(500px) rotateX(60deg) translateY(0); }
      100% { transform: perspective(500px) rotateX(60deg) translateY(50px); }
    }

    /* --- Interactive 3D Card Architecture --- */
    .tilt-card {
      position: relative;
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.6);
      border-radius: 24px;
      transform-style: preserve-3d;
      box-shadow: 0 20px 40px rgba(11, 29, 58, 0.08), 
                  0 1px 3px rgba(0, 0, 0, 0.05);
      transition: box-shadow 0.3s ease, border-color 0.3s ease;
    }

    .tilt-card:hover {
      box-shadow: 0 30px 60px rgba(11, 29, 58, 0.22),
                  0 0 20px var(--gold-glow);
      border-color: rgba(197, 160, 89, 0.6);
    }

    .tilt-element-z1 { transform: translateZ(25px); }
    .tilt-element-z2 { transform: translateZ(55px); }
    .tilt-element-z3 { transform: translateZ(85px); }

    /* --- 3D Floating Icon Sphere --- */
    .icon-box-3d {
      width: 75px;
      height: 75px;
      border-radius: 20px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, var(--gold) 0%, #9e7a37 100%);
      box-shadow: 0 15px 25px rgba(197, 160, 89, 0.35),
                  inset 0 2px 4px rgba(255, 255, 255, 0.4);
    }

    /* --- 3D Isometric Image Layering --- */
    .stage-3d {
      perspective: 1200px;
    }

    .image-stage {
      position: relative;
      transform-style: preserve-3d;
      transform: rotateY(-12deg) rotateX(6deg);
      transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .stage-3d:hover .image-stage {
      transform: rotateY(-2deg) rotateX(2deg) scale(1.02);
    }

    .main-img-3d {
      border-radius: 24px;
      box-shadow: -20px 30px 50px rgba(11, 29, 58, 0.25);
    }

    .floating-glass-badge {
      position: absolute;
      bottom: -25px;
      right: -25px;
      background: rgba(11, 29, 58, 0.85);
      backdrop-filter: blur(16px);
      border: 1px solid rgba(197, 160, 89, 0.4);
      color: #fff;
      padding: 1.5rem;
      border-radius: 20px;
      transform: translateZ(60px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
      animation: float3d 5s ease-in-out infinite;
    }

    @keyframes float3d {
      0%, 100% { transform: translateZ(60px) translateY(0px); }
      50% { transform: translateZ(60px) translateY(-12px); }
    }

    /* --- 3D Glowing Button --- */
    .btn-3d-gold {
      background: linear-gradient(135deg, #d4af66 0%, #a8813b 100%);
      color: #fff !important;
      border: none;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(197, 160, 89, 0.4),
                  0 4px 0px #7a5c25;
      transition: all 0.15s ease;
    }

    .btn-3d-gold:active {
      transform: translateY(3px);
      box-shadow: 0 4px 10px rgba(197, 160, 89, 0.4),
                  0 1px 0px #7a5c25;
    }
  </style>
</head>
<body>

  <!-- Hero Header with Animated 3D Grid -->
 <section class="hero-3d-bg text-white py-5 position-relative">
    <div class="container py-5 text-center position-relative" style="z-index: 2;">
      <span class="text-gold text-uppercase fw-bold tracking-wide badge bg-dark bg-opacity-50 px-3 py-2 rounded-pill border border-warning border-opacity-25 mb-3">
       <?= lang('about_our_brand'); ?>
      </span>
      <h1 class="display-3 fw-bold mt-2"> <?= lang('pioneering_architectural_excellence'); ?></h1>
      <p class="lead text-white-50 mx-auto fs-4" style="max-width: 750px;">
        <?= lang('brand_description'); ?>
      </p>
    </div>
  </section>

  <!-- Core Mission with Isometric Layering -->
  <section class="py-5 overflow-hidden">
    <div class="container py-5">
      <div class="row align-items-center g-5">
        <div class="col-lg-6 stage-3d">
          <div class="image-stage p-2">
            <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=900&q=80" alt="Modern Luxury Villa" class="img-fluid main-img-3d">
            <div class="floating-glass-badge">
              <h2 class="fw-bold text-gold mb-0">$2.5B+</h2>
              <p class="mb-0 text-white-50 small fw-semibold"><?= lang('portfolio_developed'); ?></p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <span class="text-gold fw-bold text-uppercase tracking-wide"><?= lang('our_mission'); ?></span>
          <h2 class="display-5 fw-bold text-navy my-3"><?= lang('elevating_standards_shaping_horizons')?></h2>
          <p class="fs-5 text-secondary mb-4">
            <?= lang('mission_description')?>
          </p>
          
          <!-- 3D Stat Chips -->
          <div class="row g-3">
            <div class="col-6">
              <div class="p-3 bg-white rounded-4 shadow-sm border border-light d-flex align-items-center">
                <i class="bi bi-shield-fill-check text-gold fs-2 me-3"></i>
                <div>
                  <h6 class="fw-bold mb-0"><?= lang('guaranteed_legal_integrity')?></h6>

                  <span class="text-muted small"><?= lang('verified_titles') ?></span>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="p-3 bg-white rounded-4 shadow-sm border border-light d-flex align-items-center">
                <i class="bi bi-bounding-box-circles text-gold fs-2 me-3"></i>
                <div>
                  <h6 class="fw-bold mb-0"><?= lang('smart_eco_design')?></h6>
                  <span class="text-muted small"><?=lang('leed_gold_standards')?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Core Pillars with Gyroscopic 3D Physics -->
  <section class="py-5 bg-light position-relative">
    <div class="container py-5">
      <div class="text-center mb-5">
        <h2 class="display-6 fw-bold"><?= lang('pillars_of_our_craft')?></h2>
        <p class="text-muted fs-5"><?= lang('hover_3d_description') ?></p>
      </div>

      <div class="row g-4">
        <!-- Pillar 1 -->
        <div class="col-lg-4">
          <div class="p-4 tilt-card h-100" data-tilt data-tilt-max="15" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2">
            <div class="icon-box-3d text-white mb-4 tilt-element-z2">
              <i class="bi bi-building-up fs-2"></i>
            </div>
            <h3 class="fw-bold text-navy mb-3 tilt-element-z2"><?= lang('precision_engineering')?></h3>
            <p class="text-secondary tilt-element-z1">
              <?= lang('precision_engineering_description')?>
            </p>
          </div>
        </div>

        <!-- Pillar 2 -->
        <div class="col-lg-4">
          <div class="p-4 tilt-card h-100" data-tilt data-tilt-max="15" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2">
            <div class="icon-box-3d text-white mb-4 tilt-element-z2" style="background: linear-gradient(135deg, #0b1d3a 0%, #1a3c70 100%); box-shadow: 0 15px 25px rgba(11,29,58,0.3);">
              <i class="bi bi-graph-up-arrow fs-2 text-gold"></i>
            </div>
            <h3 class="fw-bold text-navy mb-3 tilt-element-z2"><?= lang('capital_appreciation')?></h3>
            <p class="text-secondary tilt-element-z1">
              <?= lang('capital_appreciation_description')?>
            </p>
          </div>
        </div>

        <!-- Pillar 3 -->
        <div class="col-lg-4">
          <div class="p-4 tilt-card h-100" data-tilt data-tilt-max="15" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2">
            <div class="icon-box-3d text-white mb-4 tilt-element-z2">
              <i class="bi bi-cpu fs-2"></i>
            </div>
            <h3 class="fw-bold text-navy mb-3 tilt-element-z2"><?= lang('smart_integration')?></h3>
            <p class="text-secondary tilt-element-z1">
              <?= lang('smart_integration_description')?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 3D Call to Action -->
  <section class="bg-navy text-white py-5 position-relative overflow-hidden">
    <div class="container text-center py-4 position-relative" style="z-index: 2;">
      <h2 class="display-5 fw-bold mb-3"><?= lang('begin_property_journey')?></h2>
      <p class="text-white-50 fs-5 mb-4 mx-auto" style="max-width: 600px;"><?= lang('consultation_description')?></p>
      <a href="#" class="btn btn-3d-gold fw-bold px-5 py-3 fs-5 me-3"><?= lang('explore_developments')?></a>
      <a href="#" class="btn btn-outline-light px-4 py-3 rounded-3 fs-5 mt-3 mt-sm-0"><?= lang('contact_our_team')?></a>
    </div>
  </section>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Vanilla-Tilt JS for Hardware-Accelerated 3D Cursor Physics -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.0/vanilla-tilt.min.js"></script>
</body>
</html>