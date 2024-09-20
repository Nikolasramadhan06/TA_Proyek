<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../tampil_data.php?pesan=belum_login");
}
include "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include "menu_sidebar.php"; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include "menu_topbar.php"; ?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card shadow mb-1">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Proyek CV. PUTRI NAIZ</h6>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                            <a class="fas fa-plus" href="tambah_data.php">
                            <span>Tambah Data</span>
                            </a>
                            <p></p>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama Proyek</th>
                                            <th>Alamat</th>
                                            <th>Anggaran</th>
                                            <th>Progres</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Foto 25%</th>
                                            <th>Foto 50%</th>
                                            <th>Foto 75%</th>
                                            <th>Foto 100%</th>
                                            <th>History</th>
                                            <th>Cetak</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        <?php
                        $no = 0;
                        $data = mysqli_query($koneksi, "SELECT * FROM proyek");
                        while ($d = mysqli_fetch_array($data)) {
                            $no++;
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><b><a href="detail_data.php?id_proyek=<?php echo $d['id_proyek']; ?>"> <?php echo $d['nama_proyek']; ?> </a></b></td>
                                <td><?php echo $d['alamat']; ?></td>
                                <td>Rp. <?php echo number_format($d['anggaran'], 0, ',', '.'); ?></td>
                                <td><?php echo $d['progres']; ?>%</td>
                                <td><?php echo $d['latitude']; ?></td>
                                <td><?php echo $d['longitude']; ?></td>
                                <td>
                                    <?php 
                                    if (!empty($d['tanggal_mulai'])) {
                                        echo date('d-m-Y', strtotime($d['tanggal_mulai']));
                                    } else {
                                        echo "-"; // Tampilkan tanda strip atau teks lain jika data kosong
                                    }
                                    ?>
                                    </td>
                                <td>
                                    <?php 
                                    if (!empty($d['tanggal_selesai'])) {
                                      echo date('d-m-Y', strtotime($d['tanggal_selesai']));
                                    } else {
                                        echo "-"; // Tampilkan tanda strip atau teks lain jika data kosong
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php if (!empty($d['foto_25'])): ?>
                                        <img src="../admin/uploads/<?php echo $d['foto_25']; ?>" alt="Foto 25%" style="width:100px; height:auto;">
                                    <?php else: ?>
                                        <span>Belum Tersedia</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (!empty($d['foto_50'])): ?>
                                        <img src="../admin/uploads/<?php echo $d['foto_50']; ?>" alt="Foto 50%" style="width:100px; height:auto;">
                                    <?php else: ?>
                                        <span>Belum Tersedia</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (!empty($d['foto_75'])): ?>
                                        <img src="../admin/uploads/<?php echo $d['foto_75']; ?>" alt="Foto 75%" style="width:100px; height:auto;">
                                    <?php else: ?>
                                        <span>Belum Tersedia</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (!empty($d['foto_100'])): ?>
                                        <img src="../admin/uploads/<?php echo $d['foto_100']; ?>" alt="Foto 100%" style="width:100px; height:auto;">
                                    <?php else: ?>
                                        <span>Belum Tersedia</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="tambah_history.php?id_proyek=<?php echo $d['id_proyek']; ?>" class="btn-sm  btn-success" ><span class='fas fa-check-double'> Selesai</span></a>
                                </td>
                                <td>
                                    <a href="cetak.php?id_proyek=<?php echo $d['id_proyek']; ?>" class="btn-sm  btn-primary" ><span class='fas fa-print'> Cetak</span></a>
                                </td>
                                <td>
                                    <a href="edit_data.php?id_proyek=<?php echo $d['id_proyek']; ?>" class="btn-sm btn-primary"><span class="fas fa-edit"> Ubah</span></a>
                                    <p></p>
                                    <a href="hapus_aksi.php?id_proyek=<?php echo $d['id_proyek']; ?>" class="btn-sm btn-danger"><span class="fas fa-trash"> Hapus</span></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                        </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "footer.php"; ?>

    </div>
    <!-- End of Page Wrapper -->