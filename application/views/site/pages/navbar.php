<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar with Search</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg  shadow-sm p-5">
    <div class="container">

      <a class="navbar-brand fw-bold fs-4 " href="#"><img width="200px;" class="logo"
          src="./assets/uploads/CTL_logo_Finalll.png" alt="Logo"></a>


      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav align-items-lg-center gap-lg-2">

          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url(); ?>"><?= lang('nav_home'); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>"><?= lang('properties'); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="showcase"><?= lang('nav_projects'); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="showcase"><?= lang('investment'); ?></a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= lang('nav_about'); ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
              <li><a class="dropdown-item" href="our_managment"><?= lang('nav_management'); ?></a></li>
              <li><a class="dropdown-item" href="our_mission"><?= lang('nav_mission'); ?></a></li>
              <li><a class="dropdown-item" href="our_vission"><?= lang('nav_vision'); ?></a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="showcase"><?= lang('services'); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="showcase"><?= lang('news&insights'); ?></a>
          </li>



          <li class="nav-item">
            <a class="nav-link" href="contact_us"><?= lang('nav_contact'); ?></a>
          </li>



          <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
            <button class="btn btn-outline-secondary btn-sm rounded-circle px-2 py-1" data-bs-toggle="modal"
              data-bs-target="#searchModal" title="Search">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </li>

          <li class="nav-item btn btn-sm btn-primary  px-2 py-1 ms-lg-1">
            <a class="nav-link text-white" href="<?php echo base_url(); ?>"><?= lang('book_a_site'); ?></a>
          </li>

        </ul>
      </div>

    </div>
  </nav>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>


<style>
  @media (min-width: 992px) {
    .navbar {
      height: 70px;
      display: flex;
      align-items: center;
      background-color: #F8FAFC;
    }

    .navbar-nav .nav-link {
      padding-left: 0.4rem !important;
      padding-right: 0.4rem !important;
      font-size: 0.80rem;
      /* Slightly tighten font size */
    }
  }



  body {
    top: 0 !important;
  }

  .nav-link {
    color: black !important;
    font-weight: bolder !important;
  }

  .top-bar a:hover i {
    opacity: 0.8;
  }

  .fs-7 {
    font-size: 0.75rem;
  }


  .navbar-brand img {
    margin-left: 40px;
  }

  .dropdown-item {
    font-weight: bold !important;
  }
</style>