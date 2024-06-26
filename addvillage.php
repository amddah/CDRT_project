
<?php
require "models/Connection.php";
require "models/Projet.php";
require "models/Village.php";


// Utilisation de la classe pour ajouter un village
$village = new Village();
//$village->ajouterVillage();


$villageData = $village->afficherVillage();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
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

  <!-- =======================================================
  * Template Name: Company
  * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/cdrt-logo.jpg" alt="" width="150" height="300" class="img-fluid"></a>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="index.php">Projet</a></li>
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
          <h2>Dashboard</h2>
         
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

  

    <section id="contact" class="contact">
      <div class="container">

        <div class="row justify-content-center" data-aos="fade-up">

        <div class="row mt-5 justify-content-center" data-aos="fade-up">
         
          <div class="col-lg-10">
          <h1>Ajouter Village</h1>
            <form action="controller/villageController.php" method="post" role="form" enctype="multipart/form-data"  class="php-email-form">
          
               
              <div class="form-group mt-3">
                <label for="name">Village</label>
                <input type="text" class="form-control" name="nom" id="subject" placeholder="Nom de village" required>
              </div>
           
              <div class="form-group mt-3">
                <label for="name">Coordonnée X</label>
                <input type="text" class="form-control" name="x" id="subject" placeholder="X" required>
              </div>
              <div class="form-group mt-3">
                <label for="name">Coordonnées Y</label>
                <input type="text" class="form-control" name="y" id="subject" placeholder="Y" required>
              </div>
              
              <div class="text-center"><button type="submit" style="background: #1bbd36;border: 0;padding: 10px 24px;color: #fff;transition: 0.4s;border-radius: 4px; margin-top:5px;" >Ajouter</button></div>
            </form>
          </div>

        </div>


        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
          <h1>Ajouter Projet</h1>
          <form action="controller/projetController.php" method="post" role="form" class="php-email-form">
          
               
          <div class="form-group mt-3">
            <label for="name">Titre</label>
            <input type="text" class="form-control" name="description" id="subject" placeholder="Titre de projet" required>
          </div>
       
          <div class="form-group mt-3">
          <label for="name">Village</label>
          <select class="form-select" aria-label="Default select example" name="village">
              <option selected>Sélectionne le village</option>
              <?php foreach ($villageData as $village): ?>
              <option value="<?php echo $village['id_village']; ?>"><?php echo $village['nom']; ?></option>
              <?php endforeach; ?>
          </select>
          </div>
          
          <h4>Ajouter description de projet</h4>

          <div id="section-template" style="display: none;">
        <div class="section-item">
            <div class="form-group mt-3">
                <label>Titre de Section</label>
                <input type="text" class="form-control" name="titre_section" placeholder="Titre de la section" >
            </div>
            <div class="form-group mt-3">
                <label>Image</label>
                <input type="file" class="form-control" name="image_section" accept="image/*" >
            </div>
            <div class="form-group mt-3">
                <label>Description</label>
                <textarea class="form-control" name="description_section" rows="5" placeholder="Description de la section" ></textarea>
            </div>
            <button type="button" class="btn btn-secondary mt-3 remove-section">Supprimer</button>
            <hr>
        </div>
    </div>
              <div id="sections-container">
                  <!-- Les sections dupliquées seront ajoutées ici -->
              </div>

              <button type="button" id="add-section" class="btn mt-3" style="background-color: #18d2cb;">Ajouter Section</button>

                        
          
          <div class="text-center"><button type="submit" style="background: #1bbd36;border: 0;padding: 10px 24px;color: #fff;transition: 0.4s;border-radius: 4px; margin-top:5px;" >Ajouter</button></div>
        </form>
      
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script >
    
    document.addEventListener('DOMContentLoaded', function() {
        const addSectionBtn = document.getElementById('add-section');
        const sectionsContainer = document.getElementById('sections-container');
        const sectionTemplate = document.getElementById('section-template');

        addSectionBtn.addEventListener('click', function() {
          
            const clone = sectionTemplate.cloneNode(true);
            clone.removeAttribute('id');
            clone.style.display = 'block';
            sectionsContainer.appendChild(clone);
        });

        sectionsContainer.addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-section')) {
             
              event.target.closest('.section-item').remove();
              
            }
           
        });
        
    });
  </script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>