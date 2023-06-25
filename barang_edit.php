
<?php

include 'config.php';
session_start();
include("auth.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $data = mysqli_query($dbconnect, "SELECT * FROM item where id_item='$id'");
    $data = mysqli_fetch_assoc($data);
}

if (isset($_POST['update'])) {

    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];


    mysqli_query($dbconnect, "UPDATE item SET nama='$nama', harga='$harga' where id_item='$id' ");

    $_SESSION['success'] = 'Berhasil merubah data';

    header("location:barang.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Perbarui Item</h1>
        <form method="post">
        <!-- <div class="form-group">
                <label>Id Item</label>
                <p class="form-control-static"><?=$data['id_item']?></p>
            </div> -->
            <div class="form-group">
                <label>Nama Item</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Barang" value="<?=$data['nama']?>">
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" placeholder="Harga barang" value="<?=$data['harga']?>">
            </div>
            <input type="submit" name="update" value="Perbarui" class="btn btn-primary">
            <a href="barang.php" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</body>
</html>





