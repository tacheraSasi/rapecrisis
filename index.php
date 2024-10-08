<?php
include "config.php";

#getting the contact information
$get_contact = mysqli_query($conn,"select * from data");
$data = mysqli_fetch_array($get_contact);
$data_hospital = $data["hospital_number"];
$data_police = $data["police_number"];
$data_therapist = $data["therapist_number"];
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
  <link href="assets/img/icon.png" rel="icon">
  <link href="assets/img/icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">


</head>

<body class="index-page">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
  
      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/icon.png" alt="TUWK (Tokomeza Ukatili Wa Kijinsia) Tanzania Logo">
        <h1 class="sitename">TUWK  </h1>
        <span class="text-small"><b>| </b>Tokomeza Ukatili Wa Kijinsia</span>
      </a>
  
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="./#home" class="active">Nyumbani</a></li>
          <li><a href="./#kuhusu-sisi">Kuhusu Sisi</a></li>
          <li><a href="./#volunteer">Mchango</a></li>
          <li><a href="./#donate">Toa Msaada</a></li>
          <li class="dropdown">
            <a href="#"><span>Pata Msaada</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Huduma za Dharura</a></li>
              <li><a href="#">Usaidizi wa Kisaikolojia</a></li>
              <li><a href="#">Usaidizi wa Kisheria</a></li>
              <li><a href="#">Makazi Salama</a></li>
            </ul>
          </li>
          <li><a href="index.html#contact">Wasiliana Nasi</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
  
      <a class="btn-getstarted text-small" style="font-size: small;" href="/pata-msaada/"> 
        Msaada
      </a>
  
    </div>
  </header>
  
  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="hero-bg">
        <img src="assets/img/hero-bg-light.webp" alt="">
      </div>
      <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
        <div class="wfull" data-aos="fade-up" data-aos-delay="125">
          <div class="item " id="pata-msaada">
            <div class="icon flex-shrink-0">
              <i class="bi bi-arrow-right"></i>
              <div class="title">
                PATA MSAADA
              </div>
            </div>
          </div>
        </div>
        <div class="wfull" data-aos="fade-up" data-aos-delay="125">
          <div class="item " id="daktari" number="<?=$data_hospital?>">
            <div class="icon flex-shrink-0">
              <i class="bi bi-telephone"></i>
              <div class="title">
                DAKTARI
              </div>
            </div>
          </div>
        </div>
        <div class="wfull" data-aos="fade-up" data-aos-delay="125">
          <div class="item " id="pata-msaada">
            <div class="icon flex-shrink-0">
              <i class="bi bi-book-half"></i>
              <div class="title">
                ELIMU YA UKATILI WA KIJINSIA
              </div>
            </div>
          </div>
        </div>
        <div class="item-top-container" data-aos="fade-up" data-aos-delay="100">

          <div class="item" id="#kuhusu-sisi">
            <div class="icon flex-shrink-0">
              <i class="bi bi-briefcase"></i>
              <div class="title">
                KUHUSU SISI
              </div>
            </div>
          </div>
          <div class="item" id="#shuhuda">
            <div class="icon flex-shrink-0">
              <i class="bi bi-telephone"></i>
              <div class="title">
                SHUHUDA
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </section><!-- /Hero Section -->
  
    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">
  
      <div class="container">
  
        <div class="row gy-4">
  
          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Vikundi vya Usaidizi</a></h4>
                <p class="description">Maeneo salama kwa waathirika kuunganishwa na kupona pamoja</p>
              </div>
            </div>
          </div><!-- End Service Item -->
  
          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-heart"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Intervention ya Dharura</a></h4>
                <p class="description">Usaidizi na msaada wa haraka kwa waathirika wakati wa mgogoro</p>
              </div>
            </div>
          </div><!-- End Service Item -->
  
          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-shield-check"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Ulinzi wa Kisheria</a></h4>
                <p class="description">Kuendeleza haki za kisheria za waathirika na haki</p>
              </div>
            </div>
          </div><!-- End Service Item -->
  
        </div>
  
      </div>
  
    </section><!-- /Featured Services Section -->
  
    <!-- About Section -->
    <section id="kuhusu-sisi" class="about section">
  
      <div class="container">
  
        <div class="row gy-4">
  
          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p class="who-we-are">Sisi ni Nani</p>
            <h3>Kuwawezesha Waathirika kwa Usaidizi Wenye Huruma</h3>
            <p class="fst-italic">
              TUWK (Tokomeza Ukatili Wa Kijinsia) Tanzania inajitolea kutoa waathirika wa unyanyasaji wa kijinsia msaada na rasilimali wanazohitaji kupona na kutafuta haki.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span>Tunatoa huduma za ushauri nasaha za siri.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Timu yetu ya kisheria inatoa utetezi na uwakilishi.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Tunapigania mabadiliko ya sera kusaidia haki za waathirika.</span></li>
            </ul>
            <a href="/pata-msaada/" class="read-more"><span>Pata Msaada</span><i class="bi bi-arrow-right"></i></a>
          </div>
  
          <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">
              <div class="col-lg-6">
                <img src="assets/img/about-company-1.jpg" class="img-fluid" alt="">
              </div>
              <div class="col-lg-6">
                <div class="row gy-4">
                  <div class="col-lg-12">
                    <img src="assets/img/about-company-2.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="col-lg-12">
                    <img src="assets/img/about-company-3.jpg" class="img-fluid" alt="">
                  </div>
                </div>
              </div>
            </div>
  
          </div>
  
        </div>
  
      </div>
    </section><!-- /About Section -->
  
    <!-- Faq Section -->
    <section id="faq" class="faq section">
  
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Maswali Yanayoulizwa Sana</h2>
      </div><!-- End Section Title -->
  
      <div class="container">
  
        <div class="row justify-content-center">
  
          <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">
  
            <div class="faq-container">
  
              <div class="faq-item faq-active">
                <h3>Huduma gani TUWK (Tokomeza Ukatili Wa Kijinsia) inatoa?</h3>
                <div class="faq-content">
                  <p>TUWK (Tokomeza Ukatili Wa Kijinsia) inatoa huduma kamili za usaidizi kwa waathirika wa unyanyasaji wa kijinsia, ikiwa ni pamoja na ushauri nasaha, msaada wa kisheria, na usaidizi wa kisaikolojia.</p>
                </div>
              </div>
  
              <div class="faq-item">
                <h3>Nawezaje kutoa mchango?</h3>
                <div class="faq-content">
                  <p>Unaweza kutoa mchango wako kwa kubonyeza kitufe cha "Toa Msaada" kwenye menyu yetu au kwa kututembelea ofisini kwetu.</p>
                </div>
              </div>
  
              <div class="faq-item">
                <h3>Ninawezaje kupata msaada wa dharura?</h3>
                <div class="faq-content">
                  <p>Unaweza kupata msaada wa dharura kwa kupiga simu kwenye namba yetu ya dharura au kwa kututafuta kupitia tovuti yetu.</p>
                </div>
              </div>
  
            </div>
  
          </div>
  
        </div>
  
      </div>
  
    </section><!-- /Faq Section -->
    

  <!-- Contact Section -->
  <section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Wasiliana Nasi</h2>
      <p>Tafadhali wasiliana nasi kwa msaada au taarifa zaidi</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-4">

        <div class="col-lg-6">
          <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
            <i class="bi bi-geo-alt"></i>
            <h3>Anwani</h3>
            <p>Barabara Kuu, Dar es Salaam, Tanzania</p>
          </div>
        </div><!-- End Info Item -->

        <div class="col-lg-3 col-md-6">
          <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
            <i class="bi bi-telephone"></i>
            <h3>Piga Simu</h3>
            <p>+255 123 456 789</p>
          </div>
        </div><!-- End Info Item -->

        <div class="col-lg-3 col-md-6">
          <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
            <i class="bi bi-envelope"></i>
            <h3>Barua Pepe</h3>
            <p>info@example.com</p>
          </div>
        </div><!-- End Info Item -->

      </div>

      <div class="row gy-4 mt-1">
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d254762.66611146636!2d39.2099881025554!3d-6.792354218321602!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f05be9b4c9a97%3A0x6e7465bdaa1e2fbf!2sDar%20es%20Salaam%2C%20Tanzania!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><!-- End Google Maps -->

        <div class="col-lg-6">
          <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="400">
            <div class="row gy-4">

              <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Jina Lako" required="">
              </div>

              <div class="col-md-6">
                <input type="email" class="form-control" name="email" placeholder="Barua Pepe Yako" required="">
              </div>

              <div class="col-md-12">
                <input type="text" class="form-control" name="subject" placeholder="Mada" required="">
              </div>

              <div class="col-md-12">
                <textarea class="form-control" name="message" rows="6" placeholder="Ujumbe" required=""></textarea>
              </div>

              <div class="col-md-12 text-center">
                <div class="loading">Inapakia</div>
                <div class="error-message"></div>
                <div class="sent-message">Ujumbe wako umetumwa. Asante!</div>

                <button type="submit">Tuma Ujumbe</button>
              </div>

            </div>
          </form>
        </div><!-- End Contact Form -->

      </div>

    </div>

  </section><!-- /Contact Section -->

  <!-- Footer Section -->
  <footer id="footer" class="footer position-relative">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">TUWK (Tokomeza Ukatili Wa Kijinsia) Tanzania</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Barabara Kuu</p>
            <p>Dar es Salaam, Tanzania</p>
            <p class="mt-3"><strong>Simu:</strong> <span>+255 123 456 789</span></p>
            <p><strong>Barua Pepe:</strong> <span>info@TUWKtz.org</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href="#"><i class="bi bi-twitter"></i></a>
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Viungo Vya Kufaa</h4>
          <ul>
            <li><a href="#">Nyumbani</a></li>
            <li><a href="#">Kuhusu Sisi</a></li>
            <li><a href="#">Huduma</a></li>
            <li><a href="#">Pata Msaada</a></li>
            <li><a href="#">Wasiliana Nasi</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Huduma Zetu</h4>
          <ul>
            <li><a href="#">Ushauri wa Mgogoro</a></li>
            <li><a href="#">Usaidizi wa Kisheria</a></li>
            <li><a href="#">Mgawanyo wa Jamii</a></li>
            <li><a href="#">Programu za Elimu</a></li>
            <li><a href="#">Vikundi vya Msaada</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Jarida Letu</h4>
          <p>Jiunge na jarida letu upate habari za huduma na kampeni zetu!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Jiunge"></div>
            <div class="loading">Inapakia</div>
            <div class="error-message"></div>
            <div class="sent-message">Ombi lako la usajili limepelekwa. Asante!</div>
          </form>
        </div>

      </div>
    </div>

    <div class="container text-center mt-4">
      <p>© <span>Haki miliki</span> <strong class="px-1 sitename">TUWK (Tokomeza Ukatili Wa Kijinsia) Tanzania</strong><span>Haki Zimehifadhiwa</span></p>
      <div class="credits">
        Imebuniwa na <a href="https://tachera.com/">Tachera W Sasi</a>
      </div>
    </div>

  </footer><!-- /Footer Section -->

  <!-- Scroll Top -->
  <a href="/" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/script.js"></script>

</body>

</html>