<?php
include("function.php");
// cek tombol
if(isset($_POST['Register'])){

        //ambil data dari form
        $nama = $_POST['fullname'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $role = $_POST['role'];
        $ponsel = $_POST['no_ponsel'];

        //query
        $q = mysqli_query($conn, "INSERT INTO tbuser VALUES('', '$nama', '$username', '$pass', '$role', '$ponsel')");

        //apa simpan berhasil?
        if($q==TRUE){
            header("Location: login.php");
        }
        else{
            echo "gagal:(";
        }


}else {
    die("gagal cuk");
}
