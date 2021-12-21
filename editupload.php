<?php


session_start();
include ("function.php");
if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;

}

        $idkos = $_POST['nomorkos'];
        $nama = $_POST['namakos'];
        $alamat= $_POST['alamat'];
        $kamar_tersedia = $_POST['kamar'];
        $status = $_POST['status'];
        $fasilitas = $_POST['fasilitas'];
        $harga_3bulan = $_POST['harga3bln'];
        $harga_6bulan = $_POST['harga6bln'];
        $harga_pertahun = $_POST['harga1thn'];
        
        $ID = $_SESSION['uid'];
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
    <div class="container">
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
                <form class = "upload" method="POST" enctype="multipart/form-data" action="<?php edit_kosan() ?>">
                    <table class="upload-tbl">
                        <?php echo "<td><input type='hidden' name='nomorkos' value = ' ".$idkos." ' class='form-contdol' required></td> ";?>
                       <tr><div class="form-group">
                            <td><label for="nama">Nama Kost</label></td>
                            <?php echo "<td><input type='text' name='namakos' value = ' ".$nama." ' class='form-contdol' required></td> ";?>
                        </div></tr>
                        <tr><div class="form-group">
                            <td><label for="alamat">Alamat</label></td>
                            <?php echo "<td><input type='text' name='alamat' value = ' ".$alamat." ' class='form-contdol' required></td> ";?>
                        </div></tr>
                        <tr><div class="form-group">
                            <td><label for="kamar_tersedia">Kamar Tersedia</label></td>
                            <?php echo "<td><input type='text' name='kamar' value = ' ".$kamar_tersedia." ' class='form-contdol' required></td> ";?>
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
                            <?php echo "<td><textarea name='fasilitas' rows='3' class='form-contdol'>'.$fasilitas.'</textarea></td>";?>
                        </div></tr>
                        <tr><div class="form-group">
                            <td><label for="harga_3bulan">Harga/3bln</label></td>
                            <?php echo "<td><input type='text' name='harga3bln' value = ' ".$harga_3bulan." ' class='form-contdol' required></td> ";?>
                        </div></tr>
                        <tr><div class="form-group">
                            <td><label for="harga_6bulan">Harga/6bln</label></td>
                            <?php echo "<td><input type='text' name='harga6bln' value = ' ".$harga_6bulan." ' class='form-contdol' required></td> ";?>
                        </div></tr>
                        <tr><div class="form-group">
                            <td><label for="harga_pertahun">Harga Pertahun</label></td>
                            <?php echo "<td><input type='text' name='harga1thn' value = ' ".$harga_pertahun." ' class='form-contdol' required></td> ";?>
                        </div></tr>
            
                        
                        <tr><div class="form-group">
                            <td><label for="gambar">Foto Kamar</label></td>
                            <td><input type='file' name='gambar' value = '' class='form-contdol' ></td> 
                        </div></tr>
                        <!-- jadi ges di sini nanti ada form buat upload foto jg tapi gangerti bikinnya, keknya itu masuk php, sama ni tombol" jugaa-->
                        <tr><div class="form-grup">
                            <td>
                                <input type ='hidden' name='ID' value = "$_SESSION['userID']" >
                                <button type="submit" name="simpan" class="form-control" value="KIRIM">
                                Simpan
                            </button></td>
                            <td><button type="submit" class="form-control"><a href="listkosan.php">
                                Batal
                            </a>
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
