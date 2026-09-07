<!-- ============================================
     SECTION 08 — INVESTMENT
============================================= -->

<section class="investment-section">

    <div class="container">

        <!-- Heading -->
        <div class="section-heading investment-heading text-center">

            <span class="section-subtitle">
                INVESTMENT
            </span>

            <h2>
                Invest in <span>Tomorrow</span>
            </h2>

            <p>
                Explore real estate opportunities designed
                for long-term value.
            </p>

        </div>


        <!-- Investment Cards -->
        <div class="row g-4 mb-5">


            <!-- Residential Investment -->
            <div class="col-lg-4 col-md-6">

                <a href="<?= base_url('investment/residential'); ?>"
                   class="investment-card">

                    <div class="investment-icon">

                        <i class="fa-solid fa-house"></i>

                    </div>

                    <div class="investment-card-content">

                        <span>
                            01
                        </span>

                        <h3>
                            Residential Investment
                        </h3>

                        <p>
                            Invest in carefully selected
                            residential opportunities for
                            sustainable long-term growth.
                        </p>

                    </div>

                    <div class="investment-arrow">

                        <i class="fa-solid fa-arrow-right"></i>

                    </div>

                </a>

            </div>


            <!-- Land Investment -->
            <div class="col-lg-4 col-md-6">

                <a href="<?= base_url('investment/land'); ?>"
                   class="investment-card">

                    <div class="investment-icon">

                        <i class="fa-solid fa-map-location-dot"></i>

                    </div>

                    <div class="investment-card-content">

                        <span>
                            02
                        </span>

                        <h3>
                            Land Investment
                        </h3>

                        <p>
                            Secure land opportunities with
                            strong location potential and
                            long-term value.
                        </p>

                    </div>

                    <div class="investment-arrow">

                        <i class="fa-solid fa-arrow-right"></i>

                    </div>

                </a>

            </div>


            <!-- Commercial Investment -->
            <div class="col-lg-4 col-md-6">

                <a href="<?= base_url('investment/commercial'); ?>"
                   class="investment-card">

                    <div class="investment-icon">

                        <i class="fa-solid fa-city"></i>

                    </div>

                    <div class="investment-card-content">

                        <span>
                            03
                        </span>

                        <h3>
                            Commercial Investment
                        </h3>

                        <p>
                            Discover commercial properties
                            designed for business and future
                            growth.
                        </p>

                    </div>

                    <div class="investment-arrow">

                        <i class="fa-solid fa-arrow-right"></i>

                    </div>

                </a>

            </div>

        </div>


        <!-- CTA -->
        <div class="investment-cta text-center">

            <div>

                <h3>
                    Looking for the right investment?
                </h3>

                <p>
                    Talk with our team and discover
                    opportunities that fit your goals.
                </p>

            </div>

            <a href="<?= base_url('contact'); ?>"
               class="investment-btn">

                <i class="fa-solid fa-comments"></i>

                Talk to an Investment Advisor

            </a>

        </div>

    </div>

</section>




<style>
    
    .investment-section {
        padding: 95px 0;

        background:
            linear-gradient(135deg,
                #f6fbf8,
                #ffffff);
    }

    .investment-heading {
        margin-bottom: 45px;
    }


    /* Investment Card */

    .investment-card {
        position: relative;

        display: block;

        height: 100%;

        padding: 35px;

        text-decoration: none;

        background: #ffffff;

        border: 1px solid #e2eae5;

        border-radius: 18px;

        overflow: hidden;

        box-shadow:
            0 12px 35px rgba(20, 70, 45, 0.06);

        transition:
            transform 0.35s ease,
            box-shadow 0.35s ease,
            border-color 0.35s ease;
    }

    .investment-card:hover {
        transform: translateY(-8px);

        border-color: #159447;

        box-shadow:
            0 22px 50px rgba(20, 100, 60, 0.14);
    }


    /* Investment Icon */

    .investment-icon {
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

    .investment-card:hover .investment-icon {
        background: #159447;

        color: #ffffff;

        transform: scale(1.05);
    }


    /* Card Number */

    .investment-card-content>span {
        font-size: 12px;

        font-weight: 800;

        letter-spacing: 1px;

        color: #9ba8a0;
    }


    /* Card Heading */

    .investment-card h3 {
        margin: 8px 0 13px;

        color: #172d24;

        font-size: 20px;

        font-weight: 800;
    }

    .investment-card p {
        margin: 0;

        color: #718078;

        font-size: 14px;

        line-height: 1.8;
    }


    /* Arrow */

    .investment-arrow {
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

        transition: all 0.3s ease;
    }

    .investment-card:hover .investment-arrow {
        background: #159447;

        color: #ffffff;

        transform: translateX(4px);
    }


    .investment-cta {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 30px;

        padding: 30px 35px;

        border-radius: 16px;

        background:
            linear-gradient(135deg,
                #159447,
                #08783a);

        box-shadow:
            0 15px 35px rgba(21, 148, 71, 0.18);
    }

    .investment-cta h3 {
        margin: 0 0 7px;

        color: #ffffff;

        font-size: 21px;

        font-weight: 800;
    }

    .investment-cta p {
        margin: 0;

        color: rgba(255, 255, 255, 0.80);

        font-size: 14px;
    }


    .investment-btn {
        display: inline-flex;

        align-items: center;

        gap: 9px;

        padding: 14px 22px;

        white-space: nowrap;

        border-radius: 8px;

        background: #ffffff;

        color: #137d3f;

        text-decoration: none;

        font-size: 13px;

        font-weight: 800;

        transition: all 0.3s ease;
    }

    .investment-btn:hover {
        background: #f1f7f4;

        color: #086d35;

        transform: translateY(-2px);
    }


  
    
</style>