<?php
include 'koneksi.php';

$idlokasi = $_POST['idadmin'];
$tema = $_POST['admin'];
$deskripsi = $_POST['password'];

$sql = "UPDATE dataadmin SET adminname = '".$tema."', passwordadmin = '".$deskripsi."' WHERE idadmin = '".$idlokasi."'";
 
$query = $koneksi->query($sql);

if ($query) {
    echo "<script>
        alert('Data Berhasil Disimpan');
        setTimeout(function() { window.location.href = window.location.origin + '/resto/admin/admin.php'; }, 10);
    </script>";
} else { 
    echo "<script>
        alert('Data Gagal Disimpan');
        setTimeout(function() { window.location.href = window.location.origin + '/resto/admin/admin.php'; }, 10);
    </script>";
}
?>