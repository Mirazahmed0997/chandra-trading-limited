<section class="smart-property-section">

    <!-- Background decoration -->
    <div class="property-bg-shape property-bg-shape-1"></div>
    <div class="property-bg-shape property-bg-shape-2"></div>

    <div class="container position-relative">

        <!-- Section Heading -->
        <div class="text-center property-heading">

            <span class="property-subtitle">
                <?= lang('smart_property_search'); ?>
            </span>

            <h2>
                <?= lang('find_your'); ?>
                <span><?= lang('perfect_property'); ?></span>
            </h2>

            <p>
                <?= lang('property_search_description'); ?>
            </p>

        </div>


        <!-- Search Box -->
        <div class="property-search-card">

            <form action="<?= base_url('properties/search'); ?>" method="GET">

                <div class="row g-3 align-items-end">

                    <!-- Property Type -->
                    <div class="col-lg-3 col-md-6">

                        <label class="property-label">
                            <?= lang('property_type'); ?>
                        </label>

                        <div class="property-input">

                            <i class="fa-solid fa-building"></i>

                            <select name="property_type" class="form-select">

                                <option value="">
                                    <?= lang('select_property_type'); ?>
                                </option>

                                <option value="apartment">
                                    <?= lang('apartment'); ?>
                                </option>

                                <option value="plot">
                                    <?= lang('plot'); ?>
                                </option>

                                <option value="land">
                                    <?= lang('land'); ?>
                                </option>

                                <option value="commercial">
                                    <?= lang('commercial'); ?>
                                </option>

                            </select>

                        </div>

                    </div>


                    <!-- Location -->
                    <div class="col-lg-3 col-md-6">

                        <label class="property-label">
                            <?= lang('location'); ?>
                        </label>

                        <div class="property-input">

                            <i class="fa-solid fa-location-dot"></i>

                            <select name="location" class="form-select">

                                <option value="">
                                    <?= lang('select_location'); ?>
                                </option>

                                <option value="dhaka">
                                    <?= lang('dhaka'); ?>
                                </option>

                                <option value="uttara">
                                    <?= lang('uttara'); ?>
                                </option>

                                <option value="purbachal">
                                    <?= lang('purbachal'); ?>
                                </option>

                                <option value="bashundhara">
                                    <?= lang('bashundhara'); ?>
                                </option>

                                <option value="keraniganj">
                                    <?= lang('keraniganj'); ?>
                                </option>

                            </select>

                        </div>

                    </div>


                    <!-- Budget -->
                    <div class="col-lg-3 col-md-6">

                        <label class="property-label">
                            <?= lang('budget'); ?>
                        </label>

                        <div class="property-input">

                            <i class="fa-solid fa-money-bill-wave"></i>

                            <select name="budget" class="form-select">

                                <option value="">
                                    <?= lang('select_budget'); ?>
                                </option>

                                <option value="10-30">
                                    <?= lang('budget_10_30'); ?>
                                </option>

                                <option value="30-50">
                                    <?= lang('budget_30_50'); ?>
                                </option>

                                <option value="50-100">
                                    <?= lang('budget_50_100'); ?>
                                </option>

                                <option value="100+">
                                    <?= lang('budget_100_plus'); ?>
                                </option>

                            </select>

                        </div>

                    </div>


                    <!-- Search Button -->
                    <div class="col-lg-3 col-md-6">

                        <button type="submit" class="property-search-btn">

                            <i class="fa-solid fa-magnifying-glass"></i>

                            <?= lang('search_property'); ?>

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</section>


  <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <!-- Search Box Card -->
                <div class="col-lg-3">
                    <div class="card border-0 text-white p-3 h-100" style="background-color: #0d5c3a;">
                        <span class="text-uppercase small fw-semibold text-warning">Available Plots</span>
                        <h3 class="fw-bold mb-4">Find Your Perfect Plot</h3>
                        
                        <div class="text-center my-auto py-3">
                            <i class="bi bi-geo-alt-fill display-3 text-warning"></i>
                            <h5 class="mt-3 fw-bold">Looking for a plot?</h5>
                            <p class="small text-light">We have wide range of plots in prime locations.</p>
                        </div>
                        
                    </div>
                </div>

                <!-- Plot Table -->
                <div class="col-lg-9">
                    <div class="table-responsive bg-white rounded shadow-sm p-3">
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
                                <tr>
                                    <td class="fw-semibold">Green Valley</td>
                                    <td>Gazipur, Dhaka</td>
                                    <td>3 Katha</td>
                                    <td>1,350,000</td>
                                    <td><span class="badge badge-available px-3 py-2">Available</span></td>
                                    <td><a href="#" class="btn btn-green btn-sm px-3">Book Now</a></td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">City View</td>
                                    <td>Savar, Dhaka</td>
                                    <td>5 Katha</td>
                                    <td>2,250,000</td>
                                    <td><span class="badge badge-available px-3 py-2">Available</span></td>
                                    <td><a href="#" class="btn btn-green btn-sm px-3">Book Now</a></td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Lake City</td>
                                    <td>Narsingdi</td>
                                    <td>4 Katha</td>
                                    <td>1,800,000</td>
                                    <td><span class="badge badge-available px-3 py-2">Available</span></td>
                                    <td><a href="#" class="btn btn-green btn-sm px-3">Book Now</a></td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Sunshine Avenue</td>
                                    <td>Keraniganj, Dhaka</td>
                                    <td>3 Katha</td>
                                    <td>1,250,000</td>
                                    <td><span class="badge badge-booked px-3 py-2">Booked</span></td>
                                    <td><a href="#" class="btn btn-outline-secondary btn-sm px-3">View</a></td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Meadow Land</td>
                                    <td>Munshiganj</td>
                                    <td>6 Katha</td>
                                    <td>2,650,000</td>
                                    <td><span class="badge badge-available px-3 py-2">Available</span></td>
                                    <td><a href="#" class="btn btn-green btn-sm px-3">Book Now</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>



