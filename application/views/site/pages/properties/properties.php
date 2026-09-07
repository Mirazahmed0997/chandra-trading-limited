<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Property Filter | Premium Real Estate</title>

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet">

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


        /* ========================================
           SECTION
        ======================================== */

        .property-filter-section {
            position: relative;
            padding: 90px 0;
            overflow: hidden;
            background:
                radial-gradient(
                    circle at 90% 20%,
                    rgba(197, 160, 89, 0.12),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 10% 80%,
                    rgba(11, 29, 58, 0.08),
                    transparent 30%
                ),
                #f4f6f9;
        }


        /* ========================================
           DECORATIVE 3D SHAPES
        ======================================== */

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


        /* ========================================
           HEADING
        ======================================== */

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


        /* ========================================
           MAIN FILTER CARD
        ======================================== */

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


        /* ========================================
           FILTER COLUMN
        ======================================== */

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

            box-shadow:
                0 12px 30px rgba(11, 29, 58, 0.08);
        }


        /* ========================================
           LABEL
        ======================================== */

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


        /* ========================================
           OPTION BUTTON
        ======================================== */

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

            box-shadow:
                0 7px 18px rgba(11, 29, 58, 0.18);
        }


        /* ========================================
           PRICE INPUT
        ======================================== */

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

            box-shadow:
                0 0 0 3px rgba(197, 160, 89, 0.12);
        }

        .price-to {
            font-size: 13px;
            color: #858c96;
        }


        /* ========================================
           SIZE INPUT
        ======================================== */

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

            box-shadow:
                0 0 0 3px rgba(197, 160, 89, 0.12);
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


        /* ========================================
           BOTTOM ACTION AREA
        ======================================== */

        .filter-action {
            margin-top: 28px;

            padding-top: 25px;

            border-top: 1px solid rgba(11, 29, 58, 0.08);

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;
        }


        /* ========================================
           SEARCH BUTTON
        ======================================== */

        .search-property-btn {
            position: relative;

            border: none;

            padding: 14px 30px;

            border-radius: 12px;

            background:
                linear-gradient(
                    135deg,
                    var(--gold-light),
                    #a8813b
                );

            color: #fff;

            font-size: 14px;
            font-weight: 800;

            letter-spacing: .5px;

            box-shadow:
                0 10px 25px rgba(197, 160, 89, 0.35),
                0 4px 0 #7a5c25;

            transition: all 0.2s ease;
        }

        .search-property-btn:hover {
            transform: translateY(-2px);

            box-shadow:
                0 15px 30px rgba(197, 160, 89, 0.4),
                0 4px 0 #7a5c25;
        }

        .search-property-btn:active {
            transform: translateY(3px);

            box-shadow:
                0 5px 10px rgba(197, 160, 89, 0.3),
                0 1px 0 #7a5c25;
        }


        /* ========================================
           RESET BUTTON
        ======================================== */

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


        /* ========================================
           RESPONSIVE
        ======================================== */

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


<!-- =====================================================
     PROPERTY FILTER SECTION
===================================================== -->

