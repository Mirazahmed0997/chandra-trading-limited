<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Vision | Premium Real Estate</title>
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

    /* --- 3D Grid Header Background --- */
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

    /* --- 3D Interactive Cards --- */
    .vision-card {
      position: relative;
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.6);
      border-radius: 24px;
      transform-style: preserve-3d;
      box-shadow: 0 20px 40px rgba(11, 29, 58, 0.08);
      transition: box-shadow 0.3s ease, border-color 0.3s ease;
    }

    .vision-card:hover {
      box-shadow: 0 30px 60px rgba(11, 29, 58, 0.22),
                  0 0 25px var(--gold-glow);
      border-color: rgba(197, 160, 89, 0.6);
    }

    .tilt-z1 { transform: translateZ(25px); }
    .tilt-z2 { transform: translateZ(50px); }
    .tilt-z3 { transform: translateZ(75px); }

    /* --- Floating Icon Spheres --- */
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

    /* --- Isometric Stage Image Layering --- */
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

    /* --- 3D Timeline --- */
    .timeline-container {
      position: relative;
      padding-left: 2rem;
    }

    .timeline-container::before {
      content: '';
      position: absolute;
      left: 7px;
      top: 10px;
      bottom: 10px;
      width: 3px;
      background: linear-gradient(to bottom, var(--gold), var(--navy));
    }

    .timeline-node {
      position: relative;
      margin-bottom: 2.5rem;
    }

    .timeline-node::before {
      content: '';
      position: absolute;
      left: -2rem;
      top: 5px;
      width: 17px;
      height: 17px;
      border-radius: 50%;
      background: var(--gold);
      border: 3px solid #fff;
      box-shadow: 0 0 10px var(--gold-glow);
    }

    /* --- Tactile 3D Button --- */
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

  <!-- Hero Section -->
  <section class="hero-3d-bg text-white py-5 position-relative">
    <div class="container py-5 text-center position-relative" style="z-index: 2;">
      <span class="text-gold text-uppercase fw-bold tracking-wide badge bg-dark bg-opacity-50 px-3 py-2 rounded-pill border border-warning border-opacity-25 mb-3">
        Future-Forward Strategy
      </span>
      <h1 class="display-3 fw-bold mt-2">Shaping Tomorrow's Skylines</h1>
      <p class="lead text-white-50 mx-auto fs-4" style="max-width: 750px;">
        Our vision is to transform urban landscapes through intelligent architectural concepts, zero-carbon developments, and sustainable luxury living.
      </p>
    </div>
  </section>

  <!-- Core Vision Highlight with Isometric Layering -->
  <section class="py-5 overflow-hidden">
    <div class="container py-5">
      <div class="row align-items-center g-5">
        <div class="col-lg-6 stage-3d">
          <div class="image-stage p-2">
            <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=900&q=80" alt="Futuristic Architectural Skyscraper" class="img-fluid main-img-3d">
            <div class="floating-glass-badge">
              <h2 class="fw-bold text-gold mb-0">2030</h2>
              <p class="mb-0 text-white-50 small fw-semibold">Net Zero Target</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <span class="text-gold fw-bold text-uppercase tracking-wide">The Grand Vision</span>
          <h2 class="display-5 fw-bold text-navy my-3">Architecting Sustainable Horizon Capital</h2>
          <p class="fs-5 text-secondary mb-4">
            We envision a world where cities thrive in harmony with natural ecosystems. By blending smart energy grids, biophilic design, and resilient structures, our developments set the definitive benchmark for 21st-century real estate.
          </p>
          
          <div class="row g-3">
            <div class="col-6">
              <div class="p-3 bg-white rounded-4 shadow-sm border border-light d-flex align-items-center">
                <i class="bi bi-globe-americas text-gold fs-2 me-3"></i>
                <div>
                  <h6 class="fw-bold mb-0">Global Footprint</h6>
                  <span class="text-muted small">Iconic Developments</span>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="p-3 bg-white rounded-4 shadow-sm border border-light d-flex align-items-center">
                <i class="bi bi-lightning-charge-fill text-gold fs-2 me-3"></i>
                <div>
                  <h6 class="fw-bold mb-0">Clean Energy</h6>
                  <span class="text-muted small">Self-Sustaining Power</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 3D Vision Pillars Grid -->
  <section class="py-5 bg-light position-relative">
    <div class="container py-5">
      <div class="text-center mb-5">
        <span class="text-gold fw-bold text-uppercase tracking-wide">Strategic Directives</span>
        <h2 class="display-6 fw-bold text-navy">The Four Cornerstones</h2>
      </div>

      <div class="row g-4">
        <!-- Pillar 1 -->
        <div class="col-lg-6">
          <div class="p-4 vision-card h-100" data-tilt data-tilt-max="10" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.15">
            <div class="d-flex align-items-start">
              <div class="icon-box-3d text-white me-4 tilt-z2 flex-shrink-0">
                <i class="bi bi-building-check fs-2"></i>
              </div>
              <div class="tilt-z1">
                <h3 class="fw-bold text-navy mb-2">Architectural Innovation</h3>
                <p class="text-secondary mb-0">
                  Designing adaptable spaces that integrate smart building operating systems, robotic facilities management, and future-proof structural frameworks.
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Pillar 2 -->
        <div class="col-lg-6">
          <div class="p-4 vision-card h-100" data-tilt data-tilt-max="10" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.15">
            <div class="d-flex align-items-start">
              <div class="icon-box-3d text-white me-4 tilt-z2 flex-shrink-0" style="background: linear-gradient(135deg, #0b1d3a 0%, #1a3c70 100%);">
                <i class="bi bi-tree-fill fs-2 text-gold"></i>
              </div>
              <div class="tilt-z1">
                <h3 class="fw-bold text-navy mb-2">Decarbonized Living</h3>
                <p class="text-secondary mb-0">
                  Targeting 100% renewable powered communities equipped with rainwater harvesting, thermal insulation, and embodied carbon reduction.
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Pillar 3 -->
        <div class="col-lg-6">
          <div class="p-4 vision-card h-100" data-tilt data-tilt-max="10" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.15">
            <div class="d-flex align-items-start">
              <div class="icon-box-3d text-white me-4 tilt-z2 flex-shrink-0" style="background: linear-gradient(135deg, #0b1d3a 0%, #1a3c70 100%);">
                <i class="bi bi-pie-chart-fill fs-2 text-gold"></i>
              </div>
              <div class="tilt-z1">
                <h3 class="fw-bold text-navy mb-2">Enduring Asset Growth</h3>
                <p class="text-secondary mb-0">
                  Curating premier urban land parcels to offer investors low-risk, high-yield appreciation backed by resilient infrastructure.
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Pillar 4 -->
        <div class="col-lg-6">
          <div class="p-4 vision-card h-100" data-tilt data-tilt-max="10" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.15">
            <div class="d-flex align-items-start">
              <div class="icon-box-3d text-white me-4 tilt-z2 flex-shrink-0">
                <i class="bi bi-people-fill fs-2"></i>
              </div>
              <div class="tilt-z1">
                <h3 class="fw-bold text-navy mb-2">Human-Centric Ecosystems</h3>
                <p class="text-secondary mb-0">
                  Fostering connected communities with dedicated wellness centers, accessible green spaces, and integrated civic amenities.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 2030 Roadmap Timeline Section -->
  <section class="py-5">
    <div class="container py-4">
      <div class="row align-items-center g-5">
        <div class="col-lg-5">
          <span class="text-gold fw-bold text-uppercase tracking-wide">Roadmap</span>
          <h2 class="display-6 fw-bold text-navy mb-3">Our 2030 Strategic Milestones</h2>
          <p class="text-secondary">
            A clear timeline toward achieving carbon neutrality, digital smart-grid integration, and global portfolio expansion.
          </p>
        </div>
        <div class="col-lg-7">
          <div class="timeline-container ms-2">
            <div class="timeline-node">
              <h5 class="fw-bold text-navy mb-1">2026 — Smart Grid Adoption</h5>
              <p class="text-muted small">Standardizing IoT-driven automated energy optimization across all commercial developments.</p>
            </div>
            <div class="timeline-node">
              <h5 class="fw-bold text-navy mb-1">2028 — 100% Circular Material Sourcing</h5>
              <p class="text-muted small">Transitioning all construction inputs to certified low-carbon recycled concrete and timber.</p>
            </div>
            <div class="timeline-node">
              <h5 class="fw-bold text-navy mb-1">2030 — Net-Zero Carbon Portfolio</h5>
              <p class="text-muted small">Achieving total operational carbon neutrality across residential and commercial holdings.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <section class="bg-navy text-white py-5 position-relative overflow-hidden">
    <div class="container text-center py-4 position-relative" style="z-index: 2;">
      <h2 class="display-5 fw-bold mb-3">Partner With Us on Future Developments</h2>
      <p class="text-white-50 fs-5 mb-4 mx-auto" style="max-width: 600px;">Explore co-investment opportunities or consult our development team.</p>
      <a href="#" class="btn btn-3d-gold fw-bold px-5 py-3 fs-5 me-3">Invest With Us</a>
      <a href="#" class="btn btn-outline-light px-4 py-3 rounded-3 fs-5 mt-3 mt-sm-0">View Projects</a>
    </div>
  </section>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Vanilla-Tilt JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.0/vanilla-tilt.min.js"></script>
</body>
</html>