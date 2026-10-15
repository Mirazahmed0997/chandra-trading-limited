<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Executive Leadership | Premium Real Estate</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

    /* --- 3D Interactive Team Cards --- */
    .team-card {
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

    .team-card:hover {
      box-shadow: 0 30px 60px rgba(11, 29, 58, 0.22),
                  0 0 25px var(--gold-glow);
      border-color: rgba(197, 160, 89, 0.6);
    }

    /* --- Parallax Z-Axis Depth Layers --- */
    .tilt-z1 { transform: translateZ(25px); }
    .tilt-z2 { transform: translateZ(50px); }
    .tilt-z3 { transform: translateZ(75px); }

    /* --- Portrait Frame with 3D Pop-out --- */
    .portrait-wrapper {
      position: relative;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 15px 30px rgba(11, 29, 58, 0.2);
    }

    .portrait-wrapper img {
      transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1);
      width: 100%;
      height: 380px;
      object-fit: cover;
    }

    .team-card:hover .portrait-wrapper img {
      transform: scale(1.08);
    }

    /* Floating Glass Rank Tag */
    .rank-tag-3d {
      position: absolute;
      top: 15px;
      right: 15px;
      background: rgba(11, 29, 58, 0.8);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(197, 160, 89, 0.4);
      color: var(--gold);
      padding: 6px 14px;
      border-radius: 30px;
      font-size: 0.8rem;
      font-weight: 700;
      letter-spacing: 1px;
    }

    /* --- Social Media Glass Pill --- */
    .social-pill-3d {
      display: inline-flex;
      gap: 12px;
      background: rgba(11, 29, 58, 0.05);
      border: 1px solid rgba(11, 29, 58, 0.1);
      padding: 8px 16px;
      border-radius: 50px;
    }

    .social-pill-3d a {
      color: var(--navy);
      transition: color 0.3s ease, transform 0.3s ease;
      display: inline-block;
    }

    .social-pill-3d a:hover {
      color: var(--gold);
      transform: translateY(-3px) scale(1.15);
    }

    /* --- Board Member Compact Cards --- */
    .board-card-3d {
      background: #ffffff;
      border-radius: 20px;
      border: 1px solid rgba(0,0,0,0.05);
      transform-style: preserve-3d;
      transition: all 0.3s ease;
    }

    .board-card-3d:hover {
      box-shadow: 0 20px 35px rgba(11, 29, 58, 0.12);
      border-color: rgba(197, 160, 89, 0.4);
    }

    .avatar-3d {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      box-shadow: 0 8px 20px rgba(11, 29, 58, 0.15);
      border: 2px solid var(--gold);
    }
  </style>
