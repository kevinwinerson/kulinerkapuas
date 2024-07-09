<?php
include 'koneksi.php';
 $nama = $_POST['nama'];
    $menu = $_POST['menu'];
    $jambuka = $_POST['jambuka'];
    $jamtutub = $_POST['jamtutup'];
    $jam=$jambuka.$jamtutub;
    $alamat = $_POST['alamat'];
    $Latitude= $_POST['Latitude'];
    $Longitude = $_POST['Longitude'];
    $deskripsi = $_POST['deskripsi'];
    $tema = $_POST['tema'];
    $lokasi = $_POST['lokasi'];
    $gambar = simpangambar();
    
   
    $sql = "INSERT INTO restoran (idrestoran, idtema, idlokasi, namarestoran, menu, alamat, waktubuka, vectors, vectorv, gbrestoran, deskripsi, latitude, longitude) VALUES('".null."','".$tema."','".$lokasi."','".$nama."','".$menu."','".$alamat."','".$jam."','".null."','".null."','".$gambar."','".$deskripsi."','".$Latitude."','".$Longitude."')";
     
    $query = $koneksi->query($sql);

    if ($query) {
        echo "<script>
            alert('Data Berhasil Disimpan');
            
           
        </script>";
    } else { 
       
        echo "<script>
            alert('Data Gagal Disimpan');
            
           
        </script>";
    }

function simpangambar(){
    $namafile=$_FILES['gambar']['name'];
    $ukuan=$_FILES['gambar']['size'];
 
    $tmpname=$_FILES['gambar']['tmp_name'];

    $ekstensigabarvalid=['jpg','jpeg','png'];
    $ekstensigambar=explode('.',$namafile) ;
    $ekstensigambar=strtolower(end($ekstensigambar));

    if(!in_array($ekstensigambar,$ekstensigabarvalid)){
        echo"<script>
        alert(''file yang di upload bukan gambar);
        </script>";
        return  false;
    }
    $namabaru=uniqid();
    $namabaru.='.';
    $namabaru.=$ekstensigambar;

    move_uploaded_file($tmpname,"IMG/".$namabaru);
  
    return $namabaru;
}
?>
   

