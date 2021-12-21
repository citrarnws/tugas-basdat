<?php

session_start();
include_once("function.php");
if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;

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

    <!--background-->
    <section class="background">
        <button class="list kost"><a href="listkosan.php">
            <h2> Lihat Daftar Kost </h2>
        </a>
        </button>
    </section>

    <!-- about -->
	<section class="about">
		<div class="container">
			<h3>ABOUT</h3>
			<p>Papikost merupakan sebuah website interaktif yang berguna untuk membantu kalian para perantau untuk mencari kosan atau kontrakan di sekitar kampus. Kalian dapat melihat foto, harga dan fasilitas apa saja yang tersedia di kosan atau kontrakan tersebut. Kalian juga dapat menghubungi langsung para pemilik jika ingin memesan kamar kosan atau kontrakan. Enjoy ur search!
</p>
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