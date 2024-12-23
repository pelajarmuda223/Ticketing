<?php

session_start();

include './database/koneksi.php';

if (isset($_POST["signin"])) {
    
    $email = $_POST["email"];
    $password = $_POST["password"];

    // cek apakah email ada didalam database
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email'");

    // cek email
    if (mysqli_num_rows($result) === 1) {
        
        // cek password
        $row = mysqli_fetch_assoc($result);
        if ($password === $row["password"]) {

            $_SESSION["login"] = true;
            $_SESSION["idUser"] = $row["id_user"];
            

            // cek apakah user admin atau bukan ?
            if ($row["role"] === "admin") {
                $_SESSION["role"] = "admin";            
                header("Location: admin.php");
                exit;
            }else {
                $_SESSION["role"] = "user";
                header("Location: index.php");
                exit;
            }
        }else {
            $pesan = "Password Anda Salah";
            echo "<script>alert('$pesan')</script>";
            
        }
    }else{
        $page = "./sign-in.html";
        $pesan = "Your email and password is wrong";
        echo "<script>alert('$pesan')</script>";
        
        
    }
}


?>