<section class="property-filter-section">

    <!-- Decorative Elements -->
    <div class="decor-circle"></div>
    <div class="decor-circle-2"></div>


    <div class="container position-relative">


        <!-- =================================================
             HEADER
        ================================================== -->

        <div class="filter-header">

            <span class="filter-subtitle">

                <i class="bi bi-buildings"></i>

                Find Your Property

            </span>


            <h2>
                Property <span>Filter</span>
            </h2>


            <p>
                Explore our carefully selected properties and
                find a place that perfectly matches your needs.
            </p>

        </div>



        <!-- =================================================
             FILTER CARD
        ================================================== -->

        <div class="filter-card">


            <div class="row g-4">


                <!-- =========================================
                     PROPERTY TYPE
                ========================================== -->

                <div class="col-lg-6">

                    <div class="filter-box">

                        <div class="filter-label">

                            <i class="bi bi-house-door-fill"></i>

                            Property Type

                        </div>


                        <div class="option-list">


                            <div class="option-item">

                                <input
                                    type="radio"
                                    name="property_type"
                                    id="apartment"
                                    checked
                                >

                                <label for="apartment">
                                    Apartment
                                </label>

                            </div>


                            <div class="option-item">

                                <input
                                    type="radio"
                                    name="property_type"
                                    id="plot"
                                >

                                <label for="plot">
                                    Plot
                                </label>

                            </div>


                            <div class="option-item">

                                <input
                                    type="radio"
                                    name="property_type"
                                    id="land"
                                >

                                <label for="land">
                                    Land
                                </label>

                            </div>


                            <div class="option-item">

                                <input
                                    type="radio"
                                    name="property_type"
                                    id="office"
                                >

                                <label for="office">
                                    Office
                                </label>

                            </div>


                            <div class="option-item">

                                <input
                                    type="radio"
                                    name="property_type"
                                    id="shop"
                                >

                                <label for="shop">
                                    Shop
                                </label>

                            </div>


                        </div>

                    </div>

                </div>



                <!-- =========================================
                     LOCATION
                ========================================== -->

                <div class="col-lg-6">

                    <div class="filter-box">

                        <div class="filter-label">

                            <i class="bi bi-geo-alt-fill"></i>

                            Location

                        </div>


                        <div class="option-list">


                            <div class="option-item">

                                <input
                                    type="radio"
                                    name="location"
                                    id="dhaka"
                                    checked
                                >

                                <label for="dhaka">
                                    Dhaka
                                </label>

                            </div>


                            <div class="option-item">

                                <input
                                    type="radio"
                                    name="location"
                                    id="chattogram"
                                >

                                <label for="chattogram">
                                    Chattogram
                                </label>

                            </div>


                            <div class="option-item">

                                <input
                                    type="radio"
                                    name="location"
                                    id="chandpur"
                                >

                                <label for="chandpur">
                                    Chandpur
                                </label>

                            </div>


                            <div class="option-item">

                                <input
                                    type="radio"
                                    name="location"
                                    id="cumilla"
                                >

                                <label for="cumilla">
                                    Cumilla
                                </label>

                            </div>


                        </div>

                    </div>

                </div>



                <!-- =========================================
                     STATUS
                ========================================== -->

                <div class="col-lg-6">

                    <div class="filter-box">

                        <div class="filter-label">

                            <i class="bi bi-activity"></i>

                            Property Status

                        </div>


                        <div class="option-list">


                            <div class="option-item">

                                <input
                                    type="radio"
                                    name="status"
                                    id="ready"
                                    checked
                                >

                                <label for="ready">
                                    Ready
                                </label>

                            </div>


                            <div class="option-item">

                                <input
                                    type="radio"
                                    name="status"
                                    id="ongoing"
                                >

                                <label for="ongoing">
                                    Ongoing
                                </label>

                            </div>


                            <div class="option-item">

                                <input
                                    type="radio"
                                    name="status"
                                    id="upcoming"
                                >

                                <label for="upcoming">
                                    Upcoming
                                </label>

                            </div>


                        </div>

                    </div>

                </div>



                <!-- =========================================
                     PRICE
                ========================================== -->

                <div class="col-lg-6">

                    <div class="filter-box">

                        <div class="filter-label">

                            <i class="bi bi-cash-stack"></i>

                            Price Range

                        </div>


                        <div class="price-wrapper">


                            <div class="price-field">

                                <span class="currency">
                                    ৳
                                </span>

                                <input
                                    type="text"
                                    class="price-input"
                                    placeholder="Minimum"
                                >

                            </div>


                            <span class="price-to">
                                to
                            </span>


                            <div class="price-field">

                                <span class="currency">
                                    ৳
                                </span>

                                <input
                                    type="text"
                                    class="price-input"
                                    placeholder="Maximum"
                                >

                            </div>


                        </div>

                    </div>

                </div>



                <!-- =========================================
                     SIZE
                ========================================== -->

                <div class="col-lg-6">

                    <div class="filter-box">

                        <div class="filter-label">

                            <i class="bi bi-aspect-ratio-fill"></i>

                            Property Size

                        </div>


                        <div class="size-field">

                            <input
                                type="text"
                                class="size-input"
                                placeholder="Enter minimum size"
                            >

                            <span class="size-unit">
                                Sq.Ft.
                            </span>

                        </div>

                    </div>

                </div>



                <!-- =========================================
                     QUICK SEARCH
                ========================================== -->

                <div class="col-lg-6">

                    <div class="filter-box">

                        <div class="filter-label">

                            <i class="bi bi-search"></i>

                            Quick Search

                        </div>


                        <input
                            type="text"
                            class="size-input"
                            placeholder="Search by property name..."
                        >

                    </div>

                </div>


            </div>



            <!-- =================================================
                 ACTION
            ================================================== -->

            <div class="filter-action">


                <button
                    type="button"
                    class="reset-btn">

                    <i class="bi bi-arrow-counterclockwise me-1"></i>

                    Reset all filters

                </button>


                <button
                    type="button"
                    class="search-property-btn">

                    <i class="bi bi-search me-2"></i>

                    Search Properties

                </button>


            </div>


        </div>

    </div>

</section>



<!-- Bootstrap JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>