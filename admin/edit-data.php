<?php 
session_start();
include "../config.php";

// Redirect if user is not logged in
if (!isset($_SESSION['uid'])) {
    header("location: ./login.php");
    exit();
}
$user_id = $_SESSION['uid'];

#getting the contact information
$get_contact = mysqli_query($conn,"select * from data where uid = '$user_id'");
$data = mysqli_fetch_array($get_contact);
$data_hospital = $data["hospital_number"];
$data_police = $data["police_number"];
$data_therapist = $data["therapist_number"];

#getting the admin information


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>TUWK | Edit data</title>
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
          <!-- <li><a href="../" class="active">Nyumbani</a></li> -->
          
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
            <li class="current">admin-profile</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <section id="" class=" section">

    <!-- Section Title -->
    <div class="report-container" data-aos="fade-up">
      <h2>Contact information</h2>

<?php
// Handle updating emergency contacts
if (isset($_POST["edit-data"])) {
    $hospital_number = mysqli_real_escape_string($conn, $_POST['hospital-number']);
    $police_number = mysqli_real_escape_string($conn, $_POST['police-number']);
    $therapist_number = mysqli_real_escape_string($conn, $_POST['therapist-number']);
    

    // Update the emergency contacts in the database
    $sql = "UPDATE data 
            SET hospital_number = '$hospital_number', police_number = '$police_number', therapist_number = '$therapist_number'
            WHERE uid = '$user_id'";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Emergency contacts updated successfully');</script>";
    } else {
        echo "<script>alert('Error updating emergency contacts: " . mysqli_error($conn) . "');</script>";
    }
}

// Handling updating admin profile (username and password)
if (isset($_POST["edit-profile"])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm-password']);
    

    // Checking if password matches confirm password
    if ($password === $confirm_password) {
        // Hash the password for security
        $hashed_password = md5($password);

        // Updatings the admin profile in the database
        $sql = "UPDATE admin 
                SET username = '$username', password = '$hashed_password'
                WHERE uid = '$user_id'";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Profile updated successfully');</script>";
        } else {
            echo "<script>alert('Error updating profile: " . mysqli_error($conn) . "');</script>";
        }
    } else {
        echo "<script>alert('Passwords do not match');</script>";
    }
}
?>
      
      <div class="forms d-flex flex-wrap justify-content-between" style="gap: 2rem; padding: 2rem; background-color: #f8f9fa; border-radius: 12px; box-shadow: 0 8px 16px rgba(0,0,0,0.1);">
            <!-- Form 1 -->
            <form action="#" class="edit-data p-4" method="post" style="flex: 1; min-width: 320px; border: 1px solid var(--accent-color); border-radius: 12px; background-color: white; box-shadow: 0 4px 8px rgba(0,0,0,0.1); transition: transform 0.3s;">
                <h4 style="color: var(--accent-color); text-align: center; margin-bottom: 1.5rem;">Emergency Contacts</h4>
                <div class="form-group mb-4">
                    <input type="tel" value="<?=$data_hospital?>" name="hospital-number" class="form-control" placeholder="Hospital number" required style="border: 1px solid var(--accent-color); padding: 10px; border-radius: 8px;">
                </div>
                <div class="form-group mb-4">
                    <input type="tel" value="<?=$data_police?>" name="police-number" class="form-control" placeholder="Police number" required style="border: 1px solid var(--accent-color); padding: 10px; border-radius: 8px;">
                </div>
                <div class="form-group mb-4">
                    <input type="tel" value="<?=$data_therapist?>" name="therapist-number" class="form-control" placeholder="Therapist number" required style="border: 1px solid var(--accent-color); padding: 10px; border-radius: 8px;">
                </div>
                <button type="submit" name="edit-data" class="btn text-white w-100" style="background-color: var(--accent-color); padding: 12px; border-radius: 8px; font-weight: 600; transition: background-color 0.3s;">Edit</button>
            </form>

            <!-- Form 2 -->
            <form action="#" class="edit-profile p-4" method="post" style="flex: 1; min-width: 320px; border: 1px solid var(--accent-color); border-radius: 12px; background-color: white; box-shadow: 0 4px 8px rgba(0,0,0,0.1); transition: transform 0.3s;">
                <h4 style="color: var(--accent-color); text-align: center; margin-bottom: 1.5rem;">Edit Profile</h4>
                <div class="form-group mb-4">
                    <input type="text" name="username" class="form-control" placeholder="Admin username" required style="border: 1px solid var(--accent-color); padding: 10px; border-radius: 8px;">
                </div>
                <div class="form-group mb-4">
                    <input type="password" name="password" class="form-control" placeholder="Password" required style="border: 1px solid var(--accent-color); padding: 10px; border-radius: 8px;">
                </div>
                <div class="form-group mb-4">
                    <input type="password" name="confirm-password" class="form-control" placeholder="Confirm password" required style="border: 1px solid var(--accent-color); padding: 10px; border-radius: 8px;">
                </div>
                <button type="submit" name="edit-profile" class="btn text-white w-100" style="background-color: var(--accent-color); padding: 12px; border-radius: 8px; font-weight: 600; transition: background-color 0.3s;">Change</button>
            </form>
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