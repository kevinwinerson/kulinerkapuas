<?php 
include 'koneksi.php';
session_start();
if (!@$_SESSION['telah_login']) {
  header("location: login.php");
  exit; // Terminate script execution after redirection
}

$search=$_POST['search'];
// Pagination
$per_page = 9; // Jumlah data per halaman
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Halaman saat ini
$start = ($page - 1) * $per_page; // Perhitungan offset

// Query untuk mengambil data dengan pagination
$query="SELECT*FROM restoran where namarestoran like '$search%' ORDER BY idrestoran DESC LIMIT $start, $per_page";
$result = $koneksi->query($query);

// Hitung total jumlah data
$total_query = "SELECT COUNT(*) as total FROM restoran where namarestoran like '$search%' ";
$total_result = $koneksi->query($total_query);
$total_data = $total_result->fetch_assoc()['total'];
$total_pages = ceil($total_data / $per_page); // Jumlah total halaman

$querytema = "SELECT * FROM tema";
$resulttema = $koneksi->query($querytema);

$querylokasi = "SELECT * FROM lokasi";
$resultlokasi = $koneksi->query($querylokasi);
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
    <title>search:<?= $search ?? '-' ?></title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"> 
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
                    <input type="hidden" name="idtema"  id="idtema" value="<?= $fetchtema["idtema"] ?? '-' ?>">
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
                <li><form class="dropdown-item" action="tema.php" method="post">
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
        <input type="search" class="form-control rounded" name="search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" value="<?= $search ?? '-' ?>" />
        <button type="submit" class="btn btn-primary" name="cari" data-mdb-ripple-init>search</button>
      </div>
          </form>
        </div>
      </div>
    </nav>
    </div>

  
</header>

<main style="background-image: url('IMG/Tugu_Batang_Garing.JPG');  background-size: cover;">

    
  

  <div class="album py-5 bg-body-tertiary bg-danger " style="background-image: url('/IMG/Tugu_Batang_Garing.jpg');  background-size: cover;">
    <div class="container">
        <div class="container --bs-danger"  > 
      
</div>
        </div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-3">
      <?php if ($result ->num_rows>0): ?>
      <?php while ($fetch = $result->fetch_assoc()): ?>
        <div class="col">
          <div class="card shadow-sm mb-3 bg-dark" >
           <img src="../IMGresto/<?= $fetch["gbrestoran"] ?? '-' ?>" width="100%" height="225" alt="" >
            <div class="card-body"> 
              <h5 class="card-text text-white" ><?= $fetch["namarestoran"] ?? '-' ?></h5>
              <h5 class="card-text text-white" ><?= $fetch["vectors"] ?? '-' ?></h5>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <form action="restoran.php" method="GET">
                  <input type="hidden" value="<?= $fetch["idrestoran"] ?? '-' ?>" name="idrestoran" id="idrestoran">
                  <button type="submit" class="text-white btn btn-sm btn-secondary">lihat</button>
              </form>

                </div>
                <small class="text-body-secondary"></small>
              </div>
            </div>
            
          </div>
        </div>
        <?php endwhile ?>
        <?php else : ?>
          <div class="container"><h1> "<?php echo"$search" ; ?>" tidak ditemukan</h1></div>
          
        <?php endif; ?>
      </div>
      <nav aria-label="...">
  <ul class="pagination px-2">
    <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
      <a class="page-link" href="search.php?page=<?php echo ($page <= 1) ? 1 : ($page - 1); ?>">Previous</a>
    </li>
    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
      <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>"><a class="page-link" href="search.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php endfor; ?>
    <li class="page-item <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
      <a class="page-link" href="search.php?page=<?php echo ($page >= $total_pages) ? $total_pages : ($page + 1); ?>">Next</a>
    </li>
  </ul>
</nav>
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
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