<style>
 

.smart-property-section {
    position: relative;
    overflow: hidden;

    padding: 90px 0;

    background:
        linear-gradient(
            135deg,
            #f4fbf8 0%,
            #ffffff 50%,
            #eef7ff 100%
        );
}


/* Background Shapes */

.property-bg-shape {
    position: absolute;

    border-radius: 50%;

    filter: blur(2px);

    opacity: 0.45;

    pointer-events: none;
}

.property-bg-shape-1 {
    width: 300px;
    height: 300px;

    background: #d8f2e6;

    top: -120px;
    left: -100px;
}

.property-bg-shape-2 {
    width: 350px;
    height: 350px;

    background: #dcecff;

    right: -150px;
    bottom: -160px;
}


/* ============================================
   HEADING
============================================= */

.property-heading {
    margin-bottom: 40px;
}

.property-subtitle {
    display: inline-block;

    font-size: 13px;
    font-weight: 700;

    letter-spacing: 2px;

    color: #159447;

    margin-bottom: 12px;
}

.property-heading h2 {
    margin: 0;

    font-size: 42px;

    font-weight: 800;

    line-height: 1.2;

    color: #152d24;
}

.property-heading h2 span {
    color: #159447;
}

.property-heading p {
    margin-top: 15px;

    margin-bottom: 0;

    color: #6b7772;

    font-size: 16px;
}


/* ============================================
   SEARCH CARD
============================================= */

.property-search-card {
    position: relative;

    background: #ffffff;

    padding: 30px;

    border-radius: 18px;

    box-shadow:
        0 15px 50px rgba(26, 75, 50, 0.10);

    border: 1px solid rgba(21, 148, 71, 0.08);
}


/* ============================================
   LABEL
============================================= */

.property-label {
    display: block;

    font-size: 14px;

    font-weight: 700;

    color: #263a31;

    margin-bottom: 9px;
}


/* ============================================
   INPUT
============================================= */

.property-input {
    position: relative;
}

