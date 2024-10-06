<?php
// Memanggil library FPDF
require('../libs/fpdf.php');
include '../koneksi.php';

// Ambil ID proyek dari URL
$id = $_GET['id'];

// Instance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('L', 'mm', 'A4'); // Mengubah ke Landscape
$pdf->AddPage();

// Fungsi untuk menambahkan kop surat di halaman
function addHeader($pdf) {
    $pdf->Image('../admin/img/naiz.png', 10, 10, 25); // Logo
    $pdf->SetFont('Times', 'B', 16);
    $pdf->Cell(0, 10, 'CV. PUTRI NAIZ', 0, 1, 'C');
    $pdf->SetFont('Times', '', 12);
    $pdf->Cell(0, 5, 'BLOK CABANG RT.09 RW.05 DESA RANCAMULYA GABUSWETAN - INDRAMAYU 45263', 0, 1, 'C');
    $pdf->Cell(0, 5, 'NPWP : 41.283.485.5-437.000', 0, 1, 'C');
    $pdf->Cell(0, 5, 'Email : putrinaizcv@gmail.com', 0, 1, 'C');
    $pdf->SetLineWidth(1);
    $pdf->Line(10, 40, 290, 40);
    $pdf->SetLineWidth(0.1);
    $pdf->Line(10, 42, 290, 42);
    $pdf->Ln(10); // Spasi
}

// Tambahkan kop surat di halaman pertama
addHeader($pdf);
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(0, 10, 'DATA PROYEK', 0, 1, 'C'); // Judul terpusat
$pdf->Ln(5); // Spasi sebelum tabel

// Set font untuk tabel headers
$pdf->SetFont('Times', 'B', 12);
$pdf->SetFillColor(200, 220, 255);
$pdf->Cell(33, 10, 'Nama Proyek', 1, 0, 'C', true);
$pdf->Cell(60, 10, 'Alamat', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Anggaran', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Latitude', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Longitude', 1, 0, 'C', true);
$pdf->Cell(33, 10, 'Tanggal Mulai', 1, 0, 'C', true);
$pdf->Cell(33, 10, 'Tanggal Selesai', 1, 1, 'C', true);

// Data tabel
$pdf->SetFont('Times', '', 12);
$query = "SELECT * FROM history_proyek WHERE id = '$id'";
$data = mysqli_query($koneksi, $query);

// Pastikan ada data yang diambil
if ($d = mysqli_fetch_array($data)) {
    $anggaran_proyekselesai = ($d['anggaran_proyekselesai']) ? 'Rp. ' . number_format($d['anggaran_proyekselesai'], 0, ',', '.') : 'Rp. 0';

    // Mengubah format tanggal ke tanggal-bulan-tahun
    $tanggal_mulai = date('d-m-Y', strtotime($d['tanggal_mulai']));
    $tanggal_selesai = date('d-m-Y', strtotime($d['tanggal_selesai']));

    $y = $pdf->GetY();
    $pdf->Cell(33, 30, $d['nama_proyekselesai'], 1);
    $pdf->SetXY(43, $y);
    $pdf->MultiCell(60, 10, $d['alamat_proyekselesai'], 1);
    $pdf->SetXY(103, $y);
    $pdf->Cell(40, 30, $anggaran_proyekselesai, 1);
    $pdf->Cell(40, 30, $d['latitude'], 1);
    $pdf->Cell(40, 30, $d['longitude'], 1);
    $pdf->Cell(33, 30, $tanggal_mulai, 1);
    $pdf->Cell(33, 30, $tanggal_selesai, 1);
    
    // Array foto dan tanggal untuk halaman selanjutnya
    $photos = ['foto_25', 'foto_50', 'foto_75', 'foto_100'];
    $dates = ['tgl_25', 'tgl_50', 'tgl_75', 'tgl_100'];

    foreach ($photos as $index => $photo) {
        $pdf->AddPage();
        addHeader($pdf);
        $photo_path = '../admin/uploads/' . $d[$photo];
        
        if (file_exists($photo_path)) {
            $img_width = 170; 
            $img_height = 100; 
            $x_center = ($pdf->GetPageWidth() - $img_width) / 2; 
            $pdf->Image($photo_path, $x_center, 60, $img_width, $img_height); 
            $pdf->SetXY($x_center, 160); // Posisi setelah gambar
            
            // Menambahkan keterangan tanggal di bawah foto
            $date = date('d-m-Y', strtotime($d[$dates[$index]])); // Format tanggal
            $pdf->Cell($img_width, 10, 'Tanggal: ' . $date, 0, 1, 'C'); // Menampilkan tanggal
            
            // Menambahkan keterangan foto
            $percentage = strtoupper(str_replace('foto_', '', $photo)) . '%'; // Menambahkan %
            $pdf->SetXY($x_center, 170); // Posisi untuk keterangan foto
            $pdf->Cell($img_width, 5, 'Foto ' . $percentage, 0, 1, 'C'); 
        } else {
            $pdf->Cell(0, 10, 'Gambar tidak tersedia', 0, 1, 'C');
        }
    }
} else {
    $pdf->Cell(0, 10, 'Proyek tidak ditemukan', 0, 1, 'C');
}

// Menyimpan dan menampilkan file PDF
$pdf->Output();
?>
