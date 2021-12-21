<?php

include ("function.php"); 
session_start();
include ("function.php");
if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;

}
//cek tombol simpan
if( isset($_POST["simpan"])){
    //ambil data 
    $nama = $_POST['kost'];
    $alamat= $_POST['alamat'];
    $kamar_tersedia = $_POST['tersedia'];
    $status = $_POST['status'];
    $fasilitas = $_POST['fasilitas'];
    $harga_3bulan = $_POST['harga_3bulan'];
    $harga_6bulan = $_POST['harga_6bulan'];
    $harga_pertahun = $_POST['harga_pertahun'];
    $gambar = $_FILES['gambar']['name'];
    $tmp_name =$_FILES['gambar']['tmp_name'];
    $ID = $_SESSION['uid'];

    move_uploaded_file($tmp_name, 'images/'.$gambar);

    //tambahan buat masukin userID ke kosan

   

//query
$q = mysqli_query($conn, "INSERT INTO tbkosan VALUES('', '$nama','$alamat', '$kamar_tersedia'
    ,'$status', ' $fasilitas', '$harga_3bulan', '$harga_6bulan', '$harga_pertahun', '$gambar', '$ID')");
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>PAPIKOST</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <!--HEADER-->
    <div class="medsos">
        <div class="container">
            <ul>
                <li><a href="https://instagram.com"><i class="fab fa-instagram"></i></a></li>
                <li><a href="https://line.me"><i class="fab fa-line"></i></a></li>
            </ul>
        </div>
    </div>
    <header>
        <<div class="container">
            <h1><a href="home.html">WELCOME TO PAPIKOST</a></h1>
            <ul>
                <li class="active"><a href="home.php">HOME</a></li>
                <li><a href="listkosan.php">KOST LIST</a></li>
        <?php 
                    
                    if (isset($_SESSION["Role"])){
                      if($_SESSION["Role"] == 'P')  
                        {
                        echo "<li><a href='upload.php'>UPLOAD KOST</a></li>";
                        }
                    }
                
                ?>
                <li><a href="logout.php">LOG OUT</a></li>
            </ul>
        </div>
    </header>

    <!--background2-->
   <section class="background2">
    <div class="container">
        <h2>Form Upload Kost</h2>
            <div class="container">
                <form class = "upload" method="POST" enctype="multipart/form-data" action="">
                    <table class="upload-tbl">
                       <tr><div class="form-group">
                            <td><label for="nama">Nama Kost</label></td>
                            <td><input type="text" name="kost" class="form-contdol" required></td>
                        </div></tr>
                        <tr><div class="form-group">
                            <td><label for="alamat">Alamat</label></td>
                            <td><input type="text" name="alamat" class="form-contdol"></td>
                        </div></tr>
                        <tr><div class="form-group">
                            <td><label for="kamar_tersedia">Kamar Tersedia</label></td>
                            <td><input type="text" name="tersedia" class="form-contdol"></td>
                        </div></tr>
                        <tr><div class="form-group">
                            <td><label for="status">Status</label></td>
                                    <td><select class="form-contdol" name="status">
                                            <option>---</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select></td>
                        </div></tr>
                        <tr><div class="form-group">
                            <td><label for="fasilitas">Fasilitas</label></td>
                            <td><textarea name="fasilitas" rows="3" class="form-contdol"></textarea></td>
                        </div></tr>
                        <tr><div class="form-group">
                            <td><label for="harga_3bulan">Harga/3bln</label></td>
                            <td><input type="text" name="harga_3bulan" class="form-contdol"></td>
                        </div></tr>
                        <tr><div class="form-group">
                            <td><label for="harga_6bulan">Harga/6bln</label></td>
                            <td><input type="text" name="harga_6bulan" class="form-contdol"></td>
                        </div></tr>
                        <tr><div class="form-group">
                            <td><label for="harga_pertahun">Harga Pertahun</label></td>
                            <td><input type="text" name="harga_pertahun" class="form-contdol"></td>
                        </div></tr>
                        <tr><div class="form-group">
                            <td><label for="gambar">Foto Kamar</label></td>
                            <td><input type="file" name="gambar" class="form-control"></td>
                        </div></tr>
                        <!-- jadi ges di sini nanti ada form buat upload foto jg tapi gangerti bikinnya, keknya itu masuk php, sama ni tombol" jugaa-->
                        <tr><div class="form-grup">
                            <td>
                                <input type ='hidden' name='ID' value = "$_SESSION['userID']" >
                                <button type="submit" name="simpan" class="form-control" value="KIRIM">
                                Simpan
                            </button></td>
                            <td><button type="submit" class="form-control">
                                Batal
                            </button></td>
                        </div></tr>
                    </table>
                </form>
            </div>
        </div>
    </section>

	<!-- footer -->
	<footer>
		<div class="container">
			<small> Copyright &copy; 2021 - Kelompok Basdat, All Rights Reserved.</small>
		</div>
	</footer>
</body>
</html>

