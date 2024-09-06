<?php 
  session_start();
  include "../config.php";

  if(!isset($_SESSION['uid'])){
    header("location: ./login.php");
  }

  


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>TUWK | Tokomeza Ukatili Wa Kijinsia</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/icon.png" rel="icon">
  <link href="../assets/img/icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
  <style>
    main{
      margin-top: 5rem;
    }
  </style>


</head>

<body class="starter-page-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
  
      <a href="./" class="logo d-flex align-items-center me-auto">
        <img src="../assets/img/icon.png" alt="TUWK (Tokomeza Ukatili Wa Kijinsia) Tanzania Logo">
        <h1 class="sitename">TUWK  </h1>
        <!-- <span class="text-small"><b>| </b>Tokomeza Ukatili Wa Kijinsia</span> -->
      </a>
  
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="./" class="active">Nyumbani</a></li>
          <li class="dropdown">
            <a href="#"><span>Pata Msaada</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Huduma za Dharura</a></li>
              <li><a href="#">Usaidizi wa Kisaikolojia</a></li>
            </ul>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
  
      <a class="btn-getstarted text-small" href="edit-data.php">Edit Profile</a>
  
    </div>
  </header>
  
  <main class="main m-8">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Recent reports</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="/">Home</a></li>
            <li class="current">admin</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <section id="" class=" section">

    <!-- Section Title -->
    <div class="report-container" data-aos="fade-up">
      <h2>Reports</h2>
      <div id="reports-div"></div>
      <script>
        // JavaScript function to fetch insights data via AJAX
        function fetchReports() {
            // Make an AJAX request to get the PHP script that echoes insights content
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "php/get_reports.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    
                    var reportsContent = xhr.responseText;
                    console.log(reportsContent)
                    
                    document.getElementById("reports-div").innerHTML = reportsContent;
                }
            };
            xhr.send();
        }

        // Call fetchReports() function to fetch and display insights when the page loads
        fetchReports();
    </script>
    </div>
    <!-- End Section Title -->


      

    </section>

  </main>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>
