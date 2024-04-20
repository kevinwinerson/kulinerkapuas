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
                                            <th>ID Lokasi</th>
                                            <th>Lokasi</th>
                                            <th>EDIT</th>
                                            <TH>HAPUS</TH>
                                            
                                        </tr>
                                    <tbody>
                                        <tr>
                                        <td class="mb-4"> <center>1</center></td>    
                                       <td class="mb-4" style="margin-TOP: 4PX;" ><CENTER>SAMSUL</CENTER></td>
                                       <td class="mb-4">
                                        <center class="mb-4"><button type="button" class="btn btn-warning ">Edit</button></center>
                                        </td>
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
                                                     
                                                     <input type="text" class="form-control" placeholder="NAMA LENGAKAP">
                                                     <br>
                                                     <input type="text" class="form-control" placeholder="NIK"><br>
                                                     <input type="text" class="form-control" placeholder="ALAMAT"><br>
                                                     <input type="text" class="form-control" placeholder="NO.HP"><br>
                                                     <input type="email" class="form-control" placeholder="EMAIL"><br>
                                                     <label>AGAMA</label><br>
                                                     <input type="radio" id="ISLAM" name="AGAMA" value="ISLAM" > <label for="html">ISLAM</label><br>
                                                     <input type="radio" id="KRISTEN" name="AGAMA" value="KRISTEN" ><label for="html">KRISTEN</label><br>
                                                     <input type="radio" id="KATOLIK" name="AGAMA" value="KATOLIK" ><label for="html">KATOLIK</label><br>
                                                     <input type="radio" id="HINDU" name="AGAMA" value="HINDU" ><label for="html">HINDU</label><br>
                                                     <input type="radio" id="BUDDHA" name="AGAMA" value="BUDDHA" ><label for="html">BUDDHA</label><br>
                                                     <input type="radio" id="KONGHUCHU" name="AGAMA" value="KONGHUCHU" ><label for="html">KONGHUCHU</label><br>
                                                     <input type="radio" id="LAINNYA" name="AGAMA" value="LAINNYA" ><label for="html">LAINNYA</label><br>
                                                     <br>
                                                     <input type="NUMBER" class="form-control" placeholder="Tinggi badan"><br>
                                                     <input type="NUMBER" class="form-control" placeholder="berat badan"><br>
                                                     <label>Pendidikan</label><br>
                                                     <input type="radio" id="SMP" name="PENDIDIKAN" value="SMP" > <label for="html">SMP</label><br>
                                                     <input type="radio" id="SMA" name="PENDIDIKAN" value="SMA" ><label for="html">SMA</label><br>
                                                     <input type="radio" id="SMK" name="PENDIDIKAN" value="SMK" ><label for="html">SMK</label><br>
                                                     <input type="radio" id="S1" name="PENDIDIKAN" value="S1" ><label for="html">S1</label><br>
                                                     <input type="radio" id="S2" name="PENDIDIKAN" value="S2" ><label for="html">S2</label><br>
                                                     <br>
                                                     <input type="text" class="form-control" placeholder="KAMPUS/SEKOLAH"><br>
                                                     <input type="text" class="form-control" placeholder="NILAI/IPK"><br>
                                                     <input type="text" class="form-control" placeholder="KETERMPILAN"><br>
                                                     <input type="NUMBER" class="form-control" placeholder="LAMA PENDIDKAN(TAHUN)"><br>
                                                     <label>IJASAH DEPAN</label><br>
                                                     <input type="file" name="IJASAH DEPAN"><br>
                                                     <label>IJASAH BELAKANG</label><br>
                                                     <input type="file" name="IJASAH BELAKANG"><br>
                                                     <label>KTP</label><br>
                                                     <input type="file" name="KTP"><br>
                                                     <label>FOTO</label><br>
                                                     <input type="file" name="FOTO"><br>


                                                </div>
                                                <div class="modal-footer"><button class="btn btn-primary" type="button">SIMPAN</button></div>
                                            </div>
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
