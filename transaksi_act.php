<?php

include 'config.php';
session_start();
include 'auth_kasir.php';

$bayar = preg_replace('/\D/', '', $_POST['bayar']);

$id_transaksi = $_POST['id_transaksi'];
$tgl_waktu = date('Y-m-d H:i:s');
$id_member = $_POST['id_member'];
$id_user = $_SESSION['userid'];
$total = $_POST['total'];
$kembali = $bayar - $total ;

mysqli_query($dbconnect, "INSERT INTO transaksi (id_transaksi, tgl_waktu, id_member, id_user, total, bayar, kembali) VALUES ('$id_transaksi', '$tgl_waktu', '$id_member', '$id_user', '$total', '$bayar', '$kembali')");

foreach ($_SESSION['cart'] as $key => $value) {

    $id_item = $value['id'];
    $harga = $value['harga'];
    $qty = $value['qty'];
    $total = $harga * $qty ;

    mysqli_query($dbconnect, "INSERT INTO transaksi_detail (id_detail, id_transaksi, id_item, qty, total) values (NULL, '$id_transaksi', '$id_item', '$qty', '$total')");


}

$_SESSION['cart'] = [];

header("location:transaksi_selesai.php?id_trx=".$id_transaksi);




?>