<?php 
include 'koneksi.php';
session_start();
if (!@$_SESSION['telah_login']) {
  header("location: login.php");
}

$id=$_GET['idrestoran'];
$iduser= $_SESSION['id'];
$user= $_SESSION['username'] ;
$query = "SELECT*FROM restoran where idrestoran=$id";
$result = $koneksi->query($query);
$fetch = $result->fetch_assoc();

//var_dump($fetch); die;
$sqlreview = "SELECT * FROM review WHERE idrestoran=$id ";
$queryreview = $koneksi->query($sqlreview);
$querytema="SELECT*FROM tema";
$resulttema = $koneksi->query($querytema);
$querylokasi="SELECT*FROM lokasi";
$resultlokasi = $koneksi->query($querylokasi);

if(isset($_POST['submit'])) {

$iduser= $_POST['iduser'];
$username= $_POST['username'];
$idrestoran= $_POST['idrestoran'];
$namarestoran= $_POST['namarestoran'];
$rasa= $_POST['rasa'];
$vibe= $_POST['vibe'];
$bersih= $_POST['kebersihan'];
$pelayanan= $_POST['pelayanan'];
$review= $_POST['review'];
$tanggal = date("d/m/y");


$query = "INSERT INTO review (idreview,idrestoran,iduser,username,namarestoran,rasa,vibe,bersih,pelayanan,review,tglpost) VALUES('".null."','".$idrestoran."','".$iduser."','".$username."','".$namarestoran."','".$rasa."','".$vibe."','".$bersih."','".$pelayanan."','".$review."','".$tanggal."')";

$data  = $koneksi->query($query);

if ($data) {
//perhitungan vectors
$sql = "SELECT AVG(rasa) as rata_rasa, AVG(vibe) as rata_vibe, AVG(bersih) as rata_bersih, AVG(pelayanan) as rata_pelayanan FROM review WHERE idrestoran= $idrestoran ";
$query = $koneksi->query($sql);
$result = $query->fetch_assoc();

// Mengkonversi hasil rata-rata menjadi integer
$rasa = intval($result['rata_rasa']);
$suasana = intval($result['rata_vibe']);
$bersih = intval($result['rata_bersih']);
$pelayanan = intval($result['rata_pelayanan']);

// Melakukan pemangkatan dan menggabungkan nilai-nilai
$rasas = $rasa ** 0.4;
$suasanas = $suasana ** 0.1;
$bersihs = $bersih ** 0.2;
$pelayanans = $pelayanan ** 0.3;
$vectors = $rasas + $suasanas + $bersihs + $pelayanans;

// Menjalankan query UPDATE
$sql = "UPDATE `restoran` SET `vectors` = $vectors WHERE `restoran`.`idrestoran` = $idrestoran";
$query = $koneksi->query($sql);

vectorv($koneksi);

echo "<script>      
  alert('review Berhasil Disimpan');
 
  </script>";

} else { 
   
    echo "<script>
        alert('review Gagal Disimpan');
        
       
    </script>";

}
 header("Location: " . $_SERVER['PHP_SELF'] . "?idrestoran=" . $idrestoran);
 exit;
}

if (isset($_POST['hapus'])) {
  $idhapusreview = $_POST['idreview'];

  // Menggunakan prepared statement untuk menghindari SQL Injection
  $stmt = $koneksi->prepare("DELETE FROM review WHERE idreview = ?");
  $stmt->bind_param("i", $idhapusreview);
  $hapusdata = $stmt->execute();

  if ($hapusdata) {
      //perhitungan vectors
$sql = "SELECT AVG(rasa) as rata_rasa, AVG(vibe) as rata_vibe, AVG(bersih) as rata_bersih, AVG(pelayanan) as rata_pelayanan FROM review WHERE idrestoran= $id ";
$query = $koneksi->query($sql);
$result = $query->fetch_assoc();

// Mengkonversi hasil rata-rata menjadi integer
$rasa = intval($result['rata_rasa']);
$suasana = intval($result['rata_vibe']);
$bersih = intval($result['rata_bersih']);
$pelayanan = intval($result['rata_pelayanan']);

// Melakukan pemangkatan dan menggabungkan nilai-nilai
$rasas = $rasa ** 0.4;
$suasanas = $suasana ** 0.1;
$bersihs = $bersih ** 0.2;
$pelayanans = $pelayanan ** 0.3;
$vectors = $rasas + $suasanas + $bersihs + $pelayanans;

// Menjalankan query UPDATE
$sql = "UPDATE `restoran` SET `vectors` = $vectors WHERE `restoran`.`idrestoran` = $id";
$query = $koneksi->query($sql);

    vectorv($koneksi);
    echo "<script>
          alert('Review Berhasil Dihapus');
      </script>";
  } else {
      echo "<script>
          alert('Review Gagal Dihapus');
      </script>";
  }

  // Pastikan $idrestoran sudah diatur sebelumnya
  if (isset($id)) {
      // Redirect harus dilakukan sebelum output HTML apapun
      header("Location: " . $_SERVER['PHP_SELF'] . "?idrestoran=" . $id);
      exit;
  }
}


