<?php include "header.php"; ?>
<?php
$id = $_GET['id_proyek'];
include_once "ambildata_id.php";
$obj = json_decode($data);

$id_proyek = "";
$nama_proyek = "";
$alamat = "";
$deskripsi = "";
$anggaran = "";
$tanggal_mulai = "";
$tanggal_selesai = "";
$lat = "";
$long = "";
$foto_25 = "";
$foto_50 = "";
$foto_75 = "";
$foto_100 = "";

foreach ($obj->results as $item) {
    $id_proyek = $item->id_proyek;
    $nama_proyek = $item->nama_proyek;
    $alamat = $item->alamat;
    $deskripsi = $item->deskripsi;
    $anggaran = $item->anggaran;
    $tanggal_mulai = $item->tanggal_mulai;
    $tanggal_selesai = $item->tanggal_selesai;
    $lat = $item->latitude;
    $long = $item->longitude;
    $foto_25 = $item->foto_25;
    $foto_50 = $item->foto_50;
    $foto_75 = $item->foto_75;
    $foto_100 = $item->foto_100;
}

$title = "Detail dan Lokasi : " . $nama_proyek;
?>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initMap"></script>

<script>
  function initialize() {
    var myLatlng = new google.maps.LatLng(<?php echo $lat ?>, <?php echo $long ?>);
    var mapOptions = {
      zoom: 13,
      center: myLatlng
    };

    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    var contentString = '<div id="content">' +
      '<div id="siteNotice">' +
      '</div>' +
      '<h1 id="firstHeading" class="firstHeading"><?php echo $nama_proyek ?></h1>' +
      '<div id="bodyContent">' +
      '<p><?php echo $alamat ?></p>' +
      '</div>' +
      '</div>';

    var infowindow = new google.maps.InfoWindow({
      content: contentString
    });

    var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Maps Info',
      icon: 'img/markermap.png'
    });
    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map, marker);
    });
  }

  google.maps.event.addDomListener(window, 'load', initialize);
</script>

<!-- start banner Area -->
<section class="about-banner relative">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h2 class="text-white">
          Detail Informasi Proyek Pembangunan
        </h2>
      </div>
    </div>
  </div>
</section>
<!-- End banner Area -->
<!-- Start about-info Area -->
<section class="about-info-area section-gap">
  <div class="container" style="padding-top: 120px;">
    <div class="row">
      <div class="col-md-7" data-aos="fade-up" data-aos-delay="200">
        <div class="panel panel-info panel-dashboard">
          <div class="panel-heading centered">
            <h2 class="panel-title"><strong>Informasi Proyek</strong></h2>
          </div>
          <div class="panel-body">
            <table class="table">
              <tr>
                <th>Detail</th>
              </tr>
              <tr>
                <td>Nama Proyek</td>
                <td>
                  <h5><?php echo $nama_proyek ?></h5>
                </td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>
                  <h5><?php echo $alamat ?></h5>
                </td>
              </tr>
              <tr>
                <td>Deskripsi</td>
                <td>
                  <h5><?php echo $deskripsi ?></h5>
                </td>
              </tr>
              <tr>
              <tr>
                <td>Tanggal Mulai</td>
                <td>
                <h5>
                  <?php
                    $tanggal_mulai = $item->tanggal_mulai;
                    echo date("d-m-Y", strtotime($tanggal_mulai));
                  ?>
                </h5>
              </td>
              </tr>
              <td>Tanggal Selesai</td>
              <td>
                <h5>
                  <?php
                    $tanggal_selesai = $item->tanggal_selesai;
                    echo date("d-m-Y", strtotime($tanggal_selesai));
                  ?>
                </h5>
              </td>
              <tr>
                <td>Anggaran</td>
                <td>
                  <h5>Rp. <?php echo number_format($item->anggaran, 0, ',', '.'); ?></h5>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-5" data-aos="zoom-in">
        <div class="panel panel-info panel-dashboard">
          <div class="panel-heading centered">
            <h2 class="panel-title"><strong>Lokasi</strong></h2>
            <p></p>
          </div>
          <div class="panel-body">
            <div id="map-canvas" style="width:100%;height:380px;"></div>
          </div>
        </div>
      </div>
    </div>
    <p></p>
    <div class="row" style="padding-top: 20px;">
      <div class="col-md-12">
        <div class="panel panel-info panel-dashboard">
          <div class="panel-heading centered">
            <h2 class="panel-title"><strong><center>Progres Gambar</center></strong></h2>
          </div>
          <p></p>
          <div class="panel-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Progres</th>
                  <th scope="col">Gambar</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>25%</td>
                  <td>
                    <?php if (!empty($foto_25)): ?>
                      <img src="admin/uploads/<?php echo $foto_25 ?>" alt="Progres 25%" style="width:100%; height:auto;">
                    <?php else: ?>
                      <span>Belum Tersedia</span>
                    <?php endif; ?>
                  </td>
                </tr>
                <tr>
                  <td>50%</td>
                  <td>
                    <?php if (!empty($foto_50)): ?>
                      <img src="admin/uploads/<?php echo $foto_50 ?>" alt="Progres 50%" style="width:100%; height:auto;">
                    <?php else: ?>
                      <span>Belum Tersedia</span>
                    <?php endif; ?>
                  </td>
                </tr>
                <tr>
                  <td>75%</td>
                  <td>
                    <?php if (!empty($foto_75)): ?>
                      <img src="admin/uploads/<?php echo $foto_75 ?>" alt="Progres 75%" style="width:100%; height:auto;">
                    <?php else: ?>
                      <span>Belum Tersedia</span>
                    <?php endif; ?>
                  </td>
                </tr>
                <tr>
                  <td>100%</td>
                  <td>
                    <?php if (!empty($foto_100)): ?>
                      <img src="admin/uploads/<?php echo $foto_100 ?>" alt="Progres 100%" style="width:100%; height:auto;">
                    <?php else: ?>
                      <span>Belum Tersedia</span>
                    <?php endif; ?>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End about-info Area -->
<?php include "footer.php"; ?>
