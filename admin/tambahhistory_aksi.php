<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../tampil_data.php?pesan=belum_login");
}
include "../koneksi.php";

// Memeriksa apakah 'id_proyek' ada di POST
if (isset($_POST['id_proyek']) && !empty($_POST['id_proyek'])) {
    $id_proyek = $_POST['id_proyek'];
} else {
    die("Error: ID proyek tidak ditemukan.");
}

// Mengambil data proyek berdasarkan ID
$query = mysqli_query($koneksi, "SELECT * FROM proyek WHERE id_proyek='$id_proyek'");
$data = mysqli_fetch_array($query);

if (!$data) {
    die("Error: Data proyek tidak ditemukan.");
}

// Proses upload dan penyimpanan data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Menangkap data yang dikirim dari form
    $nama_proyekselesai = $_POST['nama_proyekselesai'];
    $alamat_proyekselesai = $_POST['alamat_proyekselesai'];
    $anggaran_proyekselesai = $_POST['anggaran_proyekselesai'];
    $keterangan = $_POST['keterangan'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];

    // Sanitasi data untuk menghindari SQL Injection
    $nama_proyekselesai = mysqli_real_escape_string($koneksi, $nama_proyekselesai);
    $alamat_proyekselesai = mysqli_real_escape_string($koneksi, $alamat_proyekselesai);
    $anggaran_proyekselesai = mysqli_real_escape_string($koneksi, $anggaran_proyekselesai);
    $keterangan = mysqli_real_escape_string($koneksi, $keterangan);
    $latitude = mysqli_real_escape_string($koneksi, $latitude);
    $longitude = mysqli_real_escape_string($koneksi, $longitude);
    $tanggal_mulai = mysqli_real_escape_string($koneksi, $tanggal_mulai);
    $tanggal_selesai = mysqli_real_escape_string($koneksi, $tanggal_selesai);

    // Mengambil data foto 25, 50, 75, dan 100 dari proyek (jika ada)
    $foto_25 = $data['foto_25'];
    $foto_50 = $data['foto_50'];
    $foto_75 = $data['foto_75'];
    $foto_100 = $data['foto_100'];
    $tanggal_mulai = $data['tanggal_mulai'];
    $tanggal_selesai = $data['tanggal_selesai'];

    // Upload file untuk foto_proyekselesai (jika ada)
    $foto_proyekselesai = null;
    if (isset($_FILES["foto_proyekselesai"]) && $_FILES["foto_proyekselesai"]["error"] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["foto_proyekselesai"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $uploadOk = 1;

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["foto_proyekselesai"]["tmp_name"]);
        if ($check === false) {
            echo "File bukan gambar.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["foto_proyekselesai"]["size"] > 5000000) {
            echo "Maaf, berkas Anda terlalu besar.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Maaf, hanya format JPG, JPEG, PNG & GIF yang diperbolehkan.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["foto_proyekselesai"]["tmp_name"], $target_file)) {
                $foto_proyekselesai = basename($_FILES["foto_proyekselesai"]["name"]);
            } else {
                echo "Maaf, terjadi kesalahan saat mengunggah file Anda.";
            }
        }
    }

    // Insert data ke dalam tabel history
    $sql = "INSERT INTO hostory (nama_proyekselesai, alamat_proyekselesai, anggaran_proyekselesai, keterangan, latitude, longitude, tanggal_mulai, tanggal_selesai, foto_25, foto_50, foto_75, foto_100, foto_proyekselesai) 
            VALUES ('$nama_proyekselesai', '$alamat_proyekselesai', '$anggaran_proyekselesai', '$keterangan', '$latitude', '$longitude', 'tanggal_mulai', 'tanggal_selesai', '$foto_25', '$foto_50', '$foto_75', '$foto_100', '$foto_proyekselesai')";

    if (mysqli_query($koneksi, $sql)) {
        // Mengalihkan halaman kembali ke tampil_history.php
        header("Location: tampil_history.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    // Menutup koneksi
    mysqli_close($koneksi);
}
?>
