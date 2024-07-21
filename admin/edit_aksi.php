<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id_proyek'];
$nama = $_POST['nama_proyek'];
$alamat = $_POST['alamat'];
$deskripsi = $_POST['deskripsi'];
$harga_anggaran = $_POST['harga_anggaran'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// update data ke database
mysqli_query($koneksi, "update proyek set nama_proyek='$nama', alamat='$alamat', deskripsi='$deskripsi', anggaran='$anggaran', latitude='$latitude', longitude='$longitude' where id_proyek='$id'");

// mengalihkan halaman kembali ke index.php
header("location:tampil_data.php");
