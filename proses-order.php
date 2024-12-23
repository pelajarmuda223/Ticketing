<?php

session_start();

include './database/koneksi.php';

$id_user = $_SESSION["idUser"];


// cek ticket mana yang di beli oleh user
if (isset($_POST["ticket1"])) {
    $id_ticket = 1;
    
    $getTicket = mysqli_query($koneksi,"SELECT * FROM ticket WHERE id_ticket = '$id_ticket'");
    $ticket = mysqli_fetch_assoc($getTicket);

    // mengambil beberapa field pada table ticket
    $ticketTitle = $ticket["ticketTitle"];
    $ticketDate = $ticket["ticketDate"];
    $ticketCode = uniqid();

    // mengambil data dari table user
    $getUser = mysqli_query($koneksi,"SELECT * FROM user where id_user = '$id_user'");

    // mengambil beberapa field pada table user
    $user = mysqli_fetch_assoc($getUser);

    $id_user = $user["id_user"];
    $username = $user["username"];

    // memasukkan data ke dalam table salesticket
    $query = "INSERT INTO salesticket (id_user, username, id_ticket, ticketTitle, ticketDate, ticketCode) VALUES ('$id_user', '$username', '$id_ticket', '$ticketTitle', '$ticketDate', '$ticketCode')";
    $msql = mysqli_query($koneksi,$query);

    if ($msql == TRUE) {
        header("Location: myticket.php");
        exit();
    }else {
        echo "Error: ". $query . "<br>" . $koneksi->error;    
    }
    

}else if (isset($_POST["ticket2"])) {
    $id_ticket = 2;
    $getTicket = mysqli_query($koneksi,"SELECT * FROM ticket WHERE id_ticket = '$id_ticket'");

    $ticket = mysqli_fetch_assoc($getTicket);

    // mengambil beberapa field pada table ticket
    $ticketTitle = $ticket["ticketTitle"];
    $ticketDate = $ticket["ticketDate"];
    $ticketCode = uniqid();

    // mengambil data dari table user
    $getUser = mysqli_query($koneksi,"SELECT * FROM user where id_user = '$id_user'");

    // mengambil beberapa field pada table user
    $user = mysqli_fetch_assoc($getUser);

    $id_user = $user["id_user"];
    $username = $user["username"];

    // memasukkan data ke dalam table salesticket
    $query = "INSERT INTO salesticket (id_user, username, id_ticket, ticketTitle, ticketDate, ticketCode) VALUES ('$id_user', '$username', '$id_ticket', '$ticketTitle', '$ticketDate', '$ticketCode')";
    $msql = mysqli_query($koneksi,$query);

    if ($msql == TRUE) {
        header("Location: myticket.php");
        exit();
    }else {
        echo "Error: ". $query . "<br>" . $koneksi->error;    
    }
    


} else {
    echo "Pesanan tidak terbaca";
}

// Hapus semua variabel sesi
session_unset();

// Hancurkan sesi
session_destroy();

$koneksi->close();
?>