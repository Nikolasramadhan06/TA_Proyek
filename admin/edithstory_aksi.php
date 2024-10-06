<?php
// Koneksi database
include '../koneksi.php';

// Menangkap data yang dikirim dari form
$id = $_POST['id'];
$nama_proyekselesai = $_POST['nama_proyekselesai'];
$alamat_proyekselesai = $_POST['alamat_proyekselesai'];
$anggaran_proyekselesai = $_POST['anggaran_proyekselesai'];
$keterangan = $_POST['keterangan'];
$tanggal_mulai = $_POST['tanggal_mulai'];
$tanggal_selesai = $_POST['tanggal_selesai'];

// Fungsi untuk menangani upload file
function uploadFile($fileInputName, $currentFile) {
    if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] == 0) {
        $fileName = basename($_FILES[$fileInputName]["name"]);
        $targetFile = '../admin/uploads/' . $fileName;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Validasi file
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileType, $allowedTypes) && move_uploaded_file($_FILES[$fileInputName]["tmp_name"], $targetFile)) {
            return $fileName; // Return only the file name to store in database
        } else {
            return $currentFile; // Return current file if upload fails
        }
    }
    return $currentFile; // Return current file if no new file is uploaded
}

// Ambil data foto yang ada dari database
$query = mysqli_query($koneksi, "SELECT * FROM history_proyek WHERE id='$id'");
$data = mysqli_fetch_array($query);

// Menangani upload foto
$foto_proyekselesai = uploadFile('foto_proyekselesai', $data['foto_proyekselesai']);

// Menyiapkan query untuk update data
$updateQuery = "UPDATE history_proyek SET 
    nama_proyekselesai='$nama_proyekselesai', 
    alamat_proyekselesai='$alamat_proyekselesai', 
    anggaran_proyekselesai='$anggaran_proyekselesai', 
    keterangan='$keterangan', 
    foto_proyekselesai='$foto_proyekselesai',
    tanggal_mulai='$tanggal_mulai', 
    tanggal_selesai='$tanggal_selesai'
    WHERE id='$id'";

// Menjalankan query update dan menangani error
if (mysqli_query($koneksi, $updateQuery)) {
    // Mengalihkan halaman kembali ke tampil_history.php
    header("location:tampil_history.php");
    exit(); // Pastikan untuk menghentikan eksekusi skrip setelah pengalihan
} else {
    echo "Error updating record: " . mysqli_error($koneksi);
}
?>
