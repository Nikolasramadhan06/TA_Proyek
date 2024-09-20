<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location:../index.php');
} else {
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

                    <?php
                    $id = $_GET['id'];
                    $query = mysqli_query($koneksi, "select * from hostory where id='$id'");
                    $data  = mysqli_fetch_array($query);
                    ?>

                <?php } ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Detail Proyek <?php echo $data['nama_proyekselesai']; ?></h1>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Proyek</h6>
                        </div>
                        <div class="card-body">

                            <!-- </div> -->
                            <div class="panel-body">
                                <table id="example" class="table table-hover table-bordered">
                                    <tr>
                                        <td width="250">Nama Proyek</td>
                                        <td width="550"><?php echo $data['nama_proyekselesai']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td><?php echo $data['alamat_proyekselesai']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Anggaran</td>
                                        <td>Rp. <?php echo number_format($data['anggaran_proyekselesai'], 0, ',', '.'); ?></td>
                                    </tr>
                                    <tr>
                                    <td>Tanggal Mulai</td>
                                    <td><?php echo date('d-m-Y', strtotime($data['tanggal_mulai'])); ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Selesai</td>
                                    <td><?php echo date('d-m-Y', strtotime($data['tanggal_selesai'])); ?></td>
                                </tr>
                                <tr>
                                    <tr>
                                    <td>Foto 25%</td>
                                    <td>
                                        <?php if (!empty($data['foto_25'])): ?>
                                            <img src="uploads/<?php echo $data['foto_25']; ?>" class="img-thumbnail" width="200px" />
                                        <?php else: ?>
                                            Tidak ada foto
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Foto 50%</td>
                                    <td>
                                        <?php if (!empty($data['foto_50'])): ?>
                                            <img src="uploads/<?php echo $data['foto_50']; ?>" class="img-thumbnail" width="200px" />
                                        <?php else: ?>
                                            Tidak ada foto
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Foto 75%</td>
                                    <td>
                                        <?php if (!empty($data['foto_75'])): ?>
                                            <img src="uploads/<?php echo $data['foto_75']; ?>" class="img-thumbnail" width="200px" />
                                        <?php else: ?>
                                            Tidak ada foto
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Foto 100%</td>
                                    <td>
                                        <?php if (!empty($data['foto_100'])): ?>
                                            <img src="uploads/<?php echo $data['foto_100']; ?>" class="img-thumbnail" width="200px" />
                                        <?php else: ?>
                                            Tidak ada foto
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Foto Proyek Selesai</td>
                                    <td>
                                        <?php if (!empty($data['foto_proyekselesai'])): ?>
                                            <img src="uploads/<?php echo $data['foto_proyekselesai']; ?>" class="img-thumbnail" width="200px" />
                                        <?php else: ?>
                                            Tidak ada foto
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                </table>
                                <a href="cetak_history.php?id=<?php echo $data['id']; ?>" class="btn-sm  btn-primary" ><span class='fas fa-print'> Cetak</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
                <?php include "footer.php"; ?>
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
    </body>

    </html>