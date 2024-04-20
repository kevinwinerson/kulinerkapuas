<?php
include 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>HALAMAN PESERTA</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            div.scroll {
              background-color: #ffffff;
              overflow: auto;
              white-space: nowrap;
            }
            
            div.scroll a {
              display: inline-block;
              color: rgb(0, 0, 0);
              text-align: center;
              padding: 14px;
              text-decoration: none;
            }
            
            div.scroll a:hover {
                background-color: #777;
            }
            </style>
    </head>
    <body class="sb-nav-fixed" >
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->

            <a class="navbar-brand ps-3 mt-3" href="index.html">KULINER KAPUAS </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark text-bg-dark" id="sidenavAccordion" >
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="home.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                <b>Home</b>
                            </a>
                           <a class="nav-link" href="resto.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                <b>Restoran</b>
                            </a>
                            <a class="nav-link" href="tema.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                <b>Tema</b>
                            </a>
                            <a class="nav-link" href="lokasi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                <b>Lokasi</b>
                            </a>
                            <a class="nav-link" href="user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                <b>User</b>
                            </a>
                           <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                <b>Admin</b>
                            </a>
                            <a class="nav-link" href="laporan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                <b>Laporan</b>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                               
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <
                                    </div>
                                    
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                           
                                </nav>
                            </div>
                            
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content" style="background-image: url('IMG/Tugu_Batang_Garing.JPG');background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
                <main>
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                 
                       <button type="button" class="btn btn-primary mb-3" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable" style="margin-bottom: 4PX;">TAMBAH DATA</button>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DATA RESTORAN
                            </div>
                            <div class="card-body">
                                <div class="scroll">
                                  
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID RESTORAN</th>
                                            <th>NAMA RESTORAN</th>
                                            <th>FOTO RESTORAN</th>
                                            <th>ALAMAT</th>
                                            <th>ID TEMA</th>
                                            <th>ID LOKASI</th>
                                            <th>VEKTOR S</th>
                                            <th>VEKTOR V</th>
                                            <th>EDIT</th>
                                            <TH>HAPUS</TH>
                                            
                                        </tr>
                                    <tbody>
                                        <tr>
                                        <td class="mb-4"> <center>1</center></td>    
                                       <td class="mb-4" style="margin-TOP: 4PX;" ><CENTER>SAMSUL</CENTER></td>
                                       <td><img src="IMG/303f49dece81f4d309bb45a81467477b.jpg"style="width:150px;height:100px;"></td>
                                       <TD class="mb-4"><center>JL SULTAN ADAM</center></TD>
                                       <td class="mb-4"><center>1</center></td>
                                       <td class="mb-4"> <center>1</center></td>
                                       <td class="mb-4"> <CENter>4,8</CENter></td>
                                       <td class="mb-4"> <CENter>4,8</CENter></td>
                                       <td class="mb-4">
                                        <center class="mb-4"><button type="button" class="btn btn-warning ">Edit</button></center>
                                       <td class="mb-4">
                                        <center class="mb-4"><button type="button" class="btn btn-danger " style="margin-top: 3PX;">Hapus</button></center>
                                        </td>
                                    </tr>
                                     
                                    </tbody>
                                </table></div>
                                <!--modal satu-->
                                    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalScrollableTitle">DATA PESERTA KARTU AK-1</h5>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                                                     <input type="text" class="form-control" placeholder="Nama Restoran"id="nama" name="nama"required ><br>
                                                     <input type="text" class="form-control" placeholder="Menu"id="menu" name="menu" required  ><br>
                                                     <label for="">Jam Buka</label><br>
                                                     <input type="time" class="form-control" placeholder="Jam Buka"id="jambuka" name="jambuka" required><br>
                                                     <label for="">Jam Tutub</label><br>
                                                     <input type="time" class="form-control" placeholder="Jam Tutub"id="jamtutub" name="jamtutub" required><br>
                                                     <input type="text" class="form-control" placeholder="Alamat"id="Alamat" name="Alamat" required><br>
                                                     <input type="text" class="form-control" placeholder="Latitude"id="Latitude" name="Latitude" required><br>
                                                     <input type="text" class="form-control" placeholder="Longitude"id="Longitude" name="Longitude" required><br>
                                                     <textarea class="form-control" placeholder="Deskirpsi" rows="3"name="deskripsi" id="deskripsi" placeholder="deskripsi" required></textarea><br>
                                                     <label>tema</label><br>
                                                     <? ?>
                                                     <input type="radio" id="tema" name="tema" value="<? ?>" > <label for="html"><? ?></label><br>
                                                     <? ?>
                                                     <label>lokasi</label><br>
                                                     <? ?>
                                                     <input type="radio" id="lokasi" name="lokasi" value="<? ?>" > <label for="html"><? ?></label><br>
                                                     <? ?>
                                                     <br>
                                                     <label>Gambar Restoran</label><br>
                                                     <input type="file" id="gambar" name="gambar" required><br>
                                                </div>
                                                <div class="modal-footer"><button class="btn btn-primary" type="submit">SIMPAN</button></div>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
                                        <!--modal dua-->
                                        <div class="modal fade" id="exampleModalScrollable1" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalScrollableTitle">SERTIFIKAT</h5>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="file" name="sertifikat">
                                                </div>
                                                <div class="modal-footer"><button class="btn btn-primary" type="button">SIMPAN</button></div>
                                            </div>
                                            </div>
                                        </div>
                                         <!--modal tiga--> 
                                         <div class="modal fade" id="exampleModalScrollable2" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalScrollableTitle">PENGALAMAN KERJA</h5>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="file" name="Pengalaman">
                                                </div>
                                                <div class="modal-footer"><button class="btn btn-primary" type="button">SIMPAN</button></div>
                                            </div>
                                            </div>
                                        </div>
                                <!--batas modal-->
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">made by kevin winerson </div>
                            <div>
                                <a href="#"></a>
                                &middot;
                                <a href="#"></a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
