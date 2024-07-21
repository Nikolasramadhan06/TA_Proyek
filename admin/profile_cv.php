<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../profile_cv.php?pesan=belum_login");
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
                            <h6 class="m-0 font-weight-bold text-primary">Profile CV. PUTRI NAIZ</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sejarah</th>
                                            <th>Visi</th>
                                            <th>Misi1</th>
                                            <th>Misi2</th>
                                            <th>Misi3</th>
                                            <th>Misi4</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        $data = mysqli_query($koneksi, "select * from visi_misi");
                                        while ($d = mysqli_fetch_array($data)) {
                                            $no++;
                                        ?>
                                            <tr>
                                                <td><?php echo $d['Sejarah']; ?></td>
                                                <td><?php echo $d['Visi']; ?></td>
                                                <td><?php echo $d['Misi1']; ?></td>
                                                <td><?php echo $d['Misi2']; ?></td>
                                                <td><?php echo $d['Misi3']; ?></td>
                                                <td><?php echo $d['Misi4']; ?></td>
                                                <td>
                                                    <a href="edit_datacv.php?id=<?php echo $d['id']; ?> " class="btn-sm btn-primary"><span class="fas fa-edit"></a>
                                                </td>
                                            </tr>
                            </div>
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