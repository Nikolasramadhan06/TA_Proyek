<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$nama = $_POST['nama_proyek'];
$alamat = $_POST['alamat'];
$deskripsi = $_POST['deskripsi'];
$anggaran = $_POST['anggaran'];
$progres = $_POST['progres'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// sanitasi data untuk menghindari SQL Injection
$nama = mysqli_real_escape_string($koneksi, $nama);
$alamat = mysqli_real_escape_string($koneksi, $alamat);
$deskripsi = mysqli_real_escape_string($koneksi, $deskripsi);
$anggaran = mysqli_real_escape_string($koneksi, $anggaran);
$progres = mysqli_real_escape_string($koneksi, $progres);
$latitude = mysqli_real_escape_string($koneksi, $latitude);
$longitude = mysqli_real_escape_string($koneksi, $longitude);

// menginput data ke database
$sql = "INSERT INTO proyek (nama_proyek, alamat, deskripsi, anggaran, latitude, longitude, progres) VALUES ('$nama', '$alamat', '$deskripsi', '$anggaran', '$latitude', '$longitude', '$progres')";

if (mysqli_query($koneksi, $sql)) {
    // mengalihkan halaman kembali ke tampil_data.php
    header("Location: tampil_data.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

// menutup koneksi
mysqli_close($koneksi);
?>
