<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    .dashboard-wrapper-light {
        /* background-color: #0B0F19; */
        background-color: #f8fafc;
        color: #0f172a;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        /* background-image: url('https://static.vecteezy.com/system/resources/thumbnails/077/545/486/small/dark-blue-digital-dot-matrix-burst-background-for-futuristic-technology-themes-perfect-for-ai-platforms-cybersecurity-websites-software-dashboards-gaming-interfaces-and-data-driven-visuals-free-vector.jpg'); */
    }

    .dashboard-title-light {
        font-weight: 700;
        letter-spacing: -0.02em;
        /* color: #fff; */
        color: #0f172a;
    }

    .stat-card-light {
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        background: #ffffff;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        margin-bottom: 1.5rem;
    }

    .stat-card-light:hover {
        transform: translateY(-4px);
        border-color: #cbd5e1;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.08), 0 8px 10px -6px rgba(0, 0, 0, 0.04);
    }

    .stat-card-light .card-body-custom {
        padding: 1.5rem;
        position: relative;
        z-index: 2;
    }

    .stat-card-light .stat-value {
        font-size: 1.5rem;
        font-weight: 800;
        line-height: 1.3;
        color: white;
        margin-bottom: 0.25rem;
    }

    .stat-card-light .stat-label {
        font-size: 0.875rem;
        font-weight: 500;
        color: white;
        /* color: #64748b; */
        margin: 0;
    }

    .stat-card-light .stat-icon {
        position: absolute;
        right: 1.25rem;
        top: 1.25rem;
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        font-weight: 700;
        transition: transform 0.3s ease;
        background: #e0f2fe;
        color: #0284c7;
        border: 1px solid #bae6fd;
    }

    .stat-card-light:hover .stat-icon {
        transform: scale(1.1) rotate(-4deg);
    }

    .delete-btn-top {
        position: absolute;
        top: 0.75rem;
        right: 0.75rem;
        z-index: 3;
        opacity: 0.7;
        transition: opacity 0.2s ease;
    }

    .stat-card-light:hover .delete-btn-top {
        opacity: 1;
    }

    .stat-card-footer-light {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.75rem 1.5rem;
        background: #DE840A;
        border-top: 1px solid #f1f5f9;
        color: #fff;
        /* color: #0284c7; */
        font-size: 0.875rem;
        font-weight: 600;
        text-decoration: none !important;
        transition: background 0.2s ease, color 0.2s ease;
    }



    .stat-card-footer-light:hover {
        background: #334155;
        color: #ffffff;
    }

    .stat-card-footer-light i {
        transition: transform 0.2s ease;
    }

    .stat-card-footer-light:hover i {
        transform: translateX(4px);
    }

    .card {
        background: linear-gradient(135deg, #667eea, #764ba2);
        /* background: linear-gradient(135deg, #131213, #aeb0b6); */
    }

    .add_btn {
        /* background: linear-gradient(135deg, #131213, #aeb0b6); */
        background: linear-gradient(135deg, #667eea, #764ba2);
        font-weight: bolder !important;
    }

    /* .content-header{
         background: linear-gradient(135deg, #131213, #aeb0b6);
         padding-top: 20px;
    } */
</style>

<div class="content-wrapper dashboard-wrapper-light py-4">
    <div class="content-header mb-4">
        <div class="container-fluid">
            <div
                class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center pb-3 border-bottom gap-3 px-2">
                <div>
                    <h1 class="m-0 dashboard-title-light h4 d-flex align-items-center gap-2">
                        <i class="bi bi-grid-3x3-gap-fill text-primary"></i>
                        Transactions
                    </h1>
                    <p class="text-muted small mb-0">
                        Organize, manage, and filter Transactions.
                    </p>
                </div>
                <div>
                    <!-- <button type="button" class="btn btn-primary btn-sm rounded-3 px-3 fw-medium add_btn"
                        data-bs-toggle="modal" data-bs-target="#createCategoryModal">
                        <i class="bi bi-plus-lg me-1"></i> Add Project +
                    </button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row ">

              

                        <div class="col-lg-4 col-md-6 col-12 ">
                            <div class="stat-card-light card">
                              

                                <div class="card-body-custom">
                                    <div class="stat-icon">
                                        D
                                    </div>
                                    <div class="stat-value text-truncate pe-4"
                                        title="">
                                       Deposite
                                    </div>
                                   
                                </div>

                                <a href="<?= base_url('transactions_table/' .'Deposit'); ?>"
                                    class="stat-card-footer-light">
                                    <span>View Deposites</span>
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>  
                        <div class="col-lg-4 col-md-6 col-12 ">
                            <div class="stat-card-light card">
                             

                                <div class="card-body-custom">
                                    <div class="stat-icon">
                                        E
                                    </div>
                                    <div class="stat-value text-truncate pe-4"
                                        title="">
                                       Expenses
                                    </div>
                                
                                </div>

                                <a href="<?= base_url('transactions_table/' .'Expense'); ?>"
                                    class="stat-card-footer-light">
                                    <span>View Expenses</span>
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>  
                        <div class="col-lg-4 col-md-6 col-12 ">
                            <div class="stat-card-light card">
                             

                                <div class="card-body-custom">
                                    <div class="stat-icon">
                                        A
                                    </div>
                                    <div class="stat-value text-truncate pe-4"
                                        title="">
                                       ALL Transactions
                                    </div>
                                
                                </div>

                                <a href="<?= base_url('transactions_table/' .'Transactions'); ?>"
                                    class="stat-card-footer-light">
                                    <span>View Transactions</span>
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>  



                    <!-- Empty State -->
                    <!-- <div class="col-12 py-5">
                        <div class="text-center p-5 bg-white rounded-4 border border-dashed shadow-sm">
                            <div class="bg-light rounded-circle shadow-sm d-inline-flex p-3 mb-3">
                                <i class="bi bi-folder-x text-muted fs-1"></i>
                            </div>
                            <h5 class="fw-bold text-dark mb-1">No Categories Found</h5>
                            <p class="text-muted small mb-3">There are currently no active project categories to display.
                            </p>
                            <button type="button" class="btn btn-sm btn-primary px-3 rounded-3" data-bs-toggle="modal"
                                data-bs-target="#createCategoryModal">
                                <i class="bi bi-plus-lg me-1"></i> Create First Category
                            </button>
                        </div>
                    </div>
 -->

            </div>
        </div>
    </section>
</div>

<?php $this->load->view('admin/properties/category_form.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>