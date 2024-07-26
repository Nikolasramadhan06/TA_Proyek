<?php include "header.php"; ?>
<!-- start banner Area -->
<section class="about-banner relative">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h2 class="text-white">
          History Proyek
        </h2>
        <p class="text-white link-nav">Halaman ini memuat informasi History Pembangunan Proyek</p>
      </div>
    </div>
  </div>
</section>
<!-- End banner Area -->

<!-- Start about-info Area -->
<section class="about-info-area section-gap">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 info-left">
        <img class="img-fluid" src="img/about/info-img.jpg" alt="">
      </div>
      <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
        <div class="col-md-12 mx-auto">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Proyek</th>
                      <th scope="col">Alamat</th>
                      <th scope="col">Anggaran</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $data = file_get_contents('http://localhost/SIG-CV_PUTRI_Naiz/ambilhistory.php');
                    $no = 1;
                    if ($data !== false) {
                      $obj = json_decode($data);
                      if ($obj !== null && isset($obj->results) && is_array($obj->results)) {
                        foreach ($obj->results as $item) {
                    ?>
                        <tr>
                          <th scope="row"><?php echo $no; ?></th>
                          <td><?php echo htmlspecialchars($item->nama_proyekselesai); ?></td>
                          <td><?php echo htmlspecialchars($item->alamat_proyekselesai); ?></td>
                          <td>Rp. <?php echo number_format($item->anggaran_proyekselesai, 0, ',', '.'); ?></td>
                          <td><?php echo htmlspecialchars($item->keterangan); ?></td>
                          <td>
                            <a href="detailhistory.php?id=<?php echo htmlspecialchars($item->id); ?>" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Detail dan Lokasi">
                              <i class="fa fa-map-marker"></i> Detail dan Lokasi
                            </a>
                          </td>
                        </tr>
                    <?php $no++;
                        }
                      } else {
                        echo "<tr><td colspan='5' class='text-center'>Data tidak ada atau format JSON tidak valid.</td></tr>";
                      }
                    } else {
                      echo "<tr><td colspan='5' class='text-center'>Gagal mengambil data dari server.</td></tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End about-info Area -->

<?php include "footer.php"; ?>
