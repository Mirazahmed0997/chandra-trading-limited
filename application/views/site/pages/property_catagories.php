
<section class="property-category-section">

    <div class="container">

        <!-- Section Heading -->
        <div class="property-category-heading text-center">

            <span class="category-subtitle">
                <?= lang('property_categories'); ?>
            </span>

            <h2>
                <?= lang('explore_our'); ?>
                <span><?= lang('property_categories_title'); ?></span>
            </h2>

            <p>
                <?= lang('property_categories_description'); ?>
            </p>

        </div>


        <!-- Category Cards -->
        <div class="row g-4">


            <div class="col-lg-3 col-md-6">

                <a href="<?= base_url('properties/residential'); ?>"
                   class="property-category-card">

                    <div class="category-icon">

                        <i class="fa-solid fa-house"></i>

                    </div>

                    <div class="category-content">

                        <span class="category-number">
                            01
                        </span>

                        <h3>
                            <?= lang('residential'); ?>
                        </h3>

                        <p>
                            <?= lang('residential_description'); ?>
                        </p>

                    </div>

                    <div class="category-arrow">

                        <i class="fa-solid fa-arrow-right"></i>

                    </div>

                </a>

            </div>


            <!-- ================================
                 LAND & PLOTS
            ================================= -->

            <div class="col-lg-3 col-md-6">

                <a href="<?= base_url('properties/land-plots'); ?>"
                   class="property-category-card">

                    <div class="category-icon">

                        <i class="fa-solid fa-map-location-dot"></i>

                    </div>

                    <div class="category-content">

                        <span class="category-number">
                            02
                        </span>

                        <h3>
                            <?= lang('land_plots'); ?>
                        </h3>

                        <p>
                            <?= lang('land_plots_description'); ?>
                        </p>

                    </div>

                    <div class="category-arrow">

                        <i class="fa-solid fa-arrow-right"></i>

                    </div>

                </a>

            </div>


            <!-- ================================
                 COMMERCIAL
            ================================= -->

            <div class="col-lg-3 col-md-6">

                <a href="<?= base_url('properties/commercial'); ?>"
                   class="property-category-card">

                    <div class="category-icon">

                        <i class="fa-solid fa-building"></i>

                    </div>

                    <div class="category-content">

                        <span class="category-number">
                            03
                        </span>

                        <h3>
                            <?= lang('commercial'); ?>
                        </h3>

                        <p>
                            <?= lang('commercial_description'); ?>
                        </p>

                    </div>

                    <div class="category-arrow">

                        <i class="fa-solid fa-arrow-right"></i>

                    </div>

                </a>

            </div>


            <!-- ================================
                 INVESTMENT
            ================================= -->

            <div class="col-lg-3 col-md-6">

                <a href="<?= base_url('properties/investment'); ?>"
                   class="property-category-card">

                    <div class="category-icon">

                        <i class="fa-solid fa-chart-line"></i>

                    </div>

                    <div class="category-content">

                        <span class="category-number">
                            04
                        </span>

                        <h3>
                            <?= lang('investment'); ?>
                        </h3>

                        <p>
                            <?= lang('investment_description'); ?>
                        </p>

                    </div>

                    <div class="category-arrow">

                        <i class="fa-solid fa-arrow-right"></i>

                    </div>

                </a>

            </div>

        </div>

    </div>

</section>


<style>
       

.property-category-section {
    position: relative;

    padding: 90px 0;

    background: #ffffff;

    overflow: hidden;
}



.property-category-heading {
    margin-bottom: 45px;
}

.category-subtitle {
    display: inline-block;

    margin-bottom: 12px;

    font-size: 13px;

    font-weight: 800;

    letter-spacing: 2px;

    color: #159447;
}

.property-category-heading h2 {
    margin: 0;

    color: #172d24;

    font-size: 40px;

    font-weight: 800;

    line-height: 1.2;
}

.property-category-heading h2 span {
    color: #159447;
}

.property-category-heading p {
    max-width: 650px;

    margin: 15px auto 0;

    color: #748079;

    font-size: 16px;

    line-height: 1.7;
}

.property-category-card {
    position: relative;

    display: flex;

    flex-direction: column;

    min-height: 310px;

    padding: 30px;

    overflow: hidden;

    text-decoration: none;

    background: #ffffff;

    border: 1px solid #e4ebe7;

    border-radius: 18px;

    box-shadow:
        0 10px 35px rgba(20, 70, 45, 0.07);

    transition:
        transform 0.35s ease,
        box-shadow 0.35s ease,
        border-color 0.35s ease;
}



.property-category-card:hover {
    transform: translateY(-8px);

    border-color: #159447;

    box-shadow:
        0 20px 45px rgba(20, 100, 60, 0.15);
}



.category-icon {
    width: 65px;
    height: 65px;

    display: flex;

    align-items: center;
    justify-content: center;

    margin-bottom: 28px;

    border-radius: 15px;

    background: #eaf8f0;

    color: #159447;

    font-size: 25px;

    transition: all 0.35s ease;
}

.property-category-card:hover .category-icon {
    background: #159447;

    color: #ffffff;

    transform: scale(1.05);
}



.category-content {
    position: relative;

    z-index: 2;
}

.category-number {
    display: block;

    margin-bottom: 7px;

    font-size: 12px;

    font-weight: 800;

    letter-spacing: 1px;

    color: #9ca9a2;
}

.category-content h3 {
    margin: 0 0 12px;

    color: #172d24;

    font-size: 19px;

    font-weight: 800;

    letter-spacing: 0.3px;

    transition: color 0.3s ease;
}

.property-category-card:hover .category-content h3 {
    color: #159447;
}

.category-content p {
    max-width: 220px;

    margin: 0;

    color: #6f7d75;

    font-size: 14px;

    line-height: 1.7;
}


.category-arrow {
    position: absolute;

    right: 25px;
    bottom: 25px;

    width: 42px;
    height: 42px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #f1f7f4;

    color: #159447;

    font-size: 14px;

    transition: all 0.35s ease;
}

.property-category-card:hover .category-arrow {
    background: #159447;

    color: #ffffff;

    transform: translateX(4px);
}



.property-category-card::after {
    content: "";

    position: absolute;

    width: 150px;
    height: 150px;

    right: -80px;
    top: -80px;

    border-radius: 50%;

    background: #f3faf6;

    transition: all 0.4s ease;
}

.property-category-card:hover::after {
    width: 190px;
    height: 190px;

    background: #e4f5eb;
}

@media (max-width: 991px) {

    .property-category-section {
        padding: 70px 0;
    }

    .property-category-heading h2 {
        font-size: 34px;
    }

    .property-category-card {
        min-height: 290px;
    }

}


@media (max-width: 767px) {

    .property-category-section {
        padding: 55px 0;
    }

    .property-category-heading {
        margin-bottom: 30px;
    }

    .property-category-heading h2 {
        font-size: 29px;
    }

    .property-category-heading p {
        font-size: 14px;
    }

    .property-category-card {
        min-height: 270px;

        padding: 25px;
    }

}  
</style>