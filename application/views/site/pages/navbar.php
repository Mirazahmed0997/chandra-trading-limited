<?php
$user = $this->session->userdata('login_user_info_all');
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar with Mobile Toggle</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <style>
    body {
      top: 0 !important;
    }

    /* Container alignment for header bar */
    .header-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
    }

    .mobile-bar {
      display: none;
      padding: 10px;
      position: relative;
      z-index: 1001;
      background: transparent;
    }

    .hamburger {
      font-size: 24px;
      background: none;
      border: none;
      cursor: pointer;
      position: relative;
      z-index: 1002;
      color: #333;
    }

    #navbar {
      position: relative;
      z-index: 1000;
    }

    #navbar ul {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      gap: 15px;
    }

    #navbar ul li {
      position: relative;
    }

    #navbar ul li a {
      text-decoration: none;
      color: #000;
      font-weight: bold;
      font-size: 0.9rem;
    }

    /* General Submenu Setup */
    .submenu {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      min-width: 180px;
      background-color: #fff;
      list-style: none;
      padding: 10px 0;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .submenu li a {
      color: black !important;
      padding: 8px 15px;
      display: block;
    }

    @media (min-width: 769px) {

      /* Ensure the submenu is hidden by default on desktop, ignoring leftover mobile classes */
      .submenu {
        display: none !important;
      }

      /* Show ONLY on active desktop hover */
      .dropdown:hover>.submenu {
        display: block !important;
      }
    }

    /* Mobile View Rules */
    @media (max-width: 768px) {
      .mobile-bar {
        display: block;
      }

      #navbar {
        display: none;
        width: 100%;
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 999;
        background: #41ABB6;
      }

      #navbar.active {
        display: block;
      }

      #navbar ul {
        flex-direction: column;
        align-items: flex-start;
        padding: 0;
      }

      #navbar ul li {
        width: 100%;
        padding: 10px;
        background-color: #fff;
      }

      #navbar ul li a {
        color: #fff !important;
        display: block;
      }

      /* Reset layout for inline accordion on mobile */
      .submenu {
        position: relative;
        top: 0;
        display: none;
        /* Removed !important to allow toggles */
        padding-left: 15px;
        box-shadow: none;
      }

      /* Mobile Open State */
      .dropdown.open>.submenu {
        display: block;
      }
    }
  </style>
</head>

<body>

  <nav class="shadow-sm  bg-light">
    <div class="container  header-container">

      <!-- Logo -->
      <a class="navbar-brand fw-bold fs-4" href="#">
        <!-- <img style="width: 180px;" class="logo" src="./assets/uploads/CTL_logo_Finalll.png" alt="Logo"> -->
        <img style="width: 180px;" class="logo" src="<?= base_url('assets/uploads/CTL_logo_Finalll.png'); ?>"
          alt="Logo">
      </a>

      <div class="mobile-bar">
        <button class="hamburger" onclick="toggleMenu()">
          <i class="fa-solid fa-bars" id="menuIcon"></i>
        </button>
      </div>

      <!-- Navigation Menu -->
      <nav id="navbar">
        <ul>
          <li><a href="<?php echo base_url(); ?>" class="active"><?= lang('nav_home'); ?></a></li>

          <li class="dropdown">
            <a href="javascript:void(0)" onclick="toggleDropdown(this)">
              <?= lang('nav_about'); ?> <i class="fas fa-chevron-down"></i>
            </a>
            <ul class="submenu">
              <li><a href="our_managment"><?= lang('nav_management'); ?></a></li>
              <li><a href="our_mission"><?= lang('nav_mission'); ?></a></li>
              <li><a href="our_vission"><?= lang('nav_vision'); ?></a></li>
            </ul>
          </li>

          <li><a href="properties"><?= lang('properties'); ?></a></li>
          <li><a href="showcase"><?= lang('nav_projects'); ?></a></li>
          <li><a href=""><?= lang('investment'); ?></a></li>
          <li><a href=""><?= lang('services'); ?></a></li>
          <li><a href=""><?= lang('news&insights'); ?></a></li>
          <li><a href="contact_us"><?= lang('nav_contact'); ?></a></li>

          <?php if ($user): ?>

            <li class="dropdown">
              <a href="javascript:void(0)" onclick="toggleDropdown(this)"><?= $user->first_name[0] ,$user->last_name[0]  ?? 'Account'; ?> <i
                  class="fas fa-chevron-down"></i></a>
              <ul class="submenu">

                <li>
                  <a href="<?= base_url('') ?>" class="">
                    Dashboard
                  </a>
                </li>

                <li> <a href="<?= base_url('user_logout') ?>" class="">
                    Logout
                  </a></li>
              </ul>
            </li>

          <?php else: ?>
            <li><a href="<?php echo base_url("user_login_form"); ?>"><?= lang('login'); ?></a></li>
          <?php endif; ?>

          <!-- Search Modal Button -->
          <!-- <li>
            <button class="btn btn-outline-secondary btn-sm rounded-circle px-2 py-1" data-bs-toggle="modal"
              data-bs-target="#searchModal" title="Search">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </li> -->

          <!-- CTA Button -->
          <li>
            <a href="<?php echo base_url(); ?>"
              class="btn btn-sm btn-primary text-white px-3 py-1"><?= lang('book_a_site'); ?></a>
          </li>
        </ul>
      </nav>

    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    function toggleMenu() {
      const navbar = document.getElementById("navbar");
      const icon = document.getElementById("menuIcon");

      navbar.classList.toggle("active");

      if (navbar.classList.contains("active")) {
        icon.classList.remove("fa-bars");
        icon.classList.add("fa-xmark");
      } else {
        icon.classList.remove("fa-xmark");
        icon.classList.add("fa-bars");
      }
    }

    function toggleDropdown(el) {
      if (window.innerWidth <= 768) {
        const parent = el.parentElement;

        // Optional: Close other open dropdowns for accordion effect
        document.querySelectorAll('.dropdown.open').forEach(item => {
          if (item !== parent) item.classList.remove('open');
        });

        parent.classList.toggle("open");
      }
    }

    // Clear leftover mobile state when resizing back to desktop
    window.addEventListener('resize', () => {
      if (window.innerWidth > 768) {
        document.querySelectorAll('.dropdown.open').forEach(item => {
          item.classList.remove('open');
        });
      }
    });
  </script>

</body>

</html>