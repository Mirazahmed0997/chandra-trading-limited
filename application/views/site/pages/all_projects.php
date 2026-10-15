
<?php
$selected_type     = $this->input->get('property_type', TRUE);
$selected_location = $this->input->get('location', TRUE);
$selected_status   = $this->input->get('status', TRUE);
$min_price         = $this->input->get('min_price', TRUE);
$max_price         = $this->input->get('max_price', TRUE);
$min_size          = $this->input->get('min_size', TRUE);
$keyword           = $this->input->get('keyword', TRUE);

// 2. Build Query using Active Record
$this->db->select('*');
$this->db->from('properties');
$this->db->where('status', 'Published');

if (!empty($selected_type)) {
    $this->db->where('property_type', $selected_type);
}

if (!empty($selected_location)) {
    $this->db->where('location', $selected_location);
}

if (!empty($selected_status)) {
    $this->db->where('project_status', $selected_status);
}

if ($min_price !== null && $min_price !== '') {
    $this->db->where('price >=', (float) $min_price);
}

if ($max_price !== null && $max_price !== '') {
    $this->db->where('price <=', (float) $max_price);
}

if ($min_size !== null && $min_size !== '') {
    $this->db->where("CAST(size AS UNSIGNED) >=", (int) $min_size);
}

if (!empty($keyword)) {
    $this->db->like('property_name', trim($keyword));
}

$this->db->order_by('created_at', 'DESC');
$this->db->limit(10);
$projects = $this->db->get()->result_array();
?>

