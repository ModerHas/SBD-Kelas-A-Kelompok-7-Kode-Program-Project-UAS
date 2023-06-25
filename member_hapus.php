
<?php

include 'config.php';
session_start();
include("auth.php");

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    mysqli_query($dbconnect, "DELETE FROM member WHERE id_member='$id' ");

    $_SESSION['success'] = 'Berhasil menghapus data';

    header("location:member.php");
    
}

?>
