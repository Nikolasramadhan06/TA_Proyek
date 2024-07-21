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
$lat = "";
$long = "";
foreach ($obj->results as $item) {
  $id_proyek .= $item->id_proyek;
  $nama_proyek .= $item->nama_proyek;
  $alamat .= $item->alamat;
  $deskripsi .= $item->deskripsi;
  $anggaran .= $item->anggaran;
  $lat .= $item->latitude;
  $long .= $item->longitude;
}

$title = "Detail dan Lokasi : " . $nama_proyek;
?>

<script>
  function initialize() {
    var myLatlng = [<?php echo $lat ?>, <?php echo $long ?>];
    var map = L.map('map-canvas').setView(myLatlng, 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var marker = L.marker(myLatlng).addTo(map)
      .bindPopup('<b><?php echo $nama_proyek ?></b><br><?php echo $alamat ?>')
      .openPopup();
  }

  window.onload = initialize;
</script>

<section class="about-banner relative">
  <div class="overlay overlay-bg"></div>
  <div class="container">				
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          About Us				
        </h1>	
        <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.html"> About Us</a></p>
      </div>	
    </div>
  </div>
</section>

<section class="about-info-area section-gap">
  <div class="container" style="padding-top: 120px;">
    <div class="row">
      <div class="col-md-7" data-aos="fade-up" data-aos-delay="200">
        <div class="panel panel-info panel-dashboard">
          <div class="panel-heading centered">
            <h2 class="panel-title"><strong>Informasi Proyek </strong></h4>
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
                <td>Anggaran</td>
                <td>
                  <h5><?php echo $anggaran ?></h5>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-5" data-aos="zoom-in">
        <div class="panel panel-info panel-dashboard">
          <div class="panel-heading centered">
            <h2 class="panel-title"><strong>Lokasi</strong></h4>
          </div>
          <div class="panel-body">
            <div id="map-canvas" style="width:100%;height:380px;"></div>
          </div>
        </div>
      </div>  
    </div>
  </div>
</section>

<?php include "footer.php"; ?>
