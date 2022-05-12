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
        <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="index.php">
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
      <ul class="navbar-nav flex-row d-none d-md-flex">
      <li class="nav-item dropdown" >
        <a class="nav-link" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
          <span><i class="fa-solid fa-hat-wizard fa-3x" style="width: 75px;"></i></span>
          <!-- <span class="badge rounded-pill badge-notification bg-primary">1</span> -->
        </a>
        <ul class="dropdown-menu dropdown-menu-dark" style="left:50%; margin-left:-85px;">
            <li><a class="dropdown-item" style="height: 200px;" href="#"><?php echo(getLine(1)["sto_description"])?></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="stories.php?story=Wizard">Débuter l'histoire</a></li>
        </ul>

      <li class="nav-item dropdown">
        <a class="nav-link" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
          <span><i class="fa-brands fa-d-and-d fa-3x" style="width: 75px;"></i></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark" style="left:50%; margin-left:-85px;">
            <li><a class="dropdown-item" style="height: 200px;" href="#"><?php echo(getLine(2)["sto_description"])?></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Débuter l'histoire</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
          <span><i class="fa-solid fa-dungeon fa-3x" style="width: 75px;"></i></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark" style="left:50%; margin-left:-85px;">
            <li><a class="dropdown-item" style="height: 200px;" href="#"><?php echo(getLine(3)["sto_description"])?></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Débuter l'histoire</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
          <span><i class="fa-solid fa-skull-crossbones fa-3x" style="width: 75px;"></i></i></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark" style="left:50%; margin-left:-85px;">
            <li><a class="dropdown-item" style="height: 200px;" href="#"><?php echo(getLine(4)["sto_description"])?></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Débuter l'histoire</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
          <span><i class="fa-solid fa-book-skull fa-3x" style="width: 75px;"></i></span>
          <!-- <span class="badge rounded-pill badge-notification bg-primary">2</span> -->
        </a>
        <ul class="dropdown-menu dropdown-menu-dark" style="left:50%; margin-left:-85px;" >
            <li><a class="dropdown-item" style="height: 200px;" href="#"><?php echo(getLine(5)["sto_description"])?></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Débuter l'histoire</a></li>
        </ul>
      </li>
    </ul>

      <!-- Right elements (connexion)-->
      <?php if(isUserConnected()){ ?>
      <ul class="navbar-nav flex-row" style="font-size: 20px">
          
        <li class="nav-item dropdown">
          <a class="nav-link d-sm-flex align-items-sm-center" role="button" aria-expanded="false" href="profile.php">
            <img src="Images/pp.png" class="rounded-circle" height="22" alt="profile"
              loading="lazy" />
            <strong class="d-none d-sm-block ms-1" ><?php echo($_SESSION['login']); ?></strong>
          </a>
        <li class="nav-item dropdown">
          <a class="nav-link d-sm-flex align-items-sm-center" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
            <span><i class="fa-solid fa-ranking-star"></i></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="profile.php#statistics">Statistics</a></li>
            </ul>
      </li>
      <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Actions
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="includes/logout.php">Logout</a></li>
              <li><a class="dropdown-item" href="storyCreation.php">Create a new strory</a></li>
            </ul>
          </li>
        
      </ul>
      <!-- Right elements if connected -->
      <?php } else{ ?>
      <!-- Right elements if not connected -->
      <ul class="navbar-nav flex-row">
      <li class="nav-item dropdown">
        <a class="nav-link d-sm-flex align-items-sm-center" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
          <img src="Images/pp.png" class="rounded-circle" height="22" alt="" loading="lazy" />
          <strong class="d-none d-sm-block ms-1">Connectez-vous</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark" style=" margin-right:-55px;" >
            <li><a class="dropdown-item" href="signin.php">Se connecter</a></li>
            <li><a class="dropdown-item" href="signup.php">Créer un compte</a></li>
        </ul>
      </li>
    </ul>
      <!-- Right elements if not connected -->
      <?php } ?>
    </div>
  </nav>