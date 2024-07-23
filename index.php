<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
  <!-- Meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="colorlib">
  <meta name="description" content="CV. PUTRI NAIZ">
  
  <!-- Title -->
  <title>CV. PUTRI NAIZ</title>
  <link rel="icon" href="admin/img/anaiz.png">
  <!-- Favicon -->
  <link rel="shortcut icon" href="img/fav.png">
  
  <!-- CSS -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="proyek-master/css/linearicons.css">
  <link rel="stylesheet" href="proyek-master/css/font-awesome.min.css">
  <link rel="stylesheet" href="proyek-master/css/bootstrap.css">
  <link rel="stylesheet" href="proyek-master/css/magnific-popup.css">
  <link rel="stylesheet" href="proyek-master/css/jquery-ui.css">
  <link rel="stylesheet" href="proyek-master/css/nice-select.css">
  <link rel="stylesheet" href="proyek-master/css/animate.min.css">
  <link rel="stylesheet" href="proyek-master/css/owl.carousel.css">
  <link rel="stylesheet" href="proyek-master/css/main.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  
  <!-- Leaflet.js -->
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
  <!-- Custom CSS for responsiveness -->
  <style>
    #map {
      width: 100%;
      height: 480px;
    }

    @media (max-width: 768px) {
      #map {
        height: 300px;
      }
    }
  </style>
</head>
<body>
<!-- Navbar with Bootstrap 5 and FontAwesome icon -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <a href="index.php"><img src="admin/img/anaiz.png" width="50px" height="50px" alt="" title="" /></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link"  href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="data_proyek.php">Data Proyek</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="history_proyek.php">History Proyek</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin/login.php">Login</a>
        </li>
    </ul>
    </div>
  </div>
</nav>



<!-- Banner Area -->
<section class="banner-area relative">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row fullscreen align-items-center justify-content-between">
      <div class="col-lg-6 col-md-6 banner-left">
        <h6 class="text-white">SISTEM INFORMASI GEOGRAFIS PROYEK</h6>
        <h1 class="text-white">CV. PUTRI NAIZ</h1>
        <p class="text-white">
          Sistem informasi ini merupakan aplikasi pemetaan geografis Pembangunan Proyek.
        </p>
        <a href="#peta_proyek" class="primary-btn text-uppercase">Lihat Detail</a>
      </div>
    </div>
  </div>
</section>

<section class="Sejarah">
  <div class="container">
    <div class="row">
      <div class="col">
        <h2><center> Sejarah Perusahaan </center></h2>
        <p></p>
        <p style="text-align: justify;">
        <?php
          include "koneksi.php";
          $data = mysqli_query($koneksi, "SELECT Sejarah FROM visi_misi");
          while ($d = mysqli_fetch_array($data)) {
              echo $d['Sejarah'];
          }
          ?>
        </p>
      </div>
    </div>
  </div>
</section>


<section class="visi-misi">
  <div class="container">
    <div class="row row-cols-2">
      <div class="col">
        <h2>Visi</h2>
        <p></p>
        <p style="text-align: justify;">
          <?php
          include "koneksi.php";
          $data = mysqli_query($koneksi, "SELECT visi FROM visi_misi");
          while ($d = mysqli_fetch_array($data)) {
              echo $d['visi'];
          }
          ?>
        </p>
      </div>
      <div class="col">
        <h2>Misi</h2>
        <p></p>
        <ul style="text-align: justify;">
          <?php
          $data = mysqli_query($koneksi, "SELECT misi1, misi2, misi3, misi4 FROM visi_misi");
          while ($d = mysqli_fetch_array($data)) {
            echo "<li>- " . $d['misi1'] . "</li>";
            echo "<li>- " . $d['misi2'] . "</li>";
            echo "<li>- " . $d['misi3'] . "</li>";
            echo "<li>- " . $d['misi4'] . "</li>";
          }
          ?>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- Main Content Area -->
<main id="main">
  <section class="price-area section-gap">
    <section id="peta_proyek" class="about-info-area section-gap">
      <div class="container">
        <div class="title text-center">
          <h1 class="mb-10">Peta Lokasi Pembangunan Proyek</h1>
          <br>
        </div>
        <div class="row align-items-center">
          <div id="map"></div>
          <script>
            function initialize() {
              var map = L.map('map').setView([-6.4736, 108.0629], 10.2);

              L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
              }).addTo(map);

              $.ajax({
                url: 'ambildata.php',
                dataType: 'json',
                success: function(response) {
                  for (var i = 0; i < response.results.length; i++) {
                    var data = response.results[i];
                    var marker = L.marker([data.latitude, data.longitude]).addTo(map)
                      .bindPopup('<b>' + data.nama_proyek + '</b><br>' + data.alamat);
                  }
                }
              });
            }

            document.addEventListener('DOMContentLoaded', initialize);
          </script>
        </div>
      </div>
    </section>
  </section>
</main>

<!-- jQuery and Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+alr9B3h3uYcaT+EmmEnR3CHDHHV5fFZB/7OuXOBMqlevTh" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyFjM6E8vgA1MtoIF0ZjNlEdXtzIUnxskB" crossorigin="anonymous"></script>

<!-- Footer -->
<?php include "footer.php"; ?>

</body>
</html>
