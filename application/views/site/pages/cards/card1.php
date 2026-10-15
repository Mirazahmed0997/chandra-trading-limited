<section class="py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5">
            <span class="badge bg-success px-3 py-2">
                Our Projects
            </span>

            <h2 class="fw-bold mt-3">
                Explore Our Premium Projects
            </h2>

            <p class="text-muted">
                Discover carefully planned residential communities.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-lg-4 col-md-6">
                <div class="property-3d">

                    <div class="property-card">

                        <div class="property-img">
                            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c"
                                 class="img-fluid"
                                 alt="Housing Project">

                            <span class="badge bg-success property-badge">
                                Ongoing
                            </span>
                        </div>

                        <div class="p-4">

                            <small class="text-success fw-semibold">
                                DHAKA
                            </small>

                            <h4 class="fw-bold mt-2">
                                Green Valley City
                            </h4>

                            <p class="text-muted">
                                Modern residential plots with premium
                                community facilities.
                            </p>

                            <div class="d-flex justify-content-between">
                                <span>
                                    <i class="bi bi-geo-alt"></i>
                                    Dhaka
                                </span>

                                <strong class="text-success">
                                    View Details
                                </strong>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


<style>
    .property-3d {
    perspective: 1000px;
}

.property-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 15px 35px rgba(0,0,0,.10);
    transform-style: preserve-3d;
    transition: .4s ease;
}

.property-card:hover {
    transform:
        rotateX(5deg)
        rotateY(-5deg)
        translateY(-12px);
    box-shadow: 0 30px 60px rgba(0,0,0,.18);
}

.property-img {
    position: relative;
    overflow: hidden;
}

.property-img img {
    width: 100%;
    height: 260px;
    object-fit: cover;
    transition: .5s;
}

.property-card:hover img {
    transform: scale(1.08);
}

.property-badge {
    position: absolute;
    top: 15px;
    right: 15px;
}
</style>