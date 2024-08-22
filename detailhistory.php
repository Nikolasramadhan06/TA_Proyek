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

foreach ($obj->results as $item) {
    $id = $item->id;
    $nama_proyekselesai = $item->nama_proyekselesai;
    $alamat_proyekselesai = $item->alamat_proyekselesai;
    $anggaran_proyekselesai = $item->anggaran_proyekselesai;
    $keterangan = $item->keterangan;
    $foto_proyekselesai = $item->foto_proyekselesai;
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
                  <h5>Rp. <?php echo $anggaran_proyekselesai ?></h5>
                </td>
              </tr>
              <tr>
                <td>Keterangan</td>
                <td>
                  <h5><?php echo $keterangan ?></h5>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-5" data-aos="zoom-in">
        <div class="panel panel-info panel-dashboard">
          <div class="panel-heading centered">
            <h2 class="panel-title"><strong>Foto Proyek</strong></h2>
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
  </div>
</section>
<!-- End about-info Area -->

<?php include "footer.php"; ?>
