<?php
// Koneksi ke database
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

// Periksa apakah query berhasil dijalankan
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Tema</th>
                <th>Jumlah Restoran</th>
            </tr>";
    
    // Tampilkan data dalam tabel
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['tema'] . "</td>
                <td>" . $row['jumlah'] . "</td>
              </tr>";
    }
    
    echo "</table>";
} else {
    echo "Tidak ada data ditemukan";
}

// Tutup koneksi
$koneksi->close();
?>
