<?php
require('fpdf186/fpdf.php'); // Sesuaikan path ke file FPDF

include 'koneksi.php';
// Query untuk mendapatkan jumlah restoran berdasarkan tema
$id=$_POST['idrestoran'];
$query = "SELECT*FROM restoran where idrestoran=$id";
$result = $koneksi->query($query);
$fetch = $result->fetch_assoc();

// Membuat instance FPDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Menambahkan logo
$pdf->Image('IMG/logo-kapuas.jpg', 10, 10, 30);

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

// Menambahkan gambar restoran
$pdf->Image('../IMGresto/' . ($fetch["gbrestoran"] ?? '-'), 10, $pdf->GetY() + 10, 50);

// Menyimpan posisi X sebelum menambahkan tabel
$posisiXSebelumTabel = $pdf->GetX();

// Menambahkan tabel untuk menampilkan informasi restoran
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Informasi Restoran', 0, 1);
$pdf->SetFont('Arial', '', 12);

// Menyimpan posisi Y sebelum menambahkan tabel
$posisiYSebelumTabel = $pdf->GetY();

// Menambahkan nama restoran
$pdf->SetX($posisiXSebelumTabel + 50);
$pdf->Cell(60, 10, 'Nama Restoran: ' . ($fetch["namarestoran"] ?? '-'), 0, 1);

// Menggeser posisi X ke kanan untuk skor vector S
$pdf->SetX($posisiXSebelumTabel + 50);
$pdf->Cell(60, 10, 'Skor Vector S: ' . ($fetch["vectors"] ?? '-'), 0, 1);

// Menggeser posisi X ke kanan untuk skor vector V
$pdf->SetX($posisiXSebelumTabel + 50);
$pdf->Cell(60, 10, 'Skor Vector V: ' . ($fetch["vectorv"] ?? '-'), 0, 1);

// Menggeser posisi X ke kanan untuk alamat
// Menggeser posisi X ke kanan untuk alamat
$pdf->SetX($posisiXSebelumTabel + 50);
$pdf->MultiCell(0, 10, 'Alamat: ' . ($fetch["alamat"] ?? '-'), 0, 'L');


// Menyimpan posisi Y setelah menambahkan tabel
$posisiYSetelahTabel = $pdf->GetY();

// Mengatur posisi Y ke posisi Y sebelumnya
$pdf->SetY($posisiYSebelumTabel);

// Menambahkan deskripsi restoran
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY($posisiXSebelumTabel, $posisiYSetelahTabel + 10);
$pdf->Cell(0, 10, 'Deskripsi Restoran', 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->MultiCell(0, 10, ($fetch["deskripsi"] ?? '-'));

// Output PDF
$pdf->Output();
?>
