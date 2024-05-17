<?php
require "models/Connection.php";
require "models/Projet.php";
require "models/Village.php";


// Utilisation de la classe pour ajouter un village
$village = new Village();
//$village->ajouterVillage();


// Utilisation de la classe pour afficher un village
$village->setId(1); // Définir l'ID du village à afficher
$villageData = $village->afficherVillageEtProjet();

$villageDataJson = json_encode($villageData);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blog - Company Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

</head>

 
<style>

#map { height: 90vh; }
  </style>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top" >
    <div class="container d-flex align-items-center">
      <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/cdrt-logo.jpg" alt="" width="150" height="300" class="img-fluid"></a>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Projet</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Projets</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Projets</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    
      <!-- ======= About Us Section ======= -->
      <section id="about-us" class="about-us" style="box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);" >
        <div class="container" data-aos="fade-up">
  
          <div class="row content">
            <div class="col-lg-6" data-aos="fade-right">
              <h2>Projets entrepris par le CDRT après le séisme de 2023 au Maroc.</h2>
              <h3>Un rôle clé dans l'aide aux personnes touchées dans différentes régions</h3>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
              <p>
                Les aides incluent des tentes, des logements mobiles, des vêtements et des médicaments. La carte ci-dessous montre les différentes régions qui bénéficient de ces aides. Il suffit de cliquer sur les icônes de localisation pour obtenir les détails de chaque projet.
              </p>
              <h4>Guide d'utilisation :</h4>
              <ul>
                <li><i class="ri-check-double-line"></i> Cliquez sur le centre de l'icône <img src="assets/img/projects/locationIcon.png" width="40" height="40" srcset="">.</li>
                <li><i class="ri-check-double-line"></i> Une petite carte d'information s'affichera.</li>
                <li><i class="ri-check-double-line"></i> Cliquez sur le bouton 'En savoir plus' pour obtenir plus d'informations sur le processus de réalisation du projet.</li>
              </ul>
             
            </div>
          </div>
  
        </div>
      </section><!-- End About Us Section -->
   <div class="maps_container">

   <div id="map"></div>

  </div>
   
  
  <!-- Vendor JS Files -->
 
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  
  <script>
        // Embed the PHP data as a JavaScript variable
        var villageDataJson = <?php echo $villageDataJson; ?>;

          var map = L.map('map').setView([31.631, -8.002], 9);
          L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            scrollWheelZoom: false,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
          }).addTo(map);
     
          // Données des marqueurs
          var markersData = villageDataJson.map(function(village) {
              return {
                  position: [village.x, village.y],
                  title: village.nom,
                  description:village.description,
                  id_projet:village.id_projet
                
              };
          });


          // Parcours des données des marqueurs
          markersData.forEach(function(markerInfo) {
          
            // Création du marqueur
            var marker = L.marker(markerInfo.position, {
              color: 'red',
            }).addTo(map);
            // Ajout d'une info-bulle au clic sur le marqueur
            var popupContent = `<div>
                                  <h1>${markerInfo.title}</h1>
                                  <h3>${markerInfo.description}</h3>
                                  <div>
                                      <p><a href="blog-single.html?id_projet=${markerInfo.id_projet}"><h2>En savoir plus</h2></a></p>
                                  </div>
                                </div>`;
            marker.bindPopup(popupContent).openPopup();
          });
          
    </script>
    <!-- <script src="assets/js/leaflet.js"></script> -->
</body>

</html>