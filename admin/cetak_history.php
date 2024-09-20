<?php
// Memanggil library FPDF
require('../libs/fpdf.php');
include '../koneksi.php';

// Ambil ID proyek dari URL
$id_proyek = isset($_GET['id']) ? $_GET['id'] : null;

// Jika ID proyek tidak ada, kembalikan pesan error
if ($id_proyek === null) {
    die('ID proyek tidak ditemukan');
}

// Instance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

// Set font untuk judul
$pdf->SetFont('Times', 'B', 13);
$pdf->Cell(0, 10, 'DATA PROYEK', 0, 1, 'C');

// Set font untuk tabel headers
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(200, 220, 255);

// Judul tabel
$pdf->Cell(31, 10, 'Nama Proyek', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Alamat', 1, 0, 'C', true);
$pdf->Cell(35, 10, 'Anggaran', 1, 0, 'C', true);
$pdf->Cell(37, 10, 'Latitude', 1, 0, 'C', true);
$pdf->Cell(37, 10, 'Longitude', 1, 1, 'C', true);

// Data tabel
$pdf->SetFont('Arial', '', 10);

// Query untuk mengambil data proyek berdasarkan ID
$query = "SELECT * FROM hostory WHERE id = '$id_proyek'";
$data = mysqli_query($koneksi, $query);

// Pastikan ada data yang diambil
if ($data = mysqli_fetch_array($data)) {
    // Memeriksa jika ada data yang hilang
    $missingData = false;

    // Memeriksa jika data kosong
    if (empty($data['nama_proyekselesai']) || empty($data['alamat_proyekselesai']) || empty($data['anggaran_proyekselesai']) || empty($data['latitude']) || empty($data['longitude'])) {
        $missingData = true;
    }

    // Memeriksa jika foto kosong
    if (empty($data['foto_25']) || empty($data['foto_50']) || empty($data['foto_75']) || empty($data['foto_100'])) {
        $missingData = true;
    }

    if ($missingData) {
        $pdf->Cell(0, 10, 'Data atau gambar tidak lengkap', 0, 1, 'C');
    } else {
        // Mengatur lebar kolom dengan baik
        $anggaran = ($data['anggaran_proyekselesai']) ? 'Rp. ' . number_format($data['anggaran_proyekselesai'], 0, ',', '.') : 'Rp. 0';

        // Simpan posisi awal Y
        $y = $pdf->GetY();
        
        // Menampilkan data
        $pdf->Cell(31, 30, $data['nama_proyekselesai'], 1);
        
        // Menampilkan alamat dengan MultiCell
        $pdf->SetXY(41, $y);
        $pdf->MultiCell(50, 10, $data['alamat_proyekselesai'], 1);
        
        // Pindah ke posisi X dan Y setelah MultiCell
        $pdf->SetXY(91, $y);
        $pdf->Cell(35, 30, $anggaran, 1);
        $pdf->Cell(37, 30, $data['latitude'], 1);
        $pdf->Cell(37, 30, $data['longitude'], 1);

        // Pindah ke baris berikutnya
        $pdf->Ln(50); // Mengurangi jarak sebelum gambar

        // Padding gambar
        $padding = 10; // Jarak antara gambar dengan teks atau batas halaman
        $imgWidth = 90; // Lebar gambar (ubah sesuai kebutuhan)
        $imgHeight = 60; // Tinggi gambar (ubah sesuai kebutuhan)

        // Menambahkan gambar dari direktori
        $foto_25 = $data['foto_25']; // Nama file untuk gambar 25%
        $foto_50 = $data['foto_50']; // Nama file untuk gambar 50%
        $foto_75 = $data['foto_75']; // Nama file untuk gambar 75%
        $foto_100 = $data['foto_100']; // Nama file untuk gambar 100%

        // Path gambar
        $foto_25_path = '../admin/uploads/' . $foto_25;
        $foto_50_path = '../admin/uploads/' . $foto_50;
        $foto_75_path = '../admin/uploads/' . $foto_75;
        $foto_100_path = '../admin/uploads/' . $foto_100;

        // Menyimpan posisi Y untuk gambar
        $y = $pdf->GetY(); // Posisi vertikal untuk gambar

        // Menambahkan gambar foto_25 jika tersedia
        if (file_exists($foto_25_path)) {
            $x = 10; // Posisi horizontal untuk foto_25
            $pdf->Image($foto_25_path, $x, $y, $imgWidth, $imgHeight);
            $pdf->SetXY($x, $y + $imgHeight + 2); // Posisi keterangan di bawah gambar
            $pdf->Cell($imgWidth, 10, 'Foto 25%', 0, 0, 'C');
        } else {
            $pdf->Cell($imgWidth, $imgHeight, 'Gambar Tidak Tersedia', 1);
            $pdf->SetXY($x, $y + $imgHeight + 2); // Posisi keterangan di bawah sel kosong
            $pdf->Cell($imgWidth, 10, 'Foto 25%', 0, 0, 'C');
        }

        // Menambahkan gambar foto_50 jika tersedia
        if (file_exists($foto_50_path)) {
            $x = 10 + $imgWidth + $padding; // Posisi horizontal untuk foto_50
            $pdf->Image($foto_50_path, $x, $y, $imgWidth, $imgHeight);
            $pdf->SetXY($x, $y + $imgHeight + 2); // Posisi keterangan di bawah gambar
            $pdf->Cell($imgWidth, 10, 'Foto 50%', 0, 0, 'C');
        } else {
            $pdf->Cell($imgWidth, $imgHeight, 'Gambar Tidak Tersedia', 1);
            $pdf->SetXY($x, $y + $imgHeight + 2); // Posisi keterangan di bawah sel kosong
            $pdf->Cell($imgWidth, 10, 'Foto 50%', 0, 0, 'C');
        }

        // Pindah ke posisi Y untuk baris berikutnya
        $y += $imgHeight + 15; // Menggeser ke bawah untuk baris gambar berikutnya

        // Menambahkan gambar foto_75 jika tersedia
        if (file_exists($foto_75_path)) {
            $x = 10; // Posisi horizontal untuk foto_75
            $pdf->Image($foto_75_path, $x, $y, $imgWidth, $imgHeight);
            $pdf->SetXY($x, $y + $imgHeight + 2); // Posisi keterangan di bawah gambar
            $pdf->Cell($imgWidth, 10, 'Foto 75%', 0, 0, 'C');
        } else {
            $pdf->Cell($imgWidth, $imgHeight, 'Gambar Tidak Tersedia', 1);
            $pdf->SetXY($x, $y + $imgHeight + 2); // Posisi keterangan di bawah sel kosong
            $pdf->Cell($imgWidth, 10, 'Foto 75%', 0, 0, 'C');
        }

        // Menambahkan gambar foto_100 jika tersedia
        if (file_exists($foto_100_path)) {
            $x = 10 + $imgWidth + $padding; // Posisi horizontal untuk foto_100
            $pdf->Image($foto_100_path, $x, $y, $imgWidth, $imgHeight);
            $pdf->SetXY($x, $y + $imgHeight + 2); // Posisi keterangan di bawah gambar
            $pdf->Cell($imgWidth, 10, 'Foto 100%', 0, 0, 'C');
        } else {
            $pdf->Cell($imgWidth, $imgHeight, 'Gambar Tidak Tersedia', 1);
            $pdf->SetXY($x, $y + $imgHeight + 2); // Posisi keterangan di bawah sel kosong
            $pdf->Cell($imgWidth, 10, 'Foto 100%', 0, 0, 'C');
        }
    }
} else {
    $pdf->Cell(0, 10, 'Proyek tidak ditemukan', 0, 1, 'C');
}

// Output file PDF
$pdf->Output();
?>
