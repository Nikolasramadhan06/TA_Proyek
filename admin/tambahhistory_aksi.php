<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang dikirim dari form
$nama_proyekselesai = $_POST['nama_proyekselesai'];
$alamat_proyekselesai = $_POST['alamat_proyekselesai'];
$anggaran_proyekselesai = $_POST['anggaran_proyekselesai'];
$keterangan = $_POST['keterangan'];

// sanitasi data untuk menghindari SQL Injection
$nama_proyekselesai = mysqli_real_escape_string($koneksi, $nama_proyekselesai);
$alamat_proyekselesai = mysqli_real_escape_string($koneksi, $alamat_proyekselesai);
$anggaran_proyekselesai = mysqli_real_escape_string($koneksi, $anggaran_proyekselesai);
$keterangan = mysqli_real_escape_string($koneksi, $keterangan);

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["foto_proyekselesai"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["foto_proyekselesai"]["tmp_name"]);
if($check !== false) {
    $uploadOk = 1;
} else {
    echo "FBerkas bukan gambar.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["foto_proyekselesai"]["size"] > 5000000) {
    echo "Maaf, berkas Anda terlalu besar.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Maaf, berkas Anda tidak terunggah.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["foto_proyekselesai"]["tmp_name"], $target_file)) {
        // File successfully uploaded, now insert data into database
        $foto_proyekselesai = basename($_FILES["foto_proyekselesai"]["name"]);
        
        // Ganti nama tabel dengan nama tabel yang sesuai di database Anda
        $sql = "INSERT INTO hostory (nama_proyekselesai, alamat_proyekselesai, anggaran_proyekselesai, keterangan, foto_proyekselesai) VALUES ('$nama_proyekselesai', '$alamat_proyekselesai', '$anggaran_proyekselesai', '$keterangan', '$foto_proyekselesai')";
        
        if (mysqli_query($koneksi, $sql)) {
            // mengalihkan halaman kembali ke tampil_history.php
            header("Location: tampil_history.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        }
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah file Anda";
    }
}

// menutup koneksi
mysqli_close($koneksi);
?>
