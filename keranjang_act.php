<?php

include "config.php";
session_start();
include "auth_kasir.php";

if(isset($_POST['id_item'])) {
    
    $id_item = $_POST['id_item'];
    $qty = $_POST['qty'];

    $data = mysqli_query($dbconnect, "SELECT * FROM item where id_item = '$id_item'");

    $b = mysqli_fetch_assoc($data);

    $item = [
        'id' => $b['id_item'],
        'nama' => $b['nama'],
        'harga' => $b['harga'],
        'qty' => $qty
    ];

    $_SESSION['cart'][] =$item;

    header("location:kasir.php");
}
?>




