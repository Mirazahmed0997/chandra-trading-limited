
<section class="py-5 bg-light">

    <div class="container py-4">

        <div class="row align-items-center g-5">

            <!-- Left Side -->
            <div class="col-lg-5">

                <span class="badge bg-danger mb-2">
                    <?= lang('joint_venture_opportunities'); ?>
                </span>

                <h2 class="display-6 fw-bold text-dark">
                    <?= lang('have_land_build_together'); ?>
                </h2>

                <p class="lead text-muted my-3">
                    <?= lang('landowner_lead_description'); ?>
                </p>

                <a href="#landownerForm"
                   class="btn btn-outline-danger btn-lg rounded-pill px-4 mt-2">

                    <?= lang('submit_your_property'); ?>

                </a>

            </div>


            <!-- Right Side: Lead Generation Form -->
            <div class="col-lg-7" id="landownerForm">

                <div class="card shadow-lg border-0 rounded-3">

                    <div class="card-body p-4 p-md-5">

                        <h3 class="card-title h4 text-primary fw-bold mb-4">
                            <?= lang('partner_with_us'); ?>
                        </h3>


                        <form action="<?= base_url('landowners_query_create'); ?>"
                              method="POST"
                              enctype="multipart/form-data">

                            <div class="row g-3">


                                <!-- Name -->
                                <div class="col-md-6">

                                    <label for="name"
                                           class="form-label fw-semibold">

                                        <?= lang('name'); ?>

                                    </label>

                                    <input type="text"
                                           class="form-control"
                                           id="name"
                                           name="name"
                                           placeholder="<?= lang('full_name'); ?>"
                                           required>

                                </div>


                                <!-- Mobile -->
                                <div class="col-md-6">

                                    <label for="mobile"
                                           class="form-label fw-semibold">

                                        <?= lang('mobile'); ?>

                                    </label>

                                    <input type="tel"
                                           class="form-control"
                                           id="mobile"
                                           name="mobile"
                                           placeholder="<?= lang('mobile_number'); ?>"
                                           required>

                                </div>


                                <!-- Email -->
                                <div class="col-12">

                                    <label for="email"
                                           class="form-label fw-semibold">

                                        <?= lang('email'); ?>

                                    </label>

                                    <input type="email"
                                           class="form-control"
                                           id="email"
                                           name="email"
                                           placeholder="<?= lang('email_placeholder'); ?>"
                                           required>

                                </div>


                                <!-- Land Location -->
                                <div class="col-md-6">

                                    <label for="location"
                                           class="form-label fw-semibold">

                                        <?= lang('land_location'); ?>

                                    </label>

                                    <input type="text"
                                           class="form-control"
                                           id="location"
                                           name="location"
                                           placeholder="<?= lang('land_location_placeholder'); ?>"
                                           required>

                                </div>


                                <!-- Land Size -->
                                <div class="col-md-6">

                                    <label for="land_size"
                                           class="form-label fw-semibold">

                                        <?= lang('land_size'); ?>

                                    </label>

                                    <input type="text"
                                           class="form-control"
                                           id="land_size"
                                           name="land_size"
                                           placeholder="<?= lang('land_size_placeholder'); ?>"
                                           required>

                                </div>


                                <!-- Property Type -->
                                <div class="col-12">

                                    <label for="property_type"
                                           class="form-label fw-semibold">

                                        <?= lang('property_type'); ?>

                                    </label>

                                    <select class="form-select"
                                            id="property_type"
                                            name="property_type"
                                            required>

                                        <option value=""
                                                selected
                                                disabled>

                                            <?= lang('select_property_type'); ?>

                                        </option>

                                        <option value="Residential">
                                            <?= lang('residential_land'); ?>
                                        </option>

                                        <option value="Commercial">
                                            <?= lang('commercial_land'); ?>
                                        </option>

                                        <option value="Mixed Use">
                                            <?= lang('mixed_use'); ?>
                                        </option>

                                    </select>

                                </div>


                                <!-- Message -->
                                <div class="col-12">

                                    <label for="message"
                                           class="form-label fw-semibold">

                                        <?= lang('message'); ?>

                                    </label>

                                    <textarea class="form-control"
                                              id="message"
                                              name="message"
                                              rows="3"
                                              placeholder="<?= lang('message_placeholder'); ?>"></textarea>

                                </div>


                                <!-- Submit Button -->
                                <div class="col-12 mt-4">

                                    <button type="submit"
                                            class="btn btn-primary w-100 py-3 text-uppercase fw-bold shadow-sm">

                                        <?= lang('submit_enquiry'); ?>

                                    </button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

