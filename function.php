<?php

$conn = mysqli_connect('localhost','root', '', 'dbkosan');

if (!$conn){
    die("Koneksi Gagal!: ".mysqli_connect_error());
}

function get_kosan(){

    global $conn;
    $sql = "SELECT * FROM tbkosan" ;
    $result = $conn->query($sql) ;

    echo "<div class='container m-3 text-center'>";
    while ($row = mysqli_fetch_assoc($result)){

        $KID = $row["No_kosan"];
        $namakos = $row["Nama_kost"];

        echo "
        
        <h4> $namakos </h4>
        <h5> </h5>
        <a href='isikosan.php?KID=$KID'><span class='m-2'>Lihat</span></a>
        <br> <br>
        ";
         
                    
         if (isset($_SESSION["uid"])){
             $idcek = $row['userID'];
           if($_SESSION["uid"] == $idcek)  
             {
     
            echo "<form class='hapus' method='POST' action='".hapus_kosan()."'>
                    <input type='hidden' name='kid' value='".$row['No_kosan']."'>
                    <button type='submit'name='kosHapus'>Hapus</button>
                </form>
                
                <form class='edit' method='POST' action='editupload.php'>
                    <input type='hidden' name='nomorkos' value='".$row['No_kosan']."'>
                    <input type='hidden' name='namakos' value='".$row['Nama_kost']."'>
                    <input type='hidden' name='alamat' value='".$row['Alamat']."'>
                    <input type='hidden' name='kamar' value='".$row['Kamar_tersedia']."'>
                    <input type='hidden' name='status' value='".$row['Status']."'>
                    <input type='hidden' name='fasilitas' value='".$row['Fasilitas']."'>
                    <input type='hidden' name='harga3bln' value='".$row['Harga3bln']."'>
                    <input type='hidden' name='harga6bln' value='".$row['Harga6bln']."'>
                    <input type='hidden' name='harga1thn' value='".$row['Harga_pertahun']."'>
                    <input type='hidden' name='gambar' value='".$row['Foto']."'>
                    <button>Edit</button>
                </form>
                 <br><br>";
        
             }
            }
    }   
    echo "</div>";

}

function hapus_kosan(){

    global $conn;

    if(isset($_POST['kosHapus'])){

        $KID = $_POST['kid'];
        $hapus = "DELETE FROM tbkosan WHERE No_kosan = '$KID'";

        $result = $conn->query($hapus);
        header("Location: listkosan.php");

    }



}

function edit_kosan(){

    global $conn;


    if(isset($_POST['simpan'])){

        $idkos = $_POST['nomorkos'];
        $nama = $_POST['namakos'];
        $alamat= $_POST['alamat'];
        $kamar_tersedia = $_POST['kamar'];
        $status = $_POST['status'];
        $fasilitas = $_POST['fasilitas'];
        $harga_3bulan = $_POST['harga3bln'];
        $harga_6bulan = $_POST['harga6bln'];
        $harga_pertahun = $_POST['harga1thn'];
        $gambar = $_FILES['gambar']['name'];
        $tmp_name =$_FILES['gambar']['tmp_name'];
        $ID = $_SESSION['uid'];

        $update = "UPDATE tbkosan SET Nama_kost = '$nama' WHERE No_kosan = '$idkos'";
        $update1 = "UPDATE tbkosan SET Alamat = '$alamat' WHERE No_kosan = '$idkos'";
        $update2 = "UPDATE tbkosan SET Kamar_tersedia = '$kamar_tersedia' WHERE No_kosan = '$idkos'";
        $update3 = "UPDATE tbkosan SET Status = '$status' WHERE No_kosan = '$idkos'";
        $update4 = "UPDATE tbkosan SET Fasilitas = '$fasilitas' WHERE No_kosan = '$idkos'";
        $update5 = "UPDATE tbkosan SET Harga3bln = '$harga_3bulan' WHERE No_kosan = '$idkos'";
        $update6 = "UPDATE tbkosan SET Harga6bln = '$harga_6bulan' WHERE No_kosan = '$idkos'";
        $update7 = "UPDATE tbkosan SET Harga_pertahun = '$harga_pertahun' WHERE No_kosan = '$idkos'";
        $update8 = "UPDATE tbkosan SET Gambar = '$gambar' WHERE No_kosan = '$idkos'";
      

        $hasilupdate = $conn->query($update);
        $hasilupdate1 = $conn->query($update1);
        $hasilupdate2 = $conn->query($update2);
        $hasilupdate3 = $conn->query($update3);
        $hasilupdate4 = $conn->query($update4);
        $hasilupdate5 = $conn->query($update5);
        $hasilupdate6 = $conn->query($update6);
        $hasilupdate7 = $conn->query($update7);
        $hasilupdate8 = $conn->query($update8);

        header("Location: listkosan.php");




    }



}
function setKomen(){
    global $conn;

    if(isset($_POST['komenSubmit'])){
        $uid = $_POST['uid'];
        $idkost = $_POST['no_kosan'];
        $pesan = $_POST['pesan'];

        $sqlkomen = "INSERT INTO tbkomen VALUES ('', '$uid', '$idkost', '$pesan')";
        $resultkomen = $conn->query($sqlkomen);
    }

}
function getKomen(){

    global $conn;
    $sqlshow = "SELECT * FROM tbkomen WHERE No_kosan=9";
    $resultshow = $conn->query($sqlshow);
    while ($rowshow =  $resultshow->fetch_assoc()) {
    echo "<div class = 'komen-box'>";
        echo $rowshow['userID']."<br>";
        echo $rowshow['Isi_komen'];
              
        echo "</div>";
    }
}