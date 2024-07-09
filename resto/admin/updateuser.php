<?php
include 'koneksi.php';

$iduser = $_POST['iduser'];
$tema = $_POST['User'];
$deskripsi = $_POST['password'];

$sql = "UPDATE user SET username = '".$tema."', password = '".$deskripsi."' WHERE iduser = '".$iduser."'";
 
$query = $koneksi->query($sql);

if ($query) {
    echo "<script>
        alert('Data Berhasil Disimpan');
        setTimeout(function() { window.location.href = window.location.origin + '/resto/admin/user.php'; }, 10);
    </script>";
} else { 
    echo "<script>
        alert('Data Gagal Disimpan');
        setTimeout(function() { window.location.href = window.location.origin + '/resto/admin/user.php'; }, 10);
    </script>";
}
?>