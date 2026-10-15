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
    .card-theme-blue { .stat-icon { background: rgba(14, 165, 233, 0.15); color: #38bdf8; border: 1px solid rgba(56, 189, 248, 0.2); } }
    .card-theme-red { .stat-icon { background: rgba(239, 68, 68, 0.15); color: #f87171; border: 1px solid rgba(248, 113, 113, 0.2); } }
    .card-theme-emerald { .stat-icon { background: rgba(16, 185, 129, 0.15); color: #34d399; border: 1px solid rgba(52, 211, 153, 0.2); } }
    .card-theme-indigo { .stat-icon { background: rgba(99, 102, 241, 0.15); color: #818cf8; border: 1px solid rgba(129, 140, 248, 0.2); } }
    .card-theme-amber { .stat-icon { background: rgba(245, 158, 11, 0.15); color: #fbbf24; border: 1px solid rgba(251, 191, 36, 0.2); } }
    .card-theme-purple { .stat-icon { background: rgba(168, 85, 247, 0.15); color: #c084fc; border: 1px solid rgba(192, 132, 252, 0.2); } }

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
                    <h1 class="m-0 dashboard-title-dark">User Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right bg-transparent p-0 m-0">
                        <li class="breadcrumb-item"><a href="#" class="text-secondary">Home</a></li>
                        <li class="breadcrumb-item active text-light font-weight-bold">My Portal</li>
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

                <!-- Card 1: My Properties/Flats -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="stat-card-dark card-theme-blue">
                        <div class="card-body-custom">
                            <div class="stat-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="stat-value">
                                <?= !empty($my_properties_count) ? $my_properties_count : 1; ?>
                            </div>
                            <p class="stat-label">My Owned Plots/Flats</p>
                        </div>
                        <a href="<?php echo base_url(); ?>User/my_properties" class="stat-card-footer-dark">
                            <span>View Property Details</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 2: Upcoming / Pending Payments -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="stat-card-dark card-theme-amber">
                        <div class="card-body-custom">
                            <div class="stat-icon">
                                <i class="fas fa-wallet"></i>
                            </div>
                            <div class="stat-value">
                                <?= !empty($user_due_amount) ? '$' . number_format($user_due_amount) : '$450'; ?>
                            </div>
                            <p class="stat-label">Pending Dues & Installments</p>
                        </div>
                        <a href="<?php echo base_url(); ?>User/make_payment" class="stat-card-footer-dark">
                            <span>Pay Now</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 3: Total Paid to Date -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="stat-card-dark card-theme-emerald">
                        <div class="card-body-custom">
                            <div class="stat-icon">
                                <i class="fas fa-receipt"></i>
                            </div>
                            <div class="stat-value">
                                <?= !empty($user_total_paid) ? '$' . number_format($user_total_paid) : '$12,400'; ?>
                            </div>
                            <p class="stat-label">Total Amount Paid</p>
                        </div>
                        <a href="<?php echo base_url(); ?>User/payment_history" class="stat-card-footer-dark">
                            <span>Payment Receipts</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 4: Open Support / Maintenance Tickets -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="stat-card-dark card-theme-purple">
                        <div class="card-body-custom">
                            <div class="stat-icon">
                                <i class="fas fa-tools"></i>
                            </div>
                            <div class="stat-value">
                                <?= !empty($open_tickets_count) ? $open_tickets_count : 2; ?>
                            </div>
                            <p class="stat-label">Maintenance Requests</p>
                        </div>
                        <a href="<?php echo base_url(); ?>User/support_tickets" class="stat-card-footer-dark">
                            <span>Track / New Request</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 5: Registered Vehicles -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="stat-card-dark card-theme-indigo">
                        <div class="card-body-custom">
                            <div class="stat-icon">
                                <i class="fas fa-car"></i>
                            </div>
                            <div class="stat-value">
                                <?= !empty($registered_vehicles) ? $registered_vehicles : 2; ?>
                            </div>
                            <p class="stat-label">Registered Vehicles & Passes</p>
                        </div>
                        <a href="<?php echo base_url(); ?>User/parking_passes" class="stat-card-footer-dark">
                            <span>Manage Passes</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 6: Community Announcements -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="stat-card-dark card-theme-red">
                        <div class="card-body-custom">
                            <div class="stat-icon">
                                <i class="fas fa-bullhorn"></i>
                            </div>
                            <div class="stat-value">
                                <?= !empty($unread_notices) ? $unread_notices : 3; ?>
                            </div>
                            <p class="stat-label">New Announcements</p>
                        </div>
                        <a href="<?php echo base_url(); ?>User/notice_board" class="stat-card-footer-dark">
                            <span>View Notice Board</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Graphs and Analytics Section -->
            <div class="row">
                <!-- Line Chart: Personal Payment History Trend -->
                <div class="col-lg-8 col-12">
                    <div class="dashboard-panel-dark">
                        <div class="panel-header-dark">
                            <h3 class="panel-title-dark"><i class="fas fa-chart-line mr-2 text-primary"></i>My Payment & Utility History</h3>
                            <span class="text-muted text-sm">Last 6 Months</span>
                        </div>
                        <div class="panel-body-dark">
                            <div class="chart-container">
                                <canvas id="growthTrendChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Doughnut Chart: Annual Expense Breakdown -->
                <div class="col-lg-4 col-12">
                    <div class="dashboard-panel-dark">
                        <div class="panel-header-dark">
                            <h3 class="panel-title-dark"><i class="fas fa-chart-pie mr-2 text-success"></i>Expense Breakdown</h3>
                            <span class="text-muted text-sm">This Year</span>
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
            <div class="row">
                <div class="col-12">
                    <div class="dashboard-panel-dark">
                        <div class="panel-header-dark">
                            <h3 class="panel-title-dark"><i class="fas fa-history mr-2 text-info"></i>My Recent Transactions & Requests</h3>
                            <a href="<?php echo base_url(); ?>User/activity_log" class="btn btn-sm btn-outline-light">View Full History</a>
                        </div>
                        <div class="panel-body-dark p-0">
                            <div class="table-responsive">
                                <table class="table-dark-custom">
                                    <thead>
                                        <tr>
                                            <th>Transaction / Request ID</th>
                                            <th>Type</th>
                                            <th>Amount / Detail</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#INV-2026-009</td>
                                            <td>Monthly Maintenance Fee</td>
                                            <td>$150.00</td>
                                            <td><span class="badge-status-dark badge-active">Paid</span></td>
                                            <td>Sep 01, 2026</td>
                                        </tr>
                                        <tr>
                                            <td>#REQ-8821</td>
                                            <td>Plumbing Support (Flat B-4)</td>
                                            <td>Pipe Inspection</td>
                                            <td><span class="badge-status-dark badge-pending">In Progress</span></td>
                                            <td>Sep 18, 2026</td>
                                        </tr>
                                        <tr>
                                            <td>#INV-2026-010</td>
                                            <td>Quarterly Water Utility Dues</td>
                                            <td>$300.00</td>
                                            <td><span class="badge-status-dark badge-alert">Due Soon</span></td>
                                            <td>Sep 20, 2026</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<!-- Chart Initialization Script -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Line Chart: User Personal Payment History Trend
        const ctxTrend = document.getElementById('growthTrendChart').getContext('2d');
        new Chart(ctxTrend, {
            type: 'line',
            data: {
                labels: ['April', 'May', 'June', 'July', 'August', 'September'],
                datasets: [
                    {
                        label: 'Installments Paid ($)',
                        data: [400, 400, 400, 400, 400, 400],
                        borderColor: '#38bdf8',
                        backgroundColor: 'rgba(56, 189, 248, 0.1)',
                        fill: true,
                        tension: 0.4,
                        borderWidth: 2
                    },
                    {
                        label: 'Maintenance & Utility Fees ($)',
                        data: [120, 145, 190, 210, 160, 150],
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

        // Doughnut Chart: Expense Breakdown
        const ctxRatio = document.getElementById('memberRatioChart').getContext('2d');
        new Chart(ctxRatio, {
            type: 'doughnut',
            data: {
                labels: ['Plot Installments', 'Maintenance Dues', 'Utilities', 'Parking Fees'],
                datasets: [{
                    data: [65, 15, 12, 8],
                    backgroundColor: [
                        '#34d399',
                        '#38bdf8',
                        '#fbbf24',
                        '#c084fc'
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