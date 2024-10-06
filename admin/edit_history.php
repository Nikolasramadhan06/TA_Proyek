<?php
include '../koneksi.php';

// Periksa apakah parameter ID ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Jalankan query SQL
    $query = mysqli_query($koneksi, "SELECT * FROM history_proyek WHERE id='$id'");

    // Periksa apakah query berhasil
    if ($query) {
        $data = mysqli_fetch_array($query);

        // Periksa apakah data ditemukan
        if ($data) {
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
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Data History</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="panel-body">
                                <form class="form-horizontal style-form" style="margin-top: 20px;" action="edithstory_aksi.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">ID Proyek</label>
                                        <div class="col-sm-8">
                                            <input name="id" type="text" id="id" class="form-control" value="<?php echo $data['id']; ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Nama Proyek</label>
                                        <div class="col-sm-8">
                                            <input name="nama_proyekselesai" type="text" id="nama_proyekselesai" class="form-control" value="<?php echo $data['nama_proyekselesai']; ?>" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                                        <div class="col-sm-8">
                                            <input name="alamat_proyekselesai" class="form-control" id="alamat_proyekselesai" type="text" value="<?php echo $data['alamat_proyekselesai']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Anggaran</label>
                                        <div class="col-sm-8">
                                            <input name="anggaran_proyekselesai" class="form-control" type="text" id="anggaran_proyekselesai" type="text" value="<?php echo $data['anggaran_proyekselesai']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Progres</label>
                                        <div class="col-sm-8">
                                            <input name="keterangan" class="form-control" id="keterangan" type="text" value="<?php echo $data['keterangan']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Tanggal Mulai</label>
                                        <div class="col-sm-8">
                                            <input name="tanggal_mulai" class="form-control" id="tanggal_mulai" type="date" value="<?php echo $data['tanggal_mulai']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Tanggal Selesai</label>
                                        <div class="col-sm-8">
                                            <input name="tanggal_selesai" class="form-control" id="tanggal_selesai" type="date" value="<?php echo $data['tanggal_selesai']; ?>" required />
                                        </div>
                                    </div>

                                    <!-- Foto -->
                                    <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                                        <div class="col-sm-8">
                                            <input name="foto_proyekselesai" type="file" id="foto_proyekselesai" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 20px;">
                                    <label class="col-sm-2 col-sm-2 control-label"></label>
                                        <div class="col-sm-8">
                                            <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                        </div>
                                    </div>
                                    <div style="margin-top: 20px;"></div>
                                </form>
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

<?php
        } else {
            echo "Data tidak ditemukan.";
        }
    } else {
        echo "Query gagal: " . mysqli_error($koneksi);
    }
} else {
    echo "Parameter ID tidak ditemukan.";
}
?>
