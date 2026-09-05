
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
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item has-treeview menu-open">
                    <a href="<?php echo base_url('admin_dashboard') ?>"
                        class="nav-link <?= active_nav('dashboard', $main_nav); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
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
                                    <i class="fas fa-image banner-icon" style="  margin-right: 12px; margin-left: 4px;"></i>
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
                                        style="  margin-right: 14px; margin-left: 4px;"></i>
                                    <p>অর্জন</p>

                                </a>
                            </li>



                            <!-- sub menu for gallary -->

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
                    <p>
                        রেজিস্টার্ড ইউজার তালিকা
                    </p>
                </a>

                </li>

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
            </li>


            </ul>
        </nav>
    </div>
</aside>
