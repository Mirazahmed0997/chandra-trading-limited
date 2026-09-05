<link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

<style>
    [class*=sidebar-dark-] {
        background-image: linear-gradient(145deg, #0b1426 0%, #14223e 50%, #1a2d5a 100%);
        box-shadow: 4px 0 24px rgba(0, 0, 0, 0.4);
        border-right: 1px solid rgba(255, 255, 255, 0.04);
    }

    .main-sidebar {
        transition: all 0.2s ease;
        font-family: 'Hind Siliguri', 'Noto Sans Bengali', -apple-system, BlinkMacSystemFont,
            "Segoe UI", Roboto, sans-serif;

    }

    /* brand */
    .brand-link {
        padding: 20px 24px !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        display: flex;
        align-items: center;
        gap: 10px;
        text-decoration: none !important;
        background: transparent !important;
    }

    .brand-link .brand-text {
        font-weight: 600;
        font-size: 20px;
        letter-spacing: -0.3px;
        color: white;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .brand-link .brand-text::before {
        content: "✦ ";
        font-weight: 300;
        color: #60a5fa;
    }

    /* user panel */
    .user-panel {
        padding: 18px 20px 16px 20px !important;
        /* border-bottom: 1px solid rgba(255, 255, 255, 0.05); */
        display: flex;
        align-items: center;
        gap: 14px;
        margin: 0 !important;
    }

    .user-panel .image {
        width: 30%;
        height: 30%;
        border-radius: 100px;
        /* border: 2px solid rgba(255, 255, 255, 0.12); */
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        flex-shrink: 0;
    }

    .user-panel .image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .user-panel .info {
        flex: 1;
    }

    .user-panel .info a {
        color: #f1f5f9;
        font-weight: 600;
        font-size: 15px;
        letter-spacing: -0.2px;
        text-decoration: none;
        display: block;
        line-height: 1.3;
    }

    .user-panel .info a small {
        display: block;
        font-weight: 400;
        font-size: 12px;
        color: #94a3b8;
        margin-top: 2px;
    }

    /* ===== NAVIGATION ===== */
    .nav-sidebar {
        padding: 8px 12px 20px 12px;
        gap: 2px;
    }

    .nav-sidebar .nav-item {
        border-radius: 12px;
        transition: all 0.15s;
    }

    /* main nav links */
    .nav-sidebar .nav-link {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 10px 14px !important;
        border-radius: 12px;
        color: #cbd5e1;
        font-weight: 500;
        font-size: 14px;
        transition: all 0.15s;
        text-decoration: none;
        position: relative;
        background: transparent !important;
        border: none !important;
    }

    .nav-sidebar .nav-link .nav-icon {
        width: 22px;
        font-size: 16px;
        text-align: center;
        color: #64748b;
        transition: color 0.15s;
        margin-right: 0 !important;
    }

    .nav-sidebar .nav-link p {
        flex: 1;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
        color: inherit;
    }

    .nav-sidebar .nav-link p .right {
        margin-left: auto;
        font-size: 12px;
        color: #475569;
        transition: transform 0.25s;
    }

    .nav-sidebar .nav-link:hover {
        background: rgba(255, 255, 255, 0.06) !important;
        color: #f1f5f9;
    }

    .nav-sidebar .nav-link:hover .nav-icon {
        color: #93b4f8;
    }

    /* active state */
    .nav-sidebar .nav-link.active {
        background: rgba(59, 130, 246, 0.18) !important;
        color: white;
        box-shadow: inset 3px 0 0 #3b82f6;
    }

    .nav-sidebar .nav-link.active .nav-icon {
        color: #60a5fa;
    }

    /* treeview open */
    .nav-item.has-treeview.menu-open>.nav-link p .right {
        transform: rotate(90deg);
    }

    /* ===== TREEVIEW SUBMENU ===== */
    .nav-treeview {
        list-style: none;
        padding-left: 12px;
        margin: 4px 0 4px 12px;
        border-left: 1px solid rgba(255, 255, 255, 0.06);
        display: none;
    }

    .menu-open>.nav-treeview {
        display: block;
    }

    .nav-treeview .nav-item {
        border-radius: 10px;
    }

    .nav-treeview .nav-link {
        padding: 7px 12px 7px 16px !important;
        font-size: 13px;
        font-weight: 400;
        color: #b0c4de;
        gap: 12px;
        border-radius: 10px;
        background: transparent !important;
    }

    .nav-treeview .nav-link .nav-icon {
        font-size: 8px;
        width: 16px;
        color: #475569;
    }

    .nav-treeview .nav-link:hover {
        background: rgba(255, 255, 255, 0.04) !important;
        color: white;
    }

    .nav-treeview .nav-link.active {
        background: rgba(59, 130, 246, 0.12) !important;
        color: white;
        box-shadow: none;
    }

    .nav-treeview .nav-link.active .nav-icon {
        color: #60a5fa;
    }

    /* nested sub-sub */
    .nav-treeview .has-treeview>.nav-treeview {
        padding-left: 16px;
        border-left: 1px solid rgba(255, 255, 255, 0.04);
    }

    /* special icon fixes */
    .nav-sidebar .banner-icon,
    .nav-sidebar .achievement-icon {
        margin: 0 !important;
        width: 22px;
        text-align: center;
        font-size: 16px;
        color: #64748b;
    }

    .nav-sidebar .nav-link:hover .banner-icon,
    .nav-sidebar .nav-link:hover .achievement-icon {
        color: #93b4f8;
    }

    /* spacing */
    .nav-sidebar br {
        display: none;
    }

    /* separator line between sections */
    .nav-sidebar .nav-item:has(> br) {
        display: none;
    }

    /* add subtle divider after "Registered User" */
    .nav-sidebar .nav-link[href*="registered_user_list"] {
        margin-top: 6px;
        border-top: 1px solid rgba(255, 255, 255, 0.05);
        padding-top: 14px !important;
        border-radius: 12px 12px 0 0;
    }

    /* small badge / indicator (preserve any existing) */
    .nav-sidebar .nav-link .badge {
        background: rgba(59, 130, 246, 0.2);
        color: #60a5fa;
        font-size: 11px;
        font-weight: 600;
        padding: 1px 10px;
        border-radius: 30px;
        margin-left: auto;
    }

    /* scrollbar */
    .sidebar {
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #2d3f66 transparent;
    }

    .sidebar::-webkit-scrollbar {
        width: 4px;
    }

    .sidebar::-webkit-scrollbar-track {
        background: transparent;
    }

    .sidebar::-webkit-scrollbar-thumb {
        background: #2d3f66;
        border-radius: 20px;
    }

    /* responsive tweaks */
    @media (max-width: 768px) {
        .main-sidebar {
            width: 72px;
            overflow: visible;
        }

        .main-sidebar .brand-text,
        .main-sidebar .user-panel .info,
        .main-sidebar .nav-link p,
        .main-sidebar .nav-link .right,
        .main-sidebar .nav-link .badge {
            display: none;
        }

        .main-sidebar .brand-link {
            justify-content: center;
            padding: 16px 0 !important;
        }

        .main-sidebar .user-panel {
            justify-content: center;
            padding: 12px 0 !important;
        }

        .main-sidebar .nav-link {
            justify-content: center;
            padding: 12px !important;
        }

        .main-sidebar .nav-link .nav-icon {
            font-size: 18px;
            margin: 0 !important;
        }

        .main-sidebar .nav-treeview {
            display: none !important;
        }

        .main-sidebar .has-treeview.menu-open .nav-treeview {
            display: none !important;
        }
    }
</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url('assets/backend/dist/img/user.jpg'); ?>" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin <small>Super Admin</small></a>
            </div>



        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item has-treeview menu-open">
                    <a href="<?php echo base_url('admin_dashboard') ?>"
                        class="nav-link <?= active_nav('dashboard', $main_nav); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <?php if (has_menu_access('হোমপেজ ব্যবস্থাপনা')): ?>
                    <li class="nav-item has-treeview <?= active_open('হোমপেজ ব্যবস্থাপনা', $main_nav); ?>">
                        <a href="#" class="nav-link <?= active_nav('হোমপেজ ব্যবস্থাপনা', $main_nav); ?>">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                হোমপেজ ব্যবস্থাপনা
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('news_list') ?>"
                                    class="nav-link <?= active_nav('news_list', $sub_nav); ?>">
                                    <i class="fas fa-newspaper nav-icon"></i>
                                    <p>সংবাদ</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('slider_list') ?>"
                                    class="nav-link <?= active_nav('applicant_pending_list', $sub_nav); ?>">
                                    <i class="fas fa-newspaper nav-icon"></i>
                                    <p>সংবাদ ছবি</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('notice_list') ?>"
                                    class="nav-link <?= active_nav('applicant_pending_list', $sub_nav); ?>">
                                    <i class="fas fa-newspaper nav-icon"></i>
                                    <p>নোটিশ</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('projects_list') ?>"
                                    class="nav-link <?= active_nav('applicant_pending_list', $sub_nav); ?>">
                                    <i class="fas fa-industry nav-icon"></i>
                                    <p>প্রজেক্টস</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('banner_list') ?>"
                                    class="nav-link <?= active_nav('applicant_pending_list', $sub_nav); ?>">
                                    <i class="fas fa-image banner-icon" style="margin-right: 12px; margin-left: 4px;"></i>
                                    <p>ব্যানার</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('managment_list') ?>"
                                    class="nav-link <?= active_nav('applicant_pending_list', $sub_nav); ?>">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>ব্যবস্থাপক</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('achievements_list') ?>"
                                    class="nav-link <?= active_nav('applicant_pending_list', $sub_nav); ?>">
                                    <i class="fas fa-medal achievement-icon"
                                        style="margin-right: 14px; margin-left: 4px;"></i>
                                    <p>অর্জন</p>
                                </a>
                            </li>

                            <!-- sub menu for gallery -->
                            <li class="nav-item has-treeview <?= ($sub_nav == 'gallery') ? 'menu-open' : ''; ?>">
                                <a href="#" class="nav-link <?= ($sub_nav == 'gallery') ? 'active' : ''; ?>">
                                    <i class="fas fa-newspaper nav-icon"></i>
                                    <p>
                                        গ্যালারি
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('image_gallery_list') ?>"
                                            class="nav-link <?= active_nav('image_gallery_list', $sub_nav); ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>ইমেজ তালিকা</p>
                                        </a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a href="<?= base_url('image_gallery_create') ?>"
                                            class="nav-link <?= active_nav('image_gallery_create', $sub_nav); ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>নতুন গ্যালারি যোগ</p>
                                        </a>
                                    </li> -->
                                </ul>
                            </li>

                            <li class="nav-item has-treeview <?= ($sub_nav == 'gallery') ? 'menu-open' : ''; ?>">
                                <a href="#" class="nav-link <?= ($sub_nav == 'gallery') ? 'active' : ''; ?>">
                                    <i class="fas fa-newspaper nav-icon"></i>
                                    <p>
                                        প্রোডাক্ট ব্যবস্থাপনা
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('category_list') ?>"
                                            class="nav-link <?= active_nav('image_gallery_list', $sub_nav); ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>ক্যাটাগরি</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('product_list') ?>"
                                            class="nav-link <?= active_nav('image_gallery_list', $sub_nav); ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>প্রোডাক্ট</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if (has_menu_access('অর্ডার ব্যবস্থাপনা')): ?>
                    <li class="nav-item has-treeview <?= ($sub_nav == 'gallery') ? 'menu-open' : ''; ?>">
                        <a href="#" class="nav-link <?= ($sub_nav == 'gallery') ? 'active' : ''; ?>">
                            <i class="fas fa-newspaper nav-icon"></i>
                            <p>
                                অর্ডার ব্যবস্থাপনা
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('admin_orders_table') ?>"
                                    class="nav-link <?= active_nav('image_gallery_list', $sub_nav); ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>অর্ডার তালিকা</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <br>

                <a href="<?php echo base_url('Admin/registered_user_list') ?>"
                    class="nav-link <?= active_nav('user_list', $main_nav); ?>">
                    <i class="nav-icon fas fa-list"></i>
                    <p>রেজিস্টার্ড ইউজার তালিকা</p>
                </a>

                <?php if (has_menu_access('সদস্য ব্যবস্থাপনা')): ?>
                    <li class="nav-item has-treeview <?= active_open('applicant', $main_nav); ?>">
                        <a href="#" class="nav-link <?= active_nav('applicant', $main_nav); ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                সদস্য ব্যবস্থাপনা
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('admin/members_list/members_list') ?>"
                                    class="nav-link <?= active_nav('applicant_pending_list', $sub_nav); ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>সদস্য তালিকা</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('permisssions') ?>"
                                    class="nav-link <?= active_nav('Applicant/members_list/members_list', $sub_nav); ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Permission</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('table') ?>"
                                    class="nav-link <?= active_nav('Applicant/members_list/members_list', $sub_nav); ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Table</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('table2') ?>"
                                    class="nav-link <?= active_nav('Applicant/members_list/members_list', $sub_nav); ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Table2</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('investment_report') ?>"
                                    class="nav-link <?= active_nav('Applicant/members_list/members_list', $sub_nav); ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Investment report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('due_list_details') ?>"
                                    class="nav-link <?= active_nav('Applicant/members_list/members_list', $sub_nav); ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Due list report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('due_list_details1') ?>"
                                    class="nav-link <?= active_nav('Applicant/members_list/members_list', $sub_nav); ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Due list report-2</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('daily_installment') ?>"
                                    class="nav-link <?= active_nav('Applicant/members_list/members_list', $sub_nav); ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Daily Installment</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('c_47') ?>"
                                    class="nav-link <?= active_nav('Applicant/members_list/members_list', $sub_nav); ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>c_47</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('calculator') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Calculator</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('id_card1') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>id_card1</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('id_card2') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>id_card2</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('id_card3') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>id_card3</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('id_card4') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>id_card4</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('id_card2_both') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>id_card2_both</p>
                                </a>
                            </li>

                            
                        </ul>
                    </li>

                <?php endif; ?>

                <?php if (has_menu_access('ইউজার ব্যবস্থাপনা')): ?>
                    <li class="nav-item has-treeview <?= active_open('applicant', $main_nav); ?>">
                        <a href="#" class="nav-link <?= active_nav('applicant', $main_nav); ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                ইউজার ব্যবস্থাপনা
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('admin/users_list/users_list') ?>"
                                    class="nav-link <?= active_nav('applicant_pending_list', $sub_nav); ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ইউজার</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

            </ul>
        </nav>
    </div>
</aside>
