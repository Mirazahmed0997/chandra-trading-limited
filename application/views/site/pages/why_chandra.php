<section class="why-chandra-section">

    <div class="container">

        <!-- Heading -->
        <div class="section-heading text-center">

            <span class="section-subtitle">
                <?= lang('why_choose_chandra'); ?>
            </span>

            <h2>
                <?= lang('built_on'); ?>
                <span>
                    <?= lang('trust'); ?>
                </span>.
                <?= lang('driven_by_value'); ?>
            </h2>

            <p>
                <?= lang('why_chandra_description'); ?>
            </p>

        </div>


        <!-- Trust Cards -->
        <div class="row g-4">


            <!-- Trust -->
            <div class="col-lg-4 col-md-6">

                <div class="why-card">

                    <div class="why-icon">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>

                    <div class="why-number">
                        01
                    </div>

                    <h3>
                        <?= lang('trust'); ?>
                    </h3>

                    <p>
                        <?= lang('trust_description'); ?>
                    </p>

                </div>

            </div>


            <!-- Quality -->
            <div class="col-lg-4 col-md-6">

                <div class="why-card">

                    <div class="why-icon">
                        <i class="fa-solid fa-award"></i>
                    </div>

                    <div class="why-number">
                        02
                    </div>

                    <h3>
                        <?= lang('quality'); ?>
                    </h3>

                    <p>
                        <?= lang('quality_description'); ?>
                    </p>

                </div>

            </div>


            <!-- Transparency -->
            <div class="col-lg-4 col-md-6">

                <div class="why-card">

                    <div class="why-icon">
                        <i class="fa-solid fa-file-shield"></i>
                    </div>

                    <div class="why-number">
                        03
                    </div>

                    <h3>
                        <?= lang('transparency'); ?>
                    </h3>

                    <p>
                        <?= lang('transparency_description'); ?>
                    </p>

                </div>

            </div>


            <!-- Value -->
            <div class="col-lg-6 col-md-6">

                <div class="why-card why-card-wide">

                    <div class="why-icon">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>

                    <div class="why-number">
                        04
                    </div>

                    <h3>
                        <?= lang('value'); ?>
                    </h3>

                    <p>
                        <?= lang('value_description'); ?>
                    </p>

                </div>

            </div>


            <!-- Commitment -->
            <div class="col-lg-6 col-md-6">

                <div class="why-card why-card-wide">

                    <div class="why-icon">
                        <i class="fa-solid fa-handshake"></i>
                    </div>

                    <div class="why-number">
                        05
                    </div>

                    <h3>
                        <?= lang('commitment'); ?>
                    </h3>

                    <p>
                        <?= lang('commitment_description'); ?>
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<style>
    .section-subtitle {
        display: inline-block;

        margin-bottom: 12px;

        font-size: 13px;

        font-weight: 800;

        letter-spacing: 2px;

        color: #159447;
    }

    .section-heading {
        margin-bottom: 45px;
    }

    .section-heading h2 {
        margin: 0;

        font-size: 40px;

        font-weight: 800;

        line-height: 1.2;

        color: #172d24;
    }

    .section-heading h2 span {
        color: #159447;
    }

    .section-heading p {
        max-width: 650px;

        margin: 15px auto 0;

        font-size: 16px;

        line-height: 1.7;

        color: #738079;
    }


    /* =================================================
   SECTION 06 — WHY CHOOSE
================================================= */

    .why-chandra-section {
        padding: 95px 0;

        background:
            linear-gradient(135deg,
                #f4fbf7 0%,
                #ffffff 55%,
                #f2f8ff 100%);
    }


    /* Why Card */

    .why-card {
        position: relative;

        height: 100%;

        padding: 32px;

        background: #ffffff;

        border-radius: 18px;

        border: 1px solid #e3ebe6;

        box-shadow:
            0 12px 35px rgba(25, 80, 50, 0.06);

        overflow: hidden;

        transition:
            transform 0.35s ease,
            box-shadow 0.35s ease,
            border-color 0.35s ease;
    }

    .why-card:hover {
        transform: translateY(-7px);

        border-color: #159447;

        box-shadow:
            0 20px 45px rgba(25, 100, 60, 0.13);
    }


    /* Icon */

    .why-icon {
        width: 62px;
        height: 62px;

        display: flex;

        align-items: center;
        justify-content: center;

        margin-bottom: 25px;

        border-radius: 14px;

        background: #eaf8f0;

        color: #159447;

        font-size: 24px;

        transition: all 0.3s ease;
    }

    .why-card:hover .why-icon {
        background: #159447;

        color: #ffffff;
    }


    /* Number */

    .why-number {
        position: absolute;

        top: 25px;
        right: 25px;

        font-size: 12px;

        font-weight: 800;

        letter-spacing: 1px;

        color: #a2aea7;
    }


    /* Text */

    .why-card h3 {
        margin-bottom: 12px;

        font-size: 20px;

        font-weight: 800;

        color: #172d24;
    }

    .why-card p {
        margin: 0;

        color: #6f7c75;

        font-size: 14px;

        line-height: 1.8;
    }



    @media (max-width: 991px) {

        .why-chandra-section,
        .about-chandra-section,
        .investment-section {
            padding: 75px 0;
        }

        .section-heading h2,
        .about-content h2 {
            font-size: 35px;
        }

        .about-content {
            padding-right: 0;
        }

        .investment-cta {
            flex-direction: column;

            text-align: center;
        }

    }


    /* =================================================
   MOBILE
================================================= */

    @media (max-width: 767px) {

        .why-chandra-section,
        .about-chandra-section,
        .investment-section {
            padding: 55px 0;
        }

        .section-heading {
            margin-bottom: 30px;
        }

        .section-heading h2,
        .about-content h2 {
            font-size: 29px;
        }

        .section-heading p {
            font-size: 14px;
        }

        .why-card,
        .investment-card {
            padding: 27px;
        }

        .about-main-image img {
            min-height: 350px;
        }

        .about-floating-card {
            left: 0;
            bottom: 25px;
        }

        .about-stats {
            margin-top: 25px;
        }

        .investment-cta {
            padding: 25px 20px;
        }

        .investment-cta h3 {
            font-size: 18px;
        }

        .investment-btn {
            white-space: normal;

            text-align: center;
        }

    }
</style>