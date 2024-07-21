<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$nama = $_POST['nama_proyek'];
$alamat = $_POST['alamat'];
$deskripsi = $_POST['deskripsi'];
$anggaran = $_POST['anggaran'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// menginput data ke database
mysqli_query($koneksi, "insert into proyek values('','$nama','$alamat','$deskripsi','$anggaran','$latitude','$longitude')");

// mengalihkan halaman kembali ke index.php
header("location:tampil_data.php");
