
<?php

include 'config.php';
session_start();
include("auth.php");

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    mysqli_query($dbconnect, "DELETE FROM item WHERE id_item='$id' ");

    $_SESSION['success'] = 'Berhasil menghapus data';

    header("location:barang.php");
    
}

?>
