<?php
$loggedUser = $this->session->userdata('login_user_info_all');
$menu_access = $this->db
    ->select('menu_key')
    ->where('user_id', $user->id)
    ->get('user_menu_access')
    ->result_array();

$assigned_menus = array_column($menu_access, 'menu_key');

$available_menus = [
    'Properties', 'Projects', 'Leads', 'Site Visits', 
    'Customers', 'Landowner Enquiries', 'Investment Enquiries', 
    'News', 'Gallery', 'Team', 'Testimonials', 'Documents', 'User Management'
];
?>

<div class="content-wrapper bg-light py-4">
    <div class="content-header">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center mb-4 max-w-768 mx-auto">
                <div>
                    <h3 class="fw-bold text-dark mb-1">User Profile</h3>
                    <p class="text-muted small mb-0">View user details and manage module access permissions.</p>
                </div>
                <a href="<?= base_url('Admin/users_list') ?>" class="btn btn-outline-secondary btn-sm rounded-pill px-3 shadow-sm">
                    <i class="fas fa-arrow-left me-1"></i> Back to List
                </a>
            </div>

            <div class="row">
                <div class="col-lg-7 col-md-9 mx-auto">

                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                        
                        <div class="card-header bg-primary text-white p-4 border-0 position-relative">
                            <div class="d-flex align-items-center gap-3">
                                <div class="avatar-circle bg-white text-primary rounded-circle d-flex align-items-center justify-content-center fw-bold fs-4 shadow-sm" style="width: 46px; height: 46px;">
                                    <?= strtoupper(substr($user->username ?? 'U', 0, 1)) ?>
                                </div>
                                <div>
                                    <h4 class="mb-0 text-white fw-bold"><?= $user->first_name . ' ' . $user->last_name ?></h4>
                                    <span class="text-white-50 small">@<?= $user->username ?></span>
                                </div>
                                <div class="ms-auto">
                                    <?php if ($user->role == 'admin'): ?>
                                        <span class="badge bg-danger rounded-pill px-3 py-2 shadow-sm">Admin</span>
                                    <?php elseif ($user->role == 'super_admin'): ?>
                                        <span class="badge bg-warning text-dark rounded-pill px-3 py-2 shadow-sm">Super Admin</span>
                                    <?php else: ?>
                                        <span class="badge bg-info text-white rounded-pill px-3 py-2 shadow-sm">User</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Card Body: User Details -->
                        <div class="card-body p-4">
                            <h6 class="text-uppercase text-muted fw-bold mb-3 small tracking-wider">ব্যক্তিগত তথ্য (Personal Info)</h6>
                            
                            <div class="row g-3 mb-4">
                                <div class="col-sm-6">
                                    <div class="p-3 rounded-3 bg-light border-0">
                                        <span class="d-block text-muted small mb-1">ইউজার নাম (Username)</span>
                                        <span class="fw-semibold text-dark"><?= $user->username ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="p-3 rounded-3 bg-light border-0">
                                        <span class="d-block text-muted small mb-1">পদবি (Designation)</span>
                                        <span class="fw-semibold text-dark"><?= $user->designation ?: 'N/A' ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="p-3 rounded-3 bg-light border-0">
                                        <span class="d-block text-muted small mb-1">ফার্স্ট নাম (First Name)</span>
                                        <span class="fw-semibold text-dark"><?= $user->first_name ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="p-3 rounded-3 bg-light border-0">
                                        <span class="d-block text-muted small mb-1">লাস্ট নাম (Last Name)</span>
                                        <span class="fw-semibold text-dark"><?= $user->last_name ?></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="p-3 rounded-3 bg-light border-0">
                                        <span class="d-block text-muted small mb-1">যোগাযোগ (Mobile Number)</span>
                                        <span class="fw-semibold text-success"><?= $user->mobile_number ?: 'N/A' ?></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Access Section -->
                            <?php if ($loggedUser->role == 'super_admin'): ?>
                                <hr class="my-4 text-muted opacity-25">

                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6 class="text-uppercase text-muted fw-bold mb-0 small tracking-wider">
                                        মেনু অ্যাক্সেস কন্ট্রোল (Menu Permissions)
                                    </h6>
                                    <span class="badge bg-light text-muted border">Super Admin Only</span>
                                </div>

                                <form action="<?= base_url('menu_access/' . $user->id); ?>" method="post">
                                    <div class="row g-2 mb-4">
                                        <?php foreach ($available_menus as $index => $menu): ?>
                                            <?php $menu_id = 'menu_check_' . $index; ?>
                                            <div class="col-sm-6">
                                                <div class="form-check custom-checkbox-card p-3 rounded-3 border h-100 d-flex align-items-center">
                                                    <input class="form-check-input ms-0 me-3" 
                                                           type="checkbox" 
                                                           id="<?= $menu_id ?>" 
                                                           name="menus[]"
                                                           value="<?= $menu ?>" 
                                                           <?= in_array($menu, $assigned_menus) ? 'checked' : ''; ?>>
                                                    <label class="form-check-label fw-medium text-dark w-100 cursor-pointer mb-0" for="<?= $menu_id ?>">
                                                        <?= $menu ?>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 py-2.5 rounded-3 fw-semibold shadow-sm">
                                        Save Access Permissions
                                    </button>
                                </form>
                            <?php endif; ?>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<style>
    .tracking-wider { letter-spacing: 0.05em; }
    .cursor-pointer { cursor: pointer; }
    .custom-checkbox-card {
        transition: all 0.2s ease-in-out;
        background-color: #fff;
    }
    .custom-checkbox-card:hover {
        border-color: #0d6efd !important;
        background-color: #f8f9fa;
    }
    .custom-checkbox-card .form-check-input:checked + .form-check-label {
        color: #0d6efd !important;
        font-weight: 600;
    }
</style>