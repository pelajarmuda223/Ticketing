<?php

include './database/koneksi.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$role = "user";

$query = "INSERT INTO user (username, email, password, phone, role) VALUES ('$username','$email','$password','$phone','$role')";
$msql = mysqli_query($koneksi,$query);

if ($msql == TRUE) {
    // echo "Data berhasil disimpan";    
    header("Location: sign-in.html");
    exit();
}else {
    echo "Error: ". $query . "<br>" . $koneksi->error;    
}

$koneksi->close();


?>