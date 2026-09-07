<!-- ============================================
     SECTION 07 — ABOUT CHANDRA
============================================= -->

<section class="about-chandra-section">

    <div class="container">

        <div class="row align-items-center g-5">

            <!-- Left Content -->
            <div class="col-lg-6">

                <div class="about-content">

                    <span class="section-subtitle">
                        ABOUT CHANDRA
                    </span>

                    <h2>
                        Building More Than
                        <span>Properties</span>
                    </h2>

                    <div class="about-line"></div>

                    <p class="about-lead">
                        Chandra Trading Limited is committed
                        to creating trusted real estate
                        opportunities that combine quality,
                        location, value and long-term vision.
                    </p>

                    <p>
                        We focus on creating meaningful
                        opportunities for homeowners,
                        investors and businesses through
                        carefully selected real estate
                        solutions.
                    </p>


                    <!-- Stats -->
                    <div class="row about-stats">

                        <div class="col-4">

                            <div class="about-stat">

                                <h3>
                                    10+
                                </h3>

                                <p>
                                    Years Experience
                                </p>

                            </div>

                        </div>


                        <div class="col-4">

                            <div class="about-stat">

                                <h3>
                                    100+
                                </h3>

                                <p>
                                    Happy Clients
                                </p>

                            </div>

                        </div>


                        <div class="col-4">

                            <div class="about-stat">

                                <h3>
                                    20+
                                </h3>

                                <p>
                                    Projects
                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- Button -->
                    <a href="<?= base_url('about'); ?>"
                       class="about-btn">

                        Discover Chandra

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </div>

            </div>


            <!-- Right Visual -->
            <div class="col-lg-6">

                <div class="about-visual">

                    <div class="about-main-image">

                        <img
                            src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80"
                            alt="Chandra Trading Limited"
                            class="img-fluid">

                    </div>


                    <!-- Floating Card -->
                    <div class="about-floating-card">

                        <div class="floating-icon">

                            <i class="fa-solid fa-building-circle-check"></i>

                        </div>

                        <div>

                            <strong>
                                Trusted Real Estate
                            </strong>

                            <span>
                                Quality • Value • Vision
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<style>

    .about-chandra-section {
        padding: 100px 0;

        background: #ffffff;
    }


    .about-content {
        padding-right: 30px;
    }

    .about-content h2 {
        margin: 0;

        font-size: 42px;

        line-height: 1.2;

        font-weight: 800;

        color: #172d24;
    }

    .about-content h2 span {
        color: #159447;
    }


    /* Green Line */

    .about-line {
        width: 65px;
        height: 4px;

        margin: 22px 0;

        border-radius: 10px;

        background: #159447;
    }


    .about-content p {
        color: #708078;

        font-size: 15px;

        line-height: 1.8;

        margin-bottom: 15px;
    }


    .about-content .about-lead {
        font-size: 17px;

        color: #34463d;

        font-weight: 500;
    }


    /* Stats */

    .about-stats {
        margin-top: 30px;

        margin-bottom: 30px;
    }

    .about-stat {
        border-right: 1px solid #e2e9e4;
    }

    .about-stat:last-child {
        border-right: 0;
    }

    .about-stat h3 {
        margin: 0;

        font-size: 28px;

        font-weight: 800;

        color: #159447;
    }

    .about-stat p {
        margin: 5px 0 0;

        font-size: 12px;

        color: #7a867f;
    }


    /* Button */

    .about-btn {
        display: inline-flex;

        align-items: center;

        gap: 10px;

        padding: 14px 24px;

        border-radius: 8px;

        background: #159447;

        color: #ffffff;

        text-decoration: none;

        font-size: 14px;

        font-weight: 700;

        transition: all 0.3s ease;
    }

    .about-btn:hover {
        background: #08783a;

        color: #ffffff;

        transform: translateY(-2px);
    }

    .about-btn i {
        transition: transform 0.3s ease;
    }

    .about-btn:hover i {
        transform: translateX(4px);
    }


    /* About Image */

    .about-visual {
        position: relative;

        padding: 15px;
    }

    .about-main-image {
        position: relative;

        overflow: hidden;

        border-radius: 22px;

        box-shadow:
            0 20px 50px rgba(20, 60, 40, 0.13);
    }

    .about-main-image img {
        display: block;

        width: 100%;

        min-height: 450px;

        object-fit: cover;
    }


    /* Floating Card */

    .about-floating-card {
        position: absolute;

        left: -10px;
        bottom: 45px;

        display: flex;

        align-items: center;

        gap: 12px;

        padding: 17px 20px;

        border-radius: 12px;

        background: #ffffff;

        box-shadow:
            0 15px 40px rgba(20, 60, 40, 0.15);
    }

    .floating-icon {
        width: 45px;
        height: 45px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: #eaf8f0;

        color: #159447;
    }

    .about-floating-card strong {
        display: block;

        color: #20372c;

        font-size: 13px;
    }

    .about-floating-card span {
        display: block;

        margin-top: 3px;

        color: #87928c;

        font-size: 11px;
    }
</style>