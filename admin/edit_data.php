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
                        <h1 class="h3 mb-0 text-gray-800">Edit Data Proyek</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
                        </div>
                        <div class="card-body">

                            <?php
                            include '../koneksi.php';
                            $id = $_GET['id_proyek'];
                            $query = mysqli_query($koneksi, "SELECT * FROM data_proyek WHERE id_proyek='$id'");
                            $data  = mysqli_fetch_array($query);
                            ?>

                            <!-- </div> -->
                            <div class="panel-body">
                                <form class="form-horizontal style-form" style="margin-top: 20px;" action="edit_aksi.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">ID Proyek</label>
                                        <div class="col-sm-8">
                                            <input name="id_proyek" type="text" id="id_proyek" class="form-control" value="<?php echo $data['id_proyek']; ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Nama Proyek</label>
                                        <div class="col-sm-8">
                                            <input name="nama_proyek" type="text" id="nama_proyek" class="form-control" value="<?php echo $data['nama_proyek']; ?>" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                                        <div class="col-sm-8">
                                            <input name="alamat" class="form-control" id="alamat" type="text" value="<?php echo $data['alamat']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
                                        <div class="col-sm-8">
                                            <input name="deskripsi" class="form-control" id="deskripsi" type="text" value="<?php echo $data['deskripsi']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Anggaran</label>
                                        <div class="col-sm-8">
                                            <input name="anggaran" class="form-control" type="text" id="anggaran" type="text" value="<?php echo $data['anggaran']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Progres</label>
                                        <div class="col-sm-8">
                                            <input name="progres" class="form-control" id="progres" type="text" value="<?php echo $data['progres']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Latitude</label>
                                        <div class="col-sm-8">
                                            <input name="latitude" class="form-control" id="latitude" type="text" value="<?php echo $data['latitude']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Longitude</label>
                                        <div class="col-sm-8">
                                            <input name="longitude" class="form-control" id="longitude" type="text" value="<?php echo $data['longitude']; ?>" required />
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
                                    <label class="col-sm-2 col-sm-2 control-label">Foto 25%</label>
                                        <div class="col-sm-8">
                                            <input name="foto_25" type="file" id="foto_25" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Tanggal 25%</label>
                                        <div class="col-sm-8">
                                        <input name="tgl_25" class="form-control" id="tgl_25" type="date" value="<?php echo isset($data['tgl_25']) ? $data['tgl_25'] : ''; ?>" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Foto 50%</label>
                                        <div class="col-sm-8">
                                            <input name="foto_50" type="file" id="foto_50" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Tanggal 50%</label>
                                        <div class="col-sm-8">
                                        <input name="tgl_50" class="form-control" id="tgl_50" type="date" value="<?php echo isset($data['tgl_50']) ? $data['tgl_50'] : ''; ?>" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Foto 75%</label>
                                        <div class="col-sm-8">
                                            <input name="foto_75" type="file" id="foto_75" class="form-control" />
                                        </div>
                                    </div>
                                    <label class="col-sm-2 col-sm-2 control-label">Tanggal 75%</label>
                                        <div class="col-sm-8">
                                        <input name="tgl_75" class="form-control" id="tgl_75" type="date" value="<?php echo isset($data['tgl_75']) ? $data['tgl_75'] : ''; ?>" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Foto 100%</label>
                                        <div class="col-sm-8">
                                            <input name="foto_100" type="file" id="foto_100" class="form-control" />
                                        </div>
                                    </div>
                                    <label class="col-sm-2 col-sm-2 control-label">Tanggal 100%</label>
                                        <div class="col-sm-8">
                                        <input name="tgl_100" class="form-control" id="tgl_100" type="date" value="<?php echo isset($data['tgl_100']) ? $data['tgl_100'] : ''; ?>" />
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
