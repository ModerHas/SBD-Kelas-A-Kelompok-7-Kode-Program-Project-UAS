<?php

include 'config.php';
session_start();
include("auth.php");

if (isset($_POST['simpan'])){

    $id_role = $_POST['id_role'];
    $role = $_POST['role'];

    mysqli_query($dbconnect, "INSERT INTO role VALUES ('$id_role','$role')");

    $_SESSION['success'] = 'Berhasil menambahkan data';

    header("location:role.php");
    
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Role</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Tambah Role</h1>
        <form method="post">
        <div class="form-group">
                <label>Id Role</label>
                <input type="text" name="id_role" class="form-control" placeholder="Id role">
            <div class="form-group">
                <label>Nama Role</label>
                <input type="text" name="role" class="form-control" placeholder="Nama role">
                <p></p>
            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
            <a href="role.php" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</body>
</html>




