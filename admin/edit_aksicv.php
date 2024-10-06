<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id'];
$Sejarah = $_POST['Sejarah'];
$Visi = $_POST['Visi'];
$Misi1 = $_POST['Misi1'];
$Misi2 = $_POST['Misi2'];
$Misi3 = $_POST['Misi3'];
$Misi4 = $_POST['Misi4'];

// update data ke database
mysqli_query($koneksi, "update profil_perusahaan set Sejarah='$Sejarah', Visi='$Visi', Misi1='$Misi1', Misi2='$Misi2', Misi3='$Misi3', Misi4='$Misi4' where id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:profile_cv.php");
