<?php
// Initialize base query builder
$builder = $this->db->from('properties');

// 1. Property Type Filter
if ($this->input->get('property_type')) {
    $builder->where('property_type', $this->input->get('property_type'));
}

// 2. Location Filter
if ($this->input->get('location')) {
    $builder->where('location', $this->input->get('location'));
}

// 3. Status Filter (Mapped to database column 'project_status')
if ($this->input->get('status')) {
    $builder->where('project_status', $this->input->get('status'));
}

// 4. Price Range Filters
if ($this->input->get('min_price') !== null && $this->input->get('min_price') !== '') {
    $builder->where('price >=', (float) $this->input->get('min_price'));
}
if ($this->input->get('max_price') !== null && $this->input->get('max_price') !== '') {
    $builder->where('price <=', (float) $this->input->get('max_price'));
}

// 5. Size Filter (Cast string size to unsigned integer for numeric comparison)
if ($this->input->get('min_size') !== null && $this->input->get('min_size') !== '') {
    $min_size = (int) $this->input->get('min_size');
    $builder->where("CAST(size AS UNSIGNED) >=", $min_size);
}

// 6. Quick Search Keyword (Mapped to database column 'property_name')
if ($this->input->get('keyword')) {
    $builder->like('property_name', trim($this->input->get('keyword')));
}

