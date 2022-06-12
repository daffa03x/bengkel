   <?php 
   error_reporting(0);
   //membuat var session
    $user = $_SESSION['USER'];
    $req = $_REQUEST['hal'];
   ?>
   <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="mb-0 text-primary text-uppercase"><i class="fas fa-cogs"></i> Daffa Bengkel</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php?hal=home" class="nav-item nav-link <?= ($req == 'home') ? 'active' : '' ?>">Home</a>
                <a href="index.php?hal=booking/booking" class="nav-item nav-link <?= ($req == 'booking/booking') ? 'active' : '' ?>">Booking</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">List</a>
                    <div class="dropdown-menu m-0">
                        <a href="index.php?hal=motor/motor" class="dropdown-item">Motor</a>
                        <a href="index.php?hal=service/service" class="dropdown-item">Service</a>
                    </div>
                </div>
                <a href="index.php?hal=contact/contact" class="nav-item nav-link <?= ($req === 'contact/contact') ? 'active' : '' ?>">Contact Us</a>
            <?php
            if(!isset($user)){ //--------------jika belum login tampil menu login----------------------
            ?>
            <a href="index.php?hal=login" id="login" class="btn btn-primary rounded-0 py-2 px-lg-4 d-none d-lg-inline me-5" style="margin-top: 35px; margin-bottom: 40px;">Login<i class="fa fa-arrow-right ms-3"></i></a>
            <?php
            }
            else{ //--------------jika berhasil login tampil data user----------------------    
            ?>
                <div class="nav-item dropdown me-5">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="img-fluid rounded-circle" src="img/profile/<?= $user['foto'] ?>" alt="profile" width="30px">
                    </a>
                    <div class="dropdown-menu m-0">
                    <a href="" class="dropdown-item"><?= $user['nama'] ?></a>
                    <a href="logout.php" class="dropdown-item">Logout</a>
                    </div>
                </div>
            <?php } ?>
            </div>
            </div>
    </nav>
    <!-- Navbar End -->