.property-input > i {
    position: absolute;

    left: 16px;
    top: 50%;

    transform: translateY(-50%);

    z-index: 5;

    color: #159447;

    font-size: 15px;

    pointer-events: none;
}

.property-input .form-select {
    height: 55px;

    border-radius: 10px;

    border: 1px solid #dfe8e3;

    padding-left: 45px;

    padding-right: 35px;

    font-size: 14px;

    color: #53625b;

    background-color: #fbfdfc;

    box-shadow: none;
}

.property-input .form-select:focus {
    border-color: #159447;

    box-shadow:
        0 0 0 3px rgba(21, 148, 71, 0.10);
}


/* ============================================
   SEARCH BUTTON
============================================= */

.property-search-btn {
    width: 100%;

    height: 55px;

    border: 0;

    border-radius: 10px;

    background: linear-gradient(
        135deg,
        #159447,
        #08783a
    );

    color: #ffffff;

    font-size: 13px;

    font-weight: 800;

    letter-spacing: 0.5px;

    transition: all 0.3s ease;

    box-shadow:
        0 8px 20px rgba(21, 148, 71, 0.20);
}

.property-search-btn i {
    margin-right: 8px;
}

.property-search-btn:hover {
    transform: translateY(-2px);

    box-shadow:
        0 12px 25px rgba(21, 148, 71, 0.30);

    background: linear-gradient(
        135deg,
        #08783a,
        #159447
    );
}


/* ============================================
   ADVANCED SEARCH
============================================= */

.advanced-search {
    text-align: right;

    margin-top: 18px;
}

.advanced-search a {
    display: inline-flex;

    align-items: center;

    gap: 8px;

    text-decoration: none;

    color: #159447;

    font-size: 14px;

    font-weight: 700;

    transition: 0.3s ease;
}

.advanced-search a:hover {
    color: #086d35;
}

.advanced-search a i:last-child {
    font-size: 11px;
}


.property-categories {
    display: flex;

    justify-content: center;

    align-items: center;

    gap: 15px;

    margin-top: 35px;

    flex-wrap: wrap;
}

.property-category {
    display: flex;

    align-items: center;

    gap: 9px;

    padding: 13px 25px;

    border-radius: 50px;

    text-decoration: none;

    background: #ffffff;

    color: #53625b;

    border: 1px solid #e4ebe7;

    font-size: 14px;

    font-weight: 700;

    transition: all 0.3s ease;
}

.property-category i {
    color: #159447;

    font-size: 15px;
}

.property-category:hover,
.property-category.active {
    color: #ffffff;

    background: #159447;

    border-color: #159447;

    transform: translateY(-2px);

    box-shadow:
        0 8px 20px rgba(21, 148, 71, 0.20);
}

.property-category:hover i,
.property-category.active i {
    color: #ffffff;
}


.property-search-message {
    margin-top: 25px;

    font-size: 13px;

    color: #78857f;
}

.property-search-message i {
    color: #159447;

    margin-right: 5px;
}


@media (max-width: 991px) {

    .smart-property-section {
        padding: 70px 0;
    }

    .property-heading h2 {
        font-size: 36px;
    }

    .property-search-card {
        padding: 25px;
    }

}


@media (max-width: 767px) {

    .smart-property-section {
        padding: 55px 0;
    }

    .property-heading {
        margin-bottom: 30px;
    }

    .property-heading h2 {
        font-size: 30px;
    }

    .property-heading p {
        font-size: 14px;
    }

    .property-search-card {
        padding: 20px;

        border-radius: 14px;
    }

    .advanced-search {
        text-align: center;
    }

    .property-categories {
        gap: 10px;

        margin-top: 25px;
    }

    .property-category {
        padding: 11px 18px;

        font-size: 13px;
    }

}



@media (max-width: 480px) {

    .property-heading h2 {
        font-size: 26px;
    }

    .property-category {
        flex: 1;

        justify-content: center;

        min-width: 130px;
    }

}
</style>