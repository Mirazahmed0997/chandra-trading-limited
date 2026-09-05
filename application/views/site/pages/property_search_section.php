<!-- ============================================
     SMART PROPERTY SEARCH
============================================= -->

<section class="smart-property-section">

    <!-- Background decoration -->
    <div class="property-bg-shape property-bg-shape-1"></div>
    <div class="property-bg-shape property-bg-shape-2"></div>

    <div class="container position-relative">

        <!-- Section Heading -->
        <div class="text-center property-heading">

            <span class="property-subtitle">
                SMART PROPERTY SEARCH
            </span>

            <h2>
                Find Your <span>Perfect Property</span>
            </h2>

            <p>
                Discover properties that match your lifestyle,
                investment goals and budget.
            </p>

        </div>


        <!-- Search Box -->
        <div class="property-search-card">

            <form action="<?= base_url('properties/search'); ?>" method="GET">

                <div class="row g-3 align-items-end">

                    <!-- Property Type -->
                    <div class="col-lg-3 col-md-6">

                        <label class="property-label">
                            Property Type
                        </label>

                        <div class="property-input">

                            <i class="fa-solid fa-building"></i>

                            <select name="property_type" class="form-select">
                                <option value="">Select Property Type</option>
                                <option value="apartment">Apartment</option>
                                <option value="plot">Plot</option>
                                <option value="land">Land</option>
                                <option value="commercial">Commercial</option>
                            </select>

                        </div>

                    </div>


                    <!-- Location -->
                    <div class="col-lg-3 col-md-6">

                        <label class="property-label">
                            Location
                        </label>

                        <div class="property-input">

                            <i class="fa-solid fa-location-dot"></i>

                            <select name="location" class="form-select">
                                <option value="">Select Location</option>
                                <option value="dhaka">Dhaka</option>
                                <option value="uttara">Uttara</option>
                                <option value="purbachal">Purbachal</option>
                                <option value="bashundhara">Bashundhara</option>
                                <option value="keraniganj">Keraniganj</option>
                            </select>

                        </div>

                    </div>


                    <!-- Budget -->
                    <div class="col-lg-3 col-md-6">

                        <label class="property-label">
                            Budget
                        </label>

                        <div class="property-input">

                            <i class="fa-solid fa-money-bill-wave"></i>

                            <select name="budget" class="form-select">
                                <option value="">Select Budget</option>
                                <option value="10-30">৳ 10 - 30 Lac</option>
                                <option value="30-50">৳ 30 - 50 Lac</option>
                                <option value="50-100">৳ 50 Lac - 1 Crore</option>
                                <option value="100+">৳ 1 Crore+</option>
                            </select>

                        </div>

                    </div>


                    <!-- Search Button -->
                    <div class="col-lg-3 col-md-6">

                        <button type="submit" class="property-search-btn">

                            <i class="fa-solid fa-magnifying-glass"></i>

                            SEARCH PROPERTY

                        </button>

                    </div>

                </div>

            </form>


            <!-- Advanced Search -->
            <div class="advanced-search">

                <a href="<?= base_url('properties/advanced-search'); ?>">

                    <i class="fa-solid fa-sliders"></i>

                    Advanced Search

                    <i class="fa-solid fa-arrow-right"></i>

                </a>

            </div>

        </div>


        <!-- Property Categories -->
        <div class="property-categories">

            <a href="<?= base_url('properties?purpose=buy'); ?>"
               class="property-category active">

                <i class="fa-solid fa-house"></i>

                <span>Buy</span>

            </a>


            <a href="<?= base_url('properties?purpose=invest'); ?>"
               class="property-category">

                <i class="fa-solid fa-chart-line"></i>

                <span>Invest</span>

            </a>


            <a href="<?= base_url('properties?purpose=commercial'); ?>"
               class="property-category">

                <i class="fa-solid fa-city"></i>

                <span>Commercial</span>

            </a>


            <a href="<?= base_url('properties?purpose=land'); ?>"
               class="property-category">

                <i class="fa-solid fa-map"></i>

                <span>Land</span>

            </a>

        </div>


        <!-- Bottom Message -->
        <div class="property-search-message text-center">

            <i class="fa-solid fa-circle-check"></i>

            Find the right property for your dream,
            lifestyle and investment.

        </div>

    </div>
    
  
    

</section>



<style>
      
    /* ============================================
   SMART PROPERTY SEARCH
============================================= */

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


/* ============================================
   CATEGORIES
============================================= */

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


/* ============================================
   BOTTOM MESSAGE
============================================= */

.property-search-message {
    margin-top: 25px;

    font-size: 13px;

    color: #78857f;
}

.property-search-message i {
    color: #159447;

    margin-right: 5px;
}


/* ============================================
   TABLET
============================================= */

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


/* ============================================
   MOBILE
============================================= */

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