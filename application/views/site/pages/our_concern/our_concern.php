<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Concerns | Premium Real Estate Group</title>
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

    /* --- 3D Interactive Concern Cards --- */
    .concern-card {
      position: relative;
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.6);
      border-radius: 24px;
      transform-style: preserve-3d;
      box-shadow: 0 20px 40px rgba(11, 29, 58, 0.08);
      transition: box-shadow 0.3s ease, border-color 0.3s ease;
      overflow: hidden;
    }

    .concern-card:hover {
      box-shadow: 0 30px 60px rgba(11, 29, 58, 0.22),
                  0 0 25px var(--gold-glow);
      border-color: rgba(197, 160, 89, 0.6);
    }

    .tilt-z1 { transform: translateZ(25px); }
    .tilt-z2 { transform: translateZ(50px); }
    .tilt-z3 { transform: translateZ(75px); }

    /* --- Card Image Wrapper --- */
    .concern-img-wrapper {
      position: relative;
      border-radius: 18px;
      overflow: hidden;
      height: 220px;
      box-shadow: 0 10px 20px rgba(11, 29, 58, 0.15);
    }

    .concern-img-wrapper img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .concern-card:hover .concern-img-wrapper img {
      transform: scale(1.08);
    }

    /* Floating Industry Tag */
    .industry-badge-3d {
      position: absolute;
      top: 15px;
      left: 15px;
      background: rgba(11, 29, 58, 0.85);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(197, 160, 89, 0.4);
      color: var(--gold);
      padding: 6px 14px;
      border-radius: 30px;
      font-size: 0.75rem;
      font-weight: 700;
      letter-spacing: 1px;
    }

    /* --- 3D Floating Icon Badge --- */
    .concern-icon-box {
      width: 60px;
      height: 60px;
      border-radius: 16px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, var(--gold) 0%, #9e7a37 100%);
      color: #fff;
      box-shadow: 0 10px 20px rgba(197, 160, 89, 0.35);
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
        Group Ecosystem
      </span>
      <h1 class="display-3 fw-bold mt-2">Our Sister Concerns</h1>
      <p class="lead text-white-50 mx-auto fs-4" style="max-width: 750px;">
        A diversified portfolio of specialized subsidiaries driving excellence across development, architecture, property management, and green energy.
      </p>
    </div>
  </section>

  <!-- Group Synergy Overview -->
  <section class="py-5">
    <div class="container py-4 text-center">
      <span class="text-gold fw-bold text-uppercase tracking-wide">Integrated Network</span>
      <h2 class="display-6 fw-bold text-navy mb-3">End-to-End Real Estate Ecosystem</h2>
      <p class="text-secondary mx-auto fs-5" style="max-width: 800px;">
        Our strategic business units collaborate seamlessly to deliver turnkey urban infrastructure—from initial land acquisition to long-term asset management.
      </p>
    </div>
  </section>

  <!-- Concern Cards Grid -->
  <section class="py-4">
    <div class="container pb-5">
      <div class="row g-4">
        
        <!-- Concern 1: Residential & Luxury Real Estate -->
        <div class="col-lg-4 col-md-6">
          <div class="p-4 concern-card h-100 d-flex flex-column" data-tilt data-tilt-max="12" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2">
            <div class="concern-img-wrapper tilt-z2 mb-4">
              <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80" alt="Vance Homes">
              <span class="industry-badge-3d">RESIDENTIAL</span>
            </div>
            <div class="tilt-z2 flex-grow-1">
              <div class="d-flex align-items-center mb-3">
                <div class="concern-icon-box me-3">
                  <i class="bi bi-house-door-fill fs-3"></i>
                </div>
                <div>
                  <h4 class="fw-bold text-navy mb-0">Vance Living</h4>
                  <span class="text-muted small">Luxury Residential Estates</span>
                </div>
              </div>
              <p class="text-secondary small mb-4">
                Developing iconic high-rise condominiums, gated waterfront villas, and bespoke urban apartments built for modern family life.
              </p>
            </div>
            <div class="tilt-z3 mt-auto pt-3 border-top border-light d-flex justify-content-between align-items-center">
              <span class="badge bg-navy text-gold px-3 py-2 rounded-3 small fw-bold">45+ Projects</span>
              <a href="#" class="text-navy fw-bold text-decoration-none small">Visit Website <i class="bi bi-arrow-right text-gold ms-1"></i></a>
            </div>
          </div>
        </div>

        <!-- Concern 2: Commercial & Retail Properties -->
        <div class="col-lg-4 col-md-6">
          <div class="p-4 concern-card h-100 d-flex flex-column" data-tilt data-tilt-max="12" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2">
            <div class="concern-img-wrapper tilt-z2 mb-4">
              <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=800&q=80" alt="Apex Commercial">
              <span class="industry-badge-3d">COMMERCIAL</span>
            </div>
            <div class="tilt-z2 flex-grow-1">
              <div class="d-flex align-items-center mb-3">
                <div class="concern-icon-box me-3" style="background: linear-gradient(135deg, #0b1d3a 0%, #1a3c70 100%);">
                  <i class="bi bi-building-fill fs-3 text-gold"></i>
                </div>
                <div>
                  <h4 class="fw-bold text-navy mb-0">Apex Commercial</h4>
                  <span class="text-muted small">Corporate Towers & Retail</span>
                </div>
              </div>
              <p class="text-secondary small mb-4">
                Constructing Grade-A corporate office towers, tech parks, and luxury retail plazas across major business districts.
              </p>
            </div>
            <div class="tilt-z3 mt-auto pt-3 border-top border-light d-flex justify-content-between align-items-center">
              <span class="badge bg-navy text-gold px-3 py-2 rounded-3 small fw-bold">18 Skyscrapers</span>
              <a href="#" class="text-navy fw-bold text-decoration-none small">Visit Website <i class="bi bi-arrow-right text-gold ms-1"></i></a>
            </div>
          </div>
        </div>

        <!-- Concern 3: Architectural Design Studio -->
        <div class="col-lg-4 col-md-6">
          <div class="p-4 concern-card h-100 d-flex flex-column" data-tilt data-tilt-max="12" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2">
            <div class="concern-img-wrapper tilt-z2 mb-4">
              <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=800&q=80" alt="Aether Studio">
              <span class="industry-badge-3d">ARCHITECTURE</span>
            </div>
            <div class="tilt-z2 flex-grow-1">
              <div class="d-flex align-items-center mb-3">
                <div class="concern-icon-box me-3">
                  <i class="bi bi-pencil-ruler fs-3"></i>
                </div>
                <div>
                  <h4 class="fw-bold text-navy mb-0">Aether Design</h4>
                  <span class="text-muted small">Architectural & Interior Studio</span>
                </div>
              </div>
              <p class="text-secondary small mb-4">
                Award-winning master planning, interior design, and structural engineering unit specializing in biophilic architecture.
              </p>
            </div>
            <div class="tilt-z3 mt-auto pt-3 border-top border-light d-flex justify-content-between align-items-center">
              <span class="badge bg-navy text-gold px-3 py-2 rounded-3 small fw-bold">12 Global Awards</span>
              <a href="#" class="text-navy fw-bold text-decoration-none small">Visit Website <i class="bi bi-arrow-right text-gold ms-1"></i></a>
            </div>
          </div>
        </div>

        <!-- Concern 4: Property Management & Hospitality -->
        <div class="col-lg-4 col-md-6">
          <div class="p-4 concern-card h-100 d-flex flex-column" data-tilt data-tilt-max="12" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2">
            <div class="concern-img-wrapper tilt-z2 mb-4">
              <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=800&q=80" alt="Haven Facilities">
              <span class="industry-badge-3d">MANAGEMENT</span>
            </div>
            <div class="tilt-z2 flex-grow-1">
              <div class="d-flex align-items-center mb-3">
                <div class="concern-icon-box me-3" style="background: linear-gradient(135deg, #0b1d3a 0%, #1a3c70 100%);">
                  <i class="bi bi-key-fill fs-3 text-gold"></i>
                </div>
                <div>
                  <h4 class="fw-bold text-navy mb-0">Haven Services</h4>
                  <span class="text-muted small">Asset & Facility Management</span>
                </div>
              </div>
              <p class="text-secondary small mb-4">
                Comprehensive 24/7 facility operations, concierge services, security systems, and lease management for investors.
              </p>
            </div>
            <div class="tilt-z3 mt-auto pt-3 border-top border-light d-flex justify-content-between align-items-center">
              <span class="badge bg-navy text-gold px-3 py-2 rounded-3 small fw-bold">10k+ Units Managed</span>
              <a href="#" class="text-navy fw-bold text-decoration-none small">Visit Website <i class="bi bi-arrow-right text-gold ms-1"></i></a>
            </div>
          </div>
        </div>

        <!-- Concern 5: Renewable Energy & Smart Grid -->
        <div class="col-lg-4 col-md-6">
          <div class="p-4 concern-card h-100 d-flex flex-column" data-tilt data-tilt-max="12" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2">
            <div class="concern-img-wrapper tilt-z2 mb-4">
              <img src="https://images.unsplash.com/photo-1509391365360-2e959784a276?auto=format&fit=crop&w=800&q=80" alt="Verde Energy">
              <span class="industry-badge-3d">GREEN TECH</span>
            </div>
            <div class="tilt-z2 flex-grow-1">
              <div class="d-flex align-items-center mb-3">
                <div class="concern-icon-box me-3">
                  <i class="bi bi-sun-fill fs-3"></i>
                </div>
                <div>
                  <h4 class="fw-bold text-navy mb-0">Verde Power</h4>
                  <span class="text-muted small">Clean Energy Solutions</span>
                </div>
              </div>
              <p class="text-secondary small mb-4">
                Integrating solar panel arrays, micro-grid electricity, and smart energy storage into modern real estate developments.
              </p>
            </div>
            <div class="tilt-z3 mt-auto pt-3 border-top border-light d-flex justify-content-between align-items-center">
              <span class="badge bg-navy text-gold px-3 py-2 rounded-3 small fw-bold">100% Green Energy</span>
              <a href="#" class="text-navy fw-bold text-decoration-none small">Visit Website <i class="bi bi-arrow-right text-gold ms-1"></i></a>
            </div>
          </div>
        </div>

        <!-- Concern 6: Infrastructure & Land Acquisition -->
        <div class="col-lg-4 col-md-6">
          <div class="p-4 concern-card h-100 d-flex flex-column" data-tilt data-tilt-max="12" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2">
            <div class="concern-img-wrapper tilt-z2 mb-4">
              <img src="https://images.unsplash.com/photo-1541888946425-d0fbb186a5b7?auto=format&fit=crop&w=800&q=80" alt="Terra Infra">
              <span class="industry-badge-3d">INFRASTRUCTURE</span>
            </div>
            <div class="tilt-z2 flex-grow-1">
              <div class="d-flex align-items-center mb-3">
                <div class="concern-icon-box me-3" style="background: linear-gradient(135deg, #0b1d3a 0%, #1a3c70 100%);">
                  <i class="bi bi-geo-alt-fill fs-3 text-gold"></i>
                </div>
                <div>
                  <h4 class="fw-bold text-navy mb-0">Terra Infra</h4>
                  <span class="text-muted small">Land Banking & Civil Works</span>
                </div>
              </div>
              <p class="text-secondary small mb-4">
                Securing prime urban land plots, executing civil site preparation, and developing foundational transport connections.
              </p>
            </div>
            <div class="tilt-z3 mt-auto pt-3 border-top border-light d-flex justify-content-between align-items-center">
              <span class="badge bg-navy text-gold px-3 py-2 rounded-3 small fw-bold">500+ Acres</span>
              <a href="#" class="text-navy fw-bold text-decoration-none small">Visit Website <i class="bi bi-arrow-right text-gold ms-1"></i></a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Call to Action Banner -->
  <section class="bg-navy text-white py-5 position-relative overflow-hidden">
    <div class="container text-center py-4 position-relative" style="z-index: 2;">
      <h2 class="display-5 fw-bold mb-3">Explore Partnership Opportunities</h2>
      <p class="text-white-50 fs-5 mb-4 mx-auto" style="max-width: 600px;">Connect with our corporate strategy team to explore joint ventures across our subsidiaries.</p>
      <a href="#" class="btn btn-3d-gold fw-bold px-5 py-3 fs-5 me-3">Contact Corporate Office</a>
      <a href="#" class="btn btn-outline-light px-4 py-3 rounded-3 fs-5 mt-3 mt-sm-0">Download Group Brochure</a>
    </div>
  </section>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Vanilla-Tilt JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.0/vanilla-tilt.min.js"></script>
</body>
</html>