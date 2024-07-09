<?php
include'koneksi.php';
    $idrestoran=$_POST['idrestoran'];
    $nama = $_POST['nama'];
    $menu = $_POST['menu'];
    $jambuka = $_POST['jambuka'];
    $jamtutub = $_POST['jamtutup'];
    $jam=$jambuka."-".$jamtutub;
    $alamat = $_POST['alamat'];
    $Latitude= $_POST['Latitude'];
    $Longitude = $_POST['Longitude'];
    $deskripsi = $_POST['deskripsi'];
    $tema = $_POST['tema'];
    $lokasi = $_POST['lokasi'];
    $gambarlama= $_POST['gambarlama'];

   if ($_FILES['gambar']['error'] === 4) {
    $gambar=$gambarlama;
   } else {
        $gambar=simpangambar();
   }
   
    
   
   $sql = "UPDATE restoran SET
            idtema = '".$tema."',
            idlokasi = '".$lokasi."',
            namarestoran = '".$nama."',
            menu = '".$menu."',
            alamat = '".$alamat."',
            waktubuka = '".$jam."',
            
            gbrestoran = '".$gambar."',
            deskripsi = '".$deskripsi."',
            latitude = '".$Latitude."',
            longitude = '".$Longitude."'
        WHERE idrestoran = '".$idrestoran."'";

     
    $query = $koneksi->query($sql);

    if ($query) {
        echo "<script>
            alert('Data Berhasil Disimpan');
            
            setTimeout(() => { window.location.href = window.location.origin + '/resto/admin/resto.php' }, 10);
        </script>";
    } else { 
       
        echo "<script>
            alert('Data Gagal Disimpan');
            
            setTimeout(() => { window.location.href = window.location.origin + '/resto/admin/resto.php' }, 10);
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

    move_uploaded_file($tmpname,"../IMGresto/".$namabaru);
  
    return $namabaru;
}
?>