// Execute query
$projects = $builder->order_by('created_at', 'DESC')
    ->limit(10)
    ->get()
    ->result_array();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Filter | Premium Real Estate</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --navy: #0b1d3a;
            --navy-light: #152e5a;
            --gold: #c5a059;
            --gold-light: #d8b878;
            --gold-glow: rgba(197, 160, 89, 0.35);
            --light-bg: #f4f6f9;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--light-bg);
            font-family: Arial, Helvetica, sans-serif;
            color: var(--navy);
            overflow-x: hidden;
        }

        .property-filter-section {
            position: relative;
            padding: 90px 0;
            overflow: hidden;
            background:
                radial-gradient(circle at 90% 20%, rgba(197, 160, 89, 0.12), transparent 30%),
                radial-gradient(circle at 10% 80%, rgba(11, 29, 58, 0.08), transparent 30%),
                #f4f6f9;
        }

        .decor-circle {
            position: absolute;
            width: 280px;
            height: 280px;
            border: 1px solid rgba(197, 160, 89, 0.15);
            border-radius: 50%;
            right: -100px;
            top: 40px;
        }

        .decor-circle-2 {
            position: absolute;
            width: 180px;
            height: 180px;
            border: 1px solid rgba(11, 29, 58, 0.08);
            border-radius: 50%;
            left: -70px;
            bottom: 30px;
        }

        .filter-header {
            text-align: center;
            margin-bottom: 45px;
        }

        .filter-subtitle {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 18px;
            border-radius: 50px;
            background: rgba(11, 29, 58, 0.06);
            border: 1px solid rgba(11, 29, 58, 0.12);
            color: var(--gold);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .filter-header h2 {
            margin-top: 18px;
            margin-bottom: 12px;
            font-size: clamp(32px, 5vw, 48px);
            font-weight: 800;
            color: var(--navy);
        }

        .filter-header h2 span {
            color: var(--gold);
        }

        .filter-header p {
            max-width: 650px;
            margin: auto;
            color: #737b89;
            font-size: 16px;
        }

        .filter-card {
            position: relative;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 28px;
            padding: 38px;
            box-shadow:
                0 25px 60px rgba(11, 29, 58, 0.10),
                0 5px 15px rgba(11, 29, 58, 0.04);
            transition: all 0.4s ease;
        }

        .filter-card:hover {
            box-shadow:
                0 35px 80px rgba(11, 29, 58, 0.16),
                0 0 35px var(--gold-glow);
        }

        .filter-box {
            height: 100%;
            padding: 22px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.75);
            border: 1px solid rgba(11, 29, 58, 0.08);
            transition: all 0.3s ease;
        }

        .filter-box:hover {
            transform: translateY(-4px);
            border-color: rgba(197, 160, 89, 0.45);
            box-shadow: 0 12px 30px rgba(11, 29, 58, 0.08);
        }

        .filter-label {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 18px;
            font-size: 13px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--navy);
        }

        .filter-label i {
            color: var(--gold);
            font-size: 18px;
        }

        .option-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .option-item {
            position: relative;
        }

        .option-item input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .option-item label {
            display: inline-block;
            padding: 9px 15px;
            border-radius: 30px;
            border: 1px solid #dfe3e8;
            background: #fff;
            color: #555d68;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .option-item label:hover {
            border-color: var(--gold);
            color: var(--navy);
            transform: translateY(-2px);
        }

        .option-item input:checked+label {
            background: var(--navy);
            border-color: var(--navy);
            color: var(--gold);
            box-shadow: 0 7px 18px rgba(11, 29, 58, 0.18);
        }

        .price-wrapper {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .price-field {
            position: relative;
            flex: 1;
        }

        .currency {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gold);
            font-size: 17px;
            font-weight: 700;
        }

        .price-input {
            width: 100%;
            padding: 12px 10px 12px 32px;
            border: 1px solid #dfe3e8;
            border-radius: 10px;
            outline: none;
            font-size: 14px;
            color: var(--navy);
            background: #fff;
            transition: all 0.25s ease;
        }

        .price-input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(197, 160, 89, 0.12);
        }

        .price-to {
            font-size: 13px;
            color: #858c96;
        }

        .size-field {
            position: relative;
        }

        .size-input {
            width: 100%;
            padding: 12px 65px 12px 15px;
            border: 1px solid #dfe3e8;
            border-radius: 10px;
            outline: none;
            font-size: 14px;
            background: #fff;
            transition: all 0.25s ease;
        }

        .size-input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(197, 160, 89, 0.12);
        }

        .size-unit {
            position: absolute;
            right: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            font-size: 12px;
            font-weight: 600;
        }

        .filter-action {
            margin-top: 28px;
            padding-top: 25px;
            border-top: 1px solid rgba(11, 29, 58, 0.08);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .search-property-btn {
            position: relative;
            border: none;
            padding: 14px 30px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--gold-light), #a8813b);
            color: #fff;
            font-size: 14px;
            font-weight: 800;
            letter-spacing: .5px;
            box-shadow: 0 10px 25px rgba(197, 160, 89, 0.35), 0 4px 0 #7a5c25;
            transition: all 0.2s ease;
        }

        .search-property-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(197, 160, 89, 0.4), 0 4px 0 #7a5c25;
        }

        .search-property-btn:active {
            transform: translateY(3px);
            box-shadow: 0 5px 10px rgba(197, 160, 89, 0.3), 0 1px 0 #7a5c25;
        }

        .reset-btn {
            border: none;
            background: transparent;
            color: #7c8490;
            font-size: 13px;
            font-weight: 600;
            transition: .25s;
        }

        .reset-btn:hover {
            color: var(--navy);
        }

        @media (max-width: 991px) {
            .property-filter-section {
                padding: 70px 0;
            }

            .filter-card {
                padding: 25px;
            }
        }

        @media (max-width: 575px) {
            .property-filter-section {
                padding: 55px 0;
            }

            .filter-header {
                margin-bottom: 30px;
            }

            .filter-header h2 {
                font-size: 32px;
            }

            .filter-card {
                padding: 15px;
                border-radius: 20px;
            }

            .filter-box {
                padding: 18px;
            }

            .price-wrapper {
                flex-direction: column;
                align-items: stretch;
            }

            .price-to {
                text-align: center;
            }

            .filter-action {
                flex-direction: column;
                align-items: stretch;
            }

            .search-property-btn {
                width: 100%;
            }

            .reset-btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <section class="property-filter-section">
        <div class="decor-circle"></div>
        <div class="decor-circle-2"></div>

        <div class="container position-relative">
            <div class="filter-header">
                <span class="filter-subtitle">
                    <i class="bi bi-buildings"></i>
                    Find Your Property
                </span>
                <h2>Property <span>Filter</span></h2>
                <p>Explore our carefully selected properties and find a place that perfectly matches your needs.</p>
            </div>

            <div class="filter-card">
                <form action="" method="GET" id="propertyFilterForm">
                    <div class="row g-4">

                        <!-- PROPERTY TYPE -->
                        <div class="col-lg-6">
                            <div class="filter-box">
                                <div class="filter-label">
                                    <i class="bi bi-house-door-fill"></i>
                                    Property Type
                                </div>
                                <div class="option-list">
                                    <div class="option-item">
                                        <input type="radio" name="property_type" id="type_all" value=""
                                            <?= empty($this->input->get('property_type')) ? 'checked' : ''; ?>>
                                        <label for="type_all">All</label>
                                    </div>
                                    <?php
                                    $default_types = ['Apartment', 'Plot', 'Land', 'Office', 'Shop', 'Commercial'];
                                    foreach ($default_types as $type):
                                        $slug = strtolower($type);
                                        $checked = ($this->input->get('property_type') === $type) ? 'checked' : '';
                                        ?>
                                        <div class="option-item">
                                            <input type="radio" name="property_type" id="type_<?= $slug; ?>"
                                                value="<?= $type; ?>" <?= $checked; ?>>
                                            <label for="type_<?= $slug; ?>"><?= $type; ?></label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <!-- LOCATION -->
                        <div class="col-lg-6">
                            <div class="filter-box">
                                <div class="filter-label">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    Location
                                </div>
                                <div class="option-list">
                                    <div class="option-item">
                                        <input type="radio" name="location" id="loc_all" value=""
                                            <?= empty($this->input->get('location')) ? 'checked' : ''; ?>>
                                        <label for="loc_all">All</label>
                                    </div>
                                    <?php
                                    $default_locations = ['Dhaka', 'Chattogram', 'Chandpur', 'Cumilla'];
                                    foreach ($default_locations as $loc):
                                        $slug = strtolower($loc);
                                        $checked = ($this->input->get('location') === $loc) ? 'checked' : '';
                                        ?>
                                        <div class="option-item">
                                            <input type="radio" name="location" id="loc_<?= $slug; ?>" value="<?= $loc; ?>"
                                                <?= $checked; ?>>
                                            <label for="loc_<?= $slug; ?>"><?= $loc; ?></label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <!-- PROJECT STATUS -->
                        <div class="col-lg-6">
                            <div class="filter-box">
                                <div class="filter-label">
                                    <i class="bi bi-activity"></i>
                                    Property Status
                                </div>
                                <div class="option-list">
                                    <div class="option-item">
                                        <input type="radio" name="status" id="status_all" value=""
                                            <?= empty($this->input->get('status')) ? 'checked' : ''; ?>>
                                        <label for="status_all">All</label>
                                    </div>
                                    <?php
                                    // Matched values to ENUM('Upcoming', 'Ongoing', 'Completed')
                                    $default_statuses = ['Upcoming', 'Ongoing', 'Completed'];
                                    foreach ($default_statuses as $st):
                                        $slug = strtolower($st);
                                        $checked = ($this->input->get('status') === $st) ? 'checked' : '';
                                        ?>
                                        <div class="option-item">
                                            <input type="radio" name="status" id="st_<?= $slug; ?>" value="<?= $st; ?>"
                                                <?= $checked; ?>>
                                            <label for="st_<?= $slug; ?>"><?= $st; ?></label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <!-- PRICE RANGE -->
                        <div class="col-lg-6">
                            <div class="filter-box">
                                <div class="filter-label">
                                    <i class="bi bi-cash-stack"></i>
                                    Price Range
                                </div>
                                <div class="price-wrapper">
                                    <div class="price-field">
                                        <span class="currency">৳</span>
                                        <input type="number" name="min_price" class="price-input" placeholder="Minimum"
                                            value="<?= html_escape($this->input->get('min_price')); ?>">
                                    </div>
                                    <span class="price-to">to</span>
                                    <div class="price-field">
                                        <span class="currency">৳</span>
                                        <input type="number" name="max_price" class="price-input" placeholder="Maximum"
                                            value="<?= html_escape($this->input->get('max_price')); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- QUICK SEARCH -->
                        <div class="col-lg-6">
                            <div class="filter-box">
                                <div class="filter-label">
                                    <i class="bi bi-search"></i>
                                    Quick Search
                                </div>
                                <input type="text" name="keyword" class="size-input"
                                    placeholder="Search by property name..."
                                    value="<?= html_escape($this->input->get('keyword')); ?>">
                            </div>
                        </div>

                    </div>

                    <!-- ACTION BUTTONS -->
                    <div class="filter-action">
                        <button type="button" class="reset-btn" onclick="resetFilter()">
                            <i class="bi bi-arrow-counterclockwise me-1"></i>
                            Reset all filters
                        </button>

                        <button type="submit" class="search-property-btn">
                            <i class="bi bi-search me-2"></i>
                            Search Properties
                        </button>
                    </div>
                </form>

                <!-- RESULTS SECTION -->
                <?php if (!empty($projects)): ?>
                    <div class="mt-5">
                        <h4 class="mb-4 fw-bold">Search Results (<?= count($projects); ?>)</h4>
                        <div class="row g-4">
                            <?php foreach ($projects as $item): ?>
                                <?php
                                // Decode image gallery safely or fallback to single image/default placeholder
                                $property_image = base_url('assets/images/default-property.jpg');
                                if (!empty($item['gallery'])) {
                                    $gallery = json_decode($item['gallery'], true);
                                    if (is_array($gallery) && !empty($gallery[0])) {
                                        $property_image = base_url('assets/uploads/properties/images/' . $gallery[0]);
                                    }
                                } elseif (!empty($item['image'])) {
                                    $property_image = base_url('assets/uploads/properties/images/' . $item['image']);
                                }

                                $status = !empty($item['project_status']) ? $item['project_status'] : 'Upcoming';
                                $type = !empty($item['property_type']) ? $item['property_type'] : 'Property';
                                ?>

                                <div class="col-md-6 col-lg-4">
                                    <div class="card h-100 shadow-sm search-property-card border-0">

                                        <!-- Property Image Header -->
                                        <div class="card-img-wrapper">
                                            <img src="<?= html_escape($property_image); ?>"
                                                alt="<?= html_escape($item['property_name']); ?>" loading="lazy">

                                            <span class="card-badge-status text-uppercase">
                                                <?= html_escape($status); ?>
                                            </span>

                                            <span class="card-badge-type text-uppercase">
                                                <?= html_escape($type); ?>
                                            </span>
                                        </div>

                                        <!-- Card Body -->
                                        <div class="card-body p-3 d-flex flex-column">
                                            <h5 class="card-title text-navy fw-bold mb-2 card-title-truncated">
                                                <?= html_escape($item['property_name']); ?>
                                            </h5>

                                            <?php if (!empty($item['location'])): ?>
                                                <p class="card-text text-muted small mb-3 text-truncate">
                                                    <i class="bi bi-geo-alt-fill text-danger me-1"></i>
                                                    <?= html_escape($item['location']); ?>
                                                </p>
                                            <?php endif; ?>

                                            <!-- Price and Link Footer -->
                                            <div
                                                class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                                                <div>
                                                    <span class="text-muted small d-block">Price</span>
                                                    <strong class="price-tag fw-bold">
                                                        ৳<?= !empty($item['price']) ? number_format($item['price'], 2) : 'N/A'; ?>
                                                    </strong>
                                                </div>

                                                <a href="<?= base_url('properties_details_view/' . $item['id']); ?>"
                                                    class="btn btn-outline-primary btn-sm px-3 fw-bold rounded-pill">
                                                    Details
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php elseif ($this->input->get()): ?>
                    <div class="alert alert-warning mt-5 text-center shadow-sm">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> No properties found matching your search
                        criteria.
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function resetFilter() {
            window.location.href = window.location.pathname;
        }
    </script>
</body>

</html>


<style>
    /* Card Container */
    .search-property-card {
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        overflow: hidden;
        background: #ffffff;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .search-property-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 25px -5px rgba(0, 0, 0, 0.08) !important;
        border-color: #cbd5e1;
    }

    /* Image Header Wrapper */
    .card-img-wrapper {
        position: relative;
        width: 100%;
        aspect-ratio: 16 / 10;
        overflow: hidden;
        background-color: #f8fafc;
    }

    .card-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .search-property-card:hover .card-img-wrapper img {
        transform: scale(1.05);
    }

    /* Glassmorphism Badge Overlays */
    .card-badge-status,
    .card-badge-type {
        position: absolute;
        top: 12px;
        padding: 4px 10px;
        font-size: 0.725rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        border-radius: 20px;
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
        z-index: 2;
    }

    .card-badge-status {
        left: 12px;
        background: rgba(15, 23, 42, 0.75);
        color: #ffffff;
    }

    .card-badge-type {
        right: 12px;
        background: rgba(255, 255, 255, 0.85);
        color: #0f172a;
    }

    /* Text Formatting */
    .card-title-truncated {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .price-tag {
        color: #0d6efd;
        font-size: 1.1rem;
    }
</style>