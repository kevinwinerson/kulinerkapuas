<?php
include 'koneksi.php';

$idtema = $_POST['idtema'];
$tema = $_POST['tema'];
$deskripsi = $_POST['deskripsi'];

$sql = "UPDATE tema SET tema = '".$tema."', deskripsi = '".$deskripsi."' WHERE idtema = '".$idtema."'";
 
$query = $koneksi->query($sql);

if ($query) {
    echo "<script>
        alert('Data Berhasil Disimpan');
        setTimeout(function() { window.location.href = window.location.origin + '/resto/admin/tema.php'; }, 10);
    </script>";
} else { 
    echo "<script>
        alert('Data Gagal Disimpan');
        setTimeout(function() { window.location.href = window.location.origin + '/resto/admin/tema.php'; }, 10);
    </script>";
}
?>