function vectorv($koneksi){
  // Mengambil data vektor dari tabel restoran
$sql = "SELECT vectors FROM RESTORAN";
$query = $koneksi->query($sql);
$results = $query->fetch_all(MYSQLI_ASSOC);

// Inisialisasi variabel untuk menyimpan jumlah vektor
$totalVectors = 0;

// Menghitung jumlah vektor dari setiap baris data
foreach ($results as $row) {
   //Mengambil nilai vektor dari setiap baris dan menambahkannya ke total
  $totalVectors += $row['vectors'];
}
// Memilih semua data dari tabel restoran
$sql = "SELECT * FROM restoran";
$query = $koneksi->query($sql);

// Memeriksa apakah kueri berhasil dieksekusi
if (!$query) {
  die("Kueri SQL gagal dieksekusi: " . $koneksi->error);
}

// Iterasi melalui setiap baris restoran
while ($row = $query->fetch_assoc()) {
  $id = $row['idrestoran'];
  $vectors = $row['vectors'];

  // Menghitung total vektor untuk restoran tertentu

  // Memastikan total vektor tidak nol untuk menghindari pembagian dengan nol
  if ($totalVectors != 0) {
      // Menghitung nilai vectorv untuk restoran tertentu
      $vectorv = $vectors / $totalVectors;

      // Memperbarui nilai vectorv untuk restoran tertentu
      $updateSql = "UPDATE restoran SET vectorv='$vectorv' WHERE idrestoran='$id'";
      $updateQuery = $koneksi->query($updateSql);

      // Memeriksa apakah kueri update berhasil dieksekusi
      if (!$updateQuery) {
          die("Kueri update gagal dieksekusi: " . $koneksi->error);
      }
  }
}
}






?>


<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <script src="../assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title><?= $fetch["namarestoran"] ?? '-' ?></title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"> 
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB94cV437Em7xBaIRU89VPCSDBnzyNQN9g"></script>
  <link rel="stylesheet" href="resto.css">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>
    
  </head>
  <body style="background-color: black ; " >
   

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
              id="bd-theme"
              type="button"
              aria-expanded="false"
              data-bs-toggle="dropdown"
              aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
      </ul>
    </div>

    
<header data-bs-theme="light">
  <div class="collapse text-bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4>About</h4>
          <p class="text-body-secondary">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4>Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Follow on Twitter</a></li>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="#" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container" >
    <nav class="navbar navbar-expand-lg bg-secondary rounded" aria-label="Eleventh navbar example">
      <div class="container-fluid">
        <a class="navbar-brand ps-3" href="index.html"><center><img src="IMG/DESAIDUA1.jpg" style="width:100px;height:60px;"></center></a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarsExample09">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="top.php">TOP RESTORAN</a>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">TEMA</a>
              <ul class="dropdown-menu">
              
                <?php while ($fetchtema = $resulttema->fetch_assoc()): ?> 
                  <li>
                  <form class="dropdown-item" action="tema.php" method="post">
                    <input type="hidden" name="idtema" value="<?= $fetchtema["idtema"] ?? '-' ?>">
                    <button class="btn btn-secondary" type="submit"><?= $fetchtema["tema"] ?? '-' ?></button>
              </form>
            </li>
            <?php endwhile ?>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">LOKASI</a>
              <ul class="dropdown-menu">
              <?php while ($fetchlokasi = $resultlokasi->fetch_assoc()): ?> 
                <li><form class="dropdown-item" action="lokasi.php" method="post">
                    <input type="hidden" name="idlokasi" value="<?= $fetchlokasi["idlokasi"] ?? '-' ?>">
                    <button class="btn btn-secondary" type="submit"><?= $fetchlokasi["lokasi"] ?? '-' ?></button>
              </form>
            </li>
            <?php endwhile ?>
              </ul>
            </li>
          </ul>
          <form role="search" action="search.php" method="post">
                <div class="input-group"> 
        <input type="search" class="form-control rounded" name="search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <button type="submit" class="btn btn-primary" name="cari" data-mdb-ripple-init>search</button>
      </div>
          </form>
        </div>
      </div>
    </nav>
    </div>

  
</header>

<main style="background-image: url('IMG/Tugu_Batang_Garing.JPG');  background-size: cover;">

    
  

  <div class="album py-5 bg-body-tertiary" style="background-image: url('/IMG/Tugu_Batang_Garing.jpg');  background-size: cover;">
    <div class="container">
        <div class="container --bs-danger"  > 
      
