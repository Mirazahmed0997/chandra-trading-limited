<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Valley Real Estate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-green: #1b7b43;
            --primary-green-dark: #145e33;
            --light-bg: #f8f9fa;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            background-color: #fcfcfc;
        }

        .btn-green {
            background-color: var(--primary-green);
            color: #fff;
            border: none;
        }

        .btn-green:hover {
            background-color: var(--primary-green-dark);
            color: #fff;
        }

        .btn-outline-green {
            border-color: var(--primary-green);
            color: var(--primary-green);
        }

        .btn-outline-green:hover {
            background-color: var(--primary-green);
            color: #fff;
        }

        .text-green {
            color: var(--primary-green);
        }

        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), 
                        url('https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
            padding: 100px 0 140px 0;
            color: #fff;
        }

        .features-box {
            margin-top: -60px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .feature-item {
            border-right: 1px solid #eee;
        }
        .feature-item:last-child {
            border-right: none;
        }

        .feature-icon-wrapper {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #eef7f2;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-green);
            font-size: 1.5rem;
        }

        .step-number {
            width: 28px;
            height: 28px;
            background-color: var(--primary-green);
            color: white;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .badge-available {
            background-color: #d1e7dd;
            color: #0f5132;
        }
        .badge-booked {
            background-color: #f8d7da;
            color: #842029;
        }

        .testimonial-card {
            background-color: #003829;
            color: white;
            border-radius: 12px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 border-bottom sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <i class="bi bi-house-door-fill text-green fs-2 me-2"></i>
                <div>
                    <span class="fw-bold fs-5 text-dark d-block leading-none">GreenValley</span>
                    <small class="text-muted fs-7">Real Estate</small>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fw-semibold">
                    <li class="nav-item"><a class="nav-link text-dark px-3" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-dark px-3" href="#">About Us</a></li>
                    <li class="nav-item"><a class="nav-link text-dark px-3" href="#">Projects</a></li>
                    <li class="nav-item"><a class="nav-link text-dark px-3" href="#">Properties</a></li>
                    <li class="nav-item"><a class="nav-link text-dark px-3" href="#">Plot Booking</a></li>
                    <li class="nav-item"><a class="nav-link text-dark px-3" href="#">News</a></li>
                    <li class="nav-item"><a class="nav-link text-dark px-3" href="#">Contact</a></li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    <span class="fw-bold text-dark"><i class="bi bi-telephone-fill text-green me-1"></i> +880 1234 567890</span>
                    <a href="#" class="btn btn-green px-4 py-2">Book a Plot</a>
                </div>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <span class="text-warning fw-semibold tracking-wide">Building Better Communities</span>
                    <h1 class="display-4 fw-bold mt-2 mb-3">Build Your Future With Confidence</h1>
                    <p class="lead mb-4 text-light">Discover premium residential plots in prime locations. Perfect for living and investment.</p>
                    <div class="d-flex gap-3">
                        <a href="#" class="btn btn-green btn-lg px-4">Explore Projects</a>
                        <a href="#" class="btn btn-light btn-lg px-4 text-dark">Book a Plot</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="features-box p-4">
            <div class="row text-center g-4">
                <div class="col-md-4 col-lg-2 feature-item">
                    <div class="feature-icon-wrapper mb-3"><i class="bi bi-geo-alt"></i></div>
                    <h6 class="fw-bold mb-1">Prime Location</h6>
                    <small class="text-muted">Well connected with city and facilities</small>
                </div>
                <div class="col-md-4 col-lg-2 feature-item">
                    <div class="feature-icon-wrapper mb-3"><i class="bi bi-building"></i></div>
                    <h6 class="fw-bold mb-1">Quality Development</h6>
                    <small class="text-muted">Modern planning and best infrastructure</small>
                </div>
                <div class="col-md-4 col-lg-2 feature-item">
                    <div class="feature-icon-wrapper mb-3"><i class="bi bi-file-earmark-text"></i></div>
                    <h6 class="fw-bold mb-1">Transparent Process</h6>
                    <small class="text-muted">Clear documentation and legal support</small>
                </div>
                <div class="col-md-4 col-lg-2 feature-item">
                    <div class="feature-icon-wrapper mb-3"><i class="bi bi-shield-check"></i></div>
                    <h6 class="fw-bold mb-1">Secure Investment</h6>
                    <small class="text-muted">High future value and safe investment</small>
                </div>
                <div class="col-md-4 col-lg-2 feature-item">
                    <div class="feature-icon-wrapper mb-3"><i class="bi bi-headset"></i></div>
                    <h6 class="fw-bold mb-1">Customer Support</h6>
                    <small class="text-muted">We are here to help you anytime</small>
                </div>
                <div class="col-md-4 col-lg-2 feature-item">
                    <div class="feature-icon-wrapper mb-3"><i class="bi bi-people"></i></div>
                    <h6 class="fw-bold mb-1">Trusted Company</h6>
                    <small class="text-muted">Years of experience you can rely on</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Projects Section -->
    <section class="py-5 mt-4">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <span class="text-muted text-uppercase fw-semibold small">Our Projects</span>
                    <h2 class="fw-bold mb-0">Featured Projects</h2>
                </div>
                <a href="#" class="btn btn-outline-green">View All Projects</a>
            </div>

            <div class="row g-4">
                <!-- Project 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Project">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Green Valley</h5>
                            <p class="text-muted small mb-2"><i class="bi bi-geo-alt"></i> Gazipur, Dhaka</p>
                            <hr>
                            <div class="d-flex justify-content-between small text-muted mb-2">
                                <span><i class="bi bi-border-all"></i> Residential Plots</span>
                            </div>
                            <div class="d-flex justify-content-between small text-muted mb-3">
                                <span><i class="bi bi-aspect-ratio"></i> 3 - 10 Katha</span>
                            </div>
                            <a href="#" class="btn btn-green w-100">View Details</a>
                        </div>
                    </div>
                </div>
                <!-- Project 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Project">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">City View</h5>
                            <p class="text-muted small mb-2"><i class="bi bi-geo-alt"></i> Savar, Dhaka</p>
                            <hr>
                            <div class="d-flex justify-content-between small text-muted mb-2">
                                <span><i class="bi bi-border-all"></i> Residential Plots</span>
                            </div>
                            <div class="d-flex justify-content-between small text-muted mb-3">
                                <span><i class="bi bi-aspect-ratio"></i> 2 - 8 Katha</span>
                            </div>
                            <a href="#" class="btn btn-green w-100">View Details</a>
                        </div>
                    </div>
                </div>
                <!-- Project 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1613977257363-707ba9348227?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Project">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Lake City</h5>
                            <p class="text-muted small mb-2"><i class="bi bi-geo-alt"></i> Narsingdi</p>
                            <hr>
                            <div class="d-flex justify-content-between small text-muted mb-2">
                                <span><i class="bi bi-border-all"></i> Residential Plots</span>
                            </div>
                            <div class="d-flex justify-content-between small text-muted mb-3">
                                <span><i class="bi bi-aspect-ratio"></i> 3 - 7 Katha</span>
                            </div>
                            <a href="#" class="btn btn-green w-100">View Details</a>
                        </div>
                    </div>
                </div>
                <!-- Project 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Project">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Sunshine Avenue</h5>
                            <p class="text-muted small mb-2"><i class="bi bi-geo-alt"></i> Keraniganj, Dhaka</p>
                            <hr>
                            <div class="d-flex justify-content-between small text-muted mb-2">
                                <span><i class="bi bi-border-all"></i> Residential Plots</span>
                            </div>
                            <div class="d-flex justify-content-between small text-muted mb-3">
                                <span><i class="bi bi-aspect-ratio"></i> 2 - 6 Katha</span>
                            </div>
                            <a href="#" class="btn btn-green w-100">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Available Plots Section (Table + Search Box) -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <!-- Search Box Card -->
                <div class="col-lg-3">
                    <div class="card border-0 text-white p-3 h-100" style="background-color: #0d5c3a;">
                        <span class="text-uppercase small fw-semibold text-warning">Available Plots</span>
                        <h3 class="fw-bold mb-4">Find Your Perfect Plot</h3>
                        
                        <div class="text-center my-auto py-3">
                            <i class="bi bi-geo-alt-fill display-3 text-warning"></i>
                            <h5 class="mt-3 fw-bold">Looking for a plot?</h5>
                            <p class="small text-light">We have wide range of plots in prime locations.</p>
                        </div>
                        
                        <button class="btn btn-light w-100 fw-semibold mt-auto">Search Plots</button>
                    </div>
                </div>

                <!-- Plot Table -->
                <div class="col-lg-9">
                    <div class="table-responsive bg-white rounded shadow-sm p-3">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Project Name</th>
                                    <th>Location</th>
                                    <th>Plot Size</th>
                                    <th>Price (BDT)</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-semibold">Green Valley</td>
                                    <td>Gazipur, Dhaka</td>
                                    <td>3 Katha</td>
                                    <td>1,350,000</td>
                                    <td><span class="badge badge-available px-3 py-2">Available</span></td>
                                    <td><a href="#" class="btn btn-green btn-sm px-3">Book Now</a></td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">City View</td>
                                    <td>Savar, Dhaka</td>
                                    <td>5 Katha</td>
                                    <td>2,250,000</td>
                                    <td><span class="badge badge-available px-3 py-2">Available</span></td>
                                    <td><a href="#" class="btn btn-green btn-sm px-3">Book Now</a></td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Lake City</td>
                                    <td>Narsingdi</td>
                                    <td>4 Katha</td>
                                    <td>1,800,000</td>
                                    <td><span class="badge badge-available px-3 py-2">Available</span></td>
                                    <td><a href="#" class="btn btn-green btn-sm px-3">Book Now</a></td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Sunshine Avenue</td>
                                    <td>Keraniganj, Dhaka</td>
                                    <td>3 Katha</td>
                                    <td>1,250,000</td>
                                    <td><span class="badge badge-booked px-3 py-2">Booked</span></td>
                                    <td><a href="#" class="btn btn-outline-secondary btn-sm px-3">View</a></td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Meadow Land</td>
                                    <td>Munshiganj</td>
                                    <td>6 Katha</td>
                                    <td>2,650,000</td>
                                    <td><span class="badge badge-available px-3 py-2">Available</span></td>
                                    <td><a href="#" class="btn btn-green btn-sm px-3">Book Now</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-5">
        <div class="container text-center">
            <span class="text-uppercase small fw-semibold text-muted">How It Works</span>
            <h2 class="fw-bold mb-5">Easy Plot Booking</h2>

            <div class="row g-4 align-items-center">
                <!-- Step 1 -->
                <div class="col-md-3">
                    <div class="p-4 border rounded shadow-sm bg-white position-relative">
                        <span class="step-number position-absolute top-0 start-50 translate-middle">01</span>
                        <i class="bi bi-buildings fs-1 text-green mb-3 d-block mt-2"></i>
                        <h6 class="fw-bold">Choose Project</h6>
                        <small class="text-muted">Select your preferred project and location.</small>
                    </div>
                </div>
                <!-- Step 2 -->
                <div class="col-md-3">
                    <div class="p-4 border rounded shadow-sm bg-white position-relative">
                        <span class="step-number position-absolute top-0 start-50 translate-middle">02</span>
                        <i class="bi bi-map fs-1 text-green mb-3 d-block mt-2"></i>
                        <h6 class="fw-bold">Select Plot</h6>
                        <small class="text-muted">Choose your desired plot from available options.</small>
                    </div>
                </div>
                <!-- Step 3 -->
                <div class="col-md-3">
                    <div class="p-4 border rounded shadow-sm bg-white position-relative">
                        <span class="step-number position-absolute top-0 start-50 translate-middle">03</span>
                        <i class="bi bi-journal-check fs-1 text-green mb-3 d-block mt-2"></i>
                        <h6 class="fw-bold">Submit Booking</h6>
                        <small class="text-muted">Fill up the booking form with your details.</small>
                    </div>
                </div>
                <!-- Step 4 -->
                <div class="col-md-3">
                    <div class="p-4 border rounded shadow-sm bg-white position-relative">
                        <span class="step-number position-absolute top-0 start-50 translate-middle">04</span>
                        <i class="bi bi-credit-card fs-1 text-green mb-3 d-block mt-2"></i>
                        <h6 class="fw-bold">Make Payment</h6>
                        <small class="text-muted">Complete payment and get confirmation.</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News & Testimonial Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <!-- News Column -->
                <div class="col-lg-7">
                    <div class="d-flex justify-content-between align-items-end mb-4">
                        <div>
                            <span class="text-muted text-uppercase fw-semibold small">Latest News & Updates</span>
                            <h3 class="fw-bold mb-0">News & Updates</h3>
                        </div>
                        <a href="#" class="btn btn-outline-green btn-sm">View All News</a>
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="News">
                                <div class="card-body p-3">
                                    <small class="text-muted">20 May, 2024</small>
                                    <h6 class="fw-bold mt-1">Real Estate Market Growth in Bangladesh</h6>
                                    <a href="#" class="text-green text-decoration-none small fw-semibold">Read More &rarr;</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <img src="https://images.unsplash.com/photo-1448630360428-65456885c650?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="News">
                                <div class="card-body p-3">
                                    <small class="text-muted">15 May, 2024</small>
                                    <h6 class="fw-bold mt-1">New Project Launching at Gazipur</h6>
                                    <a href="#" class="text-green text-decoration-none small fw-semibold">Read More &rarr;</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="News">
                                <div class="card-body p-3">
                                    <small class="text-muted">10 May, 2024</small>
                                    <h6 class="fw-bold mt-1">Why Invest in Residential Plots?</h6>
                                    <a href="#" class="text-green text-decoration-none small fw-semibold">Read More &rarr;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial Column -->
                <div class="col-lg-5">
                    <div class="testimonial-card p-4 h-100 d-flex flex-column justify-content-between">
                        <div>
                            <span class="text-uppercase small fw-semibold text-warning">Testimonial</span>
                            <h3 class="fw-bold text-white mb-4">What Our Clients Say</h3>
                            <i class="bi bi-quote display-4 text-warning opacity-50 d-block mb-2"></i>
                            <p class="fs-6 text-light">Green Valley Real Estate helped me to find the perfect plot for my dream home. The process was smooth and transparent.</p>
                            <div class="text-warning mb-3">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <h6 class="fw-bold mb-0 text-white">&mdash; Ahmed Rahman</h6>
                            <small class="text-light opacity-75">Happy Customer</small>
                        </div>
                        <div class="mt-4 text-end">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=200&q=80" class="rounded-circle border border-2 border-warning" width="80" height="80" alt="Client">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white-50 py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3">
                    <a class="navbar-brand d-flex align-items-center mb-3" href="#">
                        <i class="bi bi-house-door-fill text-green fs-2 me-2"></i>
                        <div>
                            <span class="fw-bold fs-5 text-white d-block">GreenValley</span>
                            <small class="text-white-50">Real Estate</small>
                        </div>
                    </a>
                    <p class="small">We are committed to building better communities with quality development and trusted service.</p>
                </div>
                <div class="col-lg-3 col-6">
                    <h6 class="text-white fw-bold mb-3">Quick Links</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">About Us</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Projects</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Properties</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Plot Booking</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-6">
                    <h6 class="text-white fw-bold mb-3">Other Links</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">News & Updates</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Payment Guide</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Terms & Conditions</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Privacy Policy</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h6 class="text-white fw-bold mb-3">Contact Info</h6>
                    <ul class="list-unstyled small text-white-50">
                        <li class="mb-2"><i class="bi bi-telephone text-green me-2"></i> +880 1234 567890</li>
                        <li class="mb-2"><i class="bi bi-envelope text-green me-2"></i> info@greenvalley.com</li>
                        <li class="mb-2"><i class="bi bi-geo-alt text-green me-2"></i> House # 15, Road # 07, Dhanmondi, Dhaka-1205</li>
                    </ul>
                    <h6 class="text-white fw-bold mt-4 mb-2">Follow Us</h6>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>