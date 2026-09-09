<form action="<?= base_url('create_properties') ?>" method="POST" enctype="multipart/form-data">

    <div class="content-wrapper">

        <div class="container-fluid py-4">

            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>
                    <h2 class="fw-bold mb-1">
                        <i class="bi bi-building me-2 text-primary"></i>
                        Add Property
                    </h2>

                    <p class="text-muted mb-0">
                        Create and publish a new property listing
                    </p>
                </div>

                <a href="<?= base_url('properties') ?>" class="btn btn-light border">
                    <i class="bi bi-arrow-left me-1"></i>
                    Back to Properties
                </a>

            </div>


            <!-- Main Form -->
            <div class="row g-4">

                <!-- LEFT COLUMN -->
                <div class="col-lg-8">

                    <!-- Basic Information -->
                    <div class="property-card mb-4">

                        <div class="property-card-header">
                            <div>
                                <h5>
                                    <i class="bi bi-info-circle me-2"></i>
                                    Basic Information
                                </h5>

                                <small>
                                    Enter the primary property information
                                </small>
                            </div>
                        </div>

                        <div class="property-card-body">

                            <div class="row g-3">

                                <!-- Property Name -->
                                <div class="col-md-8">

                                    <label class="form-label">
                                        Property Name
                                        <span class="text-danger">*</span>
                                    </label>

                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-building"></i>
                                        </span>

                                        <input
                                            type="text"
                                            name="property_name"
                                            class="form-control"
                                            placeholder="e.g. Chandra Trading Limited"
                                            required
                                        >
                                    </div>

                                </div>


                                <!-- Property ID -->
                                <div class="col-md-4">

                                    <label class="form-label">
                                        Property ID
                                        <span class="text-danger">*</span>
                                    </label>

                                    <div class="input-group">

                                        <span class="input-group-text">
                                            <i class="bi bi-hash"></i>
                                        </span>

                                        <input
                                            type="text"
                                            name="property_id"
                                            class="form-control"
                                            placeholder="PROP-001"
                                            required
                                        >

                                    </div>

                                </div>


                                <!-- Property Type -->
                                <div class="col-md-6">

                                    <label class="form-label">
                                        Property Type
                                    </label>

                                    <select
                                        name="property_type"
                                        class="form-select"
                                    >
                                        <option value="Apartment">
                                            Apartment
                                        </option>

                                        <option value="Villa">
                                            Villa
                                        </option>

                                        <option value="Commercial">
                                            Commercial
                                        </option>
                                    </select>

                                </div>


                                <!-- Location -->
                                <div class="col-md-6">

                                    <label class="form-label">
                                        Location
                                    </label>

                                    <div class="input-group">

                                        <span class="input-group-text">
                                            <i class="bi bi-geo-alt"></i>
                                        </span>

                                        <input
                                            type="text"
                                            name="location"
                                            class="form-control"
                                            placeholder="Property location"
                                        >

                                    </div>

                                </div>


                                <!-- Price -->
                                <div class="col-md-6">

                                    <label class="form-label">
                                        Price
                                    </label>

                                    <div class="input-group">

                                        <span class="input-group-text">
                                            ৳
                                        </span>

                                        <input
                                            type="number"
                                            step="0.01"
                                            name="price"
                                            class="form-control"
                                            placeholder="0.00"
                                        >

                                    </div>

                                </div>


                                <!-- Size -->
                                <div class="col-md-6">

                                    <label class="form-label">
                                        Property Size
                                    </label>

                                    <div class="input-group">

                                        <input
                                            type="text"
                                            name="size"
                                            class="form-control"
                                            placeholder="e.g. 1,500"
                                        >

                                        <span class="input-group-text">
                                            sq ft
                                        </span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- Property Details -->
                    <div class="property-card mb-4">

                        <div class="property-card-header">

                            <div>
                                <h5>
                                    <i class="bi bi-house-door me-2"></i>
                                    Property Details
                                </h5>

                                <small>
                                    Add rooms, floor and parking information
                                </small>
                            </div>

                        </div>


                        <div class="property-card-body">

                            <div class="row g-3">

                                <!-- Bedrooms -->
                                <div class="col-md-4">

                                    <label class="form-label">
                                        Bedrooms
                                    </label>

                                    <div class="input-group">

                                        <span class="input-group-text">
                                            <i class="bi bi-door-open"></i>
                                        </span>

                                        <input
                                            type="number"
                                            name="bedrooms"
                                            class="form-control"
                                            min="0"
                                            placeholder="0"
                                        >

                                    </div>

                                </div>


                                <!-- Bathrooms -->
                                <div class="col-md-4">

                                    <label class="form-label">
                                        Bathrooms
                                    </label>

                                    <div class="input-group">

                                        <span class="input-group-text">
                                            <i class="bi bi-droplet"></i>
                                        </span>

                                        <input
                                            type="number"
                                            name="bathrooms"
                                            class="form-control"
                                            min="0"
                                            placeholder="0"
                                        >

                                    </div>

                                </div>


                                <!-- Floor -->
                                <div class="col-md-4">

                                    <label class="form-label">
                                        Floor
                                    </label>

                                    <input
                                        type="text"
                                        name="floor"
                                        class="form-control"
                                        placeholder="e.g. 5th Floor"
                                    >

                                </div>


                                <!-- Parking -->
                                <div class="col-md-12">

                                    <label class="form-label">
                                        Parking
                                    </label>

                                    <input
                                        type="text"
                                        name="parking"
                                        class="form-control"
                                        placeholder="e.g. 2 Cars"
                                    >

                                </div>


                                <!-- Description -->
                                <div class="col-md-12">

                                    <label class="form-label">
                                        Property Description
                                    </label>

                                    <textarea
                                        name="description"
                                        class="form-control"
                                        rows="6"
                                        placeholder="Write a detailed description of the property..."
                                    ></textarea>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- Amenities -->
                    <div class="property-card mb-4">

                        <div class="property-card-header">

                            <div>
                                <h5>
                                    <i class="bi bi-stars me-2"></i>
                                    Amenities & Facilities
                                </h5>

                                <small>
                                    Select facilities available with this property
                                </small>
                            </div>

                        </div>


                        <div class="property-card-body">

                            <div class="row g-3">

                                <div class="col-md-4">

                                    <label class="amenity-option">

                                        <input
                                            type="checkbox"
                                            name="amenities[]"
                                            value="Gym"
                                        >

                                        <span class="amenity-icon">
                                            <i class="bi bi-person-arms-up"></i>
                                        </span>

                                        <span>
                                            <strong>Gym</strong>
                                            <small>Fitness facility</small>
                                        </span>

                                    </label>

                                </div>


                                <div class="col-md-4">

                                    <label class="amenity-option">

                                        <input
                                            type="checkbox"
                                            name="amenities[]"
                                            value="Pool"
                                        >

                                        <span class="amenity-icon">
                                            <i class="bi bi-water"></i>
                                        </span>

                                        <span>
                                            <strong>Swimming Pool</strong>
                                            <small>Pool facility</small>
                                        </span>

                                    </label>

                                </div>


                                <div class="col-md-4">

                                    <label class="amenity-option">

                                        <input
                                            type="checkbox"
                                            name="amenities[]"
                                            value="Security"
                                        >

                                        <span class="amenity-icon">
                                            <i class="bi bi-shield-check"></i>
                                        </span>

                                        <span>
                                            <strong>Security</strong>
                                            <small>24/7 security</small>
                                        </span>

                                    </label>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- Media -->
                    <div class="property-card mb-4">

                        <div class="property-card-header">

                            <div>
                                <h5>
                                    <i class="bi bi-images me-2"></i>
                                    Property Media
                                </h5>

                                <small>
                                    Upload property images and documents
                                </small>
                            </div>

                        </div>


                        <div class="property-card-body">

                            <!-- Gallery -->
                            <div class="upload-box mb-4">

                                <div class="upload-icon">
                                    <i class="bi bi-images"></i>
                                </div>

                                <h6>
                                    Property Gallery
                                </h6>

                                <p>
                                    Upload multiple property images
                                </p>

                                <input
                                    type="file"
                                    name="gallery[]"
                                    class="form-control"
                                    multiple
                                    accept="image/*"
                                >

                                <small class="text-muted">
                                    JPG, JPEG, PNG, WEBP
                                </small>

                            </div>


                            <div class="row g-3">

                                <!-- Floor Plan -->
                                <div class="col-md-6">

                                    <label class="form-label">
                                        Floor Plan
                                    </label>

                                    <div class="document-upload">

                                        <i class="bi bi-diagram-3"></i>

                                        <input
                                            type="file"
                                            name="floor_plan"
                                            class="form-control"
                                            accept="image/*,.pdf"
                                        >

                                    </div>

                                </div>


                                <!-- Brochure -->
                                <div class="col-md-6">

                                    <label class="form-label">
                                        Brochure
                                    </label>

                                    <div class="document-upload">

                                        <i class="bi bi-file-earmark-pdf"></i>

                                        <input
                                            type="file"
                                            name="brochure"
                                            class="form-control"
                                            accept=".pdf,.doc,.docx"
                                        >

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- RIGHT COLUMN -->
                <div class="col-lg-4">


                    <!-- Publishing -->
                    <div class="property-card mb-4">

                        <div class="property-card-header">

                            <div>
                                <h5>
                                    <i class="bi bi-send me-2"></i>
                                    Publishing
                                </h5>

                                <small>
                                    Control property visibility
                                </small>
                            </div>

                        </div>


                        <div class="property-card-body">

                            <label class="form-label">
                                Property Status
                            </label>

                            <select
                                name="status"
                                class="form-select mb-4"
                            >

                                <option value="Publish">
                                    Publish
                                </option>

                                <option value="Draft">
                                    Draft
                                </option>

                                <option value="Sold">
                                    Sold
                                </option>

                                <option value="Reserved">
                                    Reserved
                                </option>

                            </select>


                            <label class="featured-property">

                                <span class="featured-icon">
                                    <i class="bi bi-star-fill"></i>
                                </span>

                                <span class="flex-grow-1">

                                    <strong>
                                        Featured Property
                                    </strong>

                                    <small>
                                        Show this property as featured
                                    </small>

                                </span>

                                <input
                                    type="checkbox"
                                    name="featured"
                                    value="1"
                                >

                            </label>

                        </div>

                    </div>


                    <!-- Map -->
                    <div class="property-card mb-4">

                        <div class="property-card-header">

                            <div>
                                <h5>
                                    <i class="bi bi-map me-2"></i>
                                    Map Location
                                </h5>

                                <small>
                                    Add Google Maps location
                                </small>
                            </div>

                        </div>


                        <div class="property-card-body">

                            <label class="form-label">
                                Map URL / Embed Code
                            </label>

                            <textarea
                                name="map_location"
                                class="form-control"
                                rows="5"
                                placeholder="Paste Google Maps URL or embed code"
                            ></textarea>

                            <div class="form-text mt-2">

                                <i class="bi bi-info-circle me-1"></i>

                                You can paste a Google Maps URL or iframe code.

                            </div>

                        </div>

                    </div>


                    <!-- Summary -->
                    <div class="property-summary">

                        <div class="summary-icon">
                            <i class="bi bi-check2-circle"></i>
                        </div>

                        <div>

                            <h6>
                                Ready to publish?
                            </h6>

                            <p>
                                Review all property information before saving.
                            </p>

                        </div>

                    </div>


                    <!-- Buttons -->
                    <div class="d-grid gap-2 mt-3">

                        <button
                            type="submit"
                            class="btn btn-primary btn-lg"
                        >

                            <i class="bi bi-check-lg me-2"></i>

                            Save Property

                        </button>


                        <a
                            href="<?= base_url('properties') ?>"
                            class="btn btn-light border"
                        >

                            Cancel

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</form>