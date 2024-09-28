<?php include "header.php"; ?>

<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
include_once "ambilhistory_id.php";
$obj = json_decode($data);

$id = "";
$nama_proyekselesai = "";
$alamat_proyekselesai = "";
$anggaran_proyekselesai = "";
$keterangan = "";
$foto_proyekselesai = "";
$tanggal_mulai = "";
$tanggal_selesai = "";
$foto_25 = "";
$foto_50 = "";
$foto_75 = "";
$foto_100 = "";


foreach ($obj->results as $item) {
    $id = $item->id;
    $nama_proyekselesai = $item->nama_proyekselesai;
    $alamat_proyekselesai = $item->alamat_proyekselesai;
    $anggaran_proyekselesai = $item->anggaran_proyekselesai;
    $keterangan = $item->keterangan;
    $foto_proyekselesai = $item->foto_proyekselesai;
    $tanggal_mulai = $item->tanggal_mulai;
    $tanggal_selesai = $item->tanggal_selesai;
    $foto_25 = !empty($item->foto_25) ? $item->foto_25 : "";
    $foto_50 = !empty($item->foto_50) ? $item->foto_50 : "";
    $foto_75 = !empty($item->foto_75) ? $item->foto_75 : "";
    $foto_100 = !empty($item->foto_100) ? $item->foto_100 : "";
}

$title = "Detail dan Lokasi : " . $nama_proyekselesai;
?>

<!-- start banner Area -->
<section class="about-banner relative">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h2 class="text-white">
          Detail History Proyek Pembangunan
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
                  <h5><?php echo $nama_proyekselesai ?></h5>
                </td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>
                  <h5><?php echo $alamat_proyekselesai ?></h5>
                </td>
              </tr>
              <tr>
                <td>Anggaran</td>
                <td>
                  <h5>Rp. <?php echo number_format($item->anggaran_proyekselesai, 0, ',', '.'); ?></h5>
                </td>
              </tr>
              <tr>
                <td>Keterangan</td>
                <td>
                  <h5><?php echo $keterangan ?></h5>
                </td>
              </tr>
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
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-5" data-aos="zoom-in">
        <div class="panel panel-info panel-dashboard">
          <div class="panel-heading centered">
            <h2 class="panel-title"><strong>Foto Akhir Proyek</strong></h2>
            <p></p>
          </div>
          <div class="panel-body">
            <?php if (!empty($foto_proyekselesai)): ?>
              <img src="admin/uploads/<?php echo $foto_proyekselesai ?>" alt="Foto Proyek Selesai" style="width:100%; height:auto;">
            <?php else: ?>
              <span>Foto tidak tersedia</span>
            <?php endif; ?>
          </div>
        </div>
      </div>
  </div>
  <p></p>
  <div class="col-md-5" data-aos="zoom-in">
    <div class="panel panel-info panel-dashboard">
        <div class="panel-heading centered">
            <h2 class="panel-title"><strong>Foto Progres Proyek</strong></h2>
        </div>
        <div class="panel-body">
            <label>
                <input type="checkbox" id="showAllPhotos" onclick="togglePhotos()"> Tampilkan Semua Foto Progres
            </label>
            <div class="row" style="padding-top: 20px;">
                <div id="photosContainer" style="display: none;"> 
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Progres</th>
                                <th scope="col">Gambar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>25%</</td>
                                <td>
                                    <img id="foto_25" src="admin/uploads/<?php echo $foto_25; ?>" alt="Foto 25%" style="width:100%; height:auto;">
                                </td>
                            </tr>
                            <tr>
                                <td>50%</td>
                                <td>
                                    <img id="foto_50" src="admin/uploads/<?php echo $foto_50; ?>" alt="Foto 50%" style="width:100%; height:auto;">
                                </td>
                            </tr>
                            <tr>
                                <td>75%</td>
                                <td>
                                    <img id="foto_75" src="admin/uploads/<?php echo $foto_75; ?>" alt="Foto 75%" style="width:100%; height:auto;">
                                </td>
                            </tr>
                            <tr>
                                <td>100%</td>
                                <td>
                                    <img id="foto_100" src="admin/uploads/<?php echo $foto_100; ?>" alt="Foto 100%" style="width:100%; height:auto;">
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

<script>
    function togglePhotos() {
        const isChecked = document.getElementById('showAllPhotos').checked;

        // Tampilkan atau sembunyikan seluruh container tabel dan foto
        const photosContainer = document.getElementById('photosContainer');
        
        if (isChecked) {
            photosContainer.style.display = 'block'; 
        } else {
            photosContainer.style.display = 'none'; 
        }
    }
</script>


