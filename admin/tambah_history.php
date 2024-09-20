<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../tampil_data.php?pesan=belum_login");
}
include "../koneksi.php";

// Mengambil data proyek berdasarkan ID
$id_proyek = $_GET['id_proyek'];
$query = mysqli_query($koneksi, "SELECT * FROM proyek WHERE id_proyek='$id_proyek'");
$data = mysqli_fetch_array($query);
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
                        <h1 class="h3 mb-0 text-gray-800">Tambah Data History</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                        </div>
                        <div class="card-body">
                            <!-- Main content -->
                            <!-- Form Edit History Proyek -->
<form class="form-horizontal style-form" style="margin-top: 10px;" action="tambahhistory_aksi.php" method="post" enctype="multipart/form-data" name="form2" id="form2">
    <!-- Hidden Input for ID Proyek -->
    <input type="hidden" name="id_proyek" value="<?php echo $data['id_proyek']; ?>" />

    <!-- Input Nama Proyek -->
    <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">Nama Proyek</label>
        <div class="col-sm-6">
            <input name="nama_proyekselesai" type="text" class="form-control" value="<?php echo $data['nama_proyek']; ?>" required />
        </div>
    </div>
    
    <!-- Input Alamat Proyek -->
    <div class="form-group">
        <label class="col-sm-2 col-sm-4 control-label">Alamat</label>
        <div class="col-sm-6">
            <input name="alamat_proyekselesai" class="form-control" type="text" value="<?php echo $data['alamat']; ?>" required />
        </div>
    </div>
    
    <!-- Input Anggaran Proyek -->
    <div class="form-group">
        <label class="col-sm-2 col-sm-4 control-label">Anggaran</label>
        <div class="col-sm-6">
            <input name="anggaran_proyekselesai" class="form-control" type="text" value="<?php echo $data['anggaran']; ?>" required />
        </div>
    </div>
    
    <!-- Input Keterangan -->
    <div class="form-group">
        <label class="col-sm-2 col-sm-4 control-label">Keterangan</label>
        <div class="col-sm-6">
            <input name="keterangan" class="form-control" type="text" placeholder="Progres" required />
        </div>
    </div>
    
    <!-- Input Latitude -->
    <div class="form-group">
        <label class="col-sm-2 col-sm-4 control-label">Latitude</label>
        <div class="col-sm-6">
            <input name="latitude" class="form-control" type="text" value="<?php echo $data['latitude']; ?>" required />
        </div>
    </div>
    
    <!-- Input Longitude -->
    <div class="form-group">
        <label class="col-sm-2 col-sm-4 control-label">Longitude</label>
        <div class="col-sm-6">
            <input name="longitude" class="form-control" type="text" value="<?php echo $data['longitude']; ?>" required />
        </div>
    </div>
    
    <!-- Menampilkan Foto 25% -->
    <div class="form-group">
        <label class="col-sm-2 col-sm-4 control-label">Foto 25%</label>
        <div class="col-sm-6">
            <img src="uploads/<?php echo $data['foto_25']; ?>" class="img-thumbnail" width="200px" />
        </div>
    </div>
    
    <!-- Menampilkan Foto 50% -->
    <div class="form-group">
        <label class="col-sm-2 col-sm-4 control-label">Foto 50%</label>
        <div class="col-sm-6">
            <img src="uploads/<?php echo $data['foto_50']; ?>" class="img-thumbnail" width="200px" />
        </div>
    </div>
    
    <!-- Menampilkan Foto 75% -->
    <div class="form-group">
        <label class="col-sm-2 col-sm-4 control-label">Foto 75%</label>
        <div class="col-sm-6">
            <img src="uploads/<?php echo $data['foto_75']; ?>" class="img-thumbnail" width="200px" />
        </div>
    </div>
    
    <!-- Menampilkan Foto 100% -->
    <div class="form-group">
        <label class="col-sm-2 col-sm-4 control-label">Foto 100%</label>
        <div class="col-sm-6">
            <img src="uploads/<?php echo $data['foto_100']; ?>" class="img-thumbnail" width="200px" />
        </div>
    </div>

    <!-- Input Foto Proyek Selesai -->
    <div class="form-group">
        <label class="col-sm-2 col-sm-4 control-label">Unggah Foto Proyek Selesai</label>
        <div class="col-sm-6">
            <input type="file" name="foto_proyekselesai" class="form-control" required />
        </div>
    </div>
    
    <!-- Submit Button -->
    <div class="form-group" style="margin-bottom: 20px;">
        <label class="col-sm-2 col-sm-4 control-label"></label>
        <div class="col-sm-8">
            <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />
        </div>
    </div>
</form>


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
