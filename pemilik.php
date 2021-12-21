<?php

include ("function.php");
session_start();
include ("function.php");
if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;

}
if(isset($_GET['KID'])){

    $KID = $_GET['KID'];
    
}
$iduser = "SELECT * FROM tbkosan WHERE No_Kosan=$KID";
$hasilid = $conn->query($iduser);
$baris = $hasilid->fetch_assoc();

$idasli = $baris["userID"];

$sql = "SELECT * FROM tbuser WHERE userID=$idasli";
$result = $conn->query($sql) ;
$row = $result->fetch_assoc();


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
        <h2><?= $baris["Nama_kost"]?> </h2>
                        <form class = "upload" method="POST">
                            <table class="upload-tbl">
                            
                                <tr><div class="form-group">
                                    <td><label for="nama_pemilik">Nama Pemilik : <?= $row["Fullname"]?></label></td>
                                    
                                </div></tr>
                                <tr><div class="form-group">
                                    <td><label for="no_ponsel">Nomor Ponsel :<?= $row["no_ponsel"]?></label></td>
                                <tr><div class="form-grup">
                                    <td><button type="submit" name="back" class="form-control" value=""><a href="listkosan.php">Back</a><!--(kasi link ke pagelist2 lage, alias balik ke page sblmnya)-->
                                        <!--Back-->
                                    </button></td>
                                </div></tr>
                            </table>
                        </form>
        
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