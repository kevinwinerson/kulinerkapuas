<?php
include 'koneksi.php';
session_start();

if (@$_SESSION['telah_login']) {
    include 'index.php';
} 

if(isset($_POST['submit'])) {
    $nama = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM user WHERE username = '$nama' AND password = '$password' ";
     
    $query = $koneksi->query($sql);
 
    $result = $query->fetch_assoc();
 
    if ($query->num_rows == 1) {
        
        // jika username dan password ditemukan
        $_SESSION['telah_login'] = TRUE;
        $_SESSION['username'] = $nama;
        $_SESSION['id'] = $result['iduser'];
 
        header("location: index.php");
    } else {
        echo "<script>alert('username dan password salah')</script>";
    }
 }
 if(isset($_POST['tambah'])) {
    $nama = $_POST['username'];
    $password = $_POST['password'];
    
    $sqlcek = "SELECT * FROM user WHERE username = '$nama' AND password = '$password' ";
     
    $querycek = $koneksi->query($sqlcek);
 
    $result = $querycek->fetch_assoc();
 
    if ($querycek->num_rows == 1) {
        
        // jika username dan password ditemukan
       
        echo "<script>alert('ada user lain yang sudah mengunakan nama/password serupa tolong diganti')</script>";
       
    } else {
        $sqltambahuser = "INSERT INTO user (iduser, username, password) VALUES('".null."','".$nama."','".$password."')";
     
        $querytambah = $koneksi->query($sqltambahuser);
    
        if ($querytambah) {
            echo "<script>
                alert('user sudah terdaftar silahkan login');
                
               
            </script>";
        } else { 
           
            echo "<script>
                alert('Data Gagal Disimpan');
                
               
            </script>";
        }
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
    <title>Login </title>
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
                                    <center><img src="IMG/DESAIDUA1.jpg" style="width:150px;height:80px;"></center>
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="text" placeholder="username" name="username" required>
                                            <label for="inputEmail">username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password" required>
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" name="submit">Login</button>
                                            
                                            <button class="btn btn-primary" type="submit" name="tambah">Buat Akun</button>
                                        </div>
                                        <p class="mt-3" style="color: red;" >*kalau tidak punya akun buat pakai tombol buat akun</p>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    
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
                        <div class="text-muted">kuliner kapuas</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
</html>

