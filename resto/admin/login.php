<?php
include 'koneksi.php';
session_start();

if(isset($_POST['submit'])) {
    $nama = $_POST['admin'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM dataadmin WHERE adminname = '$nama' AND passwordadmin = '$password' ";
     
    $query = $koneksi->query($sql);
 
    $result = $query->fetch_assoc();
 
   if ($query->num_rows == 1) {
        
        // jika username dan password ditemukan
        $_SESSION['telah_login'] = TRUE;
 
     header("location: home.php");
    } else {
        echo "<script>alert('username dan password salah')</script>";
    }
 }


?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication" style="background-image: url('IMG/Tugu_Batang_Garing.jpg');background-repeat: no-repeat; background-size: cover; float:NONE;">
            <div id="layoutAuthentication_content">
                <main>

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                          <center><img src="../IMGresto/logo-kapuas.png"style="width:80px;height:80px;"></center>
                                        <h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="" method="post" >
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" placeholder="admin" name="admin" require>
                                                <label for="inputEmail">Admin</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Password"name="password" require >
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" type="submit" name="submit">LOGIN</button>
                                                
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html"></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Dinas Perdagangan, Perindustrian, Koperasi Dan Usaha Kecil Menengah Kabupaten Kapuas</div>
                            <div>
                                
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
