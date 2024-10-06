<?php
// Koneksi database
include '../koneksi.php';

// Menangkap data yang dikirim dari form
$id = $_POST['id_proyek'];
$nama = $_POST['nama_proyek'];
$alamat = $_POST['alamat'];
$deskripsi = $_POST['deskripsi'];
$anggaran = $_POST['anggaran'];
$progres = $_POST['progres'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$tanggal_mulai = $_POST['tanggal_mulai'];
$tanggal_selesai = $_POST['tanggal_selesai'];
$tgl_25 = $_POST['tgl_25'];
$tgl_50 = $_POST['tgl_50'];
$tgl_75 = $_POST['tgl_75'];
$tgl_100 = $_POST['tgl_100'];


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
$query = mysqli_query($koneksi, "SELECT * FROM data_proyek WHERE id_proyek='$id'");
$data = mysqli_fetch_array($query);

// Menangani upload foto
$foto25 = uploadFile('foto_25', $data['foto_25']);
$foto50 = uploadFile('foto_50', $data['foto_50']);
$foto75 = uploadFile('foto_75', $data['foto_75']);
$foto100 = uploadFile('foto_100', $data['foto_100']);



// Update data ke database
$updateQuery = "UPDATE data_proyek SET 
    nama_proyek='$nama', 
    alamat='$alamat', 
    deskripsi='$deskripsi', 
    anggaran='$anggaran', 
    progres='$progres', 
    latitude='$latitude', 
    longitude='$longitude', 
    foto_25='$foto25',
    foto_50='$foto50',
    foto_75='$foto75',
    foto_100='$foto100',
    tanggal_mulai='$tanggal_mulai', 
    tanggal_selesai='$tanggal_selesai',
    tgl_25='$tgl_25',
    tgl_50='$tgl_50',
    tgl_75='$tgl_75',
    tgl_100='$tgl_100'
    WHERE id_proyek='$id'";

// Memeriksa dan menambahkan tanggal jika ada
if (!empty($tgl_25)) {
    $updateFields[] = "tgl_25='$tgl_25'";
}
if (!empty($tgl_50)) {
    $updateFields[] = "tgl_50='$tgl_50'";
}
if (!empty($tgl_75)) {
    $updateFields[] = "tgl_75='$tgl_75'";
}
if (!empty($tgl_100)) {
    $updateFields[] = "tgl_100='$tgl_100'";
}

// Menggabungkan fields untuk query
$updateQuery = "UPDATE data_proyek SET " . implode(", ", $updateFields) . " WHERE id_proyek='$id'";

// Eksekusi query
mysqli_query($koneksi, $updateQuery);


// Mengalihkan halaman kembali ke tampil_data.php
header("location:tampil_data.php");
exit(); // Pastikan untuk menghentikan eksekusi skrip setelah pengalihan
?>
