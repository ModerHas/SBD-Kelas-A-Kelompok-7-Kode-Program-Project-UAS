<?php

include 'config.php';
session_start();
include("auth.php");

if (isset($_POST['simpan'])){

    $id_item = $_POST['id_item'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];

    mysqli_query($dbconnect, "INSERT INTO item VALUES ('$id_item','$nama','$harga')");

    $_SESSION['success'] = 'Berhasil menambahkan data';

    header("location:barang.php");
    
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Item</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Tambah Item</h1>
        <form method="post">
        <div class="form-group">
                <label>Id Item</label>
                <input type="text" name="id_item" class="form-control" placeholder="Id Item">
            </div>
            <div class="form-group">
                <label>Nama Item</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama barang">
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" placeholder="Harga barang">
            </div>
            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
            <a href="barang.php" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</body>
</html>




