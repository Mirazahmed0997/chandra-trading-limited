<?php
// Optimized query: Select only required columns to improve speed and lower memory usage
$projects = $this->db
    ->select('id, property_name, location, description, size, project_status, property_type, gallery')
    ->where('status', 'Published')
    ->order_by('created_at', 'DESC')
    ->get('properties')
    ->result_array();
?>
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
    .text-navy { color: var(--navy); }
    .text-gold { color: var(--gold); }
    .bg-gold { background-color: var(--gold); }

    /* --- Filter Buttons --- */
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

    /* --- Smooth Filtering Animation --- */
    .project-item {
      transition: all 0.4s ease-in-out;
    }
    .project-item.d-none-filter {
      display: none !important;
    }

    /* --- 3D Interactive Showcase Cards --- */
    .showcase-card {
      position: relative;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.6);
      border-radius: 24px;
      transform-style: preserve-3d;
      box-shadow: 0 20px 40px rgba(11, 29, 58, 0.08);
      transition: box-shadow 0.3s ease, border-color 0.3s ease;
      overflow: hidden;
    }

    .showcase-card:hover {
      box-shadow: 0 30px 60px rgba(11, 29, 58, 0.22), 0 0 25px var(--gold-glow);
      border-color: rgba(197, 160, 89, 0.6);
    }

    .tilt-z2 { transform: translateZ(30px); }
    .tilt-z3 { transform: translateZ(50px); }

    /* --- Card Image Wrapper --- */
    .showcase-img-wrapper {
      position: relative;
      border-radius: 18px;
      overflow: hidden;
      height: 240px;
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

    /* Floating Status & Category Badges */
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
      box-shadow: 0 8px 20px rgba(197, 160, 89, 0.4), 0 4px 0px #7a5c25;
      transition: all 0.15s ease;
      text-decoration: none;
    }

    .btn-3d-gold:active {
      transform: translateY(3px);
      box-shadow: 0 4px 10px rgba(197, 160, 89, 0.4), 0 1px 0px #7a5c25;
    }
  </style>
</head>
<body>

<!-- Filter Category Bar -->
<section class="py-4">
    <div class="container text-center">
        <div class="d-flex flex-wrap justify-content-center gap-2">
            <button type="button" class="filter-btn active" data-filter="all">All Projects</button>
            <button type="button" class="filter-btn" data-filter="Upcoming">Upcoming</button>
            <button type="button" class="filter-btn" data-filter="Ongoing">Ongoing</button>
            <button type="button" class="filter-btn" data-filter="Completed">Completed</button>
        </div>
    </div>
</section>

<!-- Showcase Cards Grid -->
<section class="py-4">
    <div class="container pb-5">
        <div class="row g-4" id="projectsGrid">

            <?php if (!empty($projects)): ?>
                <?php foreach ($projects as $project): ?>
                    <?php
                    $project_status = !empty($project['project_status']) ? $project['project_status'] : 'Upcoming';
                    $property_type  = !empty($project['property_type']) ? $project['property_type'] : 'PROPERTY';
                    
                    // Decode image gallery safely
                    $project_image = base_url('assets/images/default-property.jpg');
                    if (!empty($project['gallery'])) {
                        $gallery = json_decode($project['gallery'], true);
                        if (is_array($gallery) && !empty($gallery[0])) {
                            $project_image = base_url('assets/uploads/properties/images/' . $gallery[0]);
                        }
                    }

                    $clean_desc = !empty($project['description']) ? strip_tags($project['description']) : '';
                    $short_desc = (mb_strlen($clean_desc) > 110) ? mb_substr($clean_desc, 0, 110) . '...' : $clean_desc;
                    ?>

                    <div class="col-lg-4 col-md-6 project-item" data-status="<?= htmlspecialchars($project_status, ENT_QUOTES, 'UTF-8'); ?>">
                        <div class="p-4 showcase-card h-100 d-flex flex-column"
                             data-tilt
                             data-tilt-max="10"
                             data-tilt-speed="400"
                             data-tilt-glare
                             data-tilt-max-glare="0.15">

                            <!-- Project Image -->
                            <div class="showcase-img-wrapper tilt-z2 mb-4">
                                <img src="<?= htmlspecialchars($project_image, ENT_QUOTES, 'UTF-8'); ?>"
                                     alt="<?= htmlspecialchars($project['property_name'], ENT_QUOTES, 'UTF-8'); ?>">

                                <span class="status-badge-3d">
                                    <?= htmlspecialchars(strtoupper($project_status), ENT_QUOTES, 'UTF-8'); ?>
                                </span>

                                <span class="category-badge-3d">
                                    <?= htmlspecialchars(strtoupper($property_type), ENT_QUOTES, 'UTF-8'); ?>
                                </span>
                            </div>

                            <!-- Project Info -->
                            <div class="tilt-z2 flex-grow-1">
                                <h4 class="fw-bold text-navy mb-1">
                                    <?= htmlspecialchars($project['property_name'], ENT_QUOTES, 'UTF-8'); ?>
                                </h4>

                                <?php if (!empty($project['location'])): ?>
                                    <p class="text-muted small mb-3">
                                        <i class="bi bi-geo-alt-fill text-gold me-1"></i>
                                        <?= htmlspecialchars($project['location'], ENT_QUOTES, 'UTF-8'); ?>
                                    </p>
                                <?php endif; ?>

                                <?php if (!empty($short_desc)): ?>
                                    <p class="text-secondary small mb-4">
                                        <?= htmlspecialchars($short_desc, ENT_QUOTES, 'UTF-8'); ?>
                                    </p>
                                <?php endif; ?>
                            </div>

                            <!-- Bottom Info -->
                            <div class="tilt-z3 mt-auto pt-3 border-top border-light d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="text-muted small d-block">Land Area</span>
                                    <strong class="text-navy">
                                        <?= !empty($project['size']) ? htmlspecialchars($project['size'], ENT_QUOTES, 'UTF-8') : 'N/A'; ?>
                                    </strong>
                                </div>

                                <a href="<?= base_url('properties_details_view/' . $project['id']); ?>" class="btn btn-3d-gold px-3 py-2 small fw-bold">
                                    View Project
                                </a>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <div class="text-muted">
                        <i class="bi bi-building fs-1 d-block mb-3"></i>
                        <h5>No projects available</h5>
                        <p class="mb-0">Please check back later for our latest projects.</p>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.0/vanilla-tilt.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // 1. Initialize VanillaTilt explicitly
    VanillaTilt.init(document.querySelectorAll("[data-tilt]"));

    // 2. Client-side Category Filtering
    const filterButtons = document.querySelectorAll('.filter-btn');
    const projectItems = document.querySelectorAll('.project-item');

    filterButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            const filter = this.getAttribute('data-filter');

            projectItems.forEach(function (item) {
                const status = item.getAttribute('data-status');
                if (filter === 'all' || status.toLowerCase() === filter.toLowerCase()) {
                    item.classList.remove('d-none-filter');
                } else {
                    item.classList.add('d-none-filter');
                }
            });
        });
    });
});
</script>

</body>
</html>