</div>
        </div>
        <div class="container" style="background-color: white;">
    <!-- Restaurant Image and Table -->
    <div class="container mt-3">
      
      <div class="row" style="background-color: white;">

        <div class="col-md-12">

          <div class="col-md-12">
            <img src="../IMGresto/<?= $fetch["gbrestoran"] ?? '-' ?>" alt="Restaurant Image" class="restaurant-img mt-3">
          </div>
          <ul class="list-group">
            <li class="list-group-item"><strong>Nama:</strong> <?= $fetch["namarestoran"] ?? '-' ?></li>
            <li class="list-group-item"><strong>Skor:</strong> <?= $fetch["vectors"] ?? '-' ?></li>
            <li class="list-group-item"><strong>Menu:</strong> <?= $fetch["menu"] ?? '-' ?></li>
            <li class="list-group-item"><strong>Alamat:</strong> <?= $fetch["alamat"] ?? '-' ?></li>
            <li class="list-group-item"><strong>Jam buka:</strong> <?= $fetch["waktubuka"] ?? '-' ?></li>
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

    <div id="map" class="mt-3"></div>


    <div class="container mt-3">

      <div class="row">


        <div class="col-md-8 offset-md-2">
          <!-- Review Column -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tulis Review
          </button>
          <?php while ($fetchreview = $queryreview->fetch_assoc()): ?> 
          <div class="review-container">
            <!-- Username & Date -->
            
              <div>
            
              <span class="fw-bold"><?= $fetchreview["username"] ?? '-' ?></span>
              <span class="text-muted"> - <?= $fetchreview["tglpost"] ?? '-' ?></span>
              <!-- Review Score -->
              <div class="review-score">
                <span>Rasa: <?= $fetchreview["rasa"] ?? '-' ?></span>
                <span class="mx-2">Vibe: <?= $fetchreview["vibe"] ?? '-' ?></span>
                <span>Kebersihan: <?= $fetchreview["bersih"] ?? '-' ?></span>
                <span class="mx-2">Pelayanan: <?= $fetchreview["pelayanan"] ?? '-' ?></span>
              </div>
            </div>
            <!-- Review Content -->
            <div class="mt-2">
              <p><?= $fetchreview["review"] ?? '-' ?></p>
            </div>
            <?php if ($fetchreview["username"] == $user): ?>
    <form action="" method="post">
        <!-- Delete Button -->
        <input type="hidden" name="idreview" value="<?= htmlspecialchars($fetchreview["idreview"]) ?>">
        <button class="btn btn-danger btn-sm delete-btn" name="hapus" type="submit">Hapus</button>
    </form>
<?php endif; ?>
         
          
          <!-- End Review Column -->
        </div> <?php endwhile ?>
      </div>
      </div>
    </div>

   <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container mt-5">
    <form method="post" action="">
    <input type="hidden" name="iduser" value="<?= $iduser ?? '-' ?>">
    <input type="hidden" name="username" value="<?= $user ?? '-' ?>">
    <input type="hidden" name="idrestoran" value="<?= $fetch["idrestoran"] ?? '-' ?>">
    <input type="hidden" name="namarestoran" value="<?= $fetch["namarestoran"] ?? '-' ?>">
    <label for="rasa">RASA:</label>
    <select class="form-select" aria-label="Default select example" name="rasa" id="rasa">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
    <label for="vibe">VIBE(SUASANA):</label>
    <select class="form-select" aria-label="Default select example" name="vibe" id="vibe">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
    <label for="bersih">KEBERSIHAN:</label>
    <select class="form-select" aria-label="Default select example" name="kebersihan" id="kebersihan">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
    <label for="pelayanan">PERLAYANAN:</label>
    <select class="form-select" aria-label="Default select example" name="pelayanan" id="pelayanan">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
      <div class="form-group">
        <label for="review">Review:</label>
        <textarea class="form-control" id="review" name="review" rows="5"></textarea>
      
  </div>
      </div>
      <div class="modal-footer">
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
      </div>
    </div>
  </div>
</div>
    
  </div>
        
      </div>
    </div>
  </div>

</main>

<footer class="text-body-secondary py-5">
  <div class="container">
    <p class="float-end mb-1">
      
    </p>
    <p class="mb-1">made by kevin winerson</p>
    
  </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-A7FZj7v/pDzvo3fjkFcuuF5odpEc4+9gSgVIUz8QF0sIibFv8qRxni1hFf4M8TSc" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<script>
  function initMap() {
    // Koordinat lokasi yang ingin Anda tampilkan
    var myLatLng = {
      lat: <?= $fetch["Latitude"] ?? '-' ?>,
      lng: <?= $fetch["Longitude"] ?? '-' ?>
    };

    // Membuat objek peta
    var map = new google.maps.Map(document.getElementById('map'), {
      center: myLatLng,
      zoom: 15 // Zoom level, sesuaikan sesuai kebutuhan
    });

    // Menambahkan marker ke peta
    var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      title: 'Lokasi Anda'
    });
  }
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB94cV437Em7xBaIRU89VPCSDBnzyNQN9g&callback=initMap"></script>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>