<?php
error_reporting(0);
// Memulai Session
session_start();

// Menangkap user
$user = $_SESSION['USER'];
$id = $user['id'];
$role = $user['role'];

// Require models & koneksi
require_once 'koneksi.php';
require_once 'models/Motor.php';
require_once 'models/Service.php';
require_once 'models/Booking.php';
require_once 'models/KategoriMotor.php';
require_once 'models/KategoriService.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Daffa Bengkel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/title.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Oswald:wght@600&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="public/vendors/lib/animate/animate.min.css" rel="stylesheet">
    <link href="public/vendors/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="public/vendors/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="public/vendors/css/style.css" rel="stylesheet">
    <link href="public/vendors/css/styles.css" rel="stylesheet">
</head>

<body>
    <?php 
    // Include File tampilan frontend
    include_once 'frontend/spinner.php';
    include_once 'frontend/navbar.php';

    // Logic request halaman & melempar error pada search url halaman yang tidak ada
    $req = $_REQUEST['hal'];
            if(isset($req)){
              if(file_exists('views/'.$req.'.php')){
                include_once 'views/'.$req.'.php';
              }else{
                include_once 'frontend/error.php';
              }
            }
            else{
              include_once 'views/home.php';
            }

    include_once 'frontend/footer.php';
    ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/vendors/lib/wow/wow.min.js"></script>
    <script src="public/vendors/lib/easing/easing.min.js"></script>
    <script src="public/vendors/lib/waypoints/waypoints.min.js"></script>
    <script src="public/vendors/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="public/vendors/js/main.js"></script>
    <script src="public/vendors/js/popper.min.js"></script>
    <script src="public/vendors/js/script.js"></script>
    <script src="public/vendors/js/jquery.js"></script>
</body>

</html>