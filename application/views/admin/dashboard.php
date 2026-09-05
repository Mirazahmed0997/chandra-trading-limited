<!-- Google Font & Chart.js Library Injection -->
<link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Custom Inline Styles for Modern Dark Theme UI -->
<style>
    .dashboard-wrapper-dark {
        background-color: #0b0f19;
        color: #f1f5f9;
        font-family: 'Hind Siliguri', 'Noto Sans Bengali', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
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
                    <h1 class="m-0 dashboard-title-dark">হাউজিং ম্যানেজমেন্ট ড্যাশবোর্ড</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right bg-transparent p-0 m-0">
                        <li class="breadcrumb-item"><a href="#" class="text-secondary">হোম</a></li>
                        <li class="breadcrumb-item active text-light font-weight-bold">হাউজিং ড্যাশবোর্ড</li>
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

                <!-- Card 1: মোট প্লট সংখ্যা -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="stat-card-dark card-theme-blue">
                        <div class="card-body-custom">
                            <div class="stat-icon">
                                <i class="fas fa-th-large"></i>
                            </div>
                            <div class="stat-value">
                                <?= !empty($total_plots) ? $total_plots : 0; ?>
                            </div>
                            <p class="stat-label">মোট প্লট/ফ্ল্যাট সংখ্যা</p>
                        </div>
                        <a href="<?php echo base_url(); ?>Housing/plots_list" class="stat-card-footer-dark">
                            <span>বিস্তারিত দেখুন</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 2: বরাদ্দকৃত প্লট -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="stat-card-dark card-theme-emerald">
                        <div class="card-body-custom">
                            <div class="stat-icon">
                                <i class="fas fa-file-contract"></i>
                            </div>
                            <div class="stat-value">
                                <?= !empty($allocated_plots) ? $allocated_plots : 0; ?>
                            </div>
                            <p class="stat-label">বরাদ্দকৃত প্লট</p>
                        </div>
                        <a href="<?php echo base_url(); ?>Housing/allocated_list" class="stat-card-footer-dark">
                            <span>বিস্তারিত দেখুন</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 3: অবরাদ্দকৃত/খালি প্লট -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="stat-card-dark card-theme-purple">
                        <div class="card-body-custom">
                            <div class="stat-icon">
                                <i class="fas fa-home"></i>
                            </div>
                            <div class="stat-value">
                                <?= !empty($available_plots) ? $available_plots : 0; ?>
                            </div>
                            <p class="stat-label">খালি/অবরাদ্দকৃত প্লট</p>
                        </div>
                        <a href="<?php echo base_url(); ?>Housing/available_list" class="stat-card-footer-dark">
                            <span>বিস্তারিত দেখুন</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 4: প্লট রেজিস্টার্ড সদস্য -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="stat-card-dark card-theme-indigo">
                        <div class="card-body-custom">
                            <div class="stat-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-value">
                                <?= !empty($member_count) ? $member_count : 0; ?>
                            </div>
                            <p class="stat-label">নিবন্ধিত প্লট মালিক/সদস্য</p>
                        </div>
                        <a href="<?php echo base_url(); ?>Applicant/members_list" class="stat-card-footer-dark">
                            <span>বিস্তারিত দেখুন</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 5: বকেয়া কিস্তি সংখ্যা -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="stat-card-dark card-theme-amber">
                        <div class="card-body-custom">
                            <div class="stat-icon">
                                <i class="fas fa-file-invoice-dollar"></i>
                            </div>
                            <div class="stat-value">
                                <?= !empty($pending_installments) ? $pending_installments : 0; ?>
                            </div>
                            <p class="stat-label">বকেয়া কিস্তি সংখ্যা</p>
                        </div>
                        <a href="<?php echo base_url(); ?>Housing/due_installments" class="stat-card-footer-dark">
                            <span>বিস্তারিত দেখুন</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 6: খেলাপি/বাতিলকৃত বরাদ্দ -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="stat-card-dark card-theme-red">
                        <div class="card-body-custom">
                            <div class="stat-icon">
                                <i class="fas fa-user-slash"></i>
                            </div>
                            <div class="stat-value">
                                <?= !empty($defaulter_count) ? $defaulter_count : 0; ?>
                            </div>
                            <p class="stat-label">খেলাপি বরাদ্দ সংখ্যা</p>
                        </div>
                        <a href="<?php echo base_url(); ?>Housing/defaulters_list" class="stat-card-footer-dark">
                            <span>বিস্তারিত দেখুন</span>
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
                            <h3 class="panel-title-dark"><i class="fas fa-chart-line mr-2 text-primary"></i>প্লট বুকিং ও কিস্তি আদায় পরিসংখ্যান</h3>
                            <span class="text-muted text-sm">মাসিক চিত্র</span>
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
                            <h3 class="panel-title-dark"><i class="fas fa-chart-pie mr-2 text-success"></i>প্লট অবস্থার অনুপাত</h3>
                            <span class="text-muted text-sm">সামগ্রিক চিত্র</span>
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
                            <h3 class="panel-title-dark"><i class="fas fa-list-alt mr-2 text-info"></i>সাম্প্রতিক হাউজিং কার্যক্রমের সামারি</h3>
                            <a href="<?php echo base_url(); ?>Housing/summary_report" class="btn btn-sm btn-outline-light">সবগুলো দেখুন</a>
                        </div>
                        <div class="panel-body-dark p-0">
                            <div class="table-responsive">
                                <table class="table-dark-custom">
                                    <thead>
                                        <tr>
                                            <th>ক্যাটাগরি</th>
                                            <th>বর্তমান সংখ্যা</th>
                                            <th>অবস্থা</th>
                                            <th>সর্বশেষ আপডেট</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>বরাদ্দকৃত প্লট মালিক</td>
                                            <td><?= !empty($allocated_plots) ? $allocated_plots : 0; ?></td>
                                            <td><span class="badge-status-dark badge-active">সক্রিয়</span></td>
                                            <td>আজ, ১২:৩০ PM</td>
                                        </tr>
                                        <tr>
                                            <td>বকেয়া কিস্তি প্রদানকারী</td>
                                            <td><?= !empty($pending_installments) ? $pending_installments : 0; ?></td>
                                            <td><span class="badge-status-dark badge-pending">প্রক্রিয়াধীন</span></td>
                                            <td>গতকাল</td>
                                        </tr>
                                        <tr>
                                            <td>খেলাপি আবেদনকারী</td>
                                            <td><?= !empty($defaulter_count) ? $defaulter_count : 0; ?></td>
                                            <td><span class="badge-status-dark badge-alert">সতর্কতা</span></td>
                                            <td>৩ দিন আগে</td>
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
        // Line Chart: Booking & Collection Trend
        const ctxTrend = document.getElementById('growthTrendChart').getContext('2d');
        new Chart(ctxTrend, {
            type: 'line',
            data: {
                labels: ['জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন'],
                datasets: [
                    {
                        label: 'নতুন প্লট বুকিং',
                        data: [12, 19, 15, 25, 22, 30],
                        borderColor: '#38bdf8',
                        backgroundColor: 'rgba(56, 189, 248, 0.1)',
                        fill: true,
                        tension: 0.4,
                        borderWidth: 2
                    },
                    {
                        label: 'কিস্তি আদায়কৃত (প্লট)',
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
                        labels: { color: '#94a3b8', font: { family: 'Hind Siliguri' } }
                    }
                },
                scales: {
                    x: {
                        grid: { color: '#1e293b' },
                        ticks: { color: '#94a3b8', font: { family: 'Hind Siliguri' } }
                    },
                    y: {
                        grid: { color: '#1e293b' },
                        ticks: { color: '#94a3b8', font: { family: 'Hind Siliguri' } }
                    }
                }
            }
        });

        // Doughnut Chart: Housing Status Ratio
        const ctxRatio = document.getElementById('memberRatioChart').getContext('2d');
        new Chart(ctxRatio, {
            type: 'doughnut',
            data: {
                labels: ['বরাদ্দকৃত প্লট', 'খালি প্লট', 'বকেয়া কিস্তি', 'খেলাপি/বাতিল'],
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
                        labels: { color: '#94a3b8', font: { family: 'Hind Siliguri' }, padding: 15 }
                    }
                },
                cutout: '70%'
            }
        });
    });
</script>