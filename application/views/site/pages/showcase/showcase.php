<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project Showcase | Premium Real Estate Group</title>
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

    /* --- Filter Pill Buttons --- */
    .filter-btn {
      background: rgba(11, 29, 58, 0.05);
      border: 1px solid rgba(11, 29, 58, 0.15);
      color: var(--navy);
      padding: 10px 24px;
      border-radius: 30px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .filter-btn:hover,
    .filter-btn.active {
      background: var(--navy);
      color: var(--gold);
      border-color: var(--navy);
      box-shadow: 0 8px 20px rgba(11, 29, 58, 0.2);
    }

    /* --- 3D Interactive Showcase Cards --- */
    .showcase-card {
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

    .showcase-card:hover {
      box-shadow: 0 30px 60px rgba(11, 29, 58, 0.22),
                  0 0 25px var(--gold-glow);
      border-color: rgba(197, 160, 89, 0.6);
    }

    .tilt-z1 { transform: translateZ(25px); }
    .tilt-z2 { transform: translateZ(50px); }
    .tilt-z3 { transform: translateZ(75px); }

    /* --- Card Image Wrapper --- */
    .showcase-img-wrapper {
      position: relative;
      border-radius: 18px;
      overflow: hidden;
      height: 280px;
      box-shadow: 0 10px 20px rgba(11, 29, 58, 0.15);
    }

    .showcase-img-wrapper img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .showcase-card:hover .showcase-img-wrapper img {
      transform: scale(1.08);
    }

    /* Floating Status Badge */
    .status-badge-3d {
      position: absolute;
      top: 15px;
      right: 15px;
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

    /* Category Pill Badge */
    .category-badge-3d {
      position: absolute;
      bottom: 15px;
      left: 15px;
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(12px);
      color: var(--navy);
      padding: 6px 14px;
      border-radius: 30px;
      font-size: 0.75rem;
      font-weight: 700;
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
        Architectural Portfolio
      </span>
      <h1 class="display-3 fw-bold mt-2">Project Showcase</h1>
      <p class="lead text-white-50 mx-auto fs-4" style="max-width: 750px;">
        Explore our hallmark residential developments, commercial towers, and award-winning urban landmarks.
      </p>
    </div>
  </section>

  <!-- Filter Category Bar -->
  <section class="py-4">
    <div class="container text-center">
      <div class="d-flex flex-wrap justify-content-center gap-2">
        <button class="filter-btn active">All Projects</button>
        <button class="filter-btn">Residential</button>
        <button class="filter-btn">Commercial</button>
        <button class="filter-btn">Ongoing</button>
        <button class="filter-btn">Completed</button>
      </div>
    </div>
  </section>

  <!-- Showcase Cards Grid -->
  <section class="py-4">
    <div class="container pb-5">
      <div class="row g-4">
        
        <!-- Project 1 -->
        <div class="col-lg-4 col-md-6">
          <div class="p-4 showcase-card h-100 d-flex flex-column" data-tilt data-tilt-max="12" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2">
            <div class="showcase-img-wrapper tilt-z2 mb-4">
              <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=800&q=80" alt="The Grand Horizon">
              <span class="status-badge-3d">COMPLETED</span>
              <span class="category-badge-3d">RESIDENTIAL</span>
            </div>
            <div class="tilt-z2 flex-grow-1">
              <h4 class="fw-bold text-navy mb-1">The Grand Horizon</h4>
              <p class="text-muted small mb-3"><i class="bi bi-geo-alt-fill text-gold me-1"></i>Downtown Financial District</p>
              <p class="text-secondary small mb-4">
                A 45-story luxury residential tower featuring biophilic sky gardens, infinity pools, and panoramic skyline views.
              </p>
            </div>
            <div class="tilt-z3 mt-auto pt-3 border-top border-light d-flex justify-content-between align-items-center">
              <div>
                <span class="text-muted small d-block">Land Area</span>
                <strong class="text-navy">2.4 Acres</strong>
              </div>
              <a href="#" class="btn btn-3d-gold px-3 py-2 small fw-bold">View Project</a>
            </div>
          </div>
        </div>

        <!-- Project 2 -->
        <div class="col-lg-4 col-md-6">
          <div class="p-4 showcase-card h-100 d-flex flex-column" data-tilt data-tilt-max="12" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2">
            <div class="showcase-img-wrapper tilt-z2 mb-4">
              <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=800&q=80" alt="Aura Villa Estates">
              <span class="status-badge-3d">ONGOING</span>
              <span class="category-badge-3d">LUXURY VILLAS</span>
            </div>
            <div class="tilt-z2 flex-grow-1">
              <h4 class="fw-bold text-navy mb-1">Aura Villa Estates</h4>
              <p class="text-muted small mb-3"><i class="bi bi-geo-alt-fill text-gold me-1"></i>Waterfront Boulevard</p>
              <p class="text-secondary small mb-4">
                Gated collection of 18 exclusive waterfront smart villas with private boat docks and automated climate control.
              </p>
            </div>
            <div class="tilt-z3 mt-auto pt-3 border-top border-light d-flex justify-content-between align-items-center">
              <div>
                <span class="text-muted small d-block">Units</span>
                <strong class="text-navy">18 Bespoke Villas</strong>
              </div>
              <a href="#" class="btn btn-3d-gold px-3 py-2 small fw-bold">View Project</a>
            </div>
          </div>
        </div>

        <!-- Project 3 -->
        <div class="col-lg-4 col-md-6">
          <div class="p-4 showcase-card h-100 d-flex flex-column" data-tilt data-tilt-max="12" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2">
            <div class="showcase-img-wrapper tilt-z2 mb-4">
              <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=800&q=80" alt="Apex Tech Park">
              <span class="status-badge-3d">COMPLETED</span>
              <span class="category-badge-3d">COMMERCIAL</span>
            </div>
            <div class="tilt-z2 flex-grow-1">
              <h4 class="fw-bold text-navy mb-1">Apex Tech Park</h4>
              <p class="text-muted small mb-3"><i class="bi bi-geo-alt-fill text-gold me-1"></i>Silicon Corridor</p>
              <p class="text-secondary small mb-4">
                Grade-A LEED Platinum certified corporate headquarters engineered for sustainability and high-tech enterprises.
              </p>
            </div>
            <div class="tilt-z3 mt-auto pt-3 border-top border-light d-flex justify-content-between align-items-center">
              <div>
                <span class="text-muted small d-block">Floor Space</span>
                <strong class="text-navy">450,000 Sq.Ft</strong>
              </div>
              <a href="#" class="btn btn-3d-gold px-3 py-2 small fw-bold">View Project</a>
            </div>
          </div>
        </div>

        <!-- Project 4 -->
        <div class="col-lg-4 col-md-6">
          <div class="p-4 showcase-card h-100 d-flex flex-column" data-tilt data-tilt-max="12" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2">
            <div class="showcase-img-wrapper tilt-z2 mb-4">
              <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80" alt="Serenade Heights">
              <span class="status-badge-3d">UPCOMING</span>
              <span class="category-badge-3d">RESIDENTIAL</span>
            </div>
            <div class="tilt-z2 flex-grow-1">
              <h4 class="fw-bold text-navy mb-1">Serenade Heights</h4>
              <p class="text-muted small mb-3"><i class="bi bi-geo-alt-fill text-gold me-1"></i>Green Park Precinct</p>
              <p class="text-secondary small mb-4">
                Contemporary high-rise apartments designed around 5 acres of private parkland, wellness centers, and running tracks.
              </p>
            </div>
            <div class="tilt-z3 mt-auto pt-3 border-top border-light d-flex justify-content-between align-items-center">
              <div>
                <span class="text-muted small d-block">Completion</span>
                <strong class="text-navy">Q4 2027</strong>
              </div>
              <a href="#" class="btn btn-3d-gold px-3 py-2 small fw-bold">View Project</a>
            </div>
          </div>
        </div>

        <!-- Project 5 -->
        <div class="col-lg-4 col-md-6">
          <div class="p-4 showcase-card h-100 d-flex flex-column" data-tilt data-tilt-max="12" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2">
            <div class="showcase-img-wrapper tilt-z2 mb-4">
              <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=800&q=80" alt="Vance Galleria">
              <span class="status-badge-3d">COMPLETED</span>
              <span class="category-badge-3d">RETAIL</span>
            </div>
            <div class="tilt-z2 flex-grow-1">
              <h4 class="fw-bold text-navy mb-1">Vance Galleria</h4>
              <p class="text-muted small mb-3"><i class="bi bi-geo-alt-fill text-gold me-1"></i>Central Promenade</p>
              <p class="text-secondary small mb-4">
                Luxury retail mall housing global flagship fashion brands, fine-dining restaurants, and a state-of-the-art IMAX hall.
              </p>
            </div>
            <div class="tilt-z3 mt-auto pt-3 border-top border-light d-flex justify-content-between align-items-center">
              <div>
                <span class="text-muted small d-block">Retail Stores</span>
                <strong class="text-navy">120+ Outlets</strong>
              </div>
              <a href="#" class="btn btn-3d-gold px-3 py-2 small fw-bold">View Project</a>
            </div>
          </div>
        </div>

        <!-- Project 6 -->
        <div class="col-lg-4 col-md-6">
          <div class="p-4 showcase-card h-100 d-flex flex-column" data-tilt data-tilt-max="12" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2">
            <div class="showcase-img-wrapper tilt-z2 mb-4">
              <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=800&q=80" alt="EcoSphere Center">
              <span class="status-badge-3d">ONGOING</span>
              <span class="category-badge-3d">GREEN TECH</span>
            </div>
            <div class="tilt-z2 flex-grow-1">
              <h4 class="fw-bold text-navy mb-1">EcoSphere Center</h4>
              <p class="text-muted small mb-3"><i class="bi bi-geo-alt-fill text-gold me-1"></i>Innovation Hub</p>
              <p class="text-secondary small mb-4">
                Zero-carbon mixed-use development combining solar-roofed workspace modules with communal organic gardens.
              </p>
            </div>
            <div class="tilt-z3 mt-auto pt-3 border-top border-light d-flex justify-content-between align-items-center">
              <div>
                <span class="text-muted small d-block">Energy Rating</span>
                <strong class="text-navy">Net-Zero Carbon</strong>
              </div>
              <a href="#" class="btn btn-3d-gold px-3 py-2 small fw-bold">View Project</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- CTA Banner -->
  <section class="bg-navy text-white py-5 position-relative overflow-hidden">
    <div class="container text-center py-4 position-relative" style="z-index: 2;">
      <h2 class="display-5 fw-bold mb-3">Ready to Find Your Next Investment?</h2>
      <p class="text-white-50 fs-5 mb-4 mx-auto" style="max-width: 600px;">Schedule a private consultation or request detailed floorplans for any showcase project.</p>
      <a href="#" class="btn btn-3d-gold fw-bold px-5 py-3 fs-5 me-3">Book Private Tour</a>
      <a href="#" class="btn btn-outline-light px-4 py-3 rounded-3 fs-5 mt-3 mt-sm-0">Download Portfolio PDF</a>
    </div>
  </section>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Vanilla-Tilt JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.0/vanilla-tilt.min.js"></script>
</body>
</html>