<?php 
  session_start();
  include "../config.php";
  if(!isset($_SESSION['uid'])){
    header("location: ./login.php");
    exit();
  }

  $ref = isset($_GET['ref']) ? mysqli_real_escape_string($conn, $_GET['ref']) : null;
  if(!$ref){
    // Instead of killing the script, show a custom error page or message
    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Page Not Found</h1>";
    exit();
  }

  // Fetch report from the database
  $select = mysqli_query($conn, "SELECT * FROM reports WHERE ref = '$ref'");
  if(!$select || mysqli_num_rows($select) == 0){
    // Redirect to a 404 page or show an error message
    echo "<h1>Report Not Found</h1>";
    exit();
  }

  $row = mysqli_fetch_array($select);
  
  # Fetching and sanitizing data
  $reported_at = date('F j, Y', strtotime($row['reported_at']));
  $latitude = htmlspecialchars($row['latitude']);
  $longitude = htmlspecialchars($row['longitude']);
  $name = isset($row['jina']) ? htmlspecialchars($row['jina']) : "anonymous";
  $phone = htmlspecialchars($row["namba"]);
  $email = htmlspecialchars($row["email"]);
  $qn1 = htmlspecialchars($row["question1"]);
  $qn2 = htmlspecialchars($row["question2"]);
  $qn3 = htmlspecialchars($row["question3"]);
  $qn4 = htmlspecialchars($row["question4"]);
  $qn5 = htmlspecialchars($row["question5"]);
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
          <li><a href="../" class="active">Nyumbani</a></li>
          
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
  
      <a class="btn-getstarted text-small" href="./">Back</a>
  
    </div>
  </header>
  
  <main class="main m-8">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0"><?=$name?></h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="./">Home</a></li>
            <li class="current">admin</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <section id="" class=" section">

    <!-- Section Title -->
    <div class="report-container" data-aos="fade-up">
      <h2>Details</h2>
      <div class="report">
        <div class="report-list">
            <div class="time-reported">
                <p>Reported on: <strong><?=$reported_at?></strong></p>
            </div>
            <li class="report-top">
                <div class="d-flex flex-wrap">
                    <i class="bi bi-person icon"></i>
                    <div class="report-item-content">
                        <span class="response"><?=$name?></span>
                    </div>
                    </div>
                    <div class="d-flex">
                    <i class="bi bi-globe icon"></i>
                    <div class="report-item-content">
                        <span class="response">
                        Latitude: <?=$latitude?>, Longitude: <?=$longitude?>
                        </span>
                    </div>
                    
                </div>
            </li>
            <li>
                <i class="bi bi-check-circle"></i>
                <div class="report-item-content">
                <span>Je, tukio lilitokea kwako au kwa mtu unayemjua?</span>
                <span class="response"><?=$qn1?></span>
                </div>
            </li>
            <li>
                <i class="bi bi-check-circle"></i>
                <div class="report-item-content">
                <span>Tukio lilitokea lini?</span>
                <span class="response"><?=$qn2?></span>
                </div>
            </li>
            <li>
                <i class="bi bi-check-circle"></i>
                <div class="report-item-content">
                <span>Je, unahitaji ushauri wa kisaikolojia?</span>
                <span class="response"><?=$qn3?></span>
                </div>
            </li>
            <li>
                <i class="bi bi-check-circle"></i>
                <div class="report-item-content">
                <span>Je, tukio liliripotiwa kwa mamlaka?</span>
                <span class="response"><?=$qn4?></span>
                </div>
            </li>
            <li>
                <i class="bi bi-check-circle"></i>
                <div class="report-item-content">
                <span>Je, unajua mshukiwa?</span>
                <span class="response"><?=$qn5?></span>
                </div>
            </li>
            <li class="report-top d-flex">
                <i class="bi bi-phone icon"></i>
                <div class="report-item-content">
                    <span class="response">
                        Phone:<?=$phone?$phone:"none"?>
                    </span>
                </div>
                
            </li>
            <li class="report-top d-flex">
                <i class="bi bi-envelope-at icon"></i>
                <div class="report-item-content">
                    <span class="response">
                    Email:<?=$email?$email:"none"?>
                    </span>
                </div>  
            </li>
        </div>

      </div>
      
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
<!--  -->