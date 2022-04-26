<?php require_once "includes/functions.php"; ?>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-danger">
    <div class="container-fluid justify-content-between">
      <!-- Left elements -->
      <div class="d-flex my-2 my-sm-0">
        <!-- Toggler -->
        <button data-mdb-toggle="sidenav" data-mdb-target="#sidenav-1"
          class="btn shadow-0 p-0 ms-2 me-3 d-block d-xl-none" aria-controls="#sidenav-1" aria-haspopup="true">
          <i class="fas fa-bars fa-lg"></i>
        </button>
        <!-- Brand -->
        <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="#">
          <img src="Images/dragon2.jpg" height="40" alt="" loading="lazy"
            style="margin-top: 2px" />
        </a>

        <!-- Search form -->
        <!-- <form class="input-group w-auto my-auto d-none d-sm-flex">
          <input autocomplete="off" type="search" class="form-control rounded" placeholder="Search"
            style="min-width: 125px" />
          <span class="input-group-text border-0 d-none d-lg-flex"><i class="fas fa-search"></i></span>
        </form> -->
      </div>
      <!-- Left elements -->

      <!-- Center elements -->
      <ul class="navbar-nav flex-row d-none d-md-flex">
        <li class="nav-item me-3 me-lg-1 active">
          <a class="nav-link" href="#">
            <span><i class="fa-solid fa-hat-wizard fa-3x"></i></span>
            <span class="badge rounded-pill badge-notification bg-primary">1</span>
          </a>
        </li>

        <li class="nav-item me-3 me-lg-1 fa-3x">
          <a class="nav-link" href="#">
            <span><i class="fa-brands fa-d-and-d"></i></span>
          </a>
        </li>

        <li class="nav-item me-3 me-lg-1 fa-3x">
          <a class="nav-link" href="#">
            <span><i class="fa-solid fa-dungeon"></i></span>
          </a>
        </li>

        <li class="nav-item me-3 me-lg-1 fa-3x">
          <a class="nav-link" href="#">
            <span><i class="fa-solid fa-skull-crossbones"></i></i></span>
          </a>
        </li>

        <li class="nav-item me-3 me-lg-1">
          <a class="nav-link" href="#">
            <span><i class="fa-solid fa-book-skull fa-3x"></i></span>
            <span class="badge rounded-pill badge-notification bg-primary">2</span>
          </a>
        </li>
      </ul>
      <!-- Center elements -->

      <!-- Right elements (connexion)-->
      <?php if(isUserConnected()){ ?>
      <ul class="navbar-nav flex-row">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        <li class="nav-item dropdown">
          <a class="nav-link d-sm-flex align-items-sm-center" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
            <img src="Images/pp.png" class="rounded-circle" height="22" alt=""
              loading="lazy" />
            <strong class="d-none d-sm-block ms-1"><?php echo($_SESSION['login']); ?></strong>
          </a>
        <li class="nav-item dropdown">
          <a class="nav-link d-sm-flex align-items-sm-center" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
            <span><i class="fas fa-plus-circle fa-lg"></i></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle hidden-arrow" href="#" data-bs-toggle="dropdown" aria-expanded="false" id="navbarDropdownMenuLink" role="button"
            data-mdb-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-comments fa-lg"></i>

            <span class="badge rounded-pill badge-notification bg-danger">6</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Some news</a></li>
            <li><a class="dropdown-item" href="#">Another news</a></li>
            <li>
              <a class="dropdown-item" href="#">Something else here</a>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle hidden-arrow" data-bs-toggle="dropdown" aria-expanded="false" href="#" id="navbarDropdownMenuLink" role="button"
            data-mdb-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-bell fa-lg"></i>
            <span class="badge rounded-pill badge-notification bg-danger">12</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Some news</a></li>
            <li><a class="dropdown-item" href="#">Another news</a></li>
            <li>
              <a class="dropdown-item" href="#">Something else here</a>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle hidden-arrow" href="#" data-bs-toggle="dropdown" aria-expanded="false" id="navbarDropdownMenuLink" role="button"
            data-mdb-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-chevron-circle-down fa-lg"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Some news</a></li>
            <li><a class="dropdown-item" href="#">Another news</a></li>
            <li>
              <a class="dropdown-item" href="#">Something else here</a>
            </li>
          </ul>
        </li>
      </ul>
      <!-- Right elements if connected -->
      <?php } else{ ?>
      <!-- Right elements if not connected -->


      <!-- Right elements if not connected -->
      <?php } ?>
    </div>
  </nav>