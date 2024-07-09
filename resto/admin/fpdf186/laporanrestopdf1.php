<?php
require('fpdf.php');



// Koneksi ke database
include '../koneksi.php';

$query = "SELECT * FROM restoran ORDER BY vectorv DESC";
$result = $koneksi->query($query);

// Membuat instance dari kelas FPDF
$pdf = new FPDF();
$pdf->AddPage();

// Menambahkan logo
$pdf->Image('../IMG/logo-kapuas.jpg', 10, 10, 30);

// Menambahkan teks di samping logo
$pdf->SetFont('Arial', 'B', 16); // Ukuran font lebih besar
$pdf->SetXY(30, 15); // Memulai posisi X setelah logo dengan jarak
$judul = "Dinas Perdagangan, Perindustrian, Koperasi\nDan Usaha Kecil Menengah\nKabupaten Kapuas";

// Mengatur posisi untuk teks yang di tengah
$pdf->MultiCell(0, 10, $judul, 0, 'C');

// Menambahkan alamat di bawah logo dan teks titel
$pdf->SetXY(10, 55); // Posisi alamat dibawah logo dan judul
$pdf->SetFont('Arial', '', 12);
$alamat = "Jl. Tambun Bungai No.7, Selat Hilir, Kec. Selat, Kabupaten Kapuas, Kalimantan Tengah 73516";
$pdf->MultiCell(0, 10, $alamat, 0, 'C');

$pdf->Ln(10);

// Membuat garis
$pdf->Line(10, 70, 200, 70);
$pdf->Ln(10);

// Menambahkan judul laporan
$pdf->SetFont('Arial', '', 14);
$pdf->Cell(0, 10, 'Laporan Peringkat Restoran Berdasarkan Metode Weight Product', 0, 1, 'L');
$pdf->Ln(10);

// Menambahkan tabel
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(30, 10, 'ID Restoran', 1);
$pdf->Cell(90, 10, 'Nama Restoran', 1);
$pdf->Cell(30, 10, 'Vector S', 1);
$pdf->Cell(30, 10, 'Vector V', 1);
$pdf->Ln();

$pdf->SetFont('Arial', '', 12);
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(30, 10, $row['idrestoran'] ?? '-', 1);
    $pdf->Cell(90, 10, $row['namarestoran'] ?? '-', 1);
    $pdf->Cell(30, 10, $row['vectors'] ?? '-', 1);
    $pdf->Cell(30, 10, $row['vectorv'] ?? '-', 1);
    $pdf->Ln();
}

// Output file PDF
$pdf->Output();
?>
