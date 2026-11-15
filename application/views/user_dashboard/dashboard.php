
<style>
    .dashboard-wrapper-dark {
        background-color: #0b0f19;
        color: #0b0f19;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        min-height: 100vh;
    }

    .dashboard-header-dark {
        padding: 1.5rem 0 1rem;
    }

    .dashboard-title-dark {
        font-weight: 700;
        letter-spacing: -0.02em;
        color: #6c757d;
    }

    .stat-card-dark {
        border-radius: 16px;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.5);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        margin-bottom: 1.5rem;
    }

    .stat-card-dark .card-body-custom {
        padding: 2.5rem;
        position: relative;
        z-index: 2;
    }

    .stat-card-dark .stat-value {
        font-size: 1.75rem;
        font-weight: 800;
        line-height: 1.2;
        color: #ffffff;
        margin-bottom: 0.25rem;
    }

    .stat-card-dark .stat-icon {
        position: absolute;
        right: 3.25rem;
        top: 2.25rem;
        width: 35px;
        height: 35px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        transition: transform 1.0s ease;
        transform: scale(2.2);
    }

    .stat-card-dark :hover .stat-icon {
        transform: scale(1.1) rotate(-4deg);
    }

    .card-theme-blue {
        background: linear-gradient(135deg, #ef4444, #B91C1C);
        color: #38bdf8;
        border: 1px solid rgba(56, 189, 248, 0.2);
    }

    .card-theme-emerald {
        background: linear-gradient(135deg, #2dd4bf, #0f766e);
        color: #34d399;
        border: 1px solid rgba(52, 211, 153, 0.2);
    }

    .card-theme-purple {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: #c084fc;
        border: 1px solid rgba(192, 132, 252, 0.2);
    }

    .stat-card-footer-dark {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.75rem 1.5rem;
        border-top: 1px solid rgba(255, 255, 255, 0.2);
        color: #fff;
        font-size: 0.875rem;
        font-weight: 600;
        text-decoration: none !important;
        transition: background 0.2s ease, color 0.2s ease;
    }

    .stat-card-footer-dark:hover {
        background: #334155;
        color: #ffffff;
    }

    .stat-card-footer-dark i {
        transition: transform 0.2s ease;
    }

    .stat-card-footer-dark:hover i {
        transform: translateX(4px);
    }
</style>

<?php if ($staff_joining_letter): ?>

    <div class="content-wrapper">
        <?php if ($this->session->flashdata('attendance_success')): ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('attendance_success'); ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('entry_attendece_success')): ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('entry_attendece_success'); ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('weekend_error')): ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('weekend_error'); ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('attendece_error')): ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('attendece_error'); ?>
            </div>
        <?php endif; ?>
       


        <div class="content-header dashboard-header-dark">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-6">
                        <h1 class="m-0 dashboard-title-dark">Staff Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right bg-transparent p-0 m-0">
                            <li class="breadcrumb-item"><a href="#" class="text-secondary">Home</a></li>
                            <li class="breadcrumb-item active font-weight-bold">User_dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Card 1: Profile -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="stat-card-dark card-theme-blue">
                            <div class="card-body-custom">
                                <div class="stat-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="stat-value">Update Profile</div>
                            </div>
                            <a href="<?php echo base_url('projects_category'); ?>" class="stat-card-footer-dark"  data-bs-toggle="modal" data-bs-target="#VerificationReport">
                                <span>Update Now</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Card 2: Salary Statements -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="stat-card-dark card-theme-emerald">
                            <div class="card-body-custom">
                                <div class="stat-icon">
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                                <div class="stat-value">Salary statements</div>
                            </div>
                            <a href="#" class="stat-card-footer-dark">
                                <span>View Details</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Card 3: Attendance Portal Trigger -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="stat-card-dark card-theme-purple">
                            <div class="card-body-custom">
                                <div class="stat-icon">
                                    <i class="fas fa-clipboard-check"></i>
                                </div>
                                <div class="stat-value">Attendance</div>
                            </div>
                            <a href="javascript:void(0);" class="stat-card-footer-dark" data-bs-toggle="modal"
                                data-bs-target="#attendencePortal">
                                <span>Submit Attendance</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="stat-card-dark card-theme-emerald">
                            <div class="card-body-custom">
                                <div class="stat-icon">
                                    <i class="fas fa-route"></i>
                                </div>
                                <div class="stat-value">Movements</div>
                            </div>
                            <a href="<?= base_url('user_movement_list'); ?>" class="stat-card-footer-dark" >
                                <span>Submit Movement</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php else: ?>
    <div class="content-wrapper" style="text-align: center; padding: 50px; font-weight: bold; color: #65716b;">
        Your joining letter is not Approved. <br>
        <a href="<?= base_url('joining_letter_form/'); ?>"
            class="btn btn-success btn-sm rounded-3 px-3 fw-medium add_btn mt-3">
            <i class="bi bi-plus-lg me-1"></i> Make Joining Letter, If not created yet
        </a>
    </div>
<?php endif; ?>


<?php $this->load->view('user_dashboard/attendence_portal.php'); ?>
<?php $this->load->view('user_dashboard/profile_update_portal.php'); ?>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>