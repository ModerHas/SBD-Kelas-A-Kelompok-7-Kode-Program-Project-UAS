<?php

include 'config.php';
session_start();
include("auth.php");

if (isset($_POST['simpan'])){

    $id_member = $_POST['id_member'];
    $nama = $_POST['nama'];

    mysqli_query($dbconnect, "INSERT INTO member VALUES ('$id_member','$nama')");

    $_SESSION['success'] = 'Berhasil menambahkan data';

    header("location:member.php");
    
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Member</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Tambah Member</h1>
        <form method="post">
        <div class="form-group">
                <label>Id Member</label>
                <input type="text" name="id_member" class="form-control" placeholder="Id member">
            <div class="form-group">
                <label>Nama Member</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama member">
                <p></p>
            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
            <a href="member.php" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</body>
</html>




