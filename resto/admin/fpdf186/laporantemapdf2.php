<?php
require('fpdf.php');
include '../koneksi.php';

// Query untuk mendapatkan jumlah restoran berdasarkan tema
$query = "
    SELECT t.tema, COUNT(r.idrestoran) as jumlah
    FROM tema t
    LEFT JOIN restoran r ON t.idtema = r.idtema
    GROUP BY t.idtema, t.tema
    ORDER BY t.tema
";

$result = $koneksi->query($query);


// Membuat instance FPDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

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
$pdf->Cell(0, 10, 'Laporan Tema Wisata Kuliner', 0, 1, 'L');
$pdf->Ln(10);

// Membuat header tabel
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(95, 10, 'Tema', 1);
$pdf->Cell(95, 10, 'Jumlah', 1);
$pdf->Ln();

// Menambahkan data ke tabel
$pdf->SetFont('Arial', '', 12);
while ($row = $result->fetch_assoc()) {
    $tema = $row['tema'] ?? '-';
    $jumlah = $row['jumlah'] ?? '-';
    $pdf->Cell(95, 10, $tema, 1);
    $pdf->Cell(95, 10, $jumlah, 1);
    $pdf->Ln();
}

// Output file PDF
$pdf->Output();
?>
