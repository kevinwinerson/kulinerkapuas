<?php
include 'koneksi.php';

$idlokasi = $_POST['idlokasi'];
$tema = $_POST['lokasi'];
$deskripsi = $_POST['deskripsi'];

$sql = "UPDATE lokasi SET lokasi = '".$tema."', deskripsi = '".$deskripsi."' WHERE idlokasi = '".$idlokasi."'";
 
$query = $koneksi->query($sql);

if ($query) {
    echo "<script>
        alert('Data Berhasil Disimpan');
        setTimeout(function() { window.location.href = window.location.origin + '/resto/admin/lokasi.php'; }, 10);
    </script>";
} else { 
    echo "<script>
        alert('Data Gagal Disimpan');
        setTimeout(function() { window.location.href = window.location.origin + '/resto/admin/lokasi.php'; }, 10);
    </script>";
}
?>
