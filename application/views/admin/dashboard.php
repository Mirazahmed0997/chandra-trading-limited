<!-- Google Font & Chart.js Library Injection -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Custom Inline Styles for Modern Dark Theme UI -->
<style>
    .dashboard-wrapper-dark {
        background-color: #0b0f19;
        color: #f1f5f9;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        min-height: 100vh;
    }
    
    .dashboard-header-dark {
        padding: 1.5rem 0 1rem;
    }
    
    .dashboard-title-dark {
        font-weight: 700;
        letter-spacing: -0.02em;
        color: #f8fafc;
    }

    .stat-card-dark {
        border: 1px solid #1e293b;
        border-radius: 16px;
        background: #111827;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.5);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        margin-bottom: 1.5rem;
    }

    .stat-card-dark:hover {
        transform: translateY(-5px);
        border-color: #334155;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.7);
    }

    .stat-card-dark .card-body-custom {
        padding: 1.5rem;
        position: relative;
        z-index: 2;
    }

    .stat-card-dark .stat-value {
        font-size: 2.25rem;
        font-weight: 800;
        line-height: 1.2;
        color: #ffffff;
        margin-bottom: 0.25rem;
    }

    .stat-card-dark .stat-label {
        font-size: 0.95rem;
        font-weight: 500;
        color: #94a3b8;
        margin: 0;
    }

    .stat-card-dark .stat-icon {
        position: absolute;
        right: 1.25rem;
        top: 1.25rem;
        width: 52px;
        height: 52px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        transition: transform 0.3s ease;
    }

    .stat-card-dark:hover .stat-icon {
        transform: scale(1.1) rotate(-4deg);
    }

    /* Dark Theme Neon Accent Variants */
    .card-theme-blue .stat-icon { background: rgba(14, 165, 233, 0.15); color: #38bdf8; border: 1px solid rgba(56, 189, 248, 0.2); }
    .card-theme-red .stat-icon { background: rgba(239, 68, 68, 0.15); color: #f87171; border: 1px solid rgba(248, 113, 113, 0.2); }
    .card-theme-emerald .stat-icon { background: rgba(16, 185, 129, 0.15); color: #34d399; border: 1px solid rgba(52, 211, 153, 0.2); }
    .card-theme-indigo .stat-icon { background: rgba(99, 102, 241, 0.15); color: #818cf8; border: 1px solid rgba(129, 140, 248, 0.2); }
    .card-theme-amber .stat-icon { background: rgba(245, 158, 11, 0.15); color: #fbbf24; border: 1px solid rgba(251, 191, 36, 0.2); }
    .card-theme-purple .stat-icon { background: rgba(168, 85, 247, 0.15); color: #c084fc; border: 1px solid rgba(192, 132, 252, 0.2); }

    .stat-card-footer-dark {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.75rem 1.5rem;
        background: #1e293b;
        border-top: 1px solid #334155;
        color: #cbd5e1;
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

    /* Section Cards for Charts and Tables */
    .dashboard-panel-dark {
        border: 1px solid #1e293b;
        border-radius: 16px;
        background: #111827;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.5);
        margin-bottom: 1.5rem;
        overflow: hidden;
    }

    .panel-header-dark {
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid #1e293b;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .panel-title-dark {
        font-size: 1.1rem;
        font-weight: 700;
        color: #f8fafc;
        margin: 0;
    }

    .panel-body-dark {
        padding: 1.5rem;
    }

    .chart-container {
        position: relative;
        width: 100%;
        height: 320px;
    }

    /* Custom Dark Table Styles */
    .table-dark-custom {
        width: 100%;
        color: #cbd5e1;
        border-collapse: collapse;
        margin: 0;
    }

    .table-dark-custom th {
        background: #1e293b;
        color: #94a3b8;
        font-weight: 600;
        font-size: 0.875rem;
        padding: 0.875rem 1rem;
        text-align: left;
        border-bottom: 1px solid #334155;
    }

    .table-dark-custom td {
        padding: 0.875rem 1rem;
        border-bottom: 1px solid #1e293b;
        font-size: 0.9rem;
    }

    .table-dark-custom tbody tr:hover {
        background: rgba(30, 41, 59, 0.5);
    }

    .badge-status-dark {
        padding: 0.35em 0.75em;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .badge-active { background: rgba(16, 185, 129, 0.15); color: #34d399; border: 1px solid rgba(52, 211, 153, 0.2); }
    .badge-pending { background: rgba(245, 158, 11, 0.15); color: #fbbf24; border: 1px solid rgba(251, 191, 36, 0.2); }
    .badge-alert { background: rgba(239, 68, 68, 0.15); color: #f87171; border: 1px solid rgba(248, 113, 113, 0.2); }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper dashboard-wrapper-dark">
    <!-- Content Header -->
    <div class="content-header dashboard-header-dark">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-6">
                    <h1 class="m-0 dashboard-title-dark">Housing Management Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right bg-transparent p-0 m-0">
                        <li class="breadcrumb-item"><a href="#" class="text-secondary">Home</a></li>
                        <li class="breadcrumb-item active text-light font-weight-bold">Housing Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Stat Box Row -->
            <div class="row">

                <!-- Card 1: Total Plots Count -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="stat-card-dark card-theme-blue">
                        <div class="card-body-custom">
                            <div class="stat-icon">
                                <i class="fas fa-th-large"></i>
                            </div>
                            <div class="stat-value">
                                <?= !empty($total_plots) ? $total_plots : 0; ?>
                            </div>
                            <p class="stat-label">Total Plots/Flats Count</p>
                        </div>
                        <a href="<?php echo base_url(); ?>Housing/plots_list" class="stat-card-footer-dark">
                            <span>View Details</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 2: Allocated Plots -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="stat-card-dark card-theme-emerald">
                        <div class="card-body-custom">
                            <div class="stat-icon">
                                <i class="fas fa-file-contract"></i>
                            </div>
                            <div class="stat-value">
                                <?= !empty($allocated_plots) ? $allocated_plots : 0; ?>
                            </div>
                            <p class="stat-label">Allocated Plots</p>
                        </div>
                        <a href="<?php echo base_url(); ?>Housing/allocated_list" class="stat-card-footer-dark">
                            <span>View Details</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 3: Unallocated/Vacant Plots -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="stat-card-dark card-theme-purple">
                        <div class="card-body-custom">
                            <div class="stat-icon">
                                <i class="fas fa-home"></i>
                            </div>
                            <div class="stat-value">
                                <?= !empty($available_plots) ? $available_plots : 0; ?>
                            </div>
                            <p class="stat-label">Vacant/Unallocated Plots</p>
                        </div>
                        <a href="<?php echo base_url(); ?>Housing/available_list" class="stat-card-footer-dark">
                            <span>View Details</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 4: Registered Plot Members -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="stat-card-dark card-theme-indigo">
                        <div class="card-body-custom">
                            <div class="stat-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-value">
                                <?= !empty($member_count) ? $member_count : 0; ?>
                            </div>
                            <p class="stat-label">Registered Owners/Members</p>
                        </div>
                        <a href="<?php echo base_url(); ?>Applicant/members_list" class="stat-card-footer-dark">
                            <span>View Details</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 5: Overdue Installment Count -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="stat-card-dark card-theme-amber">
                        <div class="card-body-custom">
                            <div class="stat-icon">
                                <i class="fas fa-file-invoice-dollar"></i>
                            </div>
                            <div class="stat-value">
                                <?= !empty($pending_installments) ? $pending_installments : 0; ?>
                            </div>
                            <p class="stat-label">Pending Installments</p>
                        </div>
                        <a href="<?php echo base_url(); ?>Housing/due_installments" class="stat-card-footer-dark">
                            <span>View Details</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 6: Defaulters/Cancelled Allocations -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="stat-card-dark card-theme-red">
                        <div class="card-body-custom">
                            <div class="stat-icon">
                                <i class="fas fa-user-slash"></i>
                            </div>
                            <div class="stat-value">
                                <?= !empty($defaulter_count) ? $defaulter_count : 0; ?>
                            </div>
                            <p class="stat-label">Defaulted Allocations</p>
                        </div>
                        <a href="<?php echo base_url(); ?>Housing/defaulters_list" class="stat-card-footer-dark">
                            <span>View Details</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Graphs and Analytics Section -->
            <div class="row">
                <!-- Line Chart: Plot Booking & Collection Trends -->
                <div class="col-lg-8 col-12">
                    <div class="dashboard-panel-dark">
                        <div class="panel-header-dark">
                            <h3 class="panel-title-dark"><i class="fas fa-chart-line mr-2 text-primary"></i>Plot Booking & Collection Statistics</h3>
                            <span class="text-muted text-sm">Monthly Trend</span>
                        </div>
                        <div class="panel-body-dark">
                            <div class="chart-container">
                                <canvas id="growthTrendChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Doughnut Chart: Housing Status Breakdown -->
                <div class="col-lg-4 col-12">
                    <div class="dashboard-panel-dark">
                        <div class="panel-header-dark">
                            <h3 class="panel-title-dark"><i class="fas fa-chart-pie mr-2 text-success"></i>Plot Status Breakdown</h3>
                            <span class="text-muted text-sm">Overall Status</span>
                        </div>
                        <div class="panel-body-dark">
                            <div class="chart-container">
                                <canvas id="memberRatioChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Summary Data Table -->
            <!-- <div class="row">
                <div class="col-12">
                    <div class="dashboard-panel-dark">
                        <div class="panel-header-dark">
                            <h3 class="panel-title-dark"><i class="fas fa-list-alt mr-2 text-info"></i>Recent Housing Activity Summary</h3>
                            <a href="<?php echo base_url(); ?>Housing/summary_report" class="btn btn-sm btn-outline-light">View All</a>
                        </div>
                        <div class="panel-body-dark p-0">
                            <div class="table-responsive">
                                <table class="table-dark-custom">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Current Count</th>
                                            <th>Status</th>
                                            <th>Last Updated</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Allocated Plot Owners</td>
                                            <td><?= !empty($allocated_plots) ? $allocated_plots : 0; ?></td>
                                            <td><span class="badge-status-dark badge-active">Active</span></td>
                                            <td>Today, 12:30 PM</td>
                                        </tr>
                                        <tr>
                                            <td>Pending Installment Payers</td>
                                            <td><?= !empty($pending_installments) ? $pending_installments : 0; ?></td>
                                            <td><span class="badge-status-dark badge-pending">Pending</span></td>
                                            <td>Yesterday</td>
                                        </tr>
                                        <tr>
                                            <td>Defaulted Applicants</td>
                                            <td><?= !empty($defaulter_count) ? $defaulter_count : 0; ?></td>
                                            <td><span class="badge-status-dark badge-alert">Warning</span></td>
                                            <td>3 days ago</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

        </div>
    </section>
</div>

<!-- Chart Initialization Script -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Line Chart: Booking & Collection Trend
        const ctxTrend = document.getElementById('growthTrendChart').getContext('2d');
        new Chart(ctxTrend, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [
                    {
                        label: 'New Plot Bookings',
                        data: [12, 19, 15, 25, 22, 30],
                        borderColor: '#38bdf8',
                        backgroundColor: 'rgba(56, 189, 248, 0.1)',
                        fill: true,
                        tension: 0.4,
                        borderWidth: 2
                    },
                    {
                        label: 'Installments Collected (Plots)',
                        data: [8, 11, 13, 18, 16, 24],
                        borderColor: '#818cf8',
                        backgroundColor: 'rgba(129, 140, 248, 0.1)',
                        fill: true,
                        tension: 0.4,
                        borderWidth: 2
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: { color: '#94a3b8', font: { family: 'Inter' } }
                    }
                },
                scales: {
                    x: {
                        grid: { color: '#1e293b' },
                        ticks: { color: '#94a3b8', font: { family: 'Inter' } }
                    },
                    y: {
                        grid: { color: '#1e293b' },
                        ticks: { color: '#94a3b8', font: { family: 'Inter' } }
                    }
                }
            }
        });

        // Doughnut Chart: Housing Status Ratio
        const ctxRatio = document.getElementById('memberRatioChart').getContext('2d');
        new Chart(ctxRatio, {
            type: 'doughnut',
            data: {
                labels: ['Allocated Plots', 'Vacant Plots', 'Pending Installments', 'Defaulted/Cancelled'],
                datasets: [{
                    data: [50, 25, 15, 10],
                    backgroundColor: [
                        '#34d399',
                        '#c084fc',
                        '#fbbf24',
                        '#f87171'
                    ],
                    borderWidth: 2,
                    borderColor: '#111827'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { color: '#94a3b8', font: { family: 'Inter' }, padding: 15 }
                    }
                },
                cutout: '70%'
            }
        });
    });
</script>