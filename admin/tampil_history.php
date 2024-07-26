<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../tampil_history.php?pesan=belum_login");
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

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Proyek CV. PUTRI NAIZ</h6>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                            <a class="fas fa-plus" href="tambah_history.php">
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
                                            <th>Keterangan</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        <?php
                        $no = 0;
                        $data = mysqli_query($koneksi, "SELECT * FROM hostory");
                        while ($d = mysqli_fetch_array($data)) {
                            $no++;
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><b><a href="detail_history.php?id=<?php echo $d['id']; ?>"> <?php echo $d['nama_proyekselesai']; ?> </a></b></td>
                                <td><?php echo $d['alamat_proyekselesai']; ?></td>
                                <td>Rp. <?php echo $d['anggaran_proyekselesai']; ?></td>
                                <td><?php echo $d['keterangan']; ?></td>
                                <td>
                                    <?php if (!empty($d['foto_proyekselesai'])): ?>
                                        <img src="uploads/<?php echo $d['foto_proyekselesai']; ?>" alt="Foto" style="width:100px; height:auto;">
                                    <?php else: ?>
                                        <span>Belum Tersedia</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="edit_history.php?id=<?php echo $d['id']; ?>" class="btn-sm btn-primary"><span class="fas fa-edit"></span></a>
                                    <a href="hapus_hapus.php?id_proyek=<?php echo $d['id']; ?>" class="btn-sm btn-danger"><span class="fas fa-trash"></span></a>
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