</head>
<body>


  <section class="py-5">
    <div class="container py-4">
      <div class="text-center mb-5">
        <span class="text-gold fw-bold text-uppercase tracking-wide">Managment</span>
        <h2 class="display-6 fw-bold text-navy">Steering Our Vision</h2>
      </div>

      <div class="row g-4">
        <!-- Executive 1 -->
        <div class="col-lg-4 col-md-6">
          <div class="p-4 team-card h-100 d-flex flex-column" data-tilt data-tilt-max="12" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2">
            <div class="portrait-wrapper tilt-z2 mb-4">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_hwcxn1PQBSma3J0mLF_CplAyFOryRQLGBQFXvvNl90wF99Rn0ikyq532&s=10" alt="CEO Portrait">
              <span class="rank-tag-3d">FOUNDER & CEO</span>
            </div>
            
            <div class="tilt-z2 flex-grow-1">
              <h3 class="fw-bold text-navy mb-1"></h3>
              <p class="text-gold fw-semibold mb-3">Chief Executive Officer</p>
              <p class="text-secondary small mb-4">
                Former Senior Principal at Gensler with 22+ years directing global mega-developments exceeding $4B in gross asset value.
              </p>
            </div>

            <div class="tilt-z3 mt-auto pt-3 border-top border-light d-flex justify-content-between align-items-center">
              <div class="social-pill-3d">
                <a href="#"><i class="bi bi-linkedin fs-5"></i></a>
                <a href="#"><i class="bi bi-twitter-x fs-5"></i></a>
                <a href="#"><i class="bi bi-envelope-fill fs-5"></i></a>
              </div>
              <span class="badge bg-navy text-gold p-2 rounded-3 small fw-bold">22+ Yrs Exp</span>
            </div>
          </div>
        </div>

        <!-- Executive 2 -->
        <div class="col-lg-4 col-md-6">
          <div class="p-4 team-card h-100 d-flex flex-column" data-tilt data-tilt-max="12" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2">
            <div class="portrait-wrapper tilt-z2 mb-4">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_hwcxn1PQBSma3J0mLF_CplAyFOryRQLGBQFXvvNl90wF99Rn0ikyq532&s=10" alt="COO Portrait">
              <span class="rank-tag-3d">DESIGN DIRECTOR</span>
            </div>
            
            <div class="tilt-z2 flex-grow-1">
              <h3 class="fw-bold text-navy mb-1"></h3>
              <p class="text-gold fw-semibold mb-3">Chief Operating Officer</p>
              <p class="text-secondary small mb-4">
                Pioneered zero-carbon structural frameworks and oversees urban project execution across residential and commercial portfolios.
              </p>
            </div>

            <div class="tilt-z3 mt-auto pt-3 border-top border-light d-flex justify-content-between align-items-center">
              <div class="social-pill-3d">
                <a href="#"><i class="bi bi-linkedin fs-5"></i></a>
                <a href="#"><i class="bi bi-twitter-x fs-5"></i></a>
                <a href="#"><i class="bi bi-envelope-fill fs-5"></i></a>
              </div>
              <span class="badge bg-navy text-gold p-2 rounded-3 small fw-bold">18+ Yrs Exp</span>
            </div>
          </div>
        </div>

        <!-- Executive 3 -->
        <div class="col-lg-4 col-md-6">
          <div class="p-4 team-card h-100 d-flex flex-column" data-tilt data-tilt-max="12" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2">
            <div class="portrait-wrapper tilt-z2 mb-4">
              <img src=https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_hwcxn1PQBSma3J0mLF_CplAyFOryRQLGBQFXvvNl90wF99Rn0ikyq532&s=10" alt="CFO Portrait">
              <span class="rank-tag-3d">FINANCE HEAD</span>
            </div>
            
            <div class="tilt-z2 flex-grow-1">
              <h3 class="fw-bold text-navy mb-1"></h3>
              <p class="text-gold fw-semibold mb-3">Chief Financial Officer</p>
              <p class="text-secondary small mb-4">
                Ex-Goldman Sachs Real Estate Investment Banking VP overseeing private equity structuring, capital allocation, and REIT strategies.
              </p>
            </div>

            <div class="tilt-z3 mt-auto pt-3 border-top border-light d-flex justify-content-between align-items-center">
              <div class="social-pill-3d">
                <a href="#"><i class="bi bi-linkedin fs-5"></i></a>
                <a href="#"><i class="bi bi-twitter-x fs-5"></i></a>
                <a href="#"><i class="bi bi-envelope-fill fs-5"></i></a>
              </div>
              <span class="badge bg-navy text-gold p-2 rounded-3 small fw-bold">15+ Yrs Exp</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  
  <section class="bg-navy text-white py-5 position-relative overflow-hidden">
    <div class="container text-center py-4 position-relative" style="z-index: 2;">
      <h2 class="display-6 fw-bold mb-3">Shape the Future of Real Estate</h2>
      <p class="text-white-50 fs-5 mb-4 mx-auto" style="max-width: 600px;">We are always looking for visionary architects, engineers, and financial analysts.</p>
      <a href="#" class="btn btn-warning bg-gold border-0 text-white fw-bold px-4 py-3 me-2 shadow-lg rounded-3">View Open Positions</a>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.0/vanilla-tilt.min.js"></script>
</body>
</html>