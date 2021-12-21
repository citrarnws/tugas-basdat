<?php

session_start();
include ("function.php");
if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;

}
    if(isset($_GET['KID'])){

        $KID = $_GET['KID'];
        
    }

$sql = "SELECT * FROM tbkosan WHERE No_kosan = $KID "; //$klik = kodingan buat dapetin kosan id dari halaman sebelumnya
$result = $conn->query($sql) ;
$row = $result->fetch_assoc();

//dapetin id user dari komen


//dapetin username





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
        <h2><?= $row["Nama_kost"]?></h2>
                        <form class = "upload" method="POST">
                            <table class="upload-tbl">
                               <tr><div class="form-group">
                                    <td><label for="nama">Nama Kost : <?= $row["Nama_kost"]?></label></td>
                                    
                                </div></tr>
                                <tr><div class="form-group">
                                    <td><label for="alamat">Alamat : <?= $row["Alamat"]?></label></td>
                                    
                                </div></tr>
                                <tr><div class="form-group">
                                    <td><label for="kamar_tersedia">Kamar Tersedia : <?= $row["Kamar_tersedia"]?></label></td>
                                    
                                </div></tr>
                                <tr><div class="form-group">
                                    <td><label for="status">Status : <?= $row["Status"]?></label></td>
                                    
                                </div></tr>
                                <tr><div class="form-group">
                                    <td><label for="fasilitas">Fasilitas : <?= $row["Fasilitas"]?></label></td>
                                    
                                </div></tr>
                                <tr><div class="form-group">
                                    <td><label for="harga_3bulan">Harga/3bln : <?= $row["Harga3bln"]?></label></td>
                                    
                                </div></tr>
                                <tr><div class="form-group">
                                    <td><label for="harga_6bulan">Harga/6bln : <?= $row["Harga6bln"]?></label></td>
                                    
                                </div></tr>
                                <tr><div class="form-group">
                                    <td><label for="harga_pertahun">Harga Pertahun : <?= $row["Harga_pertahun"]?></label></td>
                                    
                                    <tr><div class="form-group">
                                        <td><label for="pemilik">Pemilik Kost</label></td>
                                        <td><button type="submit" name="pemilik" class="form-control" value=""><a href="pemilik.php?KID=<?=$KID?>">Pemilik kost</a></button></td>
                                        <!--hapus a href kalo mau disambungin pake php ke pemilik.html-->
                                    </div></tr>

                                </div></tr>
                                <tr><div class="form-group">
                                    <br>
                                    <td><br><label for="upload_foto_kost">Foto Kost : <img src="images/<?= $row["Foto"]?>" width="500"></label><br></td>
                                    <br>
                                </div></tr>
                                
                            </table>
                        </form>

                        <?php
                            echo "<form method='POST' action='".setKomen()."'>
                                <input type='hidden' name='no_kosan' value='".$KID."'>
                                <input type='hidden' name='uid' value='".$_SESSION["uid"]."'>
                                <textarea name='pesan'></textarea><br>
                                <button type='submit' name='komenSubmit'>Comment</button>


                            </form>";
                            //dapetin komen
                            $sqlshow = "SELECT * FROM tbkomen WHERE No_kosan=$KID";
                            $resultshow = $conn->query($sqlshow);
                            
                        
                            

                            while ($rowshow =  $resultshow->fetch_assoc()) {
                                $idname = $rowshow['userID'];
                                $db = "SELECT * FROM tbuser WHERE userID=$idname";
                                $hasiluname = $conn->query($db);
                                $rowuname = $hasiluname->fetch_assoc();
                                echo "<form>";
                                echo "<div class = 'komen-box'>";
                                    echo $rowuname['Username']."<br><br>";
                                    echo $rowshow['Isi_komen'];
                                
                                    
                                echo "</div>";
                                echo "</form>";
                            }
                            ?>
        
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