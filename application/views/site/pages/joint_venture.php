<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <span class="badge bg-danger mb-2">Joint Venture Opportunities</span>
                <h2 class="display-6 fw-bold text-dark">Have Land? Let's Build Together.</h2>
                <p class="lead text-muted my-3">
                    Do you own land and are looking for a trusted development partner?
                </p>
                <a href="#landownerForm" class="btn btn-outline-danger btn-lg rounded-pill px-4 mt-2">
                    Submit Your Property
                </a>
            </div>

            <!-- Right Side: Lead Generation Form -->
            <div class="col-lg-7" id="landownerForm">
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="card-title h4 text-primary fw-bold mb-4">Partner With Us</h3>
                        
                        <?php echo form_open('landowner/submit_lead', ['class' => 'needs-validation']); ?>
                            
                            <div class="row g-3">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label fw-semibold">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
                                </div>

                                <!-- Mobile -->
                                <div class="col-md-6">
                                    <label for="mobile" class="form-label fw-semibold">Mobile</label>
                                    <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
                                </div>

                                <!-- Email -->
                                <div class="col-12">
                                    <label for="email" class="form-label fw-semibold">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                                </div>

                                <!-- Land Location -->
                                <div class="col-md-6">
                                    <label for="location" class="form-label fw-semibold">Land Location</label>
                                    <input type="text" class="form-control" id="location" name="location" placeholder="e.g. Uttara, Dhaka" required>
                                </div>

                                <!-- Land Size -->
                                <div class="col-md-6">
                                    <label for="land_size" class="form-label fw-semibold">Land Size</label>
                                    <input type="text" class="form-control" id="land_size" name="land_size" placeholder="e.g. 5 Katha / 10 Decimal" required>
                                </div>

                                <!-- Property Type -->
                                <div class="col-12">
                                    <label for="property_type" class="form-label fw-semibold">Property Type</label>
                                    <select class="form-select" id="property_type" name="property_type" required>
                                        <option value="" selected disabled>Select Property Type</option>
                                        <option value="Residential">Residential Land</option>
                                        <option value="Commercial">Commercial Land</option>
                                        <option value="Mixed Use">Mixed Use (Residential + Commercial)</option>
                                    </select>
                                </div>

                                <!-- Message -->
                                <div class="col-12">
                                    <label for="message" class="form-label fw-semibold">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="3" placeholder="Additional details about your property..."></textarea>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-primary w-100 py-3 text-uppercase fw-bold shadow-sm">
                                        Submit Enquiry
                                    </button>
                                </div>
                            </div>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>