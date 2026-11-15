<?php

$user = $this->session->userdata('login_user_info_all');
$staff = isset($staff_login_info) ? $staff_login_info : null;

// echo '<pre>';
// print_r($staff);
// // print_r($password);
// echo '</pre>';
// exit;
?>

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
        width: 40%;
        height: 40%;
        border-radius: 50%;
        /* border: 2px solid rgba(255, 255, 255, 0.12); */
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        flex-shrink: 0;
    }

    .user-panel .image img {
        width: 50px;
        height: 50px;
        object-fit: content;
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
        <span class="brand-text font-weight-light">Staff Zone</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/uploads/staff/' . html_escape($user->staff_image)); ?>"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    <span class="brand-text font-weight-light">
                        <?= htmlspecialchars($user->staff_name); ?>
                    </span> <small><?= $user->designation; ?></small></a>
            </div>

        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item has-treeview menu-open">
                    <a href="<?php echo base_url('User_dashboard') ?>"
                        class="nav-link <?= active_nav('User_dashboard', $main_nav); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?= active_open('Projects', $main_nav); ?>">
                    <a href="#" class="nav-link <?= active_nav('Projects', $main_nav); ?>">
                        <i class="nav-icon fas fa-exchange-alt"></i>
                        <p>
                            Handover & Takeover
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('joining_letter') ?>"
                                class="nav-link <?= active_nav('joining_letter', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Joining Letter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('joining_letter_form') ?>"
                                class="nav-link <?= active_nav('joining_letter_form', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create joining Letter</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= active_open('Projects', $main_nav); ?>">
                    <a href="#" class="nav-link <?= active_nav('Projects', $main_nav); ?>">
                        <i class="fas fa-clipboard-check"></i>
                        <p>
                            Attendences & leaves
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('user_attendence') ?>"
                                class="nav-link <?= active_nav('user_attendence', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Attendences</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('user_movement_list') ?>"
                                class="nav-link <?= active_nav('user_movement_list', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Movements List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('leave_appication_form') ?>"
                                class="nav-link <?= active_nav('leave_appication_form', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Leave Application Form</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('leave_application_list') ?>"
                                class="nav-link <?= active_nav('leave_application_list', $sub_nav); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Leave Application List</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function togglePassword(fieldId, iconId) {
        var input = document.getElementById(fieldId);
        var icon = document.getElementById(iconId);

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>