<section class="property-filter-section">
    <div class="decor-circle"></div>
    <div class="decor-circle-2"></div>

    <div class="container position-relative">
        
        <!-- Header -->
        <div class="filter-header">
            <span class="filter-subtitle">
                <i class="bi bi-buildings"></i>
                <?= lang('smart_property_search'); ?>
            </span>
            <h2><?= lang('find_your'); ?> <span><?= lang('perfect_property'); ?></span></h2>
            <p><?= lang('property_search_description'); ?></p>
        </div>

        <!-- Filter Card Form -->
        <div class="filter-card">
            <form action="<?= current_url(); ?>" method="GET" id="propertyFilterForm">
                <div class="row g-4">

                    <!-- PROPERTY TYPE -->
                    <div class="col-lg-6">
                        <div class="filter-box">
                            <div class="filter-label">
                                <i class="bi bi-house-door-fill"></i>
                                <?= lang('property_type'); ?>
                            </div>
                            <div class="option-list">
                                <div class="option-item">
                                    <input type="radio" name="property_type" id="type_all" value="" <?= empty($selected_type) ? 'checked' : ''; ?>>
                                    <label for="type_all">All</label>
                                </div>
                                <div class="option-item">
                                    <input type="radio" name="property_type" id="type_apartment" value="apartment" <?= ($selected_type === 'apartment') ? 'checked' : ''; ?>>
                                    <label for="type_apartment"><?= lang('apartment'); ?></label>
                                </div>
                                <div class="option-item">
                                    <input type="radio" name="property_type" id="type_plot" value="plot" <?= ($selected_type === 'plot') ? 'checked' : ''; ?>>
                                    <label for="type_plot"><?= lang('plot'); ?></label>
                                </div>
                                <div class="option-item">
                                    <input type="radio" name="property_type" id="type_land" value="land" <?= ($selected_type === 'land') ? 'checked' : ''; ?>>
                                    <label for="type_land"><?= lang('land'); ?></label>
                                </div>
                                <div class="option-item">
                                    <input type="radio" name="property_type" id="type_commercial" value="commercial" <?= ($selected_type === 'commercial') ? 'checked' : ''; ?>>
                                    <label for="type_commercial"><?= lang('commercial'); ?></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- LOCATION -->
                    <div class="col-lg-6">
                        <div class="filter-box">
                            <div class="filter-label">
                                <i class="bi bi-geo-alt-fill"></i>
                                <?= lang('location'); ?>
                            </div>
                            <div class="option-list">
                                <div class="option-item">
                                    <input type="radio" name="location" id="loc_all" value="" <?= empty($selected_location) ? 'checked' : ''; ?>>
                                    <label for="loc_all">All</label>
                                </div>
                                <div class="option-item">
                                    <input type="radio" name="location" id="loc_dhaka" value="dhaka" <?= ($selected_location === 'dhaka') ? 'checked' : ''; ?>>
                                    <label for="loc_dhaka"><?= lang('dhaka'); ?></label>
                                </div>
                                <div class="option-item">
                                    <input type="radio" name="location" id="loc_uttara" value="uttara" <?= ($selected_location === 'uttara') ? 'checked' : ''; ?>>
                                    <label for="loc_uttara"><?= lang('uttara'); ?></label>
                                </div>
                                <div class="option-item">
                                    <input type="radio" name="location" id="loc_purbachal" value="purbachal" <?= ($selected_location === 'purbachal') ? 'checked' : ''; ?>>
                                    <label for="loc_purbachal"><?= lang('purbachal'); ?></label>
                                </div>
                                <div class="option-item">
                                    <input type="radio" name="location" id="loc_bashundhara" value="bashundhara" <?= ($selected_location === 'bashundhara') ? 'checked' : ''; ?>>
                                    <label for="loc_bashundhara"><?= lang('bashundhara'); ?></label>
                                </div>
                                <div class="option-item">
                                    <input type="radio" name="location" id="loc_keraniganj" value="keraniganj" <?= ($selected_location === 'keraniganj') ? 'checked' : ''; ?>>
                                    <label for="loc_keraniganj"><?= lang('keraniganj'); ?></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PRICE RANGE -->
                    <div class="col-lg-4 col-md-6">
                        <div class="filter-box">
                            <div class="filter-label">
                                <i class="bi bi-cash-stack"></i>
                                Price Range (BDT)
                            </div>
                            <div class="price-wrapper">
                                <div class="price-field">
                                    <span class="currency">৳</span>
                                    <input type="number" name="min_price" class="price-input" placeholder="Min" value="<?= html_escape($min_price); ?>">
                                </div>
                                <span class="price-to">to</span>
                                <div class="price-field">
                                    <span class="currency">৳</span>
                                    <input type="number" name="max_price" class="price-input" placeholder="Max" value="<?= html_escape($max_price); ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- MIN SIZE -->
                    <div class="col-lg-4 col-md-6">
                        <div class="filter-box">
                            <div class="filter-label">
                                <i class="bi bi-aspect-ratio"></i>
                                Min Plot Size
                            </div>
                            <div class="size-field">
                                <input type="number" name="min_size" class="size-input" placeholder="e.g. 1500" value="<?= html_escape($min_size); ?>">
                                <span class="size-unit">Sq Ft / Katha</span>
                            </div>
                        </div>
                    </div>

                    <!-- KEYWORD / PROJECT NAME -->
                    <div class="col-lg-4 col-md-12">
                        <div class="filter-box">
                            <div class="filter-label">
                                <i class="bi bi-search"></i>
                                Project Name
                            </div>
                            <input type="text" name="keyword" class="size-input pe-3" placeholder="Search property..." value="<?= html_escape($keyword); ?>">
                        </div>
                    </div>

                </div>

                <!-- Action Buttons -->
                <div class="filter-action">
                    <a href="<?= current_url(); ?>" class="reset-btn text-decoration-none">
                        <i class="bi bi-arrow-counterclockwise"></i> Reset Filters
                    </a>
                    <button type="submit" class="search-property-btn">
                        <i class="bi bi-search me-1"></i> <?= lang('search_property'); ?>
                    </button>
                </div>
            </form>
        </div>

        <!-- Filtered Dynamic Results -->
        <div class="mt-5">
            <div class="bg-white rounded-4 shadow-sm p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="fw-bold mb-1">Available Properties</h4>
                        <p class="text-muted small mb-0">Explore properties based on your chosen filter parameters</p>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Project Name</th>
                                <th>Location</th>
                                <th>Plot Size</th>
                                <th>Price (BDT)</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($projects)): ?>
                                <?php foreach ($projects as $project): ?>
                                    <tr>
                                        <td class="fw-semibold">
                                            <?= html_escape($project['property_name']); ?>
                                        </td>
                                        <td>
                                            <?= html_escape($project['location']); ?>
                                        </td>
                                        <td>
                                            <?= html_escape($project['size']); ?>
                                        </td>
                                        <td class="fw-bold text-success">
                                            ৳<?= number_format((float) $project['price']); ?>
                                        </td>
                                        <td>
                                            <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill">
                                                <?= html_escape($project['project_status'] ?? 'Available'); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('properties_details_view/' . $project['id']); ?>" class="btn btn-sm text-white px-3 fw-bold" style="background: var(--navy);">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-5">
                                        <i class="bi bi-building-exclamation display-6 d-block mb-2"></i>
                                        No properties found matching your selection criteria.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="text-center mt-4">
                    <a href="<?= base_url('properties'); ?>" class="btn px-4 py-2 text-white fw-bold" style="background: linear-gradient(135deg, var(--gold-light), #a8813b); border-radius: 10px;">
                        See All Properties <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

<style>
:root {
    --navy: #0b1d3a;
    --navy-light: #152e5a;
    --gold: #c5a059;
    --gold-light: #d8b878;
    --gold-glow: rgba(197, 160, 89, 0.35);
    --light-bg: #f4f6f9;
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

.option-item input:checked + label {
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



