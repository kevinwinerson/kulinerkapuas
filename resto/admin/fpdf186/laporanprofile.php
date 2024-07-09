<?php
include '../koneksi.php';
// Query untuk mendapatkan jumlah restoran berdasarkan tema
$id=1;
$query = "SELECT*FROM restoran where idrestoran=$id";
$result = $koneksi->query($query);
$fetch = $result->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laporan restoran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        
    </style>
</head>
<body>
<div class="container-sm mt-3">
    <div>
    <img src="../IMG/logo-kapuas.jpg" alt="" style="float:left;width:100px;height:100px;">
    <div class="container">
        <h1 style="text-align: center;">Dinas Perdagangan, Perindustrian, Koperasi Dan Usaha Kecil Menengah Kabupaten Kapuas</h1>
    </div>
    <p style="text-decoration: underline; text-align: center;">Jl. Tambun Bungai No.7, Selat Hilir, Kec. Selat, Kabupaten Kapuas, Kalimantan Tengah 73516</p>
    </div>
    <hr style="height:100px; color:black; size: 5%;">

    <div class="container">
      
      <div class="row" style="background-color: white;">

        <div class="col-md-12">

          <div class="col-md-12">
            <img src="/IMGresto/<?=$fetch["gbrestoran"] ?? '-' ?>" alt="Restaurant Image" class="restaurant-img mt-3">
          </div>
          <ul class="list-group">
            <li class="list-group-item"><strong>Nama:</strong> <?= $fetch["namarestoran"] ?? '-' ?></li>
            <li class="list-group-item"><strong>Skor:</strong> <?= $fetch["vectors"] ?? '-' ?></li>
            <li class="list-group-item"><strong>Menu:</strong> <?= $fetch["menu"] ?? '-' ?></li>
            <li class="list-group-item"><strong>Alamat:</strong> <?= $fetch["alamat"] ?? '-' ?></li>
          </ul>
        </div>
      </div>
      <!-- Restaurant Description -->
      <div class="row restaurant-description">
        <div class="col-md-12">
          <p>
          <?= $fetch["deskripsi"] ?? '-' ?>
          </p>
        </div>
      </div>
    </div>
</div>

    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</